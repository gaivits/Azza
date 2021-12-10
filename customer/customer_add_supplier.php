<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$SUPPLIER = $_POST['SUPPLIER'];
	$COMPANY = $_POST['COMPANY4'];
	$SUBDEPARTMENT = $_POST['SUBDEPARTMENT4'];
	$NAME = $_POST['NAME4'];
	$PHONE = $_POST['PHONE4'];
	$ADDRNO = $_POST['ADDRNO4'];
	$EMAIL = $_POST['EMAIL4'];
	$PROVINCE = $_POST['PROVINCE4'];
	$DISTRICT = $_POST['DISTRICT4'];
	$SUBDISTRICT = $_POST['SUBDISTRICT4'];
	$ZIPCODE = $_POST['ZIPCODE4'];
	
$sql = "INSERT INTO suppliers (COMPANY,DEPARTMENT,NAME,PHONE,ADDRNO,EMAIL,PROVINCE,DISTRICT,SUBDISTRICT,ZIPCODE) VALUES ('$SUPPLIER',         '$DEALER','$SUBDEPARTMENT','$NAME','$PHONE','$ADDRNO','$EMAIL','$PROVINCE','$DISTRICT','$SUBDISTRICT','$ZIPCODE')";
	mysqli_query($conn, $sql);
	
	?>