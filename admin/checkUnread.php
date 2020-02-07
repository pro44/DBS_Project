<?php
include 'connection.php';
$obj = new db();
    $unreadMessages = $obj->getUnread();

    foreach($unreadMessages as $value){
        if( $value['total_unread'] == 0 ){echo "no";}else{
        echo $value['total_unread'];
        }
    }

?>