<?php
require 'local.php';
$account = $_POST["account"];
$password = $_POST["password"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

session_start();
if(isset($_POST['login']))
{
    $account=trim($_POST['account']);
    $password=trim($_POST['password']);
    if(($account=='')||($password==''))
    {
        echo "改用户名或密码不能为空，3秒后跳转到登录页面"; 
        exit;
    }
    
        $sql = "select `account`,`password` from userinfo where account = '$_POST[account]' and password = '$_POST[password]'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
            echo 1;
            $sql1 = "SELECT `name`,`phone`,`id` FROM manage";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // 输出数据
    while($row = $result1->fetch_assoc()) {
        echo "id: " . $row["id"] . "<br>";
        echo "name: " . $row["name"]. "<br>";
        echo "phone: " . $row["purpose"]. "<br>";
    }
} else {
    echo 0 ;
}
        } else {
            echo '<script>alert("用户名或密码错误！");history.go(-1);</script>';
        }
        $conn->close();
}
?>