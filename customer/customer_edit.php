<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";
$conn=new Databases;
$conn = $conn->__construct();
$query = "SELECT * FROM customer where $_GET[ID]=CUSTOMER_ID";
$result = mysqli_query($conn, $query);
echo $_GET[ID]."<br>";
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<title>Customer</title>
</head>

<body>
	<div class="modal fade" id="myModal-3" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form id="CUSTOMER" name="CUSTOMER">
    	<input type="text" id="datepicker" width="180" name="DATE" placeholder="YYYY/MM/DD">
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
        <br>
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
        
    	</form>
  		</div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="">OK</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>

</html>

