<?php
require 'local.php';
$listld = $_POST["listld"];
$con=mysqli_connect("localhost","username","password","database");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM manage
WHERE id=$listid");

while($row = mysqli_fetch_array($result))
{
    echo $row['id'] ;
    echo "<br>";
    echo "已起用";
}
?>