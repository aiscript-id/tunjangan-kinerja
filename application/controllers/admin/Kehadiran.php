<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kehadiran extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Kehadiran');
        $data['periode'] = $this->db->get('periode_tunjangan')->result();
        $this->template->load('layouts/template', 'admin/kehadiran/periode', $data);
        // $this->template->load('layouts/new','admin/dashboard', $data);
    }

    public function periodeStore()
    {
        $this->form_validation->set_rules('periode', 'Nama Periode', 'required');
        $this->form_validation->set_rules('tanggal', 'Periode', 'required|is_unique[periode_tunjangan.tanggal]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan Periode Tunjangan. Periode telah digunakan');
            redirect('admin/kehadiran', 'refresh');
        } else {
            $data = [
                'periode' => $this->input->post('periode'),
                'tanggal' => $this->input->post('tanggal'),
                'verifikasi' => '0',
                'hari_kerja' => $this->input->post('hari_kerja'),
                'awal'     => $this->input->post('awal'),
                'akhir'    => $this->input->post('akhir'),
            ];
            $this->db->insert('periode_tunjangan', $data);
            $this->session->set_flashdata('success', 'Berhasil menambahkan Periode Tunjangan');
            redirect('admin/kehadiran', 'refresh');

        }
    }

    public function periodeUpdate()
    {
        $this->form_validation->set_rules('periode', 'Nama Periode', 'required');
        $this->form_validation->set_rules('tanggal', 'Periode', 'required');

        $id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah Periode Tunjangan. Periode telah digunakan');
            redirect('admin/kehadiran', 'refresh');
        } else {
            $data = [
                'periode' => $this->input->post('periode'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_kerja' => $this->input->post('hari_kerja'),
                'awal'     => $this->input->post('awal'),
                'akhir'    => $this->input->post('akhir'),
            ];
            $this->db->where('id', $id);
            $this->db->update('periode_tunjangan', $data);
            $this->session->set_flashdata('success', 'Berhasil mengubah Periode Tunjangan');
            redirect('admin/kehadiran', 'refresh');
        }

    }

    public function update()
    {
        $this->form_validation->set_rules('kehadiran', 'Nama kehadiran', 'required');
        $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah kehadiran');
            redirect('admin/kehadiran', 'refresh');
        } else {
            $data = [
                'kehadiran' => $this->input->post('kehadiran'),
                'kelas' => $this->input->post('kelas'),
                'tunjangan' => $this->input->post('tunjangan'),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('kehadiran', $data);
            $this->session->set_flashdata('success', 'Berhasil mengubah kehadiran');
            redirect('admin/kehadiran', 'refresh');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kehadiran');
        $this->session->set_flashdata('success', 'Berhasil menghapus kehadiran');
        redirect('admin/kehadiran', 'refresh');
    }

    public function kehadiran($periode)
    {
        $data = konfigurasi('Kehadiran');
        $data['periode'] = $this->db->get_where('periode_tunjangan', ['tanggal' => $periode])->row();
        if ($data['periode'] == null) {
            $this->session->set_flashdata('error', 'Periode tidak ditemukan');
            redirect('admin/kehadiran', 'refresh');
        }
        
        $data['kehadirans'] = $this->db->select('kehadiran.*, first_name, last_name')->where('periode', $periode)
        ->join('tbl_user', 'tbl_user.id = kehadiran.user_id')
        ->get('kehadiran')
        ->result();
        // pegawai in kehadiran to array
        $pegawai = [];
        foreach ($data['kehadirans'] as $kehadiran) {
            $pegawai[] = $kehadiran->user_id;
        }

         
        $this->db->select('*')->where_not_in('id_role', 1);
        if ($pegawai != null) {
            $this->db->where_not_in('id', $pegawai);
        }
        $data['pegawai'] = $this->db->get('tbl_user')->result();

        $this->db->select('*')->where_not_in('id_role', 1);
        $data['pegawai_all'] = $this->db->get('tbl_user')->result();

        $this->template->load('layouts/template', 'admin/kehadiran/index', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('user_id', 'Nama Pegawai', 'required');
        $periode = $this->input->post('periode');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan kehadiran');
            redirect('admin/kehadiran/kehadiran/' .$periode, 'refresh');
        } else {
            $data = [
                // all input
                'user_id' => $this->input->post('user_id'),
                'periode' => $this->input->post('periode'),
                'hadir'   => $this->input->post('hadir'),
                'izin'    => $this->input->post('izin'),
                'sakit'   => $this->input->post('sakit'),
                'alpa'    => $this->input->post('alpa'),
                'tl'    => $this->input->post('tl'),
                'pa'    => $this->input->post('pa'),
                'ta'    => $this->input->post('ta'),
                'tad'   => $this->input->post('tad'),
                'tap'   => $this->input->post('tap'),
                'alb'   => $this->input->post('alb'),
                'bs'    => $this->input->post('bs'),
                'dn'    => $this->input->post('dn'),
                'csa'   => $this->input->post('csa'),
            
            ];
            $this->db->insert('kehadiran', $data);
            $this->session->set_flashdata('success', 'Berhasil menambahkan kehadiran');
            redirect('admin/kehadiran/kehadiran/' .$periode, 'refresh');
        }
    }

    // update
    public function update_kehadiran()
    {
        // $this->form_validation->set_rules('user_id', 'Nama Pegawai', 'required');
        $periode = $this->db->get_where('periode_tunjangan', ['tanggal' => $this->input->post('periode')])->row();
        $id =  $this->input->post('id');

        if (!@$periode) {
            $this->session->set_flashdata('error', 'Gagal mengubah kehadiran');
            redirect('admin/kehadiran/kehadiran/' .$periode->tanggal, 'refresh');
        } else {

            $data = [
                // all input
                'user_id' => $this->input->post('user_id'),
                'periode' => $periode->tanggal,
                'hadir'   => $this->input->post('hadir'),
                'izin'    => $this->input->post('izin'),
                'sakit'   => $this->input->post('sakit'),
                'alpa'    => $this->input->post('alpa'),
                'tl'    => $this->input->post('tl'),
                'pa'    => $this->input->post('pa'),
                'ta'    => $this->input->post('ta'),
                'tad'   => $this->input->post('tad'),
                'tap'   => $this->input->post('tap'),
                'alb'   => $this->input->post('alb'),
                'bs'    => $this->input->post('bs'),
                'dn'    => $this->input->post('dn'),
                'csa'   => $this->input->post('csa'),
                'validasi'  => 0,
                'potongan'  => 0,
            
            ];
            $this->db->where('id', $id);
            $this->db->update('kehadiran', $data);
            $this->session->set_flashdata('success', 'Berhasil mengubah kehadiran');
            redirect('admin/kehadiran/kehadiran/' .$periode->tanggal, 'refresh');

        }
    }

    // validasi
    public function validasi($id)
    {
        $periode = $this->db->get_where('kehadiran', ['id' => $id])->row();
        $total_potongan  = $this->getPotongan($id);

        // get potongan percentage

        // foreach ($potongan as $p) {
        //     $pot = $p->potongan * $periode->$p;
        //     $total_potongan += $pot;
        // }
        $this->db->where('id', $id);
        $this->db->update('kehadiran', ['validasi' => 1, 'potongan' => $total_potongan]);
        $this->session->set_flashdata('success', 'Berhasil memvalidasi kehadiran');
        redirect('admin/kehadiran/kehadiran/' .$periode->periode, 'refresh');
    }

    // get potongan
    public function getPotongan($id)
    {
        $periode = $this->db->get_where('kehadiran', ['id' => $id])->row();
        $value1 = $periode->tl * $this->db->get_where('potongan', ['kode' => 'tl'])->row()->potongan;
        $value2 = $periode->pa * $this->db->get_where('potongan', ['kode' => 'pa'])->row()->potongan;
        $value3 = $periode->ta * $this->db->get_where('potongan', ['kode' => 'ta'])->row()->potongan;
        $value4 = $periode->tad * $this->db->get_where('potongan', ['kode' => 'tad'])->row()->potongan;
        $value5 = $periode->tap * $this->db->get_where('potongan', ['kode' => 'tap'])->row()->potongan;
        $value6 = $periode->alb * $this->db->get_where('potongan', ['kode' => 'alb'])->row()->potongan;
        $value7 = $periode->bs * $this->db->get_where('potongan', ['kode' => 'bs'])->row()->potongan;
        $value8 = $periode->dn * $this->db->get_where('potongan', ['kode' => 'dn'])->row()->potongan;
        $value9 = $periode->csa * $this->db->get_where('potongan', ['kode' => 'csa'])->row()->potongan;

        $total_potongan = $value1 + $value2 + $value3 + $value4 + $value5 + $value6 + $value7 + $value8 + $value9;
        return $total_potongan;
    }
        
        
}
