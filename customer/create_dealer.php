<?php
	
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$CONSIGNEE1 = $_POST['CONSIGNEE1'];	
	$EMAIL1 = $_POST['EMAIL1'];
	$PHONE1 = $_POST['PHONE1'];
	$PROVINCE1 = $_POST['PROVINCE1'];
	$DISTRICT1 = $_POST['DISTRICT1'];
	$SUBDISTRICT1 = $_POST['SUBDISTRICT1'];
	$ZIPCODE1 = $_POST['ZIPCODE1'];
	$sql = "insert into dealers (CONSIGNEE,EMAIL,PHONE,PROVINCE,DISTRICT,SUBDISTRICT,ZIPCODE) values ('$CONSIGNEE1','$EMAIL1','$PHONE1','$PROVINCE1','$DISTRICT1','$SUBDISTRICT1','$ZIPCODE1')";
	mysqli_query($conn, $sql);

?>