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

class Jabatan extends MY_Controller
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
        $data = konfigurasi('Jabatan');
        $data['jabatans'] = $this->db->get('jabatan')->result();
        $this->template->load('layouts/template', 'admin/jabatan/index', $data);
        // $this->template->load('layouts/new','admin/dashboard', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'required|is_unique[jabatan.jabatan]');
        $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan jabatan');
            redirect('admin/jabatan', 'refresh');
        } else {
            $data = [
                'jabatan' => $this->input->post('jabatan'),
                'kelas' => $this->input->post('kelas'),
                'tunjangan' => $this->input->post('tunjangan'),
            ];
            $this->db->insert('jabatan', $data);
            $this->session->set_flashdata('success', 'Berhasil menambahkan jabatan');
            redirect('admin/jabatan', 'refresh');

        }
    }

    public function update()
    {
        $this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah jabatan');
            redirect('admin/jabatan', 'refresh');
        } else {
            $data = [
                'jabatan' => $this->input->post('jabatan'),
                'kelas' => $this->input->post('kelas'),
                'tunjangan' => $this->input->post('tunjangan'),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('jabatan', $data);
            $this->session->set_flashdata('success', 'Berhasil mengubah jabatan');
            redirect('admin/jabatan', 'refresh');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jabatan');
        $this->session->set_flashdata('success', 'Berhasil menghapus jabatan');
        redirect('admin/jabatan', 'refresh');
    }
}
