<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn = new Databases;
	$conn = $conn->__construct();
	
	mysqli_query($conn, "SET NAMES 'utf8' ");
//query
	$query=mysqli_query($conn,"SELECT COUNT(CUSTOMER_ID) FROM customer");
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	$page_rows = 5;
	$last = ceil($rows/$page_rows);
	if($last < 1)
	{
		$last = 1;
	}
	$pagenum = 1;

	if(isset($_GET['pn']))
	{
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	if ($pagenum < 1) 
	{
		$pagenum = 1;
	}
	else if ($pagenum > $last) 
	{
		$pagenum = $last;
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	$nquery=mysqli_query($conn,"SELECT * from  customer $limit");

	$paginationCtrls = '';

	if($last != 1)
	{
		if ($pagenum > 1) 
		{
			$previous = $pagenum - 1;
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';

		for($i = $pagenum-4; $i < $pagenum; $i++)
		{
			if($i > 0)
			{
				$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
			}
		}
	}

	$paginationCtrls .= ''.$pagenum.' &nbsp; ';

	for($i = $pagenum+1; $i <= $last; $i++)
	{
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4)
		{
			break;
		}
	}

if ($pagenum != $last) 
{
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
}
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

<!-- Modal -->


<div class="container">
   <br>
  <h2>AZZA-CUSTOMER-REGISTRATION</h2>
  <br>
  <!-- Trigger the modal with a button -->
  <input type="text" placeholder="search">
  <button type="button" class="btn btn-primary btn-sm">SEARCH</button>
  <button type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add</button>
  
  <br>
  
  
	  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form id="CUSTOMER" name="CUSTOMER" method="POST">
    	
		<input type="date" autocomplete="off" id="datepicker" name="datepicker" placeholder="SELECT DATE">
        <br>
        <input type="text" autocomplete="off" id="timepicker" name="timepicker" width="276" placeholder="SELECT TIME">
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
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="creates()">OK</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  </div>
</div>
	<br>
	<div id="viewCustomer"></div>
    
     <div style="float:right;margin-right:50px;" id="pagination_controls"><?php echo $paginationCtrls; ?></div>
    
</body>
</html>

<script>
$(function(){
   $('.datepicker').datepicker({
      format: 'yyyy/mm/dd'
    });
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
		return false;
	}
	if(TIME==='')
	{
		alert('Enter TIME')
		return false;
	}
	if(AMOUNT==='')
	{
		alert('Enter AMOUNT')
		return false;
	}
	if(JOB==='')
	{
		alert('Enter JOB')
		return false;
	}
	if(EQUIPMENT==='')
	{
		alert('Enter EQUIPMENT')
		return false;
	}
	$.ajax({
        type: "POST",
        url: "customer_create.php",
        data: {"DATE":DATE,"TIME":TIME,"AMOUNT":AMOUNT,"JOB":JOB,"EQUIPMENT":EQUIPMENT,"USER":USER,"DEALER":DEALER,"WE":WE,"SUPPLIER":SUPPLIER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')


</script>