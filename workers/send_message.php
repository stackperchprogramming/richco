<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if($_POST['message']){
    
    $sender = filter_var($_POST['sender_email'], FILTER_VALIDATE_EMAIL);
    $reciever = filter_var($_POST['reciever_email'], FILTER_VALIDATE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
    //$date = date('Y-m-d H:i:s');
    $jsDateTS = strtotime($date);
    if ($jsDateTS !== false) 
    {
       $date = date('Y-m-d H:i:s', $jsDateTS );
       $date_success = true;
    }
    else{
        $date = date('Y-m-d H:i:s');
        $date_success = false;
   }

    if($database->send_message($sender, $reciever, $message, $date))
    {
        die(print(json_encode(['error'=> 0, 'msg' => "<p class='alert alert-info'>Success. $date_success</p>"])));
    }
    else
    {
        die(print(json_encode(['error'=> 1, 'msg' => "<p class='alert alert-info'>Error: ".$database->printMsg()."</p>"])));
    }
}
