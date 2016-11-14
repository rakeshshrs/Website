<?php
	class Mdl_review extends CI_model{
		public $table_name='reviews';

		function create($data){
			$this->db->insert('reviews',$data);
		}

		function show(){
			$this->db->select('*');
			$this->db->from('reviews');
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function edit(){
			$get_id=$this->uri->segment(4);
			$this->db->select('*')->from('reviews')->where('id',$get_id)->limit(1);		
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function update($id, $data){
			$this->db->where('id',$id);
			$this->db->update('reviews',$data);
		}

		function destroy($id){
			$this->db->where('id',$id);
			$this->db->delete('reviews');
		}

		function slug($slug) {
        	$this->db->select('*')->from('reviews')->where('slug',$slug)->limit(1);
        	$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function record_count(){
    		return $this->db->count_all("reviews");
    	}

    	function display($limit,$start){
    		$this->db->limit($limit, $start);
			$this->db->where('status','1');
			$qry=$this->db->get('reviews');
			$qrs=$qry->result();
			return $qrs;
		}
	}
?>