<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$DEALER = $_POST['DEALER'];
	
	$SUBDEPARTMENT = $_POST['SUBDEPARTMENT2'];
	$NAME = $_POST['NAME2'];
	$PHONE = $_POST['PHONE2'];
	$ADDRNO = $_POST['ADDRNO'];
	$EMAIL = $_POST['EMAIL2'];
	$PROVINCE = $_POST['PROVINCE2'];
	$DISTRICT = $_POST['DISTRICT2'];
	$SUBDISTRICT = $_POST['SUBDISTRICT2'];
	$ZIPCODE = $_POST['ZIPCODE2'];
	
$sql = "INSERT INTO dealers (COMPANY,DEPARTMENT,NAME,PHONE,ADDRNO,EMAIL,PROVINCE,DISTRICT,SUBDISTRICT,ZIPCODE) VALUES ('$DEALER','$SUBDEPARTMENT','$NAME','$PHONE','$ADDRNO','$EMAIL','$PROVINCE','$DISTRICT','$SUBDISTRICT','$ZIPCODE')";
	mysqli_query($conn, $sql);
	
	?>