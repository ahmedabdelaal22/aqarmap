<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AgentsController extends CI_Controller
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

	public function index(){

		$config = array();

		$config['full_tag_open'] = '<ul class="pagination mt-5">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item page-link ">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item page-link">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item page-link" >';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item page-link active" aria-current="page"><a >';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item page-link ">';
        $config['num_tag_close'] = '</li>';
        $config["base_url"] = base_url() . "agents";
        $config["total_rows"] = $this->front_model->get_count_agents();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['agents'] = $this->front_model->get_agents($config["per_page"], $page);
		$data['page'] = 'agents';

		$this->load->view('user/template',$data);
	}
    public function show($agent_id){	


		$data['page'] = 'agent';
		$data['agent']  = $this->db->query("SELECT * FROM vendor WHERE id = $agent_id ")->row();	
		//print_r($data['restaurants']); 
		$this->load->view('user/template',$data);
	}

	

}
