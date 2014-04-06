      <div class="row center">
        <strong>WARNING!!!</strong> This is not yet a functioning chatbot! That part is still in
        development.
      </div>
      <form name="frmChat" id="frmChat" action="<?php echo base_url('assets') ?>chat.php" method="POST">
        <div class="row">
          <label for="say"><span class="chatForm" id="lblSay"></span>Say:</label>
          <input name="say" class="wide" id="say" value="" />
          <input type="submit" value="Say" />
        </div>
      </form>
      <fieldset id="response">
        <legend>Current Response</legend>
        <div></div>
      </fieldset>
      <fieldset id="chatLog">
        <legend>Chat Log</legend>
        <div></div>
      </fieldset>
