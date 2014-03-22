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
    <script type="text/javascript" src="<?php echo base_url('assets/scripts') ?>/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/scripts') ?>/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/scripts') ?>/jquery.validate.js"></script>
    <script type="text/javascript">
      var url = 'about:blank';
      var helpWindow = null; // global variable
      $(function() {
        var errMsg = $('#errMsg').html();
        if (errMsg != '') $('#errMsg').css('display', 'block');
        var tabsPos = $('#admin_tabs').position();
        var tabsTop = tabsPos.top;
        var screenHeight = $(window).height();
        var setHeight = screenHeight - tabsTop - 25;
        $('#admin_tabs').tabs();
        $('#admin_tabs').height(setHeight);
        $('#selectBot').focus();
        $( ".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav > *" )
          .removeClass( "ui-corner-all ui-corner-top" )
          .addClass( "ui-corner-bottom" );
        // move the nav to the bottom
        $( ".tabs-bottom .ui-tabs-nav" ).appendTo( ".tabs-bottom" );
      });
      function buildSelect(id) {
        var timezone = determine_timezone().timezone;
        var thisLocale = timezone.olson_tz;
        var label = '#' + id;
        for(var tz in olson.timezones) {
          var tmpTZ = olson.timezones[tz];
          var val = tmpTZ.olson_tz;
          $(label).addOption(val, val);
        }
        $(label).selectOptions(thisLocale);
      }
      function helpPopups (url) {
        var options = 'location=1,menubar=1,toolbar=1,left=150,top=100,width=800,height=600,scrollbars=1';
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
