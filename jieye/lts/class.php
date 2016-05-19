<!DOCTYPE html>
<html>
<head>
    <title>微信热门精选</title>

<?php
$shi = $_POST[shijian]; 
class weiXin{
	public function shiJan($shij){
    $ch = curl_init();
    $url = 'http://apis.baidu.com/txapi/weixin/wxhot?num=10&rand=1&word=%E7%9B%97%E5%A2%93%E7%AC%94%E8%AE%B0&page=1&src=%E4%BA%BA%E6%B0%91%E6%97%A5%E6%8A%A5';
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
$sj = $shijian->shiJan($shi);
?>
</head>
<body>
<?php
var_dump($sj);
?>
</body>
</html>