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
	
	<div class="modal fade" id="myModal2" role="dialog">
    
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
 	
        <form id="CUSTOMER" name="CUSTOMER" method="POST">
    	<input type="text" id="datepicker" width="180" name="DATE" placeholder="YYYY/MM/DD">
        <br>
        <input id="timepicker" width="180">
        <br>
        <input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="AMOUNT" >
        <br>
        <input type="text" autocomplete="off" id="JOB" name="JOB" placeholder="JOB" maxlength="255" >
        <br>
        <input type="text" autocomplete="off" id="EQUIPMENT" name="EQUIPMENT" placeholder="EQUIPMENT" maxlength="255">
        <br>
        
    	<select id="USER" name="USER">
        <br>
    	<option value="">--SELECT USER--</option>
        
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='USER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
			
		}	
    	?>  
  		</select>
        <br>
        <input type="text" id="WE" name="WE" placeholder="WE" maxlength="255" value="Azza">
        <br>
        <select id="DEALER" name="DEALER">
    	<option value="">--SELECT DEALER--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='DEALER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
       
        <select id="SUPPLIER" name="SUPPLIER" >
    	<option value="">--SELECT SUPPLIER--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SUPPLIER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
			
		}	
    	?>
  		</select>
               
    	</form>
  		</div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="creates()">OK</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

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
      <th colspan="2">ACTION</th>
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
        <td width="4%"><button class="btn btn-danger btn-sm" id="dels" name="dels" onclick="dels(<?php echo $row["CUSTOMER_ID"] ;?>)" >DEL</button></td>
        <td width="4%"><button type="button" onclick="edits(<?php echo $row["CUSTOMER_ID"] ;?>)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">EDIT</button></td>
        
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
function dels(ID)
{
	if(confirm('คุณต้องการลบหรือไม่?') )
	{
		$.ajax({
			url : "customer_del.php",
			type:"POST",
			data : {"ID":ID},
			success:function(res){
					$("#delete"+id).hide()
					
				}
			})
	}
	window.location.href = "customer.php"
}
function edits(ID)
{
	$('#myModal2').modal('show')
}
</script>