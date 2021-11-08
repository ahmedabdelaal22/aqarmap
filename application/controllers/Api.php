<?php

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('front_model');
	}


	public function register()
	{
		header('Content-Type: application/json');

		//print_r($user);
		if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['username'])) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$user = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'username' => $this->input->post('username')
			);
			$email_check = $this->front_model->email_check($user['email']);
			$username_check = $this->front_model->username_check($user['username']);
			$temp = array();
			if ($email_check || $username_check) {

				$user['date'] = time();

				// Make Database Post
				$reg = $this->front_model->register_user($user);
				if ($reg) {
					$temp["response_code"] = "1";
					$temp["message"] = "user register success";
					$temp["status"] = "success";
					$temp["user"] = $reg;
					echo json_encode($temp);
				} else {
					$temp["response_code"] = "0";
					$temp["message"] = "user register failure";
					$temp["status"] = "failure";
					echo json_encode($temp);
				}
			} else {

				$temp["response_code"] = "0";
				$temp["message"] = "Email id Already Registered";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		}
	}

	public function login()
	{
		$login = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
    	    'device_token'=>$this->input->post('device_token')
		);
		if ($login['email'] == "") {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$temp = array();
			$data = $this->front_model->login_user($login['email'], $login['password']);
			if (!empty($data)) {
				$temp["response_code"] = "1";
				$temp["message"] = "user login success";
				$temp["status"] = "success";
				$temp["user_id"] = $data['id'];
				//   $temp["payment_status"]=$data['pstatus'];
				$temp["user_token"] = md5(uniqid(rand(), true));
				echo json_encode($temp);
				$this->db->where(array("email" => $login['email'], "password" => $login['password']));
				$this->db->locations('user', array('device_token' => $login['device_token']));
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "user login failure";
				$temp["status"] = "failure";
				$temp["user_id"] = "";
				$temp["user_token"] = md5(uniqid(rand(), true));
				echo json_encode($temp);
			}
		}
	}
	
	public function social_login()
	{
		header('Content-Type: application/json');
		$device_token = $this->input->post('device_token');
		if (!isset($_POST['login_type'])) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$login_type = $this->input->post("login_type");

			// if($type == "facebook" || $type == "google") {

			$email = $this->input->post("email");

			$username = $this->input->post("username");

			$facebook_id = $this->input->post("facebook_id");
			$image_url = $this->input->post("image_url");

			if ($username == "") {
				$temp["response_code"] = "0";
				$temp["message"] = "No User Name or Email Given!";
				$temp["status"] = "failure";
				echo json_encode($temp);
				return;
			}

			$email_check = $this->front_model->email_check($email);
			$facebook_id_check = $this->front_model->facebook_id_check($facebook_id);
			$time = time();
			$user = array(
				"username" => $username,
				"email" => $email,
				"password" => "",
				"facebook_id" => $facebook_id,
				"login_type" => $login_type,
				"isGold" => "",
				"device_token" => $device_token,
				"date" => "$time"
			);

			if (empty($image_url)) {
				$user["profile_pic"] = "";
			} else {
				$user["profile_pic"] = $image_url;
			}

			if (empty($facebook_id)) {
				if (!$email_check) {

					$this->db->where(array("email" => $email));
					$this->db->locations('user', array('device_token' => $device_token));

					$user = $this->db->get_where("user", array("email" => $email))->row();
					if (empty($image_url)) {
						if ($user->profile_pic != "") {
							$user->profile_pic = base_url("uploads/profile_pics/" . $user->profile_pic);
						}
					} else {
						$user->profile_pic = $image_url;
					}

					$temp["response_code"] = "1";
					$temp["message"] = "user register success";
					$temp["status"] = "success";
					$temp["user_id"] = $user->id;
					$temp["user_token"] = "";
					echo json_encode($temp);
					return;
				}
			} else {
				if (!$facebook_id_check) {

					$this->db->where(array("facebook_id" => $facebook_id));
					$this->db->locations('user', array('device_token' => $device_token));

					$user = $this->db->get_where("user", array("facebook_id" => $facebook_id))->row();

					if (empty($image_url)) {
						if ($user->profile_pic != "") {
							// $user->profile_pic = base_url("uploads/profile_pics/" . $user->profile_pic);
							$user->profile_pic = $user->profile_pic;
						}
					} else {
						$user->profile_pic = $image_url;
					}

					$temp["response_code"] = "1";
					$temp["message"] = "user register success";
					$temp["status"] = "success";
					$temp["user_id"] = $user->id;
					$temp["user_token"] = "";
					echo json_encode($temp);
					return;
				}
			}

			if ($this->db->insert("user", $user)) {
				// $user["id"] = $this->db->insert_id();

				$id = $this->db->insert_id();
				$user["id"] = "$id";

				$temp["response_code"] = "1";
				$temp["message"] = "user register success";
				$temp["status"] = "success";
				$temp["user_id"] = "$id";
				$temp["user_token"] = "";
				echo json_encode($temp);
				return;
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "user register fail";
				$temp["status"] = "fail";
				$temp["user_id"] = "";
				$temp["user_token"] = "";
				echo json_encode($temp);
				return;
			}
		}
	}
	
	public function vendor_register()
	{
		header('Content-Type: application/json');

		if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['uname'])) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$user = array(
				'email' => $this->input->post('email'),
				'uname' => $this->input->post('uname'),
				'password' => md5($this->input->post('password')),
				'gender' => $this->input->post('gender'),
				'date_of_birth' => $this->input->post('date_of_birth'),
			);
			$email_check = $this->front_model->vendor_email_check($user['email']);
			$temp = array();

			if ($email_check) {

				$user['date'] = time();

				$reg = $this->front_model->register_vendor($user);
				if ($reg) {

					$temp["response_code"] = "1";
					$temp["message"] = "user register success";
					$temp["status"] = "success";
					$temp["user"] = "$reg";
					echo json_encode($temp);
				} else {
					$temp["response_code"] = "0";
					$temp["message"] = "user register failure";
					$temp["status"] = "failure";
					echo json_encode($temp);
				}
			} else {

				$temp["response_code"] = "0";
				$temp["message"] = "Email id Already Registered";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		}
	}

	public function vendor_login()
	{

		header('Content-Type: application/json; charset=utf-8');

		$login = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			//   'device_token'=>$this->input->post('device_token')
		);
		if ($login['email'] == "") {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$temp = array();
			$data = $this->front_model->login_vendor($login['email'], $login['password']);
			if ($data) {
				$temp["response_code"] = "1";
				$temp["message"] = "user login success";
				$temp["status"] = "success";
				$temp["user_id"] = $data['id'];
				//   $temp["payment_status"]=$data['pstatus'];
				$temp["user_token"] = md5(uniqid(rand(), true));
				echo json_encode($temp);
				//   $this->db->where(array("email" => $login['email'], "password" => $login['password']));
				//   $this->db->locations('user', array('device_token' => $login['device_token']));
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "user login failure";
				$temp["status"] = "failure";
				$temp["user_id"] = "";
				$temp["user_token"] = md5(uniqid(rand(), true));
				echo json_encode($temp);
			}
		}
	}
	
	public function vendor_social_login()
	{
		header('Content-Type: application/json');
		$device_token = $this->input->post('device_token');
		if (!isset($_POST['login_type'])) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$login_type = $this->input->post("login_type");

			$email = $this->input->post("email");

			$username = $this->input->post("username");

			$facebook_id = $this->input->post("facebook_id");
			$image_url = $this->input->post("image_url");

			if ($username == "") {
				$temp["response_code"] = "0";
				$temp["message"] = "No User Name or Email Given!";
				$temp["status"] = "failure";
				echo json_encode($temp);
				return;
			}

			$email_check = $this->front_model->vendor_email_check($email);
			$facebook_id_check = $this->front_model->vendor_facebook_id_check($facebook_id);
			$time = time();
			$user = array(
				"uname" => $username,
				"email" => $email,
				"password" => "",
				"facebook_id" => $facebook_id,
				"login_type" => $login_type,
				"gender" => "",
				"date_of_birth" => "",
				"device_token" => $device_token,
				"date" => "$time",
			);

			if (empty($image_url)) {
				$user["profile_image"] = "";
			} else {
				$user["profile_image"] = $image_url;
			}

			if (empty($facebook_id)) {
				if (!$email_check) {

					$this->db->where(array("email" => $email));
					$this->db->locations('vendor', array('device_token' => $device_token));

					$user = $this->db->get_where("vendor", array("email" => $email))->row();
					if (empty($image_url)) {
						if ($user->profile_image != "") {
							$user->profile_image = base_url("uploads/profile_pics/" . $user->profile_image);
						}
					} else {
						$user->profile_image = $image_url;
					}

					$temp["response_code"] = "1";
					$temp["message"] = "user register success";
					$temp["status"] = "success";
					$temp["user_id"] = $user->id;
					$temp["user_token"] = "";
					echo json_encode($temp);
					return;
				}
			} else {
				if (!$facebook_id_check) {

					$this->db->where(array("facebook_id" => $facebook_id));
					$this->db->locations('vendor', array('device_token' => $device_token));

					$user = $this->db->get_where("vendor", array("facebook_id" => $facebook_id))->row();

					if (empty($image_url)) {
						if ($user->profile_image != "") {
							// $user->profile_image = base_url("uploads/profile_pics/" . $user->profile_image);
							$user->profile_image = $user->profile_image;
						}
					} else {
						$user->profile_image = $image_url;
					}

					$temp["response_code"] = "1";
					$temp["message"] = "user register success";
					$temp["status"] = "success";
					$temp["user_id"] = $user->id;
					$temp["user_token"] = "";
					echo json_encode($temp);
					return;
				}
			}

			if ($this->db->insert("vendor", $user)) {
				// $user["id"] = $this->db->insert_id();

				$id = $this->db->insert_id();
				$user["id"] = "$id";

				$temp["response_code"] = "1";
				$temp["message"] = "user register success";
				$temp["status"] = "success";
				$temp["user_id"] = "$id";
				$temp["user_token"] = "";
				echo json_encode($temp);
				return;
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "user register fail";
				$temp["status"] = "fail";
				$temp["user_id"] = "";
				$temp["user_token"] = "";
				echo json_encode($temp);
				return;
			}
		}
	}

	public function user_edit()
	{

		$this->load->helper('form');
		$this->load->library('form_validation');

		$id = $this->input->post('id');

		$user = $this->db->get_where('user', array('id' => $id), 1)->row();

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');

		if ($this->form_validation->run() === FALSE) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$res_image = $user->profile_pic;

			if (isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name'] != "") {
				$image_exts = array("tif", "jpg", "jpeg", "gif", "png");

				$configVideo['upload_path'] = './uploads/profile_pics/'; # check path is correct
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = $image_exts; # add video extenstion on here
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$configVideo['file_name'] = uniqid();

				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);

				if (!$this->upload->do_upload('profile_pic')) # form input field attribute
				{
					$temp["response_code"] = "0";
					$temp["message"] = "Image Type Error";
					$temp["status"] = "failure";
					echo json_encode($temp);
				} else {
					# Upload Successfull
					$upload_data = $this->upload->data();
					$res_image = $upload_data['file_name'];
				}
			}

			$user = array(
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'profile_pic' => $res_image
			);

			$this->db->where('id', $id);
			$locations = $this->db->locations('user', $user);
			if ($locations) {
				$temp["response_code"] = "1";
				$temp["message"] = "Update Successfully";
				$temp["status"] = "success";
				echo json_encode($temp);
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "Database error";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		}
	}

	public function vendor_edit()
	{

		$this->load->helper('form');
		$this->load->library('form_validation');

		$id = $this->input->post('id');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('uname', 'username', 'required');

		if ($this->form_validation->run() === FALSE) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$restaurant = $this->db->get_where('vendor', array('id' => $id), 1)->row();
			$profile_image = $restaurant->profile_image;
			if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != "") {
				// File upload configuration
				$config['upload_path'] = './uploads/profile_pics/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = uniqid();
				$config['overwrite'] = TRUE;


				// Load and initialize upload library
				$this->load->library('upload');
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('profile_image')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$profile_image = $fileData['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
					$temp["response_code"] = "0";
					$temp["message"] = $error['error'];
					$temp["status"] = "failure";
					echo json_encode($temp);
				}
			}

			$user = array(
				'uname' => $this->input->post('uname'),
				'email' => $this->input->post('email'),
				'gender' => $this->input->post('gender'),
				'date_of_birth' => $this->input->post('date_of_birth'),
				'profile_image' => $profile_image,
			);

			$this->db->where('id', $id);
			$locations = $this->db->locations('vendor', $user);
			if ($locations) {
				$temp["response_code"] = "1";
				$temp["message"] = "Update Successfully";
				$temp["status"] = "success";
				echo json_encode($temp);
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "Database error";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		}
	}

	public function forgot_pass()
	{
		header('Content-Type: application/json');
		$email = $this->input->post('email');

		$result = array();

		$user = $this->db->get_where('user', array('email' => $email), 1)->row();

		if ($user->email != "") {
			$data = array();
			// $new_pass = uniqid();
			$new_pass = mt_rand(100000, 999999);
			$data['password'] = md5($new_pass);

			$this->db->where('email', $email);
			$this->db->locations('user', $data);

			//Send Email
			$message = "<h1>Hello " . $user->email . "</h1>";
			$message .= "<h1>Your password reset was Successful. New Pass: " . $new_pass . "</h1>";


			$this->load->library('email');

			// Mail config
			$to = $user->email;
			$from = "keval.primocys@gmail.com";
			$fromName = "Nylitical App Team";
			$mailSubject = "Password Reset Success";

			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->to($to);
			$this->email->from($from, $fromName);
			$this->email->subject($mailSubject);
			$this->email->message($message);

			// Send email & return status
			$send = $this->email->send();

			if ($send) {
				$result['status'] = 1;
				$result['msg'] = "Password Changed";
				$result['new_pass'] = $new_pass;

				echo json_encode($result);
			} else {
				$result['status'] = 0;
				$result['msg'] = "Mail Sent Error";
				$result['new_pass'] = $new_pass;

				echo json_encode($result);
			}
		} else {
			$result['status'] = 0;
			$result['msg'] = "invalid Email";

			echo json_encode($result);
		}
	}
	
	public function vendor_forgot_pass()
	{
		header('Content-Type: application/json');
		$email = $this->input->post('email');

		$result = array();

		$user = $this->db->get_where('vendor', array('email' => $email), 1)->row();

		if (!empty($user)) {
			$data = array();
			// $new_pass = uniqid();
			$new_pass = mt_rand(100000, 999999);
			$data['password'] = md5($new_pass);

			$this->db->where('email', $email);
			$this->db->locations('vendor', $data);

			//Send Email
			$message = "<h1>Hello " . $user->email . "</h1>";
			$message .= "<h1>Your password reset was Successful. New Pass: " . $new_pass . "</h1>";


			$this->load->library('email');

			// Mail config
			$to = $user->email;
			$from = "keval.primocys@gmail.com";
			$fromName = "Nylitical App Team";
			$mailSubject = "Password Reset Success";

			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->to($to);
			$this->email->from($from, $fromName);
			$this->email->subject($mailSubject);
			$this->email->message($message);

			// Send email & return status
			$send = $this->email->send();

			if ($send) {
				$result['status'] = 1;
				$result['msg'] = "Password Changed";
				$result['new_pass'] = $new_pass;

				echo json_encode($result);
			} else {
				$result['status'] = 0;
				$result['msg'] = "Mail Sent Error";
				$result['new_pass'] = $new_pass;

				echo json_encode($result);
			}
		} else {
			$result['status'] = 0;
			$result['msg'] = "invalid Email";

			echo json_encode($result);
		}
	}

	public function search()
	{
	
		//header('Content-Type: application/json; charset=utf-8');
		if (isset($_POST['text'])) {

			$text = $_POST['text'];


			$this->db->like('res_name', $text);
			$this->db->or_like('res_name_u', $text);
			$this->db->or_like('res_address', $text);

			$restaurants = $this->db->get('restaurants');


			if ($restaurants->num_rows() > 0) {

				foreach ($restaurants->result() as $restaurant) {
					//$restaurant->res_image = base_url('uploads/'.$restaurant->res_image);
					$images = explode("::::", $restaurant->res_image);
					$imgs = array();
					$imgsa = array();
					foreach ($images as $key => $image) {
						$imgs = base_url('uploads/') . $image;

						array_push($imgsa, $imgs);
					}

					$restaurant->all_image = $imgsa;

					$imgsb = array();
					$imgsab = array();
					foreach ($images as $key => $image) {
						$imgsb['res_imag' . $key] = base_url('uploads/') . $image;
					}

					$restaurant->res_image = $imgsb;

					$restaurant->logo = base_url() . 'uploads/' . $restaurant->logo;

					$resid = $restaurant->res_id;
					$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
					$mcount = $querycount->num_rows();

					$restaurant->review_count = $mcount;

					if ($restaurant->res_video == "") {
						$restaurant->res_video = "";
					} else {
						$restaurant->res_video = base_url() . 'uploads/' . $restaurant->res_video;
					}
				}

				$temp["response_code"] = "1";
				$temp["message"] = "Restaurants Found!";
				$temp['restaurants'] = $restaurants->result();
				$temp["status"] = "success";
				echo json_encode($temp);

				return;
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "No restaurants found";
				$temp['restaurants'] = [];
				$temp["status"] = "fail";
				echo json_encode($temp);

				return;
			}
		}
	}

	public function get_discounted_res()
	{
		header('Content-Type: application/json');
		$restaurants = $this->db->get_where("restaurants", array('discount >' => 0));

		if ($restaurants->num_rows() > 0) {

			foreach ($restaurants->result() as $restaurant) {
				$restaurant->res_image = base_url('uploads/' . $restaurant->res_image);
			}

		//	$temp["response_code"] = "1";
			$temp["msg"] = "Restaurants Found!";
			$temp['restaurants'] = $restaurants->result();
			$temp["status"] = 1;
			echo json_encode($temp);

			return;
		} else {

		//	$temp["response_code"] = "0";
			$temp["msg"] = "No restaurants found";
			$temp["status"] = 0;
			echo json_encode($temp);

			return;
		}
	}

	public function addDiscount()
	{
		header('Content-Type: application/json');
		if (isset($_POST['res_id']) && $_POST['discount']) {

			$discount = (int)$this->input->post('discount');

			if (!is_numeric($discount)) {
				$temp["response_code"] = "0";
				$temp["message"] = "Discount Must Be Integer";
				$temp["status"] = "fail";
				echo json_encode($temp);

				return;
			}

			$this->db->where('res_id', $this->input->post('res_id'));
			if ($this->db->locations('restaurants', array('discount' => $discount))) {
				$temp["response_code"] = "1";
				$temp["message"] = "Discount Added";
				$temp["status"] = "success";
				echo json_encode($temp);

				return;
			} else {
				$temp["response_code"] = "0";
				$temp["message"] = "Database Error";
				$temp["status"] = "fail";
				echo json_encode($temp);

				return;
			}
		} else {

			$temp["response_code"] = "0";
			$temp["message"] = "Missing Fields";
			$temp["status"] = "fail";
			echo json_encode($temp);

			return;
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
				$temp["status"] = "fail";
				echo json_encode($temp);

				return;
			}

			if ($this->db->insert('likes', $like)) {

				$temp["response_code"] = "1";
				$temp["message"] = "Liked Restaurant";
				$temp["status"] = "success";
				echo json_encode($temp);
			} else {

				$temp["response_code"] = "0";
				$temp["message"] = "Databse Error";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		} else {

			$temp["response_code"] = "0";
			$temp["message"] = "Missing Fields";
			$temp["status"] = "failure";
			echo json_encode($temp);
		}
	}



	public function user_data()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('user_id');
		if (empty($id)) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$temp = array();
			$profile = array();
			$profile = $this->front_model->get_user($id);
			$reviews = $this->front_model->get_res($id);

            if (!empty($profile)) {
    			$user = array();
    			$user['username'] = $profile->username;
    			$user['email'] = $profile->email;
    			$user['isGold'] = $profile->isGold;
    			
    // 			$user['profile_pic'] = base_url("uploads/profile_pics/" . $profile->profile_pic);
    			
    			if (!empty($profile->profile_pic)) {
					$url = explode(":", $profile->profile_pic);
					if ($url[0] == "https" || $url[0] == "http") {
						$user['profile_pic'] = $profile->profile_pic;
					} elseif (!empty($profile->profile_pic)) {
						$user['profile_pic'] = base_url() . "uploads/profile_pics/" . $profile->profile_pic;
					} else {
						$user['profile_pic'] = $profile->profile_pic;
					}
				} else {
					$user['profile_pic'] = "";
				}
    			
    			$user['profile_created'] = gmdate('d M Y', $profile->date);
    			$user['device_token'] = $profile->device_token;
    
    			for ($i = 0; $i < count($reviews); $i++) {
    				$res_id = $reviews[$i]->rev_res;
    
    				$restaurant = $this->front_model->get_res_by_id($res_id);
    
    				if ($restaurant) {
    					$reviews[$i]->rev_res_id = $restaurant->res_id;
    
    					$reviews[$i]->rev_res = $restaurant->res_name;
    
    					$reviews[$i]->rev_username = $profile->username;
    
    					$exp = explode("::::", $restaurant->res_image);
    					foreach ($exp as $xx) {
    						$reviews[$i]->rev_res_image = base_url() . 'uploads/' . $xx;
    					}
    				}
    				$reviews[$i]->rev_date = gmdate('d M Y', (int)$reviews[$i]->rev_date);
    			}
    
    			$temp["response_code"] = "1";
    			$temp["message"] = "User Found";
    			$temp['user'] = $user;
    			$temp['review'] = $reviews;
    			$temp["status"] = "success";
    			echo json_encode($temp);
			
		    }else{
				$temp = array();
    			$temp["response_code"] = "0";
    			$temp["message"] = "User Not Found";
    			$temp["status"] = "failure";
    			echo json_encode($temp);
			}
		}
	}

	public function change_password()
	{

		$id = $this->input->post('user_id');

		if (empty($id)) {
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['profile'] = $this->front_model->get_user($id);


		$password = md5($this->input->post('password'));
		$npassword = md5($this->input->post('npassword'));
		$cpassword = md5($this->input->post('cpassword'));

		if ($npassword == $cpassword) {
			$password_check = $this->front_model->password_check($password, $id);

			if ($password_check) {
				$this->front_model->change_pass($npassword, $id);
				$temp = array();
				$temp["response_code"] = "1";
				$temp["message"] = "Successfully Changed";
				$temp["status"] = "success";
				echo json_encode($temp);
			} else {
				$temp = array();
				$temp["response_code"] = "0";
				$temp["message"] = "Old Password Wrong";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		} else {
			$temp = array();
			$temp["response_code"] = "0";
			$temp["message"] = "'New Password And Confirm Password Not Match..";
			$temp["status"] = "failure";
			echo json_encode($temp);
		}
	}

	public function create_res()
	{
		$result = array();
		header('Content-Type: application/json');

		if (isset($_POST['name'])) {
			if (!isset($_POST['name']) || !isset($_FILES['image']['name']) || !isset($_POST['description']) || !isset($_POST['cat_id']) || !isset($_POST['city']) || !isset($_POST['area'])) {
				$result['status'] = 0;
				$result['msg'] = "Missing Data";

				echo json_encode($result);
			} else {

				$cat_id = $this->input->post('cat_id');
				$cat_name = $this->db->get_where('categories', array('cat_id' => $cat_id), 1)->row();

				if (!$cat_name) {
					$result['status'] = 0;
					$result['msg'] = 'Invalid Category';

					echo json_encode($result);

					return;
				}

				$res_image = "";
				$image_exts = array("tif", "jpg", "gif", "png");

				$configVideo['upload_path'] = './uploads/'; # check path is correct
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = $image_exts; # add video extenstion on here
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$configVideo['file_name'] = uniqid();

				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);

				if (!$this->upload->do_upload('image')) # form input field attribute
				{
					# Upload Failed
					$result['status'] = 0;
					$result['msg'] = 'Image Upload Error';
					$result['erros'] = ($this->upload->display_errors());

					echo json_encode($result);
				} else {
					# Upload Successfull
					$upload_data = $this->upload->data();
					$res_image = $upload_data['file_name'];
				}

				$address = array(
					'city' => $_POST['city'],
					'area' => $_POST['area']
				);


				$data = array();
				$data['res_name'] = $this->input->post('name');
				$data['res_desc'] = $this->input->post('description');
				if ($this->input->post('website')) {
					$data['res_website'] = $this->input->post('website');
				}
				$data['res_image'] = $res_image;
				$data['res_isOpen'] = 'open';
				$data['res_status'] = 'active';
				$data['res_cat'] = $this->input->post('cat_id');
				$data['res_address'] = $_POST['city'] . ', ' . $_POST['area'];
				$data['res_cat_name'] = $cat_name->name;
				$data['res_create_date'] = time();
				$data['lat'] = $this->input->post('lat');
				$data['long'] = $this->input->post('long');


				if ($this->db->insert('restaurants', $data)) {
					$result['status'] = 1;
					$result['msg'] = "Restaurant Created";
					$result['restaurant'] = $data;

					echo json_encode($result);
				} else {
					$result['status'] = 0;
					$result['msg'] = "Database Error";


					echo json_encode($result);
				}
			}
		} else {
			$result['status'] = 0;
			$result['msg'] = "No name given";

			echo json_encode($result);
		}
	}

	public function get_liked_res()
	{
		header('Content-Type: application/json');
		if (isset($_POST['user_id'])) {
		
			$user_id = $this->input->post('user_id');
			$likes = $this->db->select('likes.like_id, restaurants.*')
				->from('likes')
				// ->where('likes.user_id', $user_id)
				->join('restaurants', 'likes.res_id = restaurants.res_id')
				->where('restaurants.approved' , "1")
				->where('likes.user_id', $user_id)
				->get();

			if ($likes->num_rows() > 0) {

				foreach ($likes->result() as $restaurant) {
					//$restaurant->res_image = base_url().'uploads/'.$restaurant->res_image;
					$restaurant->res_create_date = gmdate('d M Y', $restaurant->res_create_date);
					$catnm = $this->db->get_where('categories', array('id' => $restaurant->cat_id), 1)->row();
					$restaurant->c_name = $catnm->c_name;

					$images = explode("::::", $restaurant->res_image);
					$imgs = array();
					$imgsa = array();
					foreach ($images as $key => $image) {
						$imgs = base_url('uploads/') . $image;

						array_push($imgsa, $imgs);
					}

					$restaurant->all_image = $imgsa;

					$imgsb = array();
					$imgsab = array();
					foreach ($images as $key => $image) {
						$imgsb['res_imag' . $key] = base_url('uploads/') . $image;
					}
					$restaurant->res_image = $imgsb;

					$restaurant->logo = base_url() . 'uploads/' . $restaurant->logo;

					if ($restaurant->res_video == "") {
						$restaurant->res_video = "";
					} else {
						$restaurant->res_video = base_url() . 'uploads/' . $restaurant->res_video;
					}

					$resid = $restaurant->res_id;
					$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
					$mcount = $querycount->num_rows();

					$restaurant->review_count = $mcount;
				}

				$result['status'] = 1;
				$result['msg'] = "Restaurants Found";
				$result['restaurants'] = $likes->result();
				echo json_encode($result);
			} else {
				$result['status'] = 0;
				$result['msg'] = "No Restaurants Found";
				$result['restaurants'] = [];
				echo json_encode($result);
			}
		} else {
			$result['status'] = 0;
			$result['msg'] = "Missing Fields";
			$result['restaurants'] = [];
			echo json_encode($result);
		}
	}

	public function locations_to_gold()
	{
		header('Content-Type: application/json');
		if (isset($_POST['user_id'])) {
			$user_id = $this->input->post('user_id');
			$this->db->where('id', $user_id);
			if ($this->db->locations('user', array('isGold' => 1))) {
				$result['status'] = 1;
				$result['msg'] = "User Updated to Gold";
				echo json_encode($result);
			} else {
				$result['status'] = 0;
				$result['msg'] = "Database Error";
				echo json_encode($result);
			}
		}
	}

	public function add_cat()
	{
		header('Content-Type: application/json');
		if (isset($_POST['cat_name'])) {

			if ($this->db->insert('categories', array('name' => $this->input->post('cat_name')))) {
				$result['status'] = 1;
				$result['msg'] = "Category Added";
				$result['category'] = $this->input->post('cat_name');

				echo json_encode($result);
			}
		} else {


			$result['status'] = 0;
			$result['msg'] = "No name given";

			echo json_encode($result);
		}
	}



	public function get_all_cat()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get('categories')->result();
		$this->db->select('categories.*');
		if (isset($_GET['text'])) {
			$text = $_GET['text'];
			$this->db->like('c_name', $text);
			$this->db->or_like('c_name_a', $text);
	
		}
		$this->db->from('categories');
		$this->db->where('parent_id ',0);
		$query = $this->db->get();
		$res= $query->result();
		for ($i = 0; $i < count($res); $i++) {
			$res[$i]->icon = base_url() . 'uploads/' . $res[$i]->icon;
			$res[$i]->img = base_url() . 'uploads/' . $res[$i]->img;
		}



		$result['categories'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}


	public function get_all_cat_with_child()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		$this->db->select('categories.*');
		if (isset($_POST['text'])) {
			$text = $_POST['text'];
			$this->db->like('c_name', $text);
			$this->db->or_like('c_name_a', $text);
	
		}
		$this->db->from('categories');
		$this->db->where('parent_id ',0);
		$query = $this->db->get();
		$res= $query->result();

		for ($i = 0; $i < count($res); $i++) {
			$res[$i]->icon = base_url() . 'uploads/' . $res[$i]->icon;
			$res[$i]->img = base_url() . 'uploads/' . $res[$i]->img;
			$res[$i]->shildren =$this->nested2ul($res[$i]->id);
		}



		$result['categories'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}
    public function nested2ul($parent_id) {
		$this->db->select('categories.*');
		$this->db->from('categories');
		$this->db->where('parent_id ',$parent_id);
		$query = $this->db->get();
		$res= $query->result();
	

		for ($i = 0; $i < count($res); $i++) {
			$res[$i]->icon = base_url() . 'uploads/' . $res[$i]->icon;
			$res[$i]->img = base_url() . 'uploads/' . $res[$i]->img;
			$res[$i]->shildren =$this->nested2ul($res[$i]->id);
		}
	  
		return $res;
	  }
	public function get_all_vip()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get_where('restaurants', array('status' => '1'))->result();

		$res = $this->db->query('SELECT * FROM restaurants WHERE FIND_IN_SET(1,status)')->result();



		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$res[$i]->all_image = $imgsa;
			$res[$i]->res_image = $imgsb;
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function get_all_nonvip()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		$res = $this->db->query('SELECT * FROM restaurants WHERE FIND_IN_SET(0,status)')->result();



		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$res[$i]->all_image = $imgsa;
			$res[$i]->res_image = $imgsb;
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function get_all_cat_byid()
	{
		$result = array();
		header('Content-Type: application/json');

		$cat_id = $this->input->post('cat_id');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get_where('restaurants', array('status' => '0','cat_id' => $cat_id))->result();

		$res = $this->db->query("SELECT * FROM restaurants WHERE FIND_IN_SET(2,status) AND cat_id='$cat_id' ")->result();


		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$res[$i]->all_image = $imgsa;
			$res[$i]->res_image = $imgsb;
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}
	public function get_all_cat_vip()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get_where('restaurants', array('status' => '2'))->result();
	
	     $limit=$this->input->get('limit');
	     $region_id=$this->input->get('region_id');
		 $location_id=$this->input->get('location_id');
         //	$this->db->limit($limit); 
          $this->db->select('restaurants.*');
		  $this->db->from('restaurants');
	      $this->db->where('find_in_set(2, status) <> 0');
		  if(!empty($region_id)){
			$this->db->where('restaurants.region_id',$region_id);
		  }
		  if(!empty($location_id)){
			$this->db->where('restaurants.location_id',$location_id);
		  }
		  $this->db->limit($limit); 
		$query = $this->db->get();
		$res=$query->result();

		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$res[$i]->res_image = $imgsb;

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$res[$i]->all_image = $imgsa;
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function get_all_cat_nvip()
	{
		$result = array();
		header('Content-Type: application/json');

		$cat_id = $this->input->post('cat_id');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get_where('restaurants', array('status' => '0','cat_id' => $cat_id))->result();

		$res = $this->db->query("SELECT * FROM restaurants WHERE FIND_IN_SET(1,status) AND cat_id='$cat_id' ")->result();


		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$res[$i]->all_image = $imgsa;
			$res[$i]->res_image = $imgsb;

			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function get_all_cat_nvip_sorting()
	{
		$result = array();
		header('Content-Type: application/json');

		$cat_id = $this->input->post('cat_id');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get_where('restaurants', array('status' => '0','cat_id' => $cat_id))->result();
		$limit=($this->input->get('limit'))?$this->input->get('limit'):10000;
	   
		
		if(!empty($this->input->get('region_id'))){
			$region_id=$this->input->get('region_id');
			$location_id=$this->input->get('location_id');
			if(!empty($this->input->get('location_id'))){
				$res = $this->db->query("SELECT * FROM restaurants WHERE approved = '1' and region_id = $region_id and location_id = $location_id ORDER BY res_ratings DESC LIMIT 0, $limit")->result();

			}else{
				$res = $this->db->query("SELECT * FROM restaurants WHERE approved = '1' and region_id = $region_id  ORDER BY res_ratings DESC LIMIT 0, $limit")->result();

			}
		}else{
			$res = $this->db->query("SELECT * FROM restaurants WHERE approved = '1' ORDER BY res_ratings DESC LIMIT 0, $limit")->result();

		}


		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$res[$i]->all_image = $imgsa;
			$res[$i]->res_image = $imgsb;

			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function regions()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "regions Found";
	 $limit=$this->input->get('limit');
		$this->db->select('regions.*');
		$this->db->from('regions');
		$this->db->limit($limit); 
		$query = $this->db->get();
		$res=$query->result();
		for ($i = 0; $i < count($res); $i++) {
			$locations = $this->db->get_where('locations', array('region_id' => $res[$i]->id), 1)->result();
			$res[$i]->locations = $locations;
		}
		



		$result['regions'] = $res;


		echo json_encode($result);
	}

	public function offers()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "offers Found";
	    $limit=$this->input->get('limit');
	    $region_id=$this->input->get('region_id');
		$location_id=$this->input->get('location_id');
		$this->db->select('offers.*,restaurants.res_name');
		$this->db->from('offers');
		$this->db->join('restaurants', 'restaurants.res_id = offers.restaurant_id');
		if(!empty($region_id)){
			$this->db->where('restaurants.region_id',$region_id);
		}
		if(!empty($location_id)){
			$this->db->where('restaurants.location_id',$location_id);
		}
		$this->db->limit($limit); 
		$query = $this->db->get();
		$res=$query->result();

		for ($i = 0; $i < count($res); $i++) {
			$res[$i]->image = base_url('uploads/') . $res[$i]->image;
		}



		$result['offers'] = $res;


		echo json_encode($result);
	}

	
	public function get_all_region_rest()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get_where('restaurants', array('status' => '2'))->result();
		   $limit=$this->input->get('limit');
	    	$region_id=$this->input->get('region_id');
			$location_id=$this->input->get('location_id');
          $this->db->select('restaurants.*');
		  $this->db->from('restaurants');
	      $this->db->where('find_in_set(2, status) <> 0');
	//	 $this->db->query("SELECT * FROM restaurants WHERE FIND_IN_SET(2,status) ");
		 $this->db->limit($limit); 
		$query = $this->db->get();
		$res=$query->result();

		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$res[$i]->res_image = $imgsb;

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$res[$i]->all_image = $imgsa;
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function get_all_res()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		
// 		$res = $this->db->get('restaurants')->result();
		
		$res = $this->db->order_by("res_id", "desc")->get_where('restaurants', array('approved' => "1"))->result();

		for ($i = 0; $i < count($res); $i++) {

			$images = explode("::::", $res[$i]->res_image);
			$imgs = array();
			$imgsa = array();
			foreach ($images as $key => $image) {
				$imgs = base_url('uploads/') . $image;

				array_push($imgsa, $imgs);
			}

			$res[$i]->all_image = $imgsa;

			$imgsb = array();
			$imgsab = array();
			foreach ($images as $key => $image) {
				$imgsb['res_imag' . $key] = base_url('uploads/') . $image;
			}

			$res[$i]->res_image = $imgsb;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function get_res_details()
	{
		$result = array();
		header('Content-Type: application/json');

		if (isset($_POST['res_id'])) {

			$res_id = $this->input->post('res_id');
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
				
				$query = $this->db->query("SELECT A.rev_id,A.rev_res,A.rev_user,A.rev_stars,A.rev_text,A.rev_date,A.name FROM reviews A WHERE A.rev_res = '$res_id'  ORDER BY A.rev_id DESC");
				$reviews = $query->result();

				for ($i = 0; $i < count($reviews); $i++) {
					$res_id = $reviews[$i]->rev_res;
					// $user_id = $reviews[$i]->rev_user;

					$restaurant = $this->front_model->get_res_by_id($res_id);
					// $user = $this->front_model->get_rev_by_id_user($user_id);

					$reviews[$i]->rev_res = $restaurant->res_name;
					// $rev_user_data = $this->db->get_where("user", array("id" => $reviews[$i]->rev_user))->row();
					
					// if (!empty($rev_user_data->profile_pic)) {
					// 	$url = explode(":", $rev_user_data->profile_pic);
					// 	if ($url[0] == "https" || $url[0] == "http") {
					// 		$rev_user_data->profile_pic = $rev_user_data->profile_pic;
					// 	} elseif (!empty($rev_user_data->profile_pic)) {
					// 		$rev_user_data->profile_pic = base_url() . "uploads/profile_pics/" . $rev_user_data->profile_pic;
					// 	} else {
					// 		$rev_user_data->profile_pic = $rev_user_data->profile_pic;
					// 	}
					// } else {
					// 	$rev_user_data->profile_pic = "";
					// }
					
				// 	if ($rev_user_data) {
				// 		if ($rev_user_data->profile_pic) {
				// 			$rev_user_data->profile_pic = base_url("uploads/profile_pics/" . $rev_user_data->profile_pic);
				// 		}
				// 	}
					
					// $reviews[$i]->rev_user_data = $rev_user_data;

					// if (empty($user->username)) {
					// 	$username = "";
					// } else {
					// 	$username = $user->username;
					// }

					// $reviews[$i]->rev_user = $username;
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
				$this->db->locations('restaurants', $rat_data);


				$result['status'] = 1;
				$result['msg'] = "Review Given";
				$result['rreview'] = $rat_data['res_ratings'];

				echo json_encode($result);
			} else {
				$result['status'] = 0;
				$result['msg'] = "Database Error";

				echo json_encode($result);
			}
		} else {
			$result['status'] = 0;
			$result['msg'] = "Missing Data";

			echo json_encode($result);
		}
	}

	public function unlike()
	{
		header('Content-Type: application/json');

		$res_id = $this->input->post('res_id');
		$user_id = $this->input->post('user_id');

		if ($this->front_model->unlike($res_id, $user_id)) {
			$result['status'] = 1;
			$result['msg'] = "Successfully Unlike";

			echo json_encode($result);
		} else {
			$result['status'] = 0;
			$result['msg'] = "Something Wrong";

			echo json_encode($result);
		}
	}

	public function get_cat_res()
	{
		header('Content-Type: application/json');
		if (isset($_POST['cat_id'])) {
			$cat_id = $this->input->post('cat_id');
			$likes = $this->db->select('restaurants.*')
				->from('restaurants')
				->where(array('cat_id' => $cat_id, 'approved' => "1"))
				->order_by('res_ratings', 'DESC')
				->get();

			if ($likes->num_rows() > 0) {

				foreach ($likes->result() as $restaurant) {
					//$restaurant->res_image = base_url().'uploads/'.$restaurant->res_image;
					$restaurant->res_create_date = gmdate('d M Y', $restaurant->res_create_date);
					$catnm = $this->db->get_where('categories', array('id' => $restaurant->cat_id), 1)->row();

					if (!empty($catnm)) {
						$restaurant->c_name = $catnm->c_name;
					} else {
						$restaurant->c_name = "";
					}

					$images = explode("::::", $restaurant->res_image);
					$imgs = array();
					$imgsa = array();
					foreach ($images as $key => $image) {
						$imgs = base_url('uploads/') . $image;

						array_push($imgsa, $imgs);
					}

					$restaurant->all_image = $imgsa;

					$imgsb = array();
					$imgsab = array();
					foreach ($images as $key => $image) {
						$imgsb['res_imag' . $key] = base_url('uploads/') . $image;
					}

					$restaurant->res_image = $imgsb;

					$restaurant->logo = base_url() . 'uploads/' . $restaurant->logo;
					if ($restaurant->res_video == "") {
						$restaurant->res_video = "";
					} else {
						$restaurant->res_video = base_url() . 'uploads/' . $restaurant->res_video;
					}
					$resid = $restaurant->res_id;
					$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
					$mcount = $querycount->num_rows();

					$restaurant->review_count = $mcount;
				}

				$result['status'] = 1;
				$result['msg'] = "Restaurants Found";
				$result['restaurants'] = $likes->result();
				echo json_encode($result);
			} else {
				$result['status'] = 0;
				$result['msg'] = "No Restaurants Found";
				echo json_encode($result);
			}
		} else {
			$result['status'] = 0;
			$result['msg'] = "Missing Fields";
			echo json_encode($result);
		}
	}

	public function get_text()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "welcome text";
		$res = $this->db->get('wc_text')->result();

		$result['text'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function contact_url()
	{
		$result = array();
		header('Content-Type: application/json');

		$result['status'] = 1;
		$result['msg'] = "contact url";
		$res = $this->db->get('weblink')->result();

		$result['text'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}


	public function add_restaurant()
	{

		if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['address'])) {

			$res_image = array();
			$res_video = "";
			$logo = "";

			if ($_FILES['res_image']['name'] != "") {
				//echo "image detected";
				if (is_array($_FILES['res_image']['name'])) {
					$filesCount = count($_FILES['res_image']['name']);
					for ($i = 0; $i < $filesCount; $i++) {
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
						if ($this->upload->do_upload('file')) {
							// Uploaded file data
							$fileData = $this->upload->data();
							array_push($res_image, $fileData['file_name']);
							//$res_image = $fileData['file_name'];

						} else {
							$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));

							$temp["response_code"] = "0";
							$temp["message"] = $error['error'];
							$temp["status"] = "failure";
							echo json_encode($temp);
						}
					}
				}
			}

			if (isset($_FILES['logo']['name']) != "") {
				$image_exts = array("jpeg", "jpg", "jpeg", "png");

				$configVideo['upload_path'] = './uploads'; # check path is correct
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = $image_exts; # add video extenstion on here
				$configVideo['overwrite'] = TRUE;
				$configVideo['remove_spaces'] = TRUE;
				$configVideo['file_name'] = uniqid();

				$this->load->library('upload');
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('logo')) # form input field attribute
				{
					$temp["response_code"] = "0";
					$temp["message"] = "Image Type Error";
					$temp["status"] = "failure";
					echo json_encode($temp);
				} else {
					# Upload Successfull
					$fileData = $this->upload->data();
					$logo = $fileData['file_name'];
				}
			}


			// if($_FILES['res_video']['name'] != "") {
			if (isset($_FILES['res_video']['name']) && $_FILES['res_video']['name'] != "") {
				// File upload configuration
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'mp4|mkv';
				$config['file_name'] = uniqid();
				$config['overwrite'] = TRUE;


				// Load and initialize upload library
				$this->load->library('upload');
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('res_video')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$res_video = $fileData['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
					$temp["response_code"] = "0";
					$temp["message"] = $error['error'];
					$temp["status"] = "failure";
					echo json_encode($temp);
				}
			}

			$data['res_name'] = $this->input->post('name');
			$data['res_desc'] = $this->input->post('description');


			if ($this->input->post('website')) {
				$data['res_website'] = $this->input->post('website');
			}
			$data['res_address'] = $this->input->post('address');
			$data['res_phone'] = $this->input->post('phone');
			// $data['res_email'] = $this->input->post('res_email');

			$data['cat_id'] = $this->input->post('cat_id');
			// $data['status'] = $this->input->post('status');

			$data['mfo'] = $this->input->post('otime_mon');

			$address = $this->input->post('address');
			$lat =  0;
			$long = 0;

			$address = str_replace(',,', ',', $address);
			$address = str_replace(', ,', ',', $address);

			$address = str_replace(" ", "+", $address);

			$json = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&key=AIzaSyCqQW9tN814NYD_MdsLIb35HRY65hHomco');
			$json1 = json_decode($json);

			if (isset($json1->results)) {

				$lat = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lat'});
				$long = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lng'});
			}


			// $data['lat'] = $this->input->post('lat');
			// $data['lon'] = $this->input->post('lon');

			$data['lat'] = $lat;
			$data['lon'] = $long;

			$data['vid'] = $this->input->post('vid');

			$data['res_image'] = implode('::::', $res_image);
			$data['res_video'] = $res_video;
			// $data['res_url'] = $this->input->post('res_url');
			// $data['logo'] = implode('::::', $logo);
			$data['logo'] = $logo;
			$data['res_isOpen'] = 'open';
			$data['res_status'] = 'active';

			$data['monday_from'] = $this->input->post('monday_from');
			$data['monday_to'] = $this->input->post('monday_to');
			$data['tuesday_from'] = $this->input->post('tuesday_from');
			$data['tuesday_to'] = $this->input->post('tuesday_to');
			$data['wednesday_from'] = $this->input->post('wednesday_from');
			$data['wednesday_to'] = $this->input->post('wednesday_to');
			$data['thursday_from'] = $this->input->post('thursday_from');
			$data['thursday_to'] = $this->input->post('thursday_to');
			$data['friday_from'] = $this->input->post('friday_from');
			$data['friday_to'] = $this->input->post('friday_to');
			$data['saturday_from'] = $this->input->post('saturday_from');
			$data['saturday_to'] = $this->input->post('saturday_to');
			$data['sunday_from'] = $this->input->post('sunday_from');
			$data['sunday_to'] = $this->input->post('sunday_to');

			// $data['original_price'] = $this->input->post('original_price');
			// $data['bid_closes_in'] = $this->input->post('bid_closes_in');
			// $data['buyout_price'] = $this->input->post('buyout_price');

			$data['res_create_date'] = time();
			// $data['promo_offer']=$this->input->post('promo_offer');

			// if($this->db->insert('restaurants', $data)) 
			// print_r($data);
			// die();
			if ($this->front_model->add_restaurants($data)) {

				$temp["response_code"] = "1";
				$temp["message"] = "success";
				$temp["status"] = "success";
				echo json_encode($temp);
			} else {

				$temp["response_code"] = "0";
				$temp["message"] = "Database Error";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		} else {

			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		}
	}

	public function edit_restaurant()
	{

		if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['address'])) {

			$res_image = array();
			$res_video = "";
			$logo = array();
			$product_image = array();

			$list_image = array();
			$res_id = $this->input->post('res_id');
			$restaurant = $this->front_model->get_restaurant_by_id($res_id);
			// if($_FILES['res_image']['name'][0] !="") {
			if (isset($_FILES['res_image']['name'][0]) && $_FILES['res_image']['name'][0] != "") {
				//echo "image detected";
				if (is_array($_FILES['res_image']['name'])) {
					$filesCount = count($_FILES['res_image']['name']);
					for ($i = 0; $i < $filesCount; $i++) {
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
						if ($this->upload->do_upload('file')) {
							// Uploaded file data
							$fileData = $this->upload->data();
							array_push($product_image, $fileData['file_name']);
							//$res_image = $fileData['file_name'];

						} else {
							$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));

							$temp["response_code"] = "0";
							$temp["message"] = $error['error'];
							$temp["status"] = "failure";
							echo json_encode($temp);
						}
					}

					$image_list = $this->input->post('image_list');
					$url = explode("https://primocysapp.com/business/uploads/", $image_list);

					foreach ($url as $key => $list) {

						$url_li = explode(",", $list);

						foreach ($url_li as $key => $img_list) {
							array_push($product_image, $img_list);
						}
					}
					$result = array_merge($product_image, $list_image);

					foreach ($product_image as $key => $list) {
						if (!empty($list)) {
							array_push($list_image, $list);
						}
					}
					// $data['product_image'] = implode("::::", $list_image);
					$data['res_image'] = implode("::::", $list_image);
				}
			}

			if (!empty($restaurant->res_video)) {
				$res_video = $restaurant->res_video;
			} else {
				$res_video = "";
			}

			// if($_FILES['res_video']['name'] !="") {
			if (isset($_FILES['res_video']['name']) && $_FILES['res_video']['name'] != "") {
				// File upload configuration
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'mp4|mkv';
				$config['file_name'] = uniqid();
				$config['overwrite'] = TRUE;

				// Load and initialize upload library
				$this->load->library('upload');
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('res_video')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$res_video = $fileData['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
					$temp["response_code"] = "0";
					$temp["message"] = $error['error'];
					$temp["status"] = "failure";
					echo json_encode($temp);
				}
			}

			// $address = $this->input->post('address');

			$data['res_name'] = $this->input->post('name');
			$data['res_desc'] = $this->input->post('description');

			if ($this->input->post('website')) {
				$data['res_website'] = $this->input->post('website');
			}
			$data['res_phone'] = $this->input->post('phone');
			// $data['res_email'] = $this->input->post('res_email');

			$data['cat_id'] = $this->input->post('cat_id');
			$data['status'] = $this->input->post('status');

			// $data['mfo'] = $this->input->post('otime_mon');
			$data['res_url'] = $this->input->post('res_url');

			$data['monday_from'] = $this->input->post('monday_from');
			$data['monday_to'] = $this->input->post('monday_to');
			$data['tuesday_from'] = $this->input->post('tuesday_from');
			$data['tuesday_to'] = $this->input->post('tuesday_to');
			$data['wednesday_from'] = $this->input->post('wednesday_from');
			$data['wednesday_to'] = $this->input->post('wednesday_to');
			$data['thursday_from'] = $this->input->post('thursday_from');
			$data['thursday_to'] = $this->input->post('thursday_to');
			$data['friday_from'] = $this->input->post('friday_from');
			$data['friday_to'] = $this->input->post('friday_to');
			$data['saturday_from'] = $this->input->post('saturday_from');
			$data['saturday_to'] = $this->input->post('saturday_to');
			$data['sunday_from'] = $this->input->post('sunday_from');
			$data['sunday_to'] = $this->input->post('sunday_to');

			// $data['original_price'] = $this->input->post('original_price');
			// $data['bid_closes_in'] = $this->input->post('bid_closes_in');
			// $data['buyout_price'] = $this->input->post('buyout_price');

			$address = $this->input->post('address');
			$lat =  0;
			$long = 0;

			$address = str_replace(',,', ',', $address);
			$address = str_replace(', ,', ',', $address);

			$address = str_replace(" ", "+", $address);

			$json = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&key=AIzaSyCqQW9tN814NYD_MdsLIb35HRY65hHomco');
			$json1 = json_decode($json);

			if (isset($json1->results)) {

				$lat = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lat'});
				$long = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lng'});
			}


			// $data['lat'] = $this->input->post('lat');
			// $data['lon'] = $this->input->post('lon');

			$data['lat'] = $lat;
			$data['lon'] = $long;

			$data['vid'] = $this->input->post('vid');
			$res_id = $this->input->post('res_id');
			// $data['promo_offer']=$this->input->post('promo_offer');
			//$data['res_image'] = implode('::::', $res_image);
			$data['res_video'] = $res_video;

			$data['res_isOpen'] = 'open';
			$data['res_status'] = 'active';
			$data['res_address'] = $this->input->post('address');

			$this->db->where('res_id', $res_id);
			if ($this->db->locations('restaurants', $data)) {


				$temp["response_code"] = "1";
				$temp["message"] = "success";
				$temp["status"] = "success";
				echo json_encode($temp);
			} else {

				$temp["response_code"] = "0";
				$temp["message"] = "Database Error";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		} else {

			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		}
	}

	public function vendor_data()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('vid');
		if (empty($id)) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter Data";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {
			$temp = array();
			$profile = array();
			$profile = $this->front_model->get_vendor($id);

			if (!empty($profile)) {

				$user = array();
				$user['uname'] = $profile->uname;
				$user['email'] = $profile->email;
				$user['gender'] = $profile->gender;
				$user['date_of_birth'] = $profile->date_of_birth;

				if (!empty($profile->profile_image)) {
					$url = explode(":", $profile->profile_image);
					if ($url[0] == "https" || $url[0] == "http") {
						$user['profile_image'] = $profile->profile_image;
					} elseif (!empty($profile->profile_image)) {
						$user['profile_image'] = base_url() . "uploads/profile_pics/" . $profile->profile_image;
					} else {
						$user['profile_image'] = $profile->profile_image;
					}
				} else {
					$user['profile_image'] = "";
				}
				$user['device_token'] = $profile->device_token;

				$temp["response_code"] = "1";
				$temp["message"] = "Vendor Found";
				$temp['user'] = $user;
				$temp["status"] = "success";
				echo json_encode($temp);
			}else{
				$temp["response_code"] = "0";
				$temp["message"] = "Not Found";
				$temp["status"] = "failure";
				echo json_encode($temp);
			}
		}
	}

	public function get_v_res()
	{
		$result = array();
		header('Content-Type: application/json');
		$vid = $this->input->post('vid');
		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";
		//$res = $this->db->get_where('restaurants', array('status' => '1'))->result();

		$res = $this->db->query("SELECT * FROM restaurants WHERE vid='$vid'")->result();



		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$querycounta = $this->db->query("SELECT * FROM view_store WHERE store_id = '$resid'");
			$mcounta = $querycounta->num_rows();

			$res[$i]->view_count = $mcounta;

			$res[$i]->all_image = $imgsa;
			$res[$i]->res_image = $imgsb;
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function view_count()
	{
		header('Content-Type: application/json');


		if (!isset($_POST['user_id']) || !isset($_POST['store_id'])) {
			$temp["response_code"] = "0";
			$temp["message"] = "Enter both id";
			$temp["status"] = "failure";
			echo json_encode($temp);
		} else {

			$user_id = $this->input->post('user_id');
			$store_id = $this->input->post('store_id');


			$count = $this->db->get_where('view_store', array('user_id' => $user_id, 'store_id' => $store_id), 1)->num_rows();

			if ($count > 0) {
				$temp["response_code"] = "0";
				$temp["message"] = "Already View";
				$temp["status"] = "failure";
				echo json_encode($temp);
			} else {
				$res = $this->db->get_where('restaurants', array('res_id' => $store_id), 1)->row();

				$user = array(
					'user_id' => $this->input->post('user_id'),
					'store_id' => $this->input->post('store_id'),
					'vid' => $res->vid,
				);

				$locations = $this->db->insert('view_store', $user);
				if ($locations) {
					$temp["response_code"] = "1";
					$temp["message"] = "Added View";
					$temp["status"] = "success";
					echo json_encode($temp);
				} else {
					$temp["response_code"] = "0";
					$temp["message"] = "database error";
					$temp["status"] = "failure";
					echo json_encode($temp);
				}
			}
		}
	}

	public function filter()
	{
		$result = array();
		header('Content-Type: application/json');
		$category = $this->input->post('category');

		//$allcat=implode(',', $category);

		$rating = $this->input->post('rating');

		$ratinga = $rating + 1;

		$result['status'] = 1;
		$result['msg'] = "Restaurnats Found";

		if ($category != "" && $rating != "") {
			$res = $this->db->query("SELECT * FROM restaurants WHERE (res_ratings BETWEEN  '$rating' AND '$ratinga') AND cat_id IN ('" . implode("', '", $category) . "')")->result();
		} elseif ($category != "" && $rating == "") {
			$res = $this->db->query("SELECT * FROM restaurants WHERE cat_id IN ('" . implode("', '", $category) . "')")->result();
		} else {
			$res = $this->db->query("SELECT * FROM restaurants WHERE res_ratings BETWEEN '$rating' AND '$ratinga'")->result();
		}

		for ($i = 0; $i < count($res); $i++) {
			//$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
			$catnm = $this->db->get_where('categories', array('id' => $res[$i]->cat_id), 1)->row();
			$res[$i]->c_name = $catnm->c_name;

			$images = explode("::::", $res[$i]->res_image);
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

			$resid = $res[$i]->res_id;
			$querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
			$mcount = $querycount->num_rows();

			$res[$i]->review_count = $mcount;

			$querycounta = $this->db->query("SELECT * FROM view_store WHERE store_id = '$resid'");
			$mcounta = $querycounta->num_rows();

			$res[$i]->view_count = $mcounta;

			$res[$i]->all_image = $imgsa;
			$res[$i]->res_image = $imgsb;
			$res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
			if ($res[$i]->res_video == "") {
				$res[$i]->res_video = "";
			} else {
				$res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
			}
		}



		$result['restaurants'] = $res;
		//$result['restaurant']->c_name = $catnm->c_name;

		echo json_encode($result);
	}

	public function get_all_banners()
	{
		$result = array();
		header('Content-Type: application/json');

		$res = $this->front_model->get_banners();

		// $res = $this->db->get('banners')->result();
		if (empty($res)) {
			$temp["response_code"] = "0";
			$temp['msg'] = "Banners Not Found";
			echo json_encode($temp);
		} else {
			$imgs = array();
			$imgsa = array();
			foreach ($res as $key => $category) {
				$imgs = base_url('uploads/' . $category->image);

				array_push($imgsa, $imgs);
			}
			$result['status'] = 1;
			$result['msg'] = "Banners Found";
			$result['Banners'] = $imgsa;

			echo json_encode($result);
		}
	}
	
	public function user_notification_listing()
	{
		header('Content-Type: application/json');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_id', "User ID", 'required');


		if ($this->form_validation->run() == TRUE) {


			$user_id = $this->input->post('user_id');

			$notifications = $this->db->order_by("not_id", "desc")->get_where("user_notification", array("user_id" => $user_id))->result();

			if ($notifications) {
				$temp["response_code"] = "1";

				$temp["message"] = "Found";

				$temp["status"] = "success";

				$temp['data'] = $notifications;

				echo json_encode($temp);
			} else {
				$temp["response_code"] = "0";

				$temp["message"] = "Not Found";

				$temp["status"] = "fail";

				echo json_encode($temp);
			}
		} else {
			$temp["response_code"] = "0";

			$temp["message"] = "Missing Field";

			$temp["status"] = "fail";

			echo json_encode($temp);
		}
	}
	
	public function vendor_notification_listing()
	{
		header('Content-Type: application/json');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('v_id', "Vendor ID", 'required');

		if ($this->form_validation->run() == TRUE) {


			$v_id = $this->input->post('v_id');

			$notifications = $this->db->order_by("not_id", "desc")->get_where("vendor_notification", array("v_id" => $v_id))->result();

			if ($notifications) {
				$temp["response_code"] = "1";

				$temp["message"] = "Found";

				$temp["status"] = "success";

				$temp['data'] = $notifications;

				echo json_encode($temp);
			} else {
				$temp["response_code"] = "0";

				$temp["message"] = "Not Found";

				$temp["status"] = "fail";

				echo json_encode($temp);
			}
		} else {
			$temp["response_code"] = "0";

			$temp["message"] = "Missing Field";

			$temp["status"] = "fail";

			echo json_encode($temp);
		}
	}
	public function subscribe_store(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
   //     $this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');


	if ($this->form_validation->run() == FALSE) {
		$status = FALSE;
		$message = validation_errors();
		$subscribe_id=0;
	} else {
		$status = TRUE;
		$this->load->model('admin_model');
		$message =$this->lang->line('success_subscribe');
		try {
	
			$data['description'] = $this->input->post('brand');
		//	$data['address'] = $this->input->post('address');
			$data['category_id'] = $this->input->post('category_id');
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

public function get_sub_and_products($parent_id){
	
	$result = array();
	header('Content-Type: application/json');

	$result['status'] = 1;
	$result['msg'] = "Restaurnats Found";
	$this->db->select('categories.*');
	$this->db->from('categories');
	$this->db->where('parent_id ',$parent_id);
	$query = $this->db->get();
	$res= $query->result();

	$cats_id[]=$parent_id;
	for ($i = 0; $i < count($res); $i++) {
		$cats_id[]=$res[$i]->id;
		$res[$i]->icon = base_url() . 'uploads/' . $res[$i]->icon;
		$res[$i]->img = base_url() . 'uploads/' . $res[$i]->img;
	
	}
	$result['categories'] = $res;

	$offset = ($this->input->get('page')) ? $this->input->get('page') : 1 ;
	$limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10 ;
	$offset_page=($offset - 1)*$limit;
	$region_id=$this->input->get('region_id');
	$location_id=$this->input->get('location_id');
	 $this->db->select('restaurants.*');
	 $this->db->from('restaurants');

	 if (isset($_GET['text'])) {

		$text = $_GET['text'];

		$this->db->like('res_name', $text);

	 }
	 if (!empty($_GET['filter_sub'])) {
	if($_GET['filter_sub']=='offers'){

		$this->db->where('discount >', 0);
		$this->db->where_in('cat_id', $cats_id);
		}else{
			$this->db->where('cat_id', $_GET['filter_sub']);
		}
	

	}else{
		$this->db->where_in('cat_id', $cats_id);
	}
	
	 if(!empty($region_id)){
	   $this->db->where('restaurants.region_id',$region_id);
	 }
	 if(!empty($location_id)){
		$this->db->where('restaurants.location_id',$location_id);
	  }
	 if(!empty($limit)){
		$this->db->limit($limit, $offset_page); 

	  }

   $query = $this->db->get();
   $res=$query->result();

   for ($i = 0; $i < count($res); $i++) {
	   //$res[$i]->res_image = base_url().'uploads/'.$res[$i]->res_image;
	

	   $images = explode("::::", $res[$i]->res_image);
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

	   $res[$i]->res_image = $imgsb;

	   $resid = $res[$i]->res_id;
	   $querycount = $this->db->query("SELECT * FROM reviews WHERE rev_res = '$resid'");
	   $mcount = $querycount->num_rows();

	   $res[$i]->review_count = $mcount;

	   $res[$i]->all_image = $imgsa;
	   $res[$i]->logo = base_url() . 'uploads/' . $res[$i]->logo;
	   if ($res[$i]->res_video == "") {
		   $res[$i]->res_video = "";
	   } else {
		   $res[$i]->res_video = base_url() . 'uploads/' . $res[$i]->res_video;
	   }
   }



   $result['restaurants'] = $res;

	echo json_encode($result);

}
}
