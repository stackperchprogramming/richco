<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['id'])){//usual check
    if($_SESSION['type'] === 'admin'){
        $id = filter_var($_POST['id'], FILTER_SANITIZE_EMAIL);
        $database->mark_work_order_seen($id);
        $admin_array = [
        'error'=> 0,
        'all_work_orders'=>$database->get_all_work_orders(),
        'msg' => "<p class='alert alert-info'>Successfully retrieved work orders.</p>",
        ];
        die(print(json_encode($admin_array)));
    }
}
?>