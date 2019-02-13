<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Response\Response;
use business\Response\ResponseLoginToken;
use business\Client;
use business\ErrorCodes;
use business\ClientStatus;

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-client-status-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-login-token-class');
    }

    //----------LOGIN FUNCTIONS--------------------------
    public function login_view() {
        $param["footer"] = $this->load->view('footer', '', true);
        $this->load->view('login', $param);
    }

    public function pass_reset() {
        $this->load->view('pass-reset');
    }

    public function password_recovery() {
        $datas = $this->input->post();
        //enviar email a $datas["email"] con link para vista de trocar senha	
    }

    public function do_login() {
        try {
            $datas = $this->input->post();
            $datas["email"] = "777@7.7";
            $datas["password"] = "7777";

            //1. Login client
            $Client = new Client();
            $Client = Client::do_login($datas["email"], $datas["password"]);

            //2. Generate MD5 redirection token 	
            $key = $Client->Id . time();
            $login_token = md5($key);

            //3. Save MD5 to validate login from dashboard
            $Client->update($client_id, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $login_token);
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }

        $Response = new ResponseLoginToken($login_token);
        return $Response->toJson();
    }

    public function dashboard_confirm_login_token() {
        $datas = $this->input->post();

        try {
            // Generate MD5 token 	
            $Client = new Client();
            $Client->load_data_by_login_token($datas["login_token"]);
            $Client->update($Client->Id, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "ok");
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }

        return Response::ResponseOK()->toJson();
    }

    //---------------SIGNIN FUNCTIONS-----------------------------    
    public function signin_view() {
        $this->load->library('session');
        $param["footer"] = $this->load->view('footer', '', true);
        $this->load->view('signin', $param);
    }
    
    // Step 1 {
    public function signin_step1() {
        try {
            $datas = $this->input->post();
            //1. Validate Signin Data
            //$this->load->library('form_validation');
            //$this->form_validation->set_rules();
            //$this->form_validation->set_rules('name', 'Name', 'required');
            //$this->form_validation->set_rules('email', 'Email', 'required');
            //$this->form_validation->set_rules('phone', 'Phone', 'required');
            //$this->form_validation->set_rules('password', 'Password', 'required');
            //$this->form_validation->set_rules('password-rep', 'Password Confirmation', 'required');
            //if ($this->form_validation->run() == FALSE) {
            // Returnd erros
            // $this->form_validation->validation_errors();
            //echo json_encode($response);
            //return;
            //}
            //2. Save Signin Data
            $datas["status_id"] = ClientStatus::BEGINNER;
            $datas["node_id"] = "1";
            $Client = new Client();
            $client_id = $Client->Insert($datas["email"], $datas["name"], $datas["password"], $datas["status_id"], $datas["node_id"], $datas["phone"]);
            $this->session->set_userdata('client_id', $client_id);            
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }
        // Retur Response   
        return Response::ResponseOK()->toJson();
    }

    // Step 2.1
    public function request_secure_code_by_email() {
        try {
            if($this->session->userdata('client_id')){
                $verification_code = mt_rand(1000, 9999);
                $client_id = $this->session->userdata('client_id');

                //2. Salvar codigo
                $Client = new Client();
                $Client->load_data($client_id);
                $Client->update($client_id, NULL, NULL, NULL, NULL, NULL, NULL, $verification_code);

                //3. Send code by email
                $this->load->library("gmail");
                $this->gmail->send_link_purchase_step_email($Client->Email, $Client->Name, $verification_code);                
            }else{
                return Response::ResponseFAIL(T("Violação de acesso"))->toJson();
            }
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }

        return Response::ResponseOK()->toJson();
    }
    
    // Step 2.2
    public function request_secure_code_by_sms() {
        try {
            if($this->session->userdata('client_id')){
                $verification_code = mt_rand(1000, 9999);
                $client_id = $this->session->userdata('client_id');
                //2. Salvar codigo
                $Client = new Client();
                $Client->load_data($client_id);
                $Client->update($client_id, NULL, NULL, NULL, NULL, NULL, NULL, $verification_code);

                //3. Send code by email
                $tlf = $Client->Phone;
                $this->load->library("sms");
                $phone_country_code="+55";                
                $phone_ddd = substr($tlf,1,2);                
                $phone_number = substr($tlf,5);
                $phone_number = str_replace("-","",$phone_number);                
                $message_code = T("Para validar sua conta use o codigo ").$verification_code;
                $this->sms->send_link_purchase_step_sms($phone_country_code,$phone_ddd,$phone_number, $message_code);                
            }else{
                return Response::ResponseFAIL(T("Violação de acesso"))->toJson();
            }
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }

        return Response::ResponseOK()->toJson();
    }

    // Step 3 {
    public function confirm_secure_code() {
        $datas = $this->input->post();
        try {
            //1. Check secure code is ok!
            $client_id = $this->session->userdata('client_id');
            $Client = new Client();
            $Client->load_data($client_id);
            if ($Client->confirm_secure_code($datas['verification_code'])) {
                //2. Generate MD5 redirection token 	
                $key = $client_id . time();
                $login_token = md5($key);

                //3. Save MD5 to validate login from dashboard
                $Client->update($client_id, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $login_token);
                
                //4. Load node url of client
                
            } else {
                throw ErrorCodes::getException(ErrorCodes::VERIFICATION_CODE_DONOT_MATCH);
            }
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }

        $Response = new ResponseLoginToken($login_token);
        return $Response->toJson();
    }

    //---------------SECUNDARY FUNCTIONS-----------------------------
}
