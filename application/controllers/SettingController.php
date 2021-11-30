<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SettingController extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
  		$this->load->helper('url');

     	$this->load->library('session');
		 $this->load->model('admin_model');

		 $this->session->set_userdata('locale','ar');
		 
     	$this->load->helper('form');
		$this->load->library('form_validation');
	
		$ci =& get_instance();
		$ci->load->helper('language');
		$siteLang = $ci->session->userdata('site_lang');
		if ($siteLang) {
			$ci->lang->load('content',$siteLang);
		} else {
			$ci->lang->load('content','english');
		}

    }

public function admin_contacts(){
	$data['page'] = 'list_contacts';
	$this->load->view('admin/template', $data);
}
public function request_store(){
	$data['page'] = 'list_request_store';
	$this->load->view('admin/template', $data);
}
public function neweslater(){
	$data['page'] = 'list_neweslater';
	$this->load->view('admin/template', $data);
}

    public function update_settings(){

    	
    	foreach ($_POST as $key => $value) {

			foreach($value as $id => $recordValue){
				$query = $this->db->get_where('settings', array('id' => $id));
				$record =$query->row();
		

				if ($record) {
					if ($record->option_type == 'file') {

						$image_exts = array("tif", "jpg", "jpeg", "gif", "png");

						$configVideo['upload_path'] = './uploads/'; # check path is correct
						$configVideo['max_size'] = '102400';
						$configVideo['allowed_types'] = $image_exts; # add video extenstion on here
						$configVideo['overwrite'] = FALSE;
						$configVideo['remove_spaces'] = TRUE;
						$configVideo['file_name'] = uniqid();
			  
						$this->load->library('upload', $configVideo);
						$this->upload->initialize($configVideo);
			  
						if (!$this->upload->do_upload($key)) {}else{
						
							$upload_data = $this->upload->data();
							$recordValue= $upload_data['file_name'];
							$this->db->where('id', $record->id);
							$data['value']=$recordValue;
							$this->db->update('settings', $data);
						}
						// if ($request->hasFile($key)) {
                        //     $record->update(['value'=>saveImage($recordValue, '/')]);
                        // }
					}else{

						$this->db->where('id', $record->id);
						$data['value']=$recordValue;
						$this->db->update('settings', $data);
					
					}
				}
			}
    	}


		foreach ( $_FILES as $key1 => $value1) {
		
		
			
			$query = $this->db->get_where('settings', array('name' => $key1));
			$record =$query->row();
		
			if ($record) {
	
				if ($record->option_type == "file" && !empty($_FILES[$key1]['name'][$record->id] ) ) {
			
					if ($_FILES[$key1]['error'][$record->id]  === UPLOAD_ERR_OK)
					{
					  // get details of the uploaded file
					  $fileTmpPath = $_FILES[$key1]['tmp_name'][$record->id] ;
					  $fileName = $_FILES[$key1]['name'][$record->id];
					  $fileSize = $_FILES[$key1]['size'][$record->id];
					  $fileType = $_FILES[$key1]['type'][$record->id];
					  $fileNameCmps = explode(".", $fileName);
					  $fileExtension = strtolower(end($fileNameCmps));
				   
					  // sanitize file-name
					  $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
				   
					  // check if file has one of the following extensions
					  $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
				   
					  if (in_array($fileExtension, $allowedfileExtensions))
					  {
						// directory in which the uploaded file will be moved
						$uploadFileDir = './uploads/';
						$dest_path = $uploadFileDir . $newFileName;
				   
						if(move_uploaded_file($fileTmpPath, $dest_path)) 
						{
							$this->db->where('id', $record->id);
							$data['value']= $newFileName;
							$this->db->update('settings', $data);
						}
						else
						{
						  $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
						}
					  }
					  else
					  {
						$message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
					  }
					}
				
				}
			}
		
	}
//  die("test");
		redirect('admin/settings');
  

    }


	public function index(){
	//	$this->session->set_userdata('site_lang',  "arabic");
		$data['page'] = 'settings';
		$data['settings']  = $this->db->query("SELECT * FROM settings")->result();	

		$this->load->view('admin/template',$data);
	}


	public function terms()
	{
	
		$data['page'] = 'terms';
		$this->load->view('user/template',$data);
	}

	public function prives()
	{
	
		$data['page'] = 'prives';
		$this->load->view('user/template',$data);
	}

	public function about()
	{
	
		$data['page'] = 'about';
		$this->load->view('user/template',$data);
	}

	public function subscribe(){
		$data['page'] = 'subscribe';
		$this->load->view('user/template',$data);
	}
	public function subscribe_submit(){
		$this->form_validation->set_rules('name', 'Name', 'required'
		, array('required' => 'الاسم مطلوب'));
		$this->form_validation->set_rules('phone', 'Phone', 'required'
		, array('required' => 'الهاتف مطلوب'));
   //     $this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required'
		, array('required' => 'email required'));
        $this->form_validation->set_rules('description', 'Description', 'required'
		, array('required' => 'description required'));


	if ($this->form_validation->run() == FALSE) {
		$status = FALSE;
		$message = $this->form_validation->error_array();
		$subscribe_id=0;
	} else {
		$status = TRUE;
		$message =$this->lang->line('success_subscribe');
		try {
	
			$data['description'] = $this->input->post('description');
		
			$data['store_id'] = $this->input->post('store_id');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['name'] = $this->input->post('name');
	
		    $this->admin_model->add_subscribe($data);
 
		}
		catch (\Exception $e) {
			echo json_encode(['message' => $e->getMessage(), 'status' => FALSE]);
 
		  }
		  $subscribe_id=1;
	}
	$this->output
	->set_content_type('application/json')
	->set_output(json_encode(['message' => $message, 'status' => $status,'result' => ['subscribe_id'=>$subscribe_id]]));

	}
	public function contact(){
		$data['page'] = 'contact';
		$this->load->view('user/template',$data);
	}


public function subscriebe_mail(){

        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[subscribe_email.email]'
		, array('required' => 'البريد الإلكتروني مطلوب'
		,'is_unique'=>'تم الاشتراك من قبل')
	       );
        // $this->form_validation->set_rules('phone', 'Phone', 'required');


	if ($this->form_validation->run() == FALSE) {
		$status = FALSE;
		;
		$message = strip_tags(validation_errors());
	///	$message =
	
		$contact_id=0;
	} else {
		$status = TRUE;
		$message ='تم الاشتراك';
		try {
	
		
			$data['email'] = $this->input->post('email');

	
		    $this->admin_model->add_mail($data);
 
		}
		catch (\Exception $e) {
			echo json_encode(['message' => $e->getMessage(), 'status' => FALSE]);
 
		  }
		  $contact_id=1;
	}
	$this->output
	->set_content_type('application/json')
	->set_output(json_encode(['message' => $message, 'status' => $status,'result' => ['contact_id'=>$contact_id]]));

}
public function contact_submit(){

        $this->form_validation->set_rules('name', 'Name', 'required'
	, array('required' => 'الاسم مطلوب')
	);
        // $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required'
		, array('required' => 'الرسالة مطلوب')
           	);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'
		, array('required' => 'البريد الإلكتروني مطلوب')
	       );
        // $this->form_validation->set_rules('phone', 'Phone', 'required');


	if ($this->form_validation->run() == FALSE) {
		$status = FALSE;
		;
		$message = $this->form_validation->error_array();
	///	$message =
	
		$contact_id=0;
	} else {
		$status = TRUE;
		$message =$this->lang->line('success_contact');
		try {
	
			$data['message'] = $this->input->post('message');
			$data['title'] = $this->input->post('title');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['name'] = $this->input->post('name');
	
		    $this->admin_model->add_contact($data);
 
		}
		catch (\Exception $e) {
			echo json_encode(['message' => $e->getMessage(), 'status' => FALSE]);
 
		  }
		  $contact_id=1;
	}
	$this->output
	->set_content_type('application/json')
	->set_output(json_encode(['message' => $message, 'status' => $status,'result' => ['contact_id'=>$contact_id]]));


}

}
