<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Pengelola_model');		
		$this->load->helper('download');	
	}

	public function index()
	{		
		if(! $this->session->userdata('username')) redirect('login');

        if ($this->session->userdata('usertype') != 'Pengelola') {
            redirect('');
        }else {
            $x['judul'] = 'BABUPA | Home Pengelola'; 
            $this->load->view('pengelola/pengelola_home', $x);
            $this->load->view('templates/footer_auth');
        }
	}

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function profile()
	{
		$x['judul'] = 'BABUPA | Halaman Profile';
		$this->load->view('pengelola/pengelola_profile', $x);
		$this->load->view('templates/footer_auth');
	}

	public function changepass()
	{
		if($this->input->post('change') && $this->validation('change')) {
			$change=$this->Pengelola_model->getuser($this->session->userdata('username'));
			if(password_verify($this->input->post('old_password'), $change->password)){
				if($this->Pengelola_model->changepass())
					$this->session->set_flashdata('success','Password berhasil diubah');
				else
					$this->session->set_flashdata('error','Ubah password gagal!');
			}else {
				$this->session->set_flashdata('error','Password lama salah!');
			}
		}
		$this->load->view('pengelola/pengelola_changepass');
	}

	public function changephoto()
	{
		if(! $this->session->userdata('username')) redirect('auth/login'); //filter login
		$data['error']='';
		if($this->input->post('upload')) {
			if($this->upload()){ //jika upload berhasil
				$this->Pengelola_model->changephoto($this->upload->data('file_name')); //ubah data foto di database
				$this->session->set_userdata('foto',$this->upload->data('file_name')); //update data session
				$this->session->set_flashdata('Success','Foto Berhasil Diubah'); //pesan sukses
			}else $data['error'] = $this->upload->display_errors(); //jika gagal upload
		}
		$this->load->view('pengelola/pengelola_changephoto', $data);
		$this->load->view('templates/footer_auth');
	}
	
	private function upload()
	{
		$config['upload_path']		= './profile/';
		$config['allowed_types']	= 'gif|jpg|jpeg|png';
		$config['max_size']			= 100;
		$config['max_width']		= 1024;
		$config['max_height']		= 768;
		
		$this->load->library('upload', $config);
		return $this->upload->do_upload('foto');
	}

	private function validation($type)
	{
		$this->load->library('form_validation');
		
		if($type=='login') {
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		}
		
		if($this->form_validation->run())
		return FALSE;
	}

	public function daftarpesanan()
	{
		if($this->session->userdata('usertype') == 'Pengelola' ){									
			$data['pesanan'] = $this->Pengelola_model->getAllPesanan();
			$data['title'] = 'BABUPA| Daftar Pesanan';
			$this->load->view('pengelola/daftar_pesanan', $data);
			$this->load->view('templates/footer_auth');
		}else{
			redirect('');
		}
	}
	public function terimaBayar($id_pemesanan)
	{
		$config['upload_path'] ='./assets/bukti_tf';
		$config['allowed_types'] ='gif|png|jpg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload',$config);

		if($this->upload->do_upload('file_tiket')){
			$data = $this->upload->data();
			$this->Pengelola_model->terima_bayar($id_pemesanan);
		}
		else{
			$this->Pengelola_model->terima_bayar($id_pemesanan);
		}			

		redirect('pengelola/daftarpesanan');
	}

	public function tolakBayar($id_pemesanan)
	{
		$this->Pengelola_model->tolak_bayar($id_pemesanan);
		redirect('pengelola/daftarpesanan');
	}


}