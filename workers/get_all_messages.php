<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
$data = $database->get_all_messages();
die(print(json_encode($data)));
