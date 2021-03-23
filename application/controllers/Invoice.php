<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	    $this->load->model('mproduct');
	    $this->load->model('minvoice');
	}

	public function index()
	{
		$id_inv = strtoupper(date('Ymd').bin2hex(random_bytes(5)));				
		$cek = $this->db->get_where('g_invoice', array('status' => 0))->num_rows();
		if (empty($cek)) {
			$this->db->insert('g_invoice', array(
				'idInvoice' => $id_inv
			));

			$id = $id_inv;
		}else{
			$get = $this->db->get_where('g_invoice', array('status' => 0))->row();
			$id = $get->idInvoice;
		}
		$array = array(
			'nomor_invoice' => $id
		);
		
		$this->session->set_userdata( $array );
		$data['content'] = 'invoice_add';		
		$this->load->view('index', $data);		
	}
	

	public function dataview()
	{
		$data['content'] = 'invoice';
		$data['get'] = $this->db->query("SELECT * FROM g_invoice WHERE status ='1' ORDER BY dateInvoice DESC")->result();
		$this->load->view('index', $data);		
	}

	function sum_of_inv()
	{
		$data = $this->minvoice->sumofinv($this->session->userdata('inv'))->row();
		echo json_encode($data);
	}

	function get_invoice(){
		$data = $this->minvoice->get_inv($this->session->userdata('inv'))->result();
		echo json_encode($data);
	}

	function add_invoice(){
		$idp = $this->input->post('prod');
		$qty = $this->input->post('qty');
		$insert = array(
			'idInvoice' => $this->session->userdata('inv'),
			'idProduct' => $this->input->post('prod'),
			'priceIn' => $this->input->post('price'),
			'qtyProduct' => $this->input->post('qty'),
			'totalPrice' => ($this->input->post('qty') * $this->input->post('price'))
		);
		$this->db->query("UPDATE g_products SET productStock = productStock - '$qty' WHERE idProduct = '$idp'");
		$data = $this->db->insert('g_invoice_det', $insert);
		echo json_encode($data);
	}

	function delete(){
		$id=$this->input->post('kode');		
		$data = $this->minvoice->delete($id);
		echo json_encode($data);
	}

	public function save(){
		foreach ($this->minvoice->sumofinv($this->session->userdata('inv'))->result() as $key) {
			$sum = $key->ttl;
		}
		$data = array(
			'idInvoice' => $this->session->userdata('inv'),
			'customer' => $this->input->post('cst'),
			'dateInvoice' => $this->input->post('date'),
			'totalPrice' => $sum,
			'notice' => $this->input->post('ket')
		);
		$this->db->insert('g_invoice', $data);
		$this->db->insert('g_log', array(
			'datetime' => date('Y-m-d H:i:s'),
			'user' => $this->session->userdata('user'),
			'log' => $this->session->userdata('user').' melakukan transaksi Penjualan'
		));	
		$this->session->unset_userdata('inv');
		redirect('invoice','refresh');
	}

	public function get_detail($id)
	{
		$data = $this->minvoice->invoice_list($id)->result();
		echo json_encode($data);
	}

	public function add_item()
	{
		$idInvoice = $this->input->post('idInvoice');
		$barcode = $this->input->post('barcode');
		$cek = $this->db->get_where('g_products', array('barcode' => $barcode));
		if ($cek->num_rows() > 0) {
			$get  = $cek->row();

			$cek_jml_beli = $this->db->get_where('g_invoice_det', array('idInvoice' => $idInvoice, 'idProduct' => $get->idProduct))->num_rows();
			// echo $cek_jml_beli;
			if ($get->productStock <= $cek_jml_beli) {
				echo json_encode(array('status' => 'habis'));
				
			}else{
				$this->db->insert('g_invoice_det', array(
					'idInvoice' => $this->input->post('idInvoice'),
					'idProduct' => $get->idProduct,
					'priceIn' => $get->price,
					'qtyProduct' => 1,
					'totalPrice' => $get->price,
				));
				echo json_encode(true);
			}
		}else{
			echo json_encode(false);
		}
	}

	public function get_table($id)
	{
		$data = $this->minvoice->get_table($id)->result();
		echo json_encode($data);
	}

	public function get_subtotal($id)
	{
		$data = $this->db->query("SELECT SUM(totalPrice) as subtotal FROM g_invoice_det WHERE idInvoice='$id'")->row();
		echo json_encode($data);

	}

	public function update_jml_item()
	{
		$idProduct = $this->input->post('idProduct');
		$idInvoice = $this->input->post('idInvoice');
		$jmlbeli = $this->input->post('jmlbeli');
		
		$this->db->where('idProduct', $idProduct);
		$this->db->where('idInvoice', $idInvoice);
		$this->db->delete('g_invoice_det');
		
		$cek = $this->db->get('g_products', array('idProduct' => $idProduct))->row();
		if ($cek->productStock < $jmlbeli) {
			echo json_encode(false);			
		}else{
			$get = $this->db->get_where('g_products', array('idProduct' => $idProduct))->row();

			for ($i=0; $i < $jmlbeli ; $i++) { 
				$this->db->insert('g_invoice_det', array(
					'idInvoice' => $idInvoice,
					'idProduct' => $idProduct,
					'priceIn' => $get->price,
					'qtyProduct' => 1,
					'totalPrice' => $get->price
				));
			}

			echo json_encode(true);			
		}

	}

	public function hapus_item()
	{
		$this->db->where('idProduct', $this->input->post('idProduct'));
		$this->db->where('idInvoice', $this->input->post('idInvoice'));
		$this->db->delete('g_invoice_det');
		echo json_encode(true);
	}

	public function query_cari()
	{
		$keyword = $this->input->post('search_keyword');
		$data = $this->db->query("SELECT * FROM g_products WHERE productName LIKE '%$keyword%' LIMIT 10")->result();
		// $data = $this->db->get('g_products')->result();
		echo json_encode($data);
	}

	public function confirm_invoice($id)
	{
		$this->db->where('idInvoice', $id);
		$this->db->update('g_invoice', array(
			'customer' => $this->input->post('customer'),
			'dateInvoice' => $this->input->post('dateInvoice'),
			'totalPrice' => $this->input->post('totalPrice'),
			'discount' => str_replace(',', '', $this->input->post('discount')),
			'payment' => str_replace(',', '', $this->input->post('payment')),
			'pay_change' => str_replace(',', '', $this->input->post('pay_change')),
			'pay_method' => $this->input->post('pay_method'),
			'notice' => $this->input->post('notice'),
			'kasir' => $this->session->userdata('user'),
			'status' => 1,
		));

		$getbuy = $this->db->query("SELECT idProduct, SUM(qtyProduct) as qty FROM g_invoice_det WHERE idInvoice='$id' GROUP BY idProduct")->result();
		foreach ($getbuy as $data) {
			$this->db->query("UPDATE g_products SET productStock = productStock - '$data->qty' WHERE idProduct = '$data->idProduct'");			
		}

		echo json_encode(true);
	}

	public function print($id)
	{
		$data['invoice'] = $this->db->get_where('g_invoice', array('idInvoice' => $id))->row();
		$data['det'] = $this->minvoice->get_table($id)->result();
		$this->load->view('print', $data);
	}
}

/* End of file Invoice.php */
/* Location: ./application/controllers/Invoice.php */