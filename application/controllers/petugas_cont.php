<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Petugas_cont extends CI_Controller{

	function __construct(){
		parent::__construct();
		// load library & helper yang dibutuhkan saja
		$this->load->helper(array('url','form'));
		$this->load->library(array('session','form_validation'));
		$this->load->model('petugas_mod'); 
	}

	public function index(){
		$this->load->view("login_anggota");
	}
	public function changepass(){
		$this->load->view("changepass_anggota");
	}
	public function main(){
		// page main nanti akan di direct ke halaman utama peminjam
		$this->load->view("peminjam");
	} 
	public function relogin(){
		$this->load->view("login_anggota");
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view("logout_anggota");
	}			
	
	public function login(){
       
			//Get Variabel for view as parameter for login
            $userName = $this->input->post('dtUser');
            $password = $this->input->post('dtPass');
            
            //call model for user login
            $DataUser = $this->petugas_mod->cekLogin($userName, $password);
                
			// Check kondisi sesion berhasil atau gagal
		if (!empty($DataUser)) {
                $sessionData['id_petugas'] = $DataUser['id_petugas'];
                $sessionData['nama_petugas'] = $DataUser['nama_petugas'];
                $sessionData['username'] = $DataUser['username'];
                $sessionData['pass'] = $DataUser['pass'];
                $sessionData['flag'] = $DataUser['flag'];
                $sessionData['last_update'] = $DataUser['last_update'];
                $sessionData['alamat'] = $DataUser['alamat'];
                
				// Set SESSEION
                $this->session->set_userdata($sessionData);
				
				// Get date from last update and date Now()
				$DateUpdate = $this->session->userdata('last_update');
				$dateNow 	= date('Y-m-d');
				
				//Explode date from SESSION
				$tglUpdate = explode ("-",$DateUpdate);
				$UpdateTgl = (int) $tglUpdate [2];
				$UpdateBln = (int) $tglUpdate [1];
				$UpdateThn = (int) $tglUpdate [0];
				
				// Explode date Now()
				$Now = explode ("-", $dateNow);
				$Tgl = (int) $Now [2];
				$Bln = (int) $Now [1];
				$Thn = (int) $Now [0];
				
				//Hitung expired day login
				$expiredDate = abs((mktime ( 0, 0, 0, $Bln, $Tgl, $Thn) - mktime ( 0, 0, 0, $UpdateBln, $UpdateTgl, $UpdateThn))/(60*60*24));
				
				//Jika login pertama kali & flag masih 1 
                if ($this->session->userdata('username') !="" &&  $this->session->userdata('flag') == 0) {
					 redirect('petugas_cont/changepass'); 
				} 
				//untuk cek tanggal expired password
				else if ($this->session->userdata('username') !="" &&  $expiredDate >= 30 ) { 
					redirect('petugas_cont/changepass');
                } 
				//Jika login bukan yang pertama / sudah pernah ganti password 
				else if ($this->session->userdata('username') !="" &&  $this->session->userdata('flag') != 0) { 
					redirect('petugas_cont/main');
                }  
				// Jika login gagal
				else {
					redirect('petugas_cont/relogin');
				}
        }
		 else{
			redirect('petugas_cont/relogin', 'refresh');
		}
    }
	
	//update pengurus
	function update_petugas() {
		$this->load->model('petugas_mod');
		$queryUpdate = $this->petugas_mod->update_petugas();
			if ($queryUpdate == true){
				redirect('petugas_cont/main');
			}else{
				redirect('petugas_cont/relogin');
			}
	}

}
?>