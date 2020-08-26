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
    if(isset($_SESSION['email'])){
    $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);   
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);   
    $company = filter_input(INPUT_POST,'company',FILTER_SANITIZE_STRING);   
    $phone = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_STRING);   
    $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
    $old_email = $_SESSION['email'];
    if($database->update_user($name, $email, $address, $phone, $company, $old_email)){
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
        'msg' => "<p class='alert alert-info'>Successfully updated profile information.</p>",
        ];
        die(print(json_encode($admin_array)));
    }else{
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>Error: ".$database->printMsg()."</p>"))));
    }
    }else{
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>Error: You've signed out.</p>"))));
    }
}