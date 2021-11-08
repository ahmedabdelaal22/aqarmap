<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RegionsController extends CI_Controller
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

	public function give_review()
	{

		$result = array();
		header('Content-Type: application/json');

		if (isset($_POST['user_id']) && isset($_POST['res_id']) && isset($_POST['ratings']) && isset($_POST['text'])) {
			$data = array();
			$data['rev_user'] = $this->input->post('user_id');
			$data['rev_res'] = $this->input->post('res_id');
			$data['rev_stars'] = $this->input->post('ratings');
			$data['rev_text'] = $this->input->post('text');
			$data['name'] = $this->input->post('name');
			$data['rev_date'] = time();

			if ($this->db->insert('reviews', $data)) {

				// Get all reviews
				$reviews = $this->front_model->get_res_reviews($data['rev_res']);

				// make array
				$ratings = array(
					'0' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "0"))->num_rows(),
					'1.0' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "1.0"))->num_rows(),
					'1.5' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "1.5"))->num_rows(),
					'2.0' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "2.0"))->num_rows(),
					'2.5' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "2.5"))->num_rows(),
					'3.0' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "3.0"))->num_rows(),
					'3.5' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "3.5"))->num_rows(),
					'4.0' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "4.0"))->num_rows(),
					'4.5' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "4.5"))->num_rows(),
					'5.0' => $this->db->get_where('reviews', array("rev_res" => $data['rev_res'], "rev_stars" => "5.0"))->num_rows(),
				);



				// calculate reviews
				$rat_data['res_ratings'] = $this->calcAverageRating($ratings);
				$this->db->where('res_id', $data['rev_res']);
				$this->db->update('restaurants', $rat_data);


				$result['status'] = true;
				$result['message'] = "Review Given";
				$result['rreview'] = $rat_data['res_ratings'];
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode($result));
			//	echo json_encode($result);
			} else {
				$result['status'] = false;
				$result['message'] = "Database Error";

				$this->output
				->set_content_type('application/json')
				->set_output(json_encode($result));
			}
		} else {
			$result['status'] = false;
			$result['message'] = "Missing Data";

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
		}
	}

	public function calcAverageRating($ratings)
	{

		$totalWeight = 0;
		$totalReviews = 0;

		foreach ($ratings as $weight => $numberofReviews) {
			$WeightMultipliedByNumber = $weight * $numberofReviews;
			$totalWeight += $WeightMultipliedByNumber;
			$totalReviews += $numberofReviews;
		}

		if ($totalReviews == 0) {
			$totalReviews = 1;
		} else {
			$totalReviews = $totalReviews;
		}
		//divide the total weight by total number of reviews
		$averageRating = number_format(($totalWeight / $totalReviews), 2);

		return $averageRating;
	}


	public function list_regions()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'list_regions';
		$this->load->view('admin/template', $data);
	}

	public function create_regions()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$data['page'] = 'add_regions';
		$this->load->view('admin/template', $data);
	}

	public function add_regions()
	{
	
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$this->form_validation->set_rules('name_ar', ' Name (ar)', 'required');
		$this->form_validation->set_rules('name_en', 'Name (en)', 'required');


		
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'name_ar' => $_REQUEST['name_ar'],
				'name_en' => $_REQUEST['name_en'],
			);

	

			$check = $this->admin_model->add_regions($data);
			if ($check) {
				$this->session->set_flashdata('success', 'regions has been added Successfully.');
				redirect('admin/regions-list');
			}
		}
		$data['page'] = 'add_regions';
		$this->load->view('admin/template', $data);
	}

	public function edit_regions()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $this->uri->segment(3);
		$data['page'] = 'edit_regions';
		$data['regions'] = $this->admin_model->get_regions_by_id($id);
		$this->load->view('admin/template', $data);
	}

	public function update_regions()
	{
	
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		$id = $_REQUEST['id'];

		$this->form_validation->set_rules('name_ar', ' Name (ar)', 'required');
		$this->form_validation->set_rules('name_en', 'Name (en)', 'required');
		$this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
		if ($this->form_validation->run() == false) {
			//Error
		} else {
			$data = array(
				'name_ar' => $_REQUEST['name_ar'],
				'name_en' => $_REQUEST['name_en'],
			);


	

			$check = $this->admin_model->update_regions_by_id($id, $data);
			if ($check) {
				$this->session->set_flashdata('success', 'regions has been successfully Updated.');
				redirect('admin/regions-list', $data);
			}
		}

		$data['page'] = 'edit_regions';
		$data['regions'] = $this->admin_model->get_regions_by_id($id);
		$this->load->view('admin/template', $data);
	}

	public function trash_regions()
	{
		if ($this->session->userdata('aid') == "") {
			redirect(base_url('admin/login'));
		}

		if (!empty($_REQUEST['id'])) {
			$id = $_REQUEST['id'];

			$this->db->where('id', $id);
			$this->db->delete("regions");
			$this->session->set_flashdata('success', 'regions has been Successfully Deleted.');
			redirect('admin/regions-list');
		}
	}
}
