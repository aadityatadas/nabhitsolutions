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

 $to = date('Y-m-t');

 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="../data_multiselect/jquery.multiselect.css" type="text/css">
        <script type="text/javascript" src="../data_multiselect/jquery.multiselect.js"></script>
<!-- <script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('huf_count.php').fadeIn("slow");
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
#bxAudit,
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
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                            Death Audit 
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Select Patient</b></button>
                        </div>

                      <!--   audit select start -->
                         <div class="box" id="bxAudit" style="Overflow: visible;">
							<div class="panel-body">
						<form method="post" id="audit_form1" enctype="multipart/form-data">
								<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-9" style="padding-left:0;">
							<label class="col-lg-3">From</label>
							<div class="col-lg-3">
								<input type="text" name="frdate1" id="frdate1" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-3">To</label>
							<div class="col-lg-3">
								<input type="text" name="todate1" id="todate1" value="<?php echo $todt;?>" class="form-control" />
							</div>
							
						</div>
					</div>
				</div>
					<div class="col-lg-12">
						<div class="col-lg-9" style="padding-left:0;">
							<label class="col-lg-3">Sample Size</label>
							<div class="col-lg-4">
								<input type="text" name="s_size" id="s_size" value="0" class="form-control" placeholder="Enter the sample size" />
							</div>
										<div class="col-lg-1"></div>
							<div class="col-lg-2">
								
								<input type="hidden" name="auditsearch" id="auditsearch"  class="form-control" value="true"  />

								<button style="color: white;" accesskey="s" type="submit" name="actionAudit" id="actionAudit" class="btn btn-primary  btn-sm" />SEARCH </button>
							</div>
							
						</div>
					</div>
					</form>
					<br />
					<div class="col-lg-12" style="padding-top: 30px;padding-bottom: 15px;">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  Select Patient</label>

						</div>

					<br />	
					<form method="post" id="audit_form2" enctype="multipart/form-data">
								<div class="form-group">
				     <div class="col-lg-12" >
                        <div class="col-lg-9" style="padding-left:0;">
                            <label class="col-lg-3">Patient List</label>

                                <div class="col-lg-8">
                              <select id="user_data" multiple="multiple" name="PatientList[]"  class="form-control">
                              <option >--select patients--</option>
										
                             
                       </select>
                       </div>
                       </div>
                    </div> 
                </div>


                    <div class="col-lg-12" style="padding-top: 10px">
									<div class="col-lg-6">	
												
												<input type="hidden" name="operation1" id="operation1" />
												<button style="color: white;"  type="submit" name="actionP" id="actionP" class="btn btn-primary pull-right" />Add Patients ( Alt + s )</button>
									</div>
									<div class="col-lg-6">	
												<button type="button" class="btn btn-default pull-left" id="close_btnAudit">Close</button>
									</div>
					</div>
					<div class="col-lg-12">
											<hr />
										</div>


						
					</form>

                    </div> 	
				</div>
			
			<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->



		

							  <!--   audit select end -->
						
						<div class="box" id="bx1">
							<div id="adm">
								<br />
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<label class="col-lg-4">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" readonly />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Name of the Patient</label>
											<div class="col-lg-7">
												<input type="text" list="plist" name="p_name" id="p_name" class="form-control"  readonly="" />
												<datalist id="plist"  >
												
												</datalist>
											</div>
										</div>
										
										<div class="col-lg-12">
											<label class="col-lg-4">IPD No</label>
											<div class="col-lg-4">
												<input type="text" name="ipd_no" id="ipd_no" class="form-control"  readonly=""/>
											</div>
										</div>
										
										<div class="col-lg-12">
											<label class="col-lg-4">Date Of Admission</label>
											<div class="col-lg-3">	
												<input type="text" autocomplete="off" name="huf_dadm" id="huf_dadm" placeholder="yyyy-mm-dd" class="form-control"  readonly=""/>
											</div>
										</div>

										<div class="col-lg-12">
											<label class="col-lg-4">Date of Dischage/DAMA/Death (D2)</label>
											<div class="col-lg-3">	
												<input type="text" autocomplete="off" name="dddd" id="dddd"  class="form-control"  readonly=""/>
											</div>
											<div class="col-lg-3">	
												<input type="time" autocomplete="off" name="tddd" id="tddd" placeholder="hh:mm" class="form-control" readonly=""/>
											</div>
										</div>

								<div class="col-lg-12">
											<label class="col-lg-4">Type of Dischage</label>
											<div class="col-lg-4">
												<input type="text" name="ddd" id="ddd" class="form-control" readonly="">
												
											</div>
										</div>

										
										
										

										<div class="col-lg-12">
											<hr />
										</div>
										
										

										<div class="col-lg-12" >
											<label class="col-lg-4">Condition at the time of admission</label>
											<div class="col-lg-4">
												<select type="text" name="condition_at_admsion" id="condition_at_admsion" class="form-control" >
													<option value="">Select</option>
													<option value="Critical ">Critical </option>
													<option value="Non Critical">Non Critical </option>
													<option value="End of life care">End of life care </option>
													
												</select>
											</div>
										</div>
	

			<div class="col-lg-12">
											<label class="col-lg-4">Primary diagnosis</label>
											<div class="col-lg-8">		
												
												<textarea name="primary_diagn" id="primary_diagn" placeholder="Primary diagnosis" class="form-control" cols="50"> </textarea>
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Cause of death</label>
											<div class="col-lg-8">		
												

												<textarea name="cause_of_death" id="cause_of_death" placeholder="Cause of Death" class="form-control" cols="50"> </textarea>
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Date & time of death </label>
											<div class="col-lg-8">		
												<div class="col-lg-3">	
												<input type="text" autocomplete="off" name="date_death" id="date_death" placeholder="yyyy-mm-dd" class="form-control" readonly=""/>
											</div>
												<div class="col-lg-3">	
												<input type="time" autocomplete="off" name="time_death" id="time_death" placeholder="hh:mm" readonly="" class="form-control" />
											</div>
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Expected /Unexpected death</label>
											<div class="col-lg-8">		
											

												<select type="text" name="expected_un_death" id="expected_un_death" class="form-control" >
													<option value="">Select</option>
													<option value="Expected ">Expected </option>
													<option value="Unexpected death">Unexpected death </option>
													
													
												</select>
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Apache II score</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="apache_score" id="apache_score" placeholder="Apache II score" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Sofa score on 3rd day</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="sofa_score" id="sofa_score" placeholder="Sofa score on 3rd day" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Ventilation status</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="vent_status" id="vent_status" placeholder="Ventilation status" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Surgery/procedure</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="surg_prodr" id="surg_prodr" placeholder="Surgery/procedure" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Any Events</label>
											<div class="col-lg-8">		
												

												<textarea name="any_event" id="any_event" placeholder="Any Events" class="form-control" cols="50"> </textarea>
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Consultant Incharge</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="cons_incharge" id="cons_incharge" placeholder="Consultant Incharge" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Other consultant involve</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="other_con_involve" id="other_con_involve" placeholder="Other consultant involve" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Comorbid conditions</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="comorbid_condtin" id="comorbid_condtin" placeholder="Comorbid conditions" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Relavant lab investigtions</label>
											<div class="col-lg-8">		
												

												<textarea name="relavant_lab_invt" id="relavant_lab_invt" placeholder="Relavant lab investigtions" class="form-control" cols="50"> </textarea>
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Relavant Radiology investigtions</label>
											<div class="col-lg-8">		
												<textarea name="relavant_radio_invt" id="relavant_radio_invt" placeholder="Relavant Radiology investigtions" class="form-control" cols="50"> </textarea>
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">CPR status</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="cpr_status" id="cpr_status" placeholder="CPR status" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Condition of patient during stay/ Relavant medical management</label>
											<div class="col-lg-8">		
												

												<textarea name="condition_of_stay_mangnmt" id="condition_of_stay_mangnmt" placeholder="Condition of patient during stay/ Relavant medical management" class="form-control" cols="50"> </textarea>
											</div>
										</div>
	
	



<div class="col-lg-12" style="padding-top: 30px;padding-bottom: 15px;">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  Factors</label>

						</div>

					<br />

	

	

	<div class="col-lg-12">
											<label class="col-lg-4">Team work </label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="team_work" id="team_work" placeholder="Team work " class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Techniques and management of care</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="technq_mang_care" id="technq_mang_care" placeholder="Techniques and management of care" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Medication error</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="med_error" id="med_error" placeholder="Medication error" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Decision making</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="decisn_making" id="decisn_making" placeholder="Decision making" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Staffing error/Skill and competency</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="staff_skill_comp" id="staff_skill_comp" placeholder="Staffing error/Skill and competency" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Communication error</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="comm_error" id="comm_error" placeholder="Communication error" class="form-control" />
											</div>
										</div>
	

	<div class="col-lg-12">
											<label class="col-lg-4">Economical factors of the patient </label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="eco_fact_patient" id="eco_fact_patient" placeholder="Economical factors of the patient " class="form-control" />
											</div>
										</div>
	
	
	
	
										
										
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button style="color: white;" accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit ( Alt + s )</button>
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
												<th>Name of the Patient</th>
												<!-- <th>AGE</th> -->
												<th>IPD No</th>
												
												
												<th>DATE OF DISCHARGE</th>
											
												
												<th>TYPE OF DISCHARGE</th>
											
												<th>Condition at the time of admission </th>
							<th>Primary diagnosis</th>
							<th>Cause of death</th>
							
							<th>DATE OF DISCHARGE</th>
							<th>Expected /Unexpected death</th>
							<th>Apache II score</th>
							<th>Sofa score on 3rd day</th>
							<th>Ventilation status</th>
							<th>Surgery/procedure</th>
							<th>Any Events</th>
							<th>Consultant Incharge</th>
							<th>Other consultant involve</th>
							<th>Comorbid conditions</th>
							<th>Relavant lab investigtions</th>
							<th>Relavant Radiology investigtions</th>
							<th>CPR status</th>
							<th>Condition of patient during stay/ Relavant medical management</th>
							
							<th>Team work </th>
							<th>Techniques and management of care</th>
							<th>Medication error</th>
							<th>Decision making</th>
							<th>Staffing error/Skill and competency</th>
							<th>Communication error</th>
							<th>Economical factors of the patient </th>


												
												<th>Recorded By</th>
												<th>Updated By</th>
												<th>Recorded On</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>


							<div class="col-lg-12" style="display: none">
								
								<div class="panel panel-default">
									
							<form method="post" action="../excel/HOS/export.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-4">	
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
								<div class="col-lg-2">
										<input type="text" name="frdt" id="frdt" value="<?php echo $frdt;?>" placeholder="From date" class="form-control" />


								</div> 
								<div class="col-lg-2">
									<input type="text" name="todt" id="todt" value="<?php echo $todt;?>" placeholder="To date" class="form-control" />
								</div>
										<input type="submit" name="export" class="btn btn-danger" value="Excel" />
									</div>
								</form>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<div id="hosp">
											
										</div>
									</div>
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>
				
				
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->  
    </div>
    </section>  
</body>
</html>


<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#d_adm").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#dddd").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#date_death").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});			

		
		$(function(){  
			$("#d_adm").datepicker();
			$("#dddd").datepicker();
			//$("#t_adm").timepicker();
			//$("#tddd").timepicker();
		});		
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#bx2").fadeIn(300);
				$("#order-table").fadeIn(300);
			});
		});
		$('#add_btn').click(function(){
			$('#audit_form1')[0].reset();
			$('#bxAudit').show('fast');
			
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			
			
			
		});
		
		$('#close_btnAudit').click(function(){
			$('#audit_form1')[0].reset();
			
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bxAudit').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		$('#close_btn').click(function(){
			$('#audit_form1')[0].reset();
			$('#audit_form2')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"death_audit_d/fetch_death_audit.php",
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
						url:"death_audit_d/insert_death_audit_form.php",
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
							//$('#myModal').modal('hide');
							dataTable.ajax.reload();
						}
					});
				}
			
		});
		$(document).on('submit', '#audit_form2', function(event){
		event.preventDefault();
	// $("#audit_form2").submit(function(event){
			var count = ($('#user_data').val().length);
			
			if(count > 0)
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					
					$.ajax({
						url:"death_audit_d/insert_patinet.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							
							$('#audit_form1')[0].reset();
			                $('#audit_form2')[0].reset();
							 $('#adm').hide('fast');
							 $('#bx1').hide('fast');
							 $('#bxAudit').hide('fast');
							 $('#bx2').show('fast');
							// $('#add_btn').show('fast');
							// //$('#myModal').modal('hide');
							
									
							dataTable.ajax.reload();
   					
             		
					}
					
				});
					 
				}
			} else{
				alert('Please Select  Patient');
				$('#user_data').focus();
			}
			
			
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"death_audit_d/fetch_patient_death_audit.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#cb').show();
					$('#p_name').focus();
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					
					$('#ipd_no').val(data.ipd_no);
					
					
					
						
					var dataA=data.da;
					for(var k in dataA) {
  				 

  				

  				 $('#'+k).val(dataA[k]);
				}
					
					$('#ddd').val(data.ddd);
					$('#tddd').val(data.tddd);
					$('#date_death').val(data.dddd);
					$('#time_death').val(data.tddd);
					$('#huf_dadm').val(data.huf_dadm);
					
					$('#dddd').val(data.dddd);
				
					
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
					url:"death_audit_d/delete_death_form.php",
					method:"POST",
					data:{user_id:user_id ,tbl:'tbl_death_audit'},
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
		$('.price').keyup(function (){
			var tot = 0;
			$('.price').each(function(){
				tot += Number($(this).val());
			});
			$('#mod26').val(tot);			
		});
		$('.price2').keyup(function (){
			var sp = 0;
			$('.price2').each(function(){
				sp += Number($(this).val());
			});
			$('#mod14').val(sp);			
		});
	});
	function NumAndTwoDecimals(e, field) {  
        var val = field.value;  
        var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;  
        var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;  
        if (re.test(val)) {  

        }  
        else {  
			val = re1.exec(val);  
			if (val) {  
			field.value = val[0];  
			}  
			else {  
			field.value = "";  
			}  
        }  
    }

    $('#user_data').multiselect({
    columns: 1,
    placeholder: 'Select Languages',
    search: true,
    selectAll: true
});
	
		$(document).on('submit', '#audit_form1', function(event){
			event.preventDefault();
	
	
			
		


				var s_size = $('#s_size').val();
				
				if(s_size != '' && s_size!=0)
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					
					$.ajax({
						url:"death_audit_d/search_patinet.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(html)
						{
							console.log(html);
							// $('#user_form')[0].reset();
							// $('#adm').hide('fast');
							// $('#bx1').hide('fast');
							// $('#bx2').show('fast');
							// $('#add_btn').show('fast');
							// //$('#myModal').modal('hide');
							// dataTable.ajax.reload();


   					 $("#user_data").find('option').remove();	
             		$.each(html, function (key, value) {
                        	

                            $('<option>').val(value.huf_id).text(value.huf_pname).appendTo($("#user_data"));

                        });
            				$("#user_data").multiselect('reset');
           
						}
					});
					
				}

			} else{
				alert('Please enter sample size');
				$('#s_size').focus();
			}

			
		});



	
	function reloadpage(){
		
		dataTable.ajax.reload();
	}

</script>
<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
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
		$("#frdate1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
		$("#todate1").datepicker({
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
			$("#frdate").datepicker();
			$("#todate").datepicker();
			$("#frdate1").datepicker();
			$("#todate1").datepicker();
			$("#frdt").datepicker();
			$("#todt").datepicker();



		});
	});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#d_adm').mask('9999-99-99');// for Birth Date
		$('#dddd').mask('9999-99-99');// for Joining Date
		//$('#t_adm').mask('99:99');// for Birth Date
		//$('#tddd').mask('99:99');// for Joining Date
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
				// chart one
				var jsonData = $.ajax({
				url: 'hosp_utilization_chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Hospital Utilization-1',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.5,
							is3D: true,
							backgroundColor: 'transparent',
							'chartArea': {
    						'backgroundColor': {
        					'fill': '#F4F4F4',
        					'opacity': 100
    						 },
 					}
       
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart1'));
						chart.draw(data, options);
						
					}	
				}).responseText;					
				// chart two
				var jsonData = $.ajax({
				url: 'hosp_utilization_chart2.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Hospital Utilization-2',
							legend: '',
							hAxis: { minValue: 0, maxValue: 10 },
							//curveType: 'function',
							pointSize: 7,
							dataOpacity: 0.5,
							is3D: true,
							backgroundColor: 'transparent',
							'chartArea': {
    						'backgroundColor': {
        					'fill': '#F4F4F4',
        					'opacity': 100
    						 },
 					}
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart2'));
						chart.draw(data, options);
						
					}	
				}).responseText;				
			}	
		}	
</script>
<script type="text/javascript">
	


  



</script>

