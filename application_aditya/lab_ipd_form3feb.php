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
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#vent').load('lab_ipd_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
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
	<?php include"nav-bar.php";?>
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
                            Ventilator Associated Pnemonia Form
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
											<label class="col-lg-4">UHID No</label>
											<div class="col-lg-4">
												<input type="text" name="uhid_no" id="uhid_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">IPD No</label>
											<div class="col-lg-4">
												<input type="text" name="ipd_no" id="ipd_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Admission</label>
											<div class="col-lg-4">	
												<input type="text" name="d_adm" id="d_adm" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Provisional / Final Diagnosis</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="t_dig" id="t_dig" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of Test</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="nameofTest" id="nameofTest" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Sample Receiving Time</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="srt" id="srt" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="srtt" id="srtt" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Time of report generation</label>
											<div class="col-lg-2">	
												<input type="text" autocomplete="off" name="dateofreportgeneration" id="dateofreportgeneration" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">	
												<input type="time" name="timeofreportgeneration" id="timeofreportgeneration" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Total Time</label>
											<div class="col-lg-2">
												<input type="text" name="resultTime" id="resultTime" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Investigation Result</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="InvestigationResult" id="InvestigationResult" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Critical Result If Any</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="CriticalResult" id="CriticalResult" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Critical Alert Details</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="CriticalAlert" id="CriticalAlert" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Result Time</label>
											<div class="col-lg-2">	
												<input type="text" autocomplete="off" name="ResultDate" id="ResultDate" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">	
												<input type="time" name="ResultTime" id="ResultTime" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Informed Time</label>
											<div class="col-lg-2">	
												<input type="text" autocomplete="off" name="InformedDate" id="InformedDate" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">	
												<input type="time" name="InformedTime" id="InformedTime" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Informed To</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="InformedTo" id="InformedTo" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Informed By</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="InformedBy" id="InformedBy" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Reporting Error If Any</label>
											<div class="col-lg-2">	
												<select type="text" name="ReportingError" id="ReportingError" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-6" id="symp">	
												
												<input type="text" autocomplete="off" name="ReasoneForReportingError" id="ReasoneForReportingError" placeholder="Reasone For Reporting Error" class="form-control" />
											
											</div>
										</div>
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Date of Sample sent for culture</label>
											<div class="col-lg-4">	
												<input type="text" autocomplete="off" name="mlc" id="mlc" placeholder="yyyy-mm-dd" class="form-control" >
											</div>
										</div> -->
										<div class="col-lg-12">
											<label class="col-lg-4">Redos If Any</label>
											<div class="col-lg-2">
												<select type="text" name="RedosIfAny" id="RedosIfAny" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-6" id="symp">	
												
												<input type="text" autocomplete="off" name="ReasonForRedos" id="ReasonForRedos" placeholder="Reason For Redos" class="form-control" />
											
											</div>		
										</div>	
										<div class="col-lg-12">
											<label class="col-lg-4">Reports-Corelating With Clinical Diagnosis</label>
											<div class="col-lg-2">
												<select type="text" name="Reports-Corelating" id="Reports-Corelating" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>	
										<div class="col-lg-12">
											<label class="col-lg-4">Clinical Correlation</label>
											<div class="col-lg-2">
												<select type="text" name="ClinicalCorrelation" id="ClinicalCorrelation" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Remarks</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="Remarks" id="Remarks" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
										</div>								
										<div class="col-lg-12">
											<hr />
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
												<th>lab ipd id.</th>
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<!-- <th>IPD No</th> -->
												<th>Date of Admission</th>
												 <th>Provisional/Final Diagnosis</th>
											 <th>Sample Receiving Date-Time</th>
											 <th>Name of Test</th>

											 <th>Date-Time of Report Generation</th>

											 <th>Total Time</th>

											 <th>Investigation Result</th>
											 <th>Critical Result If Any</th>
											 <th> Critical Alert Details</th>

											 <th>Result Time</th>
											 <th> Informed Time</th>
											 <th> Informed To</th>

											 <th> Infromed By</th>

											 <th> Reporting Error If Any</th>

											 <th> Reason For Reporting Error</th>

											 <th> Redos If Any</th>

											 <th> Reason For Redos</th>
											 <th> Reports-Corelating With Clinical Diagnosis </th>

											 <th> Clinical Correlation</th>
											 <th>Remarks</th>


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
		$("#srt").datepicker({
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
			$("#srt").datepicker();
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
				url:"fetch_all_lab_ipd_form.php",
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
						url:"insert_lib_ipd_form.php",
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
			$.ajax({
				url:"fetch_single_lab_ipd_form.php",
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
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					$('#d_adm').val(data.d_adm);
					$('#t_dig').val('data.d_adm');
					$('#nameofTest').val('nameofTest');
					$('#srt').val(data.t_adm);
					$('#srtt').val(data.t_adm1);
					$('#dateofreportgeneration').val(data.ddd);
					$('#timeofreportgeneration').val(data.ddd1);
                    $('#ResultDate').val(data.ddd);
					$('#ResultTime').val(data.ddd1);
					$('#InformedDate').val(data.ddd);
					$('#InformedTime').val(data.ddd1);
					$('#resultTime').val(data.dddd);
					$('#InvestigationResult').val('InvestigationResult');
					$('#CriticalResult').val('CriticalResult');
					$('#CriticalAlert').val('CriticalAlert');
					$('#InformedTo').val('InformedTo');
					$('#InformedBy').val('InformedBy');
					$('#ReasoneForReportingError').val('ReasoneForReportingError');
					$('#ReasonForRedos').val('ReasonForRedos');
					$('#Remarks').val('Remarks');
					$('#ReportingError').val(data.ReportingError);
					$('#tddd').val(data.tddd);
					$('#mlc').val(data.mlc);
					$('#RedosIfAny').val(data.surg);
					$('#Reports-Corelating').val(data.surg);
					$('#ClinicalCorrelation').val(data.surg);
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
					url: 'lab_ipd_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Laboratory Indicator for IPD ',
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