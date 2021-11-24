<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('appSettings'))
{
function appSettings($key)
{

    $CI =&get_instance();
    $settings =$CI->db->get_where("settings", array("name" => $key))->row();
    return @$settings->value;

 }


}

if (!function_exists('types'))
{

function types(){
  $CI =&get_instance();
  $type[1]=$CI->lang->line('for_sale');
  $type[2]=$CI->lang->line('for_rent');
  $type['']=$CI->lang->line('sale_or_rent');
   return $type;
  }
}
if (!function_exists('rooms'))
{

function rooms(){

  $room[1]='01';
  $room[2]='02';
  $room[3]='03';
  $room[4]='04';
  $room[5]='05';
  $room[6]='06';
  $room[7]='07';
  $room[8]='08';
  $room[9]='09';
  $room[10]='10';
  $room[11]='11';
   return $room;
  }
}
if (!function_exists('count_category'))
{

function count_category($category_id){
  $CI =&get_instance();

  $query = $CI->db->get_where('restaurants', array('cat_id' => $category_id));
		 return count($query->result());
  
  }
}

if (!function_exists('min_price'))
{

function min_price(){
  $CI =&get_instance();

  $CI->db->select_min('discount');
  $CI->db->limit(1); 
  $query = $CI->db->get('restaurants');
  return $query->result()[0]->discount;
  
  }
}


if (!function_exists('max_price'))
{

function max_price(){
  $CI =&get_instance();
  $CI->db->select_max('discount');
  $CI->db->limit(1); 
  $query = $CI->db->get('restaurants');
  return $query->result()[0]->discount;
  
  }
}
if (!function_exists('countby_agent'))
{
function countby_agent($vid){
  $CI =&get_instance();
  $query = $CI->db->get_where('restaurants', array('vid' => $vid));
  return count($query->result());
  }
}


if (!function_exists('count_types'))
{
function count_types($type){
  $CI =&get_instance();
  $query = $CI->db->get_where('restaurants', array('type' => $type));
  return count($query->result());
  }
}


if (!function_exists('key_type'))
{
function key_type($key){
  $CI =&get_instance();
  $type[1]=$CI->lang->line('for_sale');
  $type[2]=$CI->lang->line('for_rent');
  $type[0]=$CI->lang->line('sale_or_rent');
   return $type[$key];
  }
}

if (!function_exists('vendore_type'))
{
function vendore_type($type){
  $CI =&get_instance();
  $vendore_type[0]=$CI->lang->line('private_owner');
  $vendore_type[1]=$CI->lang->line('freelancer');
  $vendore_type[2]=$CI->lang->line('compound_developer');
  $vendore_type[3]=$CI->lang->line('exclusive');
   return $vendore_type[$type];
  }
}

if (!function_exists('get_vendore_type'))
{
function get_vendore_type(){
  $CI =&get_instance();
  $vendore_type[0]=$CI->lang->line('private_owner');
  $vendore_type[1]=$CI->lang->line('freelancer');
  $vendore_type[2]=$CI->lang->line('compound_developer');
  $vendore_type[3]=$CI->lang->line('exclusive');
   return $vendore_type;
  }
}

if (!function_exists('advertiser_type'))
{

function advertiser_type(){
  $CI =&get_instance();
  $vendore_type[0]=$CI->lang->line('private_owner');
  $vendore_type[1]=$CI->lang->line('freelancer');
  $vendore_type[2]=$CI->lang->line('compound_developer');
  $vendore_type[3]=$CI->lang->line('exclusive');
   return $vendore_type;
  }
}
if (!function_exists('advertiser_type_value'))
{

function advertiser_type_value($value){
  $CI =&get_instance();
  $vendore_type[0]=$CI->lang->line('private_owner');
  $vendore_type[1]=$CI->lang->line('freelancer');
  $vendore_type[2]=$CI->lang->line('compound_developer');
  $vendore_type[3]=$CI->lang->line('exclusive');
   return $vendore_type[$value];
  }
}
if (!function_exists('payment_method'))
{

function payment_method(){
  $CI =&get_instance();
  $type[1]=$CI->lang->line('installment');
  $type[2]=$CI->lang->line('cash');
  $type[3]=$CI->lang->line('installment_or_cash');
   return $type;
  }
}
if (!function_exists('payment_method_value'))
{

function payment_method_value($value){
  $CI =&get_instance();
  $type['']=$CI->lang->line('installment_or_cash');
  $type[1]=$CI->lang->line('installment');
  $type[2]=$CI->lang->line('cash');
  $type[3]=$CI->lang->line('installment_or_cash');
   return $type[$value];
  }
}

if (!function_exists('getallsub'))
{
function getallsub($listing,$name='')
{
   
     $html='';
    if(count($listing->shildren)){
        $name.='>'.$listing->c_name;
      //  $html.= " <option value=".$listing->id.">". $listing->c_name."</option>";
      foreach($listing->shildren as $row){
       
        if(count($row->shildren)){
            $name.='>'.$listing->c_name;
           // $html.= " <option value=".$row->id.">". $name."</option>";
           $html.= getallsub($row, $name);
          // die($html);
        }else{
            if(@$row->id){
                $name.='>'.$row->c_name;
            $html.= " <option value=".$row->id.">". $name."</option>";
            $name='';
            }
        }
       }
      } else {
          if(@$listing->id){
            $name.='>'.$listing->c_name;
            $html.= " <option value=".$listing->id.">". $name."</option>";
            $name='';
          }
      

       }
       echo  $html;
 }
}
