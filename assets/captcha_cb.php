<?php
      /*******************************************************/
     /*                    CAPTCHA_cb.php                   */
    /*                  Color Blind Version                */
   /* Creates a simple security image, for bot prevention */
  /*           ©2009-2014 Geek Cave Creations            */
 /*                Coded by Dave Morton                 */
/*******************************************************/
  session_name("c4us"); // Optional - Change or delete as needed.
  session_start();
  error_reporting(E_ALL);
  ini_set('log_errors', 1);
  ini_set('display_errors', 0);
  ini_set('error_log', './captcha_cb.error.log');
  if (!isset($_SERVER['HTTP_REFERER']) || checkValidReferer() === false) makeFakeImage();

  // Set image directory
  $imageDir = 'captcha-images';
/*
captcha.php comments/help

This particular CAPTCHA script takes a slightly different approach to proving that
the entity is human,rather than a bot, by combining both a simple question and a
small, randomly chosen image to create the CAPTCHA image. Initially, this form of
test can be "broken" with "supervised training" of the AI, due to the limited number
of test images employed, but it can easily be augmented by either adding more images
to the included data file and directory, or perhaps by "scraping" Google Image Search
for certain descriptive terms. This is an avenue I wish to explore in greater detail
later.


To use this script, simply create an image tag, with this file as the SRC. This
script has a few options available for use in the query string, which are listed below:

b (flag) (no value) causes the CAPTCHA image to have a black background
g (flag) (no value) causes the CAPTCHA image to use a gradient background
w (int) (200) Sets the width of the image
h (int) (75) Sets the height of the image
gc (string) CSS style color value string for setting the gradient color
lang (string) sets the language to be used for the questions and answers. Currently
used language codes are en(English), es(Spanish), fr(French) and de(German). ?More are planned, as

Flag variables don't require a value in the query string. Simply using the variable
alone is sufficient to trigger it's use. For example, the following will create
an image 300 pixels wide, by 100 pixels tall, using a black background:

<img src="captcha_cb.php?b&amp;w=300&amp;h=100" />

The minimum size for the CAPTCHA image is 200x75, to allow for both the describing
image, and the question text. Larger image sizes are allowed, and both the font
size for the question text and the describing image should scale accordingly.

The CAPTCHA script will randomly pick from an array of valid keywords, then generate
the image based on that word, and store the SHA1 value for that word. CAPTCHA
validation in your script then needs to compare the session variable
$_SESSION['capKey'] with the SHA1 of the submitted response from the user. A
match should allow the user access, while failure should be handled accordingly.


  */
  $minX = 200;
  $minY = 75;
  $X = (isset($_GET['w'])) ? $_GET['w'] : $minX; // Determine width of image
  $Y = (isset($_GET['h'])) ? $_GET['h'] : $minY; // Determine height of image
  $X = ($X < $minX) ? $minX : $X;
  $Y = ($Y < $minY) ? $minY : $Y;
  $b = (isset($_GET['b'])) ? true : false; // determine whether a black background is desired
  $g = (isset($_GET['g'])) ? true : false; // determine whether a gradient background is desired
  $gradientColor = (isset($_GET['gc'])) ? $_GET['gc'] : false; // determine whether a gradient background is desired
  $lang = (isset($_GET['lang'])) ? $_GET['lang'] : 'en'; // Determine language used
  $language = array(
    'de' => 'German',
    'en' => 'English',
    'es' => 'Spanish',
    'fr' => 'French',
    'nl' => 'Dutch',
  );
  if (!in_array($lang,array_keys($language))) $lang = 'en';
  $english = file('en.dat');
  $englishAnswers = explode(', ', rtrim($english[0]));
  $questions = (file_exists("$lang.dat")) ? file("$lang.dat") : $english;
  $_SESSION['capKeys'] = $questions[0];
  $capKeys = explode(', ', rtrim($questions[0]));
  $questions[0] = ''; // remove answers from array, to make searching easier later
  foreach ($questions as $key => $question) {
    $questions[$key] = rtrim($question);
  }
  $defaultAspectRatio = 200 / 75;
  $xScale = $X / $minX;
  $yScale = $Y / $minY;
  $aspectRatio = $X / $Y;
  $fs = 9 * $xScale;
  $fY = $fs * 1.1; // Starting vertical location of the question (lower, rather than upper)
  $fontName = 'fonts/arial.ttf';
  $fsl = 20 * floor((200 / $X) * ($aspectRatio / $defaultAspectRatio));
  $fsh = 26 * floor((200 / $X) * ($aspectRatio / $defaultAspectRatio));
  $vCenter = floor($Y / 2);
  $capString = ""; // This is the 'question string' to present to the user, and is built later
  $capKey = getCapKey();
  $eCapKeyIndex = array_search($capKey,$capKeys);
  $englishCapKey = $englishAnswers[$eCapKeyIndex];
  $_SESSION['englishCapKey'] = $capKey;
  $objectWord = '';
  $fn = '';
  $number = '';
  switch ($englishCapKey) {
    case 'one':
    case 'two':
    case 'three':
    case 'four':
    case 'five':
      $fn = "lines_$englishCapKey"."_*.png";
      $capString = $questions[1];
      break;
    case 'circle':
    case 'square':
    case 'triangle':
    case 'heart':
      $fn = "shape_$englishCapKey"."_*.png";
      $capString = $questions[2];
      break;
    case 'man':
    case 'woman':
      $fn = "gender_$englishCapKey"."_*.png";
      $capString = $questions[3];
      break;
    case 'cat':
    case 'dog':
    case 'fish':
    case 'house':
    case 'fire':
    case 'key':
      $fn = "object_$englishCapKey"."_*.png";
      $capString = $questions[4];
      break;
    case 'down':
    case 'left':
    case 'right':
    case 'up':
      $fn = "direction_$englishCapKey"."_*.png";
      $capString = $questions[5];
      break;
  }

  // select a random image from the collection
  try {
    $overlayImages = glob("$imageDir/$fn");
  }
  catch(Exception $e) {
    $x = file_put_contents('captcha_cb.errors.txt', "fn = $fn\r\n", FILE_APPEND);
    die();
  }
  $oiCount = count($overlayImages);
  $oiIndex = rand(0,$oiCount - 1);
  $overlayImageFilename = $overlayImages[$oiIndex];
  #die ("<pre>\nOverlayImages = " . print_r($overlayImages,true) . "\nfn = $fn. oiCount = $oiCount.");
  // Set up the image
  $image = imagecreatetruecolor($X, $Y);
  $white = imagecolorallocate ($image, 255, 255, 255);
  $black = imagecolorallocate ($image, 0, 0, 0);
  $black = ($b) ? imagecolorallocate ($image, 128, 128, 128) : $black;
  $bkg = ($b) ? $black : $white;
  $fgc = ($b) ? $white : $black;

  // If black is the chosen background, lighten the current "black" to a medium grey

  // Fill the image with the desired background (the gradient will be handled later)
  imagefill ($image, 0, 0, $bkg);


  // Paints the gradient background, if set
  if ($g or $gradientColor !== false) {
    $baseGradientColor = ($b) ? 0 : 255;
    $incrementUpDown = ($b) ? -1 : 1;
    $gradientWidth = ($X / 2);
    if ($gradientColor === false) {
      $gRnd = (rand(0,100) % 3);
      for ($gradientIndex = 0; $gradientIndex <= $gradientWidth; $gradientIndex++) {
        $l = $baseGradientColor - ($incrementUpDown * (($gradientIndex / ($gradientWidth)) * 255));
        $gr = $gg = $gb = $l;
        switch ($gRnd) {
          case 0:
          $gr = 255;
          break;
          case 1:
          $gg = 255;
          break;
          case 2:
          $gb = 255;
          break;
          default:
        }
        $color = imagecolorallocate($image, $gr, $gg, $gb);
        imageline($image, $gradientIndex, $fY + 2, $gradientIndex, $Y, $color);
        imageline($image, $X - $gradientIndex, $fY + 2, $X - $gradientIndex, $Y, $color);
      }
    }
    else {
      $gbLen = strlen($gradientColor);
      $continue = true;
      switch ($gbLen) {
        case 6:
        $targetColorRed   = hexdec(substr($gradientColor, 0, 2));
        $targetColorGreen = hexdec(substr($gradientColor, 2, 2));
        $targetColorBlue  = hexdec(substr($gradientColor, 4, 2));
        break;
        case 3:
        $rHex = substr($gradientColor, 0, 1);
        $gHex = substr($gradientColor, 1, 1);
        $bHex = substr($gradientColor, 2, 1);
        $targetColorRed   = hexdec("$rHex$rHex");
        $targetColorGreen = hexdec("$gHex$gHex");
        $targetColorBlue  = hexdec("$bHex$bHex");
        break;
        default:
        $continue = false;
      }
      // Calculate color increments
      $incrementRed   = ($baseGradientColor - $targetColorRed)   / $gradientWidth;
      $incrementGreen = ($baseGradientColor - $targetColorGreen) / $gradientWidth;
      $incrementBlue  = ($baseGradientColor - $targetColorBlue)  / $gradientWidth;
      #die("targetColorRed = $targetColorRed, targetColorGreen = $targetColorGreen, targetColorBlue = $targetColorBlue.<br />\nincrementRed = $incrementRed, incrementGreen = $incrementGreen, incrementBlue = $incrementBlue.<br />\nbaseGradientColor = $baseGradientColor, gradientWidth = $gradientWidth, incrementUpDown = $incrementUpDown.");
      if ($continue) {
        for ($gradientIndex = 0; $gradientIndex <= $gradientWidth; $gradientIndex++) {
          $currentRedValue   = $baseGradientColor - ($gradientIndex * $incrementRed);
          $currentGreenValue = $baseGradientColor - ($gradientIndex * $incrementGreen);
          $currentBlueValue  = $baseGradientColor - ($gradientIndex * $incrementBlue);
          $color = imagecolorallocate($image, $currentRedValue, $currentGreenValue, $currentBlueValue);
          imageline($image, $gradientIndex, $fY + 2, $gradientIndex, $Y, $color);
          imageline($image, $X - $gradientIndex, $fY + 2, $X - $gradientIndex, $Y, $color);
        }
      }
    }
  }

  // get the description image
  $fn = str_replace('[capKey]', $englishCapKey, $fn);
  $fn = str_replace('[objectName]', $objectWord, $fn);
  $overlay = imagecreatefrompng($overlayImageFilename);
  $trans = imagecolorallocatealpha($overlay,0,0,0,127);

  // set overlay dimention variables
  $srcW = imagesx($overlay);
  $srcH = imagesy($overlay);
  $dstW = $srcW * $xScale;
  $dstH = $srcH * $yScale;
  $offsetX = rand(65,$X - $dstW);

  imagecopyresampled($image,$overlay,$offsetX,($Y - $dstH) + 2,0,0,$dstH,$dstH,$srcW,$srcH);



  // Base value for the distance between each character
  imagettftext($image,$fs,0,1,$fY - 1,$bkg,$fontName,$capString);
  imagettftext($image,$fs,0,1,$fY,$bkg,$fontName,$capString);
  imagettftext($image,$fs,0,2,$fY - 1,$bkg,$fontName,$capString);
  imagettftext($image,$fs,0,3,$fY + 1,$bkg,$fontName,$capString);
  imagettftext($image,$fs,0,2,$fY,$fgc,$fontName,$capString);
  imagettftext($image,$fs,0,2,$Y - ($fs / 2),$fgc,$fontName,$language[$lang]);
  #imagettftext($image,$fs,0,2,$Y - ($fs / 2),$fgc,$fontName,$capKey);

  $_SESSION["capKey"] = sha1(strtolower($capKey));

  #die("<br />overlay filename = $overlayImageFilename, objectWord = $objectWord, capString = $capString, count = " .  ".");
  if (empty($overlayImageFilename)) trigger_error("objectWord = $objectWord, capString = $capString, capKey = $capKey.", E_USER_NOTICE);

  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  header ("Content-type: image/png");
  imagepng($image);
  imagedestroy($image);
  imagedestroy($overlay);
  // Debug
  #file_put_contents('./capKey.txt', "$capKey\r\n",FILE_APPEND);

  function getCapKey() { // guarantees different image each time
    global $capKeys;
    if (!isset($_SESSION['capKey'])) $_SESSION['capKey'] = '';
    $capKeyCount = count($capKeys);
    $capNum = rand(0,$capKeyCount - 1);
    $capKey = $capKeys[$capNum];
    #$capKey = 'house';
    if (sha1($capKey) == $_SESSION['capKey']) $capKey = getCapKey();
    $_SESSION['capKey'] = sha1($capKey);
    $_SESSION['rawCapKey'] = $capKey;
    return $capKey;
  }

  function checkValidReferer() {
    $out = false;
    $ref = $_SERVER['HTTP_REFERER'];
    $lh = $_SERVER['HTTP_HOST'];
    if (stripos($ref,$lh) !== false) $out = true;
    return $out;
  }

  function makeFakeImage() {
    ini_set('html_errors',1);
    $textArray = array('DENIED', 'You Suck', 'LOSER');
    $text = $textArray[rand(0,count($textArray)-1)];
    $w = 200;
    $h = 75;
    $img = imagecreate($w,$h);
    $red   = rand(0,160);
    $green = rand(0,160);
    $blue  = rand(0,160);
    $randomColor = array($red, $green, $blue);
    $bkg = imagecolorallocate($img, $red/2, $green/2, $blue/2);
    #$bkg = imagecolorallocate($img, 0, 0, 0);
    $white = imagecolorallocate($img, 255, 255, 255);
    imagefill($img,0,0,$white);
    for ($loop = 0; $loop < strlen($text); $loop++) {
      $curChar = substr($text, $loop, 1);
      $angle = rand(-45,45);
      $fgcR = $randomColor[rand(0,2)];
      $fgcG = $randomColor[rand(0,2)];
      $fgcB = $randomColor[rand(0,2)];
      $fgc = imagecolorallocate($img,($fgcR/2), ($fgcG/2),($fgcB/2));
      $fs = rand($h/6, $h/4);
      $xFactor = $w / strlen($text);
      $x = ($fs / 5) + (($loop * $xFactor) + rand(-1 * ($fs/3), ($fs/3)));
      #$y = $h + ($fs / 2) - ($h / ($loop+1) - rand(-1 * $fs, $fs));
      $y = ($fs / 2) + (($h/2) + rand(-1 * $fs, $fs));
      #die ("x = $x, y = $y");
      imagettftext($img, $fs, $angle, $x, $y, $fgc, 'fonts/arial.ttf',$curChar);
    }
      #die();
      header('Content-type: image/jpeg');
      imagejpeg($img,null,7);
      imagedestroy($img);
      die();


  }



?>