<?php

class Anggota_mod extends CI_Model{
	
	private  $tbl_anggota = 'anggota';
	
	public function __construct(){
		parent::__construct();
	}
	
	//dapat data anggota
	public function getanggota(){
		$query = $this->db->order_by('nim','DESC');
		$query = $this->db->limit(3, 0);
		$query = $this->db->get($this->tbl_anggota);
		return $query->result();
	}
	//dapatkan page list
	public function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('nim','asc');
		return $this->db->get($this->tbl_anggota,$limit,$offset);
	}
	//dapatkan count
	public function get_count_all(){
		return $this->db->count_all($this->tbl_anggota);
	}
	
	//dpakan id pembelian
	public function get_by_idanggota($nim){
		$this->db->where('nim',$nim);
		return $this->db->get($this->tbl_anggota);
	}
	
	//tambah data anggota
	public function addanggota($anggota){
		$this->db->insert($this->tbl_anggota,$anggota);
		return $this->db->insert_id();
	}
	
	//update data anggota
	public function updateanggota(){
		$query = array(
			'nama_anggota' => $_POST['name_anggota'],
			'tgl_gabung' => $_POST['tgl_gabung'],
		);
		$this->db->where('nim',$_POST['nim']);
		$this->db->update($this->tbl_anggota,$query);
	}
	
	//cari data anngota 
	public function carianggota(){
		/*$this->db->select(*);
		$this->db->from('anggota');
		if(!empty($ringkasan)){
			$this->db->like
		}*/
		$name_anggota = $this->input->post('nama_anggota');
		$this->db->select('*');
		$this->db->where('nama_anggota',$name_anggota);
		$query = $this->db->get($this->tbl_anggota);
		return $query;
	}
	
	//delete data anngota
	public function deleteanggota($nim){
		$this->db->where('nim',$nim);
		$this->db->delete($this->tbl_anggota);
	}
}

?>