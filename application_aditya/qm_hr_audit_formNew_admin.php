<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	
	include('dbinfo.php');

	$dat = date('Y-m-d');
	$query1 = "SELECT * FROM tbl_hr_audit where audit_date = '$dat'";

	
	$statement1 = $connection->prepare($query1);
	$statement1->execute();
	$filtered_rows1 = $statement1->rowCount();
	 
	$query12 = "SELECT DISTINCT hr_dept FROM tbl_hr_mast";

	
	$statement12 = $connection->prepare($query12);
	$statement12->execute();
	$result12 = $statement12->fetchAll(PDO::FETCH_ASSOC);

	
	
	
  
	$dt = date('d/m/Y');


	$tm = date('h:i:s a');
	$yr = date('Y');
	
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	$dArry[2] = array(0=>'Employment Application Form ',1=>'emp_app_form');
$dArry[3] = array(0=>'Interview Assessment Sheet',1=>'interview_ass_sheet');
$dArry[4] = array(0=>'Resume/ BioData/Curriculum Vitae',1=>'resume_bio_cv');
$dArry[5] = array(0=>'Pre-EmploymentHealthCheckUp',1=>'pre_emp_chkup');
$dArry[6] = array(0=>'Identity Proof Document',1=>'indetify_proof_documnt');
$dArry[7] = array(0=>'Offer Letter',1=>'offer_letter');
$dArry[8] = array(0=>'Appointment Letter',1=>'appoint_letter');
$dArry[9] = array(0=>'Copy of Professional Qualifications & Training Certificates',1=>'cpy_of_prof');
$dArry[10] = array(0=>'Experience /Relieving/Service/Salary Certificates if applicable',1=>'exp_reliving_serv_sal_cert');
$dArry[11] = array(0=>'Job Descriptions & Job Specifications',1=>'job_disc_job_spec');
$dArry[12] = array(0=>'Credentialing Report',1=>'cread_report');
$dArry[13] = array(0=>'Privileging Report',1=>'priv_report');
$dArry[14] = array(0=>'Training Records',1=>'traning_record');
$dArry[15] = array(0=>'Vaccination Records',1=>'vaccination_record');
$dArry[16] = array(0=>'AnnualHealth Checkup',1=>'annual_checkup');
$dArry[17] = array(0=>'Performance Appraisal',1=>'perf_appraisal');
$dArry[18] = array(0=>'Disciplinary/Counseling Reports',1=>'dis_coun');
$dArry[19] = array(0=>'Background Verification Form(Self declaration)',1=>'bacground_ver');
$dArry[20] = array(0=>'Exit Interview',1=>'exit_interview');
$dArry[21] = array(0=>'Other Records',1=>'other_record');






/*print_r($dArry);
die();
foreach ($dArry as $key => $value) {
	
}
*/

?>
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
.mainAudit,
#bxAudit,
#bx1,
#bx2,
#adm,
#order-table{
	display:none;
}
.form-control{
	margin-bottom:10px;
}
.label-heading {
    font-size: larger;
    font-family: monospace;
}
.multiselect-container 
   {
    font-size: larger!important;
   }

   .dep {
    width: 300px!important;
   }
   .btn-group {
     width: 300px!important;
   }
</style>


 <link rel="stylesheet" href="hr_audit_d/multiselect_js_css/bootstrap-multiselect.css" type="text/css">
  <script type="text/javascript" src="hr_audit_d/multiselect_js_css/bootstrap-multiselect.js"></script>
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
<script>
function myFunction() {
  window.print();
}

 
function goBack() {
  window.history.back();
}
 
</script>
<?php include_once('high_chart_js.php'); ?>
<body>
<?php include"QM-nav-bar.php";?>
<section class="content home" >
	<div class="container-fluid">
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
                        <div class="panel-heading" style="padding:7px;height: 140px;">
                             HR Audit 	
                               <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px; " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
							
							<?php if ($filtered_rows1 == 0) { ?>
                            	<button accesskey="n" type="button" name="add_btn" id="add_btn1" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New Record</b></button>
                            	
                            <?php } ?>

                              <div>
		                    	 <table class="custom-table"  cellspacing="10" cellpadding="10" border="1" width="650px" align="center" style="border-color: #9DA2E2; text-align: center;" >
		                            		<tr style="background-color: #9DA2E2;">
		                            			<td style="font-weight: bold;color: white;">Total</td>
		                            			<td style="font-weight: bold;color: white;">Completed</td>
		                            			<td style="font-weight: bold;color: white;">Not-Completed</td>

		                            			
		                            		
		                            		</tr>
		                            		<tr style="background-color: white;">
		                            			<?php
													include('dbinfo.php');

													$tot= "SELECT COUNT(*) as total FROM tbl_hr_audit WHERE year(audit_date) = '$yr'";
														$totres = mysqli_query($connect, $tot);
														$totrow=mysqli_fetch_assoc($totres);
														// echo $totrow['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrycomp = "SELECT COUNT(*) as comp FROM tbl_hr_audit WHERE name_sign!='' AND year(audit_date) = '$yr' ";
																$rescomp = mysqli_query($connect, $qrycomp);
																$rowcomp=mysqli_fetch_assoc($rescomp);
																// echo $rowcomp['comp'];
																											

														$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_hr_audit WHERE name_sign=''   AND year(audit_date) = '$yr' ";
																	$resnotcomp= mysqli_query($connect, $qrynotcomp);
																	$rownotcomp=mysqli_fetch_assoc($resnotcomp);
																	// echo $rownotcomp['notcomp'];
																	// echo "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ')";
																	// die();

													   

													?>


		                            			<td style="font-weight: bold;color: black;" ><?php echo $totrow['total'];?></td>
		                            			<td style="font-weight: bold;color: green;"><?php echo $rowcomp['comp'];?></td>
		                            			<td style="font-weight: bold;color: red;"><?php echo $rownotcomp['notcomp'];?></td>
		                            			
		                            		</tr>
		                            		
		                            	</table>
		                            </div>
                        </div>

                         <div class="box" id="bxAudit" style="Overflow: visible;">
							<div class="panel-body">
						<form method="post" id="audit_form1" enctype="multipart/form-data">
								<div class="form-group">
											<div class="col-lg-12">
											<label class="col-lg-4">Select  Data </label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="hrdt" id="hrdt" placeholder="yyyy-mm-dd" class="form-control" required />
											</div>
											
								         </div>

							</div>

							<div class="col-lg-12">
											<label class="col-lg-4">Department</label>
											<div class="col-lg-8">
												 <select id="user_id" class="form-control dep" name="user_id[]" onchange="getUser(this.value)" multiple >

				<?php 		foreach ($result12 as $key => $value) { ?>
	
			        <option value="<?=$value['hr_dept']?>"><?=ucfirst($value['hr_dept'])?></option>

	               <?php  } ?>
                 </select>
			        </div>
			</div>

									<div class="col-lg-12">
											<hr />
										</div>

							<div class="col-lg-12">
								<div id="userSelect"></div>

							</div>
									<div class="col-lg-12">
											<hr />
										</div>
							<div class="col-lg-12" style="padding-top: 10px">
									<div class="col-lg-6">	
												
												<input type="hidden" name="operation1" id="operation1" />
												<button  type="submit" name="actionP" id="actionP" class="btn btn-primary pull-right" >    Add Employee ( Alt + s )</button>
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
											<label class="col-lg-4">Name of the Employee</label>
											<div class="col-lg-7">
												<input type="text" list="plist" name="hr_staff" id="hr_staff" class="form-control"  readonly="" />
												<datalist id="plist"  >
												
												</datalist>
											</div>
										</div>
										
										<div class="col-lg-12">
											<label class="col-lg-4">EMP NO.</label>
											<div class="col-lg-4">
												<input type="text" name="hr_empcode" id="hr_empcode" class="form-control"  readonly=""/>
											</div>
										</div>
										
										
										

										
									<div class="col-lg-12">
											<label class="col-lg-4">Audit Date</label>
											<div class="col-lg-3">
												<input type="text" autocomplete="off" name="audit_date" id="audit_date" placeholder="yyyy-mm-dd" class="form-control"  readonly="" />
											</div>
										</div>

										<div class="col-lg-12">
											<hr></div>
								<div class="col-lg-12">
									<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Hr Audit  </label>

									<div class="col-lg-12" style="padding-top: 30px;padding-bottom: 15px;">
										<div class="col-lg-3"></div>
											<label class="col-md-6" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;">  Departement :&nbsp;<input type="text" name="emp_department" id="emp_department" readonly=""></label>
											<div class="col-lg-3"></div>

						</div>
									<div class="col-lg-12">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Sr.no</th>
													<th>Factors</th>
													<th width="40%"></th>
												</tr>

											</thead>
													
								<tbody>

									<?php $c=0 ; foreach($dArry as $key => $value){ ?>

									
		<tr>
		<td><?php echo ($key-1); (++$c);?></td>
        <td><?=$value[0]?> </td>
        <td>
        	<label class="radio-inline">
					<input type="radio" name="<?=$value[1]?>"  value="P" checked>P
			</label>
			&nbsp;&nbsp;
			<label class="radio-inline">
					<input type="radio" name="<?=$value[1]?>"  value="N" >N
			</label>
			&nbsp;&nbsp;
			<label class="radio-inline">
					<input type="radio" name="<?=$value[1]?>"  value="NA" >NA
			</label>
        </td>
		

			
      
    </tr>

							  <?php } ?>
	                                   
                  
															
													
						
						
					</tbody>
												</table>
											</div>



											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										
											
											
										<div class="col-lg-12">
											<!-- <label class="col-lg-3">Name</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="name" id="name" 
												 placeholder="Name" class="form-control" />
											</div> -->
											<label class="col-lg-3">Done By</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="name_sign" id="name_sign" 
												 placeholder="Done By" class="form-control" readonly="" />
												 <input type="hidden" name="tbl" value="tbl_hr_audit">
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id1" id="user_id1" />

												<input type="hidden" name="tbl_hr_audit_date_id" id="tbl_hr_audit_date_id" />


												
												<input type="hidden" name="operation" id="operation" />
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
								<div id="order-table" class="table-responsive main">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:darkblue;">
											<tr>
												<th>Action</th>
												<th>Sr.No.</th>
												<th>Date</th>
												
												
												
												<th>Count of Emp</th>

												<th>Done By</th>	
												
												
												
											</tr>
										</thead>
									</table>
								</div>
							
  <input type="hidden" name="auidt_date_table_id" value="2" id="auidt_date_table_id">
						
								<div id="order-table" class="table-responsive mainAudit">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-exampleAudit">
										<thead style="font-size:12px;color:darkblue;">
											<tr>
												<th>Action</th>
												<th>Sr.No.</th>
												<th>Date</th>
												
												
												
												<th>Name</th>	
												<th>Employment Code</th>
												<th>Employment Department</th>
												<th>Employment Application Form </th>
												<th>Interview Assessment Sheet</th>
												<th>Resume/ BioData/Curriculum Vitae</th>
												<th>Pre-EmploymentHealthCheckUp</th>
												<th>Identity Proof Document</th>
												<th>Offer Letter</th>
												<th>Appointment Letter</th>
												<th>Copy of Professional Qualifications & Training Certificates</th>
												<th>Experience /Relieving/Service/Salary Certificates if applicable</th>
												<th>Job Descriptions & Job Specifications</th>
												<th>Credentialing Report</th>
												<th>Privileging Report</th>
												<th>Training Records</th>
												<th>Vaccination Records</th>
												<th>AnnualHealth Checkup</th>
												<th>Performance Appraisal</th>
												<th>Disciplinary/Counseling Reports</th>
												<th>Background Verification Form(Self declaration)</th>
												<th>Exit Interview</th>
												<th>Other Records</th>

												<th>Done By</th>	
												
												
												
											</tr>
										</thead>
									</table>

									<div class="col-lg-6">	
												<button type="button" class="btn btn-default pull-left" id="close_btnA">Close</button>
											</div>
								
							</div>

							</div>
							<div class="col-lg-12" >
								
						<div class="panel panel-default">

							<form method="post" action="../audit_file/hr_audit/excel.php" class="panel-heading">
									<div class="panel-heading">
									<div class="col-lg-2" style="color: black;">	
										Audit Details
									</div>
								<div class="col-lg-2">
												<input type="text" autocomplete="off" name="hrdtD" id="hrdtD" placeholder="yyyy-mm-dd" class="form-control" required />
									</div>
									<div class="col-lg-4">
										

                        <div class="alert alert-danger alert-dismissible dateerror" role="alert" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            No data found on this date
                        </div>
												<input type="hidden" name="hrmonD" id="hrmonD" class="form-control" readonly />
												<input type="hidden" name="a_id" id="a_id" class="form-control" readonly />
												<input type="hidden" name="auditSelectedMonthD" id="auditSelectedMonthD" class="form-control" readonly />
												<input type="hidden" name="auditSelectedYearD" id="auditSelectedYearD" class="form-control" readonly />
								</div>
								<script type="text/javascript">
									$("#hrdtD").datepicker({
											showOtherMonths: true,
											selectOtherMonths: true,
											changeMonth: true,
											changeYear: true,
									});	
									$('#hrdtD').change(function(){  
								var testn = $(this).val(); 			
								$.ajax({  
									url:"hr_audit_d/load_hraudit_detail.php",  
									method:"POST",  
									data:{testn:testn , tbl:'tbl_hr_audit'},
									dataType:"json",				
									success:function(data)
									{  
										 console.log(data);

										 if(data.sample_size==0){
										 	
										 	$('.dateerror').show();
										 
										 	$(".excel1").attr("disabled", true);
										 	return false;
										 }else{
										 	$(".excel1").attr("disabled", false);
										 	$('.dateerror').hide();
										 }
										$('#hrmonD').val(data.hrmon);
										$('#auditSelectedMonthD').val(data.auditSelectedMonth);
										$('#auditSelectedYearD').val(data.auditSelectedYear);
										$('#a_id').val(data.id);



									}  
								});  
							});

									function feth_dep(deps_id){
										alert(deps_id);

									}
								</script>
										<input type="submit" style="color: white;"  name="export" class="btn btn-danger excel1" value="Excel" />
									</div>
								</form>



								

									
							
									
								</div>
								<!-- /.panel -->
							</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<div class="col-lg-3" style="color: black;">	
										Audit Details(charts)
									</div>
							

							<div class="col-lg-3">
								<input type="text" autocomplete="off" name="hrdtD1" id="hrdtD1" placeholder="yyyy-mm-dd" class="form-control" required />
							</div>
							<input type="hidden" name="hrmonD1" id="hrmonD1" class="form-control" readonly />
												<input type="hidden" name="a_id1" id="a_id1" class="form-control" readonly />
												<input type="hidden" name="auditSelectedMonthD1" id="auditSelectedMonthD1" class="form-control" readonly />
												<input type="hidden" name="auditSelectedYearD1" id="auditSelectedYearD1" class="form-control" readonly />
												<input type="hidden" name="departments" id="departments" class="form-control" readonly />
							<div class="col-lg-4">
								 <div class="alert alert-danger alert-dismissible dateerror2" role="alert" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            No data found on this date
                        </div>
							</div>

							<script type="text/javascript">
									$("#hrdtD1").datepicker({
											showOtherMonths: true,
											selectOtherMonths: true,
											changeMonth: true,
											changeYear: true,
									});	
									$('#hrdtD1').change(function(){  
								var testn = $(this).val(); 			
								$.ajax({  
									url:"hr_audit_d/load_hraudit_detail.php",  
									method:"POST",  
									data:{testn:testn , tbl:'tbl_hr_audit'},
									dataType:"json",				
									success:function(data)
									{  
										

										 if(data.sample_size==0){
										 	
										 	$('.dateerror2').show();
										 
										 	$(".searchgraph").attr("disabled", true);
										 	return false;
										 }else{
										 	$(".searchgraph").attr("disabled", false);
										 	$('.dateerror2').hide();
										 }
										$('#hrmonD1').val(data.hrmon);
										$('#auditSelectedMonthD1').val(data.auditSelectedMonth);
										$('#auditSelectedYearD1').val(data.auditSelectedYear);
										$('#a_id1').val(data.id);

										
									var deps=data.id
								

									feth_dep(deps);	

										

									}  
								});  
							});
									function feth_dep(deps_id){
											$.ajax({  
									url:"hr_audit_d/fetch_dep.php",  
									method:"POST",  
									data:{deps_id:deps_id, tbl:'tbl_hr_audit'},
									dataType:"json",				
									success:function(data)
									{  

									var x = data.toString();
                                    document.getElementById("departments").value = x;
								   }

								});

									}
								</script>
							
							
								
							
							<div class="col-lg-2">
								<button type="button" name="search" id="searchgraph" class="btn btn-primary btn-sm searchgraph" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<?php for($i=0;$i<=1;$i++):?>
						<div id="line_chart<?=$i?>" style="height:300px;"></div>
						<br>

					<?php endfor; ?>

						

						<!-- <div id="container" style="width:100%; height:400px;"></div> -->
					</div>
				</div>
				
            </div>
				<!-- <div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-8" style="padding-left:0;">
							<label class="col-lg-1">From</label>
							<div class="col-lg-4">
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
				</div> -->
				<!-- <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12">
						<hr />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart2" style="height:400px;"></div>
					</div>
				</div> -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        </div>
    </div>
</section>
  
    <!-- /#wrapper -->
    <!-- jQuery -->    
</body>
</html>

<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#audit_date1").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			today:true
		});
		$("#audit_date123").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			today:true
		});
		$("#hrdt").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			today:true
		});
		

		
				
		$(function(){  
			var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
			$("#audit_date1").datepicker();
			
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
			$('#user_form')[0].reset();
			$('#bx1').show('fast');
			$('#adm').show('fast');
			$('#add_btn').hide('fast');
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			$('#item_no').focus();
			$('#operation').val("Add");
			
			$('#audit_date').val("<?=$dat?>");
			$("#action").attr("disabled", false);
			// $('#sr').load("hr_audit_d/load_table_data.php");
			$('#srdiv').hide();

			
		});

		$('#add_btn1').click(function(){
			$('#audit_form1')[0].reset();
			$('#bxAudit').show('fast');
			
			$('#bx2').hide('fast');
			$('#md2').hide('fast');
			$('#add_btn1').hide('fast');
			
			
			
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
			$('#operation').val('');
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn').show('fast');
		});
		$('#close_btnAudit').click(function(){
			$('#audit_form1')[0].reset();
			
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bxAudit').hide('fast');
			$('#bx2').show('fast');
			$('#add_btn1').show('fast');
		});

		$('#close_btnA').click(function(){
			$('#audit_form1')[0].reset();
			
			$('#adm').hide('fast');
			$('#bx1').hide('fast');
			$('#bxAudit').hide('fast');
			$('#bx2').show('fast');
			$('.mainAudit').hide('fast');
			$('.main').show('fast');
			
			
			$('#bxAudit').hide('fast');
			$('#add_btn1').show('fast');
			dataTable.ajax.reload();
		});

		
		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"hr_audit_d/fecth_all_hr_audit_date.php",
				type:"POST",
				data:{tbl:'tbl_hr_audit_date'}
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
		var tbl_hr_audit_date_id = $('#tbl_hr_audit_date_id').val();
			
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"hr_audit_d/insert_audit_form.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert(data);
							//window.location = window.location.href;
							$('#user_form')[0].reset();
							$('#adm').hide('fast');
							$('#bx1').hide('fast');
							$('#bx2').show('fast');
							$('#add_btn').show('fast');
							//$('#myModal').modal('hide');
							dataTable2.ajax.reload();



						}
					});
				}
			
		});

		 $(document).on('submit', '#audit_form1', function(event){
			event.preventDefault();
						console.log($('#hrdt').val());
				if($('#hrdt').val()==''){
					alert('Please Add Date!');
					return false;
				}


				if(confirm("Are you sure you want to Submit this?"))
				{
					
					$.ajax({
						url:"hr_audit_d/insert_emp_dep.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							//console.log(data);
							
						  if(data==13){
						  	alert('Please Select Employee!');
						  }else{
						  	$('#audit_form1')[0].reset();
						  	$('#adm').hide('fast');
							 $('#bx1').hide('fast');
							 $('#bxAudit').hide('fast');
							 $('#bx2').show('fast');
							// $('#add_btn').show('fast');
							// //$('#myModal').modal('hide');
							
							 location.reload(true);
							 dataTable.ajax.reload();
							 dataTable2.ajax.reload();
						  	alert(data);
						  }

   					   // 	
             		
            
           
						}
					});
					
				}
				});


		 var dataTable2 = $('#dataTables-exampleAudit').DataTable( {
				"processing": true,
        "serverSide": true,
        "order":[],
			"ajax":{
				url:"hr_audit_d/fetch_all_data.php",
				type:"POST",
				data:{tbl:'tbl_hr_audit',user_id:1}
			},
			"columnDefs":[
				{
					"targets":[0, 3, 4],
					"orderable":false,
				},
			],
    } );


		 $(document).on('click', '.updateAudit', function(){
			var user_id = $(this).attr("id");

			//$('#auidt_date_table_id').val(user_id);


			dataTable2.context[0].ajax.data.user_id = user_id;
			
			$('.main').hide('fast');
			$('.mainAudit').show('slow');
		
			dataTable2.ajax.reload();
			
			
			
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"hr_audit_d/fetch_patient_audit.php",
				method:"POST",
				data:{user_id:user_id,tbl:'tbl_hr_audit'},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#cb').show();
					$('#item_no').focus();
					$('#sr_no').val(data.sr_no);
					$('#audit_date').val(data.audit_date);
					$('#hr_staff').val(data.hr_staff);
					$('#hr_empcode').val(data.hr_empcode);
					$('#emp_department').val(data.hr_dept);
					
					var dataA=data.da;
					

				for(var k in dataA) {
  				 

  				 $('input:radio[name="'+k+'"]').filter('[value="'+dataA[k]+'"]').attr('checked', true);
				}
			
					
                  
                  
                   $('#tbl_hr_audit_date_id').val(data.tbl_hr_audit_date_id);
                  $('#name_sign').val(data.name_sign);
					$('#user_id1').val(data.sr_no);
					
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
					url:"hr_audit_d/delete_form.php",
					method:"POST",
					data:{user_id:user_id,tbl:'tbl_hr_audit'},
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

		$(document).on('click', '.delete1', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"hr_audit_d/delete_single_form.php",
					method:"POST",
					data:{user_id:user_id,tbl:'tbl_hr_audit'},
					success:function(data)
					{
						alert(data);
						dataTable2.ajax.reload();
					}
				});
			}
			else
			{
				return false;	
			}
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
	jQuery(function($) {
		$.mask.definitions['~']='[+-]'; 
		$('#d_adm').mask('9999-99-99');// for Birth Date
		$('#dddd').mask('9999-99-99');// for Joining Date
		//$('#t_adm').mask('99:99');// for Birth Date
		//$('#tddd').mask('99:99');// for Joining Date
	});
</script>

<script type="text/javascript">
        $(document).ready(function() {
            $('#boot-multiselect-demo').multiselect({
            includeSelectAllOption: true,
            buttonWidth: 150,
            enableFiltering: true,
            nonSelectedText:'Select Staff'

        });
            $('#user_id').multiselect({
            includeSelectAllOption: true,
            buttonWidth: 450,
            enableFiltering: true,
            nonSelectedText:'---Select Department--',
            maxHeight: 300  
        });

        });

        function getUser(val) {
          
      var uTyp = $('#user_id').val();
      
     
      var html = '';
      html += '<div class="table-repsonsive "><table class="table table-bordered" id="item_table"><tr><th class="col-md-4">Department</th><th class="col-md-8">Select Staff</th></tr>';
      uTyp.forEach(function(item) {

         html += '<tr>';
                    html += '<td><input type="text" name="dp_name[]" readonly class="form-control item_name col-md-4" value="'+item+'" /></td>';
                    html += '<td><select name="item_User[]" multiple="multiple" id="'+item.replace(/ +/g, "")+'" class="form-control '+item.replace(/ +/g, "")+' " ></td></tr>';    

                    
              });
                     html += '</table></div>';
        $('#userSelect').html(html);

        uTyp.forEach(function(item) {
        let ulist = '';
          $.ajax({
                 url: 'hr_audit_d/fecth_emp_by_dep.php',
                 method:'post',
                 data: {
                 utyp: item,
                 tbl:'tbl_hr_mast'
               },
                 success: function(ids) {
                     
                    $('#'+item.replace(/ +/g, "")).append(ids);

                    $('#'+item.replace(/ +/g, "")).multiselect({
                      includeSelectAllOption: true,
                      buttonWidth: 600,
                      enableFiltering: true,
                      maxHeight: 300  ,
                       nonSelectedText:'---Select Emp---',
                     
                  });
                    
                 }

                 });
             


                  });
        
        
      }



    </script>
    <?php include('hr_audit_d/chart_display.php'); ?>