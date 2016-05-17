<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userno'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('../conn.php');


$usermessage = $_SESSION['usermessage'];//取得用户发送信息
$tumessage = $_SESSION[];
$chattime = time();

//将用户发送的信息插入表中
$chatsql = "INSERT INTO usermessages(usermessage,tumessage,time) VALUES ('$usermessage,$tumessage,$chattime')";
mysqli_query($con,$chatsql);


$username = $_POST['username'];//取得用户名

//连接表users和usermassages
$connectsql = mysqli_query($con,"SELECT * FROM users,usermessages WHERE users.userno = usermessages.userno limit 1");
$row = mysqli_fetch_array($connectsql);

//从表中提取数据

//输出用户发送信息时间
echo '时间'.date("Y-m-d H:i:s", $row['datetime']).'<br/>';
//输出用户发送的信息
//输出图灵发送的信息