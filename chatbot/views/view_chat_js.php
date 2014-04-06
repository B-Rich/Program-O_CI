<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/JavaScript">
  $(document).ready(function() {
    $('#frmChat').submit(function(e){
      e.preventDefault();
      var frmData = $(this).serialize();
      var url='<?php echo base_url() ?>assets/chat.php';
      var say = $('#say').val();
      var responseTemplate = "You: [say]<br>\n[botName]: [botsay]<br>\n";
      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: frmData,
        success: function(data){
          var thisResponse = responseTemplate;
          thisResponse = thisResponse.replace(/\[say\]/, say);
          thisResponse = thisResponse.replace(/\[botName\]/, data.botName);
          thisResponse = thisResponse.replace(/\[botsay\]/, data.botsay);
          $('#response div').html(thisResponse);
          var chatLog = $('#chatLog div').html() + thisResponse;
          $('#chatLog div').html(chatLog);
          //alert(data);
        },
        error: function(jqXHR,textStatus,errorThrown){
          alert("Houston, we have a problem!\nError = " + errorThrown);
        }
      });
    });
  });
</script>