 <?php 
 	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_POST[ID];
	$query = "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID=$ID";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	
 	?>
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</head>

<body>
<!-- Modal -->

<div class="container">
  
  
	  <!-- Modal -->

  <div class="modal fade" id="myModal-3" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form id="CUSTOMER" name="CUSTOMER" method="POST">
    	<input data-date-format="yyyy/mm/dd" id="datepicker" placeholder="yyyy/mm/dd" value=<?php echo $row['CREATE_DATE'] ;?>>
             
        <input type="text" id="TIME" name="TIME" value=<?php echo $row['TIME'] ;?>  />
        <br>
        
        <br>
        <input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="AMOUNT" value=<?php echo $row['AMOUNT'] ;?> >
        <br>
        <input type="text" autocomplete="off" id="JOB" name="JOB" placeholder="JOB" maxlength="255" value=<?php echo $row['JOB'] ;?>>
        <br>
        <input type="text" autocomplete="off" id="EQUIPMENT" name="EQUIPMENT" placeholder="EQUIPMENT" maxlength="255" value=<?php echo $row['EQUIPMENT'] ;?>>
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
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="update()">OK</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  </div>
  
</div>

	<br>
	
    

</body>
</html>
<script>
	$("#myModal-3").modal().fadeIn('fast')
	
function update()
	{
	var DATE = $('#datepicker').val()
	var TIME = $('#TIME').val()
	var AMOUNT = $('#AMOUNT').val()
	var JOB = $('#JOB').val()
	var EQUIPMENT = $('#EQUIPMENT').val()
	var USER = $('#USER').val()
	var DEALER = $('#DEALER').val()
	var WE = $('#WE').val()
	var SUPPLIER = $('#SUPPLIER').val()
	$.ajax({
        type: "POST",
        url: "customer_update.php",
        data: {"DATE":DATE,"TIME":TIME,"AMOUNT":AMOUNT,"JOB":JOB,"EQUIPMENT":EQUIPMENT,"USER":USER,"DEALER":DEALER,"WE":WE,"SUPPLIER":SUPPLIER},
        success: function(res) {
            window.location.href="customer_update.php";
        },
		
    });
}

</script>


