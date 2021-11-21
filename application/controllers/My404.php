<?php defined('BASEPATH') OR exit('No direct script access allowed');
class My404 extends CI_Controller{
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
       
        $data['page'] = 'err404';
        $this->load->view('user/template',$data);

    }



}
