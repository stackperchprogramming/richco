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
if(isset($_POST['email'])){//usual check
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if($database->login($email, $pass)){
        //get user info
        if(isset($_SESSION['type'])){
            $type = $_SESSION['type'];
            $name = $_SESSION['name'];
            $id = $_SESSION['id'];
            $pic = $_SESSION['pic'];
            $phone = $_SESSION['phone'];
            $email = $_SESSION['email'];
            $address = $_SESSION['address'];
            $company = $_SESSION['company'];
            $date = $_SESSION['reg_date'];
        }else{
            $type = '';
            $name = '';
            $pic = '';
            $id = '';
            $phone = '';
            $email = '';
            $address = '';
            $company = '';
            $date = '';
        }
        $admin_array = [
            'error'=> 0,
            'type'=> $type,
            'name'=> $name,
            'id'=> $id,
            'pic'=> $pic,
            'phone'=> $phone,
            'email'=> $email,
            'address'=> $address,
            'company'=> $company,
            'reg_date'=> $date,
            'emails'=>$database->get_all_emails(),
            'users'=>$database->get_all_users(),
            'messages'=>$database->get_all_messages(),
            'all_work_orders'=>$database->get_all_work_orders(),
            'add_email_url'=>'../wp-content/themes/richco/workers/add_email.php',
            'add_user_url'=>'../wp-content/themes/richco/workers/add_user.php',
            'get_email_url'=>'../wp-content/themes/richco/workers/get_all_emails.php',
            'get_user_url'=>'../wp-content/themes/richco/workers/get_all_users.php',
            'get_messges_url'=>'../wp-content/themes/richco/workers/get_all_messages.php',
            'remove_email'=>'../wp-content/themes/richco/workers/remove_email.php',
            'remove_user'=>'../wp-content/themes/richco/workers/remove_user.php',
            'update_email'=>'../wp-content/themes/richco/workers/update_email.php',
            'update_user'=>'../wp-content/themes/richco/workers/update_users.php',
            'send_message'=>'../wp-content/themes/richco/workers/send_message.php',
            'msg' => "<p class='alert alert-info'>Success!</p>",
            'upload_file_url'=>'../wp-content/themes/richco/workers/file_upload.php',
            'signout_url'=>'../wp-content/themes/richco/workers/signout.php',
            'add_work_url'=>'../wp-content/themes/richco/workers/add_work.php',
            'get_work'=>'../wp-content/themes/richco/workers/get_work.php',
        ];
        die(print(json_encode($admin_array)));
    }else{
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>Error: ".$database->printMsg()."</p>"))));
    }
    
}