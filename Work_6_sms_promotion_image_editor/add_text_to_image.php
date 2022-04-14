<?php

$ext = $_POST['ext'];
if($ext == 'png')
{
    header('Content-type: image/png');
}else if($ext == 'jpg' || $ext == 'jpeg')
{
    header('Content-type: image/jpeg');   
}else if($ext == 'gif')
{
    header('Content-type: image/gif');
}
include('image_lib.php');
$top = $_POST['top'];
$left = $_POST['left'];
$R = $_POST['R'];
$G = $_POST['G'];
$B = $_POST['B'];
$rotationtext = $_POST['rotationtext'];
$rotationimage = $_POST['rotationimage'];
$fonteditor = $_POST['fonteditor'];
$fontstyle = $_POST['font'];

$txt=imagelib("{$_POST['texteditor']}");
$txt=implode(" ",$txt);
$image_bg= $_FILES['imageeditor']['tmp_name'];
list($width, $height, $type, $attr) = getimagesize($image_bg);

$width = ($width*$left)/100;
$height = ($height*$top)/100;


if($ext == 'png')
{
    $im=imagecreatefrompng($image_bg);
}else if($ext == 'jpg' || $ext == 'jpeg')
{
    $im=imagecreatefromjpeg($image_bg);
}else if($ext == 'gif')
{
    $im=imagecreatefromgif($image_bg);
}

$im=imagerotate($im, $rotationimage, 0);


$font="font/$fontstyle";
$color=imagecolorallocate($im,$R,$G,$B);
imagefttext($im,$fonteditor,$rotationtext,$width,$height,$color,$font,$txt);

if($ext == 'png')
{
    imagepng($im);
}else if($ext == 'jpg' || $ext == 'jpeg')
{
    imagejpeg($im);
}else if($ext == 'gif')
{
    imagegif($im);
}



imagedestroy($im);

?>