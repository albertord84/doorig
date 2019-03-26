<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\Response\Response;
use business\Response\ResponseArrayObject;
use business\Visitor;

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-visitor-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-array-object-class');
    }
    
    public function index() {
        $this->load->library('session');
        $param['SCRIPT_VERSION'] = $GLOBALS['sistem_config']->SCRIPT_VERSION;
        $param["footer_admin"] = $this->load->view('admin_views/footer_admin', '', true);
        $param["modals"] = $this->load->view('modals', '', true);
        $this->load->view('admin_views/login', $param);
    }
        
    public function nodes() {
        //is_admin();
        $this->load->library('session');
        $param['SCRIPT_VERSION'] = $GLOBALS['sistem_config']->SCRIPT_VERSION;
        $param["footer_admin"] = $this->load->view('admin_views/footer_admin', '', true);
        $param["modals"] = $this->load->view('modals', '', true);
        $this->load->view('admin_views/nodes', $param);
    }
    
    public function clients() {
        //is_admin();
        $this->load->library('session');
        $param['SCRIPT_VERSION'] = $GLOBALS['sistem_config']->SCRIPT_VERSION;
        $param["footer_admin"] = $this->load->view('admin_views/footer_admin', '', true);
        $param["modals"] = $this->load->view('modals', '', true);
        $this->load->view('admin_views/clients', $param);
    }
    
    
    

    
}
