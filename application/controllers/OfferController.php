<?php defined('BASEPATH') OR exit('No direct script access allowed');
class OfferController extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
  		$this->load->helper('url');
   		$this->load->model('admin_model');
     	$this->load->library('session');
		 $this->load->model('front_model');
     	$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model('firebase_model');
		$ci =& get_instance();
		$ci->load->helper('language');
		$siteLang = $ci->session->userdata('site_lang');
		if ($siteLang) {
			$ci->lang->load('content',$siteLang);
		} else {
			$ci->lang->load('content','english');
		}
		 

    }


	public function likeRes()
	{

		if (isset($_POST['res_id']) && isset($_POST['user_id'])) {

			$like = array();
			$like['res_id'] = $this->input->post('res_id');
			$like['user_id'] = $this->input->post('user_id');
			$like['date'] = time();

			$checkLike = $this->front_model->likeCheck($like['user_id'], $like['res_id']);

			if (!$checkLike) {
				$temp["response_code"] = "0";
				$temp["message"] = "Already Liked Restaurant";
				$temp["status"] = false;
			//	echo json_encode($temp);
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode($temp));
			
				return;
			}

			if ($this->db->insert('likes', $like)) {

				$temp["response_code"] = "1";
				$temp["message"] = "Liked Restaurant";
				$temp["status"] = true;
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode($temp));
			} else {

				$temp["response_code"] = "0";
				$temp["message"] = "Databse Error";
				$temp["status"] = false;
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode($temp));
			}
		} else {

			$temp["response_code"] = "0";
			$temp["message"] = "Missing Fields";
			$temp["status"] = false;
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($temp));
		}
	}

    public function unlikeRes(){
		$res_id = $this->input->post('res_id');
		$user_id = $this->input->post('user_id');

		if ($this->front_model->unlike($res_id, $user_id)) {
			$result['status'] = true;
			$result['message'] = "Successfully Unlike";
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
		
		} else {
			$result['status'] = false;
			$result['message'] = "Something Wrong";
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
		}
     }
	public function offers()
	{
	
		$data['page'] = 'offers';
		$this->load->view('user/template', $data);
	}


	public function list_offers()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_offers';
		$this->load->view('admin/template', $data);
	}

	public function create_offers()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'add_offers';
		$this->load->view('admin/template', $data);
	}

	public function add_offers()
	{
	
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$this->form_validation->set_rules('restaurant_id', 'restaurant Name', 'required');
		$this->form_validation->set_rules('dicount', 'Dicount', 'required');


		
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'restaurant_id' => $_REQUEST['restaurant_id'],
				'dicount' => $_REQUEST['dicount'],
			);

			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'JPG|JPEG|GIF|PNG|gif|jpg|png|jpeg|tft|TFT';

				$configVideo['max_size'] = '102400';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$config['file_name'] = uniqid();

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

			$check = $this->admin_model->add_offers($data);
			if ($check) {
				$this->session->set_flashdata('success', 'offers has been added Successfully.');
				redirect('admin/offers-list');
			}
		}
		$data['page'] = 'add_offers';
		$this->load->view('admin/template', $data);
	}

	public function edit_offers()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_offers';
		$data['offers'] = $this->admin_model->get_offers_by_id($id);
		$this->load->view('admin/template', $data);
	}

	public function update_offers()
	{
	
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $_REQUEST['id'];

		$this->form_validation->set_rules('restaurant_id', 'restaurant Name', 'required');
		$this->form_validation->set_rules('dicount', 'Dicount', 'required');
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'restaurant_id' => $_REQUEST['restaurant_id'],
				'dicount' => $_REQUEST['dicount'],
			);

			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'JPG|JPEG|GIF|PNG|gif|jpg|png|jpeg|tft|TFT';

				$configVideo['max_size'] = '102400';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$config['file_name'] = uniqid();
			

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

			$check = $this->admin_model->update_offers_by_id($id, $data);
			if ($check) {
				$this->session->set_flashdata('success', 'offers has been successfully Updated.');
				redirect('admin/offers-list', $data);
			}
		}

		$data['page'] = 'edit_offers';
		$data['offers'] = $this->admin_model->get_offers_by_id($id);
		$this->load->view('admin/template', $data);
	}

	public function trash_offers()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		if (!empty($_REQUEST['id'])) {
			$id = $_REQUEST['id'];

			$this->db->where('id', $id);
			$this->db->delete("offers");
			$this->session->set_flashdata('success', 'offers has been Successfully Deleted.');
			redirect('admin/offers-list');
		}
	}
}
