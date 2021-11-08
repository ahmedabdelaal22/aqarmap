<?php
class Admin_model extends CI_model
{


	public function login_user($email, $pass)
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email', $email);
		$this->db->where('password', $pass);

		if ($query = $this->db->get()) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	public function get_discount_res()
	{
		$this->db->select('restaurants.*');
		$this->db->from('restaurants');
	
		$this->db->order_by("res_id", "desc");
		$this->db->limit(6);
		$query = $this->db->get();
	return $query->result_array();	
	}
	public function get_admin($id)
	{
		$query = $this->db->get_where('admin', array('id' => $id));
		return $query->row_array();
	}

	public function password_check($password, $id)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('password', $password);
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_users()
	{
		$this->db->select('user.*');
		$this->db->from('user');
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		return $query->result();
	}

	public function get_total_users()
	{
		return $this->db->get('user')->num_rows();
	}

	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('user', array('id' => $id));
		return $query->row();
	}

	public function update_user_by_id($cat_id, $data)
	{
		$res = $this->db->update('user', $data, ['id' => $cat_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}

	public function get_vendor()
	{
		$this->db->select('vendor.*');
		$this->db->from('vendor');
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		return $query->result();
	}
	public function get_all_notifications(){
		$this->db->select('notifications.*');
		$this->db->from('notifications');
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		return $query->result();
	}
	public function get_all_newslater(){
		$this->db->select('subscribe_email.*');
		$this->db->from('subscribe_email');
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		return $query->result();
	}
	public function get_all_cat_with_child()
	{
	
		$this->db->select('categories.*');
		$this->db->from('categories');
		$this->db->where('parent_id ',0);
		$query = $this->db->get();
		$res= $query->result();

		for ($i = 0; $i < count($res); $i++) {
			$res[$i]->icon = base_url() . 'uploads/' . $res[$i]->icon;
			$res[$i]->img = base_url() . 'uploads/' . $res[$i]->img;
			$res[$i]->shildren =$this->nested2ul($res[$i]->id);
		}



	 return $res;
	// die;
	
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

	public function add_vendor($data)
	{
		$this->load->helper('url');

		return $this->db->insert('vendor', $data);
	}
	public function add_contact($data){
		return $this->db->insert('contact_us', $data);
	}

	public function add_subscribe($data){
		return $this->db->insert('subscribe_resturant', $data);
	}
	public function add_mail($data){
		return $this->db->insert('subscribe_email', $data);
	}
	public function get_vendor_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->where("id", $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function update_vendor_by_id($cat_id, $data)
	{
		$res = $this->db->update('vendor', $data, ['id' => $cat_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}
	public function update_locations_by_id($location_id, $data)
	{
		$res = $this->db->update('locations', $data, ['id' => $location_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}
	
	public function get_cat_details($cat_id)
	{
		return $this->db->get_where('categories', array('id' => $cat_id))->row();
	}

	public function get_total_category()
	{
		return $this->db->get('categories')->num_rows();
	}

	public function get_category()
	{
		$this->db->select('categories.*');
		$this->db->from('categories');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_categoryop()
	{
		$this->db->select('categories.*');
		$this->db->from('categories');

		$query = $this->db->get();
		return $query->result();
	}
	public function get_regions(){
		$this->db->select('regions.*');
		$this->db->from('regions');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_category()
	{
		$this->db->select('categories.*');
		$this->db->from('categories');
		$this->db->where("parent_id",'0');
		$query = $this->db->get();
		return $query->result();
	}

	
	public function get_all_location(){
		$this->db->select('l.*,r.name_ar as region_name');
		$this->db->from('locations as l');
		$this->db->join('regions as r', 'r.id = l.region_id', 'left');
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_all_contacts()
	{
		$this->db->select('contact_us.*');
		$this->db->from('contact_us');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_requeststore(){
		$this->db->select('R.*,p.c_name as rest_name');
		$this->db->from('subscribe_resturant as R');
		$this->db->join('categories as p', 'p.id = R.category_id', 'left');
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_all_sup_category()
	{
		$this->db->select('c.* , p.c_name as parent_name');
		$this->db->from('categories as c');

		$this->db->join('categories as p', 'c.id = p.parent_id', 'left');
		$this->db->order_by("c.id", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	// , 
	// c1.parent_id, c1.sort_order FROM " . DB_PREFIX . "category_path
	//  cp LEFT JOIN " . DB_PREFIX . "category c1 ON (cp.category_id = c1.category_id)
	public function add_category($data)
	{
		$this->load->helper('url');

		return $this->db->insert('categories', $data);
	}

	public function get_category_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where("id", $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function update_category_by_id($cat_id, $data)
	{
		$res = $this->db->update('categories', $data, ['id' => $cat_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}

	public function get_total_restaurants()
	{
		return $this->db->get('restaurants')->num_rows();
	}

	public function get_restaurants()
	{
		$this->db->select('restaurants.*');
		$this->db->from('restaurants');
		$this->db->order_by("res_id", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	public function add_restaurants($data)
	{
		$this->load->helper('url');

		return $this->db->insert('restaurants', $data);
	}
	public function add_regions($data){
		$this->load->helper('url');

		return $this->db->insert('regions', $data);
	}
	public function add_locations($data){
		$this->load->helper('url');

		return $this->db->insert('locations', $data);
	}
	
	public function add_offers($data)
	{
		$this->load->helper('url');

		return $this->db->insert('offers', $data);
	}
	

	public function get_restaurants_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('restaurants');
		$this->db->where("res_id", $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function get_offers_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('offers');
		$this->db->where("id", $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function get_regions_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('regions');
		$this->db->where("id", $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function get_locations_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('locations');
		$this->db->where("id", $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function get_location_by_region($region_id)
	{
		$this->db->select('*');
		$this->db->from('locations');
		$this->db->where("region_id", $region_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function update_offers_by_id($id, $data)
	{
		$res = $this->db->update('offers', $data, ['id' => $id]);
		if ($res == 1)
			return true;
		else
			return false;
	}
	public function update_regions_by_id($id, $data)
	{
		$res = $this->db->update('regions', $data, ['id' => $id]);
		if ($res == 1)
			return true;
		else
			return false;
	}
	
	public function update_restaurants_by_id($res_id, $data)
	{
		$res = $this->db->update('restaurants', $data, ['res_id' => $res_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}
	
	public function get_like($id)
	{
		$this->db->select('likes.*,user.*');
		$this->db->from('likes');
		$this->db->join('user', 'user.id = likes.user_id');
		$this->db->where('res_id', $id);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_total_reviews()
	{
		return $this->db->get('reviews')->num_rows();
	}

	public function get_review($id)
	{
		$this->db->select('reviews.*');
		$this->db->from('reviews');
		$this->db->where('rev_res', $id);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_count_review($id)
	{
		$this->db->select('reviews.*');
		$this->db->from('reviews');
		$this->db->where('rev_res', $id);

		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_allreview()
	{
		$this->db->select('reviews.*');
		$this->db->from('reviews');
		$this->db->order_by("reviews.rev_id", "desc");
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_new_users()
	{
		$this->db->select('user.*');
		$this->db->from('user');
		$this->db->order_by("id", "desc");
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_banners()
	{
		$this->db->select('banners.*');
		$this->db->from('banners');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_bannerlimit()
	{
		$this->db->select('banners.*');
		$this->db->from('banners');
		$this->db->limit(2);
		$this->db->order_by('id', 'RANDOM');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_last7_notfication(){
		$this->db->select('notifications.*');
		$this->db->from('notifications');
		$this->db->limit(7);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_all_offers(){
		$this->db->select('offers.*,restaurants.res_name');
		$this->db->from('offers');
		$this->db->join('restaurants', 'restaurants.res_id = offers.restaurant_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_all_regions(){
		$this->db->select('regions.*');
		$this->db->from('regions');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_best_keywords(){
		$this->db->select('keywords.*');
		$this->db->from('keywords');
		$this->db->order_by("views", "desc");
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();

	}
	public function get_best_categories(){
		$this->db->select('categories.*');
		$this->db->from('categories');
		$this->db->order_by("views", "desc");
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();

	}
	public function get_sub_category($parent_id){
		$this->db->select('categories.*');
		$this->db->from('categories');
		$this->db->order_by("views", "desc");
		$this->db->where("parent_id", $parent_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function add_banners($data)
	{
		$this->load->helper('url');

		return $this->db->insert('banners', $data);
	}
	public function insert_token($data){

		$this->db->select('*');
		$this->db->from('tokens');
		
		$this->db->where("device_id", $data['device_id']);
		$query = $this->db->get();
		if ($query->num_rows()) {
			$this->db->set('device_token', $data['device_token']);
          $this->db->where('device_id', $data['device_id']);
            $this->db->update('tokens');
			return true;
		} else {
	
			return $this->db->insert('tokens', $data);
		//	return true;
		}
	}

	public function get_banners_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('banners');
		$this->db->where("id", $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function update_banners_by_id($cat_id, $data)
	{
		$res = $this->db->update('banners', $data, ['id' => $cat_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}
	
	public function get_profile($id)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		return $query->row_array();
	}

	public function set_profile($id,$img_name)
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'img' => $img_name
		);
		
		$this->db->where('id', $id);
		return $this->db->update('admin', $data);
	}

	public function change_pass($npassword,$id)
	{
		$this->load->helper('url');

		$data = array(
			'password' => $npassword
		);
		
		$this->db->where('id', $id);
		return $this->db->update('admin', $data);
	}

	public function delete_category($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('categories');
	}

	public function delete_vendor($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('vendor');
	}
	
	public function set_user($id,$res_image)
    {
      $this->load->helper('url');
       
       if($res_image == "")
       {
       $data = array(
         'email' => $this->input->post('email'),
         'name' => $this->input->post('name')
      );
       }
       else
       {
      $data = array(
         'email' => $this->input->post('email'),
         'name' => $this->input->post('name'),
         'img' => $res_image
      );
       }
      $this->db->where('id', $id);
      return $this->db->update('admin', $data);
    }


}
