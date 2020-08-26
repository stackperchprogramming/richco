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

if(!isset($database)){$database = new Database();}//initialize database class
//$database->createChat();
    $date = date('m/d/Y');
print var_dump($database->get_work_orders('admin@rahaprogramming.com'));

        //die(print(json_encode(array('error'=> 1, 'msg' => "<p class='alert alert-danger'>".$database->printMsg()."</p>"))));
