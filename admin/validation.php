<?php
require 'connection.php';
$obj = new db();
if ( isset($_POST['username']) && isset($_POST['password']) &&
     $_POST['username'] != "" && $_POST['password'] != "") {
    
    extract($_POST);
    
    $key = "zx45dfajp";
    $keyz = 12344123;

    $passzz =  md5($key.$password.$keyz);;
       
    //echo $username;
    //echo $passzz;
    
    //exit();
    $r = $obj->getUser($username, $passzz);

    if ($r == 1) {
      echo $passzz;
        //  echo 'Success';
    } else {
        die();
    }
} else {  die();
}



?>