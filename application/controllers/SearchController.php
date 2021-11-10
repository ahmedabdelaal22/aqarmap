<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SearchController extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
  		$this->load->helper('url');
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

		
		$offset = ($this->input->post('page')) ? $this->input->post('page') : 1 ;
		$limit = ($this->input->post('limit')) ? $this->input->post('limit') : 10 ;
		$offset_page=($offset - 1)*$limit;
		$region_id=($this->input->post('region_id'))?$this->input->post('region_id'):$this->input->get('region_id');

         $count=   explode(',',$region_id);

		$text=$this->input->get('search');

		 $this->db->select('restaurants.*');
		 $this->db->from('restaurants');
	
		 if (!empty($text)) {
	
	
			$this->db->like('res_name', $text);
	
		 }
	  if(count($count)==2){

		if(!empty($region_id)){
			$this->db->where('restaurants.region_id',$count[1]);
		  }
	     }else{

		 if(!empty($region_id)){
			$this->db->where('restaurants.location_id',$region_id);
		  }
		 }
		
		 if(!empty($limit)){
			$this->db->limit($limit, $offset_page); 
	
		  }
	
	   $query = $this->db->get();
	   $res=$query->result_array();
	

  //print_r(count($res));die();
		$data['page'] = 'search';
		$data['restaurants'] = $res;
		$this->load->view('user/template',$data);
	}



}
