<?php

namespace business {

  require_once getcwd() . '/application/business/Business.php';
  require_once getcwd() . '/application/business/OwnException.php';
  //require_once config_item('business-user-class');

  /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an Client business class.
   * 
   */
  class Client extends Business {

    /**
     * 
     * @access public
     * @var type
     *  
     */
    public $Proxy_id;
    public $Name;
    public $Email;
    public $Password;
    public $Status_id;
    public $Node_id;
    public $Phone;
    public $Verification_code;
    public $Init_date;
    public $Last_access;
    public $Utm_source;
    public $Utm_campain;
    public $Login_token;

    /**
     * 
     * @todo Class constructor.
     * 
     */
    function __construct() {
      parent::__construct();

      $ci = &get_instance();
      $ci->load->model('Clients_model');
    }

    /**
     * Get client data
     * @param int $client_id
     * @return DataSet  
     */
    public function load_data(int $id) {
      $ci = &get_instance();
      $data = $ci->Clients_model->get_by_id($id);

      $this->fill_data($data);
    }

    /**
     * Get client data
     * @param int $client_id
     * @return DataSet  
     */
    public function load_data_by_email(string $email) {
      $ci = &get_instance();
      $data = $ci->Clients_model->get_by_email($email);

      $this->fill_data($data);
    }

    private function fill_data(\stdClass $data) {
      $this->Name = $data->name;
      $this->Email = $data->email;
      $this->Password = $data->password;
      $this->Status_id = $data->status_id;
      $this->Node_id = $data->node_id;
      $this->Phone = $data->phone;
      $this->Verification_code = $data->verification_code;
      $this->Init_date = $data->init_date;
      $this->Last_access = $data->last_access;
      $this->Utm_source = $data->utm_source;
      $this->Utm_campain = $data->utm_campain;
      $this->Login_token = $data->login_token;
    }

    /**
     * 
     * @todo
     * @param type
     * @return
     * 
     */
    public function set_client_status($id = NULL, $status_id = NULL) {
      $ci = &get_instance();
      try {
        $id = $id ? $id : $this->id;
        $status_id = $status_id ? $status_id : $this->status_id;
        $result = $ci->Clients_model->update($id, NULL, NULL, NULL, $status_id);
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /**
     * 
     * @return type
     */
    public function get_clients() {
      $ci = &get_instance();
      return $ci->Clients_model->get_all();
    }

    function check_pass($password) {
      if ($this->Password === $password) {
        return TRUE;
      }
      return FALSE;
    }

  }

}
?>
