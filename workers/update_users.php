<?php 
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['userTblData'])){
    // gotta use strip slashes (2 hours of my life..)
    $data = stripcslashes($_POST['userTblData']);

    // decode the JSON array
    $data = json_decode($data,TRUE);
    $success = true;//hold success 
    //iterate date
    for ($i = 0; $i < count($data); $i++) {
        if(!$database->update_users($data[$i]['name'], $data[$i]['email'], $data[$i]['address'], $data[$i]['company'], $data[$i]['password'], $data[$i]['phone'], $data[$i]['role'], $data[$i]['id']) ){
            $success = false; //if we update at least 1 row it's a success!
        }
    }
    //show message
    if($success){
        die(print "<p class='alert alert-success'>Success!</p>");
    }else{
        die(print "<p class='alert alert-danger'>Error updating user info.. error... Support has been notified</p>");
    }
}else{
    print 'no post for update_users';
}

?>