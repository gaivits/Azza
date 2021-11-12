<?php
 
 $con= mysqli_connect("localhost","root","","customers") or die("Error: " . mysqli_error($con));
  mysqli_query($con, "SET NAMES 'utf8' ");
  error_reporting( error_reporting() & ~E_NOTICE );
  date_default_timezone_set('Asia/Bangkok');  

 	
  	$LOGO = $_POST['LOGO'];
	
  	$sql = "SELECT * FROM MODULE WHERE SERIES='$LOGO'";
  	$query = mysqli_query($con, $sql);
  	echo '<option value="">-เลือก การนำไปใช้-</option>';
  	while ($data = mysqli_fetch_assoc($query)) 
	{
  		echo "<option value='". $data['MODULE'] ."'>" .$data['MODULE'] ."</option>";
  	}
  
  
?>