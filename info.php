<?php
require 'local.php';
$id = $_POST["_id"];
$password = $_POST["password"];
$name = $_POST["name"];
$phone = $_POST["phone"];

$con=mysqli_connect("localhost","username","password","database");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}
if ($password != "")
    {       mysqli_query($con,"UPDATE info SET password=$password
            WHERE id='$id'");

            mysqli_close($con);
            session_start(); 
 //清除session 
            $_SESSION=array(); 
            session_destroy(); 
            echo 0; 
}else{
    if($phone !=""){
    mysqli_query($con,"UPDATE info SET phone=$phone
            WHERE id='$id'");
    }else if ($name!=""){
        mysqli_query($con,"UPDATE info SET `name` =$name
            WHERE id='$id'");
    }else{
        echo "请修改";
    }
}
?>