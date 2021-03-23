<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MInvoice extends CI_Model {
	
	public function get_inv($id)
		{
			$this->db->select('g_invoice_det.*, g_products.productName, g_type.typeName');
			$this->db->from('g_invoice_det');
			$this->db->join('g_products', 'g_products.idProduct = g_invoice_det.idProduct');
			$this->db->join('g_type', 'g_products.idType = g_type.idType');
			$this->db->where('g_invoice_det.idInvoice', $id);
			$db = $this->db->get();
			return $db;
		}	

	public function delete($id)
	{
		foreach ($this->db->get_where('g_invoice_det', array('idInvoiceDet' => $id))->result() as $key) {
			$this->db->query("UPDATE g_products SET productStock = productStock + '$key->qtyProduct' WHERE idProduct = '$key->idProduct'");			
		}
		$this->db->where('idInvoiceDet', $id);
		$this->db->delete('g_invoice_det');
	}

	public function sumofinv($id)
	{
		$this->db->select('CASE WHEN SUM(totalPrice) > 0 then SUM(totalPrice) ELSE 0 END AS ttl');
		$this->db->from('g_invoice_det');
		$this->db->where('idInvoice', $id);
		$db = $this->db->get();
		return $db;
	}
	
	public function invoice_list($id)
	{
		$this->db->select('g_invoice_det.*, g_products.productName, g_type.*');
		$this->db->from('g_invoice_det');
		$this->db->join('g_products', 'g_invoice_det.idProduct = g_products.idProduct');
		$this->db->join('g_type', 'g_products.idType = g_type.idType');
		$this->db->where('g_invoice_det.idInvoice', $id);
		$db = $this->db->get();
		return $db;
	}

	public function show_retur()
	{
		$this->db->select('g_retur.*, g_supplier.supplierName, g_products.productName, g_type.typeName');
		$this->db->from('g_retur');
		$this->db->join('g_supplier', 'g_retur.idSupplier = g_supplier.idSupplier');
		$this->db->join('g_products', 'g_retur.idProduct = g_products.idProduct');
		$this->db->join('g_type', 'g_products.idType = g_type.idType');
		return $this->db->get();

	}

	public function get_table($id)
	{
		$this->db->select('*, SUM(g_invoice_det.qtyProduct) as qty, SUM(g_invoice_det.totalPrice) as subtotal');
		$this->db->from('g_invoice_det');
		$this->db->join('g_products', 'g_products.idProduct = g_invoice_det.idProduct');
		$this->db->where('g_invoice_det.idInvoice', $id);
		$this->db->group_by('g_invoice_det.idProduct');
		$this->db->order_by('g_invoice_det.idInvoiceDet', 'asc');
		$db = $this->db->get();
		return $db;

	}


}

/* End of file mInvoice.php */
/* Location: ./application/models/mInvoice.php */