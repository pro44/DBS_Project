<?php
include 'connection.php';
$obj = new db();

if ( isset($_POST['years']) && $_POST['years'] != "" 
     && isset($_POST['customers']) && $_POST['customers'] != ""
     && isset($_POST['projects']) && $_POST['projects'] != ""
     && isset($_POST['days']) && $_POST['days'] != "") {
    
    extract($_POST);
                     
    $arr = array(
        "years" => $years,
        "customers" => $customers,
        "projects" => $projects,
        "days" => $days
    );
    
    $r = $obj->updateFacts($arr);
    
    if ($r == 1) {
        return 1;
    }else{
        return 0;
    }
}
    
    ?>