<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota_cont extends CI_Controller{
	
	private $limit = 10;
	
	public function __construct(){
		parent::__construct();
		$this->load->library(array('table'));
		$this->load->helper('url');
		$this->load->model('anggota_mod');
		$this->load->helper('form');
	}
	
	public function index($offset = 0){
		$data['title'] = 'Anggota';
		//offset 
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		//load data
		$anggotaad = $this->anggota_mod->get_paged_list($this->limit,$offset)->result();
		
		//table database 
		$this->load->library('pagination');
		$config['base_url'] = site_url('anggota_cont/index');
		$config['total_rows'] = $this->anggota_mod->get_count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
		
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('no','nama','tgl gabung','Action');
		$i = 0 + $offset;
		foreach($anggotaad as $anggota){
			$this->table->add_row(++$i,$anggota->nama_anggota, $anggota->tgl_gabung, 
			anchor('anggota_cont/view/'.$anggota->nim,'view',array('class'=>'view')).' '.
			anchor('anggota_cont/update/'.$anggota->nim,'update',array('class'=>'view')).' '.
			anchor('anggota_cont/delete/'.$anggota->nim,'delete',array('class'=>'delete','onclick'=>"return confirm('are you sure want to delete this?')"))
			);
		}
		
		$data['table'] = $this->table->generate();
		
		
		$data['test'] = $this->anggota_mod->carianggota()->row();

		$this->load->view('anggota/anggota',$data);
	}
	
	public function add(){
		$data['title'] = 'add';
		$data['action'] = site_url('anggota_cont/anggota');
		$data['linkback'] = anchor('anggota_cont/index/','back to list');
		$anggota = array(
			'nim' => $this->input->post('nim'),
			'nama_anggota' => $this->input->post('name_anggota'),
			'tgl_gabung' => $this->input->post('tgl_gabung')
		);
		
		$nim = $this->anggota_mod->addanggota($anggota);
		redirect('anggota/','refresh');
	}
	
	public function update($nim){
		$data['title'] = 'update';
		$data['keluar'] = $this->anggota_mod->get_by_idanggota($nim)->row();
		
		$this->load->view('anggota/anggota_update',$data);
	}
	
	public function updatedata(){
		if($this->input->post('name_anggota')){
			$this->anggota_mod->updateanggota();
			redirect('anggota_cont/index','refresh');
		}else{
			$this->load->view('anggota_cont/update');
		}
	}
	
	public function view($nim){
		$data['title'] = "view anggota";
		$data['linkback'] = anchor('anggota_cont/index/','back to list');
		
		$data['keluar']	= $this->anggota_mod->get_by_idanggota($nim)->row();
		
		$this->load->view('anggota/anggota_view',$data);
	}
	
	public function delete($nim){
		$this->anggota_mod->deleteanggota($nim);
		redirect('anggota/','refresh');
	}
	
	
}


?>