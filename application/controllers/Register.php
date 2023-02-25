<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

    public function register()
	{
		if($this->input->post('register') && $this->validation('register')) {
			$register=$this->Auth_model->register($this->input->post('nama', 'email', 'username',));
			if($register != NULL) {
				if(password_verify($this->input->post('password'), $register->password)) {
					$data = array (
                        'nama'      => $register->nama,
                        'email'     => $register->email,
						'username' 	=> $register->username
					);
					$this->session->set_userdata($data);
					redirect('auth/login');
				}
			}
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
		}
		$this->load->view('register');
	}

    public function validation($type)
	{
        $this->load->library('form_validation');

        if($type=='register') {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('username', 'username','required');
		$this->form_validation->set_rules('password', 'password','required');
        }

        if($this->form_validation->run())
		return TRUE;
	}
}