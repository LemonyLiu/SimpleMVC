<?php

require __DIR__.'/Db.class.php';

class Mysql  implements Db {

    private $instance;

    public function __construct($dbInfo)
    {       
        $host = $dbInfo['host'];
        $user = $dbInfo['user'];
        $password = $dbInfo['password'];
        $port = $dbInfo['port'];
        $database = $dbInfo['database'];
        $this->instance = new mysqli($host, $user, $password, $database, $port);        
    }


    public function query($arg)
    {
        $sql = $arg[0];
        $result = $this->instance->query($sql);
        $temp = array();
        while ($row = $result->fetch_assoc()) {
            array_push($temp,$row);
        }
        $result->free();
        return $temp;
    }

    public function setDb($db)
    {
        $this->instance->select_db($db);
    }

    public function __destruct()
    {
        $this->instance->close();
    }
}