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
		$USER = $row['USER'];
		$UNIT = $row['UNIT'];
		$PROVINCE = $row['PROVINCE'];
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
		$SUPPLIER = $row['SUPPLIER'];
		
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
        <input type="text" autocomplete="off" id="PROJECT" name="PROJECT" placeholder="งาน" maxlength="255" value=<?=$PROJECT?> >
        <select id="USER" name="USER">
    	<option value="<?=$USER?>"><?=$USER?></option>
        <?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='USER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $row['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}
		
    	?> 
       	</select>
        <select id="DEALER" name="DEALER">
    	<option value=<?=$DEALER?> ><?=$DEALER?></option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='DEALER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
       
        <select id="SUPPLIER" name="SUPPLIER" >
    	<option value=<?=$SUPPLIER?>><?=$SUPPLIER?></option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SUPPLIER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
        <input type="text" autocomplete="off" name="UNIT" id="UNIT" placeholder="หน่วยย่อย" value=<?=$UNIT?>  />
        <p style="font-weight:bold;">-----รายละเอียดงาน-----</p>
        <p style="font-weight:bold;">-----ที่อยู่-----</p>
		<select name="Ref_prov_id2" id="provinces2">
		<option value=<?=$PROVINCE?>><?=$PROVINCE?></option>
        <?php
        $records = mysqli_query($conn, "SELECT * FROM provinces");  // Use select query here 
		
		while($value = mysqli_fetch_assoc($records))
        {
		  echo "<option value='". $value['id'],$value['name_th'] ."'>" .$value['name_th'] ."</option>";
		}
		?>
        </select>
        
        
        <select name="Ref_dist_id" id="amphures2" >
        	<option value=<?=preg_replace('/[0-9]+/','',$DISTRICT)?>><?=preg_replace('/[0-9]+/','',$DISTRICT);?></option>
        
        </select>
        
        <select name="Ref_subdist_id" id="districts2" >
        	<option value=<?=preg_replace("/[0-9]+/","",$SUBDISTRICT)?>><?=preg_replace("/[0-9]+/","",$SUBDISTRICT);?></option>
      	</select>
        
         <input type="text" name="zip_code2" id="zip_code2" value=<?=$ZIPCODE?> placeholder="รหัสไปรษณีย์">
        
         <p style="font-weight:bold;">-----ที่อยู่-----</p>
         <p style="font-weight:bold;">-----ติดต่อ-----</p>
         <input type="text" autocomplete="off" id="CONTACT" name="CONTACT" placeholder="ติดต่อ" maxlength="255" value=<?=$CONTACT?>>
         
         <input type="text" autocomplete="off" id="DEPARTMENT" name="DEPARTMENT" placeholder="แผนก/หน่วยงาน" maxlength="255" value=<?=$DEPARTMENT?>>
         
         <input type="text" autocomplete="off" id="NOTENAME" name="NOTENAME" placeholder="ชื่อ" maxlength="255" value=<?=$NAME?>>
         
         <input type="text" autocomplete="off" id="PHONE" name="PHONE" placeholder="โทร" maxlength="255" value=<?=$PHONE?>>
         
         <input type="email" autocomplete="off" id="EMAIL" name="EMAIL" placeholder="อีเมลล์" maxlength="255" value=<?=$EMAIL?>>
         
        <input type="text" id="WE" name="WE" placeholder="WE" maxlength="255" value="Azza">
        <p style="font-weight:bold;">-----ติดต่อ-----</p>
     	<p style="font-weight:bold;">-----สินค้า-----</p>
        <select id="SERIES2" name="SERIES2" >
    	<option value=<?=$SERIES?>><?=$SERIES?></option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SERIES'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
       	<select id="BRANDNAME2" name="BRANDNAME2" >
    	<option value=<?=$BRANDNAME?>><?=$BRANDNAME?></option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='BRANDNAME'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
        <select id="LOGO2" name="LOGO2" >
    	<option value=<?=$narr[0]?>><?=$narr[0]?></option>
    	
  		</select>
        
        <select id="GOODS2" name="GOODS2">
        	<option value=<?=$GOODS?>><?=$GOODS?></option>
		</select>
       	<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="จำนวน" value=<?=$AMOUNT?>>
        <p style="font-weight:bold;">-----สินค้า-----</p>
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
