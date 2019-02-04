<?php

namespace business\Response {

  /**
   * Description of Response
   *
   * @author albertord
   */
  class Response {

    public $code = 0;
    public $message = "";

    function __construct() {
      $this->ci = &get_instance();
    }

    public function toJSON() {
      $this->ci->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array('code' => $this->code, 'message' => $this->message)));
    }

  }

}
