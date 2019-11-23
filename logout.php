<?php 
header("Content-Type:text/html;charset=utf-8"); 
session_start(); 
 //清除session 
$_SESSION=array(); 
session_destroy(); 
echo "欢迎下次光临"; 
echo "重新<a href='cc.html'>登录</a>"; 
?>
