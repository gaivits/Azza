<?php
	
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	
	$DATE = $_POST["DATE"];
	$REF_NO = str_replace("/","",$_POST['DATE']);
	$TIME = $_POST['TIME'];
	$PROJECT = $_POST['PROJECT'];
	$USER =$_POST['USER'];
	$UNIT =$_POST['UNIT'];	
	$DEALER = $_POST['DEALER'];
	$CATEGORY  = $_POST['CATEGORY'];
	$BRANDNAME = $_POST['BRANDNAME'];
	$SERIES = $_POST['SERIES'];
	$LOGOS = $_POST["LOGO"]." ".$_POST["GOODS"];
	
	$AMOUNT = $_POST['AMOUNT'];
	$sql = "INSERT INTO customer (REF_NO,CREATE_DATE,TIME,PROJECT,USER,UNIT,DEALER,CATEGORY,BRANDNAME,SERIES,LOGO,AMOUNT)
VALUES ('$REF_NO','$DATE','$TIME','$PROJECT','$USER','$UNIT','$DEALER','$CATEGORY','$BRANDNAME','$SERIES','$LOGOS','$AMOUNT')";
	
	mysqli_query($conn, $sql);

?>