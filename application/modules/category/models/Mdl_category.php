<?php
	class Mdl_category extends CI_model{
		public $table_name='categorys';

		function create($data){
			$this->db->insert('categorys',$data);
		}

		function show(){
			$this->db->select('*');
			$this->db->from('categorys');
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function edit(){
			$get_id=$this->uri->segment(4);
			$this->db->select('*')->from('categorys')->where('id',$get_id)->limit(1);		
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function update($id, $data){
			$this->db->where('id',$id);
			$this->db->update('categorys',$data);
		}

		function destroy($id){
			$this->db->where('id',$id);
			$this->db->delete('categorys');
		}

    	function category($slug){
    		$this->db->select('*')->from('categorys')->where('slug',$slug);
    		$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function subcategory($slug){
    		$this->db->select('*')->from('subcategorys')->where('category',$slug);
    		$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function item($slug){
    		$this->db->select('*')->from('items')->where('subcategory',$slug);
    		$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function itemview($slug){
    		$this->db->select('*')->from('items')->where('slug',$slug);
    		$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}
	}
?>