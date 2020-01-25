<?php

//General settings
//ini_set('display_errors',1);
//error_reporting(E_ALL);	
//error_reporting(E_ALL & ~E_STRICT);

session_start();


define("ROOT", dirname(__FILE__));
include_once(ROOT . '/components/Autoload.php');
include(ROOT . 'functions.php');


$router = new Router();
$router -> run();


?>