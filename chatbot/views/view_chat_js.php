<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/JavaScript">
  $(document).ready(function() {
    $('#frmChat').submit(function(e){
      e.preventDefault();
      var frmData = $(this).serialize();
      var url='<?php echo base_url() ?>assets/chat.php';
      $.ajax({
        url: url,
        data: frmData,
        success: function(data){
          alert(data);
        },
        error: function(){
          alert('Oops?');
        }
      });
    });
  });
</script>