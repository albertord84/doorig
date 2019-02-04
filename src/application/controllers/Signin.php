<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

class Signin extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // TODO: Preguntar a Carlos
    //require_once config_item('business-reponse-class');
    require_once getcwd() . '/application/business/Response/Response.php';
  }

  public function signin_view() {
    $this->load->library('session');

    $this->load->view('signin');
  }

  public function signin_step1() {
    //$this->load->library('input');
    $datas = $this->input->post("name");
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
    $this->load->model('Clients_model');
    $client_id = $this->Clients_model->save($datas["name"], $datas["email"], $datas["password"], $datas["status_id"], $datas["node_id"], $datas["phone"]);

    // Retur Response   
    $reponse = $client_id? new business\Response\Response(0, "Steep 1 OK") : new business\Response\Response(1, "Error inserting client");
    return $reponse->toJson();
  }

  public function request_secure_code_by_email() {
    //implementar aqui el resto
    //retornar success ou error
    echo json_encode($response);
  }

  public function request_secure_code_by_sms() {
    //implementar aqui el resto
    //retornar success ou error
    echo json_encode($response);
  }

  public function confirm_secure_code() {
    $datas = $this->input->post();
    //implementar aqui el resto		

    $this->redirect_to_dasboard();
  }

  //---------------SECUNDARY FUNCTIONS-----------------------------
}
