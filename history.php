<?php
require 'local.php';
$adminld = $_GET["adminld"];
$con=mysqli_connect("localhost","username","password","database");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM manage
WHERE `adminld`=$adminld");


while($row = mysqli_fetch_array($result))
{
    
        echo "id: " . $row["id"] . "<br>";
        echo "adminld: " . $row["adminld"]. "<br>";
        echo "name: " . $row["name"]. "<br>";
        echo "day: " . $row["day"]. "<br>";
        echo "startTime: " . $row["startTime"]. "<br>";
        echo "endTime: " . $row["endTime"]. "<br>";
        echo "repeat: " . $row["repeat"]. "<br>";
        echo "phone: " . $row["purpose"]. "<br>";
        echo "purpose: " . $row["purpose"]. "<br>";
}
?>