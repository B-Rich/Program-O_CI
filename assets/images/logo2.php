<?php
// test PNG opacity gradient
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2012-2013 The Program O Group
 * Written 11-28-2013 (Happy Thanksgiving!)
 * logo.php
 * Creates a dynamic logo image for the Program O pages
 ****************************************************/
  error_reporting(E_ALL);
  ini_set('display_errors', true);
  //$img = imagecreatetruecolor(512,128);

  #$bkg = imagecreatefrompng('logo_fade_bkg.png');
  $bkg = imagecreatetruecolor(512, 128);
  $red = imagecolorallocate($bkg, rand(160,255),0,0);
  $white = imagecolorallocate($bkg, 255,255,255);
  $green = imagecolorallocatealpha($bkg, 0,rand(64,190),0,64);
  $tColor = imagecolorallocatealpha($bkg, 32,32,32,48);
  $shadow1 = imagecolorallocatealpha($bkg, 48,48,48,64);
  $shadow2 = imagecolorallocatealpha($bkg, 64,64,64,80);
  imagealphablending($bkg, true);
  imagesavealpha($bkg, true);
  $trans = imagecolorallocatealpha($bkg, 255,255,255,127);
  imagefill($bkg,0,0,$trans);
  # draw gradient
  for($n=0; $n<512; $n+=0.5)
  {
    $index = 255-intval($n / 2);
    $alpha = intval($n / 4);
    #$curColor = imagecolorallocatealpha($bkg,86,175,234,$alpha-1);
    $curColor = imagecolorallocatealpha($bkg,79,148,193,$alpha-1);
    imageline($bkg,512,$n,512-$n,128-$n,$curColor);
  }

  # draw string art
  $y_int = 8;
  $x_int = 32;
  for ($n = 1; $n<16; $n++)
  {
    $x0 = 0;
    $x1 = $n * $x_int;
    $y0 = $n * $y_int;
    $y1 = 128;
    //imageline($bkg,$x0,$y0,$x1,$y1,$red);
    imageline($bkg,512,128-$y0,512-$x1, 0, $red);
  }

  imagettftext($bkg, 14, 0, 18,123,$shadow1,'../fonts/BAZOOKA.TTF','Image script ©2013 Geek Cave Creations');
  imagettftext($bkg, 14, 0, 17,122,$tColor,'../fonts/BAZOOKA.TTF','Image script ©2013 Geek Cave Creations');
  imagettftext($bkg, 14, 0, 15,120,$white,'../fonts/BAZOOKA.TTF','Image script ©2013 Geek Cave Creations');
  imagettftext($bkg, 14, 0, 16,121,$green,'../fonts/BAZOOKA.TTF','Image script ©2013 Geek Cave Creations');
  imagettftext($bkg, 14, 0, 16,121,$green,'../fonts/BAZOOKA.TTF','Image script ©2013 Geek Cave Creations');

  # display the image
  header('Content-type: image/png');
  imagepng($bkg, null, 0);
  imagedestroy($bkg);

?>