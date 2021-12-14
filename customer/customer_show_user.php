<?php
include "C:/xampp/htdocs/xampp/Azza/connects.php";

$conn=new Databases;
$conn = $conn->__construct();
$ID = $_GET['ID'];
$query = "SELECT * FROM users WHERE CUSTOMER_ID='$ID' ";
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
  <div class="modal" id="myModal-7">
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
                     <input type="hidden" id="CUSTOMER_ID1u" name="CUSTOMER_ID1u" value='<?php echo $ID?>'>  		
                     
      				 <select id="COMPANY2d" name="COMPANY1u">
                        <option value="">--SELECT USER--</option>
        				<?php
        				$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='USER'");  // Use select query here 
						while($data = mysqli_fetch_assoc($records))
        				{
            			echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
						}
						?> 
       					</select>
    				</div>
                       <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">หน่วย</span>
      						</div>
      				<input type="text" autocomplete="off" id="SUBDEPARTMENT1u" name="SUBDEPARTMENT1u" style="width:80px;">
    				</div>
                        <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ฝ่าย</span>
      						</div>
      				<input type="text" autocomplete="off" id="DEPARTMENT1u" name="DEPARTMENT1u" style="width:80px;">
    				</div>
                    
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ชื่อติดต่อ</span>
      						</div>
      				<input type="text" autocomplete="off" id="NAME1u" name="NAME1u"   style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">โทร</span>
      						</div>
      				<input type="text" maxlength="10" autocomplete="off" id="PHONE1u" name="PHONE1u" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อีเมลล์</span>
      						</div>
      				<input type="email" autocomplete="off" id="EMAIL1u" name="EMAIL1u" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เลขที่</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="ADDRNO1u" id="ADDRNO1u" style="width:80px;">
    				</div> 
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จังหวัด</span>
      						</div>
                    
      				<select name="Ref_prov_id1u" id="provinces1u">
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
      				<select name="Ref_dist_id1u" id="amphures1u" style="width:80px;">
       						</select>
    				</div>
                     <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ตำบล</span>
      						</div>
      				<select name="Ref_subdist_id1u" id="districts1u" style="width:80px;">
      						</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รหัส</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="zip_code1u" id="zip_code1u" style="width:80px;">
    				</div> 
                    
                           		<script>
	
	$('#provinces1u').change(function() {
    var id_province = $(this).val();
 	var name_th = $(this).val()
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_province,name_th:name_th,function:'provinces'},
      success: function(data){
          $('#amphures1u').html(data); 
          $('#districts1u').html(''); 
          $('#districts1u').val('');  
          $('#zip_code1u').val(''); 
      }
    });
  });
 
  $('#amphures1u').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts1u').html(data);  
      }
    });
  });
 
   $('#districts1u').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code1u').val(data)
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

<button style='margin-left: 15%;' type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal-7">เพิ่มUse</button>

<center>

<table border='1' style="width:80%; margin-left:1.5%" class="table table-striped table-sm">
  <thead align="center" style="font-size:14px;">
    <tr>
      <th>NO.</th>
      <th>ฝ่าย</th>
      <th>แผนก</th>
      <th>ติดต่อ</th>
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
        <td width="1%" align="center"><nobr><?php echo $idx;?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['DEPARTMENT'];?></nobr></td>
        <td width="3%" align="center"><nobr><?php echo $row['SUBDEPARTMENT'];?></nobr></td>
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
	var DEPARTMENT1 = $('#DEPARTMENT1u').val()
	var SUBDEPARTMENT1 = $('#SUBDEPARTMENT1u').val()
	var NAME1 = $('#NAME1u').val()
	var ADDRNO1 = $('#ADDRNO1u').val()
	var EMAIL1 = $('#EMAIL1u').val()
	var PHONE1 = $('#PHONE1u').val()
	var PROVINCE1 = $('#provinces1u').val()
	var DISTRICT1 = $('#amphures1u').val()
	var SUBDISTRICT1 = $('#districts1u').val()
	var ZIPCODE1 = $('#zip_code1u').val()
	var CUSTOMER_ID1 = $('#CUSTOMER_ID1u').val()
	$.ajax({
        type: "POST",
        url: "create_user.php",
        data: {"DEPARTMENT1":DEPARTMENT1,"SUBDEPARTMENT1":SUBDEPARTMENT1,"NAME1":NAME1,"EMAIL1":EMAIL1,"ADDRNO1":ADDRNO1,"PHONE1":PHONE1,"PROVINCE1":PROVINCE1,"DISTRICT1":DISTRICT1,"SUBDISTRICT1":SUBDISTRICT1,"ZIPCODE1":ZIPCODE1,"CUSTOMER_ID":CUSTOMER_ID1},
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
			url : "customer_del_user.php",
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