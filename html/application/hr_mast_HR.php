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
#bx1,
#bx2,
#adm,
#order-table{
	display:none;
}
.form-control{
	margin-bottom:10px;
}
</style>
<body>
	<?php include"nav-bar-hr.php";?>
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                            HR Master Details
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

						 
						 <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New</b></button>
						 
							<!-- <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button> -->
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-2" id="sr">
												<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the staff</label>
											<div class="col-lg-7">
												<input style="text-transform:uppercase;" type="text" name="mo1" id="mo1" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Registration Number </label>
											<div class="col-lg-4">
												<input style="text-transform:uppercase;" type="text" name="mo2reg" id="mo2reg" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Employee Code</label>
											<div class="col-lg-4">
												<input style="text-transform:uppercase;" type="text" name="mo2" id="mo2" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Designation</label>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="text" name="mo3" id="mo3" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Department</label>
											<div class="col-lg-6">
												<input style="text-transform:uppercase;" type="text" name="mo4" id="mo4" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Joining</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="mo5" id="mo5" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Current status</label>
											<div class="col-lg-3">
												<select style="text-transform:uppercase;" type="text" name="mo6" id="mo6" class="form-control" >
													<option value="">Select Status</option>
													<option value="Joined">Joined</option>
													<option value="Resigned">Resigned</option>
												</select>
											</div>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="mo7" id="mo7" placeholder="if resigned yyyy-mm-dd" class="form-control" />
											</div>
										</div>

										<div class="col-lg-12">
											<label class="col-lg-4">Type of Employment </label>
											<div class="col-lg-3">
												<select style="text-transform:uppercase;" type="text" name="mo6_emp" id="mo6_emp" class="form-control" >
													<option value="">Select Employment</option>
													<option value="Full Time">Full Time</option>
													<option value="Part Time">Part Time</option>
													<option value="Visiting">Visiting</option>
													<option value="On Contract Basis">On Contract Basis</option>
												</select>
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit Details ( Alt + s )</button>
											</div>
											<div class="col-lg-6">	
												<button type="button" class="btn btn-default pull-left" id="close_btn">Close</button>
											</div>
										</div>
									</div>	
								</form>
							</div>
						</div>
                        <div class="box" id="bx2">
							<div class="panel-body">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:darkblue;">
											<tr>
												<th>Action</th>
												<th>Sr No</th>
												<th>Name of the staff</th>
												<th>Employee Code</th>
												<th>Registration No.</th>
												<th>Designation</th>
												<th>Department</th>
												<th>Date of Joining</th>
												<th>Emp. Type</th>
												<th>Current status</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">From</label>
							<div class="col-lg-3">
								<input type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-3">
								<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_mast" style="height:400px;"></div>
					</div>
				</div>
				<form method="post" action="../excel/HR/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										 <input type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
									</form>
            </div>
        </div>        
    </div>  
</body>
</html>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#mo5").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo7").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$(function(){  
			$("#mo5").datepicker();
			$("#mo7").datepicker();
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
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_hr_mast_form.php",
				type:"POST"
			},
			"columnDefs":[
				{
					"targets":[0, 3, 4],
					"orderable":false,
				},
			],
		});
		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			if(confirm("Are you sure you want to Submit this?"))
			{
				$("#action").attr("disabled", true);
				$.ajax({
					url:"insert_hr_mast_form.php",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);
						$('#user_form')[0].reset();
						$('#adm').hide('fast');
						$('#bx1').hide('fast');
						$('#bx2').show('fast');
						$('#add_btn').show('fast');
						dataTable.ajax.reload();
					}
				});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_hr_mast_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#bx2').hide('fast');
					$('#mo1').focus();
					$('#sr_no').val(data.sr_no);
					$('#mo1').val(data.mo1);
					$('#mo2').val(data.mo2);
					$('#mo3').val(data.mo3);
					$('#mo4').val(data.mo4);
					$('#mo5').val(data.mo5);
					$('#mo6').val(data.mo6);
					$('#mo7').val(data.mo7);
					$('#mo2reg').val(data.mo2reg);
					$('#mo6_emp').val(data.mo6_emp);

					

					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val("Edit");					
					$("#action").attr("disabled", false);
				}
			})
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