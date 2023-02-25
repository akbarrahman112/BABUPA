<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

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
			$this->db->insert('tb_user', $data);
	}
	
	public function getuser($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('tb_user')->row();
	}

	public function changepass()
	{
		$this->db->set('password', password_hash($this->input->post('new_password'), PASSWORD_DEFAULT));
		$this->db->where('username', $this->session->userdata('username'));
		return $this->db->update('tb_user');
	}

	public function changephoto($foto)
	{
		if($this->session->userdata('foto') != 'default.png')
			unlink('./profile/'.$this->session->userdata('foto')); //hapus foto lama
			
		$this->db->set('foto', $foto);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('tb_user');
	}
	
}