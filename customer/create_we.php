<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$WE = $_POST['COMPANY3'];
	
	$SUBDEPARTMENT = $_POST['SUBDEPARTMENT3'];
	$NAME = $_POST['NAME3'];
	$PHONE = $_POST['PHONE3'];
	$ADDRNO = $_POST['ADDRNO3'];
	$EMAIL = $_POST['EMAIL3'];
	$PROVINCE = $_POST['PROVINCE3'];
	$DISTRICT = $_POST['DISTRICT3'];
	$SUBDISTRICT = $_POST['SUBDISTRICT3'];
	$ZIPCODE = $_POST['ZIPCODE3'];
	
$sql = "INSERT INTO we (COMPANY,DEPARTMENT,NAME,PHONE,ADDRNO,EMAIL,PROVINCE,DISTRICT,SUBDISTRICT,ZIPCODE) VALUES ('$WE','$SUBDEPARTMENT','$NAME','$PHONE','$ADDRNO','$EMAIL','$PROVINCE','$DISTRICT','$SUBDISTRICT','$ZIPCODE')";
	mysqli_query($conn, $sql);
	
	?>