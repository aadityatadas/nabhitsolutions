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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hr').load('hr_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds	
</script>

<script>
function myFunction() {
  window.print();
}

function goBack() {
  window.history.back();
}

</script>

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
<?php include"superadmin-nav-bar.php";?>
<section class="content home" >
<div class="container-fluid" >
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="padding:7px;height: 140px;">
                            HR Indicator &nbsp;
                            <div style="padding-left: 350px;">
                          	  <table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="650px" align="center" style="border-color: #9DA2E2; text-align: center;" >
		                            		<tr style="background-color: #9DA2E2;">
		                            			<td style="font-weight: bold;color: white;">Total</td>
		                            			<td style="font-weight: bold;color: white;">Completed</td>
		                            			<td style="font-weight: bold;color: white;">Not-Completed</td>
		                            			<td>
		                            				&nbsp;
		                            			</td>
		                            		</tr>
		                            		<tr style="background-color: white;">
		                            			<?php
													include('dbinfo.php');

													$qry = "SELECT COUNT(*) as total FROM  tbl_hr_indic WHERE year(hr_date) = '$yr'";
														$res = mysqli_query($connect, $qry);
														$row=mysqli_fetch_assoc($res);
														// echo $row['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrydis = "SELECT COUNT(*) as comp FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hrid = tbl_hr_indic.hrid WHERE hr_ctstat!=' 'AND year(hr_date) = '$yr' ";
																$resdis = mysqli_query($connect, $qrydis);
																$rowdis=mysqli_fetch_assoc($resdis);
																// echo $rowdis['discharge'];
																											

														$qrynotdis = "SELECT COUNT(*) as notcomp FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hrid = tbl_hr_indic.hrid WHERE hr_ctstat=' ' AND year(hr_date) = '$yr'";
																	$resnotdis = mysqli_query($connect, $qrynotdis);
																	$rownotdis=mysqli_fetch_assoc($resnotdis);
																	// echo $rownotdis['notdischarge'];
																	// echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
																	// die();

													   

													?>


		                            			<td style="font-weight: bold;color: black;" ><?php echo $row['total'];?></td>
		                            			<td style="font-weight: bold;color: green;"><?php echo $rowdis['comp'];?></td>
		                            			<td style="font-weight: bold;color: red;"><?php echo $rownotdis['notcomp'];?></td>
		                            			<td>
		                            				<a href="performence.php">Click here for Details</a>
		                            			</td>
		                            		
		                            		</tr>
		                            	</table>
		                            </div>

                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: white;font-weight: bold;"" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
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
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the staff</label>
											<div class="col-lg-7">
												<select type="text" onchange="get_select_val(this.value);" name="mo1" id="mo1" class="form-control" required >
													<?php include"hr_mast_list.php";?>
												</select>
												<input style="width:100px;" type="text" name="hrid" id="hrid" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Employee Code</label>
											<div class="col-lg-4">
												<input type="text" name="mo2" id="mo2" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Designation</label>
											<div class="col-lg-6">
												<input type="text" name="mo3" id="mo3" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Department</label>
											<div class="col-lg-6">
												<input type="text" name="mo4" id="mo4" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Joining</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="mo5" id="mo5" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Current status</label>
											<div class="col-lg-3">
												<input type="text" name="mo6" id="mo6" class="form-control" readonly />
											</div>
											<div class="col-lg-3">
												<input type="text" name="mo7" id="mo7" placeholder="if resigned yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Select Month of Data Entered</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="hrdt" id="hrdt" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
											<div class="col-lg-2">
												<input type="text" name="hrmon" id="hrmon" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">No of absentees in the month</label>
											<div class="col-lg-3">
												<input type="text" name="mo8" id="mo8" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Satisfaction Score</label>
											<div class="col-lg-3">
												<input type="text" name="mo9" id="mo9" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Occupational Exposure if any</label>
											<div class="col-lg-3">
												<select type="text" name="mo10" id="mo10" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Needle prick Injury incidences</label>
											<div class="col-lg-3">
												<select type="text" name="mo11" id="mo11" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Total Training Completed</label>
											<div class="col-lg-7">
												<input type="text" name="mo12" id="mo12" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Performance Appraisal Score</label>
											<div class="col-lg-3">
												<input type="text" name="mo13" id="mo13" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Personnal File Complete</label>
											<div class="col-lg-3">
												<select type="text" name="mo14" id="mo14" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Health Check done</label>
											<div class="col-lg-3">
												<select type="text" name="mo15" id="mo15" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Grievance Status</label>
											<div class="col-lg-3">	
												<select type="text" name="mo16" id="mo16" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Immunization Status</label>
											<div class="col-lg-3">	
												<select type="text" name="mo17" id="mo17" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
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
												<button style="color:white;font-weight: bold;" accesskey="s" type="submit" name="action" id="action" class="btn btn-info pull-right" />Submit Details ( Alt + s )</button>
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
												<th>Designation</th>
												<th>Department</th>
												<th>Date of Joining</th>
												<th>Current status</th>
												<th>Select Month of Data Entered</th>
												<th>No of absentees in the month</th>
												<th>Satisfaction Score</th>
												<th>Occupational Exposure if any</th>
												<th>Needle prick Injury incidences</th>
												<th>Total Training Completed</th>
												<th>Performance Aprissal Score</th>
												<th>Personnal File Complete</th>
												<th>Health Check done</th>
												<th>Griviences staus</th>
												<th>Immunization Status</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
							<form method="post" action="../excel/HR-INC/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading" style="color: black;">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										
										
                                    <input type="submit" name="export" class="btn btn-danger" value="Excel" style="color:white;font-weight:bold;"/>
    
									</div>
									</form>
									<div class="panel-body">
										<div id="hr">
					
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>	
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">From</label>
							<div class="col-lg-2">
								<input  type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-2">
								<input type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button style="color: white;font-weight: bold;" type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_hr" style="height:400px;"></div>
					</div>
				</div>
            </div>
        </div>
       
    </div>
</body>
</html>
<script>	
	function get_select_val(val){
		if(val){
			$.ajax({
				url: 'load_hr_det.php',
				type: 'post',
				data: { val: val },
				success: function(result){
					var stk=result.split("@");
					document.getElementById('mo2').value=stk[0];
					document.getElementById('mo3').value=stk[1];
					document.getElementById('mo4').value=stk[2];
					document.getElementById('mo5').value=stk[3];	
					document.getElementById('mo6').value=stk[4];
					document.getElementById('mo7').value=stk[5];
					document.getElementById('hrid').value=stk[6];
					document.getElementById('hrdt').focus();					
				}
			});
		}
	}
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
		$("#hrdt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#frdate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#todate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});			
		$(function(){  
			$("#mo5").datepicker();
			$("#mo7").datepicker();
			$("#hrdt").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});
		$('#hrdt').change(function(){  
			var testn = $(this).val(); 			
			$.ajax({  
				url:"load_hrmon.php",  
				method:"POST",  
				data:{testn:testn},
				dataType:"json",				
				success:function(data)
				{  
					$('#hrmon').val(data.hrmon);
				}  
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
			$('#sr').load("load_hrno.php");
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_hr_indi_form.php",
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
					url:"insert_hr_indi_form.php",
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
				url:"fetch_single_hr_indi_form.php",
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
					$('#hrid').val(data.hrid);
					$('#mo2').val(data.mo2);
					$('#mo3').val(data.mo3);
					$('#mo4').val(data.mo4);
					$('#mo5').val(data.mo5);
					$('#mo6').val(data.mo6);
					$('#mo7').val(data.mo7);
					$('#hrdt').val(data.hrdt);
					$('#hrmon').val(data.hrmon);
					$('#mo8').val(data.mo8);
					$('#mo9').val(data.mo9);
					$('#mo10').val(data.mo10);
					$('#mo11').val(data.mo11);
					$('#mo12').val(data.mo12);
					$('#mo13').val(data.mo13);
					$('#mo14').val(data.mo14);
					$('#mo15').val(data.mo15);
					$('#mo16').val(data.mo16);
					$('#mo17').val(data.mo17);
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
					url:"delete_hr_ind.php",
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
		$('#hrdt').mask('9999-99-99');// for  To Date
		$('#frdate').mask('9999-99-99');// for Date
		$('#todate').mask('9999-99-99');// for Date
	});
</script>
<script type="text/javascript">	
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages':['corechart']});
		  
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(line_chart);
		
		function line_chart() 
		{
			var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
				// Chart Six
					var jsonData = $.ajax({
					url: 'hr_indic_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'HR Indicator',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart_hr'));
							 chart.draw(data, options);
							
						}	
				}).responseText;
			}	
		}	
</script>