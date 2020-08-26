<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['email'])){//usual check
    if($_SESSION['type'] !== 'admin'){
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $admin_array = [
        'error'=> 0,
        'all_work_orders'=>$database->get_work_orders($email),
        'msg' => "<p class='alert alert-info'>Successfully retrieved work orders.</p>",
        ];
    }else{
        $admin_array = [
        'error'=> 0,
        'all_work_orders'=>$database->get_all_work_orders(),
        'msg' => "<p class='alert alert-info'>Successfully retrieved work orders.</p>",
        ];
    }
        die(print(json_encode($admin_array)));
}
?>