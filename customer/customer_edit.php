
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

  

  
        <form action="customer_update.php?ID=<?=$ID?>" id="CUSTOMER" name="CUSTOMER" method="POST">
    	
		<input type="date" autocomplete="off" id="datepicker" name="datepicker" class="form-control datepicker" placeholder="SELECT DATE" value=<?=$DATE?>>
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
        <br>
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
        <button class = "btn btn-default"><a href="http://127.0.0.1/xampp/Azza/Customer/customer.php">Cancel</a></button>
    	</form>
     
        



