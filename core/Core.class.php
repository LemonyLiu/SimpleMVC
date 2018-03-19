<?php
/**
 * author lemony
 * 请求入口，分发
 */
// include("./request/Router.class.php");
require CORE_PATH.'request/Input.class.php';
require CORE_PATH.'request/Router.class.php';

class core {

    static public $config;
    private $input;
    
    public function __construct()
    {
        $this->input = new Input();
    }

    public function run()
    {
        spl_autoload_register(array($this, 'loadClass'));
        $this->callHook();
    }


    // 主请求方法，主要目的是拆分URL请求 
    public function callHook() {
        if (!empty($this->input->data['url'])) {
            $url = $this->input->data['url'];
            $urlArray = explode("/", $url);
            // 获取控制器名 
            $controllerName = ucfirst(empty($urlArray[0]) ? 'Index' : $urlArray[0]);
            $controller = $controllerName . 'Controller';
            // 获取动作名 
            array_shift($urlArray);
            $action = empty($urlArray[0]) ? 'index' : $urlArray[0];
            //获取URL参数 
            array_shift($urlArray);
            $queryString = empty($urlArray) ? array() : $urlArray;
        }
        // 数据为空的处理 
        $action = empty($action) ? 'index' : $action;
        $queryString = empty($queryString) ? array() : $queryString;
        // 实例化控制器 
        if(!isset($controller)){
            $controllerName=DEFAULT_CONTROLLER;
            $controller = $controllerName . 'Controller';
        }
        $int = new $controller($controllerName, $action);
        // 如果控制器存和动作存在，这调用并传入URL参数 
        if ((int) method_exists($controller, $action)) {
            call_user_func_array(array($int, $action), $queryString);
        } else {
            exit($controller . "控制器不存在");
        }
    }

    //读取基础配置
    static function readBaseConfig($value,$key)
    {
       self::$config[$key] = $value;
    }

    //自动加载控制器和模型类  
    static function loadClass($class) {
        $frameworks = CORE_PATH . $class . EXT;
        $controllers = APP_PATH . 'application/controller/' . $class . EXT;
        $models = APP_PATH . 'application/model/' . $class . EXT;
        $library = APP_PATH.'application/library' . $class . EXT;
        if (file_exists($frameworks)) {
            // 加载框架核心类 
            include $frameworks;
        } elseif (file_exists($controllers)) {
            // 加载应用控制器类 
            include $controllers;
        } elseif (file_exists($models)) {
            //加载应用模型类 
            include $models;
        } elseif (file_exists($library)) {
            include $library;
        } else{
            /* 错误代码 */
        }
    }


}
