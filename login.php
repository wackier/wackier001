<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "c";
// 创建链接

$conn = new mysqli($server, $username, $password, $dbname);
// 检查链接
if ($conn->connect_error) 
{
    die("连接失败: " . $conn->connect_error);
} 
header("Content-Type:text/html;charset=utf-8"); 
session_start();
if(isset($_POST['login']))
{
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    if(($username=='')||($password==''))
    {
        header('refresh:3;url=cc.html');
        echo "改用户名或密码不能为空，3秒后跳转到登录页面"; 
        exit;
    }
    
        $sql = "select `username`,`password` from userinfo where username = '$_POST[username]' and password = '$_POST[password]'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
            echo '<script>window.location="ccc.html";</script>';
        } else {
            echo '<script>alert("用户名或密码错误！");history.go(-1);</script>';
        }
    
    
    header('refresh:1;url=ccc.html');
    $id=$_POST["username"];
    $password=$_POST["password"];
    $sql = "INSERT INTO cc (`id`,`password`)
    VALUES ('$id', '$password')";

    if ($conn->multi_query($sql) === TRUE) {
    echo "新记录插入成功";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
}
?>