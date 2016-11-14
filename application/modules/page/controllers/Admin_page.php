<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_page extends MX_controller{

	function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('Mdl_page');
	}

	function is_logged_in(){
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_login_in=FALSE){				
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>You do not have persmission to access this page.</div>
			</div>";
		$data['title']="Login";
		$data['module']="home";
		$data['view_file']="admin/login";
		echo Modules::run('template/login',$data);
		die();
		}
	}

	function index(){
		$data['qrs']=$this->Mdl_page->show();
		$data['title']="Admin page";
		$data['module']="page";
		$data['view_file']="admin/index";
		$this->parser->parse('template/admin',$data);
	}

	function create(){
		$data['title']="Create page";
		$data['module']="page";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
	}

	function store(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('heading','Heading','trim|required');
		$this->form_validation->set_rules('slug','Slug','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
		if($this->form_validation->run()==FALSE){
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Please enter complete and valid data!</div>
			</div>";
		$data['title']="Create page";
		$data['module']="page";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
	}else{
		$data=array(
			'heading'=>$this->input->post('heading'),
			'slug'=>$this->input->post('slug'),
			'page_title'=>$this->input->post('page_title'),
			'meta_desc'=>$this->input->post('meta_desc'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
			'description'=>$this->input->post('description'),
			'image'=>$this->input->post('image'),
			'image_thumb'=>$this->input->post('image_thumb'),
			'status'=>$this->input->post('status'),
			'order'=>$this->input->post('order'),
			'created_on'=>date('Y')
		);
		$this->Mdl_page->create($data);
		echo "<div class='container-fluid'>
					<div class='alert alert-success' role='alert'>page Created!</div>
				</div>";
			$data['title']="page Created";
			$data['module']="page";
			$data['view_file']="admin/create";
			$this->parser->parse('template/admin',$data);		
		}
	}

	function show(){
		// show used in index
	}

	function edit(){
		$id=$this->input->post('id');
		$data['qrs']=$this->Mdl_page->edit();
		$data['title']="Edit page";
		$data['module']="page";
		$data['view_file']="admin/edit";
		$this->parser->parse('template/admin',$data);
	}

	function update(){
		$id=$this->input->post('id');
		$data=array(
			'heading'=>$this->input->post('heading'),
			'slug'=>$this->input->post('slug'),
			'page_title'=>$this->input->post('page_title'),
			'meta_desc'=>$this->input->post('meta_desc'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
			'description'=>$this->input->post('description'),
			'image'=>$this->input->post('image'),
			'image_thumb'=>$this->input->post('image_thumb'),
			'status'=>$this->input->post('status'),
			'order'=>$this->input->post('order')
		);
		$this->Mdl_page->update($id,$data);
		echo "<div class='container-fluid'>
			<div class='alert alert-info' role='alert'>Data Updated!</div>
			</div>";
		$data['title']="Update";
		$data['module']="page";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
	}

	function destroy(){
		$id=$this->uri->segment(4);
		$this->Mdl_page->destroy($id);
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Data Deleted!</div>
			</div>";
		$data['title']="Delete";
		$data['module']="page";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
	}
}
