<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['total']) && ( $_POST['total'] != "" && $_POST['total'] != "0"  ) ) {  
    $done = false;
    $session_id = session_id();
    $total = $_POST['total'];
    
    date_default_timezone_set('Asia/Karachi');
    $date = "At ".date("h:i:s A")." on ".date("l jS \of F Y");
    
    $arr = array(
       "invoice_date" => $date,
       "total" => $total
    );       
    
    $r = $obj->insertInvoice($arr);
    if( $r > 0 ){
        $invoice_id = $r; 
       
        $transactionCartDetails = $obj->getCartItemsBySession($session_id);

        foreach( $transactionCartDetails as $value ){
            
            $item_id = $value['item_id'];
            $item_name = $value['item_name'];
            $item_price = $value['item_price'];
            $item_quantity = $value['item_quantity'];
                    
            $array = array(
                "invoice_id" => $invoice_id,
                "item_id" => $item_id,
                "item_name" => $item_name,
                "item_price" => $item_price,
                "item_quantity" => $item_quantity
            );
    
            $rz = $obj->insertInvoiceDetails($array, $invoice_id);
            
            if( $rz > 0 ){
                $temp = $rz; 
             $done = true;
            }
        }
    if( $done === true ){ 
    $emptyCart = $obj->deleteTransactionCart($session_id);
       echo $temp;
    }else{
        return 0;
    }
   
   }  
}
else{
    die('No direct script access allowed');
}

?>
