<?php

class Input {

    public $data = array();

    public function __construct()
    {
        foreach($_REQUEST as $key=>$value) {
          $this->data[$key] = $value;
        }

    }

    public function post()
    {
        $tempPost = array();
        foreach ($_POST as $key=>$value) {
            $tempPost[$key] = $value;
        }
        return $tempPost;
    }


    public function get()
    {
        $tempGet = array();
        foreach ($_GET as $key=>$value) {
            $tempGet[$key] = $value;
        }
        return $tempGet;
    }


}