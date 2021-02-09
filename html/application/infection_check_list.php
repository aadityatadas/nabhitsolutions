<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header.php";
	include"footer.php";
	include"location_checklist.php";
//   foreach($checklist_locations as $loc)
// {
 
//   print_r($loc["loc_name"]);
//   print_r($loc["loc_checklist_id"]);

//   echo "<br>";
  
// }
// die();
  
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
	$('#hosp').load('infc_cntrl_chklist/infcCtrl_chklst_count.php').fadeIn("slow");
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
                            Infection control checklist<small>&nbsp;(Safety Related to Infection Control)</small>
							<button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button>
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
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Hand Hygiene</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Hand Hygiene</div>
											<div class="col-lg-4">
												<select type="text" name="hand_hygn_yn" id="hand_hygn_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>

												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="hand_hygn_loc" id="hand_hygn_loc" onChange="LoadData();" class="form-control" />

													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?> 
                               <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="hand_hygn_rmrk" id="hand_hygn_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>

										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Standard Precaution</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Standard Precaution</div>
											<div class="col-lg-4">
												<select type="text" name="stndrd_precation_yn" id="stndrd_precation_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="stndrd_precation_loc" id="stndrd_precation_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                                <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="stndrd_precation_rmrk" id="stndrd_precation_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> BMW</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >BMW</div>
											<div class="col-lg-4">
												<select type="text" name="bmw_yn" id="bmw_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="bmw_loc" id="bmw_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
							<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?> 
                               <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="bmw_rmrk" id="bmw_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Immunization</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Immunization</div>
											<div class="col-lg-4">
												<select type="text" name="immunization_yn" id="immunization_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="immunization_loc" id="immunization_loc" onChange="LoadData();" class="form-control" />

								<option value="">Select</option>
	                           <?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>
													
													<!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="immunization_rmrk" id="immunization_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Needle stick /Occupational exposure</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Needle stick /Occupational exposure</div>
											<div class="col-lg-4">
												<select type="text" name="needle_stick_occ_expose_yn" id="needle_stick_occ_expose_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="needle_stick_occ_expose_loc" id="needle_stick_occ_expose_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-12"></div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="needle_stick_occ_expose_rmrk" id="needle_stick_occ_expose_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> CSSD/ Recall</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >CSSD/ Recall</div>
											<div class="col-lg-4">
												<select type="text" name="cssd_recall_yn" id="cssd_recall_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="cssd_recall_loc" id="cssd_recall_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
							<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="cssd_recall_rmrk" id="cssd_recall_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Cleaning , Disinfection, Sterilization Process</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Cleaning , Disinfection, Sterilization Process</div>
											<div class="col-lg-4">
												<select type="text" name="clng_deis_strl_process_yn" id="clng_deis_strl_process_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="clng_deis_strl_process_loc" id="clng_deis_strl_process_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-12"></div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="clng_deis_strl_process_rmrk" id="clng_deis_strl_process_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Isolation Protocol/Transmision precaution</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Isolation Protocol/Transmision precaution</div>
											<div class="col-lg-4">
												<select type="text" name="iso_protcl_trmsn_precation_yn" id="iso_protcl_trmsn_precation_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="iso_protcl_trmsn_precation_loc" id="iso_protcl_trmsn_precation_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
							<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-12"></div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="iso_protcl_trmsn_precation_rmrk" id="iso_protcl_trmsn_precation_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Linen disinfection protocol</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Linen disinfection protocol</div>
											<div class="col-lg-4">
												<select type="text" name="linen_discfcn_protocol_yn" id="linen_discfcn_protocol_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="linen_discfcn_protocol_loc" id="linen_discfcn_protocol_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
							<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="linen_discfcn_protocol_rmrk" id="linen_discfcn_protocol_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Hygiene related to Food </label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Hygiene related to Food </div>
											<div class="col-lg-4">
												<select type="text" name="hyg_reltd_to_food_yn" id="hyg_reltd_to_food_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="hyg_reltd_to_food_loc" id="hyg_reltd_to_food_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
								<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="hyg_reltd_to_food_rmrk" id="hyg_reltd_to_food_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Environmental control</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Environmental control</div>
											<div class="col-lg-4">
												<select type="text" name="envmtl_control_yn" id="envmtl_control_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="envmtl_control_loc" id="envmtl_control_loc" onChange="LoadData();" class="form-control" />
								<option value="">Select</option>
							<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="envmtl_control_rmrk" id="envmtl_control_rmrk" class="form-control" placeholder="Remarks" />
											</div>
											
										</div>
										<div class="col-lg-12">
											<hr />
										</div>
										<div class="col-lg-12">
											<label class="col-md-12" style="color: #333; background-color: #9ac6eb!important; border-color: #9ac6eb!important; text-align: center; padding:10px;"> Care of devices</label>
										    <div class="col-lg-12" style="padding-top: 10px;"></div>
											<div class="col-lg-2" >Care of devices</div>
											<div class="col-lg-4">
												<select type="text" name="care_of_device_yn" id="care_of_device_yn" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option>
												</select>
											</div>
											
											<div class="col-lg-2">Location</div>
											<div class="col-lg-4">
												<select type="text" name="care_of_device_loc" id="care_of_device_loc" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
						<?php   foreach($checklist_locations as $loc): ?>

                                <option value="<?=$loc["loc_name"];?>">
                                	<?=$loc["loc_name"];?></option>
  
  
                              <?php endforeach;  ?>  <!-- <option value="Yes">Yes</option>
													<option value="No">No</option>
													<option value="N/A">N/A</option> -->
												</select>
											</div>
											<div class="col-lg-2">Remark</div>
											<div class="col-lg-10">
												<input type="text" name="care_of_device_rmrk" id="care_of_device_rmrk" class="form-control" placeholder="Remarks" />
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
											</div>
											<label class="col-md-3">Date & Time</label>
											<div class="col-md-4">
												<input type="text" autocomplete="off" name="list-date" id="list-date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-md-4">
												<input type="time" name="list-time" id="list-time" placeholder="hh:mm" class="form-control" />
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
								<div id="order-table" class="table-responsive">
									<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
										<thead style="font-size:12px;color:darkblue;">
											<tr>
												<th>Action</th>
												<th>Sr.No.</th>
												<th>Name</th>	
												<th>Sign</th>	
												<th>Date</th>	
												<th>Time</th>
												
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<!-- <div class="panel panel-default">
									<div class="panel-heading">
										Indicator & Graphs (Month : <?php echo date('M-Y');?>)
									</div>
									<div class="panel-body">
										<div id="hosp">
					
										</div>
									</div>									
								</div> -->
								<!-- /.panel -->
							</div>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p style= colspan=6 height="28" align="center" valign=middle><b><font size=6 color="#000000">Infection control checklist</font></b></p>
            </div>
            <div style="padding-left: 70px; margin-bottom: 30px; margin-top: 30px;">
            <div class="dash">
             <!-- Content goes in here -->
            </div>
            </div>
        </div>
    </div>
</div>
    <!-- /#wrapper -->
    <!-- jQuery -->    
</body>
</html>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "infc_cntrl_chklist/editdata.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
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
			$('#sr').load("infc_cntrl_chklist/load_infcCtrl_chklst.php");
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
				url:"infc_cntrl_chklist/fetch_all_infcCtrl_chklst_form.php",
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
			var item_no = $('#item_no').val();
			if(item_no != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"infc_cntrl_chklist/insert_infcCtrl_chklst_form.php",
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
				url:"infc_cntrl_chklist/fetch_single_infcCtrl_chklst_form.php",
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
					$('#item_no').focus();
					$('#sr_no').val(data.sr_no);
					$('#name').val(data.name);
					$('#sign').val(data.sign);
					$('#list-date').val(data.date1);
					$('#list-time').val(data.time1);
					$('#hand_hygn_yn').val(data.hand_hygn_yn);
					$('#hand_hygn_loc').val(data.hand_hygn_loc);
					$('#hand_hygn_rmrk').val(data.hand_hygn_rmrk);
					$('#stndrd_precation_yn').val(data.stndrd_precation_yn);
					$('#stndrd_precation_loc').val(data.stndrd_precation_loc);
					$('#stndrd_precation_rmrk').val(data.stndrd_precation_rmrk);
					$('#bmw_yn').val(data.bmw_yn);
					$('#bmw_loc').val(data.bmw_loc);
					$('#bmw_rmrk').val(data.bmw_rmrk);
					$('#immunization_yn').val(data.immunization_yn);
					$('#immunization_loc').val(data.immunization_loc);
					$('#immunization_rmrk').val(data.immunization_rmrk);
					$('#needle_stick_occ_expose_yn').val(data.needle_stick_occ_expose_yn);
					$('#needle_stick_occ_expose_loc').val(data.needle_stick_occ_expose_loc);
					$('#needle_stick_occ_expose_rmrk').val(data.needle_stick_occ_expose_rmrk);
					$('#cssd_recall_yn').val(data.cssd_recall_yn);
					$('#cssd_recall_loc').val(data.cssd_recall_loc);
					$('#cssd_recall_rmrk').val(data.cssd_recall_rmrk);
					$('#clng_deis_strl_process_yn').val(data.clng_deis_strl_process_yn);
					$('#clng_deis_strl_process_loc').val(data.clng_deis_strl_process_loc);
					$('#clng_deis_strl_process_rmrk').val(data.clng_deis_strl_process_rmrk);
					$('#iso_protcl_trmsn_precation_yn').val(data.iso_protcl_trmsn_precation_yn);
					$('#iso_protcl_trmsn_precation_loc').val(data.iso_protcl_trmsn_precation_loc);
					$('#iso_protcl_trmsn_precation_rmrk').val(data.iso_protcl_trmsn_precation_rmrk);
					$('#linen_discfcn_protocol_yn').val(data.linen_discfcn_protocol_yn);
					$('#linen_discfcn_protocol_loc').val(data.linen_discfcn_protocol_loc);
					$('#linen_discfcn_protocol_rmrk').val(data.linen_discfcn_protocol_rmrk);
					$('#hyg_reltd_to_food_yn').val(data.hyg_reltd_to_food_yn);
					$('#hyg_reltd_to_food_loc').val(data.hyg_reltd_to_food_loc);
					$('#hyg_reltd_to_food_rmrk').val(data.hyg_reltd_to_food_rmrk);
					$('#envmtl_control_yn').val(data.envmtl_control_yn);
					$('#envmtl_control_loc').val(data.envmtl_control_loc);
					$('#envmtl_control_rmrk').val(data.envmtl_control_rmrk);
					$('#care_of_device_yn').val(data.care_of_device_yn);
					$('#care_of_device_loc').val(data.care_of_device_loc);
					$('#care_of_device_rmrk').val(data.care_of_device_rmrk);
					
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
					url:"infc_cntrl_chklist/delete_infcCtrl_chklst_form.php",
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
			var frdate = $('#frdate').val();
			var todate = $('#todate').val();
			if(frdate != '' && todate != '')
			{
				// chart one
				var jsonData = $.ajax({
				url: 'pharmacy_register_chart-1.php',
				dataType:"json",
				method:"POST",
				async: false,
				data:{frdate:frdate,todate:todate},
				success: function(jsonData)
					{
						var options = 
						{
							title:'Pharmacy Regisatration Details',
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
				url: 'pharmacy_register_chart-2.php',
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
							dataOpacity: 0.3
						};
						var data = new google.visualization.arrayToDataTable(jsonData);	
						var chart = new google.visualization.ColumnChart(document.getElementById('line_chart2'));
						chart.draw(data, options);
						
					}	
				}).responseText;				
			}	
		}	
</script>