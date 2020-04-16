<?php
require 'local.php';
$password = $_POST["password"];
$name = $_POST["name"];
$phone = $_POST["phone"];
if ($name == ''){
    echo '<script>alert("请输入用户名！");history.go(-1);</script>';
    exit(0);
}
if ($password == ''){
    echo '<script>alert("请输入密码");history.go(-1);</script>';
    exit(0);
}
if ($phone == '' or $phone<9999999999 ){
    echo '<script>alert("请输入正确的手机号码");history.go(-1);</script>';
    exit(0);
}
$conn = new mysqli($server, $username, $password, $dbname);
            if ($conn->connect_error){
                echo '数据库连接失败！';
                exit(0);
            }else {
                $sql = "select name from userinfo where username = '$_POST[name]'";
                $result = $conn->query($sql);
                $number = mysqli_num_rows($result);
                if ($number) {
                    echo '<script>alert("用户名已经存在");history.go(-1);</script>';
                } else {
                    $sql_insert = "insert into userinfo (`name`,`password`,`phone`) values('$_POST[name]','$_POST[password]','$_POST[phone]')";
                    $res_insert = $conn->query($sql_insert);
                    if ($res_insert) {
                        header('refresh:3;url=cc.html');
                        echo "注册成功，3秒后跳转到页面"; 
                    } else {
                        echo "<script>alert('系统繁忙，请稍候！');</script>";
                    }
                }
            }
?>
