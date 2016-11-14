<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Customer extends MX_controller{
		
		function __construct(){
		parent::__construct();
			$this->load->model('Mdl_customer');
			$this->load->library("pagination");
			$this->load->helper("url");
		}

		function show404(){
	    	$data['title']="404 Page Error";
	    	$this->parser->parse('template/error',$data);
    	}

		function index(){
			$this->create();	
        }

		function create(){
			$data['title']="customer";
    		$data['module']="customer";
    		$data['view_file']="customer";
    		$this->parser->parse('template/form',$data);
		}

		function store(){
    		$this->load->library('form_validation');
    		if($this->input->post()){
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('username','Username','trim|required');
			if($this->form_validation->run()==FALSE){
				echo "please enter correct data";
			}else{
				$data=array(
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'username'=>$this->input->post('username'),
					'password'=>$this->input->post('password'),
					'dob'=>$this->input->post('dob'),
					'address'=>$this->input->post('address'),
					'country'=>$this->input->post('country'),
					'company'=>$this->input->post('company'),
					'joined_date'=>date('Y-m-d')
					);
			$this->load->Mdl_customer->create($data);
			}
			$data['title']="customer";
    		$data['module']="customer";
    		$data['view_file']="customer";
    		$this->parser->parse('template/form',$data);
    		}
    	}

    	function display(){
    		$config = array();
    		$config["base_url"] = base_url() . "customer/display";
        	$config["total_rows"] = $this->Mdl_customer->record_count();
        	$config["per_page"] = 1;
        	$config["uri_segment"] = 3;

        	$this->pagination->initialize($config);

        	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        	$data["qrs"] = $this->Mdl_customer->display($config["per_page"], $page);
        	$data["links"] = $this->pagination->create_links();

        	$data['title']="customer";
    		$data['module']="customer";
    		$data['view_file']="customer";
    		$this->parser->parse('template/form',$data);
    	}
	}
?>