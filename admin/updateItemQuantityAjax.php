<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['item_id']) && $_POST['item_id'] != "" 
     && isset($_POST['newQuantity']) && ( $_POST['newQuantity'] != "0" && $_POST['newQuantity'] != "" )) {  
    
     $item_id = $_POST['item_id'];
     $item_quantity = $_POST['newQuantity'];

    $arr = array(
        "item_quantity" => $item_quantity
    );
    
    
    $r = $obj->updateCartItem($arr, $item_id, session_id());
  
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
