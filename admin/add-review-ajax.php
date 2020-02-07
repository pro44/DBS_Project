<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['name']) && $_POST['name'] != "" 
     && isset($_POST['position']) && $_POST['position'] != ""
     && isset($_POST['review']) && $_POST['review'] != "" ) {  
  
    extract($_POST);
  
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
                $fileDestination = "../kusina/images/review_images/".$fileNameNew;
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
    
    $arr = array(
        "name" => $name,
        "position" => $position,
        "review" => $review,
        "image" => $fileNameNew
    );
    
    
    $r = $obj->insertRecord($arr,"reviews");
  
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