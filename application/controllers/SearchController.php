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
		$this->load->library("pagination");
    }

	public function index(){



	    if($this->input->get('submit') != NULL ){
			$search_text = $this->input->get('search');
			$this->session->set_userdata(array("search"=>$search_text));
			$region_id = $this->input->get('region_id');
			$this->session->set_userdata(array("region_id"=>$region_id));
			$cat_id = $this->input->get('cat_id');
			$this->session->set_userdata(array("cat_id"=>$cat_id));
			$type = $this->input->get('type');
			$this->session->set_userdata(array("type"=>$type));
			$rooms = $this->input->get('rooms');
			$this->session->set_userdata(array("rooms"=>$rooms));
			$floor = $this->input->get('floor');
			$this->session->set_userdata(array("floor"=>$floor));
			$price_range = $this->input->get('price_range');
			$this->session->set_userdata(array("price_range"=>$price_range));
			$this->session->set_userdata(array("min_space"=> $this->input->get('min_space')));
			$this->session->set_userdata(array("max_space"=> $this->input->get('max_space')));
		  }else{
			if($this->session->userdata('search') != NULL){
			  $search_text = $this->session->userdata('search');
			}
			if($this->session->userdata('region_id') != NULL){
				$region_id = $this->session->userdata('region_id');
			  }
			  if($this->session->userdata('cat_id') != NULL){
				$_GET['cat_id']=$cat_id = $this->session->userdata('cat_id');
			  }
			  if($this->session->userdata('type') != NULL){
				$type = $this->session->userdata('type');
			  }
			  if($this->session->userdata('rooms') != NULL){
				$rooms = $this->session->userdata('rooms');
			  }
			  if($this->session->userdata('floor') != NULL){
				$floor = $this->session->userdata('floor');
			  }
			  if($this->session->userdata('price_range') != NULL){
				$_GET['price_range']=$price_range = $this->session->userdata('price_range');
			  }
			  if($this->session->userdata('min_space') != NULL){
				$_GET['min_space']=$this->session->userdata('min_space');
			  }
			  if($this->session->userdata('max_space') != NULL){
				$_GET['max_space']=$this->session->userdata('max_space');
			  }
		  }
	

		 $this->db->select('restaurants.*');
		 $this->db->from('restaurants');
	
		 if (!empty($search_text )) {
			$this->db->like('res_name', $search_text );
	      }
	     if(!empty($region_id )){
			$this->db->where('restaurants.region_id',$region_id );
		  }
		  if(!empty($this->input->get('cat_id'))){
			$this->db->where('restaurants.cat_id',$this->input->get('cat_id'));
		  }
		  if(!empty($type)){
			$this->db->where('restaurants.type',$type);
		  }
		  if(!empty($rooms)){
			$this->db->where('restaurants.rooms',$rooms);
		  }
		  if(!empty($this->input->get('floor'))){
			$this->db->where('restaurants.floor',$this->input->get('floor'));
		  }


		  if(!empty($this->input->get('price_range'))){
			$arrayprice=   explode(';',$this->input->get('price_range'));

			// print_r($arrayprice);
			$_GET['from_price']=$arrayprice[0];
			$_GET['to_price']=$arrayprice[1];
			// die($this->input->get('from_price'));
			if(!empty($this->input->get('from_price')) && !empty($this->input->get('to_price'))){
			  $this->db->where('restaurants.discount >=', $this->input->get('from_price'));
			  $this->db->where('restaurants.discount <=', $this->input->get('to_price'));
  
			}
		  }
		  
	

		
		  if(!empty($this->input->get('min_space'))){
			  $this->db->where('restaurants.space >=', $this->input->get('min_space'));
			}
	
			if(!empty($this->input->get('max_space'))){
			
				$this->db->where('restaurants.space <=', $this->input->get('max_space'));
			  }
			 
	  
	   $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	   $this->db->limit(10, $page );
	   $query = $this->db->get();
	  
	   $res=$query->result_array();

	  

	 
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
	   $config["base_url"] = base_url() . "search";
	   $data['total_rows']=   $config["total_rows"] = $this->get_count();
	   $config["per_page"] = 10;
	   $config["uri_segment"] = 2;

	   $this->pagination->initialize($config);

	   

	   $data["links"] = $this->pagination->create_links();



  //print_r(count($res));die();
		$data['page'] = 'search';
		$data['restaurants'] = $res;
		$this->load->view('user/template',$data);
	}

 public function get_count(){


	if($this->input->get('submit') != NULL ){
		$search_text = $this->input->get('search');
		$this->session->set_userdata(array("search"=>$search_text));
		$region_id = $this->input->get('region_id');
		$this->session->set_userdata(array("region_id"=>$region_id));
		$cat_id = $this->input->get('cat_id');
		$this->session->set_userdata(array("cat_id"=>$cat_id));
		$type = $this->input->get('type');
		$this->session->set_userdata(array("type"=>$type));
		$rooms = $this->input->get('rooms');
		$this->session->set_userdata(array("rooms"=>$rooms));
		$floor = $this->input->get('floor');
		$this->session->set_userdata(array("floor"=>$floor));
		$price_range = $this->input->get('price_range');
		$this->session->set_userdata(array("price_range"=>$price_range));
		$this->session->set_userdata(array("min_space"=> $this->input->get('min_space')));
		$this->session->set_userdata(array("max_space"=> $this->input->get('max_space')));
	  }else{
		if($this->session->userdata('search') != NULL){
		  $search_text = $this->session->userdata('search');
		}
		if($this->session->userdata('region_id') != NULL){
			$_GET['region_id']=$region_id = $this->session->userdata('region_id');
		  }
		  if($this->session->userdata('cat_id') != NULL){
			$_GET['cat_id']=$cat_id = $this->session->userdata('cat_id');
		  }
		  if($this->session->userdata('type') != NULL){
			$_GET['type']=$type = $this->session->userdata('type');
		  }
		  if($this->session->userdata('rooms') != NULL){
			$_GET['rooms']=$rooms = $this->session->userdata('rooms');
		  }
		  if($this->session->userdata('floor') != NULL){
			$_GET['floor']=	$floor = $this->session->userdata('floor');
		  }
		  if($this->session->userdata('price_range') != NULL){
			$_GET['price_range']=$price_range = $this->session->userdata('price_range');
		  }
		  if($this->session->userdata('min_space') != NULL){
			$_GET['min_space']=$this->session->userdata('min_space');
		  }
		  if($this->session->userdata('max_space') != NULL){
			$_GET['max_space']=$this->session->userdata('max_space');
		  }
	  }
	

	$this->db->select('restaurants.*');
	$this->db->from('restaurants');

	if (!empty($search_text )) {
	   $this->db->like('res_name', $search_text );
	 }
	if(!empty($region_id )){
	   $this->db->where('restaurants.region_id',$region_id );
	 }
	 if(!empty($cat_id)){
	   $this->db->where('restaurants.cat_id',$cat_id);
	 }
	 if(!empty($type)){
	   $this->db->where('restaurants.type',$type);
	 }
	 if(!empty($rooms)){
	   $this->db->where('restaurants.rooms',$rooms);
	 }
	 if(!empty($this->input->get('floor'))){
	   $this->db->where('restaurants.floor',$this->input->get('floor'));
	 }


	 if(!empty($this->input->get('price_range'))){
	   $arrayprice=   explode(';',$this->input->get('price_range'));

	   // print_r($arrayprice);
	   $_GET['from_price']=$arrayprice[0];
	   $_GET['to_price']=$arrayprice[1];
	   // die($this->input->get('from_price'));
	   if(!empty($this->input->get('from_price')) && !empty($this->input->get('to_price'))){
		 $this->db->where('restaurants.discount >=', $this->input->get('from_price'));
		 $this->db->where('restaurants.discount <=', $this->input->get('to_price'));

	   }
	 }
	 


   
	 if(!empty($this->input->get('min_space'))){
		 $this->db->where('restaurants.space >=', $this->input->get('min_space'));
	   }

	   if(!empty($this->input->get('max_space'))){
	   
		   $this->db->where('restaurants.space <=', $this->input->get('max_space'));
		 }
		
 $query1 = $this->db->get();
  return $query1->num_rows();
 }

}
