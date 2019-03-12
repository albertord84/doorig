<?php

namespace business\Response {

    require_once config_item('business-response-class');

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ResponseArrayObject extends Response {

        public $code = 0;
        public $message = "";
        public $array_object;

        function __construct(array $array_object, int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->array_object = $array_object;
            $this->output_array += array('array_object' => $array_object);
        }

        public function toJson() {
            get_instance()->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($this->output_array));
        }

    }

}
