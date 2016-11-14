<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Admin_home extends MX_controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('Mdl_home');
		}

		function index(){
			$is_logged_in=$this->session->userdata('is_logged_in');
			if(!isset($is_logged_in)||$is_login_in=FALSE){	
			$data['title']="Admin Home";
			$data['module']="home";
			$data['view_file']="admin/login";
			$this->parser->parse('template/login',$data);
			}
			else{
			$data['title']="Admin Home";
			$data['module']="home";
			$data['view_file']="admin/home";
			$this->parser->parse('template/admin',$data);
			}
			//echo Modules::run('template/pages',$data);
		}

		function is_logged_in(){
			$is_logged_in=$this->session->userdata('is_logged_in');
			if(!isset($is_logged_in)||$is_login_in=FALSE){				
			echo "<div class='container-fluid'>
					<div class='alert alert-danger' role='alert'>You do not have persmission to access this page.</div>
				</div>";
			$data['title']="Login";
			$data['module']="home";
			$data['view_file']="admin/login";
			echo Modules::run('template/login',$data);
			die();
			}
		}

		function authenticate(){
			$this->form_validation->set_rules('username','Username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			if($this->form_validation->run()==FALSE){
				if(isset($this->session->userdate['is_logged_in'])){
					echo "logged in";
				}else{
					echo "<div class='container-fluid'>
					<div class='alert alert-danger' role='alert'>Empty Fields!</div>
				</div>";
					$data['title']="Login";
					$data['module']="home";
					$data['view_file']="admin/login";
					$this->parser->parse('template/login',$data);
				}
			}else{
				$data=array(
					'username'=>$this->input->post('username'),
					'password'=>$this->input->post('password')
					);
				$result=$this->Mdl_home->login($data);
				if($result==TRUE){					
					$username = $this->input->post('username');
					$result = $this->Mdl_home->read_user_information($username);
					if ($result != false) {
					$session_data = array(
					'username' => $result[0]->username,
					);
					// Add user data in session
					$this->session->set_userdata('is_logged_in', $session_data);
					echo "<div class='container-fluid'>
					<div class='alert alert-success' role='alert'>You are logged in!</div>
				</div>";
					$data['title']="Home";
					$data['module']="home";
					$data['view_file']="admin/home";
					$this->parser->parse('template/admin',$data);
					}
					} else {
					echo "<div class='container-fluid'>
					<div class='alert alert-danger' role='alert'>Invalid User Detail!</div>
				</div>";
					$data['title']="Login | Try Again";
					$data['module']="home";
					$data['view_file']="admin/login";
					$this->parser->parse('template/login',$data);
				}
			}
		}

		public function logout() {
		$this->is_logged_in();
		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('is_logged_in', $sess_array);
		echo "<div class='container-fluid'>
					<div class='alert alert-warning' role='alert'>You've logged out!</div>
				</div>";
		$data['title']="Logged Out";
		$data['module']="home";
		$data['view_file']="admin/login";
		$this->parser->parse('template/login',$data);
		}
	}
?>