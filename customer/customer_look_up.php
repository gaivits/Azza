<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";

$conn=new Databases;
$conn = $conn->__construct();
$JOB = $_POST['SEARCH_JOB'];
$query = "SELECT * FROM customer WHERE JOB LIKE '%$JOB%' ";
$result = mysqli_query($conn, $query);


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

<table border='1' style="width:80%;margin-left:15%" class="table table-striped table-sm">
  <thead align="center">
    <tr>
      <th>NO.</th>
      <th>DATE</th>
      <th>TIME</th>
      <th>จัดซื้อประมาณ</th>
      <th>โครงงาน</th>
      <th>อุปกรณ์</th>
      <th>USER</th>
      <th>DEALER</th>
      <th>WE</th>
      <th>SUPPLIER</th>
      
    </tr>
  </thead>
  <tbody>
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=0;
		?>
		<tr id=<?php echo $row["CUSTOMER_ID"] ;?>>
    	<td width="2%" align="center"><nobr><?php echo $row[$idx]; ?></nobr></td>
    	<td width="3%" align="center"><nobr><?php echo $row["CREATE_DATE"]; ?></nobr></td>
    	<td width="3%" align="center"><nobr><?php echo $row["TIME"]; ?></nobr></td>
    	<td width="5%" align="right"><nobr><?php echo number_format($row["AMOUNT"],2); ?></nobr></td>
    	<td width="10%" align="left"><nobr><?php echo $row["JOB"]; ?></nobr></td>
        <td width="10%" align="left"><nobr><?php echo $row["EQUIPMENT"]; ?></nobr></td>
        <td width="6%" align="center"><nobr><?php echo $row["USER"]; ?></nobr></td>
        <td width="10%" align="center"><nobr><?php echo $row["DEALER"]; ?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row["WE"]; ?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row["SUPPLIER"]; ?></nobr></td>
        
        
		</tr>
		<?php
	$idx=$idx+1;
	}
?>
    </tr>
   </tbody>
</table>

 
</body>
 
<div id="editCustomer"></div>
  

</body>
</html>
