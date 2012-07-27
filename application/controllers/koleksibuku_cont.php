<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Koleksibuku_cont extends CI_Controller{
 
function __construct(){
parent::__construct(); 
$this->load->model('Koleksibuku_mod');
}
 
public function index(){
$data['title'] = "Data Buku";
$data['buku']=$this->Koleksibuku_mod->getAllKoleksiBuku();
$this->load->view('koleksibuku_home',$data);
}
 
function add(){
$this->form_validation->set_rules('kode_buku','Kode Buku','required');
$this->form_validation->set_rules('judul_buku','Judul','required');
if($this->form_validation->run() == TRUE){
$this->Koleksibuku_mod->addKoleksiBuku();
$this->session->set_flashdata('message','Berhasil menambah data buku');
redirect('pegawai','refresh');
}
 
$data['title'] = "Tambah Data Pegawai";
$this->load->view('koleksibuku_add', $data);
 
}
 
function edit($kode_buku = null){
if($kode_buku == null){
$kode_buku = $this->input->post('kode_buku');
}
$this->form_validation->set_rules('kode_buku','Kode Buku','required');
$this->form_validation->set_rules('judul_buku','Judul Buku','required');
if($this->form_validation->run() == TRUE){
$this->Koleksibuku_mod->editPegawai($kode_buku);
$this->session->set_flashdata('message','Data Buku berhasil diedit');
redirect('buku','refresh');
}
 
$data['title'] = "Edit Data Buku";
$data['buku'] = $this->Koleksibuku_mod->getKoleksiBuku($kode_buku);
 
$this->load->view('koleksibuku_edit',$data);
 
}
 
function delete($kode_buku){
if(!empty($kode_buku)){
$this->Koleksibuku_mod->deleteKoleksiBuku($kode_buku);
$this->session->set_flashdata('message','Data Buku Berhasil Dihapus !');
redirect('buku/index','refresh');
}
}
 
}