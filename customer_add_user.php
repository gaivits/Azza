<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ADD_USER = $_POST['ADD_USER'];
	$sql = "INSERT INTO tbl_master_groupcode (ID,TYPE,NAME,REMARK) VALUES ('','USER','$ADD_USER','')";	
	mysqli_query($conn,$sql);
?>