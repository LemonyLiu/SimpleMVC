<?php

define("CORE_PATH", __DIR__."/");  //
define("APP_PATH", dirname($_SERVER['SCRIPT_FILENAME']).'/');
define("DEFAULT_CONTROLLER","welcome");

define("EXT", '.class.php'); 

include_once(APP_PATH."config/config.php");
include_once(CORE_PATH."Core.class.php");
require APP_PATH.'application/config/database.php';
require CORE_PATH.'request/Request.class.php';
require CORE_PATH.'/database/Connect.class.php';

Connect::readDbConfig($db);

core::readBaseConfig($test,'test');

$App = new core();

$App->run();

