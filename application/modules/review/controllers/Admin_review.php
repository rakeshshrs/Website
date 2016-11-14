<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_review extends MX_controller{

	function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('Mdl_review');
	}

	function is_logged_in(){
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_login_in=FALSE){				
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>You do not have persmission to access this page.</div>
			</div>";
		$data['title']="Login";
		$data['module']="review";
		$data['view_file']="admin/login";
		echo Modules::run('template/login',$data);
		die();
		}
	}

	function index(){
		$data['qrs']=$this->Mdl_review->show();
		$data['title']="Admin review";
		$data['module']="review";
		$data['view_file']="admin/index";
		$this->parser->parse('template/admin',$data);
	}

	function show(){
		// show used in index
	}

	function edit(){
		$id=$this->input->post('id');
		$data['qrs']=$this->Mdl_review->edit();
		$data['title']="Edit review";
		$data['module']="review";
		$data['view_file']="admin/edit";
		$this->parser->parse('template/admin',$data);
	}

	function update(){
		$id=$this->input->post('id');
		$data=array(
			'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'subject'=>$this->input->post('subject'),
					'msg'=>$this->input->post('msg'),
					'created_on'=>$this->input->post('created_on'),
					'status'=> $this->input->post('status')
		);
		$this->Mdl_review->update($id,$data);
		echo "<div class='container-fluid'>
			<div class='alert alert-info' role='alert'>Data Updated!</div>
			</div>";
		$data['title']="Update";
		$data['module']="review";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
		redirect('admin/review');
	}

	function destroy(){
		$id=$this->uri->segment(4);
		$this->Mdl_review->destroy($id);
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Data Deleted!</div>
			</div>";
		$data['title']="Delete";
		$data['module']="review";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
		redirect('admin/review');
	}
}