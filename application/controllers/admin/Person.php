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
class Pegawai extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        $this->check_login();
        if ($this->session->userdata('id_role') != '1') {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data            = konfigurasi('Person', 'Kelola Person');
        $data['persons'] = $this->Person_model->get_all();
        $this->template->load('layouts/template', 'admin/persons/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah Person', 'Tambah Person');
        $this->template->load('layouts/template', 'admin/persons/create', $data);
    }

    public function create()
    {
        $name    = $this->input->post('name');
        $address = $this->input->post('address');

        $data = [
            'name'    => $name,
            'address' => $address,
        ];
        $this->Person_model->insert($data);
        redirect('admin/person');
    }

    public function edit($id)
    {
        $data           = konfigurasi('Edit Person', 'Edit Person');
        $data['person'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/persons/update', $data);
    }

    public function update()
    {
        $id      = $this->input->post('id');
        $name    = $this->input->post('name');
        $address = $this->input->post('address');

        $data = [
            'name'    => $name,
            'address' => $address,
        ];
        $this->Person_model->update(['id' => $id], $data);
        redirect('admin/person');
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail Person', 'Detail Person');
        $data['person'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/persons/detail', $data);
    }

    public function delete($id)
    {
        $this->Person_model->delete($id);
        redirect('admin/person');
    }
}

/* End of file Person.php */
