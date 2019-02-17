<?php

namespace business {

    require_once config_item('business-class');
    require_once config_item('business-error-codes-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class Visitor extends Business {

        /**
         * 
         * @todo Class constructor.
         * 
         */
        function __construct() {
            parent::__construct();

            $ci = &get_instance();
        }

        /**
         * 
         * @param string $email
         * @throws Exception
         */
        static function new_subscription(string $email) {
            try {
                $ci = &get_instance();
                $ci->load->model("Subscriptions_model");
                $ci->Subscriptions_model->save($email);
                return TRUE;
            } catch (\Db_Exception $exc) {
                // TODO: Tratar codigo para responder respuesta personalizada
                if ($exc->getCode() == 0) {
                    throw new \Db_Exception($this->db->error(), $e);
                } else {
                    throw $exc;
                }
            } catch (\Exception $exc) {
                throw $exc;
            }
            return FALSE;
        }

        /**
         * 
         * @param string $email
         * @throws Exception
         */
        static function send_contact_us($useremail, $username, $message, $company = NULL, $phone = NULL) {
            try {
                $ci = &get_instance();
                $ci->load->library("gmail");
                $ci->gmail->send_contact_us($useremail, $username, $message, $company, $phone);
                return TRUE;
            } catch (\Exception $exc) {
                throw $e;
            }
            return FALSE;
        }

    }

}
?>
