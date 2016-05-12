<?php
session_start();
//包含数据库连接文件
include('conn.php');

if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = $_POST['username'];//取得用户名
$password = $_POST['password'];//取得密码
$email = $_POST['email'];//取得邮箱

$image = strtoupper($_POST['image']);//取得用户输入的图片验证码并转换为大写
$image2 = $_SESSION['pic'];//取得图片验证码中的四个随机数

//注册信息判断
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(strlen($password) < 6){
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(!preg_match('/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/', $email)){
    exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>');
}
if(!$image == $image2){
	exit('错误：验证码错误。<a href="javascript:history.back(-1);">返回</a>');
}

//检测用户名是否已经存在
$query = "select userno from users where username = '$username' limit 1";
$check_query = mysqli_query($con,$query);
if(mysqli_fetch_array($check_query)){
    echo '错误：用户名 '.$username.' 已存在。<a href="javascript:history.back(-1);">返回</a>';
    exit;
}
//写入数据
$password = MD5($password);//密码加密
$datetime = time();

$sql = "INSERT INTO users(username,password,email,datetime)VALUES('$username','$password','$email',
$datetime)";
if(mysqli_query($con,$sql)){
    exit('用户注册成功！点击此处 <a href="login.html">登录</a>');
} else {
    echo '抱歉！添加数据失败：'.mysqli_error($con).'<br/>';
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a>';
}
?>