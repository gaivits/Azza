<?php
            	include "C:/xampp/htdocs/xampp/Azza/connects.php";
				$conn = new Databases;
				$conn = $conn->__construct();
			?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Customer</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
			$('#myModal-3').modal('show')
		})
</script>
</head>
<body>
<div id="myModal-3" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editing</h5>
                </div>
            
            <div class="modal-body">
            
			<form action ="" id="CUSTOMER" name="CUSTOMER" method="POST">
    		<input type="text" id="datepicker" width="180" name="DATE" placeholder="YYYY/MM/DD" >
        	<br>
        	<input id="timepicker" width="180">
        	<br>
        	<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="AMOUNT" >
        	<br>
        	<input type="text" autocomplete="off" id="JOB" name="JOB" placeholder="JOB" maxlength="255" >
        	<br>
        	<input type="text" autocomplete="off" id="EQUIPMENT" name="EQUIPMENT" placeholder="EQUIPMENT" maxlength="255">
        	<br>
        	<select id="USER" name="USER">
        	<option value="">--SELECT USER--</option>
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
    	<option value="">--SELECT DEALER--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='DEALER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
       
        <select id="SUPPLIER" name="SUPPLIER" >
    	<option value="">--SELECT SUPPLIER--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SUPPLIER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
			
		}	
    	?>  
  		</select>
        <br>
        <input type="submit" class="btn btn-success" value="save">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	</form>		
       	
                
            </div>
        </div>
    </div>
</div>
</body>
</html>
