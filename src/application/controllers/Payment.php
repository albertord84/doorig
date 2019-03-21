<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\Response\Response;
use business\Response\ResponseArrayObject;
use business\Visitor;

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
    }

    public function index() {
        echo 'OK';
    }

    public function vindi_notification_post() {
        $datas = $this->input->post();
        //$post_str = urldecode($_POST['post_str']);
        //$post = urldecode($post_str);
        //$post = json_decode($post);
        $post = 'Alberto Test: Thanks GOD!!!';
        // Write the contents back to the file
        $path = __dir__ . '/../../../logs/vindi/';
        $file = $path . "vindi_notif_post-" . date("d-m-Y") . ".log";
        $result = file_put_contents($file, "\n\n", FILE_APPEND);
        $result = file_put_contents($file, serialize($post), FILE_APPEND);
        try {
            
        } catch (Exception $e) {
            //Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
            echo 'FAIL';
        }
        //Response::ResponseOK(T("Subscrição realizada com sucesso."))->toJson();
        echo 'OK';
    }

}
