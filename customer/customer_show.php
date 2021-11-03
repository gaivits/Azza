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


<body>
<br>
<table border='1' style="width:90%; margin-left:5%" class="table table-striped table-sm">
  <thead align="center" style="font-size:14px;">
   <tr align="center">
        <th><h2>รายการ</h2></th>
    </tr>
    <tr>
        <td colspan="4"><h3>เลข</h3></td>
        <td colspan="6"><h3>SYSTEM</h3></td>
        <td colspan="4"><h3>PRODUCT</h3></td>
        <td colspan="3"><h3>REGISTER</h3></td>
        <td colspan="2"><h3>ACTION</h3></td>
    </tr>
    <tr>
        <th>DATE</th>
        <th>งาน</th>
        <th>รายการ</th>
        <th>REF</th>
        	<th>PROJECT</th>
        	<th>ลูกค้า</th>
            <th>(หน่วยงาน)</th>
        	<th>DEALER</th>
        	<th>เรา</th>
     		<th>SUPPLIER</th>
        <th>ประเภท</th>
        <th>รุ่น</th>
        <th>ยี่ห้อ</th>
        <th>จำนวน</th>
       <th>UtoD</th>
       <th>UtoW</th>
       <th>WtoS</th>
     		<th>แก้ไข</th>
            <th>ลบ</th>
     </tr>
    
  </thead>
  <tbody>
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=$idx+1;
		?>
		<tr id=<?php echo $row["REF_NO"];?>>
        <td width="2%" align="center"><nobr><?php echo $row['CREATE_DATE'];?></nobr></td>
    	<td width="2%" align="center"><nobr><?php echo sprintf("%02d",$idx); ?></a></nobr></td>
    	<td width="3%" align="center"><nobr><?php echo sprintf("%02d",$idx); ?></nobr></td>
    	<td width="3%" align="center"><nobr><a href="customer_show_user.php?REF_NO=<?=$row['REF_NO'];?>"><?php echo $row['REF_NO'];?></a></nobr></td>
    	<td width="5%" align="center"><nobr><?php echo $row['PROJECT']; ?></nobr></td>
    	<td width="5%" align="left"><nobr><?php echo $row['USER']; ?></nobr></td>
        <td width="5%" align="left"><nobr><?php echo $row['UNIT']; ?></nobr></td>
        <td width="5%" align="left"><nobr><?php echo $row['DEALER']; ?></nobr></td>
        <td width="4%" align="left"><nobr><?php echo $row['WE'] ;?></nobr></td>
        <td width="6%" align="center"><nobr><?php echo $row['SUPPLIER'] ;?></nobr></td>
        <td width="7%" align="center"><nobr><?php echo $row['BRANDNAME'];?></nobr></td>
        <td width="7%" align="center"><nobr><?php echo $row['SERIES'];?></nobr></td>
        <td width="7%" align="center"><nobr><?php echo $row['LOGO'];?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo $row["AMOUNT"]; ?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo ""; ?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo ""; ?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo ""; ?></nobr></td>
        <td width="4%" align="center"><button class="btn btn-danger btn-sm" id="dels" name="dels" onclick="dels(<?php echo $row["REF_NO"];?>)" >DEL</button></td>
        <td width="4%" align="center" ><button class="btn btn-info btn-sm" id="edits" name="edits" onclick="edits(<?php echo $row["REF_NO"];?>)" >EDIT</button></td>
        
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

function dels(REF_NO)
{
	if(confirm('คุณต้องการลบหรือไม่?') )
	{
		$.ajax({
			url : "customer_del.php",
			type:"POST",
			data : {"REF_NO":REF_NO},
			success:function(res){
					$("#delete"+REF_NO).hide()
					
				}
			})
	}
	window.location.href = "customer.php"
}
function edits(REF_NO)
{
	var url = "customer_edit.php"
	var SETDATA = {REF_NO:REF_NO}
    $.post(url,SETDATA,function(res){
			alert(REF_NO)
			$('#editCustomer').html(res)
			
		})
	
}




</script>