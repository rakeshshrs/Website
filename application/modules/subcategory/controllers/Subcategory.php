<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Subsubcategory extends MX_controller{
		
		function __construct(){
		parent::__construct();
			$this->load->model('Mdl_subcategory');
		}

		function index(){
			$qrs = $this->Mdl_subcategory->show();
			$data['qrs'] = $qrs;
			$data['title']="subcategory";
			$data['module']="subcategory";
			$data['view_file']="subcategory";
			$this->parser->parse('template/pages',$data);
		}

		function subcategory($slug){
    		$data['nav'] = $this->db->get('categorys')->result();
    		$data['catslug'] = $this->uri->segment('2');
    		$qrs = $this->Mdl_category->subcategory($slug);    	
	        $data['qrs'] = $qrs;
	        $data['title']="Category";
			$data['module']="category";
			$data['view_file']="subcategory";
			$this->parser->parse('template/pages',$data);
		}

    	function show404(){
	    	$data['title']="404 Page Error";
	    	$this->parser->parse('template/error',$data);
    	}
	}
?>