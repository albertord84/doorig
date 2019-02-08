<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Translation {

    protected $ci;

    function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->model('Translation_model');
    }

    function T($token, $lang) {
        return $this->ci->Translation_model->get_text_by_token($token, $lang);
    }

}

?> 