<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Auth_model');
	}

	public function registerform() {
		if($this->session->userdata('username')) redirect('');

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('fullname', 'Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('auth/register');
		}else{
			$data = [
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'usertype' => $this->input->post('usertype'),
				'fullname' => $this->input->post('fullname')
			];

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">			
			Registrasi Berhasil! Silahkan login disini.
		 	</div>');
			redirect('login');
		}	
	}

	public function loginform()
	{
		if($this->session->userdata('username')) redirect('');

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('auth/login');
		}else{
			$this->loginprocess();
		}
	}

	private function loginprocess()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->db->get_where('tb_user', ['username' => $username ])->row_array();
				
		if($login){
			//cek password
			if(password_verify($password, $login['password'])){
				$data = [
					'id_user' => $login['id_user'],
					'username' => $login['username'],
					'usertype' => $login['usertype'],
					'fullname' => $login['fullname'],
					'email' => $login['email'],
					'foto' => $login['foto']
				];
				$this->session->set_userdata($data);
				if($login['usertype'] == "Admin") {
					redirect('admin/home');
				}else if($login['usertype'] == "Pengelola") {
					redirect('pengelola/home');
				}else if($login['usertype'] == "Pengguna"){
					redirect('pengguna/home');
				}		
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">			
				Password yang anda masukkan salah!
				</div>');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger">			
			Username tidak terdaftar!
		 	</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('foto');
		$this->session->set_flashdata('message', '<div class="alert alert-success">			
			Anda berhasil logout.
		 	</div>');
			redirect('login');
	}
	
	public function profile()
	{
		$x['judul'] = 'BABUPA | Halaman Profile';
		$this->load->view('templates/header', $x);
		$this->load->view('auth/profile');
		$this->load->view('templates/footer');
	}

	public function changepass()
	{
		if($this->input->post('change') && $this->validation('change')) {
			$change=$this->Auth_model->getuser($this->session->userdata('username'));
			if(password_verify($this->input->post('old_password'), $change->password)){
				if($this->Auth_model->changepass())
					$this->session->set_flashdata('success','Password berhasil diubah');
				else
					$this->session->set_flashdata('error','Ubah password gagal!');
			}else {
				$this->session->set_flashdata('error','Password lama salah!');
			}
		}
		$this->load->view('auth/changepass');
	}

	public function changephoto()
	{
		if(! $this->session->userdata('username')) redirect('auth/login'); //filter login
		$data['error']='';
		if($this->input->post('upload')) {
			if($this->upload()){ //jika upload berhasil
				$this->Auth_model->changephoto($this->upload->data('file_name')); //ubah data foto di database
				$this->session->set_userdata('foto',$this->upload->data('file_name')); //update data session
				$this->session->set_flashdata('Success','Foto Berhasil Diubah'); //pesan sukses
			}else $data['error'] = $this->upload->display_errors(); //jika gagal upload
		}
		$x['judul'] = 'BABUPA | Halaman Ubah Foto';
		$this->load->view('templates/header', $x);
		$this->load->view('auth/changephoto', $data);
		$this->load->view('templates/footer');
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
}