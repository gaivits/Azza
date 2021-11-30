z<?php
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
	$PROVINCE=$_POST['Ref_prov_id2'];
	$DISTRICT=$_POST['Ref_dist_id'];
	$SUBDISTRICT = $_POST['Ref_subdist_id'];
	$ZIPCODE = $_POST['zip_code2'];
	$CONTACT = $_POST['CONTACT'];
	$DEPARTMENT = $_POST['DEPARTMENT'];
	$NAME = $_POST['NOTENAME'];
	$PHONE = $_POST['PHONE'];
	$EMAIL=$_POST['EMAIL'];
	$DEALER = $_POST['DEALER'];
	$WE=$_POST['WE'];
	$SUPPLIER = $_POST['SUPPLIER'];
	$sql = "UPDATE customer SET
	CREATE_DATE='$DATE',
	TIME='$TIME',PROJECT='$PROJECT', 
	AMOUNT='$AMOUNT',USER='$USER',
	UNIT='$UNIT',BRANDNAME='$BRANDNAME',
	SERIES='$SERIES',LOGO='$LOGO',
	PROVINCE='$PROVINCE',DISTRICT='$DISTRICT',
	SUBDISTRICT='$SUBDISTRICT',ZIPCODE='$ZIPCODE',
	CONTACT='$CONTACT',DEPARTMENT='$DEPARTMENT',
	NAME='$NAME',PHONE='$PHONE',
	EMAIL='$EMAIL',DEALER='$DEALER',
	WE='$WE',SUPPLIER='$SUPPLIER'
	WHERE CUSTOMER_ID='$ID' ";
	mysqli_query($conn,$sql);
	header("location:customer.php");
?>