<?php

$key = "zx45dfajp";
$keyz = 1231231;
$password = "admin";

  $passzz =  md5($key.$password.$keyz);;

echo $passzz;

?>