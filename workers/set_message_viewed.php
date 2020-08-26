<?php


include(__DIR__  . '/../classes/Database.php');//get DB connection

//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['id'])){//usual check
    $id= filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);   
    if($database->set_message_to_viewed($id)){
        $admin_array = [
        'error'=> 0,
        'msg'=> "<p class='alert alert-info'>Error: ".$database->printMsg()."</p>",
        ];
    }else{
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>Error: ".$database->printMsg()."</p>"))));
    }
}