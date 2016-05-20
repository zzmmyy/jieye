<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="txt/html;charset=utf-8" />
    <title>小郑</title>
    <style type="text/css">
        body{font-family: 幼圆;font-size: 13px;color:cornflowerblue;}
        html{font-size:12px;}
        fieldset{width:380px; margin: 0 auto;}
        legend{font-weight:bold; font-size:14px;}
        label{float:left; width:100px; margin-left:10px;}
        .left{margin-left:250px;}
        input{width:100px;}
        textarea{margin-left:15px;border:solid bisque;border-style:inset;border-width:2px;}
        .bottom{margin-left:235px;width:940px;height:50px;font-size:30px;color:cornflowerblue;}
        .center{margin-left:15px;border:solid bisque;border-style:inset;border-width:5px;width:350px;height:260px;cursor: pointer;background-color: white;}
        .background1{background-image:url(12.jpg);width:700px;margin-left:100px;}
        .background{background-image:url(15.jpg);width:950px;height:600px;}
    </style>
</head>

<script language=JavaScript>
function InputCheck(ChatForm)
{
  if (ChatForm.usermessage.value == "")
  {
    alert("发送不可为空!");
    ChatForm.usermessage.focus();
    return (false);
  }
}

</script>

<body>
<div class="background">

    <div class="bottom">图灵小主，快来和小图灵聊天吧</div>
    <div class="background1">

        <fieldset>
        <legend>图灵机器人</legend>
        <div name="div" class="center">
        <!--输出php-->
        <?php
        error_reporting(0);
        $usermessage = $_POST['usermessage'];
        class tuling
        {
            public function chat($chat)
            {
            $ch = curl_init();
            $url = "http://apis.baidu.com/turing/turing/turing?key=879a6cb3afb84dbf4fc84a1df2ab7319&info=$chat&userid=eb2edb736";
            $header = array(
                'apikey: 3dbf5144aafe85722cb045424b109e1a',
            );
            // 添加apikey到header
            curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // 执行HTTP请求
            curl_setopt($ch , CURLOPT_URL , $url);
            $res = curl_exec($ch);

            $tu = json_decode($res);
            return $tu;
            }
        }
        $lei = new tuling();
        $tl = $lei->chat($usermessage);
        print_r($tl);
        ?>
        </div>
        <form method="post" action="tuling.php" onSubmit="return InputCheck(this)">

            <p>
                <label for="usermessage" class="label">一起聊天吧：</label><br/><br/>
                <textarea id="usermessage" name="usermessage" cols="50" rows="4"></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="发送" class="left" />
            </p>
            </form>
    </fieldset>
    </div>
    </div>
</body>
</html>
