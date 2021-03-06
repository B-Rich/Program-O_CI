<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton, Liz Perreau and Brent Edds
 * ©2012-2013 The Program O Group
 * Written 11-26-2013
 * view_install_form.php
 * Displays the install form for Program O.
 ****************************************************/
?>
      <?php echo $formOpenTag ?>

      <div class="formTable">
        <div class="row" id="notes">
          <p>
            Please note that all fields are required, but some are already filled out with generic, default
            values.
          </p>
          <p>
            For more detailed information with this page, please see the <a href="#" id="helpLink1" title="Get help for this page" name="helpLink1">Help Page</a>, or
            click the help icon <img src="http://localhost/Program-O/Program-O/admin/images/help_small.png" width="16" height="16" alt="" /> for an individual field.
          </p>
          &nbsp;
        </div>
        <div class="row bold center underline sectionHeader" >Botmaster Info:</div>
        <div class="row">
          <div class="label"><label for="botmaster_name">Your Name</label><span class="helpButton" id="hb_botmaster_name"></span></div>
          <div class="input"><input name="botmaster_name" id="botmaster_name" value="<?php echo (isset($post['botmaster_name'])) ? $post['botmaster_name'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="debugemail">Email Address</label><span class="helpButton" id="hb_debugemail"></span></div>
          <div class="input"><input name="debugemail" id="debugemail" value="<?php echo (isset($post['debugemail'])) ? $post['debugemail'] : '' ?>" /></div>
        </div>
        <div class="row bold center underline sectionHeader">Bot Configuration:</div>
        <div class="row">
          <div class="label"><label for="bot_name">Bot Name</label><span class="helpButton" id="hb_bot_name"></span></div>
          <div class="input"><input name="bot_name" id="bot_name" value="<?php echo (isset($post['bot_name'])) ? $post['bot_name'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="bot_desc">Bot Description</label><span class="helpButton" id="hb_bot_desc"></span></div>
          <div class="input"><input name="bot_desc" id="bot_desc" value="<?php echo (isset($post['bot_desc'])) ? $post['bot_desc'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="bot_active">Bot Active?</label><span class="helpButton" id="hb_bot_active"></span></div>
          <div class="input"><input type="checkbox" name="bot_active" id="bot_active" value="1" checked="checked" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="debug_level">Bot Debug Level</label><span class="helpButton" id="hb_debug_level"></span></div>
          <div class="input">
            <select name="debug_level" id="debug_level" size="1">
              <option value="0">No Debugging</option>
              <option value="1">Errors Only</option>
              <option value="2">General/Errors</option>
              <option value="3">General/Errors/SQL</option>
              <option value="4" selected="selected">Show Everything</option>
            </select>
          </div>
        </div>
        <div class="row bold center underline sectionHeader">Database Configuration:</div>
<?php
  if (class_exists('PDO'))
  {
?>
        <div class="row">
          <div class="label"><label for="dbDriver">DB Driver</label><span class="helpButton" id="hb_dbDriver"></span></div>
          <div class="input">
            <select name="dbDriver" id="dbDriver">
              <option value="PDO" selected="selected">PDO</option>
              <option value="mysqli">MySQLi</option>
            </select>
          </div>
        </div>
<?php
  }
  else
  {
?>
        <input type="hidden" name="dbDriver" value="mysqli">
<?php
  }
?>
        <div class="row">
          <div class="label"><label for="dbh">DB Host Name</label><span class="helpButton" id="hb_dbh"></span></div>
          <div class="input"><input name="dbh" id="dbh" value="<?php echo (isset($post['dbh'])) ? $post['dbh'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbPort">DB Port</label><span class="helpButton" id="hb_dbPort"></span></div>
          <div class="input"><input name="dbPort" id="dbPort" value="3306" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbn">DB Name</label><span class="helpButton" id="hb_dbn"></span></div>
          <div class="input"><input name="dbn" id="dbn" value="<?php echo (isset($post['dbn'])) ? $post['dbn'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbu">DB Username</label><span class="helpButton" id="hb_dbu"></span></div>
          <div class="input"><input name="dbu" id="dbu" value="<?php echo (isset($post['dbu'])) ? $post['dbu'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbp">DB Password</label><span class="helpButton" id="hb_dbp"></span></div>
          <div class="input"><input name="dbp" id="dbp" value="" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="new_install_yes">Is this a new install, or an upgrade?</label><span class="helpButton" id="hb_new_install"></span></div>
          <div class="input">
            <label><input id="new_install_yes" name="new_install" type="radio" checked="checked" value="1">&nbsp;New Install</label><br>
            <label><input id="new_install_no" name="new_install" type="radio" value="0">&nbsp;Upgrade</label>
          </div>
        </div>
        <div class="row bold center underline sectionHeader">Admin Configuration:</div>
        <div class="row">
          <div class="label"><label for="adm_dbu">Admin Area Username</label><span class="helpButton" id="hb_adm_dbu"></span></div>
          <div class="input"><input name="adm_dbu" id="adm_dbu" value="<?php echo (isset($post['adm_dbu'])) ? $post['adm_dbu'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="adm_dbp">Admin Area Password</label><span class="helpButton" id="hb_adm_dbp"></span></div>
          <div class="input"><input name="adm_dbp" id="adm_dbp" type="password" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="adm_dbp_confirm">Confirm Admin Area Password</label><span class="helpButton" id="hb_adm_dbp"></span></div>
          <div class="input"><input name="adm_dbp_confirm" id="adm_dbp_confirm" type="password" /></div>
        </div>
        <div class="row bold center underline sectionHeader">Misc Configuration:</div>

        <div class="row">
          <div class="label"><label for="domain">What is the domain for this install?</label><span class="helpButton" id="hb_domain"></span></div>
          <div class="input">
            <label><input id="domain" name="domain" type="text" value="<?php echo $domain ?>"></label>
          </div>
        </div>
        <div class="row">
          <div class="label"><label for="path">Path to the script</label><span class="helpButton" id="hb_path"></span></div>
          <div class="input">
            <label><input id="path" name="path" type="text" value="<?php echo $path ?>"></label>
          </div>
        </div>

        <div class="row">
          <div class="label"><label for="use_membership_yes">Use the Membership System?</label><span class="helpButton" id="hb_use_membership"></span></div>
          <div class="input">
            <label><input id="use_membership_yes" name="use_membership" type="radio" value="1">Yes</label><br>
            <label><input id="use_membership_no" name="use_membership" type="radio" value="0" checked="checked">No</label>
          </div>
        </div>
        <div class="row">
          <div class="label"><label for="require_membership_yes">Require all users to register?</label><span class="helpButton" id="hb_require_membership"></span></div>
          <div class="input">
            <label><input id="require_membership_yes" name="require_membership" type="radio" value="1">Yes</label><br>
            <label><input id="require_membership_no" name="require_membership" type="radio" value="0" checked="checked">No</label>
          </div>
        </div>
        <div class="row center">
          <input name="bot_id" value="1" type="hidden">
          <input name="error_response" value="No AIML category found. This is a Default Response." type="hidden">
          <input name="action"  type="hidden" value="save_data">
          <input type="submit" id="submit" class="submit" value="Submit Data">
        </div>
        </div>
      </form>
