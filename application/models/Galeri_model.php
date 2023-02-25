<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

    public function getMaingaleri()
    {
        $query = $this->db->select('*')
		->from('tb_galeri')			
		->get();
		return $query->result_array();
    }

	public function Detailgaleri($id_galeri)
	{
		$query = $this->db->select('*')
		->from('tb_galeri')
		->where('tb_galeri.id_galeri =', $id_galeri)						
		->get();
	return $query->row_array();
	}

	public function edit_galeri($id_galeri)
	{
		$this->load->helper('url');
		
		$data = array(
			'deskripsi' => $this->input->post('deskripsi')
		  );

		if($this->upload->do_upload('gambar'))
		{
			$datas= $this->upload->data();
			$data['gambar'] =$datas['file_name'];
						
			$this->db->where('id_galeri', $id_galeri);
	   
			return $this->db->update('tb_galeri', $data);
		}
		else {				   
			$this->db->where('id_galeri', $id_galeri);
	   
			return $this->db->update('tb_galeri', $data);
		}	 
	}

}	