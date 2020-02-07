<?php
include 'connection.php';
$obj = new db();
if(isset($_POST['transaction_cart_item_id'])){
        extract($_POST);
        $delete = $obj->deleteTransactionCartItem($transaction_cart_item_id, session_id());
        if($delete == 1){return 1;}else{return 0;}
    }
?>
