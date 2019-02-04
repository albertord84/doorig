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

    function __construct(int $code = 0, string $message = "") {
      $this->code = $code;
      $this->message = $message;
    }

    public function toJSON() {
      get_instance()->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('code' => $this->code, 'message' => $this->message)));
    }

  }

}
