<?php
require 'connection.php';
$obj = new db();
    
      if ( isset($_POST['name'])    && $_POST['name'] != "" 
        && isset($_POST['email'])   && $_POST['email'] != ""
        && isset($_POST['subject']) && $_POST['subject'] != ""
        && isset($_POST['message']) && $_POST['message'] != "" ) {

            extract($_POST);

            date_default_timezone_set('Asia/Karachi');

          $date = "At ".date("h:i:s A")." on ".date("l jS \of F Y");

            $arr = array(
                "name" => $name,
                "email" => $email,
                "subject" => $subject,
                "message" => $message,
                "date"=>$date,
                "is_read"=>0
            );

            $r = $obj->insertRecord($arr, "messages");
            if( $r == 1 ){
                echo "Form Submitted Succesfully";
            }else{
                echo "error";
            }
        
        }

?> 