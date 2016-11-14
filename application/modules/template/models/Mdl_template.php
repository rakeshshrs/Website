<?php
	class Mdl_template extends CI_model{
		function index(){
			//
		}

		function content(){
			$this->db->select('*')->from('page')->where('slug','home')->limit(1);
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}
	}
?>