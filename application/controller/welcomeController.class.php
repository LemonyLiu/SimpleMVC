<?php

class WelcomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->model("TestModel");
        $this->model->index();
        $this->response->view("index.php",["msg"=>'hello iphp']);

    }

}