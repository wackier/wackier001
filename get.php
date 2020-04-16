<?php
require 'local.php';
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$sql = "SELECT `name`,`day`,`startTime`,`endTime`,`repeat`,`phone`,`purpose`,`adminld`,`id` FROM manage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
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
} else {
    echo 0 ;
}
$conn->close();
?>