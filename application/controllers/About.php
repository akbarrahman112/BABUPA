<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$x['judul'] = 'BABUPA | Halaman Tentang Kami'; 
		$this->load->view('templates/header', $x);
		$this->load->view('about/tentangkami');
		$this->load->view('templates/footer');
	}
}