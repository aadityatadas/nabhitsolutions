<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	$stf_id1=$_SESSION['id'];
	$statement = $connection->prepare(
		"SELECT * FROM tbl_staff
		WHERE stf_id = '".$stf_id1."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
    
	foreach ($result as $key =>$row) {
		${$key}=$row;
	}


?>

<script>
function myFunction() {
  window.print();
}

function goBack() {
  window.history.back();
}

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
.preload{
	margin:0;
	position:absolute;
	top:50%;
	left:60%;
	margin-right: -50%;
	transform:translate(-50%, -50%);
}

.form-control{
	margin-bottom:10px;
}
</style>
<style type="text/css">
	#wrapper {
  width: 100%;
}
#page-wrapper {
  padding: 0 15px;
  min-height: 568px;
  background-color: white;
  border-color:#D9EDF7; 
}
@media (min-width: 768px) {
  #page-wrapper {
    position: inherit;
    margin: 0 0 0 0px;
    padding: 0 30px;
    border-left: 1px solid #e7e7e7;
  }

}
.box {
    height: 100%;
    overflow: hidden;
    width: 100%;
    margin: 0px auto 15px;
    border: 1px solid black;
	
}

.form-group label {
    font-size: 14px;
    line-height: 1.42857;
    color: #121212 !important;
    font-weight: 400;
	
}
</style>


<body>
<?php include"new-nav-bar.php";?>
<section class="content home" >
<div class="container-fluid" >
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="padding:7px;">
                            Staff Profile &nbsp;
                             <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: white;font-weight: bold;" onclick="myFunction()" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Back</span>

						 
						
                           
					</div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-3">Sr. No.</label>
											<div class="col-lg-2">
												<input  type="text" name="stf_id" id="stf_id"  class="form-control" value="<?=$stf_id?>" readonly/>
											</div>
										</div>

										<div class="col-lg-12">
											<label class="col-lg-3">Full Name </label>
											<div class="col-lg-7">
												<input  type="text" name="stf_name" id="stf_name" class="form-control" value="<?=$stf_name?>" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-3">Username </label>
											<div class="col-lg-7">
												<input  type="text" name="stf_uname" id="stf_uname" class="form-control" value="<?=$stf_uname?>" readonly/>
											</div>
										</div>
										
										
										<div class="col-lg-12">
											<label class="col-lg-3">Designation</label>
											<div class="col-lg-6">
												<input  type="text" name="stf_desig" id="stf_desig" class="form-control"  value="<?=$stf_desig?>"/>
											</div>
										</div>

										<div class="col-lg-12">
											<label class="col-lg-3">User Type</label>
											<div class="col-lg-6">
												<input  type="text" name="stf_utyp" id="stf_utyp" class="form-control" value="<?=$stf_utyp?>" readonly/>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-3">Birthdate</label>
											<div class="col-lg-3">
												<input type="text" name="stf_dobq" id="stf_dobq"  class="form-control" value="<?=$stf_dob?>"  />
											</div>

											
										</div>
		<?php  $gen = array('Male'=>'Male','Female'=>'Female');   ?>
										<div class="col-lg-12">
											<label class="col-lg-3">Gender</label>
											<div class="col-lg-3">
												<select style="text-transform:uppercase;" type="text" name="stf_gender" id="stf_gender" class="form-control" >
													<option value="">Select Gender</option>
										<?php foreach ($gen as $key1 => $value1) { ?>
                                               
												<option value="<?=$key1?>" 
													<?php if($stf_gender==$key1) 
													echo 'selected';?>
													><?=$value1?></option>

									   <?php } ?>
												</select>
											</div>
											
										</div>
										<div class="col-lg-12">
											
                                        <br>

										</div>

			          <div class="col-lg-12">
											<label class="col-lg-3">Email </label>
											<div class="col-lg-3">
												<input  type="text" name="stf_email" id="stf_email" class="form-control" value="<?=$stf_email?>" />
											</div>

											<label class="col-lg-2">Mobile </label>
											<div class="col-lg-3">
												<input  type="text" name="stf_mob" id="stf_mob" class="form-control" value="<?=$stf_mob?>" />
											</div>
							</div>

							<div class="col-lg-12">
											<label class="col-lg-3">Address</label>
											<div class="col-lg-3">
												

												<textarea type="text" name="stf_addr" id="stf_addr"  class="form-control"><?=$stf_addr?></textarea>
											</div>

											
										</div>

										
										<div class="col-lg-12">
											
                                        <br>

										</div>

										

						<div class="col-lg-12">
								<label class="col-lg-4">Upload Sign</label>
								<div class="col-lg-3">
									<input type="file"  name="imgsign" id="imgsign"  class="form-control" style="opacity: 1;
                                              position: relative;" />
											</div>
					</div>

		<?php if($stf_emp_sign!=''){ ?>
					<div class="col-lg-12" >
							<label class="col-lg-4">Employee Sign</label>

							<div class="col-lg-8" id="singimg">
												
                             <img src="user_profile/sign/<?=$stf_emp_sign?>" alt="User Sign Image No Present" style="height: 150px;width: 200px">


                             <input type="hidden" name="oldimg" id="oldimg" value="<?=$stf_emp_sign?>">
                               
								</div>
                         </div>
                      <?php } ?>


									
										<div class="col-lg-12">
											<hr />
										</div>
											<div class="col-lg-12">
												<div class="col-lg-6">	
													<input type="hidden" name="user_id" id="user_id" />
													<input type="hidden" name="operation" id="operation" value="Edit" />
													<button style="color:white;font-weight: bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" />Submit ( Alt + s )</button>
												</div>
												<div class="col-lg-6">	
													<button type="button" class="btn btn-default pull-left" id="close_btn">Close</button>
												</div>
											</div>
										</div>
									</div>	
								</form>
							</div>
						</div>
                     
                    
				
			
        </div>        
    </div> 
</div>
</section>
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#stf_dobq").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		
		$(function(){  
			$("#stf_dobq").datepicker();
			
		});
		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});
		$('#add_btn').click(function(){
			$('#user_form')[0].reset();
			$('#bx1').show('fast');
			$('#adm').show('fast');
			$('#add_btn').hide('fast');
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			$('#p_name').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#sr').load("load_hrmastno.php");
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		/*
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		*/
		// Fetch Data
		
		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			if(confirm("Are you sure you want to Submit this?"))
			{
				//$("#action").attr("disabled", true);
				$.ajax({
					url:"user_profile/insert_stf_mast_form.php",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);

						location.reload();
						
						
						
					}
				});
			}
		});
		
		$(document).on('click', '.delete', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"delete_hr_mast_ind.php",
					method:"POST",
					data:{user_id:user_id},
					success:function(data)
					{
						alert(data);
						dataTable.ajax.reload();
					}
				});
			}
			else
			{
				return false;	
			}
		});
	});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#mo5').mask('9999-99-99');// for  To Date
		$('#mo7').mask('9999-99-99');// for  To Date
	});
</script>
<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});  
		$(function(){  
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
	});
</script>
<script type="text/javascript">	
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages':['corechart']});
		  
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(line_chart);
		
		function line_chart() 
		{
			// Chart Six
				var jsonData = $.ajax({
				url: 'hr_mast_chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				//data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'HR Master',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_mast'));
						 chart.draw(data, options);
						
					}	
			}).responseText;
		}	
</script>