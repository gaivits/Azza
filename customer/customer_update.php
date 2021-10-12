<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	
	$DATE = $_POST['DATE'];
	echo $DATE;
	$sql = "UPDATE customer
SET CREATE_DATE='$DATE', TIME='$TIME',AMOUNT='$AMOUNT',JOB='$JOB',EQUIPMENT='$EQUIPMENT',USER='$USER',DEALER='$DEALER',WE='$WE',SUPPLIER='$SUPPLIER' WHERE CUSTOMER_ID=$ID";
	mysqli_query($conn, $sql);
	
?>