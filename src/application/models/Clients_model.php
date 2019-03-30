<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**

 * @category CodeIgniter-Model: clients_Model

 * 

 * @access public

 * @todo <description>

 * 

 */
class Clients_model extends CI_Model {

  function construct() {
    parent::construct();
  }

  function save($email, $name, $password, $status_id = 1, $node_id = 1, $phone = NULL, $verification_code = NULL, $init_date = NULL, $last_access = NULL, $utm_source = NULL, $utm_campain = NULL, $login_token = NULL) {
    $this->email = $email;
    $this->name = $name;
    $this->password = $password;
    $this->status_id = $status_id;
    $this->node_id = $node_id;
    $this->phone = $phone;
    $this->verification_code = $verification_code;
    $this->init_date = $init_date;
    $this->last_access = $last_access;
    $this->utm_source = $utm_source;
    $this->utm_campain = $utm_campain;
    $this->login_token = $login_token;

    try {
      $this->db->insert('clients', $this);
    } catch (\Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new \Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
    return $this->db->insert_id();
  }

  function remove($id) {
    $this->db->delete('clients', array('id' => $id));
  }

  function update($id, $email = NULL, $name = NULL, $password = NULL, $status_id = NULL, $node_id = NULL, $phone = NULL, $verification_code = NULL, $init_date = NULL, $last_access = NULL, $utm_source = NULL, $utm_campain = NULL, $login_token = NULL) {
    if ($name)
      $this->name = $name;
    if ($email)
      $this->email = $email;
    if ($password)
      $this->password = $password;
    if ($status_id)
      $this->status_id = $status_id;
    if ($node_id)
      $this->node_id = $node_id;
    if ($phone)
      $this->phone = $phone;
    if ($verification_code)
      $this->verification_code = $verification_code;
    if ($init_date)
      $this->init_date = $init_date;
    if ($last_access)
      $this->last_access = $last_access;
    if ($utm_source)
      $this->utm_source = $utm_source;
    if ($utm_campain)
      $this->utm_campain = $utm_campain;
    if ($login_token)
      $this->login_token = $login_token;

    try {
      $this->db->update('clients', $this, array('id' => $id));
    } catch (\Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new \Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
    return $id;
  }

  function get_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('clients');

    return $query->row();
  }

  function get_by_email(string $email) {
    $this->db->where('email', $email);
    $query = $this->db->get('clients');

    return $query->last_row();
  }

  function get_by_login_token(string $login_token) {
    $this->db->where('login_token', $login_token);
    $query = $this->db->get('clients');

    return $query->last_row();
  }

  function get_all() {
    $this->db->select('*')->from('clients');
    //$this->db->order_by('<field>', '<type>'); ==> asc/desc
    $query = $this->db->get();

    return $query->result();
  }

  function get_clients_by_filter (string $token, string $init_date, string $last_date, int $status) {
    // 1. Prepare the sql filter
    $field = array('name' => $token, 'email' => $token);
    
    // 2. Inject the sql filter
    if (!empty($token)) $this->db->or_like($field);
    if ($status != -1) $this->db->or_where('status_id', $status);
    if (!empty($init_date) && !empty($last_date)) {
      $wh = sprintf("last_access >= '%s' AND last_access <= '%s'", $init_date, $last_date);
      $this->db->or_where($wh);
    }
    if (!empty($init_date) && empty($last_date)) {
      $this->db->or_where('last_access >=', $init_date);
    }
    else if (empty($init_date) && !empty($last_date)) {
      $this->db->or_where('last_access <=', $last_date);
    } 
      
    //3. Run filter
    $query = $this->db->get('clients');
    return $query->result();
  }
  
}
?>

