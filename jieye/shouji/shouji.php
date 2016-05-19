<!DOCTYPE html>
<html>
<head>
    <title>电话号码归属地查询</title>
</head>
<body>
<?php
   $num = $_POST['telphone']; 
   class haoma
   {
      public function di($number)
      {
      $ch = curl_init();
      $url = "http://apis.baidu.com/apistore/mobilenumber/mobilenumber?phone=$number";
      $header = array(
          'apikey: 3dbf5144aafe85722cb045424b109e1a',
      );
      // 添加apikey到header
      curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      // 执行HTTP请求
      curl_setopt($ch , CURLOPT_URL , $url);
      $res = curl_exec($ch);
      $adr = json_decode($res);    
      return $adr;
      }
    }
    $lei = new haoma();
    $guishu = $lei->di($num);
    print_r($guishu);
?>
</body>
</html>