<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Tunjangan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "4") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Tunjangan');

        $data['tunjangans'] = $this->db->select('tunjangan.*, periode_tunjangan.periode as name_periode')
        ->where('user_id', $this->session->userdata('id'))
        ->join('periode_tunjangan', 'periode_tunjangan.tanggal = tunjangan.periode')
        ->order_by('periode_tunjangan.periode', 'asc')
        ->get('tunjangan')->result();
        // get periode and count validasi

        $this->template->load('layouts/template', 'pegawai/tunjangan', $data);
        // $this->template->load('layouts/new','admin/dashboard', $data);
    }


    public function terima($id)
    {
        $tunjangan = $this->db->get_where('tunjangan', ['id' => $id, 'user_id' => $this->session->userdata('id')])->row();
        if (@$tunjangan->tanggal_terima) {
            $this->session->set_flashdata('error', 'Gagal menerima Tunjangan');
            redirect('pegawai/home', 'refresh');
        } else {
            if ($tunjangan->validasi == '1') {
                $this->db->where('id', $id)->update('tunjangan', ['tanggal_terima' => date('Y-m-d')]);
                $this->session->set_flashdata('success', 'Berhasil menerima Tunjangan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menerima Tunjangan. Tunjangan belum divalidasi');
            }
            redirect('pegawai/home', 'refresh');
        }
    }

}
