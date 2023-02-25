<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('username')) redirect('auth/login');
		$this->load->model('User_model');
	}
	
	public function user()
	{
		$data['users']=$this->User_model->user();
		$this->load->view('user/us_user', $data);
		$this->load->view('templates/footer');
	}

	public function home()
	{
		$this->load->view('user/us_home');
		$this->load->view('templates/footer');
	}

	public function destinasi()
	{
		$data['users']=$this->User_model->destinasi();
		$this->load->view('user/us_destinasi', $data);
		$this->load->view('templates/footer');
	}
	
	public function insert()
	{
		if($this->input->post('simpan')) {
			$this->User_model->create();
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success','Data user berhasil ditambahkan');
			}else {
				$this->session->set_flashdata('error','Tambah data user gagal!');
			}
			redirect('user');
		}
		
		$this->load->view('user/us_form');
	}
	
	public function edit($userid)
	{
		if($this->input->post('simpan')) {
			$this->User_model->update($userid);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success','Data user berhasil diedit');
			}else {
				$this->session->set_flashdata('error','Edit data user gagal!');
			}
			redirect('user');
		}
		$data['users']=$this->User_model->read_by($userid);
		$this->load->view('user/us_form', $data);
	}
	
	public function delete($userid)
	{
		$this->User_model->delete($userid);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data user berhasil dihapus');
		}else {
			$this->session->set_flashdata('error','Hapus data user gagal!');
		}
		redirect('user');
	}


	// Bahan Revisi
	private function sendmail($userid)
	{
		$data = $this->User_model->read_by($userid);

		// Konfigurasi email
		$config = [
			'mailtype'		=> 'html',
			'charset'   	=> 'utf-8',
			'protocol'  	=> 'smtp',
			'smtp_host' 	=> 'smtp.googlemail.com',
			'smtp_user' 	=> 'bangsaltugas29@gmail.com',  // Email Pengirim
			'smtp_pass'		=> '29102000latif',  // Password Email
			'smtp_crypto'	=> 'ssl',
			'smtp_port'		=> 465,
			'newline'		=> "\r\n"
		];

		$this->email->initialize($config);

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('bangsaltugas29@gmail.com', 'Admin Web App');

		// Email penerima
		$this->email->to($data->email); // Email Tujuan

		// Subject email
		$this->email->subject('Account Sudah Berhasil Dibuat');

		// Isi email
		$username = $this->username;
		$pass = $this->password;
		$fullname = $this->fullname;
		$this->email->message("Selamat $fullname, account sudah bisa digunakan. <br><br> Data untuk login seperti dibawah: <br> Username: $username <br> Password : $pass <br><br> Klik <strong><a href='http://localhost/management/index.php/auth/login' target='_blank' rel='noopener'>disini</a></strong> untuk login.");

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			echo $this->email->send();
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

}