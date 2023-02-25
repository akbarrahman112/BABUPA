<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function create()
	{
		$data = array (
			'judul_proposal'=> $this->input->post('judul_proposal'),
			'judul_laporan'	=> $this->input->post('judul_laporan'),
			'link_laporan'	=> $this->input->post('link_laporan'),
			'pengaju'		=> $this->session->userdata('fullname')
		);	
		$this->db->insert('tb_laporan', $data);
	}

	public function read_laps() 
	{
		$this->db->where('pengaju', $this->session->userdata('fullname')); // Memfilter list data sesuai dengan session
		$query = $this->db->get('tb_laporan');
		return $query->result();
	}

	public function read_lembaga() 
	{
		$query = $this->db->get('tb_laporan');
		return $query->result();
	}

	public function read_by($id)
	{
		$this->db->where('id_laporan', $id);
		$query = $this->db->get('tb_laporan');
		return $query->row();
	}

	public function validation()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('judul_laporan', 'Judul Laporan', 'required');
		$this->form_validation->set_rules('link_laporan', 'Link Google Drive', 'required');
		$this->form_validation->set_rules('pengaju', 'Pengaju', 'required');
		
		if($this->form_validation->run())
			return TRUE;
		else
			return FALSE;
	}

	public function keputusan_Blog($id)
	{
		$data = array (
			'status_laporan' 	=> $this->input->post('status_laporan'),
			'komentar_laporan' 	=> $this->input->post('komentar_laporan')
		);	
		$this->db->where('id_laporan', $id);
		$this->db->update('tb_laporan', $data);
	}
}