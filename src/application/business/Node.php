<?php

namespace business {

    require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-error-codes-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class Node extends Business {

        public $Name;
        public $Description;
        public $IP;
        public $URL;
        private $Client; // Client Reference

        /**
         * 
         * @todo Class constructor.
         * 
         */
        function __construct(Client &$client) {
            parent::__construct();

            $this->CI->load->model("Nodes_model");

            $this->Client = $client;
        }

        /**
         * 
         * @throws Exception
         */
        public function load_data() {
            $data = $this->CI->Nodes_model->get_by_id($this->Client->Node_id);
            if ($data == null) {
                throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
            $this->fill_data($data);
        }

        private function fill_data(\stdClass $data = NULL) {
            if ($data) {
                $this->Name = $data->name;
                $this->Description = $data->description;
                $this->IP = $data->IP;
                $this->URL = $data->URL;
            } else {
                //throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
        }

    }

}
?>