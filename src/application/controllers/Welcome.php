<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Response\Response;
use business\Client;
use business\Visitor;

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-visitor-class');
        require_once config_item('business-response-class');
    }

    public function index() {
        $this->load->library('session');
        //$GLOBALS['language'] = $param['language'];
        $param['SCRIPT_VERSION'] = $GLOBALS['sistem_config']->SCRIPT_VERSION;
        $param["footer"] = $this->load->view('footer', '', true);
        $param["modals"] = $this->load->view('modals', '', true);
        $this->load->view('home', $param);
    }

    public function faqs_view() {
        $param["footer"] = $this->load->view('footer', '', true);
        $param["modals"] = $this->load->view('modals', '', true);
        $this->load->view('faq', $param);
    }

    public function subscription() {
        $datas = $this->input->post();
//        $datas['subscription_email'] = "albertord84@gmail.com";
        try {
            Visitor::new_subscription($datas['subscription_email']);
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }
        Response::ResponseOK(T("Subscrição realizada com sucesso."))->toJson();
    }

    public function contact_us() {
        $datas = $this->input->post();
        try {
            Visitor::send_contact_us($datas["email"], $datas["username"], $datas["message"], $datas["company"], $datas["phone"]);
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }
        Response::ResponseOK(T("Mensagem enviada com sucesso."))->toJson();
    }

    public function test_gmail() {
        $this->load->library('email');
        $this->email->to($to);
        $this->load->library('gmail');
        $this->gmail->send_test_email('albertord84@gmail.com');
    }

}
