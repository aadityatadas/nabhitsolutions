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
	$('#vent').load('radio_opd_count.php').fadeIn("slow");
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
                           Radiology Indicator Form (OPD)

                           <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>

						</div>
						<div class="box" id="bx1">
							<div id="adm">
								<br>
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
											<label class="col-lg-4">opd No</label>
											<div class="col-lg-4">
												<input type="text" name="opd_no" id="opd_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Date of Admission</label>
											<div class="col-lg-4">	
												<input type="text" name="d_adm" id="d_adm" class="form-control" readonly />
											</div>
										</div>
                                         <div class="col-lg-12">
											<label class="col-lg-4">Gender</label>
											<div class="col-lg-2">
												<select type="text" name="gender" id="gender" class="form-control" required="true">
													<option value="">Select</option>
													<option value="M">M</option>
													<option value="F">F</option>
													<option value="Other">Other</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Age</label>
											<div class="col-lg-4">	
												<input type="text" autocomplete="off" name="age" id="age" placeholder="Age" class="form-control" >
											</div>
										</div>
										<div class="col-lg-12">

				<hr />
				<label class="col-lg-2" style=" background-color: #d0dce9;">
					<u> Record 1</u></label>
			</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Provisional / Final Diagnosis</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="t_dig" id="t_dig" placeholder="Provisional/Final Diagnosis" class="form-control" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Radiology Investigation</label>
											<div class="col-lg-7">
												<select type="text" name="radio_invst" id="radio_invst" class="form-control" >
													<option value="">Select</option>
													<option value="X Ray">X Ray</option>
													<option value="CT Scans">CT Scans</option>
													<option value="USG">USG</option>
													<option value="MRI">MRI</option>
													<option value="Mammography">Mammography</option>
													<option value="PET Scan">PET Scan</option>
													
												</select>
											</div>
											
										</div>
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Name of Test</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="nameofTest" id="nameofTest" placeholder="Name Of Test" class="form-control" />
											</div>
											
										</div> -->
										<div class="col-lg-12">
											<label class="col-lg-4">Investigation Started Time</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="ist" id="ist" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="istt" id="istt" placeholder="hh:mm" class="form-control" />
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
											<label class="col-lg-4">TAT Turn around time</label>
											<div class="col-lg-2">
												<input type="text" name="TotalTime" id="TotalTime" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Investigation Result</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="InvestigationResult" id="InvestigationResult" placeholder="Investigation Result" class="form-control" />
											</div>
										</div>
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Critical Result If Any</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="CriticalResult" id="CriticalResult" placeholder="Critical Result If Any" class="form-control" />
											</div>
										</div> -->

										<div class="col-lg-12">
											<label class="col-lg-4">Critical Result If Any</label>
											<div class="col-lg-2">
												<select type="text" name="CriticalResult" id="CriticalResult" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Critical Alert Details</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="CriticalAlert" id="CriticalAlert" placeholder="Critical Alert Details" class="form-control" />
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
												<input type="text" autocomplete="off" name="InformedTo" id="InformedTo" placeholder="Informed To" class="form-control" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Informed By</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="InformedBy" id="InformedBy" placeholder="Informed By" class="form-control" />
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
										<div class="col-lg-12">
											<label class="col-lg-4">Report Corrective Action</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="ReportCorrectiveAction" id="ReportCorrectiveAction" placeholder="Report Corrective Action" class="form-control" />
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
											<label class="col-lg-4">Redos Corrective Action</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="RedosCorrectiveAction" id="RedosCorrectiveAction" placeholder="Redos Corrective Action" class="form-control" />
											</div>
										</div>	
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Reports-Corelating With Clinical Diagnosis</label>
											<div class="col-lg-2">
												<select type="text" name="Reports-Corelating" id="Reports-Corelating" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>	 -->


										<div class="col-lg-12">
											<label class="col-lg-4">Reports-Corelating With Clinical Diagnosis</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off"name="Reports-Corelating" id="Reports-Corelating"placeholder="Reports-Corelating With Clinical Diagnosis" class="form-control" />
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
											<label class="col-lg-4">Name of LAB Personnel</label>
											<div class="col-lg-7">
												<input type="text" autocomplete="off" name="Remarks" id="Remarks" placeholder="name of LAB personnel" class="form-control" readonly/>
											</div>
										</div>								
										<div class="col-lg-12">
											<hr />
										</div>

										<div id="Old_Data" >

			
											
		</div>

	<div class="col-lg-12">
			<div class="col-lg-10"></div>												
	<div class="col-lg-2" id="addButton">			
		    <button type="button" name="add" id="add" class="btn btn-info">
		      Add New Record</button>
	        </div>
     </div>
<br>
     <div id="newDatatoSave" >

			
											
		</div>

		
			<br>
			<div class="col-lg-12">
					<hr />
			</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />

		<input type="hidden" name="action_to_perform" value="<?php echo $output["action_to_perform"]?>">
			<input type="hidden" name="radio_opd_id_or" id="radio_opd_id_or" />									
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
												<!-- <th>lab opd id.</th> -->
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>opd No</th>
												<th>Date of Admission</th>
												<th>Age</th>
												<th>Gender</th>
												 <th>Provisional/Final Diagnosis</th>
												 <th>Radiology Investigation</th>  
											 <th>Sample Receiving Date-Time</th>
											

											 <th>Date-Time of Report Generation</th>

											 <th>TAT Turn around time</th>

											 <th>Investigation Result</th>
											 <th>Critical Result If Any</th>
											 <th> Critical Alert Details</th>

											 <th>Result Time</th>
											 <th> Informed Time</th>
											 <th> Informed To</th>

											 <th> Infromed By</th>

											 <th> Reporting Error If Any</th>

											 <th> Reason For Reporting Error</th>
											 <th> CORRECTIVE ACTION</th>

											 <th> Redos If Any</th>

											 <th> Reason For Redos</th>
											 <th> CORRECTIVE ACTION</th>
											 <th> Reports-Corelating With Clinical Diagnosis </th>

											 <th> Clinical Correlation</th>
											 <th>Name of LAB Personnel</th>


											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-default">
									
									<form method="post" action="../excel/RAD-OPD/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-3">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-1">
										<input type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-1">
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input type="submit" name="export" class="btn btn-danger" value="Excel" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="vent">
											
										</div>
									</div>
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
					<div class="col-sm-12">
						<div id="line_chart4" style="height:400px;"></div>
					</div>
					<div class="col-sm-12">
						<div id="line_chart5" style="height:400px;"></div>
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
		$("#ist").datepicker({
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

		$("#frdt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$(function(){  
			$("#dateofreportgeneration").datepicker();
			$("#ist").datepicker();
			$("#ResultDate").datepicker();
			$("#InformedDate").datepicker();
			//$("#ddd1").timepicker();
			//$("#t_adm1").timepicker();
			$("#mlc").datepicker();
			$("#frdate").datepicker();
			$("#todate").datepicker();
			$("#frdt").datepicker();
			$("#todt").datepicker();
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
				$('#newDatatoSave div').empty();
							$('#Old_Data div').empty();
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch_all_radio_opd_form.php",
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
						url:"insert_radio_opd_form.php",
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
							$('#newDatatoSave div').empty();
							$('#Old_Data div').empty();
							dataTable.ajax.reload();
						}
					});
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single_radio_opd_form.php",
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
					$('#opd_no').val(data.opd_no);
					$('#d_adm').val(data.d_adm);
					$('#t_dig').val(data.prov_finl_daig);
					$('#radio_invst').val(data.radio_invst);

					
					if(($('#radio_invst').val())==""){

                         $('#addButton').hide();
					}else{
						 $('#addButton').show();
					}
					$('#ist').val(data.d_sample_rec_time);
					$('#istt').val(data.t_sample_rec_time);
					$('#dateofreportgeneration').val(data.d_time_date_of_rep_gen);
					$('#timeofreportgeneration').val(data.t_time_date_of_rep_gen);
                    $('#ResultDate').val(data.d_result_time);
					$('#ResultTime').val(data.t_result_time);
					$('#InformedDate').val(data.d_info_time);
					$('#InformedTime').val(data.t_info_time);
					$('#TotalTime').val(data.total_time);
					$('#InvestigationResult').val(data.inv_result);
					$('#CriticalResult').val(data.cri_res_if_any);
					$('#CriticalAlert').val(data.cri_alrt_details);
					$('#InformedTo').val(data.info_to);
					$('#InformedBy').val(data.info_by);
					$('#RedosCorrectiveAction').val(data.correct_actn_redos);
					$('#ReportCorrectiveAction').val(data.correct_actn_report);
					$('#ReasoneForReportingError').val(data.res_err_rsn);
					$('#ReasonForRedos').val(data.redos_rsn);
					$('#Remarks').val(data.remarks);
					$('#ReportingError').val(data.resp_err);
					$('#gender').val(data.gender);
					$('#age').val(data.age);
					$('#RedosIfAny').val(data.redos);
					$('#Reports-Corelating').val(data.rep_cor_clin_diag);
					$('#ClinicalCorrelation').val(data.clinical_correlation);
					$('#user_id').val(data.sr_no);
						$('#radio_opd_id_or').val(data.radio_opd_id);
							if(data.oldDataCount>0){
          	var j=1;
          	for(var i=0; i < data.oldDataCount; i++){

          var html ='<div id="row'+i+'"  ><div class="col-lg-12"><label class="col-lg-2" style="background-color: #d0dce9;"><u> Record '+(++j)+'</u></label></div>';

         html += '<div class="col-lg-12"><label class="col-lg-4">Provisional / Final Diagnosis</label><div class="col-lg-6"><input type="text" autocomplete="off" name="t_digold[]" id="t_digold'+i+'" placeholder="Provisional/Final Diagnosis" class="form-control" value="'+data.prov_finl_daig_old[i]+'" readonly/></div></div>';



										
html +='<div class="col-lg-12"><label class="col-lg-4">Radiology Investigation</label><div class="col-lg-7"><select type="text" name="radio_invstold[]" id="radio_invstold'+i+'" class="form-control" readonly="true"><option value="'+data.radio_invst_old[i]+'" >'+data.radio_invst_old[i]+'</option></select></div></div>';				

html +='<div class="col-lg-12"><label class="col-lg-4">Investigation Started Time</label><div class="col-lg-2"><input type="text" autocomplete="off" name="istold[]" id="istold'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" value="'+data.d_sample_rec_time_old[i]+'" readonly="true"/></div><div class="col-lg-2"><input type="time" name="isttold[]" id="isttold'+i+'" placeholder="hh:mm" class="form-control" value="'+data.t_sample_rec_time_old[i]+'" readonly="true"/></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Time of report generation</label><div class="col-lg-2"><input type="text" autocomplete="off" name="dateofreportgenerationold[]" id="dateofreportgenerationold'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" value="'+data.d_time_date_of_rep_gen_old[i]+'" readonly="true"/></div><div class="col-lg-2"><input type="time" name="timeofreportgenerationold[]" id="timeofreportgenerationold'+i+'" placeholder="hh:mm" class="form-control" value="'+data.t_time_date_of_rep_gen_old[i]+'" readonly="true"/></div></div></div>';

	html +='<div class="col-lg-12"><label class="col-lg-4">TAT Turn around time</label><div class="col-lg-2"><input type="text" name="TotalTimeold[]" id="total_time_old'+i+'" class="form-control" readonly  value="'+data.total_time_old[i]+'" /></div></div>';






										
html +='<div class="col-lg-12"><label class="col-lg-4">Investigation Result</label><div class="col-lg-7"><input type="text" autocomplete="off" name="InvestigationResultold[]" id="InvestigationResultold'+i+'" placeholder="Investigation Result" class="form-control" value="'+data.inv_result_old[i]+'" readonly="true" /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Critical Result If Any</label><div class="col-lg-4"><select type="text" name="CriticalResultold[]" id="CriticalResultold'+i+'" class="form-control" readonly="true"><option value="'+data.cri_res_if_any_old[i]+'" >'+data.cri_res_if_any_old[i]+'</option></select></div></div>';


html +='<div class="col-lg-12"><label class="col-lg-4">Critical Alert Details</label><div class="col-lg-7"><input type="text" autocomplete="off" name="CriticalAlertold[]" id="CriticalAlertold'+i+'" placeholder="Critical Alert Details" class="form-control" value="'+data.cri_alrt_details_old[i]+'" readonly="true" readonly="true"/></div></div>';
	html +='<div class="col-lg-12"><label class="col-lg-4">Result Time</label><div class="col-lg-2"><input type="text" autocomplete="off" name="ResultDateold[]" id="ResultDateold'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" value="'+data.d_result_time_old[i]+'"  readonly="true" /></div><div class="col-lg-2"><input type="time" name="ResultTimeold[]" id="ResultTimeold'+i+'" placeholder="hh:mm" class="form-control" value="'+data.t_result_time_old[i]+'" readonly="true" /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Informed Time</label><div class="col-lg-2"><input type="text" autocomplete="off" name="InformedDateold[]" id="InformedDateold'+i+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" value="'+data.d_info_time_old[i]+'" readonly="true"/></div><div class="col-lg-2">	<input type="time" name="InformedTimeold[]" id="old'+i+'" placeholder="hh:mm" class="form-control" value="'+data.t_info_time_old[i]+'" readonly="true"/></div></div>';
										
html +='<div class="col-lg-12"><label class="col-lg-4">Informed To</label><div class="col-lg-7"><input type="text" autocomplete="off" name="InformedToold[]" id="InformedToold'+i+'" placeholder="Informed To" class="form-control" value="'+data.info_to_old[i]+'" readonly="true"/></div></div>';
										
html +='<div class="col-lg-12"><label class="col-lg-4">Informed By</label><div class="col-lg-7"><input type="text" autocomplete="off" name="InformedByold[]" id="InformedByold'+i+'" placeholder="Informed By" class="form-control" value="'+data.info_by_old[i]+'" readonly="true" /></div></div>';
										

html +='<div class="col-lg-12"><label class="col-lg-4">Reporting Error If Any</label><div class="col-lg-2"><select type="text" name="ReportingErrorold[]" id="ReportingErrorold'+i+'" class="form-control" readonly="true"><option value="'+data.resp_err_old[i]+'" >'+data.resp_err_old[i]+'</option></select></div><div class="col-lg-6" id="symp"><input type="text" autocomplete="off" name="ReasoneForReportingErrorold[]" id="ReasoneForReportingErrorold'+i+'" placeholder="Reasone For Reporting Error" class="form-control" value="'+data.res_err_rsn_old[i]+'" readonly="true"/></div></div>';
	

	html +='<div class="col-lg-12"><label class="col-lg-4">Report Corrective Action</label><div class="col-lg-7"><input type="text" autocomplete="off" name="ReportCorrectiveActionold[]" id="ReportCorrectiveActionold'+i+'" placeholder="Report Corrective Action" class="form-control" value="'+data.correct_actn_report_old[i]+'" readonly="true"/></div></div>';		
 html +='<div class="col-lg-12"><label class="col-lg-4">Redos If Any</label><div class="col-lg-2"><select type="text" name="RedosIfAnyold[]" id="RedosIfAnyold'+i+'" class="form-control" readonly="true"><option  value="'+data.redos_old[i]+'">'+data.redos_old[i]+'</option></select></div><div class="col-lg-6" id="symp"><input type="text" autocomplete="off" name="ReasonForRedosold[]" id="ReasonForRedosold'+i+'" placeholder="Reason For Redos" class="form-control" value="'+data.redos_rsn_old[i]+'" readonly="true"/></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Redos Corrective Action</label><div class="col-lg-7"><input type="text" autocomplete="off" name="RedosCorrectiveActionold[]" id="RedosCorrectiveActionold'+i+'" placeholder="Redos Corrective Action" class="form-control" value="'+data.correct_actn_redos_old[i]+'" readonly="true"/></div></div>';
											
html +='<div class="col-lg-12"><label class="col-lg-4">Reports-Corelating With Clinical Diagnosis</label><div class="col-lg-2"><select type="text" name="Reports-Corelatingold[]" id="Reports-Corelatingold'+i+'" class="form-control" readonly="true"><option value="'+data.rep_cor_clin_diag_old[i]+'">'+data.rep_cor_clin_diag_old[i]+'</option></select></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Clinical Correlation</label><div class="col-lg-2"><select type="text" name="ClinicalCorrelationold[]" id="ClinicalCorrelationold'+i+'" class="form-control" readonly="true"><option value="'+data.clinical_correlation_old[i]+'">'+data.clinical_correlation_old[i]+'</option></select></div></div>';     

html +='<div class="col-lg-12"><label class="col-lg-4">Name of LAB Personnel</label><div class="col-lg-7"><input type="text" autocomplete="off" name="Remarksold[]" id="Remarksold'+i+'" placeholder="name of LAB Personnel" class="form-control" value="'+data.remarks_old[i]+'" readonly /></div></div>';
          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button type="button" name="edit" id="'+data.radio_opd_extra_id[i]+'"  class="btn btn-primary edit_data">Edit Record No. '+j+'</button></div></div>';
          html +='<div class="col-lg-12"><hr /></div></div>';
         
          $('#Old_Data').append(html);
          }
      }
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
		$("#dateofreportgeneration").mask('9999-99-99');
		$("#ist").mask('9999-99-99');
		$("#ResultDate").mask('9999-99-99');
		$("#InformedDate").mask('9999-99-99');
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
					url: 'radio_opd_chart.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Radiology Indicator for opd ',
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
					// chart three
					var jsonData = $.ajax({
					url: 'radio_opd_chart2.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Radiology Indicator for OPD ',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart4'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
					// chart for %
					var jsonData = $.ajax({
					url: 'radio_opd_chart3.php',
					dataType:"json",
					method:"POST",
					async: false,
					data:{frdate:frdate,todate:todate},
					success: function(jsonData)
						{
							var options = 
							{
								title:'Average TAT Turn around time',
								legend: '',
								hAxis: { minValue: 0, maxValue: 10 },
								//curveType: 'function',
								pointSize: 7,
								dataOpacity: 0.3
							};
							var data = new google.visualization.arrayToDataTable(jsonData);	
							 var chart = new google.visualization.ColumnChart(document.getElementById('line_chart5'));
							 chart.draw(data, options);
							
						}	
					}).responseText;
			}	
		}	
</script>
<script type="text/javascript">
	$(document).ready(function(){  
      var divcount=1;  
      $('#add').click(function(){ 
     var divss=0;
       $("#newDatatoSave div").each(function(){
               divss++;
         });
     if(divss>0){ alert("Please fil data In Present Record Feilds"); return false;}  
           divcount++; 
         
         

          var html = '<div id="row'+divcount+'"  ><div class="col-lg-12"><label class="col-lg-4">Provisional / Final Diagnosis</label><div class="col-lg-6"><input type="text" autocomplete="off" name="t_dignew[]" id="t_dig'+divcount+'" placeholder="Provisional/Final Diagnosis" class="form-control" /></div></div>';



           

           html +='<div class="col-lg-12"><label class="col-lg-4">Radiology Investigation</label><div class="col-lg-7"><select type="text" name="radio_invstnew[]" id="radio_invstnew'+divcount+'" class="form-control" ><option value="">Select</option><option value="X Ray">X Ray</option><option value="CT Scans">CT Scans</option><option value="USG">USG</option><option value="MRI">MRI</option><option value="Mammography">Mammography</option><option value="PET Scan">PET Scan</option></select></div></div>';				

html +='<div class="col-lg-12"><label class="col-lg-4">Investigation Started Time</label><div class="col-lg-2"><input type="text" autocomplete="off" name="istnew[]" id="istnew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div><div class="col-lg-2"><input type="time" name="isttnew[]" id="isttnew'+divcount+'" placeholder="hh:mm" class="form-control" /></div></div>';


html +='<div class="col-lg-12"><label class="col-lg-4">Time of report generation</label><div class="col-lg-2">	<input type="text" autocomplete="off" name="dateofreportgenerationnew[]" id="dateofreportgenerationnew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div><div class="col-lg-2"><input type="time" name="timeofreportgenerationnew[]" id="timeofreportgenerationnew'+divcount+'" placeholder="hh:mm" class="form-control" /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">TAT Turn around time</label><div class="col-lg-2"><input type="text" name="TotalTimenew[]" id="TotalTimenew'+divcount+'" class="form-control" readonly /></div></div>';
										
html +='<div class="col-lg-12"><label class="col-lg-4">Investigation Result</label><div class="col-lg-7"><input type="text" autocomplete="off" name="InvestigationResultnew[]" id="InvestigationResultnew'+divcount+'" placeholder="Investigation Result" class="form-control" /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Critical Result If Any</label><div class="col-lg-4"><select type="text" name="CriticalResultnew[]" id="CriticalResultnew'+divcount+'" class="form-control"><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';



html +='<div class="col-lg-12"><label class="col-lg-4">Critical Alert Details</label><div class="col-lg-7"><input type="text" autocomplete="off" name="CriticalAlertnew[]" id="CriticalAlertnew'+divcount+'" placeholder="Critical Alert Details" class="form-control" /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Result Time</label><div class="col-lg-2"><input type="text" autocomplete="off" name="ResultDatenew[]" id="ResultDatenew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div><div class="col-lg-2"><input type="time" name="ResultTimenew[]" id="ResultTimenew'+divcount+'" placeholder="hh:mm" class="form-control" /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Informed Time</label><div class="col-lg-2"><input type="text" autocomplete="off" name="InformedDatenew[]" id="InformedDatenew'+divcount+'" placeholder="yyyy-mm-dd" class="form-control dateDisplay" /></div><div class="col-lg-2">	<input type="time" name="InformedTimenew[]" id="new'+divcount+'" placeholder="hh:mm" class="form-control" /></div></div>';
										
html +='<div class="col-lg-12"><label class="col-lg-4">Informed To</label><div class="col-lg-7"><input type="text" autocomplete="off" name="InformedTonew[]" id="InformedTonew'+divcount+'" placeholder="Informed To" class="form-control" /></div></div>';
										
html +='<div class="col-lg-12"><label class="col-lg-4">Informed By</label><div class="col-lg-7"><input type="text" autocomplete="off" name="InformedBynew[]" id="InformedBynew'+divcount+'" placeholder="Informed By" class="form-control" /></div></div>';
										

html +='<div class="col-lg-12"><label class="col-lg-4">Reporting Error If Any</label><div class="col-lg-2"><select type="text" name="ReportingErrornew[]" id="ReportingErrornew'+divcount+'" class="form-control"><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-6" id="symp"><input type="text" autocomplete="off" name="ReasoneForReportingErrornew[]" id="ReasoneForReportingErrornew'+divcount+'" placeholder="Reasone For Reporting Error" class="form-control" /></div></div>';
	

	html +='<div class="col-lg-12"><label class="col-lg-4">Report Corrective Action</label><div class="col-lg-7"><input type="text" autocomplete="off" name="ReportCorrectiveActionnew[]" id="ReportCorrectiveActionnew'+divcount+'" placeholder="Report Corrective Action" class="form-control" /></div></div>';									
html +='<div class="col-lg-12"><label class="col-lg-4">Redos If Any</label><div class="col-lg-2"><select type="text" name="RedosIfAnynew[]" id="RedosIfAnynew'+divcount+'" class="form-control"><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-lg-6" id="symp"><input type="text" autocomplete="off" name="ReasonForRedosnew[]" id="ReasonForRedosnew'+divcount+'" placeholder="Reason For Redos" class="form-control" /></div></div>';

html +='<div class="col-lg-12"><label class="col-lg-4">Redos Corrective Action</label><div class="col-lg-7"><input type="text" autocomplete="off" name="RedosCorrectiveActionnew[]" id="RedosCorrectiveActionnew'+divcount+'" placeholder="Redos Corrective Action" class="form-control" /></div></div>';
											
html +='<div class="col-lg-12"><label class="col-lg-4">Reports-Corelating With Clinical Diagnosis</label><div class="col-lg-2"><select type="text" name="Reports-Corelatingnew[]" id="Reports-Corelatingnew'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';
										
html +='<div class="col-lg-12"><label class="col-lg-4">Clinical Correlation</label><div class="col-lg-2"><select type="text" name="ClinicalCorrelationnew[]" id="ClinicalCorrelationnew'+divcount+'" class="form-control" ><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';
										
html +='<div class="col-lg-12"><label class="col-lg-4">Name of LAB Personnel</label><div class="col-lg-7"><input type="text" autocomplete="off" name="Remarksnew[]" id="Remarksnew'+divcount+'" placeholder="name of LAB personnel" class="form-control" readonly/></div></div>';


          html +='<div class="col-lg-4"></div><div class="col-lg-2"><button type="button" name="remove" id="'+divcount+'" class="btn btn-danger btn_remove ">Delete</button></div></div>';
          html +='<div class="col-lg-12"></div></div>';
           $('#newDatatoSave').append(html);
            setDatePicker();  
      }); 
     }); 


	$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 

   function  setDatePicker(){
    	$(".dateDisplay").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
    }

	
</script>

<style type="text/css" media="screen">
.modal.custom .modal-dialog {
    max-width: 100%;
}	

</style>

<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title panel panel-primary"> <div class="panel-heading" style="padding:7px;">Radiology Indicator Form Edit </div></h4>  

                           
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_edit">
                      
				<div class="col-lg-12">
											<label class="col-lg-8">Provisional / Final Diagnosis</label>
				</div>
						    <div class="col-lg-12">
											<div class="col-lg-10">
												<input type="text" autocomplete="off" name="t_digEdit" id="t_digEdit" placeholder="Provisional/Final Diagnosis" class="form-control" />
				</div>
			</div>
				 <br/>
			<div class="col-lg-12">
											<label class="col-lg-8">Radiology Investigation</label>
										</div>
						    <div class="col-lg-12">
										
											<div class="col-lg-7">
												<select type="text" name="radio_invstEdit" id="radio_invstEdit" class="form-control" >
													<option value="">Select</option>
													<option value="X Ray">X Ray</option>
													<option value="CT Scans">CT Scans</option>
													<option value="USG">USG</option>
													<option value="MRI">MRI</option>
													<option value="Mammography">Mammography</option>
													<option value="PET Scan">PET Scan</option>
													
												</select>
											</div>
											
							</div>
							<br/>	
					<div class="col-lg-12">
											<label class="col-lg-8">Investigation Started Time</label>
					</div>
					<div class="col-lg-12">

											<div class="col-lg-5">
												<input type="date" autocomplete="off" name="istEdit" id="istEdit" placeholder="yyyy-mm-dd" class="form-control dateDisplay" />
											</div>
											<div class="col-lg-5">
												<input type="time" name="isttEdit" id="isttEdit" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
										<br/>				
					<div class="col-lg-12">
											<label class="col-lg-8">Time of report generation</label>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-5">	
												<input type="date" autocomplete="off" name="dateofreportgenerationEdit" id="dateofreportgenerationEdit" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-5">	
												<input type="time" name="timeofreportgenerationEdit" id="timeofreportgenerationEdit" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
									</br>
					<div class="col-lg-12">
											<label class="col-lg-8">TAT Turn around time</label>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">
												<input type="text" name="TotalTimeEdit" id="TotalTimeEdit" class="form-control" readonly />
											</div>
										</div>
									</br>





										
										<div class="col-lg-12">
											<label class="col-lg-8">Investigation Result</label>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-8">
												<input type="text" autocomplete="off" name="InvestigationResultEdit" id="InvestigationResultEdit" placeholder="Investigation Result" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Critical Result If Any</label>
											</div>
										<div class="col-lg-12">
											<div class="col-lg-4">
												
												<select type="text" name="CriticalResultEdit" id="CriticalResultEdit" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Critical Alert Details</label>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="CriticalAlertEdit" id="CriticalAlertEdit" placeholder="Critical Alert Details" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Result Time</label>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-5">	
												<input type="date" autocomplete="off" name="ResultDateEdit" id="ResultDateEdit" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-5">	
												<input type="time" name="ResultTimeEdit" id="ResultTimeEdit" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Informed Time</label>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-5">	
												<input type="date" autocomplete="off" name="InformedDateEdit" id="InformedDateEdit" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-lg-5">	
												<input type="time" name="InformedTimeEdit" id="InformedTimeEdit" placeholder="hh:mm" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Informed To</label>
								</div>
										<div class="col-lg-12">
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="InformedToEdit" id="InformedToEdit" placeholder="Informed To" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Informed By</label>
									</div>
										<div class="col-lg-12">
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="InformedByEdit" id="InformedByEdit" placeholder="Informed By" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Reporting Error If Any</label>
								</div>
										<div class="col-lg-12">
											<div class="col-lg-4">	
												<select type="text" name="ReportingErrorEdit" id="ReportingErrorEdit" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-8" id="symp">	
												
												<input type="text" autocomplete="off" name="ReasoneForReportingErrorEdit" id="ReasoneForReportingErrorEdit" placeholder="Reasone For Reporting Error" class="form-control" />
											
											</div>
										</div>
											</br>
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Date of Sample sent for culture</label>
											<div class="col-lg-4">	
												<input type="text" autocomplete="off" name="mlc" id="mlc" placeholder="yyyy-mm-dd" class="form-control" >
											</div>
										</div> -->

										<div class="col-lg-12">
											<label class="col-lg-8">Report Corrective Action</label>
									</div>
										<div class="col-lg-12">
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="ReportCorrectiveActionEdit" id="ReportCorrectiveActionEdit" placeholder="Report Corrective Action" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Redos If Any</label>
									</div>
										<div class="col-lg-12">
											<div class="col-lg-4">
												<select type="text" name="RedosIfAnyEdit" id="RedosIfAnyEdit" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-lg-8" id="symp">	
												
												<input type="text" autocomplete="off" name="ReasonForRedosEdit" id="ReasonForRedosEdit" placeholder="Reason For Redos" class="form-control" />
											
											</div>		
										</div>	
											</br>
											<div class="col-lg-12">
											<label class="col-lg-8">Redos Corrective Action</label>
									</div>
										<div class="col-lg-12">
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="RedosCorrectiveActionEdit" id="RedosCorrectiveActionEdit" placeholder="Redos Corrective Action" class="form-control" />
											</div>
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Reports-Corelating With Clinical Diagnosis</label>
									</div>
										<div class="col-lg-12">
											<div class="col-lg-4">
												<select type="text" name="Reports-CorelatingEdit" id="Reports-CorelatingEdit" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>	
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Clinical Correlation</label>
									</div>
										<div class="col-lg-12">
											<div class="col-lg-4">
												<select type="text" name="ClinicalCorrelationEdit" id="ClinicalCorrelationEdit" class="form-control" >
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
													
										</div>
											</br>
										<div class="col-lg-12">
											<label class="col-lg-8">Name of LAB Personnel</label>
									</div>
										<div class="col-lg-12">
											<div class="col-lg-12">
												<input type="text" autocomplete="off" name="RemarksEdit" id="RemarksEdit" placeholder="name of LAB personnel" class="form-control" readonly/>
											</div>
										</div>	
									</br>
                

                    <input type="hidden" name="user_idEdit" id="user_idEdit" />
                     <input type="hidden" name="radio_opd_extra_id" id="radio_opd_extra_id" />
                      <input type="hidden" name="actionEdit" id="actionEdit" value="update" />  
                          <input type="submit" name="insert" id="insertEdit" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

 

 <script type="text/javascript">

 	
 	$(document).on('click', '.edit_data', function(){ 

            var radio_opd_extra_id = $(this).attr("id");
            var action = "view"; 
           
            
           $.ajax({  
                url:"fetch_single_radio_opd_form_edit.php",  
                method:"POST",  
                data:{radio_opd_extra_id:radio_opd_extra_id,action:action},  
                dataType:"json",  
                success:function(data){ 
             
                     $('#t_digEdit').val(data.prov_finl_daigEdit);
					
					
            $('#radio_invstEdit').val(data.radio_invstEdit);
					$('#istEdit').val(data.d_sample_rec_timeEdit);
					$('#isttEdit').val(data.t_sample_rec_timeEdit);
	                $('#dateofreportgenerationEdit').val(data.d_time_date_of_rep_genEdit);
					$('#timeofreportgenerationEdit').val(data.t_time_date_of_rep_genEdit);
                    $('#ResultDateEdit').val(data.d_result_timeEdit);
					$('#ResultTimeEdit').val(data.t_result_timeEdit);
					$('#InformedDateEdit').val(data.d_info_timeEdit);
					$('#InformedTimeEdit').val(data.t_info_timeEdit);
					$('#TotalTimeEdit').val(data.total_timeEdit);
					$('#InvestigationResultEdit').val(data.inv_resultEdit);
					$('#CriticalResultEdit').val(data.cri_res_if_anyEdit);
					$('#CriticalAlertEdit').val(data.cri_alrt_detailsEdit);
					$('#InformedToEdit').val(data.info_toEdit);
					$('#InformedByEdit').val(data.info_byEdit);
					$('#ReasoneForReportingErrorEdit').val(data.res_err_rsnEdit);
					$('#ReasonForRedosEdit').val(data.redos_rsnEdit);
					$('#RemarksEdit').val(data.remarksEdit);
					$('#ReportingErrorEdit').val(data.resp_errEdit);
					
					
					$('#ReportCorrectiveActionEdit').val(data.correct_actn_reportEdit);
					$('#RedosCorrectiveActionEdit').val(data.correct_actn_redosEdit);
					$('#lab_ipd_id_orEdit').val(data.lab_ipd_idEdit);
					$('#RedosIfAnyEdit').val(data.redosEdit);
					$('#Reports-CorelatingEdit').val(data.rep_cor_clin_diagEdit);
					$('#ClinicalCorrelationEdit').val(data.clinical_correlationEdit);


 


					$('#radio_opd_extra_id').val(data.radio_opd_extra_id); 

                     $('#user_idEdit').val(data.tbl_radio_opd_id); 
 

                     $('#insertEdit').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           }); 
            $('#add_data_Modal').modal('show');
              
      }); 


 	$('#insert_form_edit').on("submit", function(event){  
           event.preventDefault();  
           var action = "update";
                $.ajax({  
                     url:"fetch_single_radio_opd_form_edit.php",  
                     method:"POST",  
                     data:$('#insert_form_edit').serialize(),  
                     beforeSend:function(){  
                          $('#insertEdit').val("Inserting");  
                     },  
                     success:function(data){ 
                          alert(data); 
                           location.reload();
                          $('#insert_form_edit')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                           
                         
                     }  
                });  
            
      });  
 </script>
