
<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn = new Databases;
	$conn = $conn->__construct();
	mysqli_query($conn, "SET NAMES 'utf8' ");
	// define how many results you want per page
	$results_per_page = 10;

// find out the number of results stored in database
	$sql='SELECT * FROM customer';
	$result = mysqli_query($conn, $sql);
	$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
	$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
	if (!isset($_GET['page'])) 
	{
  	$page = 1;
	} 
	else
	{
  	$page = $_GET['page'];
	}

// determine the sql LIMIT starting number for the results on the displaying page
	$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page	
	$sql="SELECT * FROM customer LIMIT" . $this_page_first_result . ',' .  $results_per_page;
	$result = mysqli_query($conn, $sql);
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
    	<div class="modal-content">
           <div class="modal-body">
     		<div class="container">
  		<div class="row">
        	
    				<div class="col-md-6">
                    	วันที่:<input type="text" autocomplete="off" id="datepicker" name="datepicker">
   						เวลา:<input type="text" autocomplete="off" id="timepicker" name="timepicker">
                        <input type="text" autocomplete="off" id="UNIT" name="UNIT"  placeholder="หน่วยย่อย">
                        <input type="text" autocomplete="off" id="PROJECT" name="PROJECT"  placeholder="ชื่องาน">
                        <h4>USER</h4>
                        <input type="text" autocomplete="off" id="CONSIGNEE" name="CONSIGNEE"  placeholder="ผู้รับ">
                        <input type="email" autocomplete="off" id="EMAIL" name="EMAIL"  placeholder="อีเมลล์">
                        <input type="text" maxlength="10" autocomplete="off" id="PHONE" name="PHONE"  placeholder="โทร">
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
                        
                        	<select name="Ref_prov_id0" id="provinces0">
							<option value="">-กรุณาเลือกจังหวัด-</option>
        						<?php
        							$records = mysqli_query($conn, "Select * from provinces");  // Use select query here 
									while($data = mysqli_fetch_assoc($records))
       							{
        			    		echo "<option value='". $data['id'],$data['name_th'] ."'>" .$data['name_th'] ."</option>";  // displaying data in option menu
								}
								
    							?>  
        					</select>
        					<select name="Ref_dist_id0" id="amphures0" >
       						</select>
        
        					<select name="Ref_subdist_id0" id="districts0">
      						</select>
                            
        					<input type="text" autocomplete="off" name="zip_code0" id="zip_code0" placeholder="รหัสไปรษณีย์">
                            <h4>USER</h4>
                            <h4>DEALER</h4>
                            <input type="text" autocomplete="off" id="CONSIGNEE1" name="CONSIGNEE1"  placeholder="ผู้รับ">
                        <input type="email" autocomplete="off" id="EMAIL1" name="EMAIL1"  placeholder="อีเมลล์">
                        <input type="text" maxlength="10" autocomplete="off" id="PHONE1" name="PHONE1"  placeholder="โทร">
                             <select id="DEALER" name="DEALER">
    					<option value="">--เลือก DEALER--</option>
        				<?php
        				$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='DEALER'");  // Use select query here 
						while($data = mysqli_fetch_assoc($records))
        				{
            			echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
						}
						?> 
       					</select>
                        
                        	<select name="Ref_prov_id1" id="provinces1">
							<option value="">-กรุณาเลือกจังหวัด-</option>
        						<?php
        							$records = mysqli_query($conn, "Select * from provinces");  // Use select query here 
									while($data = mysqli_fetch_assoc($records))
       							{
        			    		echo "<option value='". $data['id'],$data['name_th'] ."'>" .$data['name_th'] ."</option>";  // displaying data in option menu
								}
								
    							?>  
        					</select>
        					<select name="Ref_dist_id1" id="amphures1" >
       						</select>
        
        					<select name="Ref_subdist_id1" id="districts1">
                            
      						</select>
                            <input type="text" autocomplete="off" name="zip_code1" id="zip_code1" placeholder="รหัสไปรษณีย์">
                            <h4>DEALER</h4>
                            <h4>SUPPLIER</h4>
                            <input type="text" autocomplete="off" id="CONSIGNEE2" name="CONSIGNEE2"  placeholder="ผู้รับ">
                        <input type="email" autocomplete="off" id="EMAIL2" name="EMAIL2"  placeholder="อีเมลล์">
                        <input type="text" maxlength="10" autocomplete="off" id="PHONE2" name="PHONE2"  placeholder="โทร">
                             <select id="SUPPLIER" name="SUPPLIER">
    					<option value="">--เลือก SUPPLIER--</option>
        				<?php
        				$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SUPPLIER'");  // Use select query here 
						while($data = mysqli_fetch_assoc($records))
        				{
            			echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
						}
						?> 
       					</select>
                        
                        	<select name="Ref_prov_id2" id="provinces2">
							<option value="">-กรุณาเลือกจังหวัด-</option>
        						<?php
        							$records = mysqli_query($conn, "Select * from provinces");  // Use select query here 
									while($data = mysqli_fetch_assoc($records))
       							{
        			    		echo "<option value='". $data['id'],$data['name_th'] ."'>" .$data['name_th'] ."</option>";  // displaying data in option menu
								}
								
    							?>  
        					</select>
        					<select name="Ref_dist_id2" id="amphures2" >
       						</select>
        
        					<select name="Ref_subdist_id2" id="districts2">
      						</select>
                            <input type="text" autocomplete="off" name="zip_code2" id="zip_code2" placeholder="รหัสไปรษณีย์">
                            <h4>SUPPLIER</h4>
                            
                            
                            
         
        			</div>
                    <div class="col-sm-6">
      					<select id="SERIES" name="SERIES" style="width:125;">
    						<option value="">--เลือกประเภท--</option>
    						<?php
        					$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SERIES'");  // Use select query here 
							while($data = mysqli_fetch_assoc($records))
       						 {
            					echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
								}	
    						?>  
  						</select>
        				<select id="BRANDNAME" name="BRANDNAME" style="width:125;">
    					<option value="">--เลือก BRAND--</option>
    					<?php
        				$records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='BRANDNAME'");  // Use select query here 
						while($data = mysqli_fetch_assoc($records))
       					{
        			    echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
						}	
    					?>  
  						</select>
       					
        				<select id="LOGO" name="LOGO" style="width:125;">
						</select>
        
        				<select id="GOODS" name="GOODS" style="width:125;">
						</select>
        				<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="จำนวน" >
        
    				</div>
                    <div class="modal-footer">
          					<button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="creates()">OK</button>
          					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
		for ($page=1;$page<=$number_of_pages;$page++)
		{
  			echo '<a class="btn btn-secondary" style="margin-left:90%;" href="customer.php?page=' . $page . '">' . $page . '</a> ';
		}
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
</html>
<?= include("script.php")?>
<?= include("script1.php")?>
<?= include("script2.php")?>
<script>

$('#SERIES').change(function() {
    var SERIES = $('#SERIES').val();
 	var BRANDNAME = $('#BRANDNAME').val()
      $.ajax({
      type: "POST",
      url: "location1.php",
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
      url: "location2.php",
      data: {GOODS:GOODS,BRAND:BRAND},
      success: function(data){
          $('#GOODS').html(data)
      }
    });
  });
function creates(){
	var DATE = $('#datepicker').val()
	var TIME = $('#timepicker').val()
	var USER = $('#USER').val()
	var UNIT = $('#UNIT').val()
	var PROJECT = $('#PROJECT').val()
	var DEALER = $('#DEALER').val()
	var BRANDNAME = $('#BRANDNAME').val()
	var SERIES = $('#SERIES').val()
	var LOGO = $('#LOGO').val()
	var GOODS = $('#GOODS').val()
	var AMOUNT = $('#AMOUNT').val()
	$.ajax({
        type: "POST",
        url: "customer_create.php",
        data: {"DATE":DATE,"TIME":TIME,"USER":USER,"UNIT":UNIT,"PROJECT":PROJECT,"DEALER":DEALER,"BRANDNAME":BRANDNAME,"SERIES":SERIES,"LOGO":LOGO,"GOODS":GOODS,"AMOUNT":AMOUNT},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
		
    })
	var CONSIGNEE = $('#CONSIGNEE').val()
	var EMAIL = $('#EMAIL').val()
	var PHONE = $('#PHONE').val()
	var PROVINCE = $('#provinces0').val()
	var DISTRICT = $('#amphures0').val()
	var SUBDISTRICT = $('#districts0').val()
	var ZIPCODE = $('#zip_code0').val()
	$.ajax({
        type: "POST",
        url: "create_user.php",
        data: {"CONSIGNEE":CONSIGNEE,"EMAIL":EMAIL,"PHONE":PHONE,"PROVINCE":PROVINCE,"PROJECT":DISTRICT,"DISTRICT":DISTRICT,"SUBDISTRICT":SUBDISTRICT,"ZIPCODE":ZIPCODE},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
		
    })
	var CONSIGNEE1 = $('#CONSIGNEE1').val()
	var EMAIL1 = $('#EMAIL1').val()
	var PHONE1 = $('#PHONE1').val()
	var PROVINCE1 = $('#provinces1').val()
	var DISTRICT1 = $('#amphures1').val()
	var SUBDISTRICT1 = $('#districts1').val()
	var ZIPCODE1 = $('#zip_code1').val()
	$.ajax({
        type: "POST",
        url: "create_dealer.php",
        data: {"CONSIGNEE1":CONSIGNEE1,"EMAIL1":EMAIL1,"PHONE1":PHONE1,"PROVINCE1":PROVINCE1,"PROJECT1":DISTRICT1,"DISTRICT1":DISTRICT1,"SUBDISTRICT1":SUBDISTRICT1,"ZIPCODE1":ZIPCODE1},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
		
    })
	var CONSIGNEE2 = $('#CONSIGNEE2').val()
	var EMAIL2 = $('#EMAIL2').val()
	var PHONE2 = $('#PHONE2').val()
	var PROVINCE2 = $('#provinces2').val()
	var DISTRICT2 = $('#amphures2').val()
	var SUBDISTRICT2 = $('#districts2').val()
	var ZIPCODE2 = $('#zip_code2').val()
	$.ajax({
        type: "POST",
        url: "create_supplier.php",
        data: {"CONSIGNEE2":CONSIGNEE2,"EMAIL2":EMAIL2,"PHONE2":PHONE2,"PROVINCE2":PROVINCE2,"PROJECT2":DISTRICT2,"DISTRICT2":DISTRICT2,"SUBDISTRICT2":SUBDISTRICT2,"ZIPCODE2":ZIPCODE2},
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
