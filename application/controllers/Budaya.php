<?php
class Budaya extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Budaya_model');
	}

	public function index()
	{
		$data['destinasi'] = $this->Budaya_model->read();
		$x['judul'] = 'Budaya Page'; 
		$this->load->view('template/header_navbar', $x);
		$this->load->view('budaya/bu_page', $data);
		$this->load->view('template/footer_navbar');
	}

}