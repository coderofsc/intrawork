<?php
require(dirname(__FILE__).DIRECTORY_SEPARATOR.'../bootstrap.php');

putenv('GDFONTPATH=' . realpath('.'));

$code = rand(1000,9999);

$prefix = isset($_GET["prefix"])?("_".trim($_GET["prefix"])):"";
$size   = isset($_GET["size"])?intval($_GET["size"]):1;
$alpha  = isset($_GET["alpha"])?true:false;

$_SESSION['captcha'.$prefix] = $code;

if ($size == 2) {
    define ("W", 65);
    define ("H", 30);
} else {
    define ("W", 50);
    define ("H", 25);
}

$im = imagecreatetruecolor( W, H );

if ($alpha) {
    imagealphablending( $im, false );
    $col = imagecolorallocate( $im, 238, 238, 238);
    $trans = imagecolortransparent($im, $col);
    imagefilledrectangle( $im, 0, 0, W, H, $trans );
    imagealphablending( $im, true );
} else {
    $col = imagecolorallocate( $im, 238, 238, 238);
    imagefilledrectangle( $im, 0, 0, W, H, $col );
}


settype ($code, "string");

$Color=array();
$c=array();
$a=array();
$s=array();
$x=array();
$xx=-8;
$dc=70;

for ($i=0;$i<4;$i++) {
	$dc1=rand(-$dc,$dc);
	$dc2=rand(-$dc,$dc);
	$dc3=rand(-$dc,$dc);
	$Color[$i] = imageColorAllocate($im, 251, 115+$dc3, 32+$dc3);

	$c[$i] = substr($code, $i, 1);
	$a[$i] = rand(-15,15);
	$s[$i] = ($size==2)?rand(25,30):rand(20,22);
	$xx+=rand(0,0)+(($size==2)?14:10);
	$x[$i] = $xx;

	imagettftext ($im, $s[$i], $a[$i], $x[$i], ($size==2)?28:21, $Color[$i], "myriadcbi.ttf", $c[$i]);
}

Header("Content-type: image/png");
imagePng($im);
imageDestroy($im);
?>