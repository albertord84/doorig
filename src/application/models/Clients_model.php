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

  function save($name, $email, $password, $status_id = 1, $node_id = 1, $phone = NULL, $verification_code = NULL, $init_date = NULL, $last_access = NULL, $utm_source = NULL, $utm_campain = NULL, $login_token = NULL) {

    $this->name = $name;
    $this->email = $email;
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

  function update($id, $name = NULL, $email = NULL, $password = NULL, $status_id = NULL, $node_id = NULL, $phone = NULL, $verification_code = NULL, $init_date = NULL, $last_access = NULL, $utm_source = NULL, $utm_campain = NULL, $login_token = NULL) {

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
    } catch (Error $e) {
      if ($this->db->error()['code'] != 0) {
        throw new Db_Exception($this->db->error(), $e);
      } else {
        throw $e;
      }
    }
  }

  function get_by_id($id) {

    $this->db->where('id', $id);

    $query = $this->db->get('clients');



    return $query->row();
  }

  function get_by_email(string $email) {

    $this->db->where('email', $email);

    $query = $this->db->get('clients');



    return $query->row();
  }

  function get_all() {

    $this->db->select('*')->from('clients');

    //$this->db->order_by('<field>', '<type>'); ==> asc/desc

    $query = $this->db->get();



    return $query->result();
  }

}
?>

