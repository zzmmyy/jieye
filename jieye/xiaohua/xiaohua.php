<!DOCTYPE html>
<html>
<head>
    <title>易源_笑话大全</title>
</head>
<body>
<?php
$page = $_POST['page'];

class xiaoHua
{
    public function xh($num)
    {

    $ch = curl_init();
    $url = "http://apis.baidu.com/showapi_open_bus/showapi_joke/joke_text?page=$num";
    $header = array(
        'apikey: 3dbf5144aafe85722cb045424b109e1a',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);

    $a = json_decode($res);
    return $a;
  
}
}
$xiaohua = new xiaoHua();
$pg = $xiaohua->xh($page);
print_r($pg);
?>
</body>
</html>