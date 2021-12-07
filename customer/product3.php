<?php
 
 $con= mysqli_connect("localhost","root","","customers") or die("Error: " . mysqli_error($con));
  mysqli_query($con, "SET NAMES 'utf8' ");
  error_reporting( error_reporting() & ~E_NOTICE );
  date_default_timezone_set('Asia/Bangkok');  

 	
  	$GOODS = $_POST['GOODS'];
	$BRAND = $_POST['BRAND'];
  	$sql = "SELECT * FROM warehouse WHERE MODULE='$GOODS' AND BRAND = '$BRAND' ";
  	$query = mysqli_query($con, $sql);
  	echo '<option value="">-รุ่น-</option>';
  	while ($data = mysqli_fetch_assoc($query)) 
	{
  		echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";
  	}
  
  
?>