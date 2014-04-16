<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2012-2013 The Program O Group
 * Written 11-28-2013 (Happy Thanksgiving!)
 * view_install_js.php
 * Provides the necessary JavaScript code for the install page
 ****************************************************/
?>
    <script type="text/javascript" src="<?php echo base_url('assets/js') ?>/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js') ?>/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js') ?>/jquery.validate.js"></script>
    <script type="text/javascript">
      var rowHeight = 16.5;
      var url = 'about:blank';
      var helpWindow = null; // global variable
      var container = $('#container');
      var availableHeight = $(window).height() - container.position().top - 40;
      //alert('height = ' + availableHeight);
      container.height(availableHeight);
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
          var url = '<?php echo base_url('install/help') ?>';

          helpPopups(url);
        });
        $('span.helpButton').attr('title','Click here to get help for the current item.').click(function() {
          var tmpHash = $(this).attr('id');
          hash = tmpHash.replace('hb_','');
          url = '<?php echo base_url('install/help') ?>#' + hash;
          helpPopups(url);
        });
        var emContent = $('.errMsg').html();
        if (emContent != '')
        {
          $('.errMsg').css('display', 'block');
        }
      });
      function helpPopups (url) {
        var options = 'location=1,menubar=1,toolbar=1,left=150,top=100,width=801,height=600,scrollbars=1';
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
