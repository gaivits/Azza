<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_GET[ID];
	$DATE = $_POST[CREATE_DATE];
	$AMOUNT=$_POST[AMOUNT];
	
	$sql = "update customer set AMOUNT=$AMOUNT,CREATE_DATE=$DATE WHERE $ID=CUSTOMER_ID";
	mysqli_query($conn,$sql);
	echo header("location:customer.php");
?>