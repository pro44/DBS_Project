<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['name']) && $_POST['name'] != "" 
     && isset($_POST['capacity']) && $_POST['capacity'] != "" 
     && isset($_POST['book_time_from']) && $_POST['book_time_from'] != "" 
     && isset($_POST['book_time_to']) && $_POST['book_time_to'] != "" ) {  
    
    extract($_POST);
    
    echo "<pre>";
    print_r($_POST);
    
   exit();
    
    $arr = array(
        "name" => $name,
        "title" => $title,
        "twitter" => $twitter,
        "facebook" => $facebook,
        "google_plus" => $google_plus,
        "instagram" => $instagram,
        "image" => $fileNameNew
    );
    
    
    $r = $obj->insertRecord($arr,"chefs");
  
    if ($r == 1) {
        return 1;
    }else{
        return 0;
    }
}
else{
    die('No direct script access allowed');
}

?> 