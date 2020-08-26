<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
if(file_exists(__DIR__  . '/../../../../wp-load.php')){require_once(__DIR__  . '/../../../../wp-load.php');}
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['id'])){//usual check
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    
    $database->remove_work_order($id);
   
    $final_array = [
        'msg'=>$database->printMsg(),
    ];
    die(print json_encode($final_array) );
}