<?php

class Category_mod extends CI_Model{

	private $tbl_category = 'kategori';

	public function __construct(){
		parent::__construct();
	}
	
	public function getanggota(){
		$query = $this->db->order_by('idkategori','desc');
		$query = $this->db->limit(3,0);
		$query = $this->db->get($this->tbl_category);
		return $query->result();
	}
	
	public function add($category){
		$this->db->insert($this->tbl_category, $category);
		return $this->db->insert_id();
	}
	
	public function get_by_idcategory($idkategori){
		$this->db->where('idkategori',$idkategori);
		return $this->db->get($this->tbl_category);
	}
	
	public function get_paged_list($limit=10,$offset=0){
		$this->db->order_by('idkategori','asc');
		return $this->db->get($this->tbl_category,$limit,$offset);
	}
	
	public function count_all(){
		return $this->db->count_all($this->tbl_category);
	}	
	
	public function delete($idkategori){
		$this->db->where('idkategori',$idkategori);
		$this->db->delete($this->tbl_category);
	}
	
	public function update(){
		$query  = array(
			'nama_kategori' => $_POST['name_category'],
			'parent_kategori' => $_POST['parent_category']
		);
		$this->db->where('idkategori',$_POST['idkategori']);
		$this->db->update($this->tbl_category,$query);
	}
	
	//get nama cat
	public function getnamacategory(){
		$this->db->where('nama_kategori',$nama_kategori);
		return $this->db->get($this->tbl_category);
	}
	public function getparent(){
		$this->db->where('parent_kategori',$parent_kategori);
		return $this->db->get($this->tbl_category);
	}
	public function getid(){
		//$this->db->wher
	}
	
}