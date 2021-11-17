<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$('#provinces2').change(function() {
    var id_province = $(this).val();
 	var name_th = $(this).val()
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_province,name_th:name_th,function:'provinces'},
      success: function(data){
          $('#amphures2').html(data); 
          $('#districts2').html(''); 
          $('#districts2').val('');  
          $('#zip_code2').val(''); 
      }
    });
  });
 
  $('#amphures2').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts2').html(data);  
      }
    });
  });
 
   $('#districts2').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code2').val(data)
      }
    });
  
  });
  
	</script>