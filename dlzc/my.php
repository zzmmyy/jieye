<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('conn.php');
$userno = $_SESSION['userid'];
$username = $_SESSION['username'];
$user_query = mysqli_query($con,"select * from users where userno = $userno limit 1");
$row = mysqli_fetch_array($user_query);
echo '用户信息：<br/>';
echo '用户ID：'.$userno.'<br/>';
echo '用户名：'.$username.'<br/>';
echo '邮箱：'.$row['email'].'<br/>';
echo '注册日期：'.date("Y-m-d H:i:s", $row['datetime']).'<br/>';
echo '<a href = "login.html">其他账号登录</a>';
?>