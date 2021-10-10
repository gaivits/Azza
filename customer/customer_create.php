<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn=new Databases;
	$conn = $conn->__construct();
	$DATE = $_POST["DATE"];
	$TIME = $_POST["TIME"];
	$AMOUNT = $_POST["AMOUNT"];
	$JOB = $_POST["JOB"];
	$EQUIPMENT = $_POST["EQUIPMENT"];
	$USER = $_POST["USER"];
	$DEALER = $_POST["DEALER"];
	$WE =$_POST["WE"];
	$SUPPLIER = $_POST["SUPPLIER"];
	
	$sql = "INSERT INTO customer (CREATE_DATE,TIME,AMOUNT,JOB,EQUIPMENT,USER,DEALER,WE,SUPPLIER) VALUES  ('$DATE','$TIME','$AMOUNT','$JOB','$EQUIPMENT','$USER','$DEALER','$WE','$SUPPLIER')";	
	mysqli_query($conn, $sql);

?>

