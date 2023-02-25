<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function create()
	{
		// $pass = random_string('alnum', 16);
		$data = array (
			'username' => $this->input->post('username'),
			'usertype' => $this->input->post('usertype'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('username'), PASSWORD_DEFAULT)
			// 'password' => password_hash($pass, PASSWORD_DEFAULT)
			);
			$this->db->insert('tb_user', $data);
	}

	public function getPengelola() {
		$query = $this->db->select('*')
			->from('tb_user')	
			->where('usertype', 'Pengelola')			
			->get();

		return $query->result();
	}

	public function getPengelolaData() {
		$query = $this->db->select('*')
			->from('tb_user')	
			->where('usertype', 'Pengelola')			
			->get();

		return $query->result_array();
	}
	
	public function user()
	{
		$query = $this->db->select('*')
			->from('tb_user')	
			->where('usertype', 'Pengguna')			
			->get();
		return $query->result();
	}	

	public function read_by($userid)
	{
		$this->db->where('id_user', $userid);
		$query = $this->db->get('tb_user');
		return $query->row();
	}
	
	public function delete($userid)
	{
		$this->db->where('id_user', $userid);
		$this->db->delete('tb_user');
	}

	public function delete_pengguna($id) 
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tb_user');
	}

	public function delete_pengelola($id) 
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tb_user');
	}

	public function getAllDestinasi()
    {
        $query = $this->db->select('
			tb_wisata.id_wisata, tb_wisata.nama_wisata, SUBSTRING(tb_wisata.deskripsi, 1, 25) as deskripsi, SUBSTRING(tb_wisata.fasilitas, 1, 80) as fasilitas,
			tb_wisata.deskripsi_lainnya, tb_wisata.harga_tiket, tb_wisata.gambar, tb_user.fullname
		', FALSE)
		->from('tb_wisata')	
		->join ( 'tb_user', 'tb_user.id_user = tb_wisata.id_pengelola')
		->get();
		return $query->result_array();
    }

	public function getDestinasiByID($id_wisata)
    {
        $query = $this->db->select('*')
			->from('tb_wisata')
			->where('tb_wisata.id_wisata =', $id_wisata)
			->get();
		return $query->row_array();
    }

    public function edit_destinasi($id_wisata)
    {
        $this->load->helper('url');

		$data = array(            
			'nama_wisata' => $this->input->post('nama_wisata'),
			'id_pengelola' => $this->input->post('id_pengelola'),
			'deskripsi' => $this->input->post('deskripsi'),
			'fasilitas' => $this->input->post('fasilitas'),
            'deskripsi_lainnya' => $this->input->post('deskripsi_lainnya'),
			'harga_tiket' => $this->input->post('harga_tiket'),			
		  );
	   		
		  if($this->upload->do_upload('gambar'))
		  {
			$datas = $this->upload->data();
			$data['gambar'] = $datas['file_name'];
						
			$this->db->where('id_wisata', $id_wisata);
	   
			return $this->db->update('tb_wisata', $data);
		  }
		  else {				   
			$this->db->where('id_wisata', $id_wisata);
	   
			return $this->db->update('tb_wisata', $data);
		  }
    }

    public function delete_destinasi($id_wisata)
	{
		return $this->db->delete('tb_wisata', array('id_wisata'=>$id_wisata));
	}

	public function getAllGaleri()
    {
        $query = $this->db->select('*')
		->from('tb_galeri')				
		->get();
		return $query->result_array();
    }

	public function getGaleriByID($id_galeri)
    {
        $query = $this->db->select('*')
			->from('tb_galeri')
			->where('tb_galeri.id_galeri =', $id_galeri)
			->get();
		return $query->row_array();
    }

    public function edit_galeri($id_gambar)
    {
        $this->load->helper('url');

		$data = array(            
			'deskripsi' => $this->input->post('deskripsi'),
		  );
	   		
		  if($this->upload->do_upload('gambar'))
		  {
			$datas = $this->upload->data();
			$data['gambar'] = $datas['file_name'];
						
			$this->db->where('id_galeri', $id_gambar);
	   
			return $this->db->update('tb_galeri', $data);
		  }
		  else {				   
			$this->db->where('id_galeri', $id_gambar);
	   
			return $this->db->update('tb_galeri', $data);
		  }
    }

    public function delete_galeri($id_galeri)
	{
		return $this->db->delete('tb_galeri', array('id_galeri'=>$id_galeri));
	}
	
	public function validation()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		
		if($this->form_validation->run())
			return TRUE;
		else
			return FALSE;
	}

	public function getreview()
    {
        $query = $this->db->select('
			tb_review.id_review, tb_review.id_user, tb_review.nama, tb_wisata.nama_wisata, tb_review.review_ulasan
		')
			->from('tb_review')	
			->join ( 'tb_user', 'tb_user.id_user = tb_review.id_user')
			->join ( 'tb_wisata', 'tb_wisata.id_wisata = tb_review.id_wisata')
			->get();
		return $query->result_array();
    }

    public function review()
	{				
		$nama = $this->input->post('nama');
		$tempat_wisata = $this->input->post('tempat_wisata');
		$review_ulasan = $this->input->post('review_ulasan');

		$data = array(
			'nama' => $nama,
			'tempat_wisata' => $tempat_wisata,
			'review_ulasan' => $review_ulasan
		);		
		$this->db->insert('tb_review', $data);
	}

    public function delete_review($id_review)
	{
		$this->db->where('id_review', $id_review);
		$this->db->delete('tb_review');
		
	}
	
}