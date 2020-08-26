<?php

include(__DIR__  . '/../classes/Database.php');//get DB connection

//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
$path = __DIR__ . '/../images/profile_images/';
$dbpath = 'profile_images/';
$valid_file = array("jpg", "png","PNG", "gif","GIF", "bmp","BMP", "jpeg", "JPG", "JPEG");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_FILES['photoimg']['name'];
    $size = $_FILES['photoimg']['size'];
    //print_R($_POST);die;
    if(strlen($name)) {
        list($txt, $ext) = explode(".", $name);
        if(in_array($ext,$valid_file)) {
            if($size<(1024*1024*5)) {
                $user_id = 1;
                $image_name = time().'_'.$user_id.".".$ext;
                $tmp = $_FILES['photoimg']['tmp_name'];
            if(move_uploaded_file($tmp, $path.$image_name)){
                
                if(!$database->setPic($_SESSION['email'], $dbpath.$image_name))
                    die("error updating image data");
                else
                    echo json_encode(array('error'=>0, 'msg' => "Successfully uploaded image!"));
            }
            else
                echo json_encode(array('error'=>1, 'msg' => "Image Upload failed..!"));
            }
            else
                echo json_encode(array('error'=>1, 'msg' => "Image file size maximum 5 MB..!"));
        }
        else
            echo json_encode(array('error'=>1, 'msg' => "Invalid file format..".$ext."!"));
    }
    else
        echo json_encode(array('error'=>1, 'msg' => "Please select image..!"));
    exit;
}
?>