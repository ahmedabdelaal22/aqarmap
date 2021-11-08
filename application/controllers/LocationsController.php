<?php defined('BASEPATH') OR exit('No direct script access allowed');
class LocationsController extends CI_Controller
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

    }



	public function list_locations()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_locations';
		$this->load->view('admin/template', $data);
	}

	public function create_locations()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'add_locations';
		$this->load->view('admin/template', $data);
	}

	public function add_locations()
	{
	
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$this->form_validation->set_rules('name_ar', ' Name (ar)', 'required');
		$this->form_validation->set_rules('name_en', 'Name (en)', 'required');
		$this->form_validation->set_rules('region_id', 'Region Name', 'required');

//print_r($_POST);die;
		
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'name_ar' => $_REQUEST['name_ar'],
				'name_en' => $_REQUEST['name_en'],
				'region_id' => $_REQUEST['region_id'],
			);

	

			$check = $this->admin_model->add_locations($data);
			if ($check) {
				$this->session->set_flashdata('success', 'locations has been added Successfully.');
				redirect('admin/locations-list');
			}
		}
		$data['page'] = 'add_locations';
		$this->load->view('admin/template', $data);
	}

	public function edit_locations()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_locations';
		$data['locations'] = $this->admin_model->get_locations_by_id($id);
		$this->load->view('admin/template', $data);
	}
	function fetch_location()
	{
		$region_id=$_POST['region_id'];
	 $this->db->where('region_id', $region_id);
	
	 $query = $this->db->get('locations');
	 $output = '<option value="">Select locations</option>';
	 foreach($query->result() as $row)
	 {
	  $output .= '<option value="'.$row->id.'">'.$row->name_ar.'</option>';
	 }
	 echo $output;
	}
	public function update_locations()
	{
	
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $_REQUEST['id'];

		$this->form_validation->set_rules('name_ar', ' Name (ar)', 'required');
		$this->form_validation->set_rules('name_en', 'Name (en)', 'required');
		$this->form_validation->set_rules('region_id', 'Region Name', 'required');
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'name_ar' => $_REQUEST['name_ar'],
				'name_en' => $_REQUEST['name_en'],
				'region_id' => $_REQUEST['region_id'],
			);


	

			$check = $this->admin_model->update_locations_by_id($id, $data);
			if ($check) {
				$this->session->set_flashdata('success', 'locations has been successfully Updated.');
				redirect('admin/locations-list', $data);
			}
		}

		$data['page'] = 'edit_locations';
		$data['locations'] = $this->admin_model->get_locations_by_id($id);
		$this->load->view('admin/template', $data);
	}

	public function trash_locations()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		if (!empty($_REQUEST['id'])) {
			$id = $_REQUEST['id'];

			$this->db->where('id', $id);
			$this->db->delete("locations");
			$this->session->set_flashdata('success', 'locations has been Successfully Deleted.');
			redirect('admin/locations-list');
		}
	}
}
