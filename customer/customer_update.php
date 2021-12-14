z<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$ID = $_GET['ID'];
	$REF_NO = str_replace("/","",$_POST['datepicker2']);
	$DATE = $_POST['datepicker2'];
	$TIME = $_POST['timepicker2'];
	
	$PROJECT = $_POST['PROJECT'];
	$UNIT = $_POST['UNIT'];
	
	$sql = "UPDATE customer SET
	CREATE_DATE='$DATE',REF_NO='$REF_NO',
	TIME='$TIME',UNIT='$UNIT',PROJECT='$PROJECT'
	WHERE CUSTOMER_ID='$ID' ";
	mysqli_query($conn,$sql);
	header("location:customer.php");
?>