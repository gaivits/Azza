
<?php
	include "C:/xampp/htdocs/xampp/Azza/connects.php";
	$conn = new Databases;
	$conn = $conn->__construct();
	mysqli_query($conn, "SET NAMES 'utf8' ");
//query
	$query=mysqli_query($conn,"SELECT COUNT(*) FROM customer");
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	$page_rows = 5;
	$last = ceil($rows/$page_rows);
	if($last < 1)
	{
		$last = 1;
	} 
	$pagenum = 1;

	if(isset($_GET['pn']))
	{
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	if ($pagenum < 1) 
	{
		$pagenum = 1;
	}
	else if ($pagenum > $last) 
	{
		$pagenum = $last;
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	$nquery=mysqli_query($conn,"SELECT * from  customer $limit");

	$paginationCtrls = '';

	if($last != 1)
	{
		if ($pagenum > 1) 
		{
			$previous = $pagenum - 1;
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';

		for($i = $pagenum-4; $i < $pagenum; $i++)
		{
			if($i > 0)
			{
				$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
			}
		}
	}

	$paginationCtrls .= ''.$pagenum.' &nbsp; ';

	for($i = $pagenum+1; $i <= $last; $i++)
	{
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4)
		{
			break;
		}
	}

if ($pagenum != $last) 
{
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
}
	}
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
  <br>
  <!-- Trigger the modal with a button -->
  
      <input type="text" placeholder="???????????????id,??????????????????,ref" autocomplete="off" id="SEARCH_JOB" name="SEARCH_JOB">
      <button type="button" class="btn btn-primary btn-sm" onclick="searches()">SEARCH</button>
     <br>
     <br>
  <div class="dropdown">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
      ?????????????????????????????????????????????
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
  	<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal">?????????????????????????????????</button>
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
    	
		<input type="text" autocomplete="off" id="datepicker" name="datepicker" placeholder="SELECT DATE">
        
        
        
        <input type="text" autocomplete="off" id="timepicker" name="timepicker" width="276" placeholder="SELECT TIME">
		
        
		<input type="number" autocomplete="off" min=0 step=0.01 id="AMOUNT" name="AMOUNT" placeholder="AMOUNT" >
        
        <input type="text" autocomplete="off" id="PROJECT" name="PROJECT" placeholder="?????????" maxlength="255" >
        
        <input type="text" autocomplete="off" id="EQUIPMENT" name="EQUIPMENT" placeholder="?????????????????????" maxlength="255">
        
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
		<select class="form-control" name="Ref_prov_id" id="provinces">
		<option value="">-???????????????????????????????????????????????????-</option>
        <?php
        $records = mysqli_query($conn, "SELECT * FROM provinces");  // Use select query here 
		
		while($value = mysqli_fetch_assoc($records))
        {
		  echo "<option value='". $value['id'],$value['name_th'] ."'>" .$value['name_th'] ."</option>";
		}
		?>
        </select>
        
        <select class="form-control" name="Ref_dist_id" id="amphures" >
        
        </select>
        
        <select class="form-control" name="Ref_subdist_id" id="districts">
      	</select>
        
         <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="????????????????????????????????????">
         
         <input type="text" id="CONTACT" name="CONTACT" placeholder="??????????????????" maxlength="255">
         
         <input type="text" id="DEPARTMENT" name="DEPARTMENT" placeholder="????????????/????????????????????????" maxlength="255">
         
         <input type="text" id="NOTENAME" name="NOTENAME" placeholder="????????????" maxlength="255">
         
         <input type="text" id="PHONE" name="PHONE" placeholder="?????????" maxlength="255">
         
         <input type="email" id="EMAIL" name="EMAIL" placeholder="?????????????????????" maxlength="255">
         
        <input type="text" id="WE" name="WE" placeholder="WE" maxlength="255" value="Azza">
        
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
        <select id="SERIES" name="SERIES" >
    	<option value="">--??????????????? Type--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='SERIES'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
		}	
    	?>  
  		</select>
        <select id="BRANDNAME" name="BRANDNAME" >
    	<option value="">--??????????????? BRAND--</option>
    	<?php
        $records = mysqli_query($conn, "Select * from tbl_master_groupcode WHERE type='BRANDNAME'");  // Use select query here 
		while($data = mysqli_fetch_assoc($records))
        {
            echo "<option value='". $data['NAME'] ."'>" .$data['NAME'] ."</option>";  // displaying data in option menu
			
		}	
    	?>  
  		</select>
        
      
        
        <select id="LOGO" name="LOGO">
		</select>
        
        <select id="GOODS" name="GOODS">
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
	
    <div class="modal fade" id="myModal-add-user" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        	<form>
            	<input type="text" id="ADD_USER" name="ADD_USER" placeholder="???????????????user">
                </form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_user()">???????????????</button>
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
            	<input type="text" id="ADD_DEALER" name="ADD_DEALER" placeholder="???????????????dealer">
                
        	</form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_dealer()">???????????????</button>
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
            	<input type="text" id="ADD_WE" name="ADD_WE" placeholder="???????????????we">
                
        	</form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_we()">???????????????</button>
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
            	<input type="text" id="ADD_SUPPLIER" name="ADD_SUPPLIER" placeholder="???????????????supplier">
                
        	</form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="OK" name="OK" onclick="add_supplier()">???????????????</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
  </div>
</div>
	<div id="viewCustomer"></div>
    <div id="popCustomer"></div>
    
    
     <div style="float:right;margin-right:50px;" id="pagination_controls"><?php echo $paginationCtrls; ?></div>
    
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
	$.ajax({
        type: "POST",
        url: "customer_create.php",
        data: {"DATE":DATE,"TIME":TIME,"AMOUNT":AMOUNT,"PROJECT":PROJECT,"EQUIPMENT":EQUIPMENT,"USER":USER,"BRANDNAME":BRANDNAME,"SERIES":SERIES,"LOGO":LOGO,"GOODS":GOODS,"PROVINCE":PROVINCE,"DISTRICT":DISTRICT,"SUBDISTRICT":SUBDISTRICT,
		"ZIPCODE":ZIPCODE,"CONTACT":CONTACT,"DEPARTMENT":DEPARTMENT,"NOTENAME":NAME,"PHONE":PHONE,"EMAIL":EMAIL,"DEALER":DEALER,"WE":WE,"SUPPLIER":SUPPLIER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')

function searches(){
	
	var SEARCH_JOB = $('#SEARCH_JOB').val()
	$.ajax({
        type: "POST",
        url: "customer_look_up.php",
        data: {"SEARCH_JOB":SEARCH_JOB},
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
		alert("???????????? USER")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_user.php",
        data: {"ADD_USER":USER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("??????????????? dealer 1 ??????????????????")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')
function add_dealer(){
	
	var DEALER = $('#ADD_DEALER').val()
	if(DEALER==="")
	{
		alert("???????????? DEALER")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_dealer.php",
        data: {"ADD_DEALER":DEALER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("??????????????? dealer 1 ??????????????????")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')
function add_we(){
	
	var WE = $('#ADD_WE').val()
	if(WE==="")
	{
		alert("???????????? WE")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_dealer.php",
        data: {"ADD_WE":WE},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("??????????????? user 1 ??????????????????")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')
function add_supplier(){
	
	var SUPPLIER = $('#ADD_SUPPLIER').val()
	if(SUPPLIER==="")
	{
		alert("???????????? SUPPLIER")
		return 0
		}
	$.ajax({
        type: "POST",
        url: "customer_add_supplier.php",
        data: {"ADD_SUPPLIER":SUPPLIER},
        success: function(res) {
            $('#viewCustomer').load('customer_show.php')
			alert("??????????????? supplier 1 ??????????????????")
        },
		
    })
}
$('#viewCustomer').load('customer_show.php')

</script>
