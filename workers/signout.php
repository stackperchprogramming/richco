<?php

require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
$data = $database->logout();
die(print(json_encode($data)));