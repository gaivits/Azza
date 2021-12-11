<?php
	
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	echo $_POST['CUSTOMER_ID5'];
	
	$CATEGORY  = $_POST['CATEGORY'];
	$BRANDNAME = $_POST['BRANDNAME'];
	$SERIES = $_POST['SERIES'];
	$LOGOS = $_POST["LOGO"]." ".$_POST["GOODS"];
	$AMOUNT = $_POST['AMOUNT'];
	$PCS = $_POST['PCS5'];
	$CUSTOMER_ID = $_POST['CUSTOMER_ID5'];
	$sql = "INSERT INTO products (CATEGORY,BRANDNAME,SERIES,LOGO,AMOUNT,PCS,CUSTOMER_ID)
VALUES ('$CATEGORY','$BRANDNAME','$SERIES','$LOGOS','$AMOUNT','$PCS','$CUSTOMER_ID')";
	mysqli_query($conn, $sql);

?>