<?php if(session_status() === PHP_SESSION_NONE)session_start();
if(isset($_SESSION['type'])){
    $timestamp;
    $file;
    foreach ($_FILES as $key => $value){
        if(is_numeric($key)){
            $timestamp = $key;
        }
    }
    if(!isset($_FILES[$timestamp]['name']) || $_FILES[$timestamp]['name'] === null || $_FILES[$timestamp]['name'] === 'null'){
        $error = 1; $msg = 'null';
        $return_arr = [
            'error'=>$error,
            'msg'=>$msg,
        ];
        die(print json_encode($return_arr));
    }else{
        $filename = $_FILES[$timestamp]['name'];

        $filesize = $_FILES[$timestamp]['size'];

        $path = __DIR__."/../docs/".$timestamp.'/';
        if(!file_exists($path)){mkdir($path);}
        $location = $path.$filename;
        $src = '/docs/'.$timestamp.'/'.$filename;
        
        $is_img = false;
        $error = 0;

        $msg = '';
        if($filesize > file_upload_max_size()){$error = 1;$msg = 'Filesize error. Max filesize is '.file_upload_max_size().' bytes.';}
        if($filesize < 1){$error = 1;$msg = 'Unknown error.';}
        else{
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $dangerMime = array('application/x-bsh', 'application/x-sh', 'application/x-shar', 'text/x-script.sh');
            $check= finfo_file($finfo,$_FILES[$timestamp]['tmp_name']);

            if(is_executable($_FILES[$timestamp]['name']) || in_array($check, $dangerMime)){
                $error = 1;$msg = 'Dangerous file type detected.';
            }
        }

        if(!$error && move_uploaded_file($_FILES[$timestamp]['tmp_name'],$location)){//check for errors then upload
            // checking file is image or not - put images in separate folder - /pics/
            if(is_array(getimagesize($location))){
                $path = $path.'pics/';
                if(!file_exists($path)){mkdir($path);}
                rename($location, $path.$filename);
                $location = '/docs/'.$timestamp.'/pics/'.$filename;
                $src = '/docs/'.$timestamp.'/pics/'.$filename;
                $is_img = true;
            }
            $msg = 'success! You may upload as many items as you would like by simply uploading again...';
        }

        $return_arr = [
            "name" => $filename,
            "size" => $filesize,
            "src"=> $src,
            'is_img'=>$is_img,
            'max_size'=>file_upload_max_size(),
            'error'=>$error,
            'msg'=>$msg,
            'timestamp'=> $timestamp,
            'files'=>$_FILES,
        ];
        die(print json_encode($return_arr));
    }
}
// Returns a file size limit in bytes based on the PHP upload_max_filesize
// and post_max_size
function file_upload_max_size() {
  static $max_size = -1;

  if ($max_size < 0) {
    // Start with post_max_size.
    $post_max_size = parse_size(ini_get('post_max_size'));
    if ($post_max_size > 0) {
      $max_size = $post_max_size;
    }

    // If upload_max_size is less, then reduce. Except if upload_max_size is
    // zero, which indicates no limit.
    $upload_max = parse_size(ini_get('upload_max_filesize'));
    if ($upload_max > 0 && $upload_max < $max_size) {
      $max_size = $upload_max;
    }
  }
  return $max_size;
}

function parse_size($size) {
  $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
  $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
  if ($unit) {
    // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
    return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
  }
  else {
    return round($size);
  }
}