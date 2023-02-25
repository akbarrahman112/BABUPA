<?php

class Galeri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Galeri_model');
		$this->load->model('Pengelola_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('file');			
	}

	public function index()
	{
		$data['menu'] = $this->Galeri_model->getMaingaleri();
		$x['judul'] = 'BABUPA | Halaman Galeri';
		$this->load->view('templates/header', $x);
		$this->load->view('galeri/g_page', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_galeri)
	{
		$data['menu'] = $this->Galeri_model->Detailgaleri($id_galeri);
		$data['judul'] = 'BABUPA | Halaman Detail Galeri';
		$this->load->view('templates/header', $data);
		$this->load->view('galeri/detail_galeri');
		$this->load->view('templates/footer');
	}
	public function editgaleri($id_galeri)
	{
		$config['upload_path'] ='./assets/bukti_tf';
		$config['allowed_types'] ='gif|png|jpg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload',$config);

		if($this->upload->do_upload('gambar')){
			$data = $this->upload->data();
			$this->Galeri_model->edit_galeri($id_galeri);
		}
		else{
			$this->Galeri_model->edit_galeri($id_galeri);
		}			

		redirect('admin/galeri');
	}

}