<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_GET[ID];
	$AMOUNT=$_POST[AMOUNT];
	$sql = "update customer set AMOUNT=$AMOUNT WHERE $ID=CUSTOMER_ID";
	mysqli_query($conn,$sql);
	echo header("location:customer.php");
?>