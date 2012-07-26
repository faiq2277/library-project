<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Koleksibuku_mod extends CI_Model{
var $table = 'koleksi_buku';
function _construct(){
parent::_construct();
}
 
//fungsi untuk mendapatkan koleksi_buku berdasarkan kode_buku
function getKoleksiBuku($kode_buku){
$data = array();
$this->db->where('kode_buku',$kode_buku);
$this->db->limit(1);
$query = $this->db->get($this->table);
 
if($query->num_rows() > 0)
{
$data = $query->row_array();
}
return $data;
}
 
//fungsi untuk mendapatkan semua data koleksi_buku
function getAllKoleksiBuku(){
$this->db->order_by('judul_buku','asc');
$query = $this->db->get($this->table);
if($query->num_rows() > 0)
{
return $query->result_array();
}
 
}
 
//fungsi untuk menambah data koleksi_buku ke dalam tabel dari form isian
function addKoleksiBuku(){
$data = array(
'kode_buku' => $this->input->post('kode_buku'),
'judul_buku' => $this->input->post('judul_buku'),
'penulis' => $this->input->post('penulis'),
'penerbit' => $this->input->post('penerbit')
'tahun_terbit' => $this->input->post('tahun_terbit'),
'kategori' => $this->input->post('kategori'),
);
$this->db->insert($this->table,$data);
}
 
//fungsi untuk mengedit data koleksi_buku berdasarkan kode_buku
function editKoleksiBuku($kode_buku){
$data = array(
'kode_buku' => $this->input->post('kode_buku'),
'judul_buku' => $this->input->post('judul_buku'),
'penulis' => $this->input->post('penulis'),
'penerbit' => $this->input->post('penerbit')
'tahun_terbit' => $this->input->post('tahun_terbit'),
'kategori' => $this->input->post('kategori'),
);
$this->db->where('kode_buku',$kode_buku);
$this->db->update($this->table,$data);
}
 
//fungsi untuk menghapus data pegawai berdasarkan id pegawai
function deleteKoleksiBuku($kode_buku){
$this->db->where('kode_buku',$kode_buku);
$this->db->delete($this->table);
}
}