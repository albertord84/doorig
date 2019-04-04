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

  function get_clients_by_filter (string $token, string $init_date, string $end_date, int $status) {     
    $sql = null;
    if (!empty($token)) $sql = "(clients.name LIKE '%$token%' OR clients.email LIKE '%$token%')";
    
    $wh = ($sql == null) ? "clients.status_id=%d" : "AND clients.status_id='%d'";    
    if ($status != -1) {
      $wh = sprintf($wh, $status);
      $sql = sprintf("%s %s", $sql, $wh);
    }
      
    if (!empty($init_date) && !empty($end_date)) {
      $wh = ($sql == null) ? "clients.last_access >= '%s' AND clients.last_access <= '%s'" 
                           : "AND clients.last_access >= '%s' AND clients.last_access <= '%s'";
      $wh = sprintf($wh, $init_date, $end_date);
      $sql = sprintf("%s %s", $sql, $wh);
    }
    if (!empty($init_date) && empty($end_date)) {
      $wh = ($sql == null) ? "clients.last_access >= '%s'" : "AND clients.last_access >= '%s'";
      $wh = sprintf($wh, $init_date);
      $sql = sprintf("%s %s", $sql, $wh);
    }
    else if (empty($init_date) && !empty($end_date)) {
      $wh = ($sql == null) ? "clients.last_access <= '%s'" : "AND clients.last_access <= '%s'";
      $wh = sprintf($wh, $end_date);
      $sql = sprintf("%s %s", $sql, $wh);
    } 
    $this->db->select('clients.name, '
                      .'clients.email, '
                      .'client_status.name as status, '
                      .'nodes.description as node,'
                      .'phone,'
                      .'last_access');
    $this->db->from('clients');
    $this->db->join('client_status', 'client_status.id = clients.status_id');   
    $this->db->join('nodes', 'nodes.id = clients.node_id');
    $this->db->where($sql); 
    
    $query = $this->db->get(); 
    return $query->result();
  }
  
}
?>

