<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

    public function getreview()
    {
        $query = $this->db->select('
		tb_review.id_review, tb_review.id_user, tb_review.nama, tb_wisata.nama_wisata, tb_review.review_ulasan
	')
			->from('tb_review')
			->join ( 'tb_user', 'tb_review.id_user = tb_user.id_user')
			->join ( 'tb_wisata', 'tb_wisata.id_wisata = tb_review.id_wisata')
			->where('tb_user.id_user', $this->session->userdata('id_user'))	
			->limit(3)					
			->get();
		return $query->result_array();
    }

	public function datareview()
	{
		$query =  $this->db->select('
			tb_review.id_review, tb_review.id_user, tb_review.nama, tb_wisata.nama_wisata, tb_review.review_ulasan
		')
		->from('tb_review')
		->join ( 'tb_user', 'tb_review.id_user = tb_user.id_user')
		->join ( 'tb_wisata', 'tb_wisata.id_wisata = tb_review.id_wisata')
		->where('tb_user.id_user', $this->session->userdata('id_user'))	
		->get();
	return $query->result_array();

	}
    public function review()
	{				
		$nama = $this->input->post('nama');
		$id_wisata = $this->input->post('id_wisata');
		$review_ulasan = $this->input->post('review_ulasan');

		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'nama' => $nama,
			'id_wisata' => $id_wisata,
			'review_ulasan' => $review_ulasan
		);		
		$this->db->insert('tb_review', $data);
	}

    public function delete($id_review)
	{
		$this->db->where('id_review', $id_review);
		$this->db->delete('tb_review');
	}
}
