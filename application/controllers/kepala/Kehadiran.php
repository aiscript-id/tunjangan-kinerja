<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kehadiran extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Laporan Kehadiran');
        $data['periode'] = $this->db->get('periode_tunjangan')->result();
        $this->template->load('layouts/template', 'admin/kehadiran/periode', $data);
        // $this->template->load('layouts/new','admin/dashboard', $data);
    }

    
   

    public function kehadiran($periode)
    {
        $data = konfigurasi('Laporan Kehadiran');
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
        redirect('petugas/kehadiran/kehadiran/' .$periode->periode, 'refresh');
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
