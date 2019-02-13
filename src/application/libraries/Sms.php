<?php

use business\ErrorCodes;
use business\Response\Response;

class Sms {

    public $sms = NULL;

    public function __construct() {
        require_once config_item('business-error-codes-class');
        require_once config_item('business-response-class');
    }
    
    public function send_link_purchase_step_sms($phone_country_code, $phone_ddd, $phone_number, $message){        
        //com kaio_api
        $authenticationtoken = $GLOBALS['sistem_config']->AUTENTICATION_TOKEN_SMS;
        $username = $GLOBALS['sistem_config']->USER_NAME_SMS;
        
        $full_number = $phone_country_code.$phone_ddd.$phone_number;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api-messaging.movile.com/v1/send-sms",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          //CURLOPT_POSTFIELDS => "{\"destination\": \"".$full_number."\" ,  \"messageText\": \"Code number\\n".$message."\"}",
          CURLOPT_POSTFIELDS => '{"destination": "'.$full_number.'" ,  "messageText": "'.$message.'"}',
          CURLOPT_HTTPHEADER => array(
            "authenticationtoken: ".$authenticationtoken,
            "username: ".$username,
            "content-type: application/json"
          ),
        ));

        $response_curl = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        $response = [];
        if ($err) {
          //echo "cURL Error #:" . $err;
            $response['success'] = FALSE;
            $response['message'] = $err;
        } else {
            $response['success'] = TRUE;
        }        
        return $response;
    }

}