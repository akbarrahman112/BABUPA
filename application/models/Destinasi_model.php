<?php

class Destinasi_model extends CI_Model {

    public function getMainDestinasi()
    {
        $query = $this->db->select('*')
		->from('tb_wisata')			
		->get();
		return $query->result_array();
    }

	public function DetailWisata($id_wisata)
	{
		$query = $this->db->select('*')
		->from('tb_wisata')
		->where('tb_wisata.id_wisata =', $id_wisata)						
		->get();
		return $query->row_array();
	}
	
}