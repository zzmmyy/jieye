<?php
	require_once('config.php');//只包含一次
	//连接数据库
	$con = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);

	mysqli_query($con,'set names utf8');
?>