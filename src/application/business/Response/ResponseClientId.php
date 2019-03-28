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
        public $NewClient;

        function __construct(int $ClientId, bool $NewClient = false, int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->ClientId = $ClientId;
            $this->NewClient = $NewClient;
            $this->output_array += array('ClientId' => $ClientId);
            $this->output_array += array('NewClient' => $NewClient);
        }

        public function toJson() {
            get_instance()->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($this->output_array));
        }

    }

}
