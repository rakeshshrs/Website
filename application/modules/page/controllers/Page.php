<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Page extends MX_controller{
		
		function __construct(){
		parent::__construct();
			$this->load->model('Mdl_page');
		}

		function index(){
			$this->show404();
		}

		function pages($slug) {
	        $qrs = $this->Mdl_page->slug($slug);
	        if($qrs){
	        $data['qrs'] = $qrs;
	        $data['title']="Home";
			$data['module']="page";
			$data['view_file']="page";
			$this->parser->parse('template/pages',$data);
			}else{
				$this->show404();
			}
    	}

    	function contact(){
    		$this->load->library('form_validation');
    		if($this->input->post()){
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('msg','Message','trim|required');
			if($this->form_validation->run()==TRUE){
    		$this->Mdl_page->sendmail();
    		}else{
    		echo"
    			<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Invalid info. Please try again!</div>
			</div>";
    		}
    		}
    		$data['title']="Contact";
    		$data['module']="page";
    		$data['view_file']="contact";
    		$this->parser->parse('template/form',$data);
    	}

    	function show404(){
	    	$data['title']="404 Page Error";
	    	$this->parser->parse('template/error',$data);
    	}
	}
?>