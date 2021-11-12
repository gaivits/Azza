<script type="text/javascript">
$('#SERIES').change(function() {
    var LOGO= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax_db2.php",
      data: {LOGO:LOGO},
      success: function(data){
          $('#LOGO').html(data)
      }
    });
  
  });
</script>