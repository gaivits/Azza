<?php
	
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	
	
	$CATEGORY  = $_POST['CATEGORY'];
	$BRANDNAME = $_POST['BRANDNAME'];
	$SERIES = $_POST['SERIES'];
	$LOGOS = $_POST["LOGO"]." ".$_POST["GOODS"];
	
	$AMOUNT = $_POST['AMOUNT'];
	$sql = "INSERT INTO products (CATEGORY,BRANDNAME,SERIES,LOGO,AMOUNT)
VALUES ('$CATEGORY','$BRANDNAME','$SERIES','$LOGOS','$AMOUNT')";
	mysqli_query($conn, $sql);

?>