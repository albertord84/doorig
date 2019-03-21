<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\Response\Response;
use business\Response\ResponseArrayObject;
use business\Visitor;

class Welcome extends CI_Controller {

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
        var_dump($datas);
        try {
            
        } catch (Exception $e) {
            //Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
            echo 'FAIL';
        }
        //Response::ResponseOK(T("Subscrição realizada com sucesso."))->toJson();
        echo 'OK';
    }

}
