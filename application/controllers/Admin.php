<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();	
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('file');			
	}

	public function index()
	{		
        if(! $this->session->userdata('username')) redirect('login');

        if ($this->session->userdata('usertype') != 'Admin') {
            redirect('');
        }else {
            $x['judul'] = 'BABUPA | Home Admin'; 
            $this->load->view('admin/admin_home',);
            $this->load->view('templates/footer_auth');
        }
	}
	
	public function user()
	{
		$data['users']=$this->Admin_model->user();
		$this->load->view('admin/admin_user', $data);
		$this->load->view('templates/footer_auth');
	}

	public function pengelola()
	{
		$data['users']=$this->Admin_model->getPengelola();
		$this->load->view('admin/admin_pengelola', $data);
		$this->load->view('templates/footer_auth');
	}

	public function tambahPengelola()
	{		
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('fullname', 'Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/admin_tambah_pengelola');
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
			redirect('admin/pengelola');
		}	
	}

	public function destinasi()
	{
		if($this->session->userdata('usertype') == 'Admin' ){
			$data['data'] = $this->Admin_model->getAllDestinasi();
			$data['title'] = 'BABUPA| Kelola Destinasi';
			$this->load->view('admin/admin_destinasi', $data);
			$this->load->view('templates/footer_auth');
		}else{
			redirect('');
		}
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required');
		$this->form_validation->set_rules('id_pengelola', 'ID Pengelola', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
		$this->form_validation->set_rules('deskripsi_lainnya', 'Deskripsi Lainnya', 'required');	
		$this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required');				
		
		if($this->session->userdata('usertype') == 'Admin' ){
			if($this->form_validation->run() == FALSE){				
				$data['title'] = 'BABUPA | Tambah Destinasi';
				$data['pengelola'] = $this->Admin_model->getPengelolaData();
				$this->load->view('admin/admin_form', $data);
				$this->load->view('templates/footer_auth');
			}else{
				$nama_wisata = $this->input->post('nama_wisata');
				$id_pengelola = $this->input->post('id_pengelola');
				$deskripsi = $this->input->post('deskripsi');
				$fasilitas = $this->input->post('fasilitas');
				$deskripsi_lainnya = $this->input->post('deskripsi_lainnya');
				$harga_tiket = $this->input->post('harga_tiket');
				$gambar = $_FILES['gambar'];
	
				if($gambar = ''){				
				}else{
					$config['upload_path'] = './assets/foto';
					$config['allowed_types'] = 'jpg|png|gif|jpeg';
	
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('gambar')){
						echo "Upload Gagal!"; die();
					}else{
						$gambar = $this->upload->data('file_name');
					}
				}					
	
				$data = array(
					'nama_wisata' => $nama_wisata,
					'id_pengelola' => $id_pengelola,
					'deskripsi' => $deskripsi,
					'fasilitas' => $fasilitas,
					'deskripsi_lainnya' => $deskripsi_lainnya,
					'harga_tiket' => $harga_tiket,
					'gambar' => $gambar				
				);						
							
				$this->db->insert('tb_wisata', $data);				
				redirect('admin/destinasi');
			}			
		}else{
			redirect('');
		}
	}

	public function edit($id_wisata)
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$config['upload_path'] ='./assets/foto';
		$config['allowed_types'] ='gif|png|jpg|jpeg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload',$config);

		$this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required');
		$this->form_validation->set_rules('id_pengelola', 'ID Pengelola', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
		$this->form_validation->set_rules('deskripsi_lainnya', 'Deskripsi Lainnya', 'required');	
		$this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required');


		if($this->form_validation->run() != FALSE){
			if($this->upload->do_upload('gambar')){
			  $data = $this->upload->data();
			  $this->Admin_model->edit_destinasi($id_wisata);			  
			}
			else{
				echo $this->Admin_model->edit_destinasi($id_wisata);
			}			
			  redirect('admin/destinasi');
		  }
		  else{
			if($this->session->userdata('usertype') == 'Admin' ){
				$data['data'] = $this->Admin_model->getDestinasiByID($id_wisata);	
				$data['pengelola'] = $this->Admin_model->getPengelolaData();			
				$data['title'] = 'BABUPA| Edit Destinasi ';
				$this->load->view('admin/admin_edit', $data);
				$this->load->view('templates/footer_auth');
			}else{
				redirect('');
			}
		  }
	}

	public function delete($id_wisata)
	{
		$this->Admin_model->delete_destinasi($id_wisata);
		redirect('admin/destinasi');
	}

	public function deletePengguna($id) 
	{
		$this->Admin_model->delete_pengguna($id);
		redirect('admin/user');
	}

	public function deletePengelola($id) 
	{
		$this->Admin_model->delete_pengelola($id);
		redirect('admin/pengelola');
	}

	public function galeri()
	{
		if($this->session->userdata('usertype') == 'Admin' ){
			$data['data'] = $this->Admin_model->getAllGaleri();
			$data['title'] = 'BABUPA | Kelola Galeri';
			$this->load->view('admin/admin_galeri', $data);
			$this->load->view('templates/footer_auth');
		}else{
			redirect('');
		}
	}

	public function gtambah()
	{
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');			
		
		if($this->session->userdata('usertype') == 'Admin' ){
			if($this->form_validation->run() == FALSE){				
				$data['title'] = 'BABUPA | Tambah Galeri';
				$this->load->view('admin/admin_gform', $data);
				$this->load->view('templates/footer_auth');
			}else{
				$deskripsi = $this->input->post('deskripsi');
				$gambar = $_FILES['gambar'];
	
				if($gambar = ''){				
				}else{
					$config['upload_path'] = './assets/image';
					$config['allowed_types'] = 'jpg|png|gif|jpeg';
	
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('gambar')){
						echo "Upload Gagal!"; die();
					}else{
						$gambar = $this->upload->data('file_name');
					}
				}					
				$data = array(
					'deskripsi' => $deskripsi,
					'gambar' => $gambar				
				);						
							
				$this->db->insert('tb_galeri', $data);				
				redirect('admin/galeri');
			}			
		}else{
			redirect('');
		}
	}

	public function gedit($id_galeri)
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$config['upload_path'] ='./assets/image';
		$config['allowed_types'] ='gif|png|jpg|jpeg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload',$config);

		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');	

		if($this->form_validation->run() != FALSE){
			if($this->upload->do_upload('gambar')){
			  $data = $this->upload->data();
			  $this->Admin_model->edit_galeri($id_galeri);			  
			}
			else{
				echo $this->Admin_model->edit_galeri($id_galeri);
			}			
			  redirect('admin/galeri');
		  }
		  else{
			if($this->session->userdata('usertype') == 'Admin' ){
				$data['data'] = $this->Admin_model->getGaleriByID($id_galeri);				
				$data['title'] = 'BABUPA | Edit Galeri ';
				$this->load->view('admin/admin_gedit', $data);
				$this->load->view('templates/footer_auth');
			}else{
				redirect('');
			}
		  }
	}

	public function gdelete($id_galeri)
	{
		$this->Admin_model->delete_galeri($id_galeri);
		redirect('admin/galeri');
	}

	public function reviewulasan()
	{
			$data['data'] = $this->Admin_model->getreview();
			$data['judul'] = 'BABUPA | Riwayat Transaksi';
			$this->load->view('admin/admin_review', $data);
			$this->load->view('templates/footer_auth');
	}

	public function review()
	{
		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('tempat_wisata','Tempat Wisata', 'required'); 
		$this->form_validation->set_rules('review_ulasan','Review Ulasan', 'required');    		

		if($this->form_validation->run() != FALSE){
			$this->Admin_model->review();
			redirect('admin/reviewulasan');
		}else{
			if($this->session->userdata('usertype') == 'Pengguna'){
				$x['judul'] = 'BABUPA| Review & Ulasan';
				$this->load->view('kontak/kontakkami', $x);
				$this->load->view('templates/footer_auth');
			}else{
				redirect('');
			}
		}
	}

	public function deletereview($id_review)
	{
		$this->Admin_model->delete_review($id_review);
		redirect('admin/reviewulasan');
	}


}