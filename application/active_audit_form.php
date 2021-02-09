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
	$number = range(1,5);
	
	date_default_timezone_set('Asia/Calcutta');	
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#hosp').load('active_file_audit/active_file_audit_count.php').fadeIn("slow");
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
	<style type="text/css" media="screen">
	/*	@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");*/
.panel-title > a:before {
    float: right !important;
    font-family: FontAwesome;
    content:"\f068";
    padding-right: 5px;
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #9ac6eb!important;
    border-color: #9ac6eb!important;
}
.panel-title > a.collapsed:before {
    float: right !important;
    content:"\f067";
}
.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
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
                             Active file Audit Form
							<!-- <button accesskey="n" type="button" name="add_btn" id="add_btn" class="btn btn-default btn-xs pull-right" ><b><i class="fa fa-plus-square fa-fw"></i>+ Create New</b></button> -->
                        </div>
                        <br>
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
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Name of the Patient</label>
											<div class="col-lg-7">
												<input type="text" name="p_name" id="p_name" class="form-control" readonly />
											</div>
										</div> -->
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
										<!-- <div class="col-lg-12">
											<label class="col-lg-4">Date & Time of Admission</label>
											<div class="col-lg-4">	
												<input type="text" name="d_adm" id="d_adm" class="form-control" readonly />
											</div>
											<div class="col-lg-4">	
												<input type="text" name="t_adm" id="t_adm" class="form-control" readonly />
											</div>
										</div> -->

										<div class="col-md-12">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
             <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          General Consent 
        </a>
      </h4>

        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

           
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="p_name" id="p_name" class="form-control" placeholder="Name" readonly/>
											</div>
							 <label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="General-Consent-sign" id="General-Consent-sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												

												<input type="text" name="d_adm" id="d_adm" class="form-control" readonly />
											</div>
											<label class="col-lg-2">Time</label>
											
											
											
											<div class="col-lg-4">
												
												<input type="time" name="t_adm" id="t_adm" class="form-control" readonly/>
											</div>
											<!-- <label class="col-lg-2">Remarks</label>
											
											
											
											<div class="col-lg-10">
												<input type="text" name="General-Consent-remarks" id="General-Consent-remarks" class="form-control" placeholder="Remarks" />
											</div> -->
             </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Doctor’s Initial Assessment Form / Emergency Assessment Fom
        </a>
      </h4>

        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
            	
											<label class="col-md-2">Date & Time of Arrival Patient</label>
											<div class="col-md-2">
							<input type="text" autocomplete="off" name="dIEfrm_dt_arvl_patnt_date" id="dIEfrm_dt_arvl_patnt_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-md-2">
					<input type="time" 
					name="dIEfrm_dt_arvl_patnt_time" 
					id="dIEfrm_dt_arvl_patnt_time" placeholder="hh:mm" 
					class="form-control" />
											</div>
										

										<label class="col-md-2">Date & Time of IA Complete</label>
											<div class="col-md-2">
												<input type="text" autocomplete="off" 
												name="dIEfrm_dt_ia_cmplt_date" 
												id="dIEfrm_dt_ia_cmplt_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-md-2">
												<input type="time" 
												name="dIEfrm_dt_ia_cmplt_time" 
												id="dIEfrm_dt_ia_cmplt_time" placeholder="hh:mm" class="form-control" />
											</div>
										<div class="col-md-12"></div>

                                        <label class="col-lg-2">Pain assessment and score</label>
										<div class="col-lg-4">

											<select type="text" name="dIEfrm_pa_ass_scr" id="dIEfrm_pa_ass_scr" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>

                         
											<label class="col-lg-2">History</label>
											<div class="col-lg-4">
												
											<select type="text" name="dIEfrm_histry" id="dIEfrm_histry" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>

											</div>
											<div class="col-md-10"></div>
											<label class="col-lg-2">GCS Score</label>
											<div class="col-lg-4">
												<select type="text" name="dIEfrm_gsc_scr" id="dIEfrm_gsc_scr" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>

												
											</div>

                                
											<label class="col-lg-2">Vitals</label>
											<div class="col-lg-4">
												
												<!-- <input type="text" name="Vitals" id="Vitals" class="form-control" placeholder="Vitals" /> -->
									<select type="text" name="dIEfrm_vital" 
									id="dIEfrm_vital" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>
											</div>
											<label class="col-lg-2">Remarks</label>
											
											
											
											<div class="col-lg-10">
												<input type="text" 
												name="dIEfrm_vital_remarks" 
												id="dIEfrm_vital_remarks" 
												class="form-control" placeholder="Remarks" />
											</div>


									</div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Doctor Care Plan
        </a>
      </h4>

        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
            								<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="dcp_sign" id="dcp_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="dcp_name" id="dcp_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="dcp_date" id="dcp_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											
											
											
											<div class="col-lg-4">
												
												<input type="time" name="dcp_time" id="dcp_time" class="form-control" placeholder="hh:mm" />
											</div>

											<label class="col-lg-2">Remarks</label>
											
											
											
											<div class="col-lg-10">
												<input type="text" name="dcp_remarks" id="dcp_remarks" class="form-control" placeholder="Remarks" />
											</div>

            </div>
        </div>
    </div>

     <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Doctor Notes
        </a>
      </h4>

        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
            	
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="dn_sign" id="dn_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="dn_name" id="dn_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="dn_date" id="dn_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
										
											<div class="col-lg-4">
												
												<input type="time" name="dn_time" id="dn_time" class="form-control" placeholder="hh:mm" />
											</div>
						<label class="col-lg-2">Vitals</label>
											<div class="col-lg-4">
												
												<!-- <input type="text" name="Vitals" id="Vitals" class="form-control" placeholder="Vitals" /> -->
									<select type="text" name="dn_vital" id="dn_vital" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>
											</div>
						<label class="col-lg-2">Pain assessment and score</label>
										<div class="col-lg-4">

											<select type="text" name="dn_pa_ass_scr" id="dn_pa_ass_scr" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
										</div>
							<div class="col-lg-12"></div>
											<label class="col-lg-2">Remarks</label>
											
											
											
											<div class="col-lg-10">
												<input type="text" name="dn_remarks" id="dn_remarks" class="form-control" placeholder="Remarks" />
											</div>
            </div>
        </div>
    </div>

         <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFive">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Nursing Assessment Sheet
        </a>
      </h4>

        </div>
        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">

            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="nas_sign" id="nas_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="nas_name" id="nas_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="nas_date" id="nas_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="nas_time" id="nas_time" class="form-control" placeholder="hh:mm" />
											</div>


											
											<label class="col-md-2">Date & Time of Arrival Patient</label>
											<div class="col-md-2">
												<input type="text" autocomplete="off" name="nas_date_arv_ptnt" id="nas_date_arv_ptnt" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-md-2">
												<input type="nas_time" name="nas_time_arv_ptnt" id="nas_time_arv_ptnt" placeholder="hh:mm" class="form-control" />
											</div>
										

										<label class="col-md-2">Date & Time of IA Complete</label>
											<div class="col-md-2">
												<input type="text" autocomplete="off" name="nas_date_ia_cmplt" id="nas_date_ia_cmplt" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<div class="col-md-2">
												<input type="time" name="nas_time_ia_cmplt" id="nas_time_ia_cmplt" placeholder="hh:mm" class="form-control" />
											</div>
										
                                        <div class="col-md-12"></div>
										<label class="col-lg-2">Pain assessment and score</label>
										<div class="col-lg-4">
												
									<select type="text" name="nas_pan_ass_scr" 
									id="nas_pan_ass_scr" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>
											</div>
											
											<label class="col-lg-2">Vitals</label>
											<div class="col-lg-4">
												
												
											<select type="text" name="nas_vital" id="nas_vital" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>
											</div>
											<div class="col-md-12"></div>
											<label class="col-lg-2">Morse fall scale</label>
											<div class="col-lg-10">
												
										<select type="text" name="nas_morse_fall_scale" id="nas_morse_fall_scale" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="nas_remarks" id="nas_remarks" class="form-control" placeholder="Remarks" />
											</div>




            </div>
        </div>
    </div>

      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingSix">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Nursing Care Plan
        </a>
      </h4>

        </div>
        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
            <div class="panel-body">
            	
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="ncp_sign" id="ncp_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="ncp_name" id="ncp_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="ncp_date" id="ncp_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="ncp_time" id="ncp_time" class="form-control" placeholder="hh:mm" />
											</div>

											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="ncp_remarks" id="ncp_remarks" class="form-control" placeholder="Remarks" />
											</div>

            </div>
        </div>
    </div>

   <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingSeven">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          Nursing Progress Sheet
        </a>
      </h4>

        </div>
        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
            <div class="panel-body">
            	
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="nps_sign" id="nps_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="nps_name" id="nps_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="nps_date" id="nps_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="nps_time" id="nps_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Handover taken by & from</label>
											<div class="col-lg-10">
												<input type="text" name="nps_handovr_tkn_by_from" id="nps_handovr_tkn_by_from" class="form-control" placeholder="Handover taken by & from" />
											</div>
											<div class="col-md-12"></div>

											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="nps_remarks" id="nps_remarks" class="form-control" placeholder="Remarks" />
											</div>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingEight">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          Nutritional Assessment 
        </a>
      </h4>

        </div>
        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="nuAss_sign" id="nuAss_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="nuAss_name" id="nuAss_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="nuAss_date" id="nuAss_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="nuAss_time" id="nuAss_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="nuAss_remarks" id="nuAss_remarks" class="form-control" placeholder="Remarks" />
											</div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingNine">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
          Physiotherapy Assessment
        </a>
      </h4>

        </div>
        <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
            <div class="panel-body">
            								<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="phys_ass_sign" id="phys_ass_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="phys_ass_name" id="phys_ass_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="phys_ass_date" id="phys_ass_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="phys_ass_time" id="phys_ass_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="phys_ass_remarks" id="phys_ass_remarks" class="form-control" placeholder="Remarks" />
											</div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTen">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
          Medication Chart
        </a>
      </h4>

        </div>
        <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
            <div class="panel-body">
            								<label class="col-lg-2">Medication in CAPS</label>
											<div class="col-lg-4">
												<input type="text" name="medictin_chrt_in_caps" id="medictin_chrt_in_caps" class="form-control" placeholder="Medication in CAPS" />
											</div>
											<label class="col-lg-2">High Risk Drug double verified</label>
											<div class="col-lg-4">
												<!-- <input type="text" name="medictin_chrt_drug" id="medictin_chrt_drug" class="form-control" placeholder="High Risk Drug double verified" /> -->

										<select type="text" name="medictin_chrt_risk_vrfd" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-md-12"></div>
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="medictin_chrt_sign" id="medictin_chrt_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="medictin_chrt_name" id="medictin_chrt_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="medictin_chrt_date" id="medictin_chrt_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="medictin_chrt_time" id="medictin_chrt_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="medictin_chrt_remarks" id="medictin_chrt_remarks" class="form-control" placeholder="Remarks" />
											</div>
            </div>
        </div>
    </div>

<div class="panel-body">
	        <div class="col-lg-12">

	             	<label class="col-lg-2">Investigation Sheet</label>
							<div class="col-lg-4">
												<!-- <input type="text" 
												name="invstigation_sheet" 
												id="invstigation_sheet" class="form-control" placeholder="Investigation Sheet" />
 -->
										<select type="text" 
										name="invstigation_sheet" 
									id="invstigation_sheet" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>
								</div>
					
		
											
						</div> 
						</div>   

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingEleven">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
          Blood Transfusion Consent
        </a>
      </h4>

        </div>
        <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
            <div class="panel-body">
            	
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="btCsnt_sign" id="btCsnt_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="btCsnt_name" id="btCsnt_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="btCsnt_date" id="btCsnt_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="btCsnt_time" id="btCsnt_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="btCsnt_remarks" id="btCsnt_remarks" class="form-control" placeholder="Remarks" />
											</div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwele">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwele" aria-expanded="false" aria-controls="collapseTwele">
          Restrain Consent
        </a>
      </h4>

        </div>
        <div id="collapseTwele" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwele">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="resCsnt_sign" id="resCsnt_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="resCsnt_name" id="resCsnt_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="resCsnt_date" id="resCsnt_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="resCsnt_time" id="resCsnt_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="resCsnt_remarks" id="resCsnt_remarks" class="form-control" placeholder="Remarks" />
											</div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThirteen">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
          Procedure Consent
        </a>
      </h4>

        </div>
        <div id="collapseThirteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThirteen">
            <div class="panel-body"><label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="pCsnt_sign" id="pCsnt_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="pCsnt_name" id="pCsnt_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="pCsnt_date" id="pCsnt_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="pCsnt_time" id="pCsnt_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="pCsnt_remarks" id="pCsnt_remarks" class="form-control" placeholder="Remarks" />
											</div>
										</div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingHIV">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseHIV" aria-expanded="false" aria-controls="collapseHIV">
          HIV Consent
        </a>
      </h4>

        </div>
        <div id="collapseHIV" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingHIV">
            <div class="panel-body"><label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="hivCsnt_sign" id="hivCsnt_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="hivCsnt_name" id="hivCsnt_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="hivCsnt_date" id="hivCsnt_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="hivCsnt_time" id="hivCsnt_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="hivCsnt_remarks" id="hivCsnt_remarks" class="form-control" placeholder="Remarks" />
											</div>
										</div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFifteen">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
          Bundle Check List
        </a>
      </h4>

        </div>
        <div id="collapseFifteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFifteen">
            <div class="panel-body">

            	                    <label class="col-lg-2">Catheter insertion bundle form</label>
											<div class="col-lg-4">
												<!-- <input type="text" name="bcl_cather_frm" id="bcl_cather_frm" class="form-control" placeholder="Catheter insertion bundle form" /> -->
<select type="text" name="bcl_cather_frm" 
									id="bcl_cather_frm" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>
											</div>
											<label class="col-lg-2">ventilator insertion bundle form</label>
											<div class="col-lg-4">
												<!-- <input type="text" name="bcl_ventr_frm" id="bcl_ventr_frm" class="form-control" placeholder="ventilator insertion bundle form" /> -->
	       <select type="text" name="bcl_ventr_frm" 
									id="bcl_ventr_frm" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>										
											</div>
											<div class="col-md-12"></div>
											<label class="col-lg-2">central line insertion bundle form</label>
											<div class="col-lg-4">
											<!-- 	<input type="text" name="bcl_line_frn" id="bcl_line_frn" class="form-control" placeholder="central line insertion bundle form" /> -->
	<select type="text" name="bcl_line_frn" 
									id="bcl_line_frn" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>
											</div>
											<label class="col-lg-2">SSI prevention checklist</label>
											<div class="col-lg-4">
												
												<!-- <input type="text" name="bcl_ssl_pvnt_frm" id="bcl_ssl_pvnt_frm" class="form-control" placeholder="SSI prevention checklist" /> -->
   <select type="text" name="bcl_ssl_pvnt_frm" 
									id="bcl_ssl_pvnt_frm" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>
											</div>
											

             </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingSixteen">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
          Blood transfusion monitoring form
        </a>
      </h4>

        </div>
        <div id="collapseSixteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSixteen">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="btmf_sign" id="btmf_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="btmf_name" id="btmf_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="btmf_date" id="btmf_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="btmf_time" id="btmf_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Start and end time</label>
											<div class="col-lg-2">
												<input type="text" autocomplete="off" name="btmf_s_e_date" id="btmf_s_e_date" placeholder="yyyy-mm-dd" class="form-control" /></div>
												<div class="col-lg-2">
												<input type="time" name="btmf_s_e_time" id="btmf_s_e_time" class="form-control" placeholder="hh:mm" />
											</div>
											<label class="col-lg-2">Vitals</label>
											<div class="col-lg-4">
											<!-- 	<input type="text" name="btmf_Vitals" id="btmf_Vitals" class="form-control" placeholder="Vitals" /> -->
        <select type="text" name="btmf_vital" id="btmf_vital" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>

											</div>
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="btmf_remarks" id="btmf_remarks" class="form-control" placeholder="Remarks" />
											</div>

             </div>
        </div>
    </div>


        <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingSeventeen">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
          Daily Monitoring Chart
        </a>
      </h4>

        </div>
        <div id="collapseSeventeen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeventeen">
            <div class="panel-body">
            						<label class="col-lg-2">Vitals</label>
											<div class="col-lg-4">
												<select type="text" name="dmc_vital" id="dmc_vital" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
										 <?php
                                        
                                                foreach($number as $value): ?>
													<option value="<?=$value; ?>"><?=$value; ?></option>
												<?php  endforeach; ?>	
												</select>
											
											</div>
											<label class="col-lg-2">Pain reassessment and score</label>
											<div class="col-lg-4">
												
									<select type="text" name="dmc_ressmnt_scr" id="dmc_ressmnt_scr" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="col-md-12"></div>
											
											<label class="col-lg-2">Intake & output</label>
											<div class="col-lg-10">
												<input type="text" name="intak_opt" id="intak_opt" class="form-control" placeholder="Intake & output" />
											</div>


             </div>
        </div>
    </div>

   



<div class="col-lg-12">
											<hr />
										</div>
 <div class="panel-body">
	        


                       <div class="col-lg-12">

	             	
						<label class="col-lg-2"> Movement sheet</label>
								<div class="col-lg-4">	
												<select type="text" name="movmnt_sheet" id="pr_optv_chcklst" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
							<label class="col-lg-2">Restrain Form</label>
								<div class="col-lg-4">	
												<select type="text" name="restrn_frm" id="restrn_frm" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											
										</div>  
						           <div class="col-lg-12">

	  



           	
						<label class="col-lg-2">Patients rights & responsibility form</label>
								<div class="col-lg-4">	
												<select type="text" name="patnt_rigt_res_frm" id="patnt_rigt_res_frm" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
							<label class="col-lg-2">Patient and family education chart</label>
								<div class="col-lg-4">	
												<select type="text" name="patnt_f_e_chrt" id="patnt_f_e_chrt" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											
										</div>  
							           <div class="col-lg-12">

	             	
						<label class="col-lg-2">Estimate form</label>
								<div class="col-lg-4">	
												<select type="text" name="esti_frm" id="esti_frm" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
							
										</div>     
</div>


            <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingeightteen">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseeightteen" aria-expanded="false" aria-controls="collapseeightteen">
         Surgery consent 
        </a>
      </h4>

        </div>
        <div id="collapseeightteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeightteen">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="s_c_sign" id="s_c_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="s_c_name" id="s_c_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="s_c_date" id="s_c_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="s_c_time" id="s_c_time" class="form-control" placeholder="hh:mm" />
											</div>
											
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="s_c_remarks" id="s_c_remarks" class="form-control" placeholder="Remarks" />
											</div>

             </div>
        </div>
    </div>

      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingnineteen">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsenineteen" aria-expanded="false" aria-controls="collapsenineteen">
         Anaesthesia consent 
        </a>
      </h4>

        </div>
        <div id="collapsenineteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnineteen">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="a_c_sign" id="a_c_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="a_c_name" id="a_c_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="a_c_date" id="a_c_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="a_c_time" id="a_c_time" class="form-control" placeholder="hh:mm" />
											</div>
											
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="a_c_remarks" id="a_c_remarks" class="form-control" placeholder="Remarks" />
											</div>

             </div>
        </div>
    </div>

<div class="col-lg-12">
											<hr />
										</div>
 <div class="panel-body">
	        <div class="col-lg-12">
					




	             	<label class="col-lg-2">PAC</label>
							<div class="col-lg-4">
												<input type="text" name="pac" id="pac" class="form-control" placeholder="PAC" />
								</div>
					<label class="col-lg-2">Anaesthesia care plan</label>
							<div class="col-lg-4">
												<!-- <input type="text" name="anasthsia_care_plan" id="anasthsia_care_plan" class="form-control" placeholder="Anaesthesia care plan" /> -->
		<select type="text" name="anasthsia_care_plan" 
									id="anasthsia_care_plan" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>					
								</div>
		
											
						</div>

   




<div class="col-lg-12">

	             	
						<label class="col-lg-2">Pre-operative checklist</label>
								<div class="col-lg-4">	
												<select type="text" name="pr_optv_chcklst" id="pr_optv_chcklst" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
							<label class="col-lg-2">Anaesthesia safety checklist</label>
								<div class="col-lg-4">	
												<select type="text" name="anasthsia_sfty_chcklst" id="anasthsia_sfty_chcklst" onChange="LoadData();" class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											
										</div>     
</div>

      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingtwenty">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty" aria-expanded="false" aria-controls="collapsetwenty">
         Surgeon
        </a>
      </h4>

        </div>
        <div id="collapsetwenty" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="surgn_sign" id="surgn_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="surgn_name" id="surgn_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="surgn_date" id="surgn_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="surgn_time" id="surgn_time" class="form-control" placeholder="hh:mm" />
											</div>
											
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="surgn_remarks" id="surgn_remarks" class="form-control" placeholder="Remarks" />
											</div>

             </div>
        </div>
    </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingtwentyone">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsetwentyone" aria-expanded="false" aria-controls="collapsetwentyone">
         Anaesthetist
        </a>
      </h4>

        </div>
        <div id="collapsetwentyone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwentyone">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="anast_sign" id="anast_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="anast_name" id="anast_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="anast_date" id="anast_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="anast_time" id="anast_time" class="form-control" placeholder="hh:mm" />
											</div>
											
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="anast_remarks" id="anast_remarks" class="form-control" placeholder="Remarks" />
											</div>

             </div>
        </div>
    </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingtwentytwo">
             <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsetwentytwo" aria-expanded="false" aria-controls="collapsetwentytwo">
         Nurse
        </a>
      </h4>

        </div>
        <div id="collapsetwentytwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwentytwo">
            <div class="panel-body">
            						<label class="col-lg-2">Sign</label>
											<div class="col-lg-4">
												<input type="text" name="nurse_sign" id="nurse_sign" class="form-control" placeholder="Sign" />
											</div>
											<label class="col-lg-2">Name</label>
											<div class="col-lg-4">
												<input type="text" name="nurse_name" id="nurse_name" class="form-control" placeholder="Name" />
											</div>
											<label class="col-lg-2">Date</label>
											<div class="col-lg-4">
												<input type="text" autocomplete="off" name="nurse_date" id="nurse_date" placeholder="yyyy-mm-dd" class="form-control" />
											</div>
											<label class="col-lg-2">Time</label>
											<div class="col-lg-4">
												
												<input type="time" name="nurse_time" id="nurse_time" class="form-control" placeholder="hh:mm" />
											</div>
											
											<label class="col-lg-2">Remarks</label>
											<div class="col-lg-10">
												<input type="text" name="nurse_remarks" id="nurse_remarks" class="form-control" placeholder="Remarks" />
											</div>

             </div>
        </div>
    </div>


</div>
</div>

<div class="col-lg-12">
											<hr />
										</div>
										






<div class="panel-body">
	        <div class="col-lg-12">

	             	<label class="col-lg-2">Anaesthesia chart</label>
							<div class="col-lg-4">
												<input type="text" name="anaeshts_chart" id="anaeshts_chart" class="form-control" placeholder="Anaesthesia chart" />
								</div>
					<label class="col-lg-2">Intraoperative monitoring record </label>
							<div class="col-lg-4">
												<!-- <input type="text" name="intraptv_mon_rcrd" id="intraptv_mon_rcrd" class="form-control" placeholder="Intraoperative monitoring record" /> -->
<select type="text" name="intraptv_mon_rcrd" 
									id="intraptv_mon_rcrd" onChange="LoadData();" 
									class="form-control" />
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
										</select>
								</div>
		
											
						</div>
	<div class="col-lg-12">

	             	<label class="col-lg-2">Anaesthesia chart</label>
							<div class="col-lg-4">
												<input type="text" name="anaeshts_chart1" id="anaeshts_chart1" class="form-control" placeholder="Anaesthesia chart" />
												
								</div>



					<label class="col-lg-2">Post Anaesthesia Management </label>
							<div class="col-lg-4">
												<input type="text" name="pst_anaeshts_mgmt" id="pst_anaeshts_mgmt" class="form-control" placeholder="Post Anaesthesia Management" />
								</div>
		
											
	</div>
	<div class="col-lg-12">

	             	<label class="col-lg-2">Operative notes</label>
							<div class="col-lg-8">
												<input type="text" name="opertv_notes" id="opertv_notes" class="form-control" placeholder="Operative notes" />
								</div>
					
		
											
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
												<!-- <th>lab ipd id.</th> -->
												<th>Name of the Patient</th>
												<th>UHID No</th>
												<th>IPD No</th>
												<th>Date of Admission</th>
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
    <!-- /#wrapper -->
    <!-- jQuery -->    
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
		$("#dIEfrm_dt_arvl_patnt_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#dIEfrm_dt_ia_cmplt_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#dcp_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#dn_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#nas_date ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#nas_date_arv_ptnt ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#nas_date_ia_cmplt ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#ncp_date ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#nps_date ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#nuAss_date ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#phys_ass_date ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#medictin_chrt_date ").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#btCsnt_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#resCsnt_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#pCsnt_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#hivCsnt_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#btmf_s_e_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#btmf_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#s_c_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#a_c_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#surgn_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#anast_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });
$("#nurse_date").datepicker({

   showOtherMonths: true,

   selectOtherMonths: true,

   changeMonth: true,

   changeYear: true,

  });

				
		$(function(){  
			$("#d_adm").datepicker();
			$("#dddd").datepicker();
			$("#nurse_date").timepicker();
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
			$('#user_id').focus();
			$('#operation').val("Add");
			$("#action").attr("disabled", false);
			$('#sr').load("load_active_file_audit.php");
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
				url:"active_file_audit/fetch_all_active_file_audit_form.php",
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
			var user_id = $('#user_id').val();
			if(user_id != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#action").attr("disabled", true);
					$.ajax({
						url:"active_file_audit/insert_active_file_audit_form.php",
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
				alert('Please enter Item no.');
				$('#user_id').focus();
			}
		});
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			//$('#md1').hide('fast');
			//$('#md2').show('fast');
			$.ajax({
				url:"active_file_audit/fetch_single_active_file_audit_form.php",
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
					$('#sr_no').val(data.sr_no);
					$('#p_name').val(data.p_name);
					$('#uhid_no').val(data.uhid_no);
					$('#ipd_no').val(data.ipd_no);
					$('#d_adm').val(data.d_adm);
					$('#t_adm').val(data.t_adm);
					  $('#dIEfrm_dt_arvl_patnt_date').val(data.dIEfrm_dt_arvl_patnt_date);
						$('#dIEfrm_dt_arvl_patnt_time').val(data.dIEfrm_dt_arvl_patnt_time);
						$('#dIEfrm_dt_ia_cmplt_date').val(data.dIEfrm_dt_ia_cmplt_date);
						$('#dIEfrm_dt_ia_cmplt_time').val(data.dIEfrm_dt_ia_cmplt_time);
						$('#dIEfrm_pa_ass_scr').val(data.dIEfrm_pa_ass_scr);
						$('#dIEfrm_histry').val(data.dIEfrm_histry);
						
						$('#dIEfrm_gsc_scr').val(data.dIEfrm_gsc_scr);
						$('#dIEfrm_vital').val(data.dIEfrm_vital);
						$('#dIEfrm_vital_remarks').val(data.dIEfrm_vital_remarks);
						$('#dcp_sign').val(data.dcp_sign);
						$('#dcp_name').val(data.dcp_name);
						$('#dcp_date').val(data.dcp_date);
						$('#dcp_time').val(data.dcp_time);
						$('#dcp_remarks').val(data.dcp_remarks);
						$('#dn_sign').val(data.dn_sign);
						$('#dn_name').val(data.dn_name);
						$('#dn_date').val(data.dn_date);
						$('#dn_time').val(data.dn_time);
						$('#dn_vital').val(data.dn_vital);
						$('#dn_pa_ass_scr').val(data.dn_pa_ass_scr);
						$('#dn_remarks').val(data.dn_remarks);
						$('#nas_sign').val(data.nas_sign);
						$('#nas_name').val(data.nas_name );
						$('#nas_date').val(data.nas_date );
						$('#nas_time').val(data.nas_time );
						$('#nas_date_arv_ptnt').val(data.nas_date_arv_ptnt );
						$('#nas_time_arv_ptnt').val(data.nas_time_arv_ptnt );
						$('#nas_date_ia_cmplt').val(data.nas_date_ia_cmplt );
						$('#nas_time_ia_cmplt').val(data.nas_time_ia_cmplt );
						$('#nas_pan_ass_scr').val(data.nas_pan_ass_scr );
						$('#nas_vital').val(data.nas_vital );
						$('#nas_morse_fall_scale').val(data.nas_morse_fall_scale );
						$('#nas_remarks').val(data.nas_remarks );
						$('#ncp_sign').val(data.ncp_sign );
						$('#ncp_name').val(data.ncp_name );
						$('#ncp_date').val(data.ncp_date );
						$('#ncp_time').val(data.ncp_time );
						$('#ncp_remarks').val(data.ncp_remarks );
						$('#nps_sign').val(data.nps_sign );
						$('#nps_name').val(data.nps_name );
						$('#nps_date').val(data.nps_date );
						$('#nps_time').val(data.nps_time );
						$('#nps_handovr_tkn_by_from ').val(data.nps_handovr_tkn_by_from );
						$('#nps_remarks').val(data.nps_remarks );
						$('#nuAss_sign').val(data.nuAss_sign );
						$('#nuAss_name').val(data.nuAss_name );
						$('#nuAss_date').val(data.nuAss_date );
						$('#nuAss_time').val(data.nuAss_time );
						$('#nuAss_remarks').val(data.nuAss_remarks );
						$('#phys_ass_sign').val(data.phys_ass_sign );
						$('#phys_ass_name').val(data.phys_ass_name );
						$('#phys_ass_date').val(data.phys_ass_date );
						$('#phys_ass_time').val(data.phys_ass_time );
						$('#phys_ass_remarks').val(data.phys_ass_remarks );
						$('#medictin_chrt_in_caps').val(data.medictin_chrt_in_caps );
						$('#medictin_chrt_sign').val(data.medictin_chrt_sign );
						$('#medictin_chrt_name').val(data.medictin_chrt_name );
						$('#medictin_chrt_date').val(data.medictin_chrt_date );
						$('#medictin_chrt_time').val(data.medictin_chrt_time );
						$('#medictin_chrt_risk_vrfd').val(data.medictin_chrt_risk_vrfd );
						$('#medictin_chrt_remarks').val(data.medictin_chrt_remarks );
						$('#invstigation_sheet').val(data.invstigation_sheet);
						$('#btCsnt_name').val(data.btCsnt_name);
						$('#btCsnt_sign').val(data.btCsnt_sign);
						$('#btCsnt_date').val(data.btCsnt_date);
						$('#btCsnt_time').val(data.btCsnt_time);
						$('#btCsnt_remarks').val(data.btCsnt_remarks);
						$('#resCsnt_name').val(data.resCsnt_name);
						$('#resCsnt_sign').val(data.resCsnt_sign);
						$('#resCsnt_date').val(data.resCsnt_date);
						$('#resCsnt_time').val(data.resCsnt_time);
						$('#resCsnt_remarks').val(data.resCsnt_remarks);
						$('#pCsnt_name').val(data.pCsnt_name);
						$('#pCsnt_sign').val(data.pCsnt_sign);
						$('#pCsnt_date').val(data.pCsnt_date);
						$('#pCsnt_time').val(data.pCsnt_time);
						$('#pCsnt_remarks').val(data.pCsnt_remarks);
						$('#hivCsnt_name').val(data.hivCsnt_name);
						$('#hivCsnt_sign').val(data.hivCsnt_sign);
						$('#hivCsnt_date').val(data.hivCsnt_date);
						$('#hivCsnt_time').val(data.hivCsnt_time);
						$('#hivCsnt_remarks').val(data.hivCsnt_remarks);
						$('#bcl_cather_frm').val(data.bcl_cather_frm);
						$('#bcl_ventr_frm').val(data.bcl_ventr_frm);
						$('#bcl_line_frn').val(data.bcl_line_frn);
						$('#bcl_ssl_pvnt_frm').val(data.bcl_ssl_pvnt_frm);
						$('#btmf_s_e_time').val(data.btmf_s_e_time);
						$('#btmf_s_e_date').val(data.btmf_s_e_date);
						$('#btmf_sign').val(data.btmf_sign);
						$('#btmf_name').val(data.btmf_name);
						$('#btmf_date').val(data.btmf_date);
						$('#btmf_time').val(data.btmf_time);
						$('#btmf_vital').val(data.btmf_vital);
						$('#btmf_remarks').val(data.btmf_remarks);
						$('#dmc_vital').val(data.dmc_vital);
						$('#dmc_ressmnt_scr').val(data.dmc_ressmnt_scr);
						$('#intak_opt').val(data.intak_opt);
						$('#movmnt_sheet').val(data.movmnt_sheet);
						$('#restrn_frm').val(data.restrn_frm);
						$('#patnt_rigt_res_frm').val(data.patnt_rigt_res_frm);
						$('#patnt_f_e_chrt').val(data.patnt_f_e_chrt);
						$('#esti_frm').val(data.esti_frm);
						$('#s_c_sign').val(data.s_c_sign);
						$('#s_c_name').val(data.s_c_name);
						$('#s_c_date').val(data.s_c_date);
						$('#s_c_time').val(data.s_c_time);
						$('#s_c_remarks').val(data.s_c_remarks);
						$('#a_c_sign').val(data.a_c_sign);
						$('#a_c_name').val(data.a_c_name);
						$('#a_c_date').val(data.a_c_date);
						$('#a_c_time').val(data.a_c_time);
						$('#a_c_remarks').val(data.a_c_remarks);
						$('#pac').val(data.pac);
						$('#anasthsia_care_plan').val(data.anasthsia_care_plan);
						$('#pr_optv_chcklst').val(data.pr_optv_chcklst);
						$('#anasthsia_sfty_chcklst').val(data.anasthsia_sfty_chcklst);
						$('#surgn_sign').val(data.surgn_sign);
						$('#surgn_name').val(data.surgn_name);
						$('#surgn_date').val(data.surgn_date);
						$('#surgn_time').val(data.surgn_time);
						$('#surgn_remarks').val(data.surgn_remarks);
						$('#anast_sign').val(data.anast_sign);
						$('#anast_name').val(data.anast_name);
						$('#anast_date').val(data.anast_date);
						$('#anast_time').val(data.anast_time);
						$('#anast_remarks').val(data.anast_remarks);
						$('#nurse_sign').val(data.nurse_sign);
						$('#nurse_name').val(data.nurse_name);
						$('#nurse_date').val(data.nurse_date);
						$('#nurse_time').val(data.nurse_time);
						$('#nurse_remarks').val(data.nurse_remarks);
						$('#anaeshts_chart').val(data.anaeshts_chart);
						$('#intraptv_mon_rcrd').val(data.intraptv_mon_rcrd);
						$('#anaeshts_chart1').val(data.anaeshts_chart1);
						$('#pst_anaeshts_mgmt').val(data.pst_anaeshts_mgmt);
						$('#opertv_notes').val(data.opertv_notes);
						

					
					$('#user_id').val(data.sr_no);
					$('#action').val("Update Details ( Alt + s )");
					
					$('#operation').val(data.action_to_perform);					
					$("#action").attr("disabled", false);					
					$("#action").attr("disabled", false);
				}
			})
		});
		$(document).on('click', '.delete', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"delete_active_file_audit_form.php",
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