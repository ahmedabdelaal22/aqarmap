<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AddListingController extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
  		$this->load->helper('url');
		  $this->load->library("pagination");
   		$this->load->model('front_model');
     	$this->load->library('session');
		 $this->load->model('admin_model');

		
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
		
		$this->load->model('firebase_model');
    }

	
    public function add_listing(){	
		if($this->session->userdata('UserId')=="")
	  {
		  redirect(base_url('login'));
	  }	

		$data['page'] = 'add-listing';
	
		//print_r($data['restaurants']); 
		$this->load->view('user/template',$data);
	}

	public function add_realestates(){
		if($this->session->userdata('UserId')=="")
		{
			redirect(base_url('login'));
		}	

 		$this->form_validation->set_rules('name','Enter Name (en)','required'); 
		 $this->form_validation->set_rules('res_name_a','Enter Name (ar)','required'); 
		 $this->form_validation->set_rules('res_desc','Enter desc (en)','required'); 
		 $this->form_validation->set_rules('res_desc_a','Enter desc (ar)','required'); 
		 $this->form_validation->set_rules('res_address','Enter address (en)','required'); 
		 $this->form_validation->set_rules('res_address_a','Enter address (ar)','required'); 
		 $this->form_validation->set_rules('res_phone','Enter phone ','required'); 

		 //$this->form_validation->set_rules('logo','Enter logo ','required'); 
		//  $this->form_validation->set_rules('res_image','Enter images ','required'); 



		 $this->form_validation->set_rules('discount','Enter discount ','required'); 

		 $this->form_validation->set_rules('space','Enter space ','required'); 
		 $this->form_validation->set_rules('floor','Enter floor ','required'); 
		 $this->form_validation->set_rules('rooms','Enter rooms ','required'); 
		 $this->form_validation->set_rules('baths','Enter baths ','required'); 
		 $this->form_validation->set_rules('year_of_construction','Enter year of construction','required'); 
		 $this->form_validation->set_rules('video','Enter video ','required'); 
		//  $this->form_validation->set_rules('video','Enter video ','required'); 
		//  $this->form_validation->set_rules('video','Enter video ','required'); 
		//  $this->form_validation->set_rules('video','Enter video ','required'); 
		//  $this->form_validation->set_rules('video','Enter video ','required'); 

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


		
		
			$data['res_name'] = $this->input->post('name');
			$data['res_desc'] = $this->input->post('res_desc');


				
			$data['res_name_a'] = $this->input->post('res_name_a');
			$data['res_desc_a'] = $this->input->post('res_desc_a');

			$data['space'] = $this->input->post('space');

			$data['display_ads'] = 1;
		
			$data['type'] = $this->input->post('type');
			
		
			$data['res_phone'] = $this->input->post('res_phone');
			
			$data['cat_id'] = $this->input->post('cat_id');

			$data['region_id'] = $this->input->post('region_id');
		//	$data['location_id'] = $this->input->post('location_id');
			$data['status'] = $this->input->post('status');
			$data['real_compound'] = ($this->input->post('real_compound'))?1:0;
			$data['real_owner'] = 0;

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
			$data['res_address'] = $this->input->post('res_address');
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
				$this->session->set_flashdata('add_success', 'Real Estates has been added Successfully. under check ');
				redirect('profile');
			}
		}
		$data['page'] = 'add-listing';
		$this->load->view('user/template',$data);
	}

}
