
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
		$JOB = $row['JOB'];
		$EQUIPMENT = $row['EQUIPMENT'];
		$USER = $row['USER'];
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
<div class="modal fade" id="myModal-2" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form action="customer_update.php?ID=<?=$ID?>" id="CUSTOMER" name="CUSTOMER" method="POST">
    	
		<input type="date" autocomplete="off" id="datepicker" name="datepicker" placeholder="SELECT DATE" value=<?=$DATE?>>
        <br>
        <input type="time" autocomplete="off" id="timepicker" name="timepicker" width="276" placeholder="SELECT TIME" value=<?=$TIME?>>
        <br>
		<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="AMOUNT" value=<?=$AMOUNT?>>
        <br>
        <input type="text" autocomplete="off" id="JOB" name="JOB" placeholder="JOB" maxlength="255" value=<?=$JOB?>>
        <br>
        <input type="text" autocomplete="off" id="EQUIPMENT" name="EQUIPMENT" placeholder="EQUIPMENT" maxlength="255" value=<?=$EQUIPMENT?>>
        <br>
        
    	<select id="USER" name="USER" >
        
    	<option value="<?=$USER?>"><?=$USER?></option>
        
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='USER'");  // Use select query here 
		
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}
		?>
         </select>
        <select class="form-control" name="Ref_prov_id" id="provinces">
		<option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
        <?php
        $records = mysqli_query($conn, "SELECT * FROM provinces");  // Use select query here 
		while($value = mysqli_fetch_assoc($records))
        {
		  echo "<option value='". $value['id'] ."'>" .$value['name_th'] ."</option>";
		  }
		?>
        
        </select>
        <br>
        <select class="form-control" name="Ref_dist_id" id="amphures" >
        
        </select>
        <br>
        <select class="form-control" name="Ref_subdist_id" id="districts">
      	</select>
        <input type="text" id="WE" name="WE" placeholder="WE" maxlength="255" value="Azza">
        <br>
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
        <br>
        <input type = "submit" value="update" class="btn btn-success">
        <button class = "btn btn-secondary" data-toggle='modal' data-dismiss='modal'>Close</button>
    	</form>
     </div>
    </div>
   </div>
  </div>
</body>
</html>

        



