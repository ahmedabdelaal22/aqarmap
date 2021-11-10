<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
		parent::__construct();
  		$this->load->helper('url');
  	 	$this->load->model('front_model');
		   $this->load->model('admin_model');
        $this->load->library('session');
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
        // if($this->session->userdata('UserId')=="")
		// {
		// 	redirect(base_url('user/login'));
		// }
    }	 
	public function index()
	{
		$data['page'] = 'welcome';
		$this->load->view('user/template', $data);
		
	}
}
