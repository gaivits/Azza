<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ADD_SUPPLIER = $_POST['ADD_SUPPLIER'];
	$sql = "INSERT INTO tbl_master_groupcode (TYPE,NAME,REMARK) VALUES ('SUPPLIER','$ADD_SUPPLIER','')";	
	mysqli_query($conn,$sql);
?>