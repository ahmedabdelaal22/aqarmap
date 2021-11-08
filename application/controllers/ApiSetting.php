<?php

class ApiSetting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('front_model');
		$this->load->model('admin_model');

		$this->load->library('form_validation');
	}

	public function setting($key){
	
		$result = array();
		header('Content-Type: application/json');
	
		$result['status'] = 1;
		$result['msg'] = "SETTINGS Found";
		$settings =$this->db->get_where("settings", array("name" => $key))->row();
	
	
	
	
	   $result['settings'] = $settings;
	
		echo json_encode($result);
	
	}


	public function get_all_notfications()
	{
		$result = array();
		header('Content-Type: application/json');
		$offset = ($this->input->get('page')) ? $this->input->get('page') : 1 ;
		$limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10 ;
		$offset_page=($offset - 1)*$limit;
		$this->db->select('notifications.*');
		$this->db->from('notifications');
		if(!empty($limit)){
			$this->db->limit($limit, $offset_page); 
		  }
	
	   $query = $this->db->get();
	   $res=$query->result();
	
		if (empty($res)) {
			$temp["response_code"] = "0";
			$temp['msg'] = "notifications Not Found";
			echo json_encode($temp);
		} else {
			$imgs = array();
		
			$result['status'] = 1;
			$result['msg'] = "notifications Found";
			$result['notifications'] = $res;

			echo json_encode($result);
		}
	}
	

	public function emergency_numbers(){
	
		$result = array();
		header('Content-Type: application/json');
	
		$result['status'] = 1;
		$result['msg'] = "SETTINGS Found";
		$numbers	=explode(',',appSettings('emergency_numbers'));	
	
	
	
	   $result['numbers'] = $numbers;
	
		echo json_encode($result);
	
	}
public function contact_submit(){

	$this->form_validation->set_rules('name', 'Name', 'required');
	// $this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('message', 'Message', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	// $this->form_validation->set_rules('phone', 'Phone', 'required');


if ($this->form_validation->run() == FALSE) {
	$status = FALSE;
	$message = validation_errors();
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

public function insertToken(){

	$this->form_validation->set_rules('device_id', 'Device id', 'required');
	$this->form_validation->set_rules('device_token', 'Device Token', 'required');


if ($this->form_validation->run() == FALSE) {
	$status = FALSE;
	$message = validation_errors();
	$contact_id=0;
} else {
	$status = TRUE;
	$message ='success inserted';
	try {

		$data['device_id'] = $this->input->post('device_id');
		$data['device_token'] = $this->input->post('device_token');
		

		$this->admin_model->insert_token($data);

	}
	catch (\Exception $e) {
		echo json_encode(['message' => $e->getMessage(), 'status' => FALSE]);

	  }
	  $contact_id=1;
}
$this->output
->set_content_type('application/json')
->set_output(json_encode(['message' => $message, 'status' => $status,'result' => ['insert_id'=>$contact_id]]));


}

public function socialsetting(){
	
	$result = array();
	header('Content-Type: application/json');

	$result['status'] = 1;
	$result['msg'] = "settings Found";
	$this->db->select('settings.*');
	$this->db->from('settings');
	$this->db->where_in('name ',['facebook','instegram','address_ar','watsapp']);
	$query = $this->db->get();
	$settings = $query->result();





   $result['settings'] = $settings;

	echo json_encode($result);

}
	
}
