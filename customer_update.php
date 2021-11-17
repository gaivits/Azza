<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_GET[ID];
	$DATE = $_POST[CREATE_DATE];
	$TIME = $_POST[TIME];
	$AMOUNT=$_POST[AMOUNT];
	$PROJECT = $_POST[PROJECT];
	$EQUIPMENT = $_POST[EQUIPMENT];
	$sql = "update customer setCREATE_DATE=$DATE 
	,TIME = $TIME,AMOUNT=$AMOUNT,
	PROJECT = $PROJECT,EQUIPMENT=$EQUIPMENT
	WHERE $ID=CUSTOMER_ID";
	mysqli_query($conn,$sql);
	echo header("location:customer.php");
?>