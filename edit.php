<?php
require 'local.php';
$name = $_POST["name"];
$day = $_POST["day"];
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$repeat = $_POST["repeat"];
$phone = $_POST["phone"];
$purpose = $_POST["purpose"];
$adminld = $_POST["adminld"];
$id = $_POST["_id"];

$sql = "SELECT `day`, `startTime`, `endTime` FROM `manage`
        WHERE `day` = '$day'
        AND !((`startTime` >= '$endTime')
        OR (`endTime` <= '$startTime'))";
$result = $conn->query($sql);
if ($result) {
    if ($result->fetch_assoc()) echo -1;
    else {
            $sql = "INSERT INTO `manage` (`name`,`day`,`startTime`,`endTime`,`repeat`,`phone`,`purpose`,`adminld`,`id`) VALUES ( '$name','$day','$startTime','$endTime','$repeat','$phone','$purpose','$adminld,'$id')";
            if ($conn->multi_query($sql) === TRUE) {
                echo "新记录插入成功";
                echo $id;
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }
                }
            }else {
                echo 0;
            }
$conn->close();
?>