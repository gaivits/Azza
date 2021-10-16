<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_GET[ID];
	$DATE = $_POST[DATE];
	$TIME = $_POST[TIME];
	$AMOUNT = $_POST[AMOUNT];
	$JOB = $_POST[JOB];
	$EQUIPMENT = $_POST[EQUIPMENT];
	$USER = $_POST[USER];
	$DEALER = $_POST[DEALER];
	$WE = $_POST[WE];
	$SUPPLIER = $_POST[SUPPLIER];
	$sql = "UPDATE customer SET 
	CREATE_DATE='$DATE',
	TIME = '$TIME',
	AMOUNT = '$AMOUNT',
	JOB = '$JOB',
	EQUIPMENT = '$EQUIPMENT',
	USER = '$USER',
	DEALER = '$DEALER',
	WE = '$WE',
	SUPPLIER = '$SUPPLIER'
	WHERE CUSTOMER_ID=$ID";	
	mysqli_query($conn, $sql);
	echo header("location:customer.php");
	?>
