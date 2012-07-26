<?php

class Category_cont extends CI_Controller{
		
	private $limit = 10;
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('table'));
		$this->load->model('category_mod');
		$this->load->helper('form');
	}
	
	public function index($offset=0){
		$data['title'] = "category";
		
		//offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		//load data
		$category = $this->category_mod->get_paged_list($this->limit,$offset)->result();
		
		//table database
		$this->load->library('pagination');
		$config['base_url'] = site_url('category_cont/index');
		$config['total_rows'] = $this->category_mod->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('nama kategori','parent kategori','Action');
		$i = 0 + $offset;
		foreach($category as $category){
			$this->table->add_row(++$i,$category->nama_kategori, $category->parent_kategori, 
			anchor('category_cont/view/'.$category->idkategori,'view',array('class'=>'view')).' '.
			anchor('category_cont/update/'.$category->idkategori,'update',array('class'=>'view')).' '.
			anchor('category_cont/delete/'.$category->idkategori,'delete',array('class'=>'delete','onclick'=>"return confirm('are you sure want to delete this?')"))
			);
		}
		
		$data['table'] = $this->table->generate();
		
		
		$data['pagination'] = $this->pagination->create_links();
		
		
		$this->load->view('category/category',$data);
	}
	
	public function insert(){
		$category = array(
			'nama_kategori' => $this->input->post('name_category'),
			'parent_kategori' => $this->input->post('parent_category')
		);
		$nama_category = $this->category_mod->add($category);
		redirect('category_cont','refresh');
	}
	
	public function update($idkategori){
		$data['title'] = "category";
		$data['keluar'] = $this->category_mod->get_by_idcategory($idkategori)->row();
		
		$this->load->view('category/category_update',$data);
	}
	
	public function updatedata(){
		if($this->input->post('name_category')){
			$this->category_mod->update();
			redirect('category_cont/index','refresh');
		}else{
			$this->load->view('category_cont/update');
		}
	}
	
	public function delete($idkategori){
		$this->category_mod->delete($idkategori);
		redirect('category_cont/','refresh');
	}
}
