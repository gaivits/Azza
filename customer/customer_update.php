<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_POST[ID];
	$DATE = $_POST[DATE];
	$TIME = $_POST[TIME];
	$AMOUNT = $_POST[AMOUNT];
	$JOB = $_POST[JOB];
	$EQUIPMENT = $_POST[EQUIPMENT];
	$USER = $_POST[USER];
	$PROVICE = $_POST[PROVINCE];
	$DISTRICT = $_POST[DISTRICT];
	$SUBDISTRICT = $_POST[SUBDISTRICT];
	$ZIPCODE = $_POST[ZIPCODE];
	$CONTACT = $_POST[CONTACT];
	$DEPARTMENT = $_POST[DEPARTMENT];
	$NAME = $_POST[NAME];
	$PHONE = $_POST[PHONE];
	$EMAIL = $_POST[EMAIL];
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
	PROVINCE = '$PROVICE',
	DISTRICT = '$DISTRICT',
	SUBDISTRICT = '$DISTRICT',
	CONTACT = '$CONTACT',
	DEPARTMENT = '$DEPARTMENT',
	NAME = '$NAME',
	PHONE = '$PHONE',
	EMAIL = '$EMAIL',
	DEALER = '$DEALER',
	WE = '$WE',
	SUPPLIER = '$SUPPLIER'
	WHERE CUSTOMER_ID=$ID";	
	mysqli_query($conn, $sql);
	echo header("location:customer_show.php");
	?>
