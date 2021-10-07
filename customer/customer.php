	<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 4 DatePicker</title>
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
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="https://www.cirsa.com/" target="_blank">
    <img src="data:image/png;base64,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" height="70" width="50">
  </a>
  
  <div class="collapse navbar-collapse order-last order-md-0" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Add</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<!-- Modal -->

<div class="container">
  <h2>AZZA-CUSTOMER-REGISTRATION</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Add</button>
  
	  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form id="CUSTOMER" name="CUSTOMER" method="POST">
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
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="creates()">OK</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
	<br>
	<div id="viewCustomer">
	</div>
</body>
</html>

<script>
	
	$('#datepicker').datepicker({
            format: 'yyyy/mm/dd'
        });
	 $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
function creates(){
	var DATE = $('#datepicker').val()
	var TIME = $('#timepicker').val()
	var AMOUNT = $('#AMOUNT').val()
	var JOB = $('#JOB').val()
	var EQUIPMENT = $('#EQUIPMENT').val()
	var USER = $('#USER').val()
	var DEALER = $('#DEALER').val()
	var WE = $('#WE').val()
	var SUPPLIER = $('#SUPPLIER').val()
	if(DATE==='')
	{
		alert('Enter Date')
	}
	if(TIME==='')
	{
		alert('Enter TIME')
	}
	if(AMOUNT==='')
	{
		alert('Enter AMOUNT')
	}
	if(JOB==='')
	{
		alert('Enter JOB')
	}
	if(EQUIPMENT==='')
	{
		alert('Enter EQUIPMENT')
	}
	$.ajax({
        type: "POST",
        url: "customer_create.php",
        data: {"DATE":DATE,"TIME":TIME,"AMOUNT":AMOUNT,"JOB":JOB,"EQUIPMENT":EQUIPMENT,"USER":USER,"DEALER":DEALER,"WE":WE,"SUPPLIER":SUPPLIER},
		dataType:"text",
        success: function(html) {
            $('#viewCustomer').load('customer_show.php').fadeIn(1000)
        },
		
    });
	
}
$('#viewCustomer').load('customer_show.php')

</script>



