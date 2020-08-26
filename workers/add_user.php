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
    $date = date('m/d/Y');
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $pic = '';
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $role = filter_var($_POST['type'],FILTER_SANITIZE_STRING);
    if($database->insert_user($name, $email, $address, $company, $password, $pic, $phone, $role, $date)){
        $admin_array = [
        'error'=> 0,
        'users'=> $database->get_all_users(),
        'msg' => "<p class='alert alert-info'>Success!</p>",
        ];
        die(print(json_encode($admin_array)));
    }else{
        die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>".$database->printMsg()."</p>"))));
    }
    
}