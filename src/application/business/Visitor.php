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
                if ($exc->getCode() == 0) {
                    throw new \Db_Exception($this->db->error(), $e);
                } else {
                    throw $e;
                }
            } catch (\Exception $exc) {
                throw $e;
            }
            return FALSE;
        }

    }

}
?>
