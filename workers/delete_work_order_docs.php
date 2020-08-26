<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
if(file_exists(__DIR__  . '/../../../../wp-load.php')){require_once(__DIR__  . '/../../../../wp-load.php');}
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['folder'])){//usual check
    $folder = filter_var($_POST['folder'],FILTER_SANITIZE_STRING);
    $dir = __DIR__.'/..'. $folder;
    
    // Use unlink() function to delete a file  
    if (!unlink($dir)) {  
        $msg = ("$dir cannot be deleted due to an error");  
    }  
    else {  
        $msg = ("$dir has been deleted");  
    }  
       
    $final_array = [
        'msg'=>$msg,
    ];
    die(print json_encode($final_array) );
}