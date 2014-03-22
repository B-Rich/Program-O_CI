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

        <table class="margin_auto" id="form_table" cellpadding="2" cellspacing="0">
          <tr>
            <td colspan="2" id="notes">
              <p>
                Please note that all fields are required, but some are already filled out with generic, default
                values.
              </p>
              <p>
                For more detailed information with this page, please see the <a href="#" id="helpLink1" title="Get help for this page" name="helpLink1">Help Page</a>, or
                click the help icon <img src="http://localhost/Program-O/Program-O/admin/images/help_small.png" width="16" height="16" alt="" /> for an individual field.
              </p>
              &nbsp;
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bold center underline" >Botmaster Info:</td>
          </tr>
          <tr>
            <td class="label" width="60%"><label for="botmaster_name"><span class="helpButton" id="hb_botmaster_name"></span>Your Name</label></td>
            <td class="formw" width="40%"><input name="botmaster_name" id="botmaster_name" value="<?php echo (isset($post['botmaster_name'])) ? $post['botmaster_name'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="label"><label for="debugemail"><span class="helpButton" id="hb_debugemail"></span>Email Address</label></td>
            <td class="formw"><input name="debugemail" id="debugemail" value="<?php echo (isset($post['debugemail'])) ? $post['debugemail'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="bold center underline" colspan="2">Bot Configuration:</td>
          </tr>
          <tr>
            <td class="label"><label for="bot_name"><span class="helpButton" id="hb_bot_name"></span>Bot Name</label></td>
            <td class="formw"><input name="bot_name" id="bot_name" value="<?php echo (isset($post['bot_name'])) ? $post['bot_name'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="label"><label for="bot_desc"><span class="helpButton" id="hb_bot_desc"></span>Bot Description</label></td>
            <td class="formw"><input name="bot_desc" id="bot_desc" value="<?php echo (isset($post['bot_desc'])) ? $post['bot_desc'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="label"><label for="bot_active"><span class="helpButton" id="hb_bot_active"></span>Bot Active?</label></td>
            <td class="formw"><input type="checkbox" name="bot_active" id="bot_active" value="1" checked="checked" /></td>
          </tr>
          <tr>
            <td class="bold center underline" colspan="2">Debugging Options:</td>
          </tr>
          <tr>
            <td class="label"><label for="debug_level"><span class="helpButton" id="hb_debug_level"></span>Debug Level</label></td>
            <td class="formw">
              <select name="debug_level" id="debug_level" size="1">
                <option value="0">Show no debugging</option>
                <option value="1">errors only</option>
                <option value="2" selected="selected">general + errors</option>
                <option value="3">general + errors + sql</option>
                <option value="4">show everything</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="label"><label for="debug_mode"><span class="helpButton" id="hb_debug_mode"></span>Debug Mode</label></td>
            <td class="formw">
              <select name="debug_mode" id="debug_mode" size="1">
                <option value="0">Show in Source</option>
                <option value="1" selected="selected">File (default)</option>
                <option value="2">Display</option>
                <option value="3">Email</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="bold center underline" colspan="2">Database Configuration:</td>
          </tr>
          <tr>
            <td width="60%" class="label"><label for="dbh"><span class="helpButton" id="hb_dbh"></span>DB Host Name</label></td>
            <td width="40%" class="formw"><input name="dbh" id="dbh" value="<?php echo (isset($post['dbh'])) ? $post['dbh'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="label"><label for="dbn"><span class="helpButton" id="hb_dbn"></span>DB Name</label></td>
            <td class="formw"><input name="dbn" id="dbn" value="<?php echo (isset($post['dbn'])) ? $post['dbn'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="label"><label for="dbPort"><span class="helpButton" id="hb_dbPort"></span>DB Port</label></td>
            <td class="formw"><input name="dbPort" id="dbPort" value="3306" /></td>
          </tr>
          <tr>
            <td class="label"><label for="dbu"><span class="helpButton" id="hb_dbu"></span>DB Username</label></td>
            <td class="formw"><input name="dbu" id="dbu" value="<?php echo (isset($post['dbu'])) ? $post['dbu'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="label"><label for="dbp"><span class="helpButton" id="hb_dbp"></span>DB Password</label></td>
            <td class="formw"><input name="dbp" id="dbp" value="" /></td>
          </tr>
          <tr>
            <td class="label"><label for="new_install_yes"><span class="helpButton" id="hb_new_install"></span>Is this a new install, or an upgrade?</label></td>
            <td class="formw">
              <label><input id="new_install_yes" name="new_install" type="radio" checked="checked" value="1">&nbsp;New Install</label><br>
              <label><input id="new_install_no" name="new_install" type="radio" value="0">&nbsp;Upgrade</label>
            </td>
          </tr>
          <tr>
            <td class="bold center underline" colspan="2">Admin Configuration:</td>
          </tr>
          <tr>
            <td class="label"><label for="adm_dbu"><span class="helpButton" id="hb_adm_dbu"></span>Admin Area Username</label></td>
            <td class="formw"><input name="adm_dbu" id="adm_dbu" value="<?php echo (isset($post['adm_dbu'])) ? $post['adm_dbu'] : '' ?>" /></td>
          </tr>
          <tr>
            <td class="label"><label for="adm_dbp"><span class="helpButton" id="hb_adm_dbp"></span>Admin Area Password</label></td>
            <td class="formw"><input name="adm_dbp" id="adm_dbp" type="password" /></td>
          </tr>
          <tr>
            <td class="label"><label for="adm_dbp_confirm"><span class="helpButton" id="hb_adm_dbp"></span>Confirm Admin Area Password</label></td>
            <td class="formw"><input name="adm_dbp_confirm" id="adm_dbp_confirm" type="password" /></td>
          </tr>
          <tr>
            <td class="bold center underline" colspan="2">Misc Configuration:</td>
          </tr>
          <tr>
            <td class="label"><label for="use_membership_yes"><span class="helpButton" id="hb_use_membership"></span>Use the Membership System?</label></td>
            <td class="formw">
              <label><input id="use_membership_yes" name="use_membership" type="radio" value="1">Yes</label>
              <label><input id="use_membership_no" name="use_membership" type="radio" value="0" checked="checked">No</label>
            </td>
          </tr>
          <tr>
            <td class="label"><label for="require_membership_yes"><span class="helpButton" id="hb_require_membership"></span>Require all users to register?</label></td>
            <td class="formw">
              <label><input id="require_membership_yes" name="require_membership" type="radio" value="1">Yes</label>
              <label><input id="require_membership_no" name="require_membership" type="radio" value="0" checked="checked">No</label>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="center">
              <input name="bot_id" value="1" type="hidden">
              <input name="error_response" value="No AIML category found. This is a Default Response." type="hidden">
              <input name="action"  type="hidden" value="save_data">
              <input type="submit" id="submit" class="submit" value="Submit Data">
            </td>
          </tr>
        </table>
      </form>
