<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Pengguna_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('file');			
		$this->load->helper('download');
	}

	public function index()
	{		
        if(! $this->session->userdata('username')) redirect('login');

        if ($this->session->userdata('usertype') != 'Pengguna') {
            redirect('');
        }else {
            $x['judul'] = 'BABUPA | Home Page'; 
            $this->load->view('templates/header_navbar', $x);
            $this->load->view('pengguna/pengguna_home');
            $this->load->view('templates/footer');
        }
	}

    public function riwayatTransaksi()
	{
		if($this->session->userdata('usertype') == 'Pengguna' ){
			$data['transaksi'] = $this->Pengguna_model->getRiwayatTransaksi();
			$x['judul'] = 'BABUPA | Riwayat Transaksi';
			$this->load->view('templates/header_navbar', $x);
			$this->load->view('pengguna/transaksi_page', $data);
			$this->load->view('templates/footer_auth');
		}else{
			redirect('');
		}
	}

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function bayarPesanan($id_pemesanan)
	{		
		$config['upload_path'] ='./assets/bukti_tf';
		$config['allowed_types'] ='gif|png|jpg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload',$config);

		if($this->upload->do_upload('bukti_transfer')){
			$data = $this->upload->data();
			$this->Pengguna_model->bayar_pesanan($id_pemesanan);
		}
		else{
			$this->Pengguna_model->bayar_pesanan($id_pemesanan);
		}			
		redirect('pengguna/riwayatTransaksi');		  
	}

	public function pemesanan()
	{			
				
		$this->form_validation->set_rules('nama_wisata','Nama Wisata', 'required'); 
		$this->form_validation->set_rules('alamat_lengkap','Alamat Lengkap', 'required');
		$this->form_validation->set_rules('no_tlp','No Telpon', 'required');
		$this->form_validation->set_rules('jumlah_tiket','Jumlah Tiket', 'required');     		
		

		if($this->form_validation->run() != FALSE){
			$this->Pengguna_model->pemesanan();
			redirect('pengguna/riwayatTransaksi');
		}else{
			if($this->session->userdata('usertype') == 'Pengguna'){
				$x['judul'] = 'BABUPA| Form Transaksi';
				$data['wisata'] = $this->Pengguna_model->getWisata();
				$this->load->view('templates/header_navbar', $x);
				$this->load->view('pengguna/transaksi_form', $data);
				$this->load->view('templates/footer');
			}else{
				redirect('');
			}
		}
	}

	public function delete($id_pemesanan)
	{
		$this->Pengguna_model->delete($id_pemesanan);
		redirect('pengguna/riwayatTransaksi');
	}

	function download_tiket($id_pemesanan)
	{
		$data = $this->db->get_where('tb_transaksi',['id_pemesanan'=>$id_pemesanan])->row();
		force_download('./assets/bukti_tf/'.$data->file_tiket,NULL);
	}
	
}