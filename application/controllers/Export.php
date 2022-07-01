<?php
defined('BASEPATH') or exit('No direct script access allowed');

// // USE spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') == "4") {
            redirect('', 'refresh');
        }
    }

    public function rekap_excel($periode){
        // php spreadsheet
        

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getProperties()->setCreator('Admin')
        ->setLastModifiedBy('Admin')
        ->setTitle('Rekap Tunjangan')
        ->setSubject('Rekap Tunjangan')
        ->setDescription('Rekap Tunjangan')
        ->setKeywords('Rekap Tunjangan')
        ->setCategory('Rekap Tunjangan');

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'NIP');
        $sheet->setCellValue('D1', 'Jabatan');
        $sheet->setCellValue('E1', 'Golongan');
        $sheet->setCellValue('F1', 'Tunjangan');
        $sheet->setCellValue('G1', 'Potongan');
        $sheet->setCellValue('H1', 'Total');

        $tunjangan = $this->db->where('periode' , $periode)
        ->join('tbl_user', 'tbl_user.id = tunjangan.user_id')
        ->join('jabatan', 'jabatan.id = tbl_user.jabatan_id')
        ->select('tunjangan.*, tbl_user.first_name, tbl_user.last_name, tbl_user.username, jabatan.jabatan as jabatan, jabatan.kelas')
        ->get('tunjangan')->result();

        $i = 2;

        foreach ($tunjangan as $value) {
            
            $sheet->setCellValue('A'.$i, $i-1);
            $sheet->setCellValue('B'.$i, $value->first_name . ' ' . $value->last_name);
            $sheet->setCellValue('C'.$i, $value->username);
            $sheet->setCellValue('D'.$i, $value->jabatan);
            $sheet->setCellValue('E'.$i, $value->kelas);
            $sheet->setCellValue('F'.$i, $value->tunjangan);
            $sheet->setCellValue('G'.$i, $value->total_potongan);
            $sheet->setCellValue('H'.$i, $value->total_tunjangan);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Rekap Tunjangan '.$periode.'.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}
