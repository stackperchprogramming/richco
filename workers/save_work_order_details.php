<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
if(file_exists(__DIR__  . '/../../../../wp-load.php')){require_once(__DIR__  . '/../../../../wp-load.php');}
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['id'])){//usual check
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $details = filter_var($_POST['details'],FILTER_SANITIZE_STRING);
    $comments = filter_var($_POST['comments'],FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'],FILTER_SANITIZE_STRING);
    $todo_array = filter_var($_POST['todo_array'],FILTER_SANITIZE_STRING);

    if ($database->save_work_order_details($id, $details, $comments, $status, $todo_array))
    {
       $final_array = [
            'error'=>0,
            'msg'=>'<p class="alert alert-info">'.$database->printMsg().'</p>',
        ];        
    }else{
        $final_array = [
            'error'=>1,
            'msg'=>'<p class="alert alert-danger">'.$database->printMsg().'</p>',
        ];   
    }

    die(print json_encode($final_array) );
}