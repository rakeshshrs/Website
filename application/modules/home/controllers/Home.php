<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Home extends MX_controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Mdl_home');
		}

		function index(){
			$qrs = $this->Mdl_home->content('home');
			$data['nav'] = $this->db->get('categorys')->result();
			$data['subnav'] = $this->db->get('subcategorys')->result();
			$data['qrs'] = $qrs;
			$data['title']="Home";
			$data['module']="home";
			$data['view_file']="Home";
			$this->parser->parse('template/homepage',$data);
			//echo Modules::run('template/pages',$data);
		}
	}
?>