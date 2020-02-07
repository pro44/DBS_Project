<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['category_name']) && $_POST['category_name'] != "") {  
    extract($_POST);
    
    $arr = array(
        "category_name" => $category_name
    );
    
    
    $r = $obj->insertRecord($arr,"categories");
  
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