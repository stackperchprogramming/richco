<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection

//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST)){//usual check
    $data = $database->get_all_users();
    die(print(json_encode($data)));
}