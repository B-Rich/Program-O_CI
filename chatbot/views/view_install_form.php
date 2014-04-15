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
          <div class="label"><label for="botmaster_name"><span class="helpButton" id="hb_botmaster_name"></span>Your Name</label></div>
          <div class="input"><input name="botmaster_name" id="botmaster_name" value="<?php echo (isset($post['botmaster_name'])) ? $post['botmaster_name'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="debugemail"><span class="helpButton" id="hb_debugemail"></span>Email Address</label></div>
          <div class="input"><input name="debugemail" id="debugemail" value="<?php echo (isset($post['debugemail'])) ? $post['debugemail'] : '' ?>" /></div>
        </div>
        <div class="row bold center underline sectionHeader" colspan="2">Bot Configuration:</div>
        <div class="row">
          <div class="label"><label for="bot_name"><span class="helpButton" id="hb_bot_name"></span>Bot Name</label></div>
          <div class="input"><input name="bot_name" id="bot_name" value="<?php echo (isset($post['bot_name'])) ? $post['bot_name'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="bot_desc"><span class="helpButton" id="hb_bot_desc"></span>Bot Description</label></div>
          <div class="input"><input name="bot_desc" id="bot_desc" value="<?php echo (isset($post['bot_desc'])) ? $post['bot_desc'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="bot_active"><span class="helpButton" id="hb_bot_active"></span>Bot Active?</label></div>
          <div class="input"><input type="checkbox" name="bot_active" id="bot_active" value="1" checked="checked" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="debug_level"><span class="helpButton" id="hb_debug_level"></span>Bot Debug Level</label></div>
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
        <div class="row bold center underline sectionHeader" colspan="2">Database Configuration:</div>
        <div class="row">
          <div class="label"><label for="dbh"><span class="helpButton" id="hb_dbh"></span>DB Host Name</label></div>
          <div class="input"><input name="dbh" id="dbh" value="<?php echo (isset($post['dbh'])) ? $post['dbh'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbn"><span class="helpButton" id="hb_dbn"></span>DB Name</label></div>
          <div class="input"><input name="dbn" id="dbn" value="<?php echo (isset($post['dbn'])) ? $post['dbn'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbPort"><span class="helpButton" id="hb_dbPort"></span>DB Port</label></div>
          <div class="input"><input name="dbPort" id="dbPort" value="3306" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbu"><span class="helpButton" id="hb_dbu"></span>DB Username</label></div>
          <div class="input"><input name="dbu" id="dbu" value="<?php echo (isset($post['dbu'])) ? $post['dbu'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="dbp"><span class="helpButton" id="hb_dbp"></span>DB Password</label></div>
          <div class="input"><input name="dbp" id="dbp" value="" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="new_install_yes"><span class="helpButton" id="hb_new_install"></span>Is this a new install, or an upgrade?</label></div>
          <div class="input">
            <label><input id="new_install_yes" name="new_install" type="radio" checked="checked" value="1">&nbsp;New Install</label><br>
            <label><input id="new_install_no" name="new_install" type="radio" value="0">&nbsp;Upgrade</label>
          </div>
        </div>
        <div class="row bold center underline sectionHeader" colspan="2">Admin Configuration:</div>
        <div class="row">
          <div class="label"><label for="adm_dbu"><span class="helpButton" id="hb_adm_dbu"></span>Admin Area Username</label></div>
          <div class="input"><input name="adm_dbu" id="adm_dbu" value="<?php echo (isset($post['adm_dbu'])) ? $post['adm_dbu'] : '' ?>" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="adm_dbp"><span class="helpButton" id="hb_adm_dbp"></span>Admin Area Password</label></div>
          <div class="input"><input name="adm_dbp" id="adm_dbp" type="password" /></div>
        </div>
        <div class="row">
          <div class="label"><label for="adm_dbp_confirm"><span class="helpButton" id="hb_adm_dbp"></span>Confirm Admin Area Password</label></div>
          <div class="input"><input name="adm_dbp_confirm" id="adm_dbp_confirm" type="password" /></div>
        </div>
        <div class="row bold center underline sectionHeader" colspan="2">Misc Configuration:</div>

        <div class="row">
          <div class="label"><label for="domain"><span class="helpButton" id="hb_domain"></span>What is the domain for this install?</label></div>
          <div class="input">
            <label><input id="domain" name="domain" type="text" value="<?php echo $domain ?>"></label>
          </div>
        </div>
        <div class="row">
          <div class="label"><label for="path"><span class="helpButton" id="hb_path"></span>Path to the script</label></div>
          <div class="input">
            <label><input id="path" name="path" type="text" value="<?php echo $path ?>"></label>
          </div>
        </div>

        <div class="row">
          <div class="label"><label for="use_membership_yes"><span class="helpButton" id="hb_use_membership"></span>Use the Membership System?</label></div>
          <div class="input">
            <label><input id="use_membership_yes" name="use_membership" type="radio" value="1">Yes</label><br>
            <label><input id="use_membership_no" name="use_membership" type="radio" value="0" checked="checked">No</label>
          </div>
        </div>
        <div class="row">
          <div class="label"><label for="require_membership_yes"><span class="helpButton" id="hb_require_membership"></span>Require all users to register?</label></div>
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
