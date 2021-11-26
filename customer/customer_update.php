<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_GET['ID'];
	$DATE = $_POST['datepicker2'];
	$TIME = $_POST['timepicker2'];
	$AMOUNT=$_POST['AMOUNT'];
	$PROJECT = $_POST['PROJECT'];
	$USER = $_POST['USER'];
	$UNIT = $_POST['UNIT'];
	$BRANDNAME = $_POST['BRANDNAME2'];
	$SERIES = $_POST['SERIES2'];
	$LOGO = $_POST['LOGO2']." ".$_POST['GOODS2'];
	
	$PROVINCE=$_POST['PROVINCE'];
	$DISTRICT=$_POST['DISTRICT'];
	$SUBDISTRICT = $_POST['SUBDISTRICT'];
	$ZIPCODE = $_POST['ZIPCODE'];
	$CONTACT = $_POST['CONTACT'];
	$DEPARTMENT = $_POST['DEPARTMENT'];
	$NAME = $_POST['NOTENAME'];
	$PHONE = $_POST['PHONE'];
	$EMAIL=$_POST['EMAIL'];
	$DEALER = $_POST['DEALER'];
	$WE=$_POST['WE'];
	$SUPPLIER = $POST['SUPPLIER'];
	$sql = "UPDATE customer SET
	CREATE_DATE='$DATE',
	TIME='$TIME',PROJECT='$PROJECT', 
	AMOUNT='$AMOUNT',USER='$USER',
	UNIT='$UNIT',BRANDNAME='$BRANDNAME',
	SERIES='$SERIES',LOGO='$LOGO'
	WHERE CUSTOMER_ID='$ID' ";
	mysqli_query($conn,$sql);
	header("localtion:customer.php");
?>