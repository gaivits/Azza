<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";

$conn=new Databases;
$conn = $conn->__construct();
$ID = $_GET['ID'];
$query = "SELECT * FROM products WHERE CUSTOMER_ID = '$ID' ";
$result = mysqli_query($conn, $query);
$idx=00;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />	
</head>

<body>

  <h2></h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-4">เพิ่มสินค้า</button>

  <!-- The Modal -->
  <div class="modal" id="myModal-4">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">เพิ่มรายการสินค้า</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          	<div class="container">
            	<div class="row">
                	<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เลือก</span>
      						</div>
      				<select id="CATEGORY5" name="CATEGORY5" style="width: 85px;">
    							<option value="">-เลือก-</option>
    							<?php
        						$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='CATEGORY'");  // Use select query here 
								while($data = mysqli_fetch_assoc($records))
       						 	{
            						echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
								}	
    						?>  
  						</select>
                </div>
                	<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">หมวด</span>
      						</div>
      				<select id="SERIES5" name="SERIES5" style="width: 85px;">
    							
  						</select>
                </div>
                <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ชนิด</span>
      						</div>
      				<select id="LOGO5" name="LOGO5" style="width: 85px;">
    							
  						</select>
                </div>
                <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ยี่ห้อ</span>
      						</div>
      				<select id="BRANDNAME5" name="BRANDNAME5" style="width: 85px;">
    							<option value="">-เลือก-</option>
    							<?php
        						$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='BRANDNAME'");  // Use select query here 
								while($data = mysqli_fetch_assoc($records))
       						 	{
            						echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
								}	
    						?>  
  						</select>
                </div>
                <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รุ่น</span>
      						</div>
      				<select id="GOODS5" name="GOODS5" style="width: 85px;">
    							
  						</select>
                </div>
                <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จำนวน</span>
      						</div>
      				<input type="number" step=0.01 id="AMOUNT" name="AMOUNT">
                </div>
                <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">หน่วย</span>
      						</div>
      				<input type="text" value ="ea" id="PCS" name="PCS">
                </div>
            </div>
        </div>
       </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="submits()">OK</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

<br>
<a style="margin-left:85%" class="btn btn-link" href="customer.php">กลับ</a>
<br><br>

<center>
<table border='1' style="width:80%;" class="table table-striped table-sm">
  <thead style="font-size:18px;">
   <tr>
        
    </tr>
    
    <tr align="center">
        <th>NO</th>
        <th>หมวด</th>   
		<th>ยี่ห้อ</th>
        <th>โมเดล</th>
        <th>รุ่น</th>
        <th>จำนวน</th>
      	<th>หน่วย(pcs)</th> 
     </tr>
    
  </thead>
  <tbody style="font-size:12px;">
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=$idx+1;
			$nrow=explode(" ",$row['LOGO']);
			
		?>
		<tr id=<?php echo '';?>>
        <td width="2%" align="center"><nobr><?php echo $idx;?></td>
        <td width="2%" align="center"><nobr><?php echo $row['CATEGORY']?></td>
        <td width="2%" align="center"><nobr><?php echo $row['BRANDNAME']?></td>
        <td width="2%" align="center"><nobr><?php echo $nrow[0]?></td>
        <td width="2%" align="center"><nobr><?php echo $nrow[1]?></td>
        <td width="2%" align="center"><nobr><?php echo $row['AMOUNT']?></td>
       	<td width="2%" align="center"><nobr><?php echo $row['PCS']?></td>
        
		</tr>
        <?php
		}
?>
    </tr>
   </tbody>
</table>
</center>
</body>
 
<div id="editCustomer"></div>
  

</body>
</html>
<script>
function submits()
{
	var CATEGORY5 = $('#CATEGORY5').val()
	var BRANDNAME5 = $('#BRANDNAME5').val()
	var SERIES5 = $('#SERIES5').val()
	var LOGO5 = $('#LOGO5').val()
	var GOODS5 = $('#GOODS5').val()
	var AMOUNT5 = $('#AMOUNT5').val()
	$.ajax({
        type: "POST",
        url: "create_product.php",
        data: {"CATEGORY":CATEGORY5,"BRANDNAME":BRANDNAME5,"SERIES":SERIES5,"LOGO":LOGO5,"GOODS":GOODS5,"AMOUNT":AMOUNT5},
        success: function(res) {
            $('#viewCustomer').load('customer_show_product.php')
        },
	})
}
$('#CATEGORY5').change(function() {
    var CATEGORY = $('#CATEGORY5').val()	
      $.ajax({
      type: "POST",
      url: "product0.php",
      data: {CATEGORY:CATEGORY},
      success: function(data){
          $('#SERIES5').html(data)
      }
    });
  });
$('#SERIES5').change(function() {
    var SERIES = $('#SERIES5').val()	
      $.ajax({
      type: "POST",
      url: "product1.php",
      data: {SERIES:SERIES},
      success: function(data){
          $('#LOGO5').html(data)
      }
    });
  });
   $('#LOGO5').change(function() {
    var GOODS = $('#LOGO5').val()
	var BRAND = $('#BRANDNAME5').val()
      $.ajax({
      type: "POST",
      url: "product3.php",
      data: {GOODS:GOODS,BRAND:BRAND},
      success: function(data){
          $('#GOODS5').html(data)
      }
    });
  });

</script>