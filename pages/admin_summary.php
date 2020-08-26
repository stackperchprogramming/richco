<?php
if(!isset($database)){$database = new Database();}//initialize database class

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

?>
<style>
    body{
        background:white;
    }
    .container{
        padding:5%;
    }
    .row{
        width:100%;
    }
    .col-12{
        min-width:100%;
    }
    .text-center{
        text-align: center;
    }
    
table{
    margin-top: 25px;
}
table{
	max-width: 100%;
}
table thead th{
	font-size: 10px;
}
table tbody td{
	font-size: 9px;
}

table thead tr th{
    padding-right: 10px;
}

table tbody  tr td{
    border-width: 1px;
	border-style: solid;
	border-color: #ccc;
    text-align: center;
}

table table thead tr th{
    padding-right: 10px;
}

.button {
  background-color: #102c58;
  border: 1px solid #102c58;
  border-radius: 5px;
  color: black;
  padding: 10px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<div class="container">
    <div class="row text-center">
        <div class="text-center col-12">
            <h4>RichCo Site Forms Email Address<br/><small>When a site form is submitted, it will go to this Email address.</small></h4>
        </div>
        <div class="col-12">
            <p class="text-sm-left"></p>
            <label>Set Email Address: </label>
            <input type="text" id='new_email' placeholder='name@richcopropertyservices.com'/>
            <button class="btn btn-primary">Submit</button>
        </div>
        <div class="col-12">
             <p class="text-sm-left"></p>
            <label>Current Email Address: </label>
            <input type="text" id='new_email' placeholder='name@richcopropertyservices.com'/>
        </div>
    </div>
</div>
