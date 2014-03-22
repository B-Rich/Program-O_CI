<?php
/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2012-2013 The Program O Group
 * Written 11-28-2013 (Happy Thanksgiving!)
 * view_admin_login.php
 * Shows the login form for the Program O admin page
 ****************************************************/
?>
        <div class="row">
          Welcome to the Program O Admin page. Please log in.
        </div>
            <?php echo form_open('admin/login') ?>

        <div id="form_table">
          <fieldset>
            <legend>Login </legend>
              <div class="row">
                <label for="user_name">Username:</label>
                <input name="user_name" id="user_name" maxlength="20" size="15" type="text">
              </div>
              <div class="row">
                <label for="pw">Password:</label>
                <input name="pw" id="pw" maxlength="20" size="15" type="password"><br>
              </div>
              <div class="row center">
                <input name="Submit" value="Submit" type="submit">
              </div>
          </fieldset>
        </div>
            </form>
        <div id="errMsg" class="errMsg"><?php echo (isset($errMsg)) ? $errMsg : '' ?></div>
