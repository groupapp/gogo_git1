<?php
    /*
    Pure Uploader PHP Handler v1.0
    Author : tQera
    *Tested on Windows with PHP 5.2.7*
    */
    //You can change the uploads and thumbnails folder below
    define("_UPLOADS", "uploads/");
    define("_THUMBNAIL", "uploads/thumbnails/");
    
    $img = file_get_contents('php://input');
    $temp = explode(',', $img);
    $img = $temp[1];
    $t = time();
    $name = $_SERVER['HTTP_UPLOADER_NAME'];
    $isThumb = $_SERVER['HTTP_UPLOADER_THUMB'];
    $data = base64_decode($img);
    $file = _UPLOADS.$t.$name;
    $success = file_put_contents($file, $data);
    
    if($isThumb == true && stristr($_SERVER['CONTENT_TYPE'], "image") == true){
        $thumbWidth = 128; // define it handle not from request 0 200 etc.
        $thumbHeight = 0; // define it handle not from request 0 200 etc.
        
        //open file
        $openFile = imagecreatefromjpeg($file);

        //get file width, height
        $image_width = imagesx($openFile);
        $image_height = imagesy($openFile);

        //get ratios
        $ratio_width = $thumbWidth / $image_width;
        $ratio_height = $thumbHeight / $image_height;

        //get min ratio
        $ratio = min($ratio_width, $ratio_height);

        //set new resolutions
        $thumbWidth = $image_width * $ratio;
        $thumbHeight = $image_height * $ratio;
    
    
        $newThumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
        $thumbTemp = imagecreatefromstring($data);
        $thumb = imagecopyresampled($newThumb, $thumbTemp, 0, 0, 0, 0, $thumbWidth, $thumbHeight, imagesx($thumbTemp), imagesy($thumbTemp));
    
        $thumbFile = _THUMBNAIL.$t.$name;
        imagejpeg($newThumb, $thumbFile, 90);
    }
    
    if($success){
        echo "true";
    }
    else{
        echo "Server failed for file: ".$name;
        }
?>