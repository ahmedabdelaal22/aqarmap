<?php 

class Firebase_model extends CI_Model {

    private $api_key = "AAAApSF3i1o:APA91bGq371gHxLcGywcwn6-Dmf2ub9nbHwtI58qIkWSUfgGezAWlUhO4Itfy2ZDLH23aLkdblq2WUdmOq70H3Sm334poIek4u0Z-bpkfoJarDCH3luDklghp6OS16G5FySAlHg3-_mn";
    private $url = 'https://fcm.googleapis.com/fcm/send';

    public function save_user_notification($user_id, $title, $message)
    {
        
        $user_notification = array(
            "user_id" => $user_id,
            // "deal_id" => $deal_id,
            "title" => $title,
            "message" => $message,
            "date" => date("Y-m-d H:i:s")
        );

        $this->db->insert("user_notification", $user_notification);
    }
    public function save_notification( $title, $message)
    {
        
        $user_notification = array(

            "title" => $title,
            "message" => $message,
    
        );

        $this->db->insert("notifications", $user_notification);
    }
    public function save_vendor_notification($v_id, $title, $message)
    {
        
        $vendor_notification = array(
            "v_id" => $v_id,
            // "deal_id" => $deal_id,
            "title" => $title,
            "message" => $message,
            "date" => date("Y-m-d H:i:s")
        );

        $this->db->insert("vendor_notification", $vendor_notification);
    }

    public function send_device_notification($token, $title, $message)
    {
    
       
        $result = $this->send_notification($title, $message, $token);
        return $result;
    }
    public function send_user_notification($user_id, $title, $message)
    {
        $user = $this->db->get_where("user", array("id" => $user_id))->row();
        
        if(!$user ) {
            return "NO USER";
        }

        $fire_keys = explode("::::", $user->device_token);
        foreach ($fire_keys as $key => $fire_key) {
            $tokens[] = $fire_key;
        }

        $result = $this->send_notification($title, $message, $tokens);
        return $result;
    }

    public function send_vendor_notification($user_id, $title, $message)
    {
        $user = $this->db->get_where("vendor", array("id" => $user_id))->row();
        if(!$user ) {
            return "NO USER";
        }

        $fire_keys = explode("::::", $user->device_token);
        foreach ($fire_keys as $key => $fire_key) {
            $tokens[] = $fire_key;
        }

        $result = $this->send_notification($title, $message, $tokens);
        return $result;
    }

    public function send_notification($title, $message, $tokens)
    {
		$custom_object=array();
		$data=array(
                "title" => $title,
                "body" => $message
            );
			
		$newdata=array_merge($data, $custom_object);
        
   //      $fields = array(
   //          'registration_ids' => $tokens,
            
   //          'notification' => array(
   //              "title" => $title,
                
   //              "body" => $message
   //          ),
			
			// "data" => $newdata,

   //          "sound" => "Default",
   //          "priority" => "high",
   //          "content_available" => FALSE
   //      );

        $fields = array(
            'registration_ids' => array ($tokens),
            'priority' => "high",
            'data'=>$newdata ,
            'notification' => array('title' => $title, 'body' => $message ,'sound'=>'Default'),
        );

        $fields  = json_encode($fields);

        $headers = array(
            'Authorization: key=' .$this->api_key,
            'Content-Type: application/json'
        );

        $ch      = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
    
        curl_close($ch);
   // print_r($result);die;
        return $result;
    }

}

?>