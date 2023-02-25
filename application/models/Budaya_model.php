<?php

class Budaya_model extends CI_Model {

	public function create()
	{
		$data = array(
			'nama_pariwisata' 	=> $this->input->post('nama_pariwisata'),
			'foto_pariwisata' 	=> $this->input->post('foto_pariwisata'),
			'deskripsi_wisata' 	=> $this->input->post('deskripsi_wisata'),
			'alamat' 			=> $this->input->post('alamat'),
			'no_telpon' 		=> $this->input->post('no_telpon'),
			'harga_masuk' 		=> $this->input->post('harga_masuk')
		);
		$this->db->insert('data_budaya', $data);
	}

    public function read()
	{
		$query = $this->db->get('data_budaya');
		return $query->result();
	}
}