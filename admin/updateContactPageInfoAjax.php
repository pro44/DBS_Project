<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['id']) && $_POST['id'] != "" 
     && isset($_POST['email']) && $_POST['email'] != ""
     && isset($_POST['website']) && $_POST['website'] != ""
     && isset($_POST['phone']) && $_POST['phone'] != ""
     && isset($_POST['address']) && $_POST['address'] != ""  ) {  
    
     extract($_POST);
    
    $arr = array(
        "email" => $email,
        "website" => $website,
        "phone" => $phone,
        "address" => $address
    );
    
    
    $r = $obj->updateRecord($arr,"contact_info", $id);
  
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
