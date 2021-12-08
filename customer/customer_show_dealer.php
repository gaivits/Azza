<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";

$conn=new Databases;
$conn = $conn->__construct();
$ID = $_GET['ID'];
$query = "SELECT * FROM dealers WHERE ID='$ID' ";
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
<a style="margin-left:85%" class="btn btn-link" href="customer.php">กลับ</a>
<table border='1' style="width:99%; margin-left:1.5%" class="table table-striped table-sm">
  <thead align="center" style="font-size:14px;">
    <tr>
      
      
    <th>ผู้รับ</th>
      <th>โทร.</th>
      <th>E-MAIL</th>
      <th>เลขที่</th>
      <th>จังหวัด</th>
      <th>เขต/อำเภอ</th>
      <th>แขวง/ตำบล</th>
      <th>ไปรษณีย์</th>
    
    </tr>
  </thead>
  <tbody>
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=$idx+1;
		?>
		<td width="3%" align="center"><nobr><?php echo $row['NAME'];?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['PHONE'];?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['EMAIL'];?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['ADDRNO'];?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo preg_replace('/[0-9]+/', '', $row['PROVINCE']) ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo preg_replace('/[0-9]+/', '', $row['DISTRICT']) ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo preg_replace('/[0-9]+/', '', $row['SUBDISTRICT']) ;?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['ZIPCODE'];?></nobr></td>
        
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
