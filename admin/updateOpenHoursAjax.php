<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['mon_from']) && $_POST['mon_from'] != ""
    && isset($_POST['mon_to']) && $_POST['mon_to'] != ""
    && isset($_POST['tues_from']) && $_POST['tues_from'] != ""
    && isset($_POST['tues_to']) && $_POST['tues_to'] != ""
    && isset($_POST['wed_from']) && $_POST['wed_from'] != ""
    && isset($_POST['wed_to']) && $_POST['wed_to'] != ""
    && isset($_POST['thurs_from']) && $_POST['thurs_from'] != ""
    && isset($_POST['thurs_to']) && $_POST['thurs_to'] != ""
    && isset($_POST['fri_from']) && $_POST['fri_from'] != ""
    && isset($_POST['fri_to']) && $_POST['fri_to'] != ""
    && isset($_POST['sat_from']) && $_POST['sat_from'] != ""
    && isset($_POST['sat_to']) && $_POST['sat_to'] != "") {  
    
     extract($_POST);
    
    $arr = array(
        "mon_from" => $mon_from,
        "mon_to" => $mon_to,
        "tues_from" => $tues_from,
        "tues_to" => $tues_to,
        "wed_from" => $wed_from,
        "wed_to" => $wed_to,
        "thurs_from" => $thurs_from,
        "thurs_to" => $thurs_to,
        "fri_from" => $fri_from,
        "fri_to" => $fri_to,
        "sat_from" => $sat_from,
        "sat_to" => $sat_to
    );
    
    
    $r = $obj->updateOpenHours($arr);
  
    if ($r == 1) {
        return 1;
    }else{
        return 0;
        die();
    }
}
else{
    die('No direct script access allowed');
}

?>
