<?php 
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST)){
    // gotta use strip slashes (2 hours of my life..)
    $data = stripcslashes($_POST['emailTblData']);

    // decode the JSON array
    $data = json_decode($data,TRUE);

	/*
	db attributes are:
	id, name, price, description, type, quantity, par, salvage_cost, salvage_date, views, pic
	*/
    $success = true;//hold success 
    //iterate date
    for ($i = 0; $i < count($data); $i++) {
        if(!$database->update_emails($data[$i]['id'],$data[$i]['password'])){//try to update
            $success = false; //if we update at least 1 row it's a success!
        }
    }
    //show message
    if($success){
        die("<p class='alert alert-success'>Successfully updated password. Please allow up to 1 hour for the new password to update.</p>");
    }else{
        die("<p class='alert alert-danger'>Error updating password.. error message: ".$database->printmsg()."</p>");
    }
}

?>