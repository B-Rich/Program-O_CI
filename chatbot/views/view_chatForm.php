      <form name="frmChat" id="frmChat" action="<?php echo base_url() ?>assets/chat.php" method="POST">
        <div class="row">
          <label for="say"><span class="chatForm" id="lblSay"></span>Say:</label>
          <input name="say" class="wide" id="say" value="" />
          <input type="submit" value="Say" />
        </div>
      </form>
      <div id="response"></div>
      <div id="chatLog"></div>

