<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['table_no']) && $_POST['table_no'] != ""
    && isset($_POST['table_capacity']) && ( $_POST['table_capacity'] != "" && $_POST['table_capacity'] > 1 && $_POST['table_capacity'] < 21  ) ) {  
    extract($_POST);
    
    $arr = array(
        "table_no" => $table_no,
        "table_capacity" => $table_capacity
    );
    
    
    $r = $obj->insertRecord($arr,"tables");
  
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