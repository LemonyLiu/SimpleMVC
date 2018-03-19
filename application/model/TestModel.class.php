<?php
 
 class TestModel extends Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data = $this->db->query("show tables");
        print_r($data);
    }
 }