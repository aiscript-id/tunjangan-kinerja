<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
    // this->layout
    private $layout = 'layouts/template';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->check_login();
        if ($this->session->userdata('id_role') != '1') {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data            = konfigurasi('Pegawai', 'Kelola Pegawai');
        $data['pegawais'] = $this->pegawai_model->get_all();

        $this->template->load($this->layout, 'admin/pegawai/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Pegawai', 'Tambah Pegawai');
        $data['jabatan'] = $this->pegawai_model->get_jabatan();
        $this->template->load($this->layout, 'admin/pegawai/create', $data);
    }

    public function create()
    {
        $data = konfigurasi('Register_pegawai');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');
        if ($this->form_validation->run() == false) {
            // $this->template->load($this->layout, 'admin/pegawai/create', $data);
            // session danger
            $this->session->set_flashdata('error', 'Terjadi kesalahan input. Silahkan coba lagi.');
            $this->add();
        } else {
            $this->pegawai_model->register();
            $this->session->set_flashdata('success', 'Pegawai berhasil ditambahkan');
            $this->index();
        }
    }

    public function edit($id)
    {
        $data           = konfigurasi('Pegawai', 'Edit Pegawai');
        $data['pegawai'] = $this->pegawai_model->get_by_id($id);
        $data['jabatan'] = $this->pegawai_model->get_jabatan();
        $this->template->load($this->layout, 'admin/pegawai/create', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[tbl_user.username]|callback_username_check');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Terjadi kesalahan input. Silahkan coba lagi.');
            $this->edit($id);
        } else {
            $this->pegawai_model->update();
            $this->session->set_flashdata('success', 'Pegawai berhasil diubah');
            $this->index();
        }
    }

    public function detail($id)
    {
        $data           = konfigurasi('Pegawai', 'Detail Pegawai');
        $data['pegawais'] = $this->pegawai_model->get_by_id($id);
        $this->template->load($this->layout, 'admin/pegawai/detail', $data);
    }

    public function delete($id)
    {
        $this->session->set_flashdata('success', 'Pegawai berhasil dihapuskan');
        $this->pegawai_model->delete($id);
        redirect('admin/pegawai');
    }
}

/* End of file pegawai.php */
