<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	    $this->load->model('mtype');
	}

	public function index()
	{
		$data['row'] = $this->db->get('g_users')->result();
		$data['content'] = 'user';
		$this->load->view('index', $data);		
	}

	public function get($id)
	{
		$data = $this->db->get_where('g_users', array('idUsers' => $id))->row();
		echo json_encode($data);
	}

	public function simpan(){
		
			$data = array(				
					'user' => $this->input->post('user'),
					'password' => md5($this->input->post('password')),
					'level' => $this->input->post('level'),
				);
			$this->db->insert('g_users', $data);
			
			$this->session->set_flashdata('msg', 
	            '<div class="alert alert-info">
	                <strong>Simpan Berhasil !</strong>                
	            </div>');
		
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){

		$data = array(

			'user' => $this->input->post('user'),
			'level' => $this->input->post('level'),
		);

		$password = $this->input->post('password');
		if (!empty($password)) {
			$data['password'] = md5($this->input->post('password'));
			
		}				

		$this->db->where('idUsers', $id);
		$this->db->update('g_users', $data);			
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-success">
                <strong>Edit Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->db->where('idUsers', $id);
		$this->db->delete('g_users');
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-success">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('user','refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */