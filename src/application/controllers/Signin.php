<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Response\Response;
use business\Response\ResponseLoginToken;
use business\Client;
use business\ErrorCodes;

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
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

    public function signin_view() {
        $this->load->library('session');
        $this->load->view('signin', $param);
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
        $datas["login_token"] = "OK";

        try {
            // Generate MD5 token 	
            $Client = new Client();
            $Client->load_data_by_login_token($datas["login_token"]);
            $Client->update($Client->Id, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "ok");
        } catch (\Error $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Db_Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }

        return Response::ResponseOK()->toJson();
    }

    //---------------SIGNIN FUNCTIONS-----------------------------
    // Step 1 {
    public function signin_step1() {
        try {


            //$this->load->library('input');
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
            $datas["name"] = "777";
            $datas["email"] = "777@7.7";
            $datas["phone"] = "777 77";
            $datas["password"] = "7777";
            $datas["password-rep"] = "7777";
            $datas["status_id"] = "1";
            $datas["node_id"] = "1";
            $Client = new Client();
            $Client->Insert($datas["email"], $datas["name"], $datas["password"], $datas["status_id"], $datas["node_id"], $datas["phone"]);
        } catch (\Error $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Db_Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }
        // Retur Response   
        return Response::ResponseOK()->toJson();
    }

    // Step 2 
    public function request_secure_code_by_email() {
        try {
            //1. Jose: Generar codigo aqui, copialo de donde lo tenias en el otro sistema
            $verification_code = "77777";
            $client_id = 1; // Cogelo de la seccion o deja un objeto cliente ya cargado en la seccion
            //2. Salvar codigo
            $Client = new Client();
            $Client->load_data($client_id);
            $Client->update($client_id, NULL, NULL, NULL, NULL, NULL, NULL, $verification_code);

            //3. Send code by email
            $this->load->library("gmail");
            $this->gmail->send_link_purchase_step_email($Client->Email, $Client->Name, $verification_code);
        } catch (\Error $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Db_Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }

        return Response::ResponseOK()->toJson();
    }

    public function request_secure_code_by_sms() {
        //implementar aqui el resto
        //retornar success ou error
        echo json_encode($response);
    }

    // Step 3 {
    public function confirm_secure_code() {
        $datas = $this->input->post();
        $datas['verification_code'] = '77777';

        try {
            //1. Check secure code is ok!
            $client_id = 1;
            $Client = new Client();
            $Client->load_data($client_id);
            if ($Client->confirm_secure_code($datas['verification_code'])) {
                //2. Generate MD5 redirection token 	
                $key = $client_id . time();
                $login_token = md5($key);

                //3. Save MD5 to validate login from dashboard
                $Client->update($client_id, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $login_token);
            } else {
                throw ErrorCodes::getException(ErrorCodes::VERIFICATION_CODE_DONOT_MATCH);
            }
        } catch (\Error $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Db_Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), 1)->toJson();
        } catch (\Exception $e) {
            return Response::ResponseFAIL($e->getMessage(), $e->getCode())->toJson();
        }

        $Response = new ResponseLoginToken($login_token);
        return $Response->toJson();
    }

    //---------------SECUNDARY FUNCTIONS-----------------------------
}
