<?php
class Profile extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$data['profile'] = $this->Profile_model->read();
		$x['judul'] = 'profile ';
		$this->load->view('template/header_navbar', $x);
		$this->load->view('profile/profile_page', $data);
		$this->load->view('template/footer_navbar');
	
	}

}