<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['id'])){//usual check
    $id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
    $id = intval($id);
    if($database->remove_user($id)){
        $admin_array = [
        'error'=> 0,
        'users'=> $database->get_all_users(),
        'msg' => "<p class='alert alert-info'>Successfully Removed User.</p>",
        ];
        die(print(json_encode($admin_array)));
    }else{
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>".$database->printMsg()."</p>"))));
    }    
}