<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";

$conn=new Databases;
$conn = $conn->__construct();
$REF_NO = $_GET['REF_NO'];
$query = "SELECT * FROM customer WHERE REF_NO=$REF_NO";
$result = mysqli_query($conn, $query);
$idx=0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> 
<title>Customer</title>
</head>


<body>

<table border='1' style="width:80%; margin-left:1.5%" class="table table-striped table-sm">
  <thead align="center" style="font-size:14px;">
    <tr>
      
      <th>ลูกค้า</th>
      <th>จังหวัด</th>
      <th>เขต/อำเภอ</th>
      <th>แขวง/ตำบล</th>
      <th>ไปรษณีย์</th>
      <th>ติดต่อ</th>
      <th>ฝ่าย/แผนก</th>
      <th>ผู้รับผิดชอบ</th>
      <th>โทร</th>
      <th>E-MAIL</th>
    
    </tr>
  </thead>
  <tbody>
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=$idx+1;
		?>
		
        <td width="6%" align="center"><nobr><?php echo $row['USER'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['PROVINCE'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['DISTRICT'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['SUBDISTRICT'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['ZIPCODE'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['CONTACT'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['DEPARTMENT'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['NAME'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['PHONE'] ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row['EMAIL'] ;?></nobr></td>
        
        
        
		</tr>
        <?php
		}
?>
    </tr>
   </tbody>
</table>

</body>
 
<div id="editCustomer"></div>
  

</body>
</html>
<script>





</script>