<?php
class Menu extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$data['Booking'] = $this->Booking_model->read();
		$x['judul'] = 'booking ';
		$this->load->view('template/header_navbar', $x);
		$this->load->view('cara_booking', $data);
		$this->load->view('template/footer_navbar');
	
	}

}