<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['get_data'])){
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
        $date = $_SESSION['date'];
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
    //first add data to main script
    if(isset($_SESSION['type'])){
        $email_data = $database->get_all_emails();
        $users_data = $database->get_all_users();
        $message_data = $database->get_all_messages();
    }
    else{$email_data = null;$users_data = null;$message_data = null;}
    $admin_array = [
        'login_url'=> get_template_directory_uri().'/workers/login.php',
        'admin_url'=> get_admin_page_url(),
        'home'=> get_template_directory_uri(),
        'type'=> $type,
        'name'=> $name,
        'id'=> $id,
        'pic'=> $pic,
        'phone'=> $phone,
        'email'=> $email,
        'address'=> $address,
        'company'=> $company,
        'reg_date'=> $date,
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
        'signout_url'=>'../wp-content/themes/richco/workers/signout.php',
        'login_url'=>'../wp-content/themes/richco/workers/login.php',
        'signup_url'=>'../wp-content/themes/richco/workers/signup.php',
        'upload_file_url'=>'../wp-content/themes/richco/workers/file_upload.php',
        'add_work_url'=>'../wp-content/themes/richco/workers/add_work.php',
        'emails'=>$email_data,
        'users'=>$users_data,
        'messages'=>$message_data,
        ];
        die(print json_encode($admin_array));
}