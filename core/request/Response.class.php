<?php

class Response {

    public function view($page, $data)
    {
        extract($data);
        if(file_exists(APP_PATH . 'application/view/'.$page)){
          include(APP_PATH . 'application/view/'.$page);
        }
    }
}