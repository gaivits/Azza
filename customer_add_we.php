<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ADD_WE = $_POST['ADD_WE'];
	$sql = "INSERT INTO tbl_master_groupcode (TYPE,NAME,REMARK) VALUES ('WE','$ADD_WE','')";	
	mysqli_query($conn,$sql);
?>