<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	
	$('#provinces0').change(function() {
    var id_province = $(this).val();
 	var name_th = $(this).val()
      $.ajax({
      type: "POST",
      url: "location0.php",
      data: {id:id_province,name_th:name_th,function:'provinces'},
      success: function(data){
          $('#amphures0').html(data); 
          $('#districts0').html(''); 
          $('#districts0').val('');  
          $('#zip_code0').val(''); 
      }
    });
  });
 
  $('#amphures0').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "location0.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts0').html(data);  
      }
    });
  });
 
   $('#districts0').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "location0.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code0').val(data)
      }
    });
  
  });
	
	</script>