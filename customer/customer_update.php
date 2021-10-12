<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_POST['ID'];
	
	$query = "UPDATE customer SET CREATE_DATE='' WHERE CUSTOMER_ID=$ID";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	print_r($row);
	
?>