<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton, Liz Perreau and Brent Edds
 * ©2012-2013 The Program O Group
 * Written 11-26-2013
 * view_install_help.php
 * Displays the help page for the install script.
 ****************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Program O Install - help</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/help.css" type="text/css">
    <style type="text/css">
      span.c1 {text-decoration: underline}
    </style>
  </head>
  <body onload="highlight()">
    <div class="center big">
      <strong>What all this stuff means...</strong>
    </div>
    <div>
      This help file is intended to describe the various settings
      used to install Program O to your website. Each section is
      explained, and when necessary examples are given. Some
      settings are automatically generated, but should be checked
      carefully for accuracy. For more information, or to ask
      questions, please check out the <a href=
      "http://www.program-o.com/forum/" target="_blank">Program O
      Forums</a>.<br>
      <div>
      </div>
    </div>
    <div class="big bold center">
      General Configuration
    </div>
    <div class="bold">
    </div>
    <div class="bold center underline">
      Botmaster Info
    </div>
    <div class="row" id="botmaster_name">
      <span class="label">Your Name</span>
      <div class="description">
        Fairly well self-explanatory. Just enter what you want your
        bot's visiters to know you by.
      </div>
    </div>
    <div class="row" id="debugemail">
      <span class="label">Email Address</span>
      <div class="description">
        Used internally to set up contact details, and to
        (optionally) send debugging data. See below for debugging
        options.
      </div>
    </div>
    <div class="row">
    </div>
    <div class="bold center underline">
      Bot Configuration
    </div>
    <div>
      Much of the information in this section is pretty much self
      explanatory, but in the interest of being thorough, the
      following items are included. :)
    </div>
    <div class="row" id="bot_name">
      <span class="label">Bot Name</span>
      <div class="description">
        It's been said that names are the cornerstone of existence.
        Names also have power. Choose your bot's name wisely.
      </div>
    </div>
    <div class="row" id="bot_desc">
      <span class="label">Bot Description</span>
      <div class="description">
        This is where you provide whatever "back-story" or
        attributes you like for your chatbot. Feel free to leave
        this blank, but remember that a more well thought out bot
        will USUALLY make for a higher quality bot.
      </div>
    </div>
    <div class="row" id="bot_active">
      <span class="label">Bot Active</span>
      <div class="description">
        In order for a chatbot to be visible and/or usable, it has
        to be marked in the database as active, but there are times
        when you need to disable or hide your chatbot. Changing
        this setting in the admin pages is the best way to handle
        that. If you want folks to be able to use your bot, then
        this needs to be set to TRUE (checked).
      </div>
    </div>
    <div class="bold">
    </div>
    <div class="bold big underline center">
      Database Configuration
    </div>
    <div class="bold">
    </div>
    <div class="bold underline center">
      Database Connection Info
    </div>
    <div class="red">
      Please note that you <strong>must</strong> have already
      created the database for your bot, though that database can
      be empty (the script will create the necessary tables
      automatically). This is so because many web hosting companies
      do not allow their customers to create new databases except
      through their web hosting control panels. Please have the
      database connection information ready at this point.
    </div>
    <div class="row" id="dbh">
      <span class="label">Database Host Name</span>
      <div class="description">
        Default: localhost<br>
        This setting is part of the local database login
        credentials that allow Program O to connect to your bot's
        local database. Under the vast majority of circumstances,
        this is simply 'localhost', but there is the occasional
        rare exception.
      </div>
    </div>
    <div class="row" id="dbPort">
      <span class="label">Database Port</span>
      <div class="description">
        Default: 3306<br>
        Required only in the very rare case that the database
        server has been configured to use a different port.
      </div>
    </div>
    <div class="row" id="dbn">
      <span class="label">Database Name</span>
      <div class="description">
        When you performed the task of creating your local
        database, you should have already named the DB, along with
        configuring username and password. The DB name from that
        information goes here.
      </div>
    </div>
    <div class="row" id="dbu">
      <span class="label">Database Username</span>
      <div class="description">
        Just as with the name of the database, above, this is part
        of the connection information that you should have gathered
        when you set up your bot's DB.
      </div>
    </div>
    <div class="row" id="dbp">
      <span class="label">Database Password</span>
      <div class="description">
        This is the password for your script to access your bot's
        database. There's no confirmation for this field, like
        there was with the admin password, earlier, so be careful
        to ensure it's entered correctly.
      </div>
    </div>
    <div class="row" id="new_install">
      <span class="label">Installation Type</span>
      <div class="description">
        If you're just doing an upgrade install, be sure to select
        the "Upgrade" option, as choosing "New Install" will wipe
        out any user, chatbot, or configuration settings that may
        be stored in the database.
      </div>
    </div>
    <div class="bold">
    </div>
    <div class="bold underline center">
      Chatbot Administration Info
    </div>
    <div class="row" id="adm_dbu">
      <span class="label">Admin Area Username</span>
      <div class="description">
        The administration pages for Program O are restricted to
        the chatbot's administrator, and so must be provided with
        proper credentials. This is the username for the Admin
        account.
      </div>
    </div>
    <div class="row" id="adm_dbp">
      <span class="label">Admin Area Password</span>
      <div class="description">
        Just like the admin username, this setting is required.
        This password is encrypted in the database, to help improve
        security.
      </div>
    </div>
    <div class="bold">
    </div>
    <div class="bold center underline">
      Debugging Options
    </div>
    <div class="row" id="debug_level">
      <span class="label">Debug Level</span>
      <div class="description">
        This setting determines the amount of data generated by the
        debugging functions. Here you have a choice of four
        options:
        <ul>
          <li>
            <b>Nothing</b> No debug data is created. Improves bot
            performance by a small amount.
          </li>
          <li>
            <b>General</b> Only basic information is generated.
          </li>
          <li>
            <b>General/SQL</b> In addition to the data generated in
            General, above, all SQL statements are also recorded.
          </li>
          <li>
            <b>Everything</b> The results from a vast number of
            operations, calculations or function calls (sometimes
            several times within certain functions) is generated.
            <b>WARNING!</b> <span class="c1">HUGE</span> amounts of
            data is generated with this setting, to the point where
            script performance will be affected, especially if the
            debug output method is set to "Show in Source". And for
            God's sake, <b>DON'T</b> use this if you're going to
            have debugging data sent to your email!
          </li>
        </ul>For the most part, this should be set to "Nothing",
        unless you're trying to trace a problem with your AIML
        files, and even then, it's best to only use "General". The
        only time the other two settings should be used is to
        troubleshoot the script itself.
      </div>
    </div>
    <div class="row" id="debug_mode">
      <span class="label">Debug Mode</span>
      <div class="description">
        Default: File<br>
        "Debug Mode" is a setting to determine which output method
        is used for providing debugging data. This setting allows
        you to choose how to obtain debugging information in the
        following ways:
        <ul>
          <li>
            <b>Show in Source</b> Places debugging data in the
            source code of the page, within HTML comment tags.
            <i>Note - only works when Response Format is set to
            HTML</i>(See below)
          </li>
          <li>
            <b>File</b> Creates a debug file that's based on the
            user's internal id and the current time. Stored in the
            /chatbot/debug/ folder.
          </li>
          <li>
            <b>Display</b> Prints debugging data directly to the
            screen. <i>Note - only works when Response Format is
            set to HTML</i>(See below)
          </li>
          <li>
            <b>email</b> Sends debugging data via email -
            <b>WARNING!</b> can create a <span class=
            "c1">LOT</span> of email traffic! Use sparingly, and
            with care.
          </li>
        </ul>
      </div>
    </div>
    <div class="row" id="use_membership">
      <span class="label">Use the Membership System</span>
      <div class="description">
        Default: No (disabled)<br>
        If you want to give members extra benefits, such as "Adult
        Oriented" chatbots, or other extra benefits, then this will
        allow you to employ a basic membership system, where users
        would register once, and then login thereafter. This is
        only the most basic of membership systems, though, so there
        is very little in the way of anti-spam measures or age
        verification. If you need something more advanced, let us
        know via <a href="http://www.program-o.com/forum/">the
        forums</a>.
      </div>
    </div>
    <div class="row" id="require_membership">
      <span class="label">Require Membership</span>
      <div class="description">
        Default: No (disabled)<br>
        This setting is only available if the membership system is
        enabled, above. When this setting is enabled, it will
        require all visitors to log into a registered account.
      </div>
    </div>
    <div class="row">
    </div>
    <div class="big bold center underline">
      Troubleshooting
    </div>
    <div class="row" id="permissions">
      <span class="label">File Permissions</span>
      <div class="description">
        <p>
          If you've been directed here, then your web server
          doesn't allow the install script to modify file
          permissions automatically. If this is the case, then
          modification of the permissions for the config file will
          have to be done manually, <strong>BEFORE</strong> the
          install script can continue. Otherwise, you'll end up
          with a corrupted installation, and will have to start
          over. This problem seems to be limited to Linux systems,
          since Windows handles file permissions differently.
        </p>
        <p>
          To manually change file permissions on a remote server,
          you usually have a couple of options. If your hosting
          provider provides a user control panel, you can use the
          File Management section to change permissions. You can
          also use the FTP client software that you used to upload
          the file to change permissions. The methods for changing
          file permissions with an FTP client application vary from
          program to program, so if you're unsure about how to go
          about the task, try reading your FTP program's Help file.
          Search for either "file permissions", or "CHMOD". If you
          still need help, feel free to visit the <a href=
          "http://forum.program-o.com/">Program O Support Forum</a>
          to ask for assistance.
        </p>
        <p>
          The correct setting for the file permissions for the
          config file is 755. If you're unsure what this means,
          then have a look at <a href=
          "http://www.perlfect.com/articles/chmod.shtml">http://www.perlfect.com/articles/chmod.shtml</a>
          for a good tutorial about the CHMOD command, and what the
          various settings mean. For our purposes, that setting
          means that the config file can only be written to by the
          file's "owner", while everyone can read and execute the
          file. If the file can't be properly written to, then the
          script can't save the settings that you've set or
          changed, and your bot won't work correctly, so it's
          important that the config file has it's permissions set
          correctly.
        </p>
      </div>
    </div>
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
  </body>
</html>
