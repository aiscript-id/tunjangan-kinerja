<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * |==============================================================|
 * | Please DO NOT modify this information :                      |
 * |--------------------------------------------------------------|
 * | Author          : Susantokun
 * | Email           : admin@susantokun.com
 * | Filename        : Home.php
 * | Instagram       : @susantokun
 * | Blog            : http://www.susantokun.com
 * | Info            : http://info.susantokun.com
 * | Demo            : http://demo.susantokun.com
 * | Youtube         : http://youtube.com/susantokun
 * | File Created    : Thursday, 12th March 2020 10:34:33 am
 * | Last Modified   : Thursday, 12th March 2020 10:57:32 am
 * |==============================================================|
 */

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
            ];
            $this->db->insert('periode_tunjangan', $data);
            $this->session->set_flashdata('success', 'Berhasil menambahkan Periode Tunjangan');
            redirect('admin/kehadiran', 'refresh');

        }
    }

    public function periodeUpdate($id)
    {
        $this->form_validation->set_rules('periode', 'Nama Periode', 'required');
        $this->form_validation->set_rules('tanggal', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah Periode Tunjangan. Periode telah digunakan');
            redirect('admin/kehadiran', 'refresh');
        } else {
            $data = [
                'periode' => $this->input->post('periode'),
                'tanggal' => $this->input->post('tanggal'),
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
}
