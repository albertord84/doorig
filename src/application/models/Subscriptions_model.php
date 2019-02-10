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
        $data['email'] = $email;
        try {
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

}
