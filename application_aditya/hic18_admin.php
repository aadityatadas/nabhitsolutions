<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
	include('dbinfo.php');

	$dat = date('Y-m-d');
	$mnthNo = date('m');
	$mth = '';
	
	$mVal = 0;
	$m1 = array(1,2,3);
	$m2 = array(4,5,6);  
	$m3 = array(7,8,9);
	$m4 = array(10,11,12);

	switch (true) {
		case in_array($mnthNo, $m1):
			$mVal = 1;
			$mth = 'January';
			break;

		case in_array($mnthNo, $m2):
			$mVal = 2;
			$mth = 'April';
			break;

		case in_array($mnthNo, $m3):
			$mVal = 3;
			$mth = 'July';
			break;

		case in_array($mnthNo, $m4):
			$mVal = 4;
			$mth = 'October';
			break;
		
		
	}
	

	$qry = "SELECT DISTINCT month_id FROM tbl_audit_hh18";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_assoc($res);
	$cid = count($row)+1;
	
  
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');
	
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	$dArry[1] = array(0=>'Endoscope decontamination is undertaken or supervised by a dedicated person(s) with a recognized qualification or Training endoscope decontamination');
	$dArry[2] = array(0=>'Staff have access to relevant documentation on Infection
	control endoscopy');
	$dArry[3] = array(0=>'Staff are aware of how to access the endoscope Reprocessing
	documents at any given time');
	$dArry[4] = array(0=>'Decontamination is performed by person(S) Conversant with the structure of the endoscope and trained in cleaning techniques');
	$dArry[5] = array(0=>'Manufacturers instruction manual for each type of Endoscope
	is available');
	$dArry[6] = array(0=>'Scope cleaning is undertaken immediately after the endoscope is used, to prevent drying and hardening Of
	secretions');
	$dArry[7] = array(0=>'A high level disinfectant  is used for appropriate time To allow cope decontamination');
	$dArry[8] = array(0=>'RO water is available for cleaning scopes');
	$dArry[9] = array(0=>'The endoscope decontamination area must be separate and
	have at least 10 to 12 ACH/hour');

	$dArry1[10] = array(0=>'All valves and buttons are removed before leak testing');
	$dArry1[11] = array(0=>'Leak test is performed as per manufacturers Instructions');
	$dArry1[12] = array(0=>'Manufacturers cleaning instructions are available and
	Followed');
	$dArry1[13] = array(0=>'Appropriate enzymatic detergents/bio-film removal Agents are
	used');
	$dArry1[14] = array(0=>'Warm water (35°C) is used with enzymatic solution For
	optimum efficacy');
	$dArry1[15] = array(0=>'Detergent and water dilution is measured to ensure Correct
	dilution');
	$dArry1[16] = array(0=>'Detergent is left in contact with the endoscope Surfaces for
	manufactures specified time');
	$dArry1[17] = array(0=>'Appropriate cleaning equipment is used e.g. cleaning Brushes');
	$dArry1[18] = array(0=>'Appropriately sized cleaning brushes are used to Clean
	channels');
	$dArry1[19] = array(0=>'All surfaces of the endoscope, including internal and External are cleaned');
	$dArry1[20] = array(0=>'Running water is used for rinsing to ensure all debris And
	detergents are removed prior to disinfection');
	$dArry1[21] = array(0=>'Clean water is used to rinse the internal channels Through the
	cleaning adaptors');
	$dArry1[22] = array(0=>'Cleaning brushes are inspected and replaced when Worn or
	kinked');
	$dArry1[23] = array(0=>'Work areas as well ventilated and include at least One sink
	which is designated dirty');

	$dArry2[24] = array(0=>'A sink or container of disinfectant chemical is
	Contained within a fume extraction system');
	$dArry2[25] = array(0=>'A sink designated for rinsing only clean instruments is
	Available and contained within a fume extraction Cover');
	$dArry2[26] = array(0=>'Manufacturers instructions are followed');
	$dArry2[27] = array(0=>'Endoscope channels are dried prior to and after
	Installation of 70% alcohol');

	$dArry3[28] = array(0=>'Manufacturers instructions are followed');
	$dArry3[29] = array(0=>'Thorough cleaning precedes disinfection is in AER');
	$dArry3[30] = array(0=>'Water supplies are plumbed into machines');
	$dArry3[31] = array(0=>'Pre-filters are installed prior to water supply  into the
	Automated re-processor');
	$dArry3[32] = array(0=>'Pre-filters are regularly serviced and monitored');
	$dArry3[33] = array(0=>'Fresh RO water is used for each cycle');
	$dArry3[34] = array(0=>'Machines which contain a tank of disinfectant for Reuse are monitored for disinfection concentration
	Daily (each cycle for OPA)');
	$dArry3[35] = array(0=>'AER machines have a cycle for auto-disinfection');
	$dArry3[36] = array(0=>'Proof of process : a printout of cycle parameters is
	Available');
	$dArry3[37] = array(0=>'A maintenance schedule which includes tanks, pipes, Strainers and filters of both the machine and water Treatment
	systems are available');
	$dArry3[38] = array(0=>'Endoscope channels are dried prior to and after Installation of
	70% alcohol');

	$dArry4[39] = array(0=>'Clean, dry, well ventilated, dedicated storage cupboard, which permits full length hanging on appropriate support structures Or Drying cabinet which provides continuous passage Of HEPA filtered air');


	$dArry5[40] = array(0=>'Every list, including the order of the order of the
	Patients on the list.');
	$dArry5[41] = array(0=>'Every endoscope reprocessed including : date of procedure, patient details, instrument details, temperature of biocide,
	immersion time in biocide');
	$dArry5[42] = array(0=>'Name of person who manually cleaned the instrument, rinsed, disinfected, final rinsed and tested temperature of biocide, time immersed n the biocide, connected the instrument to the AER and removed The scope from the changed');
	$dArry5[43] = array(0=>'Batch number of biocide, date biocide was decanted Into tank
	and date biocide changed');
	$dArry5[44] = array(0=>'Daily test of minimum effective concentration of the biocide (for manual soaking or AER which contain a tank of disinfection for reuse) and name of person Who tested the biocide (each cycle for OPA)');
	$dArry5[45] = array(0=>'A unit based record is kept regardless of the information
	contained in the patient health care record');
	$dArry5[46] = array(0=>'Computer print-outs from an AER are attached to the Unit
	record');

	$dArry6[47] = array(0=>'Testing is performed according to the manufacturers
	Instructions');
	$dArry6[48] = array(0=>'Results of the test are documented as proof of Process and
	name of person performing the test Documented');

	$dArry7[49] = array(0=>'AERs are monitored every four (4) weeks.');
	$dArry7[50] = array(0=>'Duodenoscopes and bronchoscopes are monitored Every four
	(4) weeks');
	$dArry7[51] = array(0=>'All gastrointestinal endoscopes are monitored every Three (3)
	months');
	$dArry7[52] = array(0=>'Endoscopes which are processed through a sterilization cycle and are stored in a wrapped state Are monitored every three (3) months');
	$dArry7[53] = array(0=>'Endoscopes on loan are tested within 2 working days Of receipt of the endoscope. The loan endoscope is then retested according to the schedule for the type Of endoscope if it remains on loan for that interval');
	$dArry7[54] = array(0=>'Further microbiological screening is undertaken in consultation with a Clinical Microbiological if :  Major changes are made in the endoscopy unit  Personnel responsible for reprocessing. There is a clinical suspicion of cross-infection related to endoscopy. Alterations are made to the plumbing of the Endoscopy reprocessing area. New protocols are published. New models of equipment (endoscope or AFER)  Are used. In response to positive surveillance cultures');


	$dArry8[55] = array(0=>'First employed');
	$dArry8[56] = array(0=>'Updated annually');
	$dArry8[57] = array(0=>'Any changed in process');
	$dArry8[58] = array(0=>'New reprocessing equipment purchased');
	$dArry8[59] = array(0=>'New medical equipment / devices requiring Reprocessing
	purchased');

	$dArry9[60] = array(0=>'Ultra sonic washers');
	$dArry9[61] = array(0=>'AER machines have a cycle for auto-disinfection');
	$dArry9[62] = array(0=>'Manual disinfection systems');

	$dArry10[63] = array(0=>'Standard Precautions and Workplace Health and Safety protocols are applied during all stages of Cleaning and
	reprocessing of endoscopes');
	$dArry10[64] = array(0=>'Items designated to be reprocessed are processed to A level
	for their intended use');
	$dArry10[65] = array(0=>'Material Safety Data Sheets (MSDS) are available for All cleaning agents and chemicals. MSDS have been read and understood by staff Prior to initial use');
	$dArry10[66] = array(0=>'Process are in place to notify the Unit Manager or Shift coordinator of all faults with AER and Endoscope reprocessing');
	$dArry10[67] = array(0=>'Incidents relating to the reprocessing of endoscopes Are reported, risk rated and actions taken are Documented. Endoscopy Unit is provided with a summary of Incidents
	regularly (e.g. HICC / ICT / Safety)');
	$dArry10[68] = array(0=>'There is a record available to subsequent users of the stored gastroscopes and colonoscopes indicating The date and time
	they were last reprocessed');








/*print_r($dArry);
die();
foreach ($dArry as $key => $value) {
	
}
*/

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('blod_trans_sfty_chklst/blod_trans_sfty_chklst_count.php').fadeIn("slow");
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
                        <div class="panel-heading" style="padding-left:0;height: 60px;">
                            HIC Audit
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i> Create New HIC Audit</b></button>
                        </div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<!-- <div class="col-lg-12">
											<label class="col-lg-2">Sr. No.</label>
											<div class="col-lg-4" id="sr">
												<input type="text" name="sr_no" id="sr_no" class="form-control" value="<?= $cid ?>" readonly />
											</div>
										</div>  -->
									<div class="col-lg-12">
										<label class="col-md-2">Quarter</label>
										<div class="col-lg-4">
											<!-- <input type="text" name="quarter" id="quarter" value="<?= $mVal ?>"  class="form-control" readonly /> -->
											<select type="text" name="quarter" id="quarter"  class="form-control" />
											<option value="1" <?= ($mVal == 1)? 'selected': '' ?>>Quarter 1 (January)</option>
											<option value="2" <?= ($mVal == 2)? 'selected': '' ?>>Quarter 2 (April)</option>
											<option value="3" <?= ($mVal == 3)? 'selected': '' ?>>Quarter 3 (July)</option>
											<option value="4" <?= ($mVal == 4)? 'selected': '' ?>>Quarter 4 (October)</option>
										</select> 
										</div>
										<label class="col-md-2">Month</label>
										<div class="col-lg-4">
											<input type="text" name="month" id="month" value="<?= $mth ?>" class="form-control" readonly>
											<!-- <select type="text" name="month" id="month"  class="form-control" disabled="true" />
											<option value="1"><?= date('F') ?></option>
											 <option value="2" <?= ($mVal == 2)? 'selected': '' ?>><?= date('F') ?></option>
											<option value="3" <?= ($mVal == 3)? 'selected': '' ?>><?= date('F') ?></option>
											<option value="4" <?= ($mVal == 4)? 'selected': '' ?>><?= date('F') ?></option> 
										</select> -->
									</div>
										
								</div>
								<div class="col-lg-12">
									<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Endoscopy </label>
									<div class="col-lg-12">
										<table class="table table-bordered">
													<thead>
														<tr>
															<th>sr.no</th>
															<th width="30%"><strong>Endoscopy
															<th>Yes</th>
															<th>No</th>
															<th>NA</th>
															<th>Comment</th>
														</tr>
														</thead>
														<tbody>
															<tr>
															
															<th colspan="6"><strong>Operations</strong></th>
															
														</tr>
														<?php 
															$n = 1;
															$k = 1;
															//$arrVal = array();

														 foreach ($dArry as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>
														<tr>
															
															<th colspan="6"><strong>A protocol for scope manual cleaning is followed and includes but is not limited to :</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry1 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>When manual disinfection of endoscopes is Undertaken :</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry2 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>When an AER machine is utilized for disinfection</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry3 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>Gastroscopes and colonoscopes are stored in Either:</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry4 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>QUALITY ASSURANCE</strong></th>
															
														</tr>
														<tr>
															
															<th colspan="6"><strong>Records are kept and shall include, but are not Limited to the following :</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry5 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														

														<tr>
															
															<th colspan="6"><strong>The efficacy of the ultrasonic cleaner is tested Daily or when used</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry6 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>Microbiological testing of endoscopes and AFER Are routinely performed</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry7 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>EDUCATION</strong></th>
															
														</tr>
														<tr>
															
															<th colspan="6"><strong>Managed and staff are educated on how to Reprocess instruments when :</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry8 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>Evidence is available of staff who have been Trained in the use of decontamination equipment Including :</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry9 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														<tr>
															
															<th colspan="6"><strong>MANAGEMENT</strong></th>
															
														</tr>
														<?php
														$k = 1;
														foreach ($dArry10 as $value) {  ?>
															<tr>
																<td><?= $k ?></td>
																<td><?=$value[0]?></td>
																<td>
																	<input type="hidden" name="arrVal[<?= $n ?>][0]" value="<?= $n ?>">
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_Yes" value="Yes" checked>Yes
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_No" value="No">No
																	</label>
																</td>
																<td>
																	<label class="radio-inline">
				<input type="radio" name="arrVal[<?= $n ?>][1]" id="yn<?= $n ?>_NA" value="NA">NA
																	</label>
																</td>
																<td>
			<textarea name="arrVal[<?= $n ?>][2]" rows="2" id="cmt<?= $n ?>" cols="40"></textarea></td>
															</tr>
														<?php  $k++; $n++; } ?>

														

														
													</tbody>
												</table>
											</div>
											
											
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										
											
											
										<div class="col-lg-12">
											<label class="col-lg-3">Name</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="name" id="name" 
												 placeholder="Name" class="form-control" />
											</div>
											<label class="col-lg-3">Sign</label>
											<div class="col-lg-9">
												<input type="text" autocomplete="off" name="sign" id="sign" 
												 placeholder="Sign" class="form-control" />
												 <input type="hidden" name="tbl" value="tbl_audit_hh18">
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">	
												<input type="hidden" name="user_id" id="user_id" />
												<input type="hidden" name="operation" id="operation" />
												<button  style="color: white;font-weight: bold;"
 accesskey="s" type="submit" name="action" id="action" class="btn btn-primary pull-right" />Submit ( Alt + s )</button>
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
											    <th>Quarter</th> 
												<th>Month</th>	
												<th>Date</th>
												<th>Name</th>	
												<th>Sign</th>	
												
												
											</tr>
										</thead>
									</table>
								</div>
							</div>
							
                        </div>
                        <div class="col-lg-12" style="text-align:center">
								<form method="post" action="audit_hh/hic18Pdf.php"  target="print_popup"  onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
									<div class="panel-heading">
										<div class="col-lg-2" style="color: black;">
											Audit Details(Report)
										</div>
										<div class="col-lg-3">
											<select name="quater" id="quater"  class="form-control">
													<option value="">---Select Quarter---</option>
													<option value="1">1 (January)</option>
													<option value="2">2 (April)</option>
													<option value="3">3 (July)</option>
													<option value="4">4 (October)</option>
											</select>
										</div>
										<label class="col-lg-1">Year</label>
										<div class="col-lg-3">
											<select name="yr" id="yr" class="form-control">
												
												<?php
													 $currentYear = date('Y');
													 for($i = date('Y') ; $i > 2010; $i--) {
													 	?>
													 	<option value='<?= $i ?>' <?= ($i == $currentYear)? 'selected': '' ?>> <?= $i ?></option > 
													 	<?php
													 }
												 ?>
											</select>
										</div>
										<input type="hidden" name="tblname" value="tbl_audit_hh18">
										
										<div class="col-lg-1">
											<input type="submit" style="color: white;"  name="export" class="btn btn-danger" value="Report(PDF)" />
										</div>
									</div>
								</form>
							</div>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="col-lg-12" style="padding-left:0;">
							<label class="col-lg-1">Quarter</label>
							<div class="col-lg-3">
								<select name="qut" id="qut" class="form-control">
									<option value="1">1(January)</option>
									<option value="2">2(April)</option>
									<option value="3">3(July)</option>
									<option value="4">4(October)</option>
								</select>
							</div>
							<label class="col-lg-1">Year</label>
										<div class="col-lg-3">
											<select name="yrg" id="yrg" class="form-control">
												
												<?php
													 $currentYear = date('Y');
													 for($i = date('Y') ; $i > 2010; $i--) {
													 	?>
													 	<option value='<?= $i ?>' <?= ($i == $currentYear)? 'selected': '' ?>> <?= $i ?></option > 
													 	<?php
													 }
												 ?>
											</select>
										</div>
							<div class="col-lg-4">
								<button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="line_chart()" >Graph</button>
							</div>
						</div>
					</div>
				</div> 
				 <div class="form-group">
					<div class="col-sm-12">
						<div id="line_chart1" style="height:400px;"></div>
					</div>
				</div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style="text-align: center;"><b><font color="#000000">Endoscopy</font></b></p>
                
        			<div class="dash"></div>
            </div>
            <!-- <div class="modal-footer">
	           
	           
	       </div> -->
        </div>
    </div>
</div>
    <!-- /#wrapper -->
    <!-- jQuery -->  
    </div>
    </section>  
</body>
</html>
 <script>
   

  
    	$(document).on('click', '#myModel', function(){
		  var recipient = $(this).data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var uid = recipient;
          //alert(uid);
 
            $.ajax({
                method:"POST",
				url: "audit_hh/hic18Excel.php",
				data:{user_id:uid,tbl:'tbl_audit_hh18',ptbl:'ptbl'},
                cache: false,
                success: function (data) {
                	$('#exampleModal').modal('show');
                	$('.dash').html(data);
                    /*console.log(data);
                    modal.find*/
                },
                error: function(err) {
                    console.log(err);
                }
            });  
		});


		$(function() {
		  $('#excel').click(function() {
		    var url = 'data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html())
		    location.href = url
		    return false
		  })
		});


 </script>
<script>	
	$(document).ready(function() {
		$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
		});		
		$("#list-date").datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
		});
				
		$(function(){  
			$("#list-date").datepicker();
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
			$("#action").attr("disabled", false);
			//$('#sr').load("blod_trans_sfty_chklst/load_blod_trans_sfty_chklst.php");
			$('#nm').text("New Receipt");
		});
		$('#close_btn').click(function(){
			$('#user_form')[0].reset();
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
				url:"audit_hh/fetch_all_data.php",
				type:"POST",
				data:{tbl:'tbl_audit_hh18'}
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
			var item_no = $('#item_no').val();
			if(item_no != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"audit_hh/hh1.php",
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
							dataTable.ajax.reload();
						}
					});
				}
			}else{
				alert('Please enter Remarks');
				$('#item_no').focus();
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"audit_hh/update_audit.php",
				method:"POST",
				data:{user_id:user_id,tbl:'tbl_audit_hh18'},
				dataType:"json",
				success:function(data)
				{
					$('#bx1').show('fast');
					$('#adm').show('fast');
					$('#add_btn').hide('fast');
					$('#bx2').hide('fast');
					$('#cb').show();
					$('#item_no').focus();
					$('#sr_no').val(data.mthId);
					$("#month").val(data.month);
					$("#quarter").val(data.quarter);
					$('#name').val(data.name);
					$('#sign').val(data.sign);
					var lp = data.data;
					for (i = 0; i < lp.length; i++) {
						console.log('#yn'+lp[i][0]+'_'+lp[i][1]);
						$('#yn'+lp[i][0]+'_Yes').attr('checked', false);
						$('#yn'+lp[i][0]+'_'+lp[i][1]).attr('checked', true);
						$('#cmt'+lp[i][0]).val(lp[i][2]);
						
					}
					$('#user_id').val(data.mthId);
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
					url:"audit_hh/delete_form.php",
					method:"POST",
					data:{user_id:user_id,tbl:'tbl_audit_hh18'},
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
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages':['corechart']});
		  
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(line_chart);
		
		function line_chart() 
		{
			var qut = $('#qut').val();
			var yrg = $('#yrg').val();
			var tbl = $('input[name="tbl"]').val();

			
			if(qut != '')
			{
				// chart one
				var jsonData = $.ajax({
				url: 'audit_hh/chart.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{qut:qut,tbl:tbl,yrg:yrg},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Audit Details',
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
								
			}	
		}	
</script>