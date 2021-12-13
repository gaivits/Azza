<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_POST["REF_NO"];
	$sql = "DELETE FROM products WHERE ID='$ID'";	
	mysqli_query($conn, $sql);
	
?>