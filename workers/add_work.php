<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['id'])){//usual check
    $id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
    $details = filter_var($_POST['details'],FILTER_SANITIZE_STRING);
    $comments = filter_var($_POST['comments'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
    $timestamp = filter_var($_POST['timestamp'], FILTER_SANITIZE_STRING);
    $folder = '/docs/' . $timestamp;
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
   if($_SESSION['type'] === 'admin'){$viewed = 1;}else{$viewed = 0;}
   if($database->add_work_order($id, $email, $details, $comments, $date, $folder, $viewed)){
        $admin_array = [
        'error'=> 0,
        'all_work_orders'=>$database->get_work_orders($email),
        'date_success'=>$date_success,
        'msg' => "<p class='alert alert-info'>Successfully Created work order.</p>",
        ];
        die(print(json_encode($admin_array)));
    }else{
        $admin_array = [
        'error'=> 1,
        'msg' => "<p class='alert alert-danger'>".$database->printMsg()."</p>",
        ];
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>".$database->printMsg()."</p>"))));
    }    
    die(print(json_encode($admin_array)));
}