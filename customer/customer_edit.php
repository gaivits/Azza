<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$ID = $_POST['ID'];
	$conn = $conn->__construct();
	$sql = "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID=$ID";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$DATE = $row['CREATE_DATE'];
		$TIME = $row['TIME'];
		$PROJECT = $row['PROJECT'];
		
		$UNIT = $row['UNIT'];
		/*$PROVINCE = $row['PROVINCE'];
		$USER = $row['USER'];
		$DISTRICT = $row['DISTRICT'];
		$SUBDISTRICT = $row['SUBDISTRICT'];
		$ZIPCODE = $row['ZIPCODE'];
		$CONTACT = $row['CONTACT'];
		$DEPARTMENT=$row['DEPARTMENT'];
		$NAME = $row['NAME'];
		$PHONE = $row['PHONE'];
		$EMAIL = $row['EMAIL'];
		$DEALER = $row['DEALER'];
		$BRANDNAME = $row['BRANDNAME'];
		$SERIES = $row['SERIES'];
		$LOGO = $row['LOGO'];
		$narr = explode(" ",$LOGO);
		$AMOUNT = $row['AMOUNT'];
		$WE = $row['WE'];
		$SUPPLIER = $row['SUPPLIER'];*/
		
	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	
	<form action="customer_update.php?ID=<?=$ID?>" method="POST" id="CUSTOMER" name="CUSTOMER">
    <form id="CUSTOMER" name="CUSTOMER" method="POST">
    	<p style="font-weight:bold">-----รายละเอียดงาน-----</p>
		<input type="text" autocomplete="off" id="datepicker2" name="datepicker2" width="180"  placeholder="SELECT DATE" value=<?=$DATE?>>
   		<input type="text" autocomplete="off" id="timepicker2" name="timepicker2" width="180"  placeholder="SELECT TIME" value=<?=$TIME?>>
        <input type="text" autocomplete="off" id="UNIT" name="UNIT" width="180"  placeholder="แก้หน่วย" value=<?=$UNIT?>>
        <input type="text" autocomplete="off" id="PROJECT" name="PROJECT" placeholder="งาน" maxlength="255" value=<?=$PROJECT?> >
        
        <input type="submit" class="btn btn-success btn-sm" value="แก้ไข">
    	</form>
        
</body>
<?php include("script_edit.php") ;?>
<script>
$('#SERIES2').change(function() {
    var SERIES = $('#SERIES2').val();
 	var BRANDNAME = $('#BRANDNAME2').val()
      $.ajax({
      type: "POST",
      url: "ajax_db2.php",
      data: {SERIES:SERIES,BRANDNAME:BRANDNAME},
      success: function(data){
          $('#LOGO2').html(data)
      }
    });
  });
$('#LOGO2').change(function() {
    var GOODS = $('#LOGO2').val()
	var BRAND = $('#BRANDNAME2').val()
      $.ajax({
      type: "POST",
      url: "ajax_db3.php",
      data: {GOODS:GOODS,BRAND:BRAND},
      success: function(data){
          $('#GOODS2').html(data)
      }
    });
  });
$('#datepicker2').datepicker({
    format: 'yy/mm/dd',
    
});
 $('#timepicker2').timepicker({
            uiLibrary: 'bootstrap4'
        });
		
</script>
</html>
