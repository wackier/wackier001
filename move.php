<?php
require 'local.php';
$listld = $_POST["listld"];

$con=mysqli_connect("localhost","username","password","database");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}

mysqli_query($con,"DELETE FROM manage WHERE id=$listld");
echo 0;

mysqli_close($con);
?>