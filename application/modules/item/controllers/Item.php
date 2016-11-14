<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Item extends MX_controller{
		
		function __construct(){
		parent::__construct();
			$this->load->model('Mdl_item');
		}

		function index(){
			$qrs = $this->Mdl_item->show();
			$data['qrs'] = $qrs;
			$data['title']="Item";
			$data['module']="item";
			$data['view_file']="item";
			$this->parser->parse('template/pages',$data);
		}

		function items($category, $slug) {
	        $qrs = $this->Mdl_item->slug($slug);
	        if($qrs){
	        $data['qrs'] = $qrs;
	        $data['title']="Item";
			$data['module']="item";
			$data['view_file']="item";
			$this->parser->parse('template/pages',$data);
			}else{
				$this->show404();
			}
    	}

    	function category($category){
    		$qrs = $this->Mdl_item->category($category);
    		if($qrs){
	        $data['qrs'] = $qrs;
	        $data['title']="Category";
			$data['module']="item";
			$data['view_file']="category";
			$this->parser->parse('template/pages',$data);
			}else{
				$this->show404();
			}

    	}

    	function show404(){
	    	$data['title']="404 Page Error";
	    	$this->parser->parse('template/error',$data);
    	}
	}
?>