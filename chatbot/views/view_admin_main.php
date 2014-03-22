<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2012-2013 The Program O Group
 * Written 11-29-2013
 * view_admin_main.php
 * Displays the main content for the Program O admin page.
 ****************************************************/
?>
      <div id="admin_tabs">
        <ul>
          <li><a href="#selectBot" title="Edit your bot's personality">Choose/Edit Bot</a></li>
          <li><a href="#aiml_files" title="Process AIML files">AIML file functions</a></li>
          <li><a href="#aiml_db" title="Work with AIML in the database">Stored AIML</a></li>
          <li><a href="#spellcheck" title="Edit the Word Censor entries">Spell Check/Word Censor</a></li>
          <li><a href="#dbStats" title="View the log files">Stats/Logs</a></li>
          <li><a href="#members" title="Edit Admin Accounts">Edit Admin Accounts</a></li>
          <!-- li><a href="#demoChat" title="Run a demo version of your bot">Test Your Bot</a></li>
          <li>
            <a href="<?php echo base_url() ?>" target="_blank" title="open the page for <?php echo $bot_name ?> in a new tab/window">
              Talk to <?php echo $bot_name ?>
            </a>
          </li -->
        </ul>
        <div id="selectBot">Bot Editing: Nothing here yet. This is just a demo</div>
        <div id="aiml_files">AIML Files: Nothing here yet. This is just a demo</div>
        <div id="aiml_db">Training: Nothing here yet. This is just a demo</div>
        <div id="spellcheck">Word Censor: Nothing here yet. This is just a demo</div>
        <div id="dbStats">DB Stats: Nothing here yet. This is just a demo</div>
        <!-- div id="demoChat">Demo Chat: Nothing here yet. This is just a demo</div -->
        <div id="members">Admin Admin: Nothing here yet. This is just a demo</div>
      </div>
      <a href="<?php echo base_url('admin/logout') ?>" title="Log out">Log Out</a>
      <div id="errMsg" class="errMsg"><?php echo (isset($errMsg)) ? $errMsg : '' ?></div>
