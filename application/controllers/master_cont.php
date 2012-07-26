<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Con_master extends CI_Controller{
	
	//private $limit =10; // Limit data from DB
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
 
	public function index(){
		//memanggil ke controller di bawahnnya
		//$data['anggota'] = site_url('master_cont/anggota');
		//$data['petugas'] = site_url('master_cont/petugas');
		//$data['pemimjam'] = site_url('master_cont/pemimjam');
		//$data['koleksibuku'] = site_url('master_cont/koleksibuku');
		$this->load->view('view_master');
	}
	
	public function anggota(){
		$this->load->view('anggota/anggota');
	}
	
	public function petugas(){
		$this->load->view(''); //diisi dengan link ke view kalian
	}
	
	public function pemimjam(){
		$this->load->view(''); //diisi dengan linnk ke view kalian
	}
	
	public function koleksibuku(){
		$this->load->view('');
	}
	

}
?>