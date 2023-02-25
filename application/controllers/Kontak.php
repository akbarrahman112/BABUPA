<?php

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Kontak_model');
		$this->load->model('Pengguna_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('file');			
	}

	public function index()
	{
		$x['judul'] = 'BABUPA | Halaman Kontak Kami'; 
		$x['user'] = $this->Pengguna_model->getWisata();
		$this->load->view('templates/header', $x);
		$this->load->view('kontak/kontakkami', $x);
		$this->load->view('templates/footer');
	}

	public function reviewulasan()
	{
		if($this->session->userdata('usertype') == 'Pengguna' ){
			$data['data'] = $this->Kontak_model->datareview();
			$x['judul'] = 'BABUPA | Review & Ulasan';
			$this->load->view('templates/header_navbar', $x);
			$this->load->view('kontak/kontak_review', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('');
		}
	}

	public function review()
	{
		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('id_wisata','Tempat Wisata', 'required'); 
		$this->form_validation->set_rules('review_ulasan','Review Ulasan', 'required');    		

		if($this->form_validation->run() != FALSE){
			$this->Kontak_model->review();
			redirect('kontak/reviewulasan');
		}else{
				$x['judul'] = 'BABUPA| Review & Ulasan';
				$x['user'] = $this->Pengguna_model->getWisata();
				$this->load->view('kontak/kontakkami', $x);
				$this->load->view('templates/footer');
		}
				redirect('');
	}

	public function delete($id_review)
	{
		$this->Kontak_model->delete($id_review);
		redirect('kontak/reviewulasan');
	}


}