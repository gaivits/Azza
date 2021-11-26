
<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn = new Databases;
	$conn = $conn->__construct();
	mysqli_query($conn, "SET NAMES 'utf8' ");
//query
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
$result = mysqli_query($conn,"SELECT * FROM customer");
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
  
      <input type="text" placeholder="ค้นหาid,รายการ,ref" autocomplete="off" id="SEARCH_JOB" name="SEARCH_JOB">
      <select id="SEARCH_USER">
      <option value="">--SEARCH USER--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='USER'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
      <select id="SEARCH_DEALER">
      <option value="">--SEARCH DEALER--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='DEALER'");  // Use select query here 
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
  
  	<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal-add-user" >ADD-NEW-USER</button>
  	&nbsp <br> 
  	<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal-add-dealer">ADD-NEW-DEALER</button>
  	&nbsp <br> 
  	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal-add-we" >ADD-NEW-WE</button>
  	&nbsp <br> 
  	<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal-add-supplier" >ADD-NEW-SUPPLIER</button>
  	&nbsp <br> 
  	<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal">เพิ่มสินค้า</button>
  	<br>
    </div>
  </div>
  

  <!-- Modal -->
  
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form id="CUSTOMER" name="CUSTOMER" method="POST">
    	<p style="font-weight:bold">-----รายละเอียดงาน-----</p>
		<input type="text" autocomplete="off" id="datepicker" name="datepicker"  placeholder="SELECT DATE">
   		<input type="text" autocomplete="off" id="timepicker" name="timepicker"  placeholder="SELECT TIME">
        
        <input type="text" autocomplete="off" id="PROJECT" name="PROJECT" placeholder="งาน" maxlength="255" >
        
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
        <input type="text" autocomplete="off" name="UNIT" id="UNIT" placeholder="หน่วยย่อย">
        <p style="font-weight:bold;">-----รายละเอียดงาน-----</p>
        
        <p style="font-weight:bold;">-----ที่อยู่-----</p>
		<select name="Ref_prov_id" id="provinces">
		<option value="">-กรุณาเลือกจังหวัด-</option>
        <?php
        $records = mysqli_query($conn, "SELECT * FROM provinces");  // Use select query here 
		
		while($value = mysqli_fetch_assoc($records))
        {
		  echo "<option value='". $value['id'],$value['name_th'] ."'>" .$value['name_th'] ."</option>";
		}
		?>
        </select>
        
        <select name="Ref_dist_id" id="amphures" >
        
        </select>
        
        <select name="Ref_subdist_id" id="districts">
      	</select>
        
         <input type="text" autocomplete="off" name="zip_code" id="zip_code" placeholder="รหัสไปรษณีย์">
         <p style="font-weight:bold;">-----ที่อยู่-----</p>
         
         <p style="font-weight:bold;">-----ติดต่อ-----</p>
         <input type="text" autocomplete="off" id="CONTACT" name="CONTACT" placeholder="ติดต่อ" maxlength="255">
         
         <input type="text" autocomplete="off" id="DEPARTMENT" name="DEPARTMENT" placeholder="แผนก/หน่วยงาน" maxlength="255">
         
         <input type="text" autocomplete="off" id="NOTENAME" name="NOTENAME" placeholder="ชื่อ" maxlength="255">
         
         <input type="text" autocomplete="off" id="PHONE" name="PHONE" placeholder="โทร" maxlength="255">
         
         <input type="email" autocomplete="off" id="EMAIL" name="EMAIL" placeholder="อีเมลล์" maxlength="255">
         
        <input type="text" id="WE" name="WE" placeholder="WE" maxlength="255" value="Azza">
        <p style="font-weight:bold;">-----ติดต่อ-----</p>
     
        <p style="font-weight:bold;">-----สินค้า-----</p>
        
        <select id="SERIES" name="SERIES" >
    	<option value="">--เลือก Type--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SERIES'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
        <select id="BRANDNAME" name="BRANDNAME" >
    	<option value="">--เลือก BRAND--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='BRANDNAME'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
			
		}	
    	?>  
  		</select>
       	<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="จำนวน" >
        <select id="LOGO" name="LOGO">
		</select>
        
        <select id="GOODS" name="GOODS">
		</select>
        <p style="font-weight:bold;">-----สินค้า-----</p>
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
		$result_db = mysqli_query($conn,"SELECT COUNT(CUSTOMER_ID) FROM customer"); 
		$row_db = mysqli_fetch_row($result_db);  
		$total_records = $row_db[0];  
		$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
		$pagLink = "<ul class='pagination'>";  
		for ($i=1; $i<=$total_pages; $i++) 
		{
              $pagLink .= "<li style='margin-left:95%;' class='page-item'><a class='page-link' href='customer.php?page=".$i."'>".$i."</a></li>";	
		}
		echo $pagLink . "</ul>";  
?>
    
</body>
<script>
	$('#datepicker').datepicker({
    format: 'yy/mm/dd',
    
});
 $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
</script>
</html>
<?php include("script.php") ;?>

<script>
$('#SERIES').change(function() {
    var SERIES = $('#SERIES').val();
 	var BRANDNAME = $('#BRANDNAME').val()
      $.ajax({
      type: "POST",
      url: "ajax_db2.php",
      data: {SERIES:SERIES,BRANDNAME:BRANDNAME},
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
      url: "ajax_db3.php",
      data: {GOODS:GOODS,BRAND:BRAND},
      success: function(data){
          $('#GOODS').html(data)
      }
    });
  });
function creates(){
	var DATE = $('#datepicker').val()
	var TIME = $('#timepicker').val()
	var AMOUNT = $('#AMOUNT').val()
	var PROJECT = $('#PROJECT').val()
	var EQUIPMENT = $('#EQUIPMENT').val()
	var USER = $('#USER').val()
	var UNIT = $('#UNIT').val()
	var BRANDNAME = $('#BRANDNAME').val()
	var SERIES = $('#SERIES').val()
	var LOGO = $('#LOGO').val()
	var GOODS = $('#GOODS').val()
	var PROVINCE = $('#provinces').val()
	var DISTRICT = $('#amphures').val()
	var SUBDISTRICT = $('#districts').val()
	var ZIPCODE=$('#zip_code').val()
	var CONTACT = $('#CONTACT').val()
	var DEPARTMENT = $('#DEPARTMENT').val()
	var NAME = $('#NOTENAME').val()
	var PHONE = $('#PHONE').val()
	var EMAIL = $('#EMAIL').val()
	var DEALER = $('#DEALER').val()
	var WE = $('#WE').val()
	var SUPPLIER = $('#SUPPLIER').val()
	
	if(DATE==='')
	{
		alert('Enter Date')
		return false;
	}
	if(TIME==='')
	{
		alert('Enter TIME')
		return false;
	}
	if(AMOUNT==='')
	{
		alert('Enter AMOUNT')
		return false;
	}
	if(PROJECT==='')
	{
		alert('Enter PROJECT')
		return false;
	}
	if(EQUIPMENT==='')
	{
		alert('Enter EQUIPMENT')
		return false;
	}
	if(PROVINCE==='')
	{
		alert('Enter จังหวัด')
		return false;
	}
	if(DISTRICT==='')
	{
		alert('Enter เขต')
		return false;
	}
	if(SUBDISTRICT==='')
	{
		alert('Enter แขวง')
		return false;
	}
	if(BRANDNAME==='')
	{
		alert('Enter แบรนด์')
		return false;
	}
	if(SERIES==='')
	{
		alert('Enter ยี่ห้อ')
		return false;
	}
	if(LOGO==='')
	{
		alert('Enter รุ่น')
		return false;
	}
	$.ajax({
        type: "POST",
        url: "customer_create.php",
        data: {"DATE":DATE,"TIME":TIME,"AMOUNT":AMOUNT,"PROJECT":PROJECT,"USER":USER,UNIT:UNIT,"BRANDNAME":BRANDNAME,"SERIES":SERIES,"LOGO":LOGO,"GOODS":GOODS,"PROVINCE":PROVINCE,"DISTRICT":DISTRICT,"SUBDISTRICT":SUBDISTRICT,
		"ZIPCODE":ZIPCODE,"CONTACT":CONTACT,"DEPARTMENT":DEPARTMENT,"NOTENAME":NAME,"PHONE":PHONE,"EMAIL":EMAIL,"DEALER":DEALER,"WE":WE,"SUPPLIER":SUPPLIER},
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
