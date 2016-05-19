<!DOCTYPE html>
<html>
<head>
<title>微信热门精选</title>
</head>
<body>
<?php
$numb = $_POST['number'];
$word = $_POST['word']; 
class weiXin{
    public function shiJan($num,$shij){
    $ch = curl_init();
    $url = "http://apis.baidu.com/txapi/weixin/wxhot?num=$num&rand=1&word=$shij";
    $header = array(
        'apikey: 3dbf5144aafe85722cb045424b109e1a',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);

    var_dump(json_decode($res));
    }
}
$shijian = new weiXin();
$sj = $shijian->shiJan($numb,$word);

print_r($sj);
?>
</body>
</html>