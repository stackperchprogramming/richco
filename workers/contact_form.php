<?php

/* 
 * Copyright (C) 2020 Laptop
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include(__DIR__  . '/../classes/Database.php');//get DB connection

//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST)){//usual check
    
    $to_email = "admin@richcopropertysolutions.com"; 
	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		
		$output = json_encode(array( //create JSON data
			'type'=>1, 
			'msg' => 'Sorry Request must be Ajax POST'
		));
		die($output); //exit script outputting json data
    } 
//Sanitize input data using PHP filter_var().
    
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
        $user_name  = $name;
	$user_email = $email;
	$subject =    filter_var("RichCo Property Solutions contact Form", FILTER_SANITIZE_STRING);
	
	//email body
	$message_body = "name: ".$user_name."\r\n\r\nEmail : ".$user_email."\r\n\r\nSubject :".$subject;
        $message_body .= "\r\n\r\n Contact Number:\r\n".$phone;
        $message_body .= "\r\n\r\nCompany name:\r\n".$company;
        $message_body .= "\r\n\r\Message:\r\n".$message;

        // In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message_body, 70, "\r\n");
	
	// send email
	//$send_mail = mail($to, $subject, $message);
	
	// compose headers
	$headers = "From: $to_email\r\n";
	$headers .= "Reply-To: $user_email\r\n";
	$headers .= "X-Mailer: PHP/".phpversion();
	
	$send_mail = mail('rahaprogramming@gmail.com', $subject, $message_body, $headers);
	
    if($send_mail)
    {
        die(print(json_encode(array('error'=> 0, 'msg' => "<p class='alert alert-info'>Thank you. We'll be in touch shortly!</p>"))));
    }else{
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>Error... Unable to send message. The site administrator has been notified.</p>"))));
    }
    
}
?>