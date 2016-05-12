<?php
	session_start();
	//生成四位随机数
	$pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	for($i = 0; $i < 4; $i++) 
	{
        $code .= $pattern{mt_rand(0, 35)};
	}
	$_SESSION['pic'] = $code;//将随机数保存到session
	$im = imagecreatetruecolor(60,20);//创建一张宽60高20像素的图片
	$bg = imagecolorallocate($im,255,255,255);//设置图片的背景颜色为白色
	imagefill($im,0,0,$bg);//载入背景颜色
	$ft = imagecolorallocate($im,0,0,0);//设置字体颜色为
	$xian = imagecolorallocate($im,200,200,200);//线条的颜色
	$kuang = imagecolorallocate($im,0,0,0);//设置框的颜色
	imagerectangle($im,0,0,59,19,$kuang);//设置边框
	$dian = imagecolorallocate($im,0,0,0);//噪点的颜色
	//imagefill($im,0,0,$dian);
	imageline($im,10,5,50,rand(0,20),$xian);//绘制一根线条
	
	for($i = 0;$i < 100;$i++)//使用for循环来绘制多个噪点
	{
		imagesetpixel($im,rand(10,50),rand(5,40),$dian);
	}
	imagestring($im,6,10,0,$code,$ft);
	//输出图片
	header("Content-type:image/jpeg");
	ob_clean();
	imagejpeg($im);
?>