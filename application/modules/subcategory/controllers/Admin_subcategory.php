<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_subcategory extends MX_controller{

	function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('Mdl_subcategory');
	}

	function is_logged_in(){
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_login_in=FALSE){				
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>You do not have persmission to access this page.</div>
			</div>";
		$data['title']="Login";
		$data['module']="subcategory";
		$data['view_file']="admin/login";
		echo Modules::run('template/login',$data);
		die();
		}
	}

	function index(){
		$data['qrs']=$this->Mdl_subcategory->show();
		$data['title']="Admin subcategory";
		$data['module']="subcategory";
		$data['view_file']="admin/index";
		$this->parser->parse('template/admin',$data);
	}

	public function uploadImage($files, $prefix = "products_", $width =787, $height = 711, $thumb = TRUE, $imagedir = 'products'){
        $this->load->library('upload');
        $_FILES['userfile']['name']= "$prefix".preg_replace( '/\s+/', '_', $files['imagefull']['name']);
        $_FILES['userfile']['type']= $files['imagefull']['type'];
        $_FILES['userfile']['tmp_name']= $files['imagefull']['tmp_name'];
        $_FILES['userfile']['error']= $files['imagefull']['error'];
        $_FILES['userfile']['size']= $files['imagefull']['size'];
        $config['upload_path'] = './assets/upload/'.$imagedir;
        $config['allowed_types'] = '*';
        $config['max_size']      = '2000';
        $config['overwrite']     = FALSE;
        $this->upload->initialize($config);
        $upload_error = (!$this->upload->do_upload()) ? $this->upload->display_errors() : '';
        $uploads = array('imagefull' => $this->upload->data());
        $this->load->library('image_lib');
        $path = "./assets/upload/$imagedir/";
        $source_image = $uploads['imagefull']['file_name'];
        $slide_image = $uploads['imagefull']['file_name'];

        $config2['image_library'] = 'gd2';
        $config2['create_thumb'] = FALSE;
        $config2['maintain_ratio'] = FALSE;
        $config2['source_image'] = "./assets/upload/$imagedir/".$source_image;
        $config2['new_image'] = $path.$slide_image;
        $config2['width'] = $width;
        $config2['height'] = $height;

        $this->image_lib->initialize($config2); 
        $this->image_lib->resize();
        if($thumb == TRUE):
            $path2 = "./assets/upload/$imagedir/thumbs/";
            $config3['image_library'] = 'gd2';
            $config3['create_thumb'] = FALSE;
            $config3['maintain_ratio'] = FALSE;
            $config3['source_image'] = "./assets/upload/$imagedir/".$source_image;
            $config3['new_image'] = $path2.$slide_image;
            $config3['width'] = 400;
            $config3['height'] = 262;

            $this->image_lib->initialize($config3); 
            $this->image_lib->resize();
        endif;
        return array($source_image, $upload_error);
    }

	function create(){
		$data['title']="Create new subcategory";
		$data['module']="subcategory";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
	}

	function store(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('heading','Heading','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
		if($this->form_validation->run()==FALSE){
			// if($_FILES['imagefull']['error'] == 0):
   //              $imagefulls = $this->uploadImage($_FILES);
   //              $imagefull = $imagefulls[0];
   //              $imageerror = $imagefulls[1];
   //          endif;
   //              $imagechk = '';
   //              extract($_POST);
   //              (empty($imagefull)) ? $imagefull = $imagechk : '';

		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Please enter complete and valid data!</div>
			</div>";
		$data['title']="Store subcategory";
		$data['module']="subcategory";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
		}else{
		$userfile="image";
		$config['upload_path']          = './assets/upload/sub-categories/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($userfile))
            {
                $error = array('error' => $this->upload->display_errors());
            }
        else
            {
                $data = array('upload_data' => $this->upload->data($userfile));
            }
        $filename=array('image'=>$this->upload->data());
        $fname=$filename['image']['file_name'];

        $slug = $this->input->post('heading');
        $slug = url_title($slug,'dash',true);
        $cat = $this->input->post('category');
        $catslug = url_title($cat,'dash',true);

		$data=array(
			'heading'=>$this->input->post('heading'),
			'slug'=>$slug,
			'page_title'=>$this->input->post('page_title'),
			'meta_desc'=>$this->input->post('meta_desc'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
			'description'=>$this->input->post('description'),
			'image'=>$fname,
			'image_thumb'=>$this->input->post('image_thumb'),
			'status'=>$this->input->post('status'),
			'order'=>$this->input->post('order'),
			'category'=>$catslug,
			//'price'=>$this->input->post('price'),
			'created_on'=>date('Y')
		);
		$this->Mdl_subcategory->create($data);
		echo "<div class='container-fluid'>
					<div class='alert alert-success' role='alert'>New subcategory Created!</div>
				</div>";
			$data['title']="subcategory Created";
			$data['module']="subcategory";
			$data['view_file']="admin/create";
			$this->parser->parse('template/admin',$data);		
		}
	}

	function show(){
		// show used in index
	}

	function edit(){
		$id=$this->input->post('id');
		$data['qrs']=$this->Mdl_subcategory->edit();
		$data['title']="Edit subcategory";
		$data['module']="subcategory";
		$data['view_file']="admin/edit";
		$this->parser->parse('template/admin',$data);
	}

	function update(){
		$userfile="image";
		$id=$this->input->post('id');
		$config['upload_path']          = './assets/upload/sub-categories/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($userfile))
            {
                $error = array('error' => $this->upload->display_errors());
            }
        else
            {
                $data = array('upload_data' => $this->upload->data($userfile));
            }
        $filename=array('image'=>$this->upload->data());
        $fname=$filename['image']['file_name'];

        $slug = $this->input->post('heading');
        $slug = url_title($slug,'dash',true);
        $cat = $this->input->post('category');
        $catslug = url_title($cat,'dash',true);

		$data=array(
			'heading'=>$this->input->post('heading'),
			'slug'=>$slug,
			'page_title'=>$this->input->post('page_title'),
			'meta_desc'=>$this->input->post('meta_desc'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
			'description'=>$this->input->post('description'),
			'image'=>$fname,
			'image_thumb'=>$this->input->post('image_thumb'),
			'status'=>$this->input->post('status'),
			'category'=>$catslug,
			'price'=>$this->input->post('price'),
			'order'=>$this->input->post('order')
		);
		$this->Mdl_subcategory->update($id,$data);
		echo "<div class='container-fluid'>
			<div class='alert alert-info' role='alert'>Data Updated!</div>
			</div>";
		$data['title']="Update";
		$data['module']="subcategory";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
	}

	function destroy(){
		$id=$this->uri->segment(4);
		$this->Mdl_subcategory->destroy($id);
		echo "<div class='container-fluid'>
			<div class='alert alert-danger' role='alert'>Data Deleted!</div>
			</div>";
		$data['title']="Delete";
		$data['module']="subcategory";
		$data['view_file']="admin/create";
		$this->parser->parse('template/admin',$data);
	}
}
