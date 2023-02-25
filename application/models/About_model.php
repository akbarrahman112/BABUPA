<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {


	public function create()
	{
		// $pass = random_string('alnum', 16);
		$data = array (
			'username' => $this->input->post('username'),
			'usertype' => $this->input->post('usertype'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('username'), PASSWORD_DEFAULT)
			// 'password' => password_hash($pass, PASSWORD_DEFAULT)
			);
			$this->db->insert('user', $data);
	}
	
	public function read()
	{
		$query = $this->db->get('user');
		return $query->result();
	}
	
	public function read_by($userid)
	{
		$this->db->where('id_user', $userid);
		$query = $this->db->get('user');
		return $query->row();
	}
	
	public function update($userid)
	{
		$data = array (
			'username' => $this->input->post('username'),
			'usertype' => $this->input->post('usertype'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email')
			);
			$this->db->where('id_user', $userid);
			$this->db->update('user', $data);
	}
	
	public function delete($userid)
	{
		$this->db->where('id_user', $userid);
		$this->db->delete('user');
	}
	
	public function validation()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('usertype', 'Usertype', 'required|trim');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if($this->form_validation->run())
			return TRUE;
		else
			return FALSE;
	}
	
}