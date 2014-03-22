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
  $red = imagecolorallocate($bkg, rand(128,255),0,0);
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
    imageline($bkg,0,$n,$n,128-$n,$curColor);
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
    imageline($bkg,0,128-$y0,$x1, 0, $green);
  }

  #add text
  imagettftext($bkg,35,17,33,123,$shadow2,'../fonts/BAZOOKA.TTF', 'Program O');
  imagettftext($bkg,35,17,30,120,$shadow1,'../fonts/BAZOOKA.TTF', 'Program O');
  imagettftext($bkg,35,17,27,117,$tColor,'../fonts/BAZOOKA.TTF', 'Program O');

  # load overlay
  $ovl = imagecreatefrompng('bunny.png');
  $xLoc = rand(220,441);
  $yLoc = rand(30,58);
  imagealphablending($ovl, true);
  //imagesavealpha($ovl, true);
  imagecopy($bkg,$ovl,$xLoc,$yLoc,0,0,61,100);
/*
  header('Content-type: text/plain');

*/
  header('Content-type: image/png');
  imagepng($bkg, null, 0);
  imagedestroy($bkg);
  imagedestroy($ovl);

?>