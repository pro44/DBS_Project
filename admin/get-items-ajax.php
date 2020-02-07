<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['c_id']) ) {  
    extract($_POST);
    
    $items = $obj->getItemsByCategoryForTransaction($c_id);?>
<option>Select Items</option>
<?php foreach( $items as $value ){ ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['item_name']." - $".$value['item_price']; ?></option>
<?php } }
else{
    die('No direct script access allowed');
}

?>
