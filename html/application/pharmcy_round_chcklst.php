<?php
	error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include "header.php";
	include "footer.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');	
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- <script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#vent').load('lab_opd_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
</script> -->
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
	<?php include"nav-bar-audit.php";?>
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
                            Pharmacist round Checklist
						</div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">	
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-3">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the Patient</label>
											<div class="col-lg-7">
												<input type="text" name="p_name" id="p_name" class="form-control" readonly />
											</div>
										</div>
									
										<div class="col-lg-12">
											<label class="col-lg-4">Date and Time</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="date1" id="date1" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="time" id="time" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of Department</label>
											<div class="col-lg-7">
												<input type="text" name="dep_name" id="dep_name" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
									<div class="col-lg-12">
											<label class="col-lg-4">Incidence of Medication Error</label>
											<div class="col-lg-2">
												<select type="text" name="incidenc_of_medctin_err_yn" id="incidenc_of_medctin_err_yn" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Remarks</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="incidenc_of_medctin_err_rmrk" id="incidenc_of_medctin_err_rmrk" placeholder="Remarks" class="form-control" />
											</div>
										</div>
																		
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Admission with Adverse Drug Reaction</label>
											<div class="col-lg-2">
												<select type="text" name="admsn_with_advrse_drug_rectn_yn" id="admsn_with_advrse_drug_rectn_yn" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Remarks</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="admsn_with_advrse_drug_rectn_rmrk" id="admsn_with_advrse_drug_rectn_rmrk" placeholder="Remarks" class="form-control" />
											</div>
										</div>
																		
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Medication Charts with Error Prone Abbreviations</label>
											<div class="col-lg-2">
												<select type="text" name="med_err_abbrvtn_yn" id="med_err_abbrvtn_yn" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Remarks</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="med_err_abbrvtn_rmrk" id="med_err_abbrvtn_rmrk" placeholder="Remarks" class="form-control" />
											</div>
										</div>
																		
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Patient Receiving High Risk Medication Developing Adverse Drug Event</label>
											<div class="col-lg-2">
												<select type="text" name="patnt_drug_evnt_yn" id="patnt_drug_evnt_yn" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Remarks</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="patnt_drug_evnt_rmrk" id="patnt_drug_evnt_rmrk" placeholder="Remarks" class="form-control" />
											</div>
										</div>
																		
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Action Taken</label>
											<div class="col-lg-2">
												<select type="text" name="action_taken_yn" id="action_taken_yn" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Remarks</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="action_taken_rmrk" id="action_taken_rmrk" placeholder="Remarks" class="form-control" />
											</div>
										</div>
																		
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Sign</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="sign" id="sign" placeholder="Sign" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />

		<input type="hidden" name="action_to_perform" value="<?php echo $output["action_to_perform"]?>">
												<button accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit ( Alt + s )</button>
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
												<th>Sr.No.</th>
												<!-- <th>lab ipd id.</th> -->
												<th>Name of the Patient</th>
												<!-- <th>Patient ID</th> -->
												<th>Date</th>
												<th>Time</th>
												 <th>Department Name</th>
												  <th>Incidence of Medication Error</th>
											 <th>Incidence of Medication Error Remark</th>
											

											 <th>Admission with Adverse Drug Reaction</th>

											 <th>Admission with Adverse Drug Reaction Remark</th>

											 <th>Medication Charts with Error Prone Abbreviations</th>
											 <th>Medication Charts with Error Prone Abbreviation Remark</th>
											 <th>Patient Receiving High Risk Medication Developing Adverse Drug Event</th>

											 <th>Patient Receiving High Risk Medication Developing Adverse Drug Event Remark</th>
											 <th> Action Taken</th>
											 <th>Action Taken Remark</th>
											 <th>Sign</th>



											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="vent">
											
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
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#dateofreportgeneration").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#ResultDate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#InformedDate").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#date1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#mlc").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$(function(){  
			$("#dateofreportgeneration").datepicker();
			$("#date1").datepicker();
			$("#ResultDate").datepicker();
			$("#InformedDate").datepicker();
			//$("#ddd1").timepicker();
			//$("#t_adm1").timepicker();
			$("#mlc").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});
		$(document).on('click', '.edit_rpt', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_rpt2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_cult', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$(document).on('click', '.edit_cult2', function(){
			var $td = $(this);
			window.open($td.attr('data-href'),'newwindow','width=800,height=600px,toolbar=no,menubar=no,resizable=no,fullscreen=yes');
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#adm').hide();
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"pharmcy_round_chcklst/fetch_all_pharmcy_round_chcklst_form.php",
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
			if(confirm("Are you sure you want to submit this?"))
			{
					$.ajax({
						url:"pharmcy_round_chcklst/insert_pharmcy_round_chcklst_form.php",
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
							dataTable.ajax.reload();
						}
					});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			console.log(user_id);

			$.ajax({
				url:"pharmcy_round_chcklst/fetch_single_pharmcy_round_chcklst_form.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{  
					console.log(data);
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					//$('#uhid_no').val(data.uhid_no);
					$('#date1') .val(data.date1);
					$('#time') .val(data.time);
					$('#dep_name') .val(data.dep_name);
					$('#incidenc_of_medctin_err_yn') .val(data.incidenc_of_medctin_err_yn);
					$('#incidenc_of_medctin_err_rmrk') .val(data.incidenc_of_medctin_err_rmrk);
					$('#admsn_with_advrse_drug_rectn_yn') .val(data.admsn_with_advrse_drug_rectn_yn);
					$('#admsn_with_advrse_drug_rectn_rmrk') .val(data.admsn_with_advrse_drug_rectn_rmrk);
					$('#med_err_abbrvtn_yn') .val(data.med_err_abbrvtn_yn);
					$('#med_err_abbrvtn_rmrk') .val(data.med_err_abbrvtn_rmrk);
					$('#patnt_drug_evnt_yn') .val(data.patnt_drug_evnt_yn);
					$('#patnt_drug_evnt_rmrk') .val(data.patnt_drug_evnt_rmrk);
					$('#action_taken_yn') .val(data.action_taken_yn);
					$('#action_taken_rmrk') .val(data.action_taken_rmrk);
					$('#sign') .val(data.sign);

					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					$('#operation').val(data.action_to_perform);					
					$("#action").attr("disabled", false);
				}
			})
		});
	});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#t_adm').mask('9999-99-99');// for Date
		$('#ddd').mask('9999-99-99');// for Date
		//$('#t_adm1').mask('99:99');// for Time
		//$('#ddd1').mask('99:99');// for Time
		$('#mlc').mask('9999-99-99');// for Date
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
				// chart three
					var jsonData = $.ajax({
					url: 'pharmcy_round_chcklst/pharmcy_round_chcklst_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Laboratory Indicator for OPD ',
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