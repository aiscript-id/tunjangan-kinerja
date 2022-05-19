<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportKehadiran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('excel','session'));
	}

	public function index()
	{
		$this->load->model('ImportModel');
		$data = array(
			'list_data'	=> $this->ImportModel->getData()
		);
		$this->load->view('import_excel.php',$data);
	}

	public function import_excel(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					// $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					// $jurusan = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					// $angkatan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					// $temp_data[] = array(
					// 	'nama'	=> $nama,
					// 	'jurusan'	=> $jurusan,
					// 	'angkatan'	=> $angkatan
					// ); 	
                    $periode = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                    $user = $this->db->where('username', $worksheet->getCellByColumnAndRow(1, $row)->getValue())->get('tbl_user')->row();
                        if (@$user) {
                            // cek kehadiran 
                            $kehadiran = $this->db->where('user_id', $user->id)->where('periode', $periode)->get('kehadiran')->row();
                            if (!@$kehadiran) {
                                $temp_data[] = array(
                                    'user_id'	=> $user->id,
                                    'periode'	=> $periode,
                                    'hadir'	=> $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
                                    'tl'	=> $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
                                    'pa'	=> $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
                                    'ta'	=> $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
                                    'tad'	=> $worksheet->getCellByColumnAndRow(9, $row)->getValue(),
                                    'tap'	=> $worksheet->getCellByColumnAndRow(10, $row)->getValue(),
                                    'izin'	=> $worksheet->getCellByColumnAndRow(11, $row)->getValue(),
                                    'alpa'	=> $worksheet->getCellByColumnAndRow(12, $row)->getValue(),
                                    'alb'	=> $worksheet->getCellByColumnAndRow(13, $row)->getValue(),
                                    'bs'	=> $worksheet->getCellByColumnAndRow(14, $row)->getValue(),
                                    'dn'	=> $worksheet->getCellByColumnAndRow(15, $row)->getValue(),
                                    'sakit'	=> $worksheet->getCellByColumnAndRow(16, $row)->getValue(),
                                    'csa'	=> $worksheet->getCellByColumnAndRow(17, $row)->getValue(),
                                    'validasi' => 0
                                ); 	
                            }
                        }
				}
			}
			$this->load->model('ImportModel');
			$insert = $this->ImportModel->insertKehadiran($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

}