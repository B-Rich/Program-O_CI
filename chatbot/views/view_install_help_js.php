<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2012-2013 The Program O Group
 * Written 11-28-2013 (Happy Thanksgiving!)
 * view_install_help_js.php
 * Contains the Javascript code for the install script's help page.
 ****************************************************/
?>
    <script type="text/javascript" src="<?php echo base_url('assets/scripts') ?>/jquery.js"></script>
    <script type="text/javascript">
      function highlight() {
        var myHash = location.hash;
        //alert('hash = '+hash);
        $('div.row').removeClass('highlighted');
        $(myHash).addClass('highlighted');
        document.close();
        window.parent.helpWindow = null;
      }
    </script>
