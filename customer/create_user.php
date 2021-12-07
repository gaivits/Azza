<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$CONSIGNEE = $_POST['CONSIGNEE'];	
	$EMAIL = $_POST['EMAIL'];
	$PHONE = $_POST['PHONE'];
	$PROVINCE = $_POST['PROVINCE'];
	$DISTRICT = $_POST['DISTRICT'];
	$SUBDISTRICT = $_POST['SUBDISTRICT'];
	$ZIPCODE = $_POST['ZIPCODE'];
	$sql = "insert into users (CONSIGNEE,EMAIL,PHONE,PROVINCE,DISTRICT,SUBDISTRICT,ZIPCODE) values ('$CONSIGNEE','$EMAIL','$PHONE','$PROVINCE','$DISTRICT','$SUBDISTRICT','$ZIPCODE')";
	mysqli_query($conn, $sql);
	
	?>