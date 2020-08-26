<?php
require_once(__DIR__  . '/../classes/Database.php');//get DB connection
if(file_exists(__DIR__  . '/../../../../wp-load.php')){require_once(__DIR__  . '/../../../../wp-load.php');}
//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class
if(isset($_POST['folder'])){//usual check
    $folder = filter_var($_POST['folder'],FILTER_SANITIZE_STRING);
    $log_directory = __DIR__.'/../'. $folder . '/';
    $dir = $log_directory;
    
    $docs_array = array();
    $count = 0;
    if (is_dir($log_directory))
    {
        $file = scandir($log_directory);
        for($i = 0; $i<count($file); $i++){
            if($file[$i] !== '..' && $file[$i] !== '.' && $file[$i] !== 'pics'&& $file[$i] !== null){
                $docs_array[$count] = $file[$i];
                $count++;
            }
        }
    }    
        $pics_array = array();
        $count_pics = 0;
    $log_directory = $dir . '/pics/';
    if (is_dir($log_directory))
    {
        $file = scandir($log_directory);
        for($i = 0; $i<count($file); $i++){
            if($file[$i] !== '..' && $file[$i] !== '.' && $file[$i] !== 'pics'&& $file[$i] !== null){
                $pics_array[$count_pics] = $file[$i];
                $count_pics++;
            }
        }
    }
    $final_array = [
        'docs'=>$docs_array,
        'pics'=>$pics_array,
        'directory'=>$dir
    ];
    die(print json_encode($final_array) );
}