<?php

namespace business {

    /**
     * @category Business Class
     * 
     * @access public
     *
     * @todo Define business base class.
     * 
     */
    abstract class Business {

        public function __construct() {
            $ci = &get_instance();
            $this->CI = $ci;
        }

        public function TEST($param) {
            
        }

    }

}
