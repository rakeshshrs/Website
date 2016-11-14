<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Template extends MX_controller{		
		function login($data){
			$this->load->view('login',$data);
		}

		function admin($data){
			$this->load->view('admin',$data);
		}

		function error($data){
			$this->load->view('error',$data);
		}

		function pages($data){
			$this->load->view('pages',$data);
		}

		function widget($data){
			$this->load->view('widget',$data);
		}

		function homepage($data){
			$qrs = $this->Mdl_home->content('home');
			$data['qrs'] = $qrs;
			$this->load->view('homepage',$data);
		}
	}
?>