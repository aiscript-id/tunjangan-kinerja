<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportModel extends CI_Model {

	public function insertKehadiran($data){
		$insert = $this->db->insert_batch('kehadiran', $data);
		if($insert){
			return true;
		}
	}

	public function insertLaporanKinerja($data){
		$insert = $this->db->insert_batch('lapkin_detail', $data);
		if($insert){
			return true;
		}
	}

	public function getData(){
		$this->db->select('*');
		return $this->db->get('tbl_data2')->result_array();
	}

}