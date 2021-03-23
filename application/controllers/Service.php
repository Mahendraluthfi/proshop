<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
		$id_inv = 'SRVC'.strtoupper(date('Ym').bin2hex(random_bytes(5)));	
		$cek = $this->db->get_where('g_service', array('status' => 0))->num_rows();
		if (empty($cek)) {
			$this->db->insert('g_service', array(
				'idservice' => $id_inv
			));

			$id = $id_inv;
		}else{
			$get = $this->db->get_where('g_service', array('status' => 0))->row();
			$id = $get->idService;
		}
		$array = array(
			'nomor_service' => $id
		);
		
		$this->session->set_userdata( $array );
		$data['content'] = 'service';
		$this->load->view('index', $data);		
	}

	public function get_subtotal($id)
	{
		$data = $this->db->query("SELECT SUM(subtotal) as subtot FROM g_service_det WHERE idService='$id'")->row();
		echo json_encode($data);

	}

	public function get_table($id)
	{
		$data = $this->db->get_where('g_service_det', array('idService' => $id))->result();
		echo json_encode($data);
	}

	public function add_item()
	{
		$biaya = str_replace(',', '', $this->input->post('biaya'));
		$qty = $this->input->post('qty');
		$subtotal = $biaya * $qty;
		$barang = $this->input->post('namaBarang');
		$this->db->insert('g_service_det', array(
			'idService' => $this->session->userdata('nomor_service'),
			'namaBarang' => $barang,
			'tindakan' => $this->input->post('tindakan'),
			'biaya' => $biaya,
			'qty' => $qty,
			'subtotal' =>  $subtotal		
		));

		echo json_encode(true);
	}

	public function hapus_item()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('g_service_det');
		echo json_encode(true);
	}

	public function confirm_service($id)
	{
		$this->db->where('idService', $id);
		$this->db->update('g_service', array(
			'customer' => $this->input->post('customer'),
			'date' => $this->input->post('date'),
			'total' => $this->input->post('total'),
			'discount' => str_replace(',', '', $this->input->post('discount')),
			'payment' => str_replace(',', '', $this->input->post('payment')),
			'pay_change' => str_replace(',', '', $this->input->post('pay_change')),
			'pay_method' => $this->input->post('pay_method'),
			'notice' => $this->input->post('notice'),
			'kasir' => $this->session->userdata('user'),
			'status' => 1,
		));
		echo json_encode(true);
	}

	public function print($id)
	{
		$data['service'] = $this->db->get_where('g_service', array('idService' => $id))->row();
		$data['det'] = $this->db->get_where('g_service_det', array('idService' => $id))->result();
		$this->load->view('print_service', $data);
	}

	public function dataview()
	{
		$data['content'] = 'service_data';
		$data['get'] = $this->db->query("SELECT * FROM g_service WHERE status ='1' ORDER BY date DESC")->result();
		$this->load->view('index', $data);		
	}

	public function get_detail($id)
	{
		$this->db->from('g_service_det');
		$this->db->join('g_service', 'g_service.idService = g_service_det.idService');
		$this->db->where('g_service_det.idService', $id);
		$data = $this->db->get()->result();
		echo json_encode($data);
	}

}

/* End of file Service.php */
/* Location: ./application/controllers/Service.php */