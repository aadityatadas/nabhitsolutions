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
$table='tbl_quaterly_audit_details';
   
	include_once('quater_audit_data/fetch_audit_details.php');
 
?>
<?php include_once('high_chart_js.php'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="../data_multiselect/jquery.multiselect.css" type="text/css">
        <script type="text/javascript" src="../data_multiselect/jquery.multiselect.js"></script>
         <link rel="stylesheet" type="text/css" href="sample_size_data/sample_size.css">
 <script type="text/javascript" src="sample_size_data/sample_size.js"></script>
<!-- <script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('huf_count.php').fadeIn("slow");
	}, 1000); // refresh every 5000 milliseconds
	
</script> -->
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
#mainAudit,
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
	<?php include"QM-nav-bar.php";?>
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
                        <div class="panel-heading" style="padding:7px;height: 140px;">
                            Clinical Audit 
                             <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px; " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
							
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

													$tot= "SELECT COUNT(*) as total FROM tbl_clinical_audit WHERE year(created) = '$yr'";
														$totres = mysqli_query($connect, $tot);
														$totrow=mysqli_fetch_assoc($totres);
														// echo $totrow['total'];
														// echo "SELECT COUNT(*) as total FROM tbl_huf";
														// die();

														$qrycomp = "SELECT COUNT(*) as comp FROM tbl_clinical_audit WHERE sent_on!='' AND year(created) = '$yr' ";
																$rescomp = mysqli_query($connect, $qrycomp);
																$rowcomp=mysqli_fetch_assoc($rescomp);
																// echo $rowcomp['comp'];
																											

														$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_clinical_audit WHERE sent_on='' AND year(created) = '$yr' ";
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
							 <?php if(!$result2[0]['clinical_audit']) {?> 
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Select Patient</b></button>

						<?php } ?>
                        </div>

                    <!--   audit select start -->
                         <div class="box" id="bxAudit" style="Overflow: visible;">
							<div class="panel-body">
						<form method="post" id="audit_form1" enctype="multipart/form-data">
								<div class="form-group">
					

					<div class="col-lg-12">
											<label class="col-lg-2">Select The Quater</label>
			

											<div class="col-lg-4">
												<select type="text" name="quater" id="quater" class="form-control" required="true" required="">
														<option value="">--select quater--</option>
	                                  <?php foreach ($quaters as $key => $quater) { ?>
	
													<option value="<?=$quater['id']?>"><?php echo $quater['quater_name']."(".$quater['audit_year'].")" ;?></option>
										<?php } ?>			
												</select>
											</div>
						</div>

							<div class="col-lg-12">

								<label class="col-lg-2">Quater Dates</label>
											<div class="col-lg-4">
												<input type="hidden" name="quater_id" id="quater_id" class="form-control"  />

												<input type="hidden" name="tbl1" id="tbl1" class="form-control"  value="tbl_clinical_audit" />
											</div>
							<div class="col-lg-9" style="padding-left:0;">
							
							<div class="col-lg-3">
								<input type="text" name="frdate1" id="frdate1" value="" class="form-control" readonly/>
							</div>
							<label class="col-lg-3">-</label>
							<div class="col-lg-3">
								<input type="text" name="todate1" id="todate1" value="" class="form-control" readonly/>
							</div>
							
						</div>
					</div>
				</div>

				<div class="col-lg-12">

    <div class="simple_calc">
	  <table class="determine" >
	    <tr>
	      <td align='center'>
		  <table>
		  <CAPTION>
            <p><b>Determine Sample Size</b>

		  </CAPTION>
		  <tr>
		    <td>Confidence Level:</td>
		    <td>
		    	
		    <input TYPE="RADIO" NAME="ConLevBut" VALUE="1" class="" onclick="ConLevButF1(this.form)"
			   Checked>90%
		      <input TYPE="RADIO" NAME="ConLevBut" VALUE="2" class="sil" onclick="ConLevButF2(this.form)"
			   >95%
		      <input TYPE="RADIO" NAME="ConLevBut" VALUE="3" onclick="ConLevButF3(this.form)"
			  >99%</td>
		  </tr>
		  <tr>

		    <td>Confidence Interval:</td>
		    <td>
		      <input type="text" name="box" size=15 class="form-control"></td>
		  </tr>
		  <tr>
		    <td>Population:</td>
		    <td>
		      <input type="text" name="popbox" size=15 onKeyUp="this.value=iVal(this.value)" id="popbox" class="form-control"></td>

		  </tr>
		  <tr>
		    <td></td>
		    <td></td>
		  </tr>
		  <tr>
		    <td colspan='2' align='center'>
			<input type = "button" class='btn_s form-control' name = "Calculate" value = "&nbsp; Calculate &nbsp;" onClick ="to(this.form)">
		      
				<!-- &nbsp;&nbsp;&nbsp;&nbsp;		<input type = "button" class='btn_s' name = "Clear" value = " &nbsp;  Clear &nbsp;  " onClick ="cler(this.form,'')"> -->
		      </td>
		  </tr>
		  <tr>
		    <td></td>
		    <td></td>
		  </tr>

		  
		</table>
	      </td>
	    </tr>

	  </table>
      </div>
	
     
</div>	
<br />

<div class="col-lg-12">
											<hr/>
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

								<button accesskey="s" type="submit" name="actionAudit" id="actionAudit" class="btn btn-primary  btn-sm" />SEARCH </button>
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

                                <div class="col-lg-8 hideSecond">
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
												<input type="hidden" name="selcted_quater_id" id="selcted_quater_id" />
												<input type="hidden" name="table_name" id="table_name" value="tbl_clinical_audit" />
												<input type="hidden" name="audit_name1" id="audit_name1" value="clinical_audit" />
												<button  type="submit" name="actionP" id="actionP" class="btn btn-primary pull-right" />Add Patients ( Alt + s )</button>
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
			

							  <!--   audit select end -->
						
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
											<label class="col-lg-4">Date of Dischage/DAMA/Death (D2)</label>
											<div class="col-lg-3">	
												<input type="text" autocomplete="off" name="dddd" id="dddd" placeholder="yyyy-mm-dd" class="form-control"  readonly=""/>
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
										<div class="col-lg-12">
											<label class="col-lg-4">KNOWN CASE/NEWLY DETECTED</label>
											<div class="col-lg-8">		
												<input type="text" autocomplete="off" name="case_details" id="case_details" placeholder="KNOWN CASE/NEWLY DETECTED" class="form-control" />
											</div>
										</div>

										<div class="col-lg-12" style="padding-bottom: 10px">
											<label class="col-lg-4">SENT ON </label>
											<div class="col-lg-8">
												<label class="radio-inline">
										      <input type="radio" name="sent_on" value="INSULIN" checked>INSULIN
										    </label>
										    <label class="radio-inline">
										      <input type="radio" name="sent_on" value="DIET CONTROL">DIET CONTROL
										    </label>
										    <label class="radio-inline">
										      <input type="radio" name="sent_on" value="NO OHA/INSULIN">NO OHA/INSULIN
										    </label>
										    <label class="radio-inline">
										      <input type="radio" name="sent_on" value="NO TREATMENT">NO TREATMENT
										    </label>
										    <label class="radio-inline">
										      <input type="radio" name="sent_on" value="OHA">OHA
										    </label>
										    <label class="radio-inline">
										      <input type="radio" name="sent_on" value="OHA + INSULIN">OHA + INSULIN
										    </label>
    	
											</div>
	
										</div>
										<div class="col-lg-12" style="padding-bottom: 10px">
											<label class="col-lg-4">Informed by RMo to consultant  about raised BG</label>
											<div class="col-lg-4">
										
										<label class="radio-inline">
										      <input type="radio" name="consulatnt" value="Yes" checked>Yes
										   </label>
										   <label class="radio-inline">
										      <input type="radio" name="consulatnt" value="No">No
										   </label>
											</div>
										</div>
										<div class="col-lg-12" style="padding-bottom: 10px">
											<label class="col-lg-4">Monitoring done by trained nurse</label>
											<div class="col-lg-4">
												
												<label class="radio-inline">
										      <input type="radio" name="monitoring" value="Yes" checked>Yes
										   </label>
										   <label class="radio-inline">
										      <input type="radio" name="monitoring" value="No">No
										   </label>
											</div>
										</div>

										<div class="col-lg-12" style="padding-bottom: 10px">
											<label class="col-lg-4">Technique of BG Monitoring</label>

											<div class="col-lg-4">
												
												<label class="radio-inline">
										      <input type="radio" name="technique" value="Yes" checked>Yes
										   </label>
										   <label class="radio-inline">
										      <input type="radio" name="technique" value="No">No
										   </label>
											</div>
										</div>

										<div class="col-lg-12" style="padding-bottom: 10px">
											<label class="col-lg-4">Frequency of BG Monitoring</label>
											<div class="col-lg-4">
												<select type="text" name="frequency" id="frequency" class="form-control" >
													<option value="">Select</option>
													<option value="8hrly">8hrly</option>
													
												</select>
											</div>
										</div>
										<div class="col-lg-12" >
											<label class="col-lg-4">Calibration of glucometer</label>
											<div class="col-lg-4">
												<select type="text" name="calibration" id="calibration" class="form-control" >
													<option value="">Select</option>
													<option value="Calibrated">Calibrated </option>
													
												</select>
											</div>
										</div>

										<div class="col-lg-12" style="padding-bottom: 10px">
											<label class="col-lg-4">Diet Plan we properly charted</label>
											<div class="col-lg-4">
												
												<label class="radio-inline">
										            <input type="radio" name="diet_plan" value="Yes" checked>Yes
										        </label>
										   <label class="radio-inline">
										      <input type="radio" name="diet_plan" value="No">No
										   </label>

											</div>
										</div>
										<div class="col-lg-12" style="padding-bottom: 10px">
											<label class="col-lg-4">Patient education was given on importance of controlling BG</label>
											<div class="col-lg-4">
												
												<label class="radio-inline">
										            <input type="radio" name="education" value="Yes" checked>Yes
										        </label>
										   <label class="radio-inline">
										      <input type="radio" name="education" value="No">No
										   </label>

											</div>
										</div>

										<div class="col-lg-12">
											<label class="col-lg-4">FBS/RBS ON DISCHARGE</label>
											<div class="col-lg-6">
												<input type="text" name="fbs_rbs" id="fbs_rbs" class="form-control" placeholder="FBS/RBS ON DISCHARGE" value="Not Done">
												
											</div>
										</div>
										
										
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
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
												<th>Quater</th>
												<th>From</th>
												<th>To</th>
												<th>Year</th>
												
												
												<th>Size</th>

												<!-- <th>Done By</th> -->
											</tr>
										</thead>
									</table>
								</div>


								<input type="hidden" name="tbl_quaterly_audit_details_id" value="2" id="tbl_quaterly_audit_details_id">
						
								<div id="order-table" class="table-responsive mainAudit">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-exampleAudit">
										<thead style="font-size:12px;color:darkblue;">
											<tr>
											<th>Action</th>
												<th>Sr.No.</th>
												<th>Name of the Patient</th>
												<!-- <th>AGE</th> -->
												<th>IPD No</th>
												<th>DATE OF DISCHARGE</th>
												<th>TYPE OF DISCHARGE</th>
												<th>KNOWN CASE/NEWLY DETECTED</th>
												<th>SENT ON </th>
												<th>Informed by RMo to consultant  about raised BG</th>
												<th>Monitoring done by trained nurse</th>	
												<th>Technique of BG Monitoring	</th>
												<th>Frequency of BG Monitoring	</th>
												<th>Calibration of glucometer	</th>
												<th>Diet Plan we properly charted</th>	
												<th>Patient education was given on importance of controlling BG	</th>
												<th>FBS/RBS ON DISCHARGE</th>

												
												<th>Recorded By</th>
												<th>Updated By</th>
												<th>Recorded On</th>
												
												
											</tr>
										</thead>
									</table>

									<div class="col-lg-6">	
												<button type="button" class="btn btn-default pull-left" id="close_btnA">Close</button>
											</div>
								
							</div>
							</div>


							
								<!-- /.panel -->
							</div>
                        </div>
                    </div>

                     <div class="col-lg-12" >
								
								<?php 
								$main_table='tbl_clinical_audit';
								$main_tableAll='tbl_quaterly_audit_details';
								$s_audit_name ='clinical_audit';
								$fold='clinical';
								$pdf='clinical_audit_pdf.php';
								include('quater_audit_data/audit_reports_details.php'); ?>

								</div>

			<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-12" style="padding-left:0;">

							<div class="col-lg-1" style="color: black;">	
										Quater
							</div>

							<div class="col-lg-3">
												<select type="text" name="quater_r" id="quater_r" class="form-control find_quaterGraphh" required="true" required="">
														<option value="">--select quater--</option>
	                                  <?php foreach ($quaters as $key => $quater) { ?>
	
													<option value="<?=$quater['id']?>"><?php echo $quater['quater_name']."(".$quater['audit_year'].")" ;?></option>
										<?php } ?>			
												</select>
												<input type="hidden" name="selectedquater_id" id="quaterGraphh" class="form-control" readonly />

												 <input type="hidden" name="frmDateGraphh" id="frm1Graphh" class="form-control" readonly  />

                                                  <input type="hidden" name="toDateGraphh" id="to1Graphh" class="form-control" readonly  />
							</div>
							
							<div class="col-lg-2">
								<input type="text" name="graphhFrm" id="graphhFrm" value="" class="form-control" />
							</div>
							
							<div class="col-lg-3">
								<input type="text" name="graphhTo" id="graphhTo" value="" class="form-control" />
							</div>
							<div class="col-lg-2">
								<button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="audit_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<?php for($i=0;$i<=2;$i++):?>
						<div id="line_chart<?=$i?>" style="height:300px;"></div>
						<br>

					<?php endfor; ?>

						

						<!-- <div id="container" style="width:100%; height:400px;"></div> -->
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

		$('#quater').change(function(){  
			var testn = $(this).val(); 			
			$.ajax({  
				url:"quater_audit_data/load_quater_audit.php",  
				method:"POST",  
				data:{testn:testn , tbl:'tbl_quaterly_audit_details', tbl2 :'tbl_huf' ,tbl3:'tbl_clinical_audit',audit_name:'clinical_audit'},
				dataType:"json",				
				success:function(data)
				{  
					 



					 $('#quater_id').val(data.id);
					$('#frdate1').val(data.from_a);
					$('#todate1').val(data.to_a);
					
					$('#popbox').val(data.total);
					 $('#selcted_quater_id').val(data.id);
					
					// $('#hrmon').val(data.hrmon);
					// $('#auditSelectedMonth').val(data.auditSelectedMonth);
					// $('#auditSelectedYear').val(data.auditSelectedYear);
					// $('#popbox').val(data.sample_size);

				}  
			});  
		});
		

		// Fetch Data
		var dataTable = $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"quater_audit_data/fetch_all_auidit_details.php",
				type:"POST",
				data:{tbl:'tbl_quaterly_audit_details',audit_name:'clinical_audit',tbl2:'tbl_clinical_audit'}
			},
			"columnDefs":[
				{
					"targets":[0, 3, 4],
					"orderable":false,
				},
			],
		});


		 var dataTable2 = $('#dataTables-exampleAudit').DataTable( {
				"processing": true,
        "serverSide": true,
        "order":[],
			"ajax":{
				url:"clinical_audit_d/fetch_clincal_audit.php",
				type:"POST",
				data:{user_id:1}
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

		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			
			
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"clinical_audit_d/insert_audit_form.php",
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
							dataTable2.ajax.reload();
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
						url:"quater_audit_data/insert_patinet.php",
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
							
							$('.main').show('fast');
							$('.mainAudit').hide('slow');		
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
				url:"clinical_audit_d/fetch_patient_clinical_audit.php",
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
					
					
					$('#ddd').val(data.ddd);
					$('#dddd').val(data.dddd);

					$('#case_details').val(data.case_details);
					// $('#sent_on').val(data.sent_on);
					$('input:radio[name="sent_on"]').filter('[value="'+data.sent_on+'"]').attr('checked', true);
					$('input:radio[name="consulatnt"]').filter('[value="'+data.consulatnt+'"]').attr('checked', true);
					$('input:radio[name="monitoring"]').filter('[value="'+data.monitoring+'"]').attr('checked', true);
					$('input:radio[name="technique"]').filter('[value="'+data.technique+'"]').attr('checked', true);
					$('input:radio[name="diet_plan"]').filter('[value="'+data.diet_plan+'"]').attr('checked', true);
					$('input:radio[name="education"]').filter('[value="'+data.education+'"]').attr('checked', true);
					
					$('#frequency').val(data.frequency);
					$('#calibration').val(data.calibration);
					
					$('#fbs_rbs').val(data.fbs_rbs);
					
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
					url:"clinical_audit_d/delete_record.php",
					method:"POST",
					data:{user_id:user_id ,tbl:'tbl_clinical_audit'},
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
		$(document).on('click', '.deleteAll', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"quater_audit_data/delete_all_details.php",
					method:"POST",
					data:{user_id:user_id ,tbl:'tbl_clinical_audit',audit_name:'clinical_audit'},
					success:function(data)
					{
						alert(data);
						//dataTable.ajax.reload();
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
						url:"quater_audit_data/search_patient.php",
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
		// $("#frdate1").datepicker({
		// 	showOtherMonths: true,
		// 	selectOtherMonths: true,
		// 	changeMonth: true,
		// 	changeYear: true,
		// });
		// $("#todate1").datepicker({
		// 	showOtherMonths: true,
		// 	selectOtherMonths: true,
		// 	changeMonth: true,
		// 	changeYear: true,
		// });

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
			// $("#frdate1").datepicker();
			// $("#todate1").datepicker();
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

<script> 
       //$( "div.hideSecond" ).find( "div" ).css( "display", "none" );
          
       
    </script>
    <script type="text/javascript">
	$('.find_quaterGraphh').change(function(){  
			var testn = $(this).val(); 			
			$.ajax({  
				url:"quater_audit_data/load_quater_audit_report.php",  
				method:"POST",  
					data:{testn:testn , tbl:'<?=$main_tableAll?>', tbl2 :'tbl_huf',audit_name:'<?=$s_audit_name?>'},
				dataType:"json",				
				success:function(data)
				{  
					 



					
					$('#graphhFrm').val(data.from_a);
					$('#graphhTo').val(data.to_a);
					
					$('input[name="selectedquater_id"]').val(data.id);

					$('#frm1Graphh').val(data.from_a);
					$('#to1Graphh').val(data.to_a)



					



				}  
			});  
		});
</script>

    <?php include('clinical_audit_d/chart_display.php'); ?>

