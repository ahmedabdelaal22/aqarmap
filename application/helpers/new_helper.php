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

  $type[1]='للبيع';
  $type[2]='للإيجار';
   return $type;
  }
}

if (!function_exists('advertiser_type'))
{

function advertiser_type(){

  $type[1]='وسيط';
  $type[2]='مالك العقار';
   return $type;
  }
}
if (!function_exists('advertiser_type_value'))
{

function advertiser_type_value($value){

  $type[1]='وسيط';
  $type[2]='مالك العقار';
   return $type[$value];
  }
}
if (!function_exists('payment_method'))
{

function payment_method(){

  $type[1]='تقسيط';
  $type[2]='النقدية';
  $type[3]=' تقسيط اوالنقدية';
   return $type;
  }
}
if (!function_exists('payment_method_value'))
{

function payment_method_value($value){

  $type[1]='تقسيط';
  $type[2]='النقدية';
  $type[3]=' تقسيط اوالنقدية';
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
//  function getCategories($categories, $parent = 0,$name='')
//  {
//      $html = "";
//     //print_r($categories);die;
//      foreach($categories as $cat)
//      {
//          if($cat->parent_id == $parent)
//          {
//              $current_id = $cat->id;
//                $name.='>'.$cat->c_name;
//               $data= getCategories($categories, $current_id,$name);
//                if(empty($data)){
//                 $html.= " <option value=".$cat->id.">". $name."</option>";
//                }
            
//             $html .=  $data;

          
//          }
//      }
   
//      return  $html;
//  }



}
