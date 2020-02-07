<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['id']) && $_POST['id'] != "" 
     && isset($_POST['item_name']) && $_POST['item_name'] != ""
     && isset($_POST['item_price']) && $_POST['item_price'] != ""
     && isset($_POST['item_desc']) && $_POST['item_desc'] != ""
     && isset($_POST['c_id']) && $_POST['c_id'] != "" 
     && isset($_POST['status']) && $_POST['status'] != "") {  
    
     extract($_POST);
    
    if($_FILES['file']['size'] > 0){
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower( end( $fileExt ) );

        $allowed = array("jpg","jpeg","png");

        if(in_array( $fileActualExt, $allowed )  ){
            if($fileError == 0){
                if($fileSize < 5250000){
                    $fileNameNew = uniqid('',TRUE).".".$fileActualExt;
                    $fileDestination = "../kusina/images/items/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }else{
                    echo "Your File is too big!";
                }

            }else{
                echo "There was an error uploading your file.";
            }

        }  else {
            echo "You can not upload images of this type";
        }
    }else{
    $fileNameNew = $oldImg;
    }
    
    $arr = array(
        "item_name" => $item_name,
        "item_price" => $item_price,
        "item_desc" => $item_desc,
        "c_id" => $c_id,
        "status" => $status,
        "item_image" => $fileNameNew
    );
    
    
    $r = $obj->updateRecord($arr,"items", $id);
  
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
