<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";

$conn=new Databases;
$conn = $conn->__construct();
$ID = $_GET['ID'];
$query = "SELECT * FROM suppliers WHERE CUSTOMER_ID='$ID' ";
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
 

  <!-- The Modal -->
  <div class="modal" id="myModal-6">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">เพิ่ม</h4>
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
                            <?php echo $ID?>
                     <input type="hidden" id="CUSTOMER_ID4s" name="CUSTOMER_ID4s" value='<?php echo $ID?>'>  		
                     
      				 <select id="COMPANY4s" name="COMPANY4s">
                        <option value="">--SELECT SUPPLIER--</option>
        				<?php
        				$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SUPPLIER'");  // Use select query here 
						while($data = mysqli_fetch_assoc($records))
        				{
            			echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
						}
						?> 
       					</select>
    				</div>
                       <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ฝ่าย</span>
      						</div>
      				<input type="text" autocomplete="off" id="SUBDEPARTMENT4s" name="SUBDEPARTMENT4s" style="width:80px;">
    				</div>
                        <!--<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ฝ่าย</span>
      						</div>
      				<input type="text" autocomplete="off" id="DEPARTMENT1" name="DEPARTMENT1" style="width:80px;">
    				</div>-->
                    
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ชื่อติดต่อ</span>
      						</div>
      				<input type="text" autocomplete="off" id="NAME4s" name="NAME4s"   style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">โทร</span>
      						</div>
      				<input type="text" maxlength="10" autocomplete="off" id="PHONE4s" name="PHONE4s" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อีเมลล์</span>
      						</div>
      				<input type="email" autocomplete="off" id="EMAIL4s" name="EMAIL4s" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เลขที่</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="ADDRNO4s" id="ADDRNO4s" style="width:80px;">
    				</div> 
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จังหวัด</span>
      						</div>
                    
      				<select name="Ref_prov_id4s" id="provinces4s">
							<option value="">-จังหวัด-</option>
        						<?php
        							$records = mysqli_query($conn, "Select * from provinces");  // Use select query here 
									while($data = mysqli_fetch_assoc($records))
       							{
        			    		echo "<option value='". $data['id'],$data['name_th'] ."'>" .$data['name_th'] ."</option>";  // displaying data in option menu
								}
								
    							?>  
        					</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อำเภอ</span>
      						</div>
      				<select name="Ref_dist_id3w" id="amphures4s" style="width:80px;">
       						</select>
    				</div>
                     <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ตำบล</span>
      						</div>
      				<select name="Ref_subdist_id3w" id="districts4s" style="width:80px;">
      						</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รหัส</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="zip_code4s" id="zip_code4s" style="width:80px;">
    				</div> 
                    
                           		<script>
	
	$('#provinces4s').change(function() {
    var id_province = $(this).val();
 	var name_th = $(this).val()
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_province,name_th:name_th,function:'provinces'},
      success: function(data){
          $('#amphures4s').html(data); 
          $('#districts4s').html(''); 
          $('#districts4s').val('');  
          $('#zip_code4s').val(''); 
      }
    });
  });
 
  $('#amphures4s').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts4s').html(data);  
      }
    });
  });
 
   $('#districts4s').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code4s').val(data)
      }
    });
  
  });
	
	</script>
                            </div>
            </div>
        </div>
        	 <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="submits()">OK</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	</div>
       </div>
        <!-- Modal footer -->
        
       
        
      </div>
    </div>
  </div>
  

<br>
<a style="margin-left:85%" class="btn btn-link" href="customer.php">กลับ</a>
<br><br>
 <button style='margin-left: 15%;' type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-6">เพิ่มSUP</button>
<center>
<table border='1' style="width:85%; margin-left:1.5%" class="table table-striped table-sm">
  <thead align="center" style="font-size:14px;">
    <tr>
      <th>NO.</th>
      <th>ติดต่อ</th>
      <th>ผู้รับ</th>
      <th>โทร.</th>
      <th>E-MAIL</th>
      <th>เลขที่</th>
      <th>จังหวัด</th>
      <th>เขต/อำเภอ</th>
      <th>แขวง/ตำบล</th>
      <th>ไปรษณีย์</th>
      <th>ลบ</th>
    
    </tr>
  </thead>
  <tbody>
    
      <?php
		
		while($row = mysqli_fetch_array($result)) 
		{$idx=$idx+1;
		?>
        <td width="1%" align="center"><nobr><?php echo $idx?></nobr></td>
        
        <td width="3%" align="center"><nobr><?php echo $row['COMPANY'];?></nobr></td>
		<td width="3%" align="center"><nobr><?php echo $row['NAME'];?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['PHONE'];?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['EMAIL'];?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['ADDRNO'];?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo preg_replace('/[0-9]+/', '', $row['PROVINCE']) ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo preg_replace('/[0-9]+/', '', $row['DISTRICT']) ;?></nobr></td>
        <td width="5%" align="center"><nobr><?php echo preg_replace('/[0-9]+/', '', $row['SUBDISTRICT']) ;?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['ZIPCODE'];?></nobr></td>
        <td width="1%" align="center"><button class="btn btn-danger dels" id="dels" name="dels" onclick="dels(<?php echo $row["ID"];?>)" ></button></td>
		</tr>
        <?php
		}
?>
    </tr>
   </tbody>
</table>
</center>
</body>

  

</body>
</html>
<script>
function submits()
{
	var COMPANY4s = $('#COMPANY4s').val()
	var SUBDEPARTMENT4s = $('#SUBDEPARTMENT4s').val()
	var NAME4s = $('#NAME4s').val()
	var EMAIL4s = $('#EMAIL4s').val()
	var PHONE4s = $('#PHONE4s').val()
	var ADDRNO4s = $('#ADDRNO4s').val()
	var PROVINCE4s = $('#provinces4s').val()
	var DISTRICT4s = $('#amphures4s').val()
	var SUBDISTRICT4s = $('#districts4s').val()
	var ZIPCODE4s = $('#zip_code4s').val()
	var CUSTOMER_ID4s = $('#CUSTOMER_ID4s').val()
	$.ajax({
        type: "POST",
        url: "create_supplier.php",
        data: {"COMPANY4":COMPANY4s,"SUBDEPARTMENT4":SUBDEPARTMENT4s,"NAME4":NAME4s,"EMAIL4":EMAIL4s,"PHONE4":PHONE4s,"PROVINCE4":PROVINCE4s,"DISTRICT4":DISTRICT4s,"SUBDISTRICT4":SUBDISTRICT4s,"ZIPCODE4":ZIPCODE4s,"CUSTOMER_ID":CUSTOMER_ID4s},
        success: function(res) {
            window.location.reload()
        },
	})
}
function dels(ID)
{
	if(confirm('คุณต้องการลบหรือไม่?') )
	{
		$.ajax({
			url : "customer_del_supplier.php",
			type:"POST",
			data : {"REF_NO":ID},
			success:function(res){
					$("#delete"+ID).hide()
					
				}
			})
	}
	window.location.reload()
}

</script>