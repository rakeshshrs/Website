<?php
	class Mdl_page extends CI_model{
		public $table_name='page';

		function create($data){
			$this->db->insert('page',$data);
		}

		function show(){
			$this->db->select('*');
			$this->db->from('page');
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function edit(){
			$get_id=$this->uri->segment(4);
			$this->db->select('*')->from('page')->where('id',$get_id)->limit(1);		
			$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
		}

		function update($id, $data){
			$this->db->where('id',$id);
			$this->db->update('page',$data);
		}

		function destroy($id){
			$this->db->where('id',$id);
			$this->db->delete('page');
		}

		function slug($slug) {
        	$this->db->select('*')->from('page')->where('slug',$slug)->limit(1);
        	$qry=$this->db->get();
			$qrs=$qry->result();
			return $qrs;
    	}

    	function sendmail(){
    		$this->load->library('email');
		$config['mailtype'] = 'html';
    		$config['protocol'] = 'mail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
    		$this->email->from('shrs.rakesh@gmail.com','Test');
    		$this->email->to('shrs.rakesh@gmail.com');
    		$this->email->subject('contact form');
    		$name=$this->input->post('name');
    		$address=$this->input->post('address');
    		$email=$this->input->post('email');
    		$telephone=$this->input->post('telephone');
    		$msg=$this->input->post('msg');
    		$message = <<<EMAIL
            <b>Name: </b>$name<br/>
            <b>Address: </b>$address<br/>
            <b>email Address: </b>$email<br/>
            <b>Telephone: </b>$telephone<br/>
            <b>Message: </b>$msg<br/>
EMAIL;
    		$this->email->message($message);
    		//$this->email->send();
    		if ( ! $this->email->send()){
    			echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Error while sending Email. Please try again!</div>
			</div>";
			echo $this->email->print_debugger();
			} else{
				$this->email->send();
				echo "<div class='container-fluid'>
			<div class='alert alert-success' role='alert'>Message sent successfully!</div>
			</div>";
			}
    	}
	}
?>