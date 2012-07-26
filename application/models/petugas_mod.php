<?php
class Petugas_mod extends CI_Model {
    private $primary_key='id_petugas';
    private $tblpetugas  = 'petugas';
	
    // function login with   
    function cekLogin($userName,$password){
	    $this->db->select('*');
        $this->db->where('username',$userName);
        $this->db->where('pass',  md5($password));
        $query = $this->db->get('petugas');
        if($query->num_rows() == 1){ // Jika data ditemukan
            return $query->row_array();
        }else{  // Jika data tidak ditemukan
			echo"<script type='text/javascript'>
				alert ('LOGIN is Fail...');
			</script>";
		}
    }

	// Update data petugas, parameter didapat dari con_user
		function update_petugas(){
			echo $dateNow = date('Y-m-d');
			$this->load->database();
				$data = array(
				'pass' => trim(md5($this->input->post('dtNPass'))),
				'flag' => 1,
				'last_update' => $dateNow
				);
			$this->db->where('id_petugas',$this->input->post('myId'));
			$this->db->update('petugas',$data); 
			return TRUE;
		} 
}
?>