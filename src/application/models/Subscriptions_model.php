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
class Subscriptions_model extends CI_Model {

    function __construct() {
        parent::__construct();

        require_once config_item('db-exception-class');
    }

    public function save($email) {
        try {
            $data['email'] = $email;
            $data['date'] = time();
            return $this->db->insert('subscriptions', $data);
        } catch (\Error $e) {
            if ($this->db->error()['code'] != 0) {
                throw new \Db_Exception($this->db->error(), $e);
            } else {
                throw $e;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function exist(string $email) {
        try {
            $this->db->select('*');
            $this->db->from('subscriptions');
            $this->db->where('subscriptions.email', $email);
            $result = $this->db->get()->row_array();
            return count($result) ? TRUE : FALSE;
        } catch (\Exception $exc) {
            //echo $exc->getTraceAsString();
        }

        return FALSE;
    }

}
