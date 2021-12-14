<?php
	
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	
	$DATE = $_POST["DATE"];
	$REF_NO = str_replace("/","",$_POST['DATE']);
	$TIME = $_POST['TIME'];
	$PROJECT = $_POST['PROJECT'];
	
	$UNIT =$_POST['UNIT'];	
	
	
	$AMOUNT = $_POST['AMOUNT'];
	$sql = "INSERT INTO customer (REF_NO,CREATE_DATE,TIME,PROJECT,UNIT)
VALUES ('$REF_NO','$DATE','$TIME','$PROJECT','$UNIT')";
	mysqli_query($conn, $sql);

?>