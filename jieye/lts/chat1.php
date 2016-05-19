<?php
session_start();
include('../conn.php');
//调用图灵机器人API
Class Turing{
    public function call(){

        //初始化curl一个curl会话
        $ch = curl_init();

            //设置url
        $url = 'http://apis.baidu.com/turing/turing/turing?key=879a6cb3afb84dbf4fc84a1df2ab7319&info=%E6%9F%A5%E5%A4%A9%E6%B0%94%E2%80%9C%E5%8C%97%E4%BA%AC%E4%BB%8A%E5%A4%A9%E5%A4%A9%E6%B0%94%E2%80%9D&userid=eb2edb736';
        $header = array(
        'apikey: 3dbf5144aafe85722cb045424b109e1a',
        );

        //设置curl传输选项，并添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch, CURLOPT_URL , $url);
        $res = curl_exec($ch);
        //解析json数据
        $test = json_decode($res);

        //获取时间
        $time = date('Y-m-d H:i:s');
    }
    
    public function usermessages($usermessage, $tumessage, $time){

        //将各参数插入turing表
        $sql = "INSERT INTO usermessages(usermessage, tumessage, time)
                VALUES('$usermessage', '$tumessage', '$time')";
        mysqli_query($con,$sql);  
    }
    
    //从数据库中取出各字段
    public function select(){
        $selectSql = "SELECT username,usermessage,tumessage,time
        FROM usermessages,users
        WHERE users.userno=usermessages.userno
        AND username='$usrname'";

        $row = mysql_fetch_array();
        $username = $row['usrename'];
        $usermessage = $row['usermessage'];
        $tumessage = $row['tumessage'];
        $time = $row['time'];

        echo $time."<br>".$username.":<br>".$usermessage."<br>图灵:<br>".$turingword."<br>";
                
            }      

}

?>