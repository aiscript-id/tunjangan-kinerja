<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Lapkin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') == "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Lapkin', 'Laporan Kinerja');

        $data['tunjangans'] = $this->db->select('tunjangan.*, periode_tunjangan.periode as name_periode')
        ->where('user_id', $this->session->userdata('id'))
        ->join('periode_tunjangan', 'periode_tunjangan.tanggal = tunjangan.periode')
        ->order_by('periode_tunjangan.periode', 'asc')
        ->get('tunjangan')->result();
        // get periode and count validasi

        $this->template->load('layouts/template', 'pegawai/lapkin', $data);
        // $this->template->load('layouts/new','admin/dashboard', $data);
    }

    public function show($id)
    {
        $check = $this->db->where('id', $id)->where('user_id', $this->session->userdata('id'))->get('tunjangan')->row();
        if ($check) {
            $data = konfigurasi('Lapkin', 'Laporan Kinerja');

            $data['tunjangan'] = $check;
            $data['lapkins'] = $this->db->select('lapkin_detail.*, tunjangan.periode as periode_tunjangan')
            ->where('tunjangan_id', $id)
            ->where('tunjangan.user_id', $this->session->userdata('id'))
            ->join('tunjangan', 'tunjangan.id = lapkin_detail.tunjangan_id')
            ->order_by('lapkin_detail.id', 'asc')
            ->get('lapkin_detail')->result();
            $this->template->load('layouts/template', 'pegawai/lapkin_show', $data);

        } else {
            $this->session->set_flashdata('error', 'Tidak dapat menampilkan data');
            redirect('pegawai/lapkin', 'refresh');
        }
    }

    public function delete($id)
    {
        $check = $this->db->where('id', $id)->where('user_id', $this->session->userdata('id'))->get('tunjangan')->row();
        if ($check) {
            $this->db->where('tunjangan_id', $id)->delete('lapkin_detail');
            $this->db->where('id', $id)->update('tunjangan', ['file_lapkin' => null]);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('pegawai/lapkin', 'refresh');
        }  else {
            $this->session->set_flashdata('error', 'Tidak dapat menghapus data');
            redirect('pegawai/lapkin/show/'.$check->id, 'refresh');
        }
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
