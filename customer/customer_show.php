<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";

$conn=new Databases;
$conn = $conn->__construct();
$query = "SELECT * FROM customer";
$result = mysqli_query($conn, $query);
$idx=00;

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
<style>
	.dels
	{
		height: 15px;
		width:15px;
	}
	.edits
	{
		height: 15px;
		width:15px;
	}
</style>
<body>

<br>
<a style="margin-left:85%" class="btn btn-link" href="customer.php">กลับ</a>
<table border='1' style="width:99%;" class="table table-striped table-sm">
  <thead style="font-size:14px;">
   
    <tr align="center">
        <td colspan="6"><h3>เลข</h3></td>
        <td colspan="5"><h3>SYSTEM</h3></td>
        <td><h3>PRODUCT</h3></td>
        <td colspan="3"><h3>STATUS</h3></td>
        <td colspan="2"><h3>ACTION</h3></td>
    </tr>
    <tr align="center">
        <th>วัน</th>
        <th>เวลา</th>
        <th>งาน</th>
        <th>รก</th>
        <th>REF</th>
        <th>ชื่องาน</th>
        	<th>USER</th>
            <th>SUBUSER</th>
            <th>DEALER</th>
            <th>WE</th>
            <th>SUPPLIER</th>
        <th>สินค้า</th>   
		
      	   <th>รอ</th>
           <th>ไม่รับ</th>
           <th>รับ</th>
     			<th>ลบ</th>
            	<th>แก้ไข</th>
     </tr>
    
  </thead>
  <tbody style="font-size:12px;">
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=$idx+1;
			//$nrow=explode(" ",$row['LOGO']);
			
		?>
		<tr id=<?php echo $row["CUSTOMER_ID"];?>>
        <td width="1%" align="center"><nobr><?php echo $row['CREATE_DATE'];?></nobr></td>
        <td width="1%" align="center"><nobr><?php echo $row['TIME'];?></nobr></td>
    	<td width="1%" align="center"><nobr><?php echo sprintf("%02d",$row['CUSTOMER_ID']); ?></a></nobr></td>
    	<td width="1%" align="left"><nobr><?php echo sprintf("%02d",$row['CUSTOMER_ID']); ?></nobr></td>
    	<td width="2%" align="center"><nobr><?php echo "CR".$row['REF_NO'].sprintf("%02d",$row['CUSTOMER_ID']).sprintf("%02d",$row['CUSTOMER_ID']);?></a></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['PROJECT']; ?></a></nobr></td>
    	<td width="2%" align="left"><a href="customer_show_user.php?ID=<?=$row['CUSTOMER_ID'];?>"><nobr>รายละเอียด</nobr></a></td>
        <td width="7%" align="left"><nobr><?php echo $row['UNIT']; ?></nobr></td>
        <td width="3%" align="left"><a href="customer_show_dealer.php?ID=<?=$row['CUSTOMER_ID'];?>"><nobr>รายละเอียด</nobr></a></td>
        <td width="2%" align="center"><a href="customer_show_we.php?ID=<?=$row['CUSTOMER_ID'];?>"><nobr>รายละเอียด</nobr></a></td>
        <td width="3%" align="left"><a href="customer_show_supplier.php?ID=<?=$row['CUSTOMER_ID'];?>"><nobr>รายละเอียด</nobr></a></td>
        <td width="3%" align="left"><a href="customer_show_product.php?ID=<?=$row['CUSTOMER_ID'];?>"><nobr>รายละเอียด</nobr></a></td>
        
        <td width="1%" style="cursor: pointer;" id="U2D"><input type="color" id="WAITS">
        </td>
        <td width="1%" style="cursor: pointer;" id="D2W"><input type="color" id="CANCELS"></td>
        	
        <td width="1%" style="cursor: pointer;" id="W2S"><input type="color" id="ACCEPTS"></td>
        <td width="1%" align="center"><button class="btn btn-danger dels" id="dels" name="dels" onclick="dels(<?php echo $row["CUSTOMER_ID"];?>)" ></button></td>
        <td width="1%" align="center" ><button class="btn btn-info edits" id="edits" name="edits" data-toggle="modal" data-target="#myModal-2" onclick="edits(<?php echo $row["CUSTOMER_ID"];?>)" ></button></td>
        
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

function dels(ID)
{
	if(confirm('คุณต้องการลบหรือไม่?') )
	{
		$.ajax({
			url : "customer_del.php",
			type:"POST",
			data : {"REF_NO":ID},
			success:function(res){
					$("#delete"+ID).hide()
					
				}
			})
	}
	window.location.href = "customer.php"
}
function edits(ID)
{
	var url = "customer_edit.php"
	var SETDATA = {ID:ID}
    $.post(url,SETDATA,function(res){
			$('#editCustomer').html(res)
		})
	
}




</script>