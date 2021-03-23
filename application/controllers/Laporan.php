<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('././vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Laporan extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }	 
	    $this->load->model('mlaporan');
	}

	public function index()
	{
		$data['content'] = 'laporan';		
		$this->load->view('index', $data);
	}

	public function penjualan()
	{
		$tgla = $this->input->post('tgla');
		$tglb = $this->input->post('tglb');

		$getlaporan = $this->mlaporan->get_laporan_penjualan($tgla,$tglb)->result();
		$celltitle = 'Laporan Penjualan - '.$tgla.' s/d '.$tglb;			

		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Proshop')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->getActiveSheet()->mergeCells('A1:D1');
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', $celltitle)		
		->setCellValue('A4', 'No')
		->setCellValue('B4', 'Tanggal')
		->setCellValue('C4', 'Invoice')
		->setCellValue('D4', 'Nama Produk')		
		->setCellValue('E4', 'Kategori')		
		->setCellValue('F4', 'Jumlah')		
		->setCellValue('G4', 'Harga')		
		->setCellValue('H4', 'Subtotal')		
		->setCellValue('I4', 'Customer')		
		->setCellValue('J4', 'Kasir')		
		;

		foreach(range('A','J') as $columnID) {
 		   $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
		}
		$spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');
		$spreadsheet->getActiveSheet()->getStyle('A4:J4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		$no =1;
		$i = 5; foreach($getlaporan as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->dateInvoice)
		->setCellValue('C'.$i, $data->idInvoice)
		->setCellValue('D'.$i, $data->productName)
		->setCellValue('E'.$i, $data->typeName)
		->setCellValue('F'.$i, $data->jmlbeli)
		->setCellValue('G'.$i, $data->priceIn)
		->setCellValue('H'.$i, $data->totalbeli)	
		->setCellValue('I'.$i, $data->customer)	
		->setCellValue('J'.$i, $data->kasir);	
		$i++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Export Data Report');

		$spreadsheet->setActiveSheetIndex(0);
		$filename = $celltitle.".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');

		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;		
		// print_r($getlaporan);
	}

	public function pembelian()
	{
		$tgla = $this->input->post('tglc');
		$tglb = $this->input->post('tgld');

		$getlaporan = $this->mlaporan->get_laporan_pembelian($tgla,$tglb)->result();
		$celltitle = 'Laporan Pembelian - '.$tgla.' s/d '.$tglb;			

		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Proshop')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->getActiveSheet()->mergeCells('A1:D1');
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', $celltitle)		
		->setCellValue('A4', 'No')
		->setCellValue('B4', 'Tanggal')
		->setCellValue('C4', 'Purchase Order')
		->setCellValue('D4', 'Nama Produk')		
		->setCellValue('E4', 'Kategori')		
		->setCellValue('F4', 'Jumlah')		
		->setCellValue('G4', 'Harga Beli')		
		->setCellValue('H4', 'Subtotal')					
		;

		foreach(range('A','H') as $columnID) {
 		   $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
		}
		$spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');
		$spreadsheet->getActiveSheet()->getStyle('A4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		$no =1;
		$i = 5; foreach($getlaporan as $data) {
			$subtot = $data->qty*$data->pricebuy;
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->date)
		->setCellValue('C'.$i, $data->purchaseOrder)
		->setCellValue('D'.$i, $data->productName)
		->setCellValue('E'.$i, $data->typeName)		
		->setCellValue('F'.$i, $data->qty)
		->setCellValue('G'.$i, $data->pricebuy)	
		->setCellValue('H'.$i, $subtot);			
		$i++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Export Data Report');

		$spreadsheet->setActiveSheetIndex(0);
		$filename = $celltitle.".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');

		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;		
		// print_r($getlaporan);
	}

	public function service()
	{
		$tgla = $this->input->post('tgle');
		$tglb = $this->input->post('tglf');

		$getlaporan = $this->mlaporan->get_laporan_service($tgla,$tglb)->result();
		$celltitle = 'Laporan Service - '.$tgla.' s/d '.$tglb;			

		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Proshop')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->getActiveSheet()->mergeCells('A1:D1');
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', $celltitle)		
		->setCellValue('A4', 'No')
		->setCellValue('B4', 'Tanggal')
		->setCellValue('C4', 'idService')
		->setCellValue('D4', 'Nama Produk')		
		->setCellValue('E4', 'Tindakan')		
		->setCellValue('F4', 'Biaya')		
		->setCellValue('G4', 'Jumlah')		
		->setCellValue('H4', 'Subtotal')		
		->setCellValue('I4', 'Customer')		
		->setCellValue('J4', 'Kasir')		
		;

		foreach(range('A','J') as $columnID) {
 		   $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
		}
		$spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');
		$spreadsheet->getActiveSheet()->getStyle('A4:J4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		$no =1;
		$i = 5; foreach($getlaporan as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->date)
		->setCellValue('C'.$i, $data->idService)
		->setCellValue('D'.$i, $data->namaBarang)
		->setCellValue('E'.$i, $data->tindakan)
		->setCellValue('F'.$i, $data->biaya)
		->setCellValue('G'.$i, $data->qty)
		->setCellValue('H'.$i, $data->subtotal)	
		->setCellValue('I'.$i, $data->customer)	
		->setCellValue('J'.$i, $data->kasir);	
		$i++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Export Data Report');

		$spreadsheet->setActiveSheetIndex(0);
		$filename = $celltitle.".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');

		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;		
		// print_r($getlaporan);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */