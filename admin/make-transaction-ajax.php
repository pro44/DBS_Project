<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['item_id']) && $_POST['item_id'] != "" 
     && isset($_POST['item_quantity']) && ( $_POST['item_quantity'] != 0 || $_POST['item_quantity'] > 0 ) ) {  
    extract($_POST);
    
    $item = $obj->getSingleData('items',"id",$item_id);
    
    foreach( $item as $value ){
        $item_name = $value['item_name'];
        $item_price = $value['item_price'];
        $item_image = $value['item_image'];
    }
    
    $checkItem = $obj->checkCartItem($item_id,session_id());

if( $checkItem == 1 ){
    
   $arr = array(
        "session_id" => session_id(),
        "item_id" => $item_id,
        "item_name" => $item_name,
        "item_image" => $item_image,
        "item_quantity" => $item_quantity,
        "item_price" => $item_price
    );    
    
   
  $upd = $obj->updateCartItem($arr, $item_id, session_id());
    if ($upd == 1) {
        return 1;
    }
  }else
 {
     $arr = array(
        "session_id" => session_id(),
        "item_id" => $item_id,
        "item_name" => $item_name,
        "item_image" => $item_image,
        "item_quantity" => $item_quantity,
        "item_price" => $item_price
    );    
    
    $r = $obj->insertRecord($arr,"transactions_cart");
 if ($r == 1) {
        return 1;
    }else{
        return 0;
    }
}
   
}
else{
    die('No direct script access allowed');
}

?>
