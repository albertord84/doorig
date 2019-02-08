<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Response\Response;
use business\Client;

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
    }

    public function index() {
        $this->load->library('session');

        $param['SCRIPT_VERSION'] = $GLOBALS['sistem_config']->SCRIPT_VERSION;
        $GLOBALS['language'] = $param['language'];
        $param["footer"] = $this->load->view('footer', '', true);
        $this->load->view('home', $param);
    }

    public function faqs_view() {
        $param["footer"] = $this->load->view('footer', '', true);
        $this->load->view('faq', $param);
    }

    public function message() {
//        $this->is_ip_hacker();
//        $this->load->model('class/system_config');
//        $GLOBALS['sistem_config'] = $this->system_config->load();
//        $this->load->library('Gmail');
//        $language = $this->input->get();
//        if(isset($language['language']))
//            $param['language'] = $language['language'];
//        else
//            $param['language'] = $GLOBALS['sistem_config']->LANGUAGE;
//        $param['SERVER_NAME'] = $GLOBALS['sistem_config']->SERVER_NAME;
//        $GLOBALS['language'] = $param['language'];
//        $datas = $this->input->post();
//        $result = $this->gmail->send_client_contact_form($datas['name'], $datas['email'], $datas['message'], $datas['company'], $datas['telf']);
//        if ($result['success']) {
//            $result['message'] = $this->T('Mensagem enviada, agradecemos seu contato', array(), $GLOBALS['language']);
//        }
//        echo json_encode($result);

        $datas = $this->input->post();
        $result['success'] = true;
        $result['message'] = "Mensagem enviada, agradecemos seu contato"; //$this->T('Mensagem enviada, agradecemos seu contato', array(), $GLOBALS['language']);
        echo json_encode($result);
    }

    public function subscription() {
//        $this->is_ip_hacker();
//        $this->load->model('class/system_config');
//        $GLOBALS['sistem_config'] = $this->system_config->load();
//        $this->load->library('Gmail');
//        $language = $this->input->get();
//        if (isset($language['language']))
//            $param['language'] = $language['language'];
//        else
//            $param['language'] = $GLOBALS['sistem_config']->LANGUAGE;
//        $param['SERVER_NAME'] = $GLOBALS['sistem_config']->SERVER_NAME;
//        $GLOBALS['language'] = $param['language'];
//        $datas = $this->input->post();
//        //TODO: insert email in database

        $datas = $this->input->post();
        $datas['email'] = 'josergm86@gmail.com';
        
        
        //TODO: insert email in database
        try {
            $this->load->model("Subscriptions_model");
            $this->Subscriptions_model->save($datas['email']);
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }

        Response::ResponseOK();
    }

    public function contact_us() {
        $datas = $this->input->post();
        $datas["email"] = "josergm86@gmail.com";
        $datas["username"] = "77 77";
        $datas["message"] = "7 7 7 7";
        $datas["company"] = "7777";
        $datas["phone"] = "7 777";



        try {
            $this->load->library("gmail");
            $this->gmail->send_contact_us($datas["email"], $datas["username"], $datas["message"], $datas["company"], $datas["phone"]);
        } catch (\Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }

        Response::ResponseOK()->toJson();
    }

    public function test_gmail() {
        $this->load->library('email');
        $this->email->to($to);
        $this->load->library('gmail');
        $this->gmail->send_test_email('albertord84@gmail.com');
    }

}
