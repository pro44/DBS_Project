<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['id']) && $_POST['id'] != "" 
     && isset($_POST['name']) && $_POST['name'] != ""
     && isset($_POST['title']) && $_POST['title'] != ""
     && isset($_POST['twitter']) && $_POST['twitter'] != ""
     && isset($_POST['facebook']) && $_POST['facebook'] != ""
     && isset($_POST['instagram']) && $_POST['instagram'] != ""
     && isset($_POST['footer_desc']) && $_POST['footer_desc'] != ""  ) {  
    
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
                    $fileDestination = "../kusina/logo/".$fileNameNew;
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
        "name" => $name,
        "title" => $title,
        "twitter" => $twitter,
        "facebook" => $facebook,
        "instagram" => $instagram,
        "footer_desc" => $footer_desc,
        "image" => $fileNameNew
    );
    
    
    $r = $obj->updateRecord($arr,"basic_info", $id);
  
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
