<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton, Liz Perreau and Brent Edds
 * ©2012-2013 The Program O Group
 * Written 11-26-2013
 * view_main.php
 * Contains the HTML template for the Program O install page
 ****************************************************/
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $pageTitle ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images') ?>/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/program_o2.css" type="text/css" />
  </head>
  <body>
    <div class="errMsg"><?php echo (isset($errMsg)) ? $errMsg : '' ?></div>
    <div id="leftLogo">&nbsp;</div>
    <div id="rightLogo">&nbsp;</div>
    <div id="title">
      <div id="titlespan"><?php echo  $pageTitle ?></div>
    </div>
    <div id="container">
<?php echo $content ?>
    </div>
<?php echo $lowerScript ?>
  </body>
</html>