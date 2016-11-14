<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Category extends MX_controller{
		
		function __construct(){
		parent::__construct();
			$this->load->model('Mdl_category');
		}

		function index(){
			$data['nav'] = $this->db->get('categorys')->result();
			$qrs = $this->Mdl_category->show();
			$data['qrs'] = $qrs;
			$data['title']="category";
			$data['module']="category";
			$data['view_file']="category";
			$this->parser->parse('template/pages',$data);
		}

   //  	function category($slug){
   //  		$data['nav'] = $this->db->get('categorys')->result();
   //  		$qrs = $this->Mdl_category->category($slug);
   //  		if($qrs){
	  //       $data['qrs'] = $qrs;
	  //       $data['title']="Category";
			// $data['module']="category";
			// $data['view_file']="category";
			// $this->parser->parse('template/pages',$data);
			// }else{
			// 	$this->show404();
			// }
   //  	}

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

		function item($slug){
			$data['nav'] = $this->db->get('categorys')->result();
    		$data['catslug'] = $this->uri->segment('2');
    		$slug = $this->uri->segment('4');
    		$qrs = $this->Mdl_category->item($slug);    	
	        $data['qrs'] = $qrs;
	        $data['title']="Category";
			$data['module']="category";
			$data['view_file']="item";
			$this->parser->parse('template/pages',$data);
		}

		function itemview($slug){
			$data['nav'] = $this->db->get('categorys')->result();
			$data['catslug'] = $this->uri->segment('2');
    		$slug = $this->uri->segment('4');
    		$qrs = $this->Mdl_category->itemview($slug);    	
	        $data['qrs'] = $qrs;
	        $data['title']="Category";
			$data['module']="category";
			$data['view_file']="item-view";
			$this->parser->parse('template/pages',$data);
		}

    	function show404(){
	    	$data['title']="404 Page Error";
	    	$this->parser->parse('template/error',$data);
    	}
	}
?>