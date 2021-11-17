<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_POST["CUSTOMER_ID"];
	$sql = "DELETE FROM customer WHERE CUSTOMER_ID='$ID'";	
	mysqli_query($conn, $sql);
	
?>