<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
  		$this->load->helper('url');
   		$this->load->model('admin_model');
     	$this->load->library('session');

     	$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model('firebase_model');
    }


	
	public function login()
	{
		$this->load->view('admin/login');
	}

	public function login_admin()
	{
	  	$login=array(
		  'email'=>$this->input->post('email'),
		  'password'=>md5($this->input->post('password'))
	    );

	    $data=$this->admin_model->login_user($login['email'],$login['password']);
      	if($data)
      	{
	        $this->session->set_userdata('aid',$data['id']);
	        $this->session->set_userdata('aemail',$data['email']);
	        $this->session->set_userdata('aname',$data['name']);
	        $this->session->set_userdata('aimg',$data['img']);
		
			redirect(base_url('admin/dashboard'));
      	}
      	else{
        $this->session->set_flashdata('error', 'Email Id And Password Wrong..');
       	redirect(base_url('admin/login'));
      }
	}

	public function logout(){

	  $this->session->sess_destroy();
	  redirect(base_url().'admin/login', 'refresh');
	}

	public function admin_profile()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	
		$data['users'] = $this->admin_model->get_users(); 

		// $data['users'] = $this->admin_model->get_users(); 
		// $this->load->view("Admin/user.php",$data);

		$data['page'] = 'profile';
		$this->load->view('admin/template', $data);
	}

	public function admin_edit()
	{

		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		// $id = $this->uri->segment(3);
		$id = $this->session->userdata('aid');
		        
		if (empty($id))
		{
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');

		$profile = $this->admin_model->get_admin($id);

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['page'] = 'profile';
			$this->load->view('admin/template', $data);
		}
		else
		{
	      if($_FILES['img']['name'] == "")
	      {
		       $this->admin_model->set_user($id,$res_image = "");
		    	$this->session->set_flashdata('success', 'successfully Updated..');
		    	redirect(base_url('admin/profile'));
	      }
	      else
	      {
	      $image_exts = array("tif", "jpg", "jpeg", "gif", "png");

	      $configVideo['upload_path'] = './uploads/profile_pics/'; # check path is correct
	      $configVideo['max_size'] = '102400';
	      $configVideo['allowed_types'] = $image_exts; # add video extenstion on here
	      $configVideo['overwrite'] = FALSE;
	      $configVideo['remove_spaces'] = TRUE;
	      $configVideo['file_name'] = uniqid();

	      $this->load->library('upload', $configVideo);
	      $this->upload->initialize($configVideo);

	      if (!$this->upload->do_upload('img')) # form input field attribute
	      {
	          $this->session->set_flashdata('error', 'Image Type Error...');
	         $data['page'] = 'profile';
			$this->load->view('admin/template', $data);
	         
	      }
	      else
	      {
	          # Upload Successfull
	          $upload_data = $this->upload->data();
	          $res_image = $upload_data['file_name'];
	          
	          $this->admin_model->set_user($id,$res_image);
	    	 $this->session->set_flashdata('success', 'successfully Updated..');
	    	 redirect(base_url('admin/profile'));
	      }
	      } 
		}
	}

	public function change_password()
	{

		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$id = $this->session->userdata('aid');
		        
		if (empty($id))
		{
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('npassword', 'New Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');

		if ($this->form_validation->run() === FALSE)
		{
			$data['page'] = 'profile';
			$this->load->view('admin/template', $data);
		}
		else
		{
			$password=md5($this->input->post('password'));
			$npassword=md5($this->input->post('npassword'));
			$cpassword=md5($this->input->post('cpassword'));
			
			if($npassword==$cpassword)
			{
			$password_check=$this->admin_model->password_check($password,$id);

			if($password_check){
			  $this->admin_model->change_pass($npassword,$id);
			  $this->session->set_flashdata('success', 'Successfully Changed..');
			  // redirect(base_url().'admin/profile/');
			  redirect(base_url('admin/profile'));
			}
			else{
			  $this->session->set_flashdata('error', 'Old Password Wrong..');
			  redirect(base_url().'admin/profile/');
			}
			}
			else{
			  $this->session->set_flashdata('error', 'New Password And Confirm Password Not Match..');
			  redirect(base_url().'admin/profile/');
			}
		}
	}

	public function list_user()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_user';
		$this->load->view('admin/template', $data);
	}

	public function edit_user()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_user';
		$data['user'] = $this->admin_model->get_user_by_id($id); 
		$this->load->view('admin/template',$data);
  	}

  	public function update_user()
  	{
  		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

  		$cat_id = $_REQUEST['id'];
		
		$this->form_validation->set_rules('username','UserName','required');
		$this->form_validation->set_rules('email','Email Id','required');

		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
		if($this->form_validation->run() == false)  
		{  
			//Error
		}
		else
		{
			$data = array(
				'username' => $_REQUEST['username'],
				'email' => $_REQUEST['email'],
			);

			if(!empty($_FILES['profile_pic']['name'])){
				$config['upload_path'] = './uploads/profile_pics';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['file_name'] = uniqid();
                $config['overwrite'] = TRUE;
    
                // Load and initialize upload library
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                // Upload file to server
                if($this->upload->do_upload('profile_pic')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $profile_pic = $fileData['file_name'];
                }
                else {
                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                }

				$data['profile_pic'] = $profile_pic;
			}

			$check = $this->admin_model->update_user_by_id($cat_id,$data);
			if($check)
			{
				$this->session->set_flashdata('success', 'User has been successfully Updated.');
				redirect('admin/user-list',$data);
			}
		}

		$data['page'] = 'edit_user';
		$data['user'] = $this->admin_model->get_user_by_id($id);   
		$this->load->view('admin/template',$data);
  	}

  	public function trash_user()
	{ 
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		if(!empty($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$this->db->where('user_id', $id);
			$this->db->delete("likes");

			$this->db->where('rev_user', $id);
			$this->db->delete("reviews");

			$this->db->where('id', $id);
			$this->db->delete("user");
			$this->session->set_flashdata('del_success', 'User has been Successfully Deleted.');
			redirect('admin/user-list');
		}
	}

	public function list_vendor()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_vendor';
		$this->load->view('admin/template', $data);
	}

	public function create_vendor()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		$data['page'] = 'add_vendor';
		$this->load->view('admin/template',$data);
	}

	public function add_vendor()
 	{
 		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

// 		$this->form_validation->set_rules('fname','First Name','required'); 
// 		$this->form_validation->set_rules('lname','Last Name','required'); 
 		$this->form_validation->set_rules('uname','User Name','required'); 
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required'); 
		$this->form_validation->set_rules('cpassword','Confirm Password','required'); 
		
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
		if($this->form_validation->run() == false)  
		{  		
			//Error
		}
		else
		{
			$data = array(
				// 'fname' => $_REQUEST['fname'],
				// 'lname' => $_REQUEST['lname'],
				'uname' => $_REQUEST['uname'],
				'email' => $_REQUEST['email'],
			);

			if(!empty($_FILES['profile_image']['name'])){
				$config['upload_path'] = './uploads';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['file_name'] = uniqid();
                $config['overwrite'] = TRUE;
    
                // Load and initialize upload library
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                // Upload file to server
                if($this->upload->do_upload('profile_image')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $profile_image = $fileData['file_name'];
                }
                else {
                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                }

			$data['profile_image'] = $profile_image;
			}

			$data['password'] = md5($this->input->post('password'));
			$cpassword = md5($this->input->post('cpassword'));
			if($data['password']  == $cpassword )
			{		
				
				$check = $this->admin_model->add_vendor($data);
				if($check)
				{
					$this->session->set_flashdata('add_success', 'Category has been added Successfully.');
					redirect('admin/vendor-list');
				}
			}
			
			    $this->session->set_flashdata('error', 'Password And Confirm Password Not Match..');
				redirect('admin/add-vendor');
		}
		$data['page'] = 'add_vendor';
		$this->load->view('admin/template',$data);
  	}

  	public function edit_vendor()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_vendor';
		$data['vendor'] = $this->admin_model->get_vendor_by_id($id); 
		$this->load->view('admin/template',$data);
  	}

  	public function update_vendor()
  	{
  		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

  		$cat_id = $_REQUEST['id'];
		
// 		$this->form_validation->set_rules('fname','First Name','required'); 
// 		$this->form_validation->set_rules('lname','Last Name','required'); 
 		$this->form_validation->set_rules('uname','User Name','required'); 
		$this->form_validation->set_rules('email','Email','required');

		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
		if($this->form_validation->run() == false)  
		{  
			//Error
		}
		else
		{
			$data = array(
				// 'fname' => $_REQUEST['fname'],
				// 'lname' => $_REQUEST['lname'],
				'uname' => $_REQUEST['uname'],
				'email' => $_REQUEST['email'],
			);
			
			if (!empty($_FILES['profile_image']['name'])) {
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = uniqid();
				$config['overwrite'] = TRUE;

				// Load and initialize upload library
				$this->load->library('upload');
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('profile_image')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$profile_image = $fileData['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
				}

				$data['profile_image'] = $profile_image;
			}

			if($this->input->post('password') != "")
			{
				$data['password'] = md5($this->input->post('password'));
			}

			$check = $this->admin_model->update_vendor_by_id($cat_id,$data);
			if($check)
			{
				$this->session->set_flashdata('success', 'Category has been successfully Updated.');
				redirect('admin/vendor-list',$data);
			}
		}

		$data['page'] = 'edit_vendor';
		$data['vendor'] = $this->admin_model->get_vendor_by_id($cat_id); 
		$this->load->view('admin/template',$data);
  	}

	public function trash_vendor()
	{ 
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		if(!empty($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			
			$this->db->where('vid', $id);
			$this->db->delete("restaurants");
			
			$this->db->where('id', $id);
			$this->db->delete("vendor");
			$this->session->set_flashdata('del_success', 'User has been Successfully Deleted.');
			redirect('admin/vendor-list');
		}
	}

	public function list_category()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_category';
		$this->load->view('admin/template', $data);
	}

	public function create_category()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		$data['page'] = 'add_category';
		$this->load->view('admin/template',$data);
	}

	public function add_category()
 	{
 		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

 		$this->form_validation->set_rules('c_name','Category Name','required|is_unique[categories.c_name]'); 
		
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
		if($this->form_validation->run() == false)  
		{  		
			//Error
		}
		else
		{
			$data = array(
				'c_name' => $_REQUEST['c_name'],
				'c_name_a' => $_REQUEST['c_name_a'],
				'parent_id' => $_REQUEST['parent_id'],
				// 'type' => $_REQUEST['type'],
			);

			$img = array();
			if($_FILES['img']['name']) {
				//echo "image detected";
				if(is_array($_FILES['img']['name'])) {
				  $filesCount = count($_FILES['img']['name']);
				  for($i=0; $i< $filesCount; $i++) {
					  $_FILES['file']['name']     = $_FILES['img']['name'][$i];
					  $_FILES['file']['type']     = $_FILES['img']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
					  $_FILES['file']['error']     = $_FILES['img']['error'][$i];
					  $_FILES['file']['size']     = $_FILES['img']['size'][$i];
		  
					  // File upload configuration
					  $config['upload_path'] = './uploads';
					  $config['allowed_types'] = 'gif|jpg|png|jpeg';
					  $config['file_name'] = uniqid();
					  $config['overwrite'] = TRUE;
					  
		  
					  // Load and initialize upload library
					  $this->load->library('upload');
					  $this->upload->initialize($config);
		  
					  // Upload file to server
					  if($this->upload->do_upload('file')){
						  // Uploaded file data
						  $fileData = $this->upload->data();
						  array_push($img, $fileData['file_name']);
						  //$img = $fileData['file_name'];
						  
					  }
					  else {
						  $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
						  $this->session->set_flashdata('error',$error['error']);
						  
					  }
				  }
				} 
			}
			$data['img'] = implode('::::', $img);

			// if(!empty($_FILES['img']['name'])){
			// 	$config['upload_path'] = './uploads';
   //              $config['allowed_types'] = 'jpg|png|jpeg';
   //              $config['file_name'] = uniqid();
   //              $config['overwrite'] = TRUE;
    
   //              // Load and initialize upload library
   //              $this->load->library('upload');
   //              $this->upload->initialize($config);
    
   //              // Upload file to server
   //              if($this->upload->do_upload('img')){
   //                  // Uploaded file data
   //                  $fileData = $this->upload->data();
   //                  $img = $fileData['file_name'];
   //              }
   //              else {
   //                  $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
   //              }

			// $data['img'] = $img;
			// }

			$icon = "";
			if(!empty($_FILES['icon']['name'])){
				$config['upload_path'] = './uploads';
                $config['allowed_types'] = 'gif|png';
                $config['file_name'] = uniqid();
                $config['overwrite'] = TRUE;
    
                // Load and initialize upload library
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                // Upload file to server
                if($this->upload->do_upload('icon')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $icon = $fileData['file_name'];
                }
                else {
                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                }

			$data['icon'] = $icon;
			}

			$check = $this->admin_model->add_category($data);
			if($check)
			{
				$this->session->set_flashdata('add_success', 'Category has been added Successfully.');
				redirect('admin/category-list');
			}
		}
		$data['page'] = 'add_category';
		$this->load->view('admin/template',$data);
  	}

  	public function edit_category()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_category';
		$data['category'] = $this->admin_model->get_category_by_id($id); 
		$this->load->view('admin/template',$data);
  	}
  	
  	public function update_category()
  	{
  		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

  		$cat_id = $_REQUEST['id'];

  		$original_value = $this->db->query("SELECT c_name FROM categories WHERE id = ".$cat_id)->row()->c_name ;
	    if($_REQUEST['c_name'] != $original_value) {
	       $is_unique =  '|is_unique[categories.c_name]';
	    } else {
	       $is_unique =  '';
	    }
		
		$this->form_validation->set_rules('c_name','Category Name','required|trim'.$is_unique);

		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
		if($this->form_validation->run() == false)  
		{  
			//Error
		}
		else
		{
			$data = array(
				'c_name' => $_REQUEST['c_name'],
				'c_name_a' => $_REQUEST['c_name_a'],
				'parent_id' => $_REQUEST['parent_id'],
			);

			if($_FILES['img']['name'][0] !="") {
				$img = array();
				//echo "image detected";
				if(is_array($_FILES['img']['name'])) {
				  $filesCount = count($_FILES['img']['name']);
					for($i=0; $i< $filesCount; $i++) {
						  $_FILES['file']['name']     = $_FILES['img']['name'][$i];
						  $_FILES['file']['type']     = $_FILES['img']['type'][$i];
						  $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
						  $_FILES['file']['error']     = $_FILES['img']['error'][$i];
						  $_FILES['file']['size']     = $_FILES['img']['size'][$i];
			  
						  // File upload configuration
						  $config['upload_path'] = './uploads/';
						  $config['allowed_types'] = 'gif|jpg|png|jpeg';
						  $config['file_name'] = uniqid();
						  $config['overwrite'] = TRUE;
						  
			  
						  // Load and initialize upload library
						  $this->load->library('upload');
						  $this->upload->initialize($config);
			  
						  // Upload file to server
						  if($this->upload->do_upload('file')){
							  // Uploaded file data
							  $fileData = $this->upload->data();
							  array_push($img, $fileData['file_name']);
							 // $img = $fileData['file_name'];
							  
						  }
						  else {
							  $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
							  $this->session->set_flashdata('error',$error['error']);
							  
						  }
					}

				  	$data['img'] = implode("::::",$img);
				} 
			}

			// if(!empty($_FILES['img']['name'])){
			// 	$config['upload_path'] = './uploads';
   //              $config['allowed_types'] = 'jpg|png|jpeg';
   //              $config['file_name'] = uniqid();
   //              $config['overwrite'] = TRUE;
    
   //              // Load and initialize upload library
   //              $this->load->library('upload');
   //              $this->upload->initialize($config);
    
   //              // Upload file to server
   //              if($this->upload->do_upload('img')){
   //                  // Uploaded file data
   //                  $fileData = $this->upload->data();
   //                  $img = $fileData['file_name'];
   //              }
   //              else {
   //                  $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
   //              }

			// 	$data['img'] = $img;
			// }

			if(!empty($_FILES['icon']['name'])){
				$config['upload_path'] = './uploads';

				$config['allowed_types'] = 'gif|png';
			$config['file_name'] = uniqid();
                $config['overwrite'] = TRUE;
    
                // Load and initialize upload library
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                // Upload file to server
                if($this->upload->do_upload('icon')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $icon = $fileData['file_name'];
                }
                else {
                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                }

				$data['icon'] = $icon;
			}

			$check = $this->admin_model->update_category_by_id($cat_id,$data);
			if($check)
			{
				$this->session->set_flashdata('update_success', 'Category has been successfully Updated.');
				redirect('admin/category-list',$data);
			}
		}

		$data['page'] = 'edit_category';
		$data['category'] = $this->admin_model->get_category_by_id($id);
		$this->load->view('admin/template',$data);
  	}

  	public function trash_category()
	{ 
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		if(!empty($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];
			
			$this->db->where('id', $id);
			$this->db->delete("categories");
			$this->session->set_flashdata('del_success', 'Category has been Successfully Deleted.');
			redirect('admin/category-list');
		}
	}

	public function list_likes()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_likes';
		$this->load->view('admin/template', $data);
	}

	public function likeview()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'likeview';
		$this->load->view('admin/template', $data);
	}

	public function list_reviews()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_reviews';
		$this->load->view('admin/template', $data);
	}

	public function reviews_view()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'reviews_view';
		$this->load->view('admin/template', $data);
	}

	public function trash_reviews()
	{ 

		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		if(!empty($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];
			$review_id = $_REQUEST['review_id'];
			
			$this->db->where('rev_id', $id);
			$this->db->delete("reviews");
			$this->session->set_flashdata('success', 'Category has been Successfully Deleted.');

			redirect('admin/reviews-view/'.$review_id);
		}
	}

	public function list_restaurants()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_restaurants';
		$this->load->view('admin/template', $data);
	}

	public function create_restaurants()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		$data['page'] = 'add_restaurants';
		$this->load->view('admin/template',$data);
	}

	public function add_restaurants()
 	{
 		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

 		$this->form_validation->set_rules('name','Category Name','required'); 
		
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
		if($this->form_validation->run() == false)  
		{  		
			//Error
		}
		else
		{
			$res_image = array();
			$res_video = "";
			$logo = "";

			if($_FILES['res_image']['name']) {
				//echo "image detected";
				if(is_array($_FILES['res_image']['name'])) {
				  $filesCount = count($_FILES['res_image']['name']);
				  for($i=0; $i< $filesCount; $i++) {
					  $_FILES['file']['name']     = $_FILES['res_image']['name'][$i];
					  $_FILES['file']['type']     = $_FILES['res_image']['type'][$i];
					  $_FILES['file']['tmp_name'] = $_FILES['res_image']['tmp_name'][$i];
					  $_FILES['file']['error']     = $_FILES['res_image']['error'][$i];
					  $_FILES['file']['size']     = $_FILES['res_image']['size'][$i];
		  
					  // File upload configuration
					  $config['upload_path'] = './uploads';
					  $config['allowed_types'] = 'gif|jpg|png|jpeg';
					  $config['file_name'] = uniqid();
					  $config['overwrite'] = TRUE;
					  
		  
					  // Load and initialize upload library
					  $this->load->library('upload');
					  $this->upload->initialize($config);
		  
					  // Upload file to server
					  if($this->upload->do_upload('file')){
						  // Uploaded file data
						  $fileData = $this->upload->data();
						  array_push($res_image, $fileData['file_name']);
						  //$res_image = $fileData['file_name'];
						  
					  }
					  else {
						  $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
						  $this->session->set_flashdata('error',$error['error']);
						  
					  }
				  }
				} 
			}

			if($_FILES['logo']['name']) {
				// File upload configuration
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = uniqid();
				$config['overwrite'] = TRUE;
				

				// Load and initialize upload library
				$this->load->library('upload');
				$this->upload->initialize($config);

				// Upload file to server
				if($this->upload->do_upload('logo')){
					// Uploaded file data
					$fileData = $this->upload->data();
					$logo = $fileData['file_name'];
					
				}
				else {
					$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
					$this->session->set_flashdata('error',$error['error']);
					
				}
			}


			$address = $this->input->post('address');
		
			$data['res_name'] = $this->input->post('name');
			$data['res_desc'] = $this->input->post('description');


				
			$data['res_name_a'] = $this->input->post('res_name_a');
			$data['res_desc_a'] = $this->input->post('res_desc_a');

			$data['space'] = $this->input->post('space');

			$data['display_ads'] = $this->input->post('display_ads');
		
			$data['type'] = $this->input->post('type');
			
		
			$data['res_phone'] = $this->input->post('phone');
			
			$data['cat_id'] = $this->input->post('cat_id');

			$data['region_id'] = $this->input->post('region_id');
		//	$data['location_id'] = $this->input->post('location_id');
			$data['status'] = $this->input->post('status');
			$data['real_compound'] = $this->input->post('real_compound');
			$data['real_owner'] = $this->input->post('real_owner');

			$data['floor'] = $this->input->post('floor');
			$data['rooms'] = $this->input->post('rooms');
			$data['baths'] = $this->input->post('baths');
			$data['year_of_construction'] = $this->input->post('year_of_construction');
			$data['overlooking'] = $this->input->post('overlooking');
			$data['overlooking_a'] = $this->input->post('overlooking_a');

			$data['advertiser_type'] = $this->input->post('advertiser_type');
			$data['payment_method'] = $this->input->post('payment_method');
			$data['discount'] = $this->input->post('discount');
			$data['vid'] = $this->input->post('vid');
		
		//	`education`, `education_a`, `health_medical`
		//	, `health_medical_a`, `transportation`, `transportation_a
			$data['education'] = $this->input->post('education');
			$data['education_a'] = $this->input->post('education_a');
			$data['health_medical'] = $this->input->post('health_medical');
			$data['health_medical_a'] = $this->input->post('health_medical_a');
			$data['transportation'] = $this->input->post('transportation');

			$data['transportation_a'] = $this->input->post('transportation_a');



			$data['lat']=$this->input->post('lat');
			$data['lon']=$this->input->post('lon');

			$data['res_image'] = implode('::::', $res_image);
			// $data['res_video'] = $res_video;
			// $data['res_url']=$this->input->post('res_url');
			$data['logo'] = $logo;
			$data['res_isOpen'] = 'open';
			$data['res_status'] = 'active';
			$data['res_address'] = $address;
			$data['res_address_a'] = $this->input->post('res_address_a');
			$data['res_create_date'] = time();

			// print_r($data);
			// die();

			$check = $this->admin_model->add_restaurants($data);
			if($check)
			{
				// $this->load->library('email');
				// $config = array();
				// $config['protocol'] = 'smtp';
				// $config['smtp_host'] = 'xxx';
				// $config['smtp_user'] = 'xxx';
				// $config['smtp_pass'] = 'xxx';
				// $config['smtp_port'] = 25;
				// $this->email->initialize($config);

                //   $this->send_mail($data);
				$this->session->set_flashdata('add_success', 'Restaurants has been added Successfully.');
				redirect('admin/restaurants-list');
			}
		}
		$data['page'] = 'add_restaurants';
		$this->load->view('admin/template',$data);
  	}
	  public function send_mail($data) {
        $from_email = "email@example.com";
		$this->db->select('subscribe_email.*');
		$this->db->from('subscribe_email');
		$query = $this->db->get();
		$mails= $query->result();
		foreach($mails as $row){
			$to_email = $row->email;
			//Load email library
			$this->load->library('email');
			$this->email->from($from_email, 'Identification');
			$this->email->to($to_email);
			$this->email->subject('Send Email Codeigniter');
			$this->email->message('The email send using codeigniter library');
			//Send mail
		   $this->email->send();
		}
      
       
    }
	public function edit_restaurants()
	{
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_restaurants';
		$data['restaurant'] = $this->admin_model->get_restaurants_by_id($id); 
		$this->load->view('admin/template',$data);
  	}

	public function update_restaurants()
  	{

		
  		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

  		$id = $_REQUEST['id'];
		
		$this->form_validation->set_rules('name', 'Restaurant Name', 'required');
	  	$this->form_validation->set_rules('description', 'Restaurant Description', 'required');
	  	$this->form_validation->set_rules('address', 'Restaurant Address', 'required');
	  	$this->form_validation->set_rules('phone', 'Restaurant Phone', 'required');
	//	  $this->form_validation->set_rules('location_id', 'Location Name', 'required');
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
		if($this->form_validation->run() == false)  
		{  
			//Error
		}
		else
		{

			$restaurant = $this->admin_model->get_restaurants_by_id($id);
			    $data = array();
			    
			    $data['res_image']=$restaurant->res_image;
			    if($_FILES['res_image']['name'][0] !="") {
					$res_image = array();
					//echo "image detected";
					if(is_array($_FILES['res_image']['name'])) {
					  $filesCount = count($_FILES['res_image']['name']);
					  for($i=0; $i< $filesCount; $i++) {
						  $_FILES['file']['name']     = $_FILES['res_image']['name'][$i];
						  $_FILES['file']['type']     = $_FILES['res_image']['type'][$i];
						  $_FILES['file']['tmp_name'] = $_FILES['res_image']['tmp_name'][$i];
						  $_FILES['file']['error']     = $_FILES['res_image']['error'][$i];
						  $_FILES['file']['size']     = $_FILES['res_image']['size'][$i];
			  
						  // File upload configuration
						  $config['upload_path'] = './uploads/';
						  $config['allowed_types'] = 'gif|jpg|png|jpeg';
						  $config['file_name'] = uniqid();
						  $config['overwrite'] = TRUE;
						  
			  
						  // Load and initialize upload library
						  $this->load->library('upload');
						  $this->upload->initialize($config);
			  
						  // Upload file to server
						  if($this->upload->do_upload('file')){
							  // Uploaded file data
							  $fileData = $this->upload->data();
							  array_push($res_image, $fileData['file_name']);
							 // $res_image = $fileData['file_name'];
							  
						  }
						  else {
							  $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
							  $this->session->set_flashdata('error',$error['error']);
							  
						  }
					  }

					  $data['res_image'] = implode("::::",$res_image);
					} 
				}

				//print_r($res_image);
				$data['logo']=$restaurant->logo;
				if($_FILES['logo']['name'] !="") {
					// File upload configuration
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['file_name'] = uniqid();
					$config['overwrite'] = TRUE;
					

					// Load and initialize upload library
					$this->load->library('upload');
					$this->upload->initialize($config);

					// Upload file to server
					if($this->upload->do_upload('logo')){
						// Uploaded file data
						$fileData = $this->upload->data();
						$data['logo'] = $fileData['file_name'];
						
					}
					else {
						$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
						$this->session->set_flashdata('error',$error['error']);
						
					}
				}
	
				// $res_video=$restaurant->res_video;
				// if($_FILES['res_video']['name'] !="") {
				// 	// File upload configuration
				// 	$config['upload_path'] = './uploads';
				// 	$config['allowed_types'] = 'mp4|mkv';
				// 	$config['file_name'] = uniqid();
				// 	$config['overwrite'] = TRUE;
					

				// 	// Load and initialize upload library
				// 	$this->load->library('upload');
				// 	$this->upload->initialize($config);

				// 	// Upload file to server
				// 	if($this->upload->do_upload('res_video')){
				// 		// Uploaded file data
				// 		$fileData = $this->upload->data();
				// 		$res_video = $fileData['file_name'];
						
				// 	}
				// 	else {
				// 		$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
				// 		$this->session->set_flashdata('error',$error['error']);
						
				// 	}
				// }

			// $data = array(
			// 	'c_name' => $_REQUEST['c_name'],
				
			// );

			$data['type'] = $this->input->post('type');

			
			$data['real_compound'] = $this->input->post('real_compound');
			$data['real_owner'] = $this->input->post('real_owner');

			$data['space'] = $this->input->post('space');
			$data['display_ads'] = $this->input->post('display_ads');
	
			$data['res_name'] = $this->input->post('name');
		    $data['res_desc'] = $this->input->post('description');
			

			$data['res_name_a'] = $this->input->post('res_name_a');
		    $data['res_desc_a'] = $this->input->post('res_desc_a');


			$data['cat_id'] = $this->input->post('cat_id');
			$data['status'] = $this->input->post('status');

		
			$data['region_id'] = $this->input->post('region_id');
		//	$data['location_id'] = $this->input->post('location_id');

			$data['discount'] = $this->input->post('discount');
			$data['vid'] = $this->input->post('vid');
			// $data['res_video'] = $res_video;
			// $data['res_url'] = $this->input->post('res_url');
		    $data['lat']=$this->input->post('lat');
			$data['lon']=$this->input->post('lon');
				
		
		    $data['res_isOpen'] = 'open';
		    $data['res_status'] = 'active';
		    $data['res_address'] = $this->input->post('address');
			$data['res_address_a'] = $this->input->post('res_address_a');
			$data['res_phone'] = $this->input->post('phone');
			$data['floor'] = $this->input->post('floor');
			$data['rooms'] = $this->input->post('rooms');
			$data['baths'] = $this->input->post('baths');
			$data['year_of_construction'] = $this->input->post('year_of_construction');
			$data['overlooking'] = $this->input->post('overlooking');
			$data['overlooking_a'] = $this->input->post('overlooking_a');

			$data['advertiser_type'] = $this->input->post('advertiser_type');
			$data['payment_method'] = $this->input->post('payment_method');


			$data['education'] = $this->input->post('education');
			$data['education_a'] = $this->input->post('education_a');
			$data['health_medical'] = $this->input->post('health_medical');
			$data['health_medical_a'] = $this->input->post('health_medical_a');
			$data['transportation'] = $this->input->post('transportation');
			$data['transportation_a'] = $this->input->post('transportation_a');

			$check = $this->admin_model->update_restaurants_by_id($id,$data);
			if($check)
			{
				$this->session->set_flashdata('success', 'Restaurants has been successfully Updated.');
				redirect('admin/restaurants-list',$data);
			}
		}

		$data['page'] = 'edit_restaurants';
		$data['restaurant'] = $this->admin_model->get_restaurants_by_id($id); 
		$this->load->view('admin/template',$data);
  	}

  	public function trash_restaurants()
	{ 
		if($this->session->userdata('aid')=="")
		{
			redirect(base_url('admin/login'));
		}	

		if(!empty($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];
			
			$this->db->where('res_id', $id);
			$this->db->delete("restaurants");
			$this->session->set_flashdata('success', 'Restaurant has been Successfully Deleted.');
			redirect('admin/restaurants-list');
		}
	}
	
	public function list_banners()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_banners';
		$this->load->view('admin/template', $data);
	}

	public function create_banners()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'add_banners';
		$this->load->view('admin/template', $data);
	}

	public function add_banners()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$this->form_validation->set_rules('banners_name', 'Banners Name', 'required');

		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'banners_name' => $_REQUEST['banners_name'],
			);

			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = uniqid();
				$config['overwrite'] = TRUE;

				// Load and initialize upload library
				$this->load->library('upload');
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('image')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$image = $fileData['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
				}

				$data['image'] = $image;
			}

			$check = $this->admin_model->add_banners($data);
			if ($check) {
				$this->session->set_flashdata('success', 'Banners has been added Successfully.');
				redirect('admin/banners-list');
			}
		}
		$data['page'] = 'add_banners';
		$this->load->view('admin/template', $data);
	}

	public function edit_banners()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_banners';
		$data['banners'] = $this->admin_model->get_banners_by_id($id);
		$this->load->view('admin/template', $data);
	}

	public function update_banners()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $_REQUEST['id'];

		$this->form_validation->set_rules('banners_name', 'Banners Name', 'required');

		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'banners_name' => $_REQUEST['banners_name'],

			);

			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = uniqid();
				$config['overwrite'] = TRUE;

				// Load and initialize upload library
				$this->load->library('upload');
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('image')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$image = $fileData['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
				}

				$data['image'] = $image;
			}

			$check = $this->admin_model->update_banners_by_id($id, $data);
			if ($check) {
				$this->session->set_flashdata('success', 'Banners has been successfully Updated.');
				redirect('admin/banners-list', $data);
			}
		}

		$data['page'] = 'edit_banners';
		$data['banners'] = $this->admin_model->get_banners_by_id($id);
		$this->load->view('admin/template', $data);
	}

	public function trash_banners()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		if (!empty($_REQUEST['id'])) {
			$id = $_REQUEST['id'];

			$this->db->where('id', $id);
			$this->db->delete("banners");
			$this->session->set_flashdata('success', 'Banners has been Successfully Deleted.');
			redirect('admin/banners-list');
		}
	}
	
	public function notifications(){
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'notifications';
		$this->load->view('admin/template', $data);
	}
	public function user_notifications()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'user_notifications';
		$this->load->view('admin/template', $data);
	}

	public function send_user_notifications()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$title = $this->input->post('title');
		$message = $this->input->post('message');
		
		$tokens = $this->db->query("SELECT * FROM tokens ORDER BY id ASC")->result();
		$this->firebase_model->save_notification( $title, $message);
		foreach ($tokens as $key => $list) {

			$response = $this->firebase_model->send_device_notification($list->device_token, $title, $message);
			//$this->firebase_model->save_user_notification($list->id, $title, $message);
		}
		$this->session->set_flashdata('success', 'Send Successfully.');
		redirect('admin/user-notifications');
	}
	
	public function vendor_notifications()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'vendor_notifications';
		$this->load->view('admin/template', $data);
	}

	public function send_vendor_notifications()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$title = $this->input->post('title');
		$message = $this->input->post('message');
		
		$vendor = $this->db->query("SELECT * FROM vendor ORDER BY id ASC")->result();

		foreach ($vendor as $key => $list) {

			$response = $this->firebase_model->send_vendor_notification($list->id, $title, $message, "Message");
			$this->firebase_model->save_vendor_notification($list->id, $title, $message);
		}
		$this->session->set_flashdata('success', 'Send Successfully.');
		redirect('admin/vendor-notifications');
	}

    public function approved_restaurants()
	{
		$id = $this->uri->segment(3);

		$data = array();

		$data['approved'] = '1';


		$this->db->where('res_id', $id);

		$this->db->update('restaurants', $data);
		$this->session->set_flashdata('success_msg', 'successfully In Approved..');
		redirect(base_url() . 'admin/restaurants-list', 'refresh');
	}

	public function note_approved_restaurants()
	{
		$id = $this->uri->segment(3);

		$data = array();

		$data['approved'] = '0';


		$this->db->where('res_id', $id);

		$this->db->update('restaurants', $data);
		$this->session->set_flashdata('success_msg', 'successfully In Not Approved..');
		redirect(base_url() . 'admin/restaurants-list', 'refresh');
	}


}
