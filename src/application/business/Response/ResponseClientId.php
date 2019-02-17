<?php

namespace business\Response {

    require_once config_item('business-response-class');

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ResponseClientId extends Response {

        public $code = 0;
        public $message = "";
        public $ClientId;

        function __construct(int $ClientId, int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->ClientId = $ClientId;
            $this->output_array += array('ClientId' => $ClientId);
        }

        public function toJson() {
            get_instance()->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($this->output_array));
        }

    }

}
