<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <title>ccc</title>
        <link href="TIM20191020145900.png" rel="icon" type="image/x-icon" />
</head>
<body>
<a href='logout.php'>注销</a>
<form action="ccc.html" method="POST">
    <input type="submit" value="再来！" name="zaikai">
</form>
</body>
</html>
<?php 
$i=0;
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

$t= rand(0,99);
if($t==0)
{
    $j="one";
}else if($t!=0 and $t<=30){
    $j="two";

}else{
    $j="three";
}
echo $j;

$sql = "INSERT INTO cc (`抽到奖项`) VALUES ( '$j')";

if ($conn->multi_query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>