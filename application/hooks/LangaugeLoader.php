<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageLoader
{
   function initialize() {
       die('test');
       $ci =& get_instance();
       $ci->load->helper('language');
       $siteLang = $ci->session->userdata('site_lang');
       if ($siteLang) {
           $ci->lang->load('content',$siteLang);
       } else {
           $ci->lang->load('content','english');
       }
   }
}