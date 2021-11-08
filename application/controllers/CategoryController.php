<?php defined('BASEPATH') OR exit('No direct script access allowed');
class CategoryController extends CI_Controller
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
			$ci->lang->load('content','arabic');
		}
		 
     	$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model('firebase_model');
    }

	public function index(){
		$data['page'] = 'categories-all';
		$this->load->view('user/template',$data);
	}
    public function show($category_id){

    //print_r($_GET);die;

		$data['category'] =$this->db->get_where('categories', array('id' =>$category_id), 1)->row();
		$offset = ($this->input->get('page')) ? $this->input->get('page') : 1 ;
	$limit = ($this->input->get('limit')) ? $this->input->get('limit') : 20 ;
	$offset_page=($offset - 1)*$limit;
	$region_id=$this->input->get('region_id');
		$this->db->select('id');
		$this->db->from('categories');
		$this->db->where('parent_id ',$category_id);
		$query = $this->db->get();
		$res= $query->result();
		$cats_id[]=$category_id;
	for ($i = 0; $i < count($res); $i++) {
		$cats_id[]=$res[$i]->id;
	}


	$this->db->select('restaurants.*');
	$this->db->from('restaurants');

	if (!empty($_GET['text'])) {

	   $text = $_GET['text'];

	   $this->db->like('res_name', $text);

	}
	if (!empty($_GET['filter_sub'])) {
      if($_GET['filter_sub']=='offers'){

	   $this->db->where('discount >', 0);
	   $this->db->where_in('cat_id', $cats_id);
	   }elseif($_GET['filter_sub']=='all'){
		$this->db->where_in('cat_id', $cats_id);
	   }
	   else{
		
		   $this->db->where('cat_id', $_GET['filter_sub']);
	   }
   

   }else{
	   $this->db->where_in('cat_id', $cats_id);
   }


   if(!empty($region_id)){
	$this->db->where('restaurants.region_id',$region_id);
  }


	if (!empty($_GET['sorting'])) {

		$sorting = $_GET['sorting'];
 
		$this->db->order_by("restaurants.$sorting", "desc");
 
	 }
  if(!empty($limit)){
	 $this->db->limit($limit, $offset_page); 

   }

    $query = $this->db->get();
     $res=$query->result_array();
















		$data['page'] = 'restaurant';
	
		$data['restaurants']  = $res;	
		//print_r($data['restaurants']); 
		$this->load->view('user/template',$data);
	}

	

    public function store($store_id){
	
		$query = $this->db->query("SELECT A.rev_id,A.rev_res,A.rev_user,A.rev_stars,A.rev_text,A.rev_date, B.username,B.profile_pic FROM reviews A, user B WHERE A.rev_res = '$store_id ' AND A.rev_user = B.id ORDER BY A.rev_id DESC");
			$reviews = $query->result(); 
		//	print_r("SELECT A.rev_id,A.rev_res,A.rev_user,A.rev_stars,A.rev_text,A.rev_date, B.username,B.profile_pic FROM reviews A, user B WHERE A.rev_res = '$store_id ' AND A.rev_user = B.id ORDER BY A.rev_id DESC");die;
	
		$data['page'] = 'store';
		$data['res']  =$this->db->get_where('restaurants', array('res_id' => $store_id), 1)->row();
         //	print_r($data['res']); die;
		$this->load->view('user/template',$data);
	}

     public function favourite(){
		$data['page'] = 'favourite';
		$query =$this->db->select('likes.like_id, restaurants.*')
		->from('likes')
		// ->where('likes.user_id', $user_id)
		->join('restaurants', 'likes.res_id = restaurants.res_id')
		->where('restaurants.approved' , "1")
		->where('likes.user_id', $_COOKIE['user_id_cookie'])
		->get();
		
		$data['restaurants']= $query->result_array();	
		$this->load->view('user/template',$data);
     }
	public function get_res_details()
	{
		$result = array();
		header('Content-Type: application/json');

		if (isset($_GET['res_id'])) {

			$res_id = $this->input->get('res_id');
	
			$res = $this->db->get_where('restaurants', array('res_id' => $res_id), 1);
			
			if ($res->num_rows() > 0) {

				$images = explode('::::', $res->row()->res_image);
				$imgs = array();
				$imgsa = array();
				foreach ($images as $key => $image) {
					$imgs = base_url('uploads/') . $image;

					array_push($imgsa, $imgs);
				}

				$imgsb = array();
				$imgsab = array();
				foreach ($images as $key => $image) {
					$imgsb['res_imag' . $key] = base_url('uploads/') . $image;
				}

				// $reviews = $this->front_model->get_rev_by_id_res($res_id);
				
				$query = $this->db->query("SELECT A.rev_id,A.rev_res,A.rev_user,A.rev_stars,A.rev_text,A.rev_date, B.username,B.profile_pic FROM reviews A, user B WHERE A.rev_res = '$res_id' AND A.rev_user = B.id ORDER BY A.rev_id DESC");
				$reviews = $query->result();

				for ($i = 0; $i < count($reviews); $i++) {
					$res_id = $reviews[$i]->rev_res;
					$user_id = $reviews[$i]->rev_user;

					$restaurant = $this->front_model->get_res_by_id($res_id);
					$user = $this->front_model->get_rev_by_id_user($user_id);

					$reviews[$i]->rev_res = $restaurant->res_name;
					$rev_user_data = $this->db->get_where("user", array("id" => $reviews[$i]->rev_user))->row();
					
					if (!empty($rev_user_data->profile_pic)) {
						$url = explode(":", $rev_user_data->profile_pic);
						if ($url[0] == "https" || $url[0] == "http") {
							$rev_user_data->profile_pic = $rev_user_data->profile_pic;
						} elseif (!empty($rev_user_data->profile_pic)) {
							$rev_user_data->profile_pic = base_url() . "uploads/profile_pics/" . $rev_user_data->profile_pic;
						} else {
							$rev_user_data->profile_pic = $rev_user_data->profile_pic;
						}
					} else {
						$rev_user_data->profile_pic = "";
					}
					
				// 	if ($rev_user_data) {
				// 		if ($rev_user_data->profile_pic) {
				// 			$rev_user_data->profile_pic = base_url("uploads/profile_pics/" . $rev_user_data->profile_pic);
				// 		}
				// 	}
					
					$reviews[$i]->rev_user_data = $rev_user_data;

					if (empty($user->username)) {
						$username = "";
					} else {
						$username = $user->username;
					}

					$reviews[$i]->rev_user = $username;
				}

				$cname_get = $res->row();
				$catnm = $this->db->get_where('categories', array('id' => $cname_get->cat_id), 1)->row();
				//$timmings = json_decode($res->row()->timmings);



				$result['status'] = 1;
				$result['msg'] = "Restaurnat Found";
				$result['restaurant'] = $res->row();
				$result['restaurant']->res_image = $imgsb;
				$result['restaurant']->all_image = $imgsa;
				//$result['restaurant']->timmings = $timmings;
				$result['restaurant']->c_name = $catnm->c_name;
				if ($result['restaurant']->res_video == "") {
					$result['restaurant']->res_video = "";
				} else {
					$result['restaurant']->res_video = base_url() . 'uploads/' . $result['restaurant']->res_video;
				}
				$result['restaurant']->logo = base_url() . 'uploads/' . $result['restaurant']->logo;

                if (!empty($result['restaurant']->mfo)) {
					$result['restaurant']->mfo = $result['restaurant']->mfo;
				}else{
					$result['restaurant']->mfo = "";
				}

				$result['review'] = $reviews;

				echo json_encode($result);
			} else {
				$result['status'] = 0;
				$result['msg'] = "Restaurnat not Found";

				echo json_encode($result);
			}
		}
	}

	public function lang(){
		$ci =& get_instance();
		$ci->load->helper('language');
		if($ci->session->userdata('site_lang') == 'arabic'){
			$this->session->set_userdata('site_lang','english');
		}else{
			$this->session->set_userdata('site_lang','arabic');
		}
		$siteLang = $ci->session->userdata('site_lang');
		if ($siteLang) {
			$ci->lang->load('content',$siteLang);
		} else {
			$ci->lang->load('content','english');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
