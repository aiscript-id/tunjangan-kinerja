<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Tunjangan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "3") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Tunjangan');

        $data['periode'] = $this->db->get('periode_tunjangan')->result();
        // get periode and count validasi

        $this->template->load('layouts/template', 'admin/tunjangan/periode', $data);
        // $this->template->load('layouts/new','admin/dashboard', $data);
    }

    public function show($periode)
    {
        $data = konfigurasi('Tunjangan');
        $data['periode'] = $this->db->get_where('periode_tunjangan', ['tanggal' => $periode])->row();
        $data['tunjangans'] = $this->db->where('periode', $periode)
        ->select('tunjangan.*, first_name, last_name, username')
        ->join('tbl_user', 'tbl_user.id = tunjangan.user_id')
        ->get('tunjangan')->result();
        $this->template->load('layouts/template', 'admin/tunjangan/show', $data);
    }

    public function add($per)
    {
        $periode = $this->db->get_where('periode_tunjangan', ['tanggal' => $per])->row();
        if ($periode->verifikasi == '1') {
            $this->session->set_flashdata('error', 'Gagal menambahkan Tunjangan. Periode telah dikonfirmasi');
            redirect('admin/tunjangan', 'refresh');
        } else {
            $kehadiran = $this->db->where('periode', $per)
            ->select('kehadiran.*, tunjangan')
            ->join('tbl_user', 'tbl_user.id = kehadiran.user_id')
            ->join('jabatan', 'jabatan.id = tbl_user.jabatan_id')
            ->where('kehadiran.validasi', 1)
            ->get('kehadiran')->result();
            // join user with jabatan

            $key = 0;
            foreach ($kehadiran as $value) {

                $tunjangan = $this->db->where('kehadiran_id', $value->id)->get('tunjangan')->row();
                $total_tunjangan = $value->tunjangan - ($value->tunjangan * ($value->potongan / 100));
                    $data = [
                        'kehadiran_id'  => $value->id,
                        'user_id'       => $value->user_id,
                        'periode'       => $per,
                        'tunjangan'     => $value->tunjangan,
                        'total_potongan'=> $value->potongan,
                        'total_tunjangan'    => $total_tunjangan,
                    ];
                if (!@$tunjangan) {
                    $this->db->insert('tunjangan', $data);
                } else {
                    $this->db->where('kehadiran_id', $value->id)->where('validasi', '!= 1')->update('tunjangan', $data);
                }

                $key++;
            }

            if ($key > 0) {
                $this->session->set_flashdata('success', 'Berhasil menambahkan Tunjangan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Tunjangan. Tidak ada data yang ditambahkan');
            }
            redirect('petugas/tunjangan/show/'.$per, 'refresh');
        }
    }

    // validasi
    public function validasi($id)
    {
        $tunjangan = $this->db->get_where('tunjangan', ['id' => $id])->row();
        if ($tunjangan->validasi == '1') {
            $this->session->set_flashdata('error', 'Gagal memvalidasi Tunjangan. Tunjangan telah divalidasi');
            redirect('petugas/tunjangan/show/'.$tunjangan->periode, 'refresh');
        } else {
            $this->db->where('id', $id)->update('tunjangan', ['validasi' => '1']);
            $this->session->set_flashdata('success', 'Berhasil memvalidasi Tunjangan');
            redirect('petugas/tunjangan/show/'.$tunjangan->periode, 'refresh');
        }
    }

    public function terima($id)
    {
        $tunjangan = $this->db->get_where('tunjangan', ['id' => $id])->row();
        if (@$tunjangan->tanggal_terima) {
            $this->session->set_flashdata('error', 'Gagal menerima Tunjangan. Tunjangan telah diterima');
            redirect('admin/tunjangan/show/'.$tunjangan->periode, 'refresh');
        } else {
            if ($tunjangan->validasi == '1') {
                $this->db->where('id', $id)->update('tunjangan', ['tanggal_terima' => date('Y-m-d')]);
                $this->session->set_flashdata('success', 'Berhasil menerima Tunjangan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menerima Tunjangan. Tunjangan belum divalidasi');
            }
            redirect('admin/tunjangan/show/'.$tunjangan->periode, 'refresh');
        }
    }

    public function verifikasi($tanggal)
    {
        $periode = $this->db->get_where('periode_tunjangan', ['tanggal' => $tanggal])->row();
        if ($periode->verifikasi == '1') {
            $this->session->set_flashdata('error', 'Gagal mengkonfirmasi Tunjangan. Periode telah dikonfirmasi');
            redirect('admin/tunjangan', 'refresh');
        } else {

            $tunjangan = $this->db->get_where('tunjangan', ['periode' => $tanggal])->result();
            foreach ($tunjangan as $value) {
                if ($value->validasi != '1') {
                    $this->session->set_flashdata('error', 'Terdapat data tunjangan yang belum divalidasi');
                    redirect('admin/tunjangan/show/'.$periode->tanggal, 'refresh');
                }
            }

            $this->db->where('tanggal', $tanggal)->update('periode_tunjangan', ['verifikasi' => date('Y-m-d')]);
            $this->session->set_flashdata('success', 'Berhasil mengkonfirmasi Tunjangan');
            redirect('admin/tunjangan', 'refresh');
        }
    }
}
