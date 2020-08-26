<?php if(session_status() == PHP_SESSION_NONE){ session_start(); }
/*******************************************************************************
@Author - Ralph Harris 2/13/2020
config file containing all classes/loading files
*******************************************************************************/

//debug
ini_set('display_errors', 1);//display errors true
ini_set('display_startup_errors', 1);//display startup errors
error_reporting(E_ALL);//show all errors

//required classes/wordpress functions
require_once( __DIR__ . "/../../../wp-load.php");//load wordpress functions etc
require_once(__DIR__  . '/classes/Database.php');//get DB connection

//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class