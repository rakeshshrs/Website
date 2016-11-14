<?php
	class Mdl_item extends CI_model{
		public $table_name='items';

		function create($data){
			$this->db->insert('items',$data);
		}

		function show(){
			$this->db->select('*');
			$this->db->from('items');
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function edit(){
			$get_id=$this->uri->segment(4);
			$this->db->select('*')->from('items')->where('id',$get_id)->limit(1);		
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function update($id, $data){
			$this->db->where('id',$id);
			$this->db->update('items',$data);
		}

		function destroy($id){
			$this->db->where('id',$id);
			$this->db->delete('items');
		}

		function slug($slug) {
        	$this->db->select('*')->from('items')->where('slug',$slug)->limit(1);
        	$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function category($category){
    		$this->db->select('*')->from('category')->where('category_name',$category)->limit(1);
    		$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function getCategory(){
    		$this->db->select('*')->from('categorys');
    		$qry=$this->db->get();
    		$qrs=$qry->result();
    		return $qrs;
    	}

    	function getSubcategory(){
    		$this->db->select('*')->from('subcategorys');
    		$qry=$this->db->get();
    		$qrs=$qry->result();
    		return $qrs;
    	}
	}
?>