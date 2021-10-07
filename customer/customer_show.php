<?php
//fetch.php
include "C:/xampp/htdocs/xampp/Azza/connects.php";
$conn=new Databases;
$conn = $conn->__construct();
$query = "SELECT * FROM customer";
$result = mysqli_query($conn, $query);

?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<title>Customer</title>
</head>

<body>

	<table border='1' style="width:80%;margin-left:15%" class="table table-striped">
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
      <th>DELETE</th>
    </tr>
  </thead>
  <tbody>
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=0;
		?>
		<tr id=<?php echo $row["CUSTOMER_ID"] ;?>>
    	<td width="5%" align="center"><?php echo $row[$idx]; ?></td>
    	<td width="5%" align="center"><?php echo $row["CREATE_DATE"]; ?></td>
    	<td width="5%" align="center"><?php echo $row["TIME"]; ?></td>
    	<td width="7%" align="right"><?php echo number_format($row["AMOUNT"],2); ?></td>
    	<td width="10%" align="left"><?php echo $row["JOB"]; ?></td>
        <td width="10%" align="left"><?php echo $row["EQUIPMENT"]; ?></td>
        <td width="6%" align="center"><?php echo $row["USER"]; ?></td>
        <td width="12%" align="center"><?php echo $row["DEALER"]; ?></td>
        <td width="5%" align="center"><?php echo $row["WE"]; ?></td>
        <td width="5%" align="center"><?php echo $row["SUPPLIER"]; ?></td>
        <td><button class="btn btn-danger btn-sm" onclick="del(<?php echo $row["CUSTOMER_ID"] ;?>)" >DEL</button></td>
		</tr>
		<?php
	$idx=$idx+1;
	}
?>
    </tr>
    
  </tbody>
</table>
</body>
</html>
<script>
function del(ID)
{
	if(confirm('Do you want to delete?') )
	{
		$.ajax({
			url : "customer_del.php",
			type:"POST",
			data : {"ID":ID},
			success:function(res){
					$("#delete"+id).hide(800)
				}
			})
	}
}
</script>