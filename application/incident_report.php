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
                           INCIDENT REPORT &nbsp;
                            <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: white;font-weight: bold;" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>

                           
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
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">Patient / Visitor Name/ Incident related person –</label>
											<div class="col-lg-7">
												<input type="text" name="p_name" id="p_name" class="form-control"  />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-2">Attending consultant –</label>
											<div class="col-lg-4">
												<input type="text" name="acon" id="acon" class="form-control"  />
											</div>
										
											<label class="col-lg-2">Age</label>
											<div class="col-lg-4">
												<input type="text" name="age" id="age" class="form-control"  />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-2">Date of Admission</label>
											<div class="col-lg-4">
												<input type="date" name="dadm" id="dadm" placeholder="yyyy-mm-dd" class="form-control" />
											</div>

											<label class="col-lg-2">Gender</label>
											<div class="col-lg-4">
												<select type="text" name="gender" id="gender" class="form-control" >
													<option value="">Select</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-2">Diagnosis</label>
											<div class="col-lg-4">
												<input type="text" name="diagnosis" id="diagnosis" placeholder="Diagnosis" class="form-control"  />
											</div>
											<label class="col-lg-2">IP No. -</label>
											<div class="col-lg-4">
												<input type="text" name="ipno" id="ipno" placeholder="IP No." class="form-control"  />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-2">Operation done (if any)-</label>
											<div class="col-lg-4">
												<input type="text" name="operationDone" id="operationDone" class="form-control" placeholder="Operation done (if any)" />
											</div>
											<label class="col-lg-2">MR No. -</label>
											<div class="col-lg-4">
												<input type="text" name="mrno" id="mrno" class="form-control" placeholder="MR No." />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-2">Location –</label>
											<div class="col-lg-4">
												<input type="text" name="location" id="location" class="form-control" placeholder="Location" />
											</div>
											<label class="col-lg-2">Date & Time of Incident -</label>
											<div class="col-lg-2">
												<input type="date" name="doi" id="doi" class="form-control" placeholder="yyyy-mm-dd" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="toi" id="toi" class="form-control"/>
											</div>
										</div>
										<div class="col-lg-12">
											
											<label class="col-lg-2">Date & Time of Report  -</label>
											<div class="col-lg-2">
												<input type="date" name="dor" id="dor" class="form-control" placeholder="yyyy-mm-dd" />
											</div>
											<div class="col-lg-2">
												<input type="time" name="tor" id="tor" class="form-control"/>
											</div>
										</div>

										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>1.TYPE OF INCIDENT</b></div>
										<div class="col-lg-12">
											<label class="col-lg-4">A)	Surgery or anesthesia related </label>
											<div class="col-lg-8">
												<select type="text" name="mo1" id="mo1" class="form-control" >
													<option value="">Select</option>
													<option value="Performed on wrong site/side">Performed on wrong site/side</option>
													<option value="Performed on wrong patient">Performed on wrong patient</option>
													<option value="Wrong surgical procedure performed on patient">Wrong surgical procedure performed on patient</option>
													<option value="Retained instrument / material discovered post surgery">Retained instrument / material discovered post surgery</option>
													<option value="Death during or immediately after surgery">Death during or immediately after surgery</option>
													<option value="Anesthesia related adverse event">Anesthesia related adverse event</option>
													<option value="Death / Disability due to spinal manipulative surgery ( Tick mark)">Death / Disability due to spinal manipulative surgery ( Tick mark)</option>
													<option value="Patient landing up into a major surgery as a result of the complications of some minor procedure performed">Patient landing up into a major surgery as a result of the complications of some minor procedure performed</option>
												</select>
											</div>
										
											<label class="col-lg-4">B)	Device / equipment related</label>
											<div class="col-lg-8">
												<select type="text" name="mo2" id="mo2" class="form-control" >
													<option value="">Select</option>
													<option value="Use of contaminated drugs, devices or any other product">Use of contaminated drugs, devices or any other product</option>
													<option value="Use and function of a device in a manner other than the device’s intended use">Use and function of a device in a manner other than the device’s intended use</option>
													<option value="Failure or breakdown of device or medical equipment">Failure or breakdown of device or medical equipment</option>
													<option value="Intravascular air embolism">Intravascular air embolism</option>
													<option value="Burn">Burn</option>
													<option value="Injury due to restraint ">Injury due to restraint </option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">C)	Patient protection event</label>
											<div class="col-lg-8">
												<select type="text" name="mo3" id="mo3" class="form-control" >
													<option value="">Select</option>
													<option value="Vulnerable patient discharged to wrong person">Vulnerable patient discharged to wrong person</option>
													<option value="Patient suicide / attempted suicide">Patient suicide / attempted suicide </option>
													<option value="Patient absconding ">Patient absconding </option>
													<option value="Wrong gas /gas contaminated by toxic substances delivered">Wrong gas /gas contaminated by toxic substances delivered </option>
												<select>
											</div>
										
											<label class="col-lg-4">D)	Environment related</label>
											<div class="col-lg-8">
												<select type="text" name="mo4" id="mo4" class="form-control" >
													<option value="">Select</option>
													<option value="Burn incurred from any source (other than device. Don’t repeat if covered in point B )">Burn incurred from any source (other than device. Don’t repeat if covered in point B )</option>
													<option value="Patient slip /trip/fall">Patient slip /trip/fall</option>
													<option value="Electric shock">Electric shock</option>
													<option value="Bumped or struck by object">Bumped or struck by object</option>
													<option value="Infrastructural failure/ collapse">Infrastructural failure/ collapse</option>
												<select>
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-4">E)	Care management event</label>
											<div class="col-lg-8">
												<select type="text" name="mo5" id="mo5" class="form-control" >
													<option value="">Select</option>
													<option value="Transfusion reaction related to an administration of incompatible blood / blood product ">Transfusion reaction related to an administration of incompatible blood / blood product </option>
													<option value="Medication error">Medication error  </option>
													<option value="Use of outdated drug/ IV fluid">Use of outdated drug/ IV fluid</option>
													<option value="An avoidable delay in treatment or response to abnormal test results">An avoidable delay in treatment or response to abnormal test results</option>
												<select>
											</div>
										
											<label class="col-lg-4">F)	Criminal event</label>
											<div class="col-lg-8">
												<select type="text" name="mo6" id="mo6" class="form-control" >
													<option value="">Select</option>
													<option value="Physical assault">Physical assault</option>
													<option value="Sexual assault">Sexual assault</option>
													<option value="Homicide">Homicide</option>
													<option value="Abduction of patient">Abduction of patient</option>
													<option value="Care provided by an individual impersonating a clinical member / staff">Care provided by an individual impersonating a clinical member / staff</option>
													
												<select>
											</div>
										</div>
										<div class="col-lg-12" style="margin-top: 10px;">
											<label class="col-lg-4">G) Any other (not listed above) </label>
											<div class="col-lg-8">
												<textarea name="mo7" id="mo7" class="form-control" rows="3"></textarea>
												
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-12">H) Death / disability due to any of above ( B to G , as ascertained by doctor)</label>
											<label class="col-lg-6">(Mention about it)</label>
											<label class="col-lg-6">Expected period of disability</label>
											<div class="col-lg-6">
												<textarea name="mo8" id="mo8" class="form-control" rows="3"></textarea>
												
											</div>
											<div class="col-lg-6">
												<textarea name="mo9" id="mo9" class="form-control" rows="3"></textarea>
												
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>2.SEVERTY  OF INJURY</b></div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<select type="text" name="mo10" id="mo10" class="form-control" >
													<option value="">Select</option>
													<option value="Non apparent">Non apparent</option>
													<option value="Slight –no treatment">Slight –no treatment</option>
													<option value="Moderate – first aid">Moderate – first aid</option>
													<option value="Serious (describe)">Serious (describe)</option>
												</select>
											</div>
											<div class="col-lg-6">
												<textarea name="mo11" id="mo11" class="form-control" rows="3" placeholder="Serious (describe)"></textarea>
												
											</div>
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>3.CONTRIBUTING FACTORS</b></div>
										<div class="col-lg-12">
											<div class="col-lg-4">	
												<select type="text" name="mo12" id="mo12" class="form-control" >
													<option value="">Select</option>
													<option value="Language barrier">Language barrier</option>
													<option value="Hearing aid">Hearing aid</option>
													<option value="Limited vision">Limited vision</option>
													<option value="Obesity">Obesity</option>
													<option value="Seizures">Seizures</option>
													<option value="Intoxication">Intoxication</option>
													<option value="Other">Other</option>
													
												</select>
											</div>
											<label class="col-lg-2">If Other</label>
											<div class="col-lg-4">
												<input type="text" name="ofact" id="ofact" class="form-control" placeholder="If Other" />
											</div>

										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>4.CONDITION OF PATIENT</b> (before incident)</div>
										<div class="col-lg-12">
											<div class="col-lg-4">	
												<select type="text" name="mo13" id="mo13" class="form-control" >
													<option value="">Select</option>
													<option value="Well oriented">Well oriented</option>
													<option value="Confused">Confused</option>
													<option value="Sedated">Sedated</option>
													<option value="Drowsy">Drowsy</option>
													<option value="Hyperactive">Hyperactive</option>
													<option value="Uncooperative">Uncooperative</option>
													<option value="Other">Other</option>
													
												</select>
											</div>
											<label class="col-lg-2">If Other</label>
											<div class="col-lg-4">
												<input type="text" name="codition" id="codition" class="form-control" placeholder="If Other" />
											</div>

										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>5. PERSONS  NOTIFIED</b></div>
										<div class="col-lg-12">
											<div class="col-lg-4">	
												<select type="text" name="mo14" id="mo14" class="form-control" >
													<option value="">Select</option>
													<option value="Consultant">Consultant</option>
													<option value="RMO">RMO</option>
													<option value="Nursing Incharge">Nursing Incharge</option>
													<option value="other">other</option>
												</select>
											</div>
											<label class="col-lg-2">If Other</label>
											<div class="col-lg-6">
												<input type="text" name="person" id="person" class="form-control" placeholder="If Other" />
											</div>
										</div>
										<div class="col-lg-12" style="margin-top: 10px">
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="mo15" id="mo15" class="form-control" placeholder="Name" />
											</div>

											<label class="col-lg-2">Date & Time</label>
											<div class="col-lg-2">
												<input type="date" name="mo16" id="mo16" class="form-control"/>
											</div>

											
											<div class="col-lg-2">
												<input type="time" name="mo17" id="mo17" class="form-control" />
											</div>
										</div>

										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>6. PERSONS EXAMINING PATIENT AS A RESULT</b></div>
										<div class="col-lg-12">
											<div class="col-lg-4">	
												<select type="text" name="mo18" id="mo18" class="form-control" >
													<option value="">Select</option>
													<option value="Consultant">Consultant</option>
													<option value="RMO">RMO</option>
													<option value="Nurse">Nursing Incharge</option>
													
												</select>
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-7">
												<input type="text" name="mo19" id="mo19" class="form-control" placeholder="Name" />
											</div>
										</div>
										<div class="col-lg-12" style="margin-top: 10px">
											

											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="date" name="mo20" id="mo20" class="form-control"/>
											</div>

											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												<input type="time" name="mo21" id="mo21" class="form-control" />
											</div>
										</div>

										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>7.Narrative description of occurrence (Describe how incident happened. Be specific. Do not assume. Write facts and not opinion. Quotes should be used when not witnessed by reporter e.g. patient states “----”)</b></div>
										<div class="col-lg-12">
											
												<textarea name="mo22" id="mo22" class="form-control" rows="5" placeholder="Narrative description of occurrence"></textarea>
												
											
										</div>


										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12"><b>8.Designation of person completing this form</b></div>
										<div class="col-lg-12">
											
												<label class="col-lg-2">Name</label>
											<div class="col-lg-8">
												<input type="text" name="mo23" id="mo23" class="form-control" placeholder="Name" />
											</div>
										</div>
										<div class="col-lg-12">
											<label class="col-lg-1">Sign</label>
											<div class="col-lg-3">
												<input type="text" name="mo24" id="mo24" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-1">Date</label>
											<div class="col-lg-3">
												<input type="date" name="mo25" id="mo25" class="form-control"/>
											</div>

											<label class="col-lg-1">Time</label>
											<div class="col-lg-3">
												<input type="time" name="mo26" id="mo26" class="form-control" />
											</div>
												
											
										</div>

										<div class="col-lg-12">
											<hr />
										</div>

										<div class="col-lg-12"><b>9. Action advised or comments by NS</b></div>
										<div class="col-lg-12">
											
												<textarea name="mo27" id="mo27" class="form-control" rows="5" placeholder="Action advised or comments by NS"></textarea>
												
											
										</div> 
										<div class="col-lg-12">
										<label class="col-lg-2">Incident is</label>
										<div class="col-lg-4">	
												<select type="text" name="mo28" id="mo28" class="form-control" >
													<option value="">Select</option>
													<option value="SENTINEL">SENTINEL</option>
													<option value="NON SENTINEL">NON SENTINEL</option>
													<option value="NEAR MISS">NEAR MISS</option>
													
												</select>
											</div>

											<label class="col-lg-1">Sign</label>
											<div class="col-lg-5">
												<input type="text" name="mo29" id="mo29" class="form-control" placeholder="Sign" />
											</div>
										
									</div>
									<div class="col-lg-12" style="margin-top: 10px">
											

											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="date" name="mo30" id="mo30" class="form-control"/>
											</div>

											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												<input type="time" name="mo31" id="mo31" class="form-control" />
											</div>
										</div>


										<div class="col-lg-12">
											<hr />
										</div>

										<div class="col-lg-12"><b>10. Action advised or comments by Medical Superintendent and safety Committee: In case of Sentinel events or Otherwise </b></div>
										<div class="col-lg-12">
											
												<textarea name="mo32" id="mo32" class="form-control" rows="5" placeholder="comments by Medical Superintendent and safety Committee"></textarea>
												
											
										</div> 
										<div class="col-lg-12">
										
											<label class="col-lg-1">Sign</label>
											<div class="col-lg-5">
												<input type="text" name="mo33" id="mo33" class="form-control" placeholder="Sign" />
											</div>
										
									
											

											<label class="col-lg-2">Date & Time</label>
											<div class="col-lg-2">
												<input type="date" name="mo34" id="mo34" class="form-control"/>
											</div>

											
											<div class="col-lg-2">
												<input type="time" name="mo35" id="mo35" class="form-control" />
											</div>
										</div>


										<div class="col-lg-12">
											<hr />
										</div>
											<div class="col-lg-12">
												<div class="col-lg-6">	
													<input type="hidden" name="user_id" id="user_id" />
													<input type="hidden" name="operation" id="operation" />
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
                        <div class="box" id="bx2">
							<div class="panel-body">
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:#2b6a9f;">
											<tr>
												<th>Action</th>
												<th>Sr No</th>
												<th>Patient / Visitor Name/ Incident related person
												<th>Attending consultant</th>
												<th>Age</th>
												<th>Date of Admission</th>
												<th>Gender</th>
												<th>Diagnosis</th>
												<th>IP No</th>
												<th>Operation done (if any)</th>
												<th>MR No.</th>
												<th>Location</th>
												<th>Date of Incident</th>
												<th>Time of Incident</th>
												<th>Date of Report</th>
												<th>Time of Report</th>
												<th>A)	Surgery or anesthesia related</th>
												<th>B)	Device / equipment related</th>
												<th>C)	Patient protection event</th>
												<th>D)	Environment related</th>
												<th>E)	Care management event</th>
												<th>F)	Criminal event</th>
												<th>G) Any other (not listed above)</th>
												<th>(Mention about it)</th>
												<th>Expected period of disability </th>
												<th>2.SEVERTY  OF INJURY</th>
												<th>Serious (describe)</th>
												<th>3.CONTRIBUTING FACTORS</th>
												<th>If Other</th>
												<th>4.CONDITION OF PATIENT (before incident)</th>
												<th>If Other</th>
												<th>5. PERSONS  NOTIFIED</th>
												<th>If Other</th>
												<th>Name</th>
												<th>Date</th>
												<th>Time</th>
												<th>6. PERSONS EXAMINING PATIENT AS A RESULT</th>
												<th>Name</th>
												<th>Date</th>
												<th>Time</th>
												<th>7.Narrative description of occurrence (Describe how incident happened. Be specific. Do not assume. Write facts and not opinion. Quotes should be used when not witnessed by reporter e.g. patient states “----”)</th>
												<th>8.Designation of person completing this form</th>
												<th>Sign</th>
												<th>Date</th>
												<th>Time</th>
												<th>9. Action advised or comments by NS </th>
												<th>Incident is</th>
												<th>Sign</th>
												<th>Date</th>
												<th>Time</th>
												<th>10. Action advised or comments by Medical Superintendent and safety Committee: In case of Sentinel events or Otherwise</th>
												<th>Sign</th>
												<th>Date</th>
												<th>Time</th>
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
							<div class="col-lg-2">
								<input style="border: 1px solid black;" type="text" name="frdate" id="frdate" value="<?php echo $frdt;?>" class="form-control" />
							</div>
							<label class="col-lg-1">To</label>
							<div class="col-lg-2">
								<input style="border: 1px solid black;" type="text" name="todate" id="todate" value="<?php echo $todt;?>" class="form-control" />
							</div>
							<div class="col-lg-4">
								<button style="color:white;font-weight:bold;" type="button" name="search" id="search" class="btn btn-info btn-sm" onclick="line_chart()" >SEARCH</button>
							</div>
						</div>
					</div>
				</div>
				
				<form method="post" action="../excel/HR/export.php" class="panel-heading">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading" style="color: black;">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
										 <input style="color:white;font-weight:bold;" type="submit" name="export" class="btn btn-danger" value="Excel" />
    
									</div>
			   </form>
			  
            </div>
             <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart_mast1" style="height:400px;"></div>
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
		/*$("#mo5").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});	*/
		/*$("#mo7").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});*/	
		$(function(){  
			//$("#mo5").datepicker();
			//$("#mo7").datepicker();
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
			$('#sr').load("load_increportno.php");
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
				url:"fetch_incident_report.php",
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
					url:"insert_incident_report.php",
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
				url:"fetch_single_incident_report.php",
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
					$('#sr_no').val(data.user_id);
					$('#p_name').val(data.p_name);
					$('#acon').val(data.acon);
					$('#age').val(data.age);
					$('#dadm').val(data.dadm);
					$('#gender').val(data.gender);
					$('#diagnosis').val(data.diagnosis);
					$('#ipno').val(data.ipno);
					$('#operationDone').val(data.operationDone);
					$('#mrno').val(data.mrno);
					$('#location').val(data.location);
					$('#doi').val(data.doi);
					$('#toi').val(data.toi);
					$('#dor').val(data.dor);
					$('#tor').val(data.tor);
					$('#mo1').val(data.mo1).change();
					$('#mo2').val(data.mo2).change();
					$('#mo3').val(data.mo3).change();
					$('#mo4').val(data.mo4).change();
					$('#mo5').val(data.mo5).change();
					$('#mo6').val(data.mo6).change();
					$('#mo7').val(data.mo7);
					$('#mo8').val(data.mo8);
					$('#mo9').val(data.mo9);
					$('#mo10').val(data.mo10).change();
					$('#mo11').val(data.mo11);
					$('#mo12').val(data.mo12).change();
					$('#ofact').val(data.ofact);
					$('#mo13').val(data.mo13).change();
					$('#codition').val(data.codition);
					$('#person').val(data.person);
					$('#mo14').val(data.mo14).change();
					$('#mo15').val(data.mo15);
					$('#mo16').val(data.mo16);
					$('#mo17').val(data.mo17);
					$('#mo18').val(data.mo18).change();
					$('#mo19').val(data.mo19);
					$('#mo20').val(data.mo20);
					$('#mo21').val(data.mo21);
					$('#mo22').val(data.mo22);
					$('#mo23').val(data.mo23);
					$('#mo24').val(data.mo24);
					$('#mo25').val(data.mo25);
					$('#mo26').val(data.mo26);
					$('#mo27').val(data.mo27);
					$('#mo28').val(data.mo28).change();
					$('#mo29').val(data.mo29);
					$('#mo30').val(data.mo30);
					$('#mo31').val(data.mo31);
					$('#mo32').val(data.mo32);
					$('#mo33').val(data.mo33);
					$('#mo34').val(data.mo34);
					$('#mo35').val(data.mo35);
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
					url:"delete_incident_form.php",
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
		//$('#mo5').mask('9999-99-99');// for  To Date
		//$('#mo7').mask('9999-99-99');// for  To Date
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