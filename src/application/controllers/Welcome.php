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
        require_once config_item('business-visitor-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-array-object-class');
    }
        
    public function index() {
        $utms = $this->input->get('utms');
        $this->load->library('session');
        $this->session->set_userdata('utms', $utms);
        $param['SCRIPT_VERSION'] = $GLOBALS['sistem_config']->SCRIPT_VERSION;
        $param["footer"] = $this->load->view('footer', '', true);
        $param["modals"] = $this->load->view('modals', '', true);
        $this->load->view('user_views/home', $param);
    }

    public function faqs_view() {
        $param['SCRIPT_VERSION'] = $GLOBALS['sistem_config']->SCRIPT_VERSION;
        $param["footer"] = $this->load->view('footer', '', true);
        $param["modals"] = $this->load->view('modals', '', true);
        $this->load->view('user_views/faq', $param);
    }

    public function subscription() {
        $datas = $this->input->post();
        try {
            Visitor::new_subscription($datas['subscription_email']);
        } catch (Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }
        Response::ResponseOK(T("Subscrição realizada com sucesso."))->toJson();
    }

    public function contact_us() {
        $datas = $this->input->post();
        try {
            Visitor::send_contact_us($datas["email"], $datas["username"], $datas["message"], $datas["company"], $datas["phone"]);
        } catch (Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }
        Response::ResponseOK(T("Mensagem enviada com sucesso."))->toJson();
    }

    public function get_doorig_info() {
        $datas = $this->input->post();
        $client_id = $datas["client_id"];
        $Client = new Client();
        $Client->load_data($client_id);
        unset($Client->Password);
        unset($Client->Login_token);
        unset($Client->Node);
        unset($Client->Proxy_id);
        unset($Client->Verification_code);
        $array_object = object_to_array($Client);
        $Response = new ResponseArrayObject($array_object, 0, "Doorig Client Info!");
        $Response->toJson();
    }

}
