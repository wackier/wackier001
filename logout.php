<?php 
$id = $_POST["_id"];
session_start(); 
 //清除session 
$_SESSION=array(); 
session_destroy(); 
echo 0; 
?>