<?php defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
  		$this->load->helper('url');
   		$this->load->model('front_model');
     	$this->load->library('session');
		 $siteLang = $this->session->userdata('site_lang');
		 if ($siteLang =='arabic') {
			$this->session->set_userdata('locale','ar');;
		 } else {
			$this->session->set_userdata('locale','en');
		 }
		 $ci =& get_instance();
		 $ci->load->helper('language');
		 $siteLang = $ci->session->userdata('site_lang');
		 if ($siteLang) {
			 $ci->lang->load('content',$siteLang);
		 } else {

			$ci->lang->load('content','english');

		 }
     	$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->load->model('firebase_model');
    }
	public function update_vendor()
	{
		if($this->session->userdata('UserId')=="")
	  {
		  redirect(base_url('login'));
	  }	

		$cat_id = $_REQUEST['id'];
	  

	   $this->form_validation->set_rules('uname','User Name','required'); 
	  $this->form_validation->set_rules('email','Email','required');

	  $this->form_validation->set_error_delimiters('<span class="error" style="color:red;">','</span>');
	  if($this->form_validation->run() == false)  
	  {  
		  //Error
	  }
	  else
	  {

		//`phone`, `whatsapp`, `office_phone`, `fax`, `facebook`, `linkedin`
		//, `twitter`, `desc`, `type`, `website`, `company`, `lat`, `lon`
		  $data = array(
		
			  'uname' => $_REQUEST['uname'],
			  'email' => $_REQUEST['email'],
			  'phone' => $_REQUEST['phone'],
			  'whatsapp' => $_REQUEST['whatsapp'],
			  'office_phone' => $_REQUEST['office_phone'],
			  'fax' => $_REQUEST['fax'],
			  'facebook' => $_REQUEST['facebook'],
			  'linkedin' => $_REQUEST['linkedin'],
			  'twitter' => $_REQUEST['twitter'],
			  'desc' => $_REQUEST['desc'],
			  'type' => $_REQUEST['type'],
			  'website' => $_REQUEST['website'],
			  'company' => $_REQUEST['company'],
			  'lat' => $_REQUEST['lat'],
			  'lon' => $_REQUEST['lon'],
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
			  redirect('profile',$data);
		  }
	  }

	  $data['page'] = 'profile';
	  $data['vendor'] = $this->admin_model->get_vendor_by_id($cat_id); 
	  $this->load->view('admin/template',$data);
	}

	public function forget_user(){

			header('Content-Type: application/json');
			$email = $this->input->post('email');
	
			$result = array();
	
			$user = $this->db->get_where('user', array('email' => $email), 1)->row();
	
			if ($user->email != "") {
				$data = array();
				// $new_pass = uniqid();
				$new_pass = mt_rand(100000, 999999);
				$data['password'] = md5($new_pass);
	
				$this->db->where('email', $email);
				$this->db->update('user', $data);
	
				//Send Email
				$message = "<h1>Hello " . $user->email . "</h1>";
				$message .= "<h1>Your password reset was Successful. New Pass: " . $new_pass . "</h1>";
	
	
				$this->load->library('email');
	
				// Mail config
				$to = $user->email;
				$from = "keval.primocys@gmail.com";
				$fromName = "Nylitical App Team";
				$mailSubject = "Password Reset Success";
	
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->to($to);
				$this->email->from($from, $fromName);
				$this->email->subject($mailSubject);
				$this->email->message($message);
	
				// Send email & return status
				$send = $this->email->send();
	
				if ($send) {
		
					$this->session->set_flashdata('success', 'Password Changed');
					redirect(base_url('forgetpassword'));
	
				} else {
					$this->session->set_flashdata('success', 'Mail Sent Error');
					redirect(base_url('forgetpassword'));
				}
			} else {
			
	
				$this->session->set_flashdata('success', 'invalid Email');
				redirect(base_url('forgetpassword'));
			}
		
	}
	public function login()
	{
	
		$data['page'] = 'login';
		$this->load->view('user/template', $data);
	}
	public function profile(){
		$data['page'] = 'profile';
		$this->load->view('user/template', $data);
	}
	public function forgetpassword(){
		$data['page'] = 'forgetpass';
		$this->load->view('user/template', $data);
	}

	public function register()
	{
		$data['page'] = 'register';
		$this->load->view('user/template', $data);
	}

	public function register_user()
	{
		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('success', '');
		if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['username'])) {
	
			$this->session->set_flashdata('error', 'Enter Data');
			redirect(base_url('user/register'));
		} else {
			$user = array(
				'email' => $this->input->post('email'),
				'type' => $this->input->post('type'),
				'password' => md5($this->input->post('password')),
				'uname' => $this->input->post('username')
			);
			$email_check = $this->front_model->email_check($user['email']);
			$username_check = $this->front_model->username_check($user['username']);
			$temp = array();
			if ($email_check || $username_check) {

				$user['date'] = time();

				// Make Database Post
				$reg = $this->front_model->register_user($user);
				if ($reg) {
		
					$this->session->set_flashdata('success', 'user register success');
					redirect(base_url('login'));
				} else {
			
					$this->session->set_flashdata('error', 'user register failure');
					redirect(base_url('register'));
				}
			} else {

				$this->session->set_flashdata('error', 'Email id Already Registered');
				redirect(base_url('register'));
			}
		}
	}
	public function login_user()
	{
	  	$login=array(
		  'email'=>$this->input->post('email'),
		  'password'=>md5($this->input->post('password'))
	    );

	    $data=$this->front_model->login_user($login['email'],$login['password']);
      	if($data)
      	{
	        $this->session->set_userdata('UserId',$data['id']);
	        $this->session->set_userdata('aemail',$data['email']);
	        $this->session->set_userdata('user_name',$data['uname']);
	        $this->session->set_userdata('aimg',$data['img']);
		
			redirect(base_url('/'));
      	}
      	else{
        $this->session->set_flashdata('error', 'Email Id And Password Wrong..');
       	redirect(base_url('login'));
      }
	}
	public function logout(){

		$this->session->sess_destroy();
		redirect(base_url('/'), 'refresh');
	  }

	





}
