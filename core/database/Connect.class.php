<?php

require __DIR__.'/Mysql.class.php';
require __DIR__.'/Pgsql.class.php';

class Connect {

    static public $database;
    private $conn;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->getConnect();
    }

    static public function readDbConfig($database)
    {
        self::$database = $database;
    }

    public function getConnect()
    {
        $dbInfo = self::$database[$this->db];

        $dirver = $dbInfo['dirver'];

        $this->conn = new $dirver($dbInfo);
    }

    public function __call($method,$arg){
        $data = $this->conn->$method($arg);
        return $data;
    }

}