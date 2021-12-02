<?php
	
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$CONSIGNEE2 = $_POST['CONSIGNEE2'];	
	$EMAIL2 = $_POST['EMAIL2'];
	$PHONE2 = $_POST['PHONE2'];
	$PROVINCE2 = $_POST['PROVINCE2'];
	$DISTRICT2 = $_POST['DISTRICT2'];
	$SUBDISTRICT2 = $_POST['SUBDISTRICT2'];
	$ZIPCODE2 = $_POST['ZIPCODE2'];
	$sql = "insert into suppliers (CONSIGNEE,EMAIL,PHONE,PROVINCE,DISTRICT,SUBDISTRICT,ZIPCODE) values ('$CONSIGNEE2','$EMAIL2','$PHONE2','$PROVINCE2','$DISTRICT2','$SUBDISTRICT2','$ZIPCODE2')";
	mysqli_query($conn, $sql);

?>