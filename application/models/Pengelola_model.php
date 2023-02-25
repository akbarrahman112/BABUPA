<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola_model extends CI_Model {
	
	public function getuser($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('tb_user')->row();
	}

	public function changephoto($foto)
	{
		if($this->session->userdata('foto') !== 'default.png')
			unlink('./profile/'.$this->session->userdata('foto')); //hapus foto lama
			
		$this->db->set('foto', $foto);
		$this->db->where('username', $this->session->userdata('username'));
		return $this->db->update('tb_user');
	}
	
	public function getAllPesanan()
	{		
	        $query = $this->db->select('
				tb_transaksi.id_pemesanan, tb_transaksi.id_user, tb_user.fullname,
				tb_transaksi.tanggal_pemesanan, tb_transaksi.alamat_lengkap, tb_transaksi.no_tlp,
				tb_transaksi.nama_wisata, tb_transaksi.jumlah_tiket, tb_transaksi.bukti_transfer,
				tb_transaksi.status_transaksi, tb_transaksi.file_tiket, tb_transaksi.total_harga,
				tb_wisata.nama_wisata
			')
			->from('tb_transaksi')
			->join ( 'tb_user', 'tb_transaksi.id_user = tb_user.id_user')
			->join ( 'tb_wisata', 'tb_transaksi.id_wisata = tb_wisata.id_wisata')
			->where('tb_wisata.id_pengelola', $this->session->userdata('id_user'))	
			->order_by('tanggal_pemesanan', 'desc')
			->get();
		return $query->result_array();

	}

	public function terima_bayar($id_pemesanan)
	{
		$this->load->helper('url');
		
		$data = array(
			'status_transaksi' => 'Sudah Bayar'
		  );

		if($this->upload->do_upload('file_tiket'))
		{
			$datas= $this->upload->data();
			$data['file_tiket'] =$datas['file_name'];
						
			$this->db->where('id_pemesanan', $id_pemesanan);
	   
			return $this->db->update('tb_transaksi', $data);
		}
		else {				   
			$this->db->where('id_pemesanan', $id_pemesanan);
	   
			return $this->db->update('tb_transaksi', $data);
		}	 
	}

	public function tolak_bayar($id_pemesanan)
	{
		return $this->db->delete('tb_transaksi', array('id_pemesanan'=>$id_pemesanan));
	}

	public function geta()
    {
        $query = $this->db->select('
			tb_transaksi.id_pemesanan, tb_transaksi.id_user, tb_transaksi.id_wisata, tb_transaksi.nama_pemesan,
			tb_transaksi.tanggal_pemesanan, tb_transaksi.alamat_lengkap, tb_transaksi.no_tlp, tb_wisata.nama_wisata, 
			tb_transaksi.jumlah_tiket, tb_transaksi.bukti_transfer, tb_transaksi.status_transaksi, 
			tb_transaksi.file_tiket, tb_transaksi.total_harga

		')
			->from('tb_transaksi')				
			->join ( 'tb_user', 'tb_transaksi.id_user = tb_user.id_user')
			->join ( 'tb_wisata', 'tb_transaksi.id_wisata = tb_wisata.id_wisata')
			->order_by('tanggal_pemesanan', 'desc')
			->where('tb_user.id_user', $this->session->userdata('id_user'))
			->get();
		return $query->result_array();
    }


}