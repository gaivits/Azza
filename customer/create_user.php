<?
include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
	$conn=new Databases;
	$conn = $conn->__construct();
	$DEPARTMENT = $_POST['DEPARTMENT1'];	
	$SUBDEPARTMENT = $_POST['SUBDEPARTMENT1'];
	$NAME = $_POST['NAME1'];
	$PHONE = $_POST['PHONE1'];
	$EMAIL = $_POST['EMAIL1'];
	$PROVINCE = $_POST['PROVINCE1'];
	$DISTRICT = $_POST['DISTRICT1'];
	$SUBDISTRICT = $_POST['SUBDISTRICT1'];
	$ZIPCODE = $_POST['ZIPCODE1'];
	
	$sql = "insert into users (DEPARTMENT,SUBDEPARTMENT,NAME,PHONE,EMAIL,PROVINCE,DISTRICT,SUBDISTRICT,ZIPCODE) values ('$DEPARTMENT',
	'$SUBDEPARTMENT','$NAM'E,'$PHONE','$EMAIL','$PROVINCE','$DISTRICT','$SUBDISTRICT','$ZIPCODE')";
	
	mysqli_query($conn, $sql);
	?>