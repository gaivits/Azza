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
		$AMOUNT = $row['AMOUNT'];
		$PROJECT = $row['PROJECT'];
		$EQUIPMENT = $row['EQUIPMENT'];
		$USER = $row['USER'];
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
    	
		<input type="text" autocomplete="off" id="datepicker2" name="datepicker2" placeholder="SELECT DATE" value=<?=$DATE?>>
        
        <input type="text" autocomplete="off" id="timepicker2" name="timepicker2" width="276" placeholder="SELECT TIME" value=<?=$TIME?>  />
        
		<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="AMOUNT" value=<?=$AMOUNT?>>
        
        <input type="text" autocomplete="off" id="PROJECT" name="PROJECT" placeholder="งาน" value=<?=$PROJECT?>>
        
        <input type="text" autocomplete="off" id="EQUIPMENT" name="EQUIPMENT" placeholder="อุปกรณ์"  value=<?=$EQUIPMENT?>>
       
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
		<select class="form-control" name="Ref_prov_id" id="provinces2">
		<option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
        <?php
        $records = mysqli_query($conn, "SELECT * FROM provinces");  // Use select query here 
		while($value = mysqli_fetch_assoc($records))
        {
		  echo "<option value='". $value['id'] ."'>" .$value['name_th'] ."</option>";
		  }
		?>
        </select>
        
        <select class="form-control" name="Ref_dist_id" id="amphures2" >
        
        </select>
        
        <select class="form-control" name="Ref_subdist_id" id="districts2" >
      	</select>
        
         <input type="text" name="zip_code2" id="zip_code2" class="form-control" value=<?=$ZIPCODE?> placeholder="รหัสไปรษณีย์">
         
         <input type="text" id="CONTACT" name="CONTACT" placeholder="ติดต่อ" value=<?=$CONTACT?> >
         
         <input type="text" id="DEPARTMENT" name="DEPARTMENT" placeholder="แผนก/หน่วยงาน" value=<?=$DEPARTMENT?> >
         
         <input type="text" id="NOTENAME" name="NOTENAME" placeholder="ชื่อ" value=<?=$NAME?>>
         
         <input type="text" id="PHONE" name="PHONE" placeholder="โทร" value=<?=$PHONE?> >
         
         <input type="email" id="EMAIL" name="EMAIL" placeholder="อีเมลล์" value=<?=$EMAIL?> >
         
        <input type="text" id="WE" name="WE" placeholder="WE" maxlength="255" value="Azza">
        
        <select id="DEALER" name="DEALER">
    	<option value="<?=$DEALER?>"><?=$DEALER?></option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='DEALER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
       
        <select id="SUPPLIER" name="SUPPLIER" >
    	<option value="<?=$SUPPLIER?>"><?=$SUPPLIER?></option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SUPPLIER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
			
		}	
    	?>  
  		</select>
        	<input type="submit" value="OK">
    	</form>
        
</body>
<script>
$('#datepicker2').datepicker({
    format: 'mm/dd/yy',
    
});
 $('#timepicker2').timepicker({
            uiLibrary: 'bootstrap4'
        });
		
</script>
</html>
<?php include('script_edit.php') ?>
