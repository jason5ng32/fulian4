<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<title>保存图片整蛊朋友</title>
	<style type="text/css">
		body {line-height: 1.8rem;font-size: 1.0rem;text-align: center;margin: 0 auto;}
		.pure-button {margin-bottom: 10px;font-family: inherit;font-size: 100%;padding: .5em 1em;color: #444;color: rgba(0,0,0,.8);border: 1px solid #999;border: transparent;background-color: #E6E6E6;text-decoration: none;border-radius: 2px;display: inline-block;zoom: 1.3;white-space: nowrap;vertical-align: middle;text-align: center;cursor: pointer;box-sizing: border-box;line-height: normal;}
		.button-warning {background: rgb(223, 117, 20); /* this is an orange */}
		.button-secondary {background: rgb(100, 191, 218); /* this is a light blue */}
		.pure-button {margin-bottom: 10px;}
	</style>
</head>
<body>


<?php

// 获得参数
$text = $_POST['text'];
$size = '300';
$baseurl = 'example.com';

// echo '<img src="http://localhost:8888/jz/code.php'.'?text='.$text.'&size='.$size.'">';

$code = file_get_contents('https://'.$baseurl.'/fulian4/code.php'.'?text='.$text.'&size=300');

file_put_contents("codes/code".date('Y-m-d-H-i-s').".png",$code);


//set the source image (foreground)
//set the source image (foreground)
$sourceImage = 'codes/code'.date('Y-m-d-H-i-s').'.png';

//set the destination image (background)
$destImage = 'background.jpg';

//get the size of the source image, needed for imagecopy()
list($srcWidth, $srcHeight) = getimagesize($sourceImage);

//create a new image from the source image
$src = imagecreatefrompng($sourceImage);

//create a new image from the destination image
$dest = imagecreatefromjpeg($destImage);

//set the x and y positions of the source image on top of the destination image
$src_xPosition = 215; //75 pixels from the left
$src_yPosition = 340; //50 pixels from the top

//set the x and y positions of the source image to be copied to the destination image
$src_cropXposition = 0; //do not crop at the side
$src_cropYposition = 0; //do not crop on the top
						
//merge the source and destination images
imagecopy($dest,$src,$src_xPosition,$src_yPosition,$src_cropXposition,$src_cropYposition,$srcWidth,$srcHeight);

//output the merged images to a file
/*
 * '100' is an optional parameter,
 * it represents the quality of the image to be created,
 * if not set, the default is about '75'
 */
$piccombine = imagejpeg($dest,'combines/combine'.date('Y-m-d-H-i-s').'.jpg',100);

//destroy the source image
imagedestroy($src);

//destroy the destination image
imagedestroy($dest);

echo '<img src="combines/combine'.date('Y-m-d-H-i-s').'.jpg" width="90%">';

echo "<br/><h2>长按图片保存，仅供娱乐</h2>";

?>

</body>
</html>