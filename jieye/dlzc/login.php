<?php
session_start();

//包含数据库连接文件
include('../conn.php');
//注销登录
$action = isset($_POST['action'])?$_POST['action']:'';
if($action == "logout"){
    unset($_SESSION['userno']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    exit;
}

//登录
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);

//检测用户名及密码是否正确
$check_query = mysqli_query($con,"select userno from users where username='$username' and password='$password' 
limit 1");
if($result = mysqli_fetch_array($check_query)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userno'] = $result['userno'];
    echo $username,' 欢迎你！进入 <a href="../lts/chat.php">图灵聊天室</a><br />';
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
    exit;
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> ');
}
?>