<?php

class Destinasi extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Destinasi_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('file');			
	}

	public function index()
	{
		$data['menu'] = $this->Destinasi_model->getMainDestinasi();
		$x['judul'] = 'BABUPA | Halaman Destinasi';
		$this->load->view('templates/header', $x);
		$this->load->view('destinasi/b_page', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_wisata)
	{
		$data['menu'] = $this->Destinasi_model->DetailWisata($id_wisata);
		$data['judul'] = 'BABUPA | Halaman Detail Destinasi';
		$this->load->view('templates/header', $data);
		$this->load->view('destinasi/detail_destinasi');
		$this->load->view('templates/footer');
	}

}