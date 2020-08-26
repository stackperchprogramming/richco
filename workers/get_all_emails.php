<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST)){//usual check
    $emails_data = $database->get_all_emails();
    for($i = 0;$i < count($emails_data);$i++){
        $email_pass = $emails_data[$i]['password'];
        $emails_data[$i]['password'] = '*hidden*';
        for($j = 0; $j < count($emails_data[$i]); $j++){
            if($emails_data[$i][$j] === $email_pass){
                $emails_data[$i][$j] = '*hidden*';
            }
        }
        $email_pass = null;//probably redundant but better safe than sorry
    }
    die(print(json_encode($emails_data)));
}