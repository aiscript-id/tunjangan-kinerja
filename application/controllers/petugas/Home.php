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
 * | Last Modified   : Thursday, 12th March 2020 10:57:41 am
 * |==============================================================|
 */

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "3") {
            redirect('', 'refresh');
        }
    }

    // user
    public function user()
    {
        $data = $this->db->select('tbl_user.*, jabatan, kelas, tunjangan, jabatan.id as id_jabatan, , tbl_role.id as id_role')
        ->where('tbl_user.id', $this->session->userdata('id'))
        ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
        ->join('jabatan', 'tbl_user.jabatan_id = jabatan.id')
        ->get('tbl_user')
        ->row();
        return $data;
    }

    public function index()
    {
		$data = konfigurasi('Dashboard');
        $user = $this->user();
        $data['user'] = $user;
        $data['tunjangan'] = $this->db->select('tunjangan.*,  periode_tunjangan.id as periode_id, verifikasi, awal, ttd, akhir, periode_tunjangan.periode as name_periode')
        ->where('user_id', $user->id )
        ->join('periode_tunjangan', 'periode_tunjangan.tanggal = tunjangan.periode')
        ->get('tunjangan')->last_row();
        $this->template->load('layouts/template', 'pegawai/dashboard', $data);
    }
}
