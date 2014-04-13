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
    <title>Program O Installation</title>
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/style.css" type="text/css" />
  </head>
  <body>
    <div class="errMsg"><?php echo (isset($errMsg)) ? $errMsg : '' ?></div>
    <div id="logo">&nbsp;</div>
    <div id="title">
      <div id="titleSpan">
        <?php echo $pageTitle ?>
      </div>
    </div>
    <div id="container">
<?php echo $content ?>
    </div>
    <div class="spacer">&nbsp;</div>
    <script type="text/javascript" src="<?php echo base_url('assets/scripts') ?>/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/scripts') ?>/jquery.validate.js"></script>
    <script type="text/javascript">
      var rowHeight = 16.5;
      var url = 'about:blank';
      var helpWindow = null; // global variable
      $(function() {
        var sWidth = $(window).width();
        $('#save_stateSession').attr('checked', true);
        $('#adm_dbp_confirm').blur(function() {
          if (!validatePass()) {
            alert('passwords don\'t match, or both are empty!');
          }
        });
        $('#submit').click(function() {
          var dbp = $('#dbp').val();
          //alert('dbp = ' + dbp);
          if (dbp == '')
          {
            var blankPass = confirm('Setting up a database with no password is dangerous. Are you sure you want to continue?');
            if (!blankPass) return false;
          }
          return confirm("You are about to over-write the configuration file.\nIncorrect or incomplete data will cause errors.\nAre you sure you wish to continue?");
        });
        $('#helpLink1').click(function(e) {
          e.preventDefault();
          var url = 'help';
          helpPopups(url);
        });
        $('span.helpButton').attr('title','Click here to get help for the current item.');
        $('span.helpButton').click(function() {
          var tmpHash = $(this).attr('id');
          hash = tmpHash.replace('hb_','');
          url = 'help#' + hash;
          helpPopups(url);
        });
        var emContent = $('.errMsg').html();
        if (emContent != '')
        {
          $('.errMsg').css('display', 'block');
        }
      });
      function helpPopups (url) {
        var options = 'left=150,top=100,width=800,height=600,scrollbars=1';
        if (helpWindow == null || helpWindow.closed) {
          helpWindow = window.open(url,'helpWindow',options,true);
          setTimeout(function(){helpWindow.highlight()},500);
        }
        else if (helpWindow.location == null) {
          helpWindow.close();
          helpWindow = null;
          helpPopups (url);
        }
        else {
          helpWindow.location.replace(url);
          helpWindow.focus();
          helpWindow.highlight();
        }
      }
      function validatePass() {
        var pw1 = $('#adm_dbp').val();
        var pw2 = $('#adm_dbp_confirm').val();
        var out = true;
        out = ((pw1 != '') && (pw1 == pw2));
        return out;
      }
    </script>
</body>
</html>