<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton, Liz Perreau and Brent Edds
 * ©2012-2013 The Program O Group
 * Written 11-26-2013
 * view_install_error.php
 * Displays error messages for the install script.
 ****************************************************/
?>
        <div class="row bold red fullSize center shadowBorderOutset">Installation Failed!</div>
          <div class="row center bold">
            <p>There was a problem with the installation process. Please see the error messages, below:</p>
          </div>
          <div class="row">
<?php
  /*foreach ($errors as $index => $error)
  {
    echo "<p>$index: $error</p>\n";
  }*/
  echo "<pre>$errors</pre>";
?>
          </div>
        <div id="leftWarning" class="floatLeft bold red"><?php echo $leftWarning ?></div>
        <div id="rightWarning" class="floatRight bold red"><?php echo $rightWarning ?></div>
