<?php

class Load {

    public function model($model,$alis='model')
    {
        Request::get_instance()->model = new $model();
    }

    public function library($library)
    {
        Request::get_instance()->$library = new $library();
    }

    public function database($db='default')
    {
        request::get_instance()->db = new Connect($db);
    }
}