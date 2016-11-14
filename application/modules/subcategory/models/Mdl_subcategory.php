<?php
	class Mdl_subcategory extends CI_model{
		public $table_name='subcategorys';

		function create($data){
			$this->db->insert('subcategorys',$data);
		}

		function show(){
			$this->db->select('*');
			$this->db->from('subcategorys');
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function edit(){
			$get_id=$this->uri->segment(4);
			$this->db->select('*')->from('subcategorys')->where('id',$get_id)->limit(1);		
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function update($id, $data){
			$this->db->where('id',$id);
			$this->db->update('subcategorys',$data);
		}

		function destroy($id){
			$this->db->where('id',$id);
			$this->db->delete('subcategorys');
		}
	}
?>