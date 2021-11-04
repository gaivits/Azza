<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$REF_NO = $_POST["REF_NO"];
	$sql = "DELETE FROM customer WHERE REF_NO='$REF_NO'";	
	mysqli_query($conn, $sql);
	
?>