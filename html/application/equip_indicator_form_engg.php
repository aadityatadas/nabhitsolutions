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
	$('#eqp').load('eqp_countNew.php').fadeIn("slow");
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
<body>
	<?php include"nav-bar-engg.php";?>
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                            Equipement Indicator

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
											<div class="col-lg-2" id="bofid">
												<input type="text" name="sr_no" id="sr_no" value="" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Select Date & Month</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="hrdt" id="hrdt" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the Equipement</label>
											<div class="col-lg-7">
												<select type="text" onchange="get_select_val(this.value);" name="mo1" id="mo1" class="form-control" required />
													<?php include"eqp_mast_list.php";?>
												</select>
												<input style="width:100px;" type="text" name="eqpid" id="eqpid" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Type of Equipement</label>
											<div class="col-lg-4">
												<input type="text" name="mo2" id="mo2" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Equipement Identification Number</label>
											<div class="col-lg-4">
												<input type="text" name="mo3" id="mo3" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Serial Number</label>
											<div class="col-lg-4">
												<input type="text" name="serial" id="serial" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Model No</label>
											<div class="col-lg-4">
												<input type="text" name="mo4" id="mo4" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Make</label>
											<div class="col-lg-4">
												<input type="text" name="mo5" id="mo5" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Purchase</label>
											<div class="col-lg-3">
												<input type="text" name="mo6" id="mo6" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Installation</label>
											<div class="col-lg-3">
												<input type="text" name="mo7" id="mo7" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Warranty Period</label>
											<div class="col-lg-2">
												<input type="text" name="mo8" id="mo8" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
											<div class="col-lg-2">
												<input type="text" name="mo9" id="mo9" placeholder="yyyy-mm-dd" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Under AMC</label>
											<div class="col-lg-4">
												<select type="text" name="mo10" id="mo10" class="form-control" >
													<option value="">Select Status</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">AMC period</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo11" id="mo11" placeholder="yyyy-mm-dd" class="form-control" readonly/>
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo12" id="mo12" placeholder="yyyy-mm-dd" class="form-control" readonly/>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Preventive Schedule</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo13" id="mo13" placeholder="Schedule-1" class="form-control" readonly/>
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo14" id="mo14" placeholder="Schedule-2" class="form-control" readonly/>
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo15" id="mo15" placeholder="Schedule-3" class="form-control" readonly/>
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo16" id="mo16" placeholder="Schedule-4" class="form-control" readonly/>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Calibration Schedule</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo17" id="mo17" placeholder="yyyy-mm-dd" class="form-control" readonly/>
											</div>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo18" id="mo18" placeholder="yyyy-mm-dd" class="form-control" readonly/>
											</div>
										</div>

											<div class="col-lg-12">
											<label class="col-lg-4">License Required for Operation</label>
											<div class="col-lg-4">
												<select type="text" name="mo23" id="mo23" class="form-control" readonly >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">License Valid from</label>
											<div class="col-lg-2">
												<input autocomplete="off" type="text" name="mo24" id="mo24" placeholder="yyyy-mm-dd" class="form-control" readonly/>
											</div>
											<label class="col-lg-2">License Valid To</label>
											<div class="col-lg-2">
												<input autocomplete="off" type="text" name="mo25" id="mo25" placeholder="yyyy-mm-dd" class="form-control" readonly/>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Type of Maintenance </label>
											<div class="col-lg-4">
												<select type="text" name="mo19" id="mo19" class="form-control" >
													<option value="">Select maintenance</option>
													<option value="Corrective maintenance">Corrective maintenance</option>
													<option value="Preventive maintenance">Preventive maintenance</option>
													<option value="Risk-based maintenance">Risk-based maintenance</option>
													<option value="Condition-based maintenance">Condition-based maintenance</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Breakdown</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo20" id="mo20" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="tmbr" id="tmbr" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Repair</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="mo21" id="mo21" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="tmrp" id="tmrp" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Condemnation</label>
											<div class="col-lg-4">
												<select type="text" name="mo22" id="mo22" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">License Required for Operation</label>
											<div class="col-lg-4">
												<select type="text" name="mo23" id="mo23" class="form-control" >
													<option value="">Select</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div> -->
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
												<th>Breakdown Date</th>
												<th>Name of the Equipement</th>
												<th>Type of Equipement</th>
												<th>Equipement Identification Number</th>
												<th>Serial Number</th>
												<th>Model No</th>
												<th>Make</th>
												<th>Date of Purchase</th>
												<th>Date of Installation</th>
												<th>Warranty Period</th>
												<th>Under AMC</th>
												<th>AMC Period</th>
												<th>Preventive Schedule</th>
												<th>Calibration Schedule</th>
												<th>Type of Breakdown </th>
												<th>Date & Time of Breakdown</th>
												<th>Date & Time of Repair</th>
												<th>Condemnation</th>
												<th>License Required for Operation</th>
												<th>Recorded By</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
							<form method="post" action = "../excel/EM-INC/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										
										
     <input type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
									</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="eqp">
					
										</div>
										<br />
										<div id="eqp_chart">
											
										</div>
									</div>
									<!-- /.panel-body -->
								</div>
								<!-- /.panel -->
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
						<div id="line_chart1" style="height:400px;"></div>
					</div>
					<div class="col-sm-12">
						<div id="line_chart2" style="height:400px;"></div>
					</div>
					<div class="col-sm-12">
						<div id="line_chart3" style="height:400px;"></div>
					</div>
				</div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->    
</body>
</html>
<script>
	function get_select_val(val){
		if(val){
			$.ajax({
				url: 'load_eqp_det.php',
				type: 'post',
				data: { val: val },
				success: function(result){
					var stk=result.split("@");
					
					document.getElementById('mo2').value=stk[0];
					document.getElementById('mo3').value=stk[1];
					document.getElementById('serial').value=stk[2];
					document.getElementById('mo4').value=stk[3];
					document.getElementById('mo5').value=stk[4];	
					document.getElementById('mo6').value=stk[5];
					document.getElementById('mo7').value=stk[6];
					document.getElementById('mo8').value=stk[7];
					document.getElementById('mo9').value=stk[8];
					document.getElementById('mo11').value=stk[9];
document.getElementById('mo12') .value=stk[10];


document.getElementById('mo13').value=stk[11];
document.getElementById('mo14').value=stk[12];
document.getElementById('mo15').value=stk[13];
document.getElementById('mo16').value=stk[14];
document.getElementById('mo17').value=stk[15];
document.getElementById('mo18').value=stk[16];

document.getElementById('mo23').value=stk[18];
document.getElementById('mo24').value=stk[19];
document.getElementById('mo25').value=stk[20];

					document.getElementById('eqpid').value=stk[17];
					document.getElementById('mo10').focus();					
				}
			});
		}
	}
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});	
		$("#mo11").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo12").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo24").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo25").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
			
		$("#mo13").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo14").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
			
		$("#mo15").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo16").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo17").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo18").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo21").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	
		$("#mo20").datepicker({
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
		$(function(){  
			$("#mo11").datepicker();
			$("#mo12").datepicker();
			$("#mo13").datepicker();
			$("#mo14").datepicker();
			$("#mo15").datepicker();
			$("#mo16").datepicker();
			$("#mo17").datepicker();
			$("#mo18").datepicker();
			$("#mo20").datepicker();
			$("#mo21").datepicker();
			$("#hrdt").datepicker();
			//$("#mo121").timepicker();
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
			$('#sr_no').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#bofid').load("load_eqpno.php");
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
				url:"fetch_eqp_form.php",
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
					url:"insert_eqp_form.php",
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
				url:"fetch_single_eqp_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#bx2').hide('fast');
					$('#add_btn').hide('fast');
					$('#sr_no').focus();
					$('#hrdt').val(data.hrdt);
					$('#sr_no').val(data.sr_no);
					$('#mo1').val(data.mo1);
					$('#eqpid').val(data.eqpid);
					$('#mo2').val(data.mo2);
					$('#mo3').val(data.mo3);
					$('#serial').val(data.serial);
					$('#mo4').val(data.mo4);
					$('#mo5').val(data.mo5);
					$('#mo6').val(data.mo6);
					$('#mo7').val(data.mo7);
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
					$('#mo18').val(data.mo18);
					$('#mo19').val(data.mo19);
					$('#mo20').val(data.mo20);
					$('#tmbr').val(data.tmbr);
					$('#mo21').val(data.mo21);
					$('#tmrp').val(data.tmrp);
					$('#mo22').val(data.mo22);
					//$('#mo23').val(data.mo23);
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
					url:"delete_eqp_form.php",
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
		$('#mo11').mask('9999-99-99');// for  To Date
		$('#mo12').mask('9999-99-99');// for  To Date
		$('#mo13').mask('9999-99-99');// for  To Date
		$('#mo14').mask('9999-99-99');// for  To Date
		$('#mo15').mask('9999-99-99');// for  To Date
		$('#mo16').mask('9999-99-99');// for  To Date
		$('#mo17').mask('9999-99-99');// for  To Date
		$('#mo18').mask('9999-99-99');// for  To Date
		$('#mo20').mask('9999-99-99');// for  To Date
		$('#mo21').mask('9999-99-99');// for  To Date
		$('#hrdt').mask('9999-99-99');// for  To Date
		//$('#mo120').mask('99:99');// for  To Date
		//$('#mo121').mask('99:99');// for  To Date
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
			var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
				
				// Chart Twelve
				var jsonData = $.ajax({
				url: 'eqp_chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Equipment Indicator',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart1'));
						chart.draw(data, options);
							
					}	
				}).responseText;	
				// chart two
				var jsonData = $.ajax({
				url: 'eqp_chart_two.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Equipment Breakdown Time',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart2'));
						chart.draw(data, options);
							
					}	
				}).responseText;
				// chart two
				var jsonData = $.ajax({
				url: 'eqp_chart_three.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Equipment Breakdown Time with count',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart3'));
						chart.draw(data, options);
							
					}	
				}).responseText;
			}	
		}	
</script>