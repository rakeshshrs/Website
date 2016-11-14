<?php
	class Mdl_customer extends CI_model{
		public $table_name='customers';

		function create($data){
			$this->db->insert('customers',$data);
		}

		function show(){
			$this->db->select('*');
			$this->db->from('customers');
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function edit(){
			$get_id=$this->uri->segment(4);
			$this->db->select('*')->from('customers')->where('id',$get_id)->limit(1);		
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function update($id, $data){
			$this->db->where('id',$id);
			$this->db->update('customers',$data);
		}

		function destroy($id){
			$this->db->where('id',$id);
			$this->db->delete('customers');
		}

		function slug($slug) {
        	$this->db->select('*')->from('customers')->where('slug',$slug)->limit(1);
        	$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function record_count(){
    		return $this->db->count_all("customers");
    	}

    	function display($limit,$start){
    		$this->db->limit($limit, $start);
			$qry=$this->db->get('customers');
			$qrs=$qry->result();
			return $qrs;
		}
	}
?>