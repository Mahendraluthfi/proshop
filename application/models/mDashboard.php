<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDashboard extends CI_Model {

	var $table = 'g_log'; //nama tabel dari database
	var $column_order = array(null, 'datetime','user','log'); //field yang ada di table
	var $column_search = array('datetime','user','log'); //field yang diizin untuk pencarian 
	var $order = array('idLog' => 'desc'); // default order 

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->database();
	// }

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}	


	public function get_saletoday()
	{
		$today = date('Y-m-d');
		$this->db->select('*, SUM(g_invoice_det.qtyProduct) as totaljual');
		$this->db->from('g_invoice_det');
		$this->db->join('g_invoice', 'g_invoice.idInvoice = g_invoice_det.idInvoice');
		$this->db->join('g_products', 'g_invoice_det.idProduct = g_products.idProduct');
		$this->db->where('g_invoice.dateInvoice', $today);
		$this->db->group_by('g_invoice_det.idProduct');
		$db = $this->db->get();
		return $db;
	}

}

/* End of file mDashboard.php */
/* Location: ./application/models/mDashboard.php */