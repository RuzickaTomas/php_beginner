<?php
define('HEIGHT', 70);
define('WIDTH', 150);
define('LENGTH', 6);
define('FONT', realpath('./font.ttf'));

// start SESSION
//session_start();

$text = "";

$abc = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$abc_len = strlen($abc);

// create image
$img = @imagecreate(WIDTH, HEIGHT) or die("Cannot Initialize new GD image stream");
$red = rand(100, 255);
$green = rand(100, 255);
$blue = rand(100, 255);
// pastel background color
$pastel = imagecolorallocate($img, $red, $green, $blue);
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);

// border
imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
$i=0;
while($i < LENGTH) {
    $i++;
    $r = rand(0,4);
    // generate captcha code 
    $randChar = rand(0,$abc_len-1);
    $text .= $abc[$randChar];
    // shading

    imagettftext($img, 22+$r, $r, 11+(19*$i)+$r, 39+$r, $black, FONT, $text[$i]);
    imagettftext($img, 22+$r, $r, 9+(19*$i)+$r, 39+$r, $black, FONT, $text[$i]);
    imagettftext($img, 22+$r, $r, 12+(19*$i)+$r, 41+$r, $black, FONT, $text[$i]);
    imagettftext($img, 22+$r, $r, 10+(19*$i)+$r, 39+$r, $white, FONT, $text[$i]);
}

// save generated code to SESSION
$_SESSION['captcha'] = $text;

// add header
header('Content-Type: image/png');
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 2030 05:00:00 GMT");

// return image
imagepng($img);
imagedestroy($img);
?>