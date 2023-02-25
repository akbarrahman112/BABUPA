<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

    public function read_by($id_pemesanan)
	{
		$this->db->where('id_pemesanan', $id_pemesanan);
		$query = $this->db->get('tb_transaksi');
		return $query->row();
	}
	
	public function getRiwayatTransaksi()
    {
        $query = $this->db->select('
			tb_transaksi.id_pemesanan, tb_transaksi.id_user, tb_transaksi.id_wisata, tb_user.fullname,
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

    public function bayar_pesanan($id_pemesanan)
    {
        $this->load->helper('url');

		$data = array(
			'status_transaksi' => 'Pending'
		  );

		if($this->upload->do_upload('bukti_transfer'))
		{
			$datas= $this->upload->data();
			$data['bukti_transfer'] =$datas['file_name'];
						
			$this->db->where('id_pemesanan', $id_pemesanan);
	   
			return $this->db->update('tb_transaksi', $data);
		}
		else {				   
			$this->db->where('id_pemesanan', $id_pemesanan);
	   
			return $this->db->update('tb_transaksi', $data);
		}
    }

	public function pemesanan()
	{				
		$id_wisata = $this->input->post('nama_wisata');
		$query = $this->db->get_where('tb_wisata', array('id_wisata' => $id_wisata))->row();
		$harga_satuan = $query->harga_tiket;

		$tanggal_pemesanan = date('Y-m-d H:i:s');		
		$nama_wisata = $this->input->post('nama_wisata');
		$alamat_lengkap = $this->input->post('alamat_lengkap');
		$no_tlp = $this->input->post('no_tlp');
		$jumlah_tiket = $this->input->post('jumlah_tiket');
		$id_user = $this->session->userdata('id_user');
		$total_harga = $jumlah_tiket * $harga_satuan;


		$data = array(
			'id_user' => $id_user,
			'id_wisata' => $id_wisata,			
			'tanggal_pemesanan' => $tanggal_pemesanan,			
			'alamat_lengkap' => $alamat_lengkap,
			'no_tlp' => $no_tlp,
			'nama_wisata' => $nama_wisata,
			'jumlah_tiket' => $jumlah_tiket,
			'total_harga' => $total_harga

		);		
		 $this->db->insert('tb_transaksi', $data);
	}

	public function delete($id_pemesanan)
	{
		return $this->db->delete('tb_transaksi', array('id_pemesanan'=>$id_pemesanan));
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

	public function getWisata() {
		$query = $this->db->select('*')
			->from('tb_wisata')				
			->get();

		return $query->result_array();
	}
}