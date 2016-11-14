<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_customer extends MX_controller{

	function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('Mdl_customer');
	}

	function is_logged_in(){
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_login_in=FALSE){				
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>You do not have persmission to access this page.</div>
			</div>";
		$data['title']="Login";
		$data['module']="customer";
		$data['view_file']="admin/login";
		echo Modules::run('template/login',$data);
		die();
		}
	}

	function index(){
		$data['qrs']=$this->Mdl_customer->show();
		$data['title']="Admin customer";
		$data['module']="customer";
		$data['view_file']="admin/index";
		$this->parser->parse('template/admin',$data);
	}

	function show(){
		// show used in index
	}

	function edit(){
		$id=$this->input->post('id');
		$data['qrs']=$this->Mdl_customer->edit();
		$data['title']="Edit customer";
		$data['module']="customer";
		$data['view_file']="admin/edit";
		$this->parser->parse('template/admin',$data);
	}

	function update(){
		$id=$this->input->post('id');
		$data=array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'dob'=>$this->input->post('dob'),
			'address'=>$this->input->post('address'),
			'country'=> $this->input->post('country'),
			'company'=>$this->input->post('company'),
			'joined_date'=>$this->input->post('joined_date')
		);
		$this->Mdl_customer->update($id,$data);
		echo "<div class='container-fluid'>
			<div class='alert alert-info' role='alert'>Data Updated!</div>
			</div>";
		$data['title']="Update";
		$data['module']="customer";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
		redirect('admin/customer');
	}

	function destroy(){
		$id=$this->uri->segment(4);
		$this->Mdl_customer->destroy($id);
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Data Deleted!</div>
			</div>";
		$data['title']="Delete";
		$data['module']="customer";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
		redirect('admin/customer');
	}
}