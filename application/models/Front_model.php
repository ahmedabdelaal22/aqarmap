<?php

class Front_model extends CI_Model
{
	public function email_check($email)
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	
	public function facebook_id_check($facebook_id)
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('facebook_id', $facebook_id);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         return false;
      } else {
         return true;
      }
    }

	public function get_restaurant_by_id($res_id)
	{
		return $this->db->get_where('restaurants', array('res_id' => $res_id), 1)->row();
	}

	public function username_check($username)
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function register_user($user)
	{

		return $this->db->insert('vendor', $user);
	}

	public function likeCheck($user_id, $res_id)
	{
		$result = $this->db->get_where('likes', array('user_id' => $user_id, 'res_id' => $res_id));
		if ($result->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	public function likeCheckfront($user_id, $res_id)
	{

		$result = $this->db->get_where('likes', array('user_id' => $user_id, 'res_id' => $res_id));
		if ($result->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
		// return 1;
	}
	public function login_user($email, $pass)
	{
		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->where("(vendor.email ='$email' OR vendor.uname ='$email')");
		$this->db->where("password", $pass);

		if ($query = $this->db->get()) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	
	public function vendor_email_check($email)
   {
      $this->db->select('*');
      $this->db->from('vendor');
      $this->db->where('email', $email);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         return false;
      } else {
         return true;
      }
   }
   
    public function vendor_facebook_id_check($facebook_id)
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->where('facebook_id', $facebook_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

   public function register_vendor($user)
   {
      $res = $this->db->insert('vendor', $user);
      $insert_id = $this->db->insert_id();
      if ($res == 1)
         return $insert_id;
      else
         return false;
   }

	public function login_vendor($email, $pass)
	{

		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->where('email', $email);
		//$this->db->or_where('uname',$email);
		$this->db->where('password', $pass);

		if ($query = $this->db->get()) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function get_user($id)
	{
		$query = $this->db->get_where('user', array('id' => $id), 1);
		return $query->row();
	}

	public function get_vendor($id)
	{
		$query = $this->db->get_where('vendor', array('id' => $id), 1);
		return $query->row();
	}

	public function get_res_by_id($id)
	{
		$query = $this->db->get_where('restaurants', array('res_id' => $id), 1);
		return $query->row();
	}

	public function get_res($id)
	{
		$query = $this->db->get_where('reviews', array('rev_user' => $id));
		return $query->result();
	}

	public function get_rev_by_id_res($res_id)
	{
		$query = $this->db->get_where('reviews', array('rev_res' => $res_id));
		return $query->result();
	}
	public function get_rev_by_id_res_count($res_id)
	{
		$query = $this->db->get_where('reviews', array('rev_res' => $res_id));
		$test=count($query->result());
	return $test;
	}
	public function get_count_agents(){
		$query = $this->db->query('SELECT * FROM vendor');
		
	return $query->num_rows();
	}


	public function get_agents($limit, $start){


		if(@$_GET['type']){
			$this->db->where('type',$_GET['type'] );
		}
			$this->db->limit($limit, $start);
			$query = $this->db->get('vendor');
	
			return $query->result();
		
	}
	public function get_rev_by_id_user($id)
	{
		$query = $this->db->get_where('user', array('id' => $id), 1);
		return $query->row();
	}

	public function get_res_reviews($res_id)
	{
		return $this->db->get_where('reviews', array('rev_res' => $res_id))->result();
	}

	public function password_check($password, $id)
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('password', $password);
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function change_pass($npassword, $id)
	{
		$this->load->helper('url');

		$data = array(
			'password' => $npassword
		);

		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function unlike($res_id, $user_id)
	{
		$this->db->where('res_id', $res_id);
		$this->db->where('user_id', $user_id);
		return $this->db->delete('likes');
	}

	public function get_banners()
	{
		$this->db->select('image','banners_name');
		$this->db->from('banners');
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit(10);
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function add_restaurants($data)
    {
      $this->load->helper('url');

      return $this->db->insert('restaurants', $data);
    }
}
