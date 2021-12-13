<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	
    
   
	$conn = new Databases;
	$conn = $conn->__construct();
	mysqli_query($conn, "SET NAMES 'utf8' ");
	if(!$conn)
	{
		die('Could not Connect My Sql:' .mysql_error());
	}
	$limit = 10;  
	if (isset($_GET["page"])) 
	{
		$page  = $_GET["page"]; 
	} 
	else
	{ 
		$page=1;
	}  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM customer ORDER BY customer_id ASC LIMIT $start_from, $limit");
	
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



<!-- Modal -->

<div class="container">
	
   <br>
  
  <h2>CUSTOMER-REGISTRATION</h2>
  <!-- Trigger the modal with a button -->
  
      <input type="text" placeholder="ค้นหาจากREF" autocomplete="off" id="SEARCH_JOB" name="SEARCH_JOB">
      
      <select id="SEARCH_USER">
      <option value="">ค้นจากUSER</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='USER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
      
      <button type="button" class="btn btn-primary btn-sm" onclick="searches()">SEARCH</button>
     <br>
     <br>
  <div class="dropdown">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
      เพิ่มรายละเอียด
    </button>
    <div class="dropdown-menu">
  
  	
  	<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal">เพิ่มรายการ</button>
  	<br>
    </div>
  </div>
  

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
           <div class="modal-body">
     			<div class="container">
 					 <div class="row">
    					<div class="col-sm">
      						<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
                                
        						<span class="input-group-text">วัน</span>
                               
      						</div>
      				<input type="text" autocomplete="off" class="form-control" id="datepicker" name="datepicker" width="105">
    				</div>
   							<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เวลา</span>
      						</div>
      				<input type="text" autocomplete="off" class="form-control" id="timepicker" name="timepicker" width="105">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">หน่วย</span>
      						</div>
      				<input type="text" class="form-control" id="UNIT" name="UNIT" width="105">
    				</div>
                        <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ชื่องาน</span>
      						</div>
      				<input type="text" class="form-control" id="PROJECT" name="PROJECT" width="105">
    				</div>
    					</div>
    					<div class="col-sm-4">  
                        <h4>USER</h4>
                        <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">USER</span>
      						</div>
      				 <select id="USER" name="USER">
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
      				<input type="text" autocomplete="off" id="SUBDEPARTMENT1" name="SUBDEPARTMENT1" style="width:80px;">
    				</div>
                        <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ฝ่าย</span>
      						</div>
      				<input type="text" autocomplete="off" id="DEPARTMENT1" name="DEPARTMENT1" style="width:80px;">
    				</div>
                    
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ชื่อติดต่อ</span>
      						</div>
      				<input type="text" autocomplete="off" id="NAME1" name="NAME1"   style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">โทร</span>
      						</div>
      				<input type="text" maxlength="10" autocomplete="off" id="PHONE1" name="PHONE1" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อีเมลล์</span>
      						</div>
      				<input type="email" autocomplete="off" id="EMAIL1" name="EMAIL1" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เลขที่</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="ADDRNO1" id="ADDRNO1" style="width:80px;">
    				</div> 
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จังหวัด</span>
      						</div>
                    
      				<select name="Ref_prov_id1" id="provinces1">
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
      				<select name="Ref_dist_id1" id="amphures1" style="width:80px;">
       						</select>
    				</div>
                     <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ตำบล</span>
      						</div>
      				<select name="Ref_subdist_id1" id="districts1" style="width:80px;">
      						</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รหัส</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="zip_code1" id="zip_code1" style="width:80px;">
    				</div> 
   <script>
					$('#provinces1').change(function() {
    				var id_province = $(this).val();
 					var name_th = $(this).val()
      				$.ajax({
      				type: "POST",
      				url: "location1.php",
      				data: {id:id_province,name_th:name_th,function:'provinces'},
      				success: function(data){
          			$('#amphures1').html(data); 
          			$('#districts1').html(''); 
          			$('#districts1').val('');  
          			$('#zip_code1').val(''); 
      				}
    				});
  				});
 
  $('#amphures1').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "location1.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts1').html(data);  
      }
    });
  });
 
   $('#districts1').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "location1.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code1').val(data)
      }
    });
  
  });
	
	</script>
                          </div>
                         
    					
                        <div class="col-sm-4">
                            <h4>DEALER</h4>
                            	<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">DEALER</span>
      						</div>
      				 <select id="COMPANY2" name="COMPANY2">
                        <option value="">--SELECT DEALER--</option>
        				<?php
        				$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='DEALER'");  // Use select query here 
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
      				<input type="text" autocomplete="off" id="SUBDEPARTMENT2" name="SUBDEPARTMENT2" style="width:80px;">
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
      				<input type="text" autocomplete="off" id="NAME2" name="NAME2"   style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">โทร</span>
      						</div>
      				<input type="text" maxlength="10" autocomplete="off" id="PHONE2" name="PHONE2" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อีเมลล์</span>
      						</div>
      				<input type="email" autocomplete="off" id="EMAIL2" name="EMAIL2" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เลขที่</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="ADDRNO2" id="ADDRNO2" style="width:80px;">
    				</div> 
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จังหวัด</span>
      						</div>
                    
      				<select name="Ref_prov_id2" id="provinces2">
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
      				<select name="Ref_dist_id2" id="amphures2" style="width:80px;">
       						</select>
    				</div>
                     <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ตำบล</span>
      						</div>
      				<select name="Ref_subdist_id2" id="districts2" style="width:80px;">
      						</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รหัส</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="zip_code2" id="zip_code2" style="width:80px;">
    				</div> 
                    
                           		<script>
	
	$('#provinces2').change(function() {
    var id_province = $(this).val();
 	var name_th = $(this).val()
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_province,name_th:name_th,function:'provinces'},
      success: function(data){
          $('#amphures2').html(data); 
          $('#districts2').html(''); 
          $('#districts2').val('');  
          $('#zip_code2').val(''); 
      }
    });
  });
 
  $('#amphures2').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts2').html(data);  
      }
    });
  });
 
   $('#districts2').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "location2.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code2').val(data)
      }
    });
  
  });
	
	</script>
                            </div> 
                            
                           
                        <div class="col-sm-4">
                            <h4>WE</h4>
                            <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">WE</span>
      						</div>
      				 <select id="COMPANY3" name="COMPANY3">
                        <option value="AZZA">AZZA</option>
        				
       					</select>
    				</div>
                       <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ฝ่าย</span>
      						</div>
      				<input type="text" autocomplete="off" id="SUBDEPARTMENT3" name="SUBDEPARTMENT3" value="จัดซื้อ" style="width:80px;">
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
      				<input type="text" autocomplete="off" id="NAME3" name="NAME3" value="ธัญพัฒน์" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">โทร</span>
      						</div>
      				<input type="text" maxlength="10" autocomplete="off" id="PHONE3" name="PHONE3" value="0991515951" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อีเมลล์</span>
      						</div>
      				<input type="email" autocomplete="off" id="EMAIL3" name="EMAIL3" value="newzeno@yahoo.com" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เลขที่</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="ADDRNO3" id="ADDRNO3" value="81" style="width:80px;">
    				</div> 
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จังหวัด</span>
      						</div>
                    
      				<select name="Ref_prov_id3" id="provinces3">
							<option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
        						
        					</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อำเภอ</span>
      						</div>
      				<select name="Ref_dist_id3" id="amphures3" style="width:80px;">
                    			<option value="ตลิ่งชัน">ตลิ่งชัน</option>
       						</select>
    				</div>
                     <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ตำบล</span>
      						</div>
      				<select name="Ref_subdist_id3" id="districts3" style="width:80px;">
                    	<option value="ฉิมพลี">ฉิมพลี</option>
      						</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รหัส</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="zip_code3" id="zip_code3" value="10170" style="width:80px;">
    				</div> 
                   <script>
	
	/*$('#provinces3').change(function() {
    var id_province = $(this).val();
 	var name_th = $(this).val()
      $.ajax({
      type: "POST",
      url: "location3.php",
      data: {id:id_province,name_th:name_th,function:'provinces'},
      success: function(data){
          $('#amphures3').html(data); 
          $('#districts3').html(''); 
          $('#districts3').val('');  
          $('#zip_code3').val(''); 
      }
    });
  });
 
  $('#amphures3').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "location3.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts3').html(data);  
      }
    });
  });
 
   $('#districts3').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "location3.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code3').val(data)
      }
    });
  
  });*/
	
	</script>
	
                            </div>
                        <div class="col-md-4">
                            <h4>SUPPLIER</h4>
                            <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">SUP</span>
      						</div>
      				 <select id="COMPANY4" name="COMPANY4">
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
      				<input type="text" autocomplete="off" id="SUBDEPARTMENT4" name="SUBDEPARTMENT4" style="width:80px;">
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
      				<input type="text" autocomplete="off" id="NAME4" name="NAME4"   style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">โทร</span>
      						</div>
      				<input type="text" maxlength="10" autocomplete="off" id="PHONE4" name="PHONE4" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">อีเมลล์</span>
      						</div>
      				<input type="email" autocomplete="off" id="EMAIL4" name="EMAIL4" style="width:80px;">
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">เลขที่</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="ADDRNO4" id="ADDRNO4" style="width:80px;">
    				</div> 
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จังหวัด</span>
      						</div>
                    
      				<select name="Ref_prov_id4" id="provinces4">
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
      				<select name="Ref_dist_id4" id="amphures4" style="width:80px;">
       						</select>
    				</div>
                     <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ตำบล</span>
      						</div>
      				<select name="Ref_subdist_id4" id="districts4" style="width:80px;">
      						</select>
    				</div>
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รหัส</span>
      						</div>
      				 
        					<input type="text" autocomplete="off" name="zip_code4" id="zip_code4" style="width:80px;">
    				</div> 
              				<script>
	
	$('#provinces4').change(function() {
    var id_province = $(this).val();
 	var name_th = $(this).val()
      $.ajax({
      type: "POST",
      url: "location4.php",
      data: {id:id_province,name_th:name_th,function:'provinces'},
      success: function(data){
          $('#amphures4').html(data); 
          $('#districts4').html(''); 
          $('#districts4').val('');  
          $('#zip_code4').val(''); 
      }
    });
  });
 
  $('#amphures4').change(function() {
    var id_amphures = $(this).val();
 	var name_th = $(this).val();
	
      $.ajax({
      type: "POST",
      url: "location4.php",
      data: {id:id_amphures,name_th:name_th,function:'amphures'},
      success: function(data){
          $('#districts4').html(data);  
      }
    });
  });
 
   $('#districts4').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "location4.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code4').val(data)
      }
    });
  
  });
	
	</script>
                            </div> 
                        <!--<div class="col-sm-3">
                        			<h4>สินค้า</h4>
      								<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text"></span>
      						</div>
      				<select id="CATEGORY" name="CATEGORY" style="width: 90px;">
    							<option value="">-เลือก-</option>
    							<?php
        						$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='CATEGORY'");  // Use select query here 
								while($data = mysqli_fetch_assoc($records))
       						 	{
            						echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
								}	
    						?>  
  						</select>
                        <div class="input-group mb-3 input-group-sm" >
      							<div class="input-group-prepend">
        						<span class="input-group-text">หมวด</span>
      						</div>
      				<select id="SERIES" name="SERIES" style="width: 100px;">
    							
  						</select>
                      <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ชนิด</span>
      						</div>
      				<select id="LOGO" name="LOGO" style="width: 85px;">
    							
  						</select>
    				
    				
                        <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">ยี่ห้อ</span>
      						</div>
      				<select id="BRANDNAME" name="BRANDNAME" style="width: 85px;">
    							<option value="">-ยี่ห้อ-</option>
    							<?php
        						$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='BRANDNAME'");  // Use select query here 
								while($data = mysqli_fetch_assoc($records))
       						 	{
            						echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
								}	
    						?>  
  						</select>
                        
                    
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">รุ่น</span>
      						</div>
      				<select id="GOODS" name="GOODS" style="width: 85px;">
    							
  						</select>
    			
                    <div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">จำนวน</span>
      						</div>
      					<input type="number" step=0.01 id="AMOUNT" name="AMOUNT" style="width: 85px;">
    				<div class="input-group mb-3 input-group-sm">
      							<div class="input-group-prepend">
        						<span class="input-group-text">หน่วย</span>
      						</div>
      					<input type="number" step=0.01 id="AMOUNT" name="AMOUNT" style="width: 85px;">
    		-->
                    <div class="modal-footer">
          					<button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="creates()">OK</button>
          					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			</div>
    				</div>
 				</div>
  			</div>
           </div>
		</div>
   	</div>
   </div>
  </div>
  </div>
 </div>
</div>
   
    <div class="modal fade" id="myModal-add-user" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        	<form>
            	<input type="text" id="ADD_USER" name="ADD_USER" placeholder="เพิ่มuser">
                </form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_user()">สร้าง</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  </div>
</div>

<div class="modal fade" id="myModal-add-dealer" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        	<form>
            	<input type="text" id="ADD_DEALER" name="ADD_DEALER" placeholder="เพิ่มdealer">
                
        	</form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_dealer()">สร้าง</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  </div>
</div>
	
    <div class="modal fade" id="myModal-add-we" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        	<form>
            	<input type="text" id="ADD_WE" name="ADD_WE" placeholder="เพิ่มwe">
                
        	</form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_we()">สร้าง</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  </div>
</div>
	
    <div class="modal fade" id="myModal-add-supplier" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        	<form>
            	<input type="text" id="ADD_SUPPLIER" name="ADD_SUPPLIER" placeholder="เพิ่มsupplier">
                
        	</form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_supplier()">สร้าง</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  </div>
</div>
	
	<div id="viewCustomer"></div>
    <div id="popCustomer"></div>

    <?php
	$result_db = mysqli_query($conn,"SELECT COUNT(customer_id) FROM customer"); 
	$row_db = mysqli_fetch_row($result_db);  
	$total_records = $row_db[0];  
	$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
	$pagLink = "<ul class='pagination'>";  
	for ($i=1; $i<=$total_pages; $i++) 
	{
              $pagLink .= "<li style='margin-left:85%;' class='page-item'><a class='page-link' href='customer.php?page=".$i."'>".$i."</a></li>";	
	}
	echo $pagLink . "</ul>";  
?>
	    


</body>

</html>

<script>
$('#datepicker').datepicker({
    format: 'yy/mm/dd',
    
});
 $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
</script>

<script>
$('#CATEGORY').change(function() {
    var CATEGORY = $('#CATEGORY').val()	
      $.ajax({
      type: "POST",
      url: "product0.php",
      data: {CATEGORY:CATEGORY},
      success: function(data){
          $('#SERIES').html(data)
      }
    });
  });
$('#SERIES').change(function() {
    var SERIES = $('#SERIES').val()	
      $.ajax({
      type: "POST",
      url: "product1.php",
      data: {SERIES:SERIES},
      success: function(data){
          $('#LOGO').html(data)
      }
    });
  });
   $('#LOGO').change(function() {
    var GOODS = $('#LOGO').val()
	var BRAND = $('#BRANDNAME').val()
      $.ajax({
      type: "POST",
      url: "product3.php",
      data: {GOODS:GOODS,BRAND:BRAND},
      success: function(data){
          $('#GOODS').html(data)
      }
    });
  });

function creates()
{
	
	var CATEGORY = $('#CATEGORY').val()
	var BRANDNAME = $('#BRANDNAME').val()
	var SERIES = $('#SERIES').val()
	var LOGO = $('#LOGO').val()
	var GOODS = $('#GOODS').val()
	var AMOUNT = $('#AMOUNT').val()
	$.ajax({
        type: "POST",
        url: "create_product.php",
        data: {"CATEGORY":CATEGORY,"BRANDNAME":BRANDNAME,"SERIES":SERIES,"LOGO":LOGO,"GOODS":GOODS,"AMOUNT":AMOUNT},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
	})
	
	var DATE = $('#datepicker').val()
	var TIME = $('#timepicker').val()
	var USER = $('#USER').val()
	var UNIT = $('#UNIT').val()
	var PROJECT = $('#PROJECT').val()
	var COMPANY2 = $('#COMPANY2').val()
	var COMPANY3 = $('#COMPANY3').val()
	var COMPANY4 = $('#COMPANY4').val()
	
	$.ajax({
        type: "POST",
        url: "customer_create.php",
        data: {"DATE":DATE,"TIME":TIME,"USER":USER,"UNIT":UNIT,"PROJECT":PROJECT,"COMPANY2":COMPANY2,"COMPANY3":COMPANY3,"COMPANY4":COMPANY4},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
	})
	var DEPARTMENT1 = $('#DEPARTMENT1').val()
	var SUBDEPARTMENT1 = $('#SUBDEPARTMENT1').val()
	var NAME1 = $('#NAME1').val()
	var ADDRNO1 = $('#ADDRNO1').val()
	var EMAIL1 = $('#EMAIL1').val()
	var PHONE1 = $('#PHONE1').val()
	var PROVINCE1 = $('#provinces1').val()
	var DISTRICT1 = $('#amphures1').val()
	var SUBDISTRICT1 = $('#districts1').val()
	var ZIPCODE1 = $('#zip_code1').val()
	$.ajax({
        type: "POST",
        url: "create_user.php",
        data: {"DEPARTMENT1":DEPARTMENT1,"SUBDEPARTMENT1":SUBDEPARTMENT1,"NAME1":NAME1,"EMAIL1":EMAIL1,"ADDRNO1":ADDRNO1,"PHONE1":PHONE1,"PROVINCE1":PROVINCE1,"DISTRICT1":DISTRICT1,"SUBDISTRICT1":SUBDISTRICT1,"ZIPCODE1":ZIPCODE1},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
	})
	
	var COMPANY2 = $('#COMPANY2').val()
	var SUBDEPARTMENT2 = $('#SUBDEPARTMENT2').val()
	var NAME2 = $('#NAME2').val()
	var EMAIL2 = $('#EMAIL2').val()
	var PHONE2 = $('#PHONE2').val()
	var ADDRNO2 = $('#ADDRNO2').val()
	var PROVINCE2 = $('#provinces2').val()
	var DISTRICT2 = $('#amphures2').val()
	var SUBDISTRICT2 = $('#districts2').val()
	var ZIPCODE2 = $('#zip_code2').val()
	$.ajax({
        type: "POST",
        url: "create_dealer.php",
        data: {"COMPANY2":COMPANY2,"SUBDEPARTMENT2":SUBDEPARTMENT2,"NAME2":NAME2,"EMAIL2":EMAIL2,"PHONE2":PHONE2,"PROVINCE2":PROVINCE2,"DISTRICT2":DISTRICT2,"SUBDISTRICT2":SUBDISTRICT2,"ZIPCODE2":ZIPCODE2},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
	})
	
	var COMPANY3 = $('#COMPANY3').val()
	var SUBDEPARTMENT3 = $('#SUBDEPARTMENT3').val()
	var NAME3 = $('#NAME3').val()
	var EMAIL3 = $('#EMAIL3').val()
	var PHONE3 = $('#PHONE3').val()
	var ADDRNO3 = $('#ADDRNO3').val()
	var PROVINCE3 = $('#provinces3').val()
	var DISTRICT3 = $('#amphures3').val()
	var SUBDISTRICT3 = $('#districts3').val()
	var ZIPCODE3 = $('#zip_code3').val()
	$.ajax({
        type: "POST",
        url: "create_we.php",
        data: {"COMPANY3":COMPANY3,"SUBDEPARTMENT3":SUBDEPARTMENT3,"NAME3":NAME3,"EMAIL3":EMAIL3,"PHONE3":PHONE3,"PROVINCE3":PROVINCE3,"DISTRICT3":DISTRICT3,"SUBDISTRICT3":SUBDISTRICT3,"ZIPCODE3":ZIPCODE3},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
	})
	
	var COMPANY4 = $('#COMPANY4').val()
	var SUBDEPARTMENT4 = $('#SUBDEPARTMENT4').val()
	var NAME4 = $('#NAME4').val()
	var EMAIL4 = $('#EMAIL4').val()
	var PHONE4 = $('#PHONE4').val()
	var ADDRNO4 = $('#ADDRNO4').val()
	var PROVINCE4 = $('#provinces4').val()
	var DISTRICT4 = $('#amphures4').val()
	var SUBDISTRICT4 = $('#districts4').val()
	var ZIPCODE4 = $('#zip_code4').val()
	$.ajax({
        type: "POST",
        url: "create_supplier.php",
        data: {"COMPANY4":COMPANY4,"SUBDEPARTMENT4":SUBDEPARTMENT4,"NAME4":NAME4,"EMAIL4":EMAIL4,"ADDRNO4":ADDRNO4,"PHONE4":PHONE4,"PROVINCE4":PROVINCE4,"DISTRICT4":DISTRICT4,"SUBDISTRICT4":SUBDISTRICT4,"ZIPCODE4":ZIPCODE4},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
	})
}
$('#viewCustomer').load('customer_show.php')

function searches(){
	
	var SEARCH_JOB = $('#SEARCH_JOB').val()
	var SEARCH_USER = $('#SEARCH_USER').val()
	var SEARCH_DEALER = $('#SEARCH_DEALER').val()
	$.ajax({
        type: "POST",
        url: "customer_look_up.php",
        data: {"SEARCH_JOB":SEARCH_JOB,SEARCH_USER:SEARCH_USER,SEARCH_DEALER:SEARCH_DEALER},
        success: function(res) {
           $('#popCustomer').html(res)
		   $('#viewCustomer').load('customer_show.php').hide()
        }
	})
	
}
function add_user(){
	
	var USER = $('#ADD_USER').val()
	if(USER==="")
	{
		alert("กรอก USER")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_user.php",
        data: {"ADD_USER":USER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("เพิ่ม dealer 1 รายการ")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')
function add_dealer(){
	
	var DEALER = $('#ADD_DEALER').val()
	if(DEALER==="")
	{
		alert("กรอก DEALER")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_dealer.php",
        data: {"ADD_DEALER":DEALER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("เพิ่ม dealer 1 รายการ")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')
function add_we(){
	
	var WE = $('#ADD_WE').val()
	if(WE==="")
	{
		alert("กรอก WE")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_dealer.php",
        data: {"ADD_WE":WE},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("เพิ่ม user 1 รายการ")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')
function add_supplier(){
	
	var SUPPLIER = $('#ADD_SUPPLIER').val()
	if(SUPPLIER==="")
	{
		alert("กรอก SUPPLIER")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_supplier.php",
        data: {"ADD_SUPPLIER":SUPPLIER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("เพิ่ม supplier 1 รายการ")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')

</script>