<?php

/**
 * 请求的处理的核心
 */

require CORE_PATH.'request/Response.class.php';
require CORE_PATH.'request/Load.class.php';

class Request {    

    public $response;
    public $input;
    public $load;
    private static $instance;

    public function __construct()
    {
        self::$instance =& $this;
        $this->input = new Input();
        $this->response = new Response();
        $this->load = new Load();
    }

    public static function &get_instance()
    {
        return self::$instance;
    }


}