<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Kontak_model');
		
	}

	public function index()
	{		
			// if(! $this->session->userdata('username')) redirect('auth/login');
			// if ($this->session->userdata('usertype')=='ADMIN') {
			// $this->load->view('user/us_home');
			// }else {
			$data['menu'] = $this->Kontak_model->getreview();
			$x['judul'] = 'BABUPA | Home Page'; 
			$this->load->view('templates/header', $x);
			$this->load->view('home', $data);
			$this->load->view('templates/footer');
			// }
	}
}