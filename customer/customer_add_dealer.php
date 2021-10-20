<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ADD_DEALER = $_POST['ADD_DEALER'];
	$sql = "INSERT INTO tbl_master_groupcode (TYPE,NAME,REMARK) VALUES ('DEALER','$ADD_DEALER','')";	
	mysqli_query($conn,$sql);
?>