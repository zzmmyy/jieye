<?php
session_start();
include('../conn.php')
//调用图灵机器人API
$usermessage = $_POST['usermessage'];
$uno = $_SESSION['userno'];
Class Api{
    public function tuling($info,$userid){

        //初始化curl一个curl会话
        $ch = curl_init();

            //设置url
        $url = "http://apis.baidu.com/turing/turing/turing?key=879a6cb3afb84dbf4fc84a1df2ab7319&info=$info&userid=$userid";
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
        $a = json_decode($res);
        return $a;
    }
    $lei = new Api();
    $chat = $lei->tuling($usermessage,$uno);
    
    public function usermessages($usermessage,$tumessage,$time,$uno){

        //将各参数插入turing表
        $sql = "INSERT INTO usermessages(usermessage,tumessage,time,userno)
                VALUES('$usermessage','$tumessage','$time','$uno')";
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