<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Review extends MX_controller{
		
		function __construct(){
		parent::__construct();
			$this->load->model('Mdl_review');
			$this->load->library("pagination");
			$this->load->helper("url");
		}

		function show404(){
	    	$data['title']="404 Page Error";
	    	$this->parser->parse('template/error',$data);
    	}

		function index(){
			redirect('review/display');
		}

		function create(){
			redirect('review/display');
		}

		function store(){
    		$this->load->library('form_validation');
    		if($this->input->post()){
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('msg','Message','trim|required');
			if($this->form_validation->run()==FALSE){
				echo "please enter correct data";
			}else{
				$data=array(
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'subject'=>$this->input->post('subject'),
					'msg'=>$this->input->post('msg'),
					'created_on'=>date('Y-m-d'),
					'status'=> 0,
					);
			$this->load->Mdl_review->create($data);
			}
			$data['title']="Review";
    		$data['module']="review";
    		$data['view_file']="review";
    		$this->parser->parse('template/form',$data);
    		redirect('review');
    		}
    	}

    	function display(){
    		$config = array();
    		$config["base_url"] = base_url() . "review/display";
        	$config["total_rows"] = $this->Mdl_review->record_count();
        	$config["per_page"] = 1;
        	$config["uri_segment"] = 3;

        	$this->pagination->initialize($config);

        	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        	$data["qrs"] = $this->Mdl_review->display($config["per_page"], $page);
        	$data["links"] = $this->pagination->create_links();

        	$data['title']="Review";
    		$data['module']="review";
    		$data['view_file']="review";
    		$this->parser->parse('template/form',$data);
    	}
	}
?>