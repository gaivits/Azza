
 <?php 
 	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$ID = $_POST['ID'];
	$conn=new Databases;
	$conn = $conn->__construct();
	$query = "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID=$ID";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	print_r($row);
 	?>

<!DOCTYPE html>
<html lang="en">
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



  <!-- Button to Open the Modal -->
  

  <!-- The Modal -->
 
  <!-- Trigger the modal with a button -->
  
  
	  <!-- Modal -->
  <div class="modal fade" id="myModal-3" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form id="CUSTOMER" name="CUSTOMER" method="POST">
    	
		<input type="text" autocomplete="off" id="datepicker" name="datepicker" class="form-control datepicker" placeholder="SELECT DATE" value=<?=$row['CREATE_DATE']?>>
        <br>
        <input type="text" autocomplete="off" id="timepicker" name="timepicker" width="276" placeholder="SELECT TIME">
        <br>
		<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="AMOUNT" >
        <br>
        <input type="text" autocomplete="off" id="JOB" name="JOB" placeholder="JOB" maxlength="255" >
        <br>
        <input type="text" autocomplete="off" id="EQUIPMENT" name="EQUIPMENT" placeholder="EQUIPMENT" maxlength="255">
        <br>
        <p>DDDDDDDDDDDDDDDDDDDDDDDD</p>
    	<select id="USER" name="USER">
        
        <br>
    	<option value="">--SELECT USER--</option>
        
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='USER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}
		if($data['USER']=='มหาวิทยาลัย')
		{
				
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
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="updates(<?php echo $row['CUSTOMER_ID'] ;?>)">OK</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  
  
</div>
  

</body>
</html>

<script>
function updates(ID)
{
	alert(ID)
	}
</script>