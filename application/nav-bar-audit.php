<!DOCTYPE html>
<html>
<head>
    <style type="text/css" media="screen">
 @media (min-width: 768px) {
      .sidebar {
   z-index: 1;
   position: absolute;
   width: 250px;
   margin-top: 0px!important;
}
}
</style>
  </head>


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 <script type="text/javascript"> 
    $(document).ready(function () {
        $("#bx3").niceScroll({ autohidemode: true })
    });
</script>



     <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #337ab7;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a href="dashboard_audit.php">
          <span style="color: white; font-size: 25px; padding-left: 40px;  font-family: Palatino Linotype;"><b>Hospi</b>Xperts</span> </a>
          <span style="font-size: 15px; color: white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NABH For Hospitals And Healthcare Providers.
             
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                 
           
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white; margin-top:0px; margin-bottom:0px" onMouseOver="this.style.color='black'"
                    onMouseOut="this.style.color='white'";>
                        <b>Welcome&nbsp;<?php echo ucfirst($ses);?></b>&nbsp;&nbsp;<i class="fa fa-caret-down" style="font-size:16px;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="change_pass.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
			<!-- Sidebar Menus -->
			<script src="../vendor/date_time.js"></script>
            <div class="navbar-default sidebar" role="navigation" style="border-color:#333; font-size: 13px; color: #e6eeff; font-weight: 100; font-family:sans-serif; line-height: 2.428571;" onMouseOver="this.style.color='black'"
                    onMouseOut="this.style.color='green'";>
                <div class="box2" id="bx3">
                <div class="w3-container" style="background-color:#222d32;">
                    <ul class="nav" id="side-menu" style="border-bottom: 0px;">

                        <li style="border-bottom: -10px;"  class="w3-bar"><br>
                           <a href="dashboard-reception.php" style="color: #e6eeff; background-color:#224f77;" ><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Back to Reception</a></li>


                        <li style="border-bottom: 0px;"  class="w3-bar"><br>
                        <a href="dashboard1-audit.php" style="color: #e6eeff; background-color: #261a0d;" ><i class="fa fa-dashboard"></i>  &nbsp;&nbsp;Dashboard</a>
                         </li>
					<!--	<li>
                            <a href="hosp_util_form.php"><i class="fa fa-renren fa-fw"></i> Hospital Utilization</a>
                        </li>
						<li>
                            <a href="int_asst_form.php"><i class="fa fa-renren fa-fw"></i> Intial Assessment Time</a>
                        </li>
						<li>
                            <a href="vent_ass_form.php"><i class="fa fa-renren fa-fw"></i> Ventilator Associated Pnemonia</a>
                        </li>
						<li>
                            <a href="cat_ass_uti_form.php"><i class="fa fa-renren fa-fw"></i> Cather Associated UTI</a>
                        </li>
						<li>
                            <a href="cent_line_ass_bsi_form.php"><i class="fa fa-renren fa-fw"></i> Central Line Associated BSI</a>
                        </li>
						<li>
                            <a href="surg_site_inf_form.php"><i class="fa fa-renren fa-fw"></i> Surgical Site Infection Form</a>
                        </li>
						<li>
                            <a href="bed_occup_form.php"><i class="fa fa-renren fa-fw"></i> Bed Occupancy Form</a>
                        </li>
						<li>
                            <a href="ipd_waittm_form.php"><i class="fa fa-renren fa-fw"></i> IPD Waiting Time Form</a>
                        </li>
						<li>
                            <a href="opd_waittm_form_det.php"><i class="fa fa-renren fa-fw"></i> OPD Waiting Time Form</a>
                        </li>
						<li>
                            <a href="needle_prick_inj_form.php"><i class="fa fa-renren fa-fw"></i> Occupational Exposure/Needle Prick Injury</a>
                        </li>
						<li>
                            <a href="sentinel_event_form.php"><i class="fa fa-renren fa-fw"></i> Sentinel Event - Surgical and Anesthetia Events</a>
                        </li>
						<li>
                            <a href="blood_trasfusion_event.php"><i class="fa fa-renren fa-fw"></i> Blood Trasfusion Events</a>
                        </li>
						<li>
                            <a href="care_relate_event.php"><i class="fa fa-renren fa-fw"></i> Care related events</a>
                        </li>
						<li>
                            <a href="medi_records_indicator.php"><i class="fa fa-renren fa-fw"></i> Medical Records Indicator</a>
                        </li>
						<li>
                            <a href="hr_mast.php"><i class="fa fa-renren fa-fw"></i> HR Master</a>
                        </li>
						<li>
                            <a href="hr_indicator.php"><i class="fa fa-renren fa-fw"></i> HR Indicator</a>
                        </li>
						<li>
                            <a href="equip_mast.php"><i class="fa fa-renren fa-fw"></i> Equipement Master</a>
                        </li>
						<li>
                            <a href="equip_indicator_form.php"><i class="fa fa-renren fa-fw"></i> Equipement Indicator</a>
                        </li>
						<li>
                            <a href="ipd_feedback_form.php"><i class="fa fa-renren fa-fw"></i> IPD Feedback Form</a>
                        </li>
						<li>
                            <a href="opd_feedback_form.php"><i class="fa fa-renren fa-fw"></i> OPD Feedback Form</a>
                        </li>
						<!--<li>
                            <a href="perf_key_qlty_ind_form.php"><i class="fa fa-renren fa-fw"></i> Performance Of Key Quality Indicator</a>
                        </li>-->  
						<!--<li>
                            <a href="form_indicator.php"><i class="fa fa-renren fa-fw"></i> Form Indicators</a>
                        </li>
						<li>
                            <a href="chart_det.php"><i class="fa fa-bar-chart-o fa-fw"></i> Control Charts </a>
                        </li>-->
                        <li style="border-bottom: 0px;" class="w3-bar">
                        <a href="active_audit_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw" ></i> Active Audit Form</a>
                        </li>


                        <li style="border-bottom: 0px; ">
                         <a href="medi_records_indicator.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i>   Medical Records Indicator </a>
                        </li>

                         
                        <li style="border-bottom: 0px; ">
                            <a href="pharmcy_register_form_audit.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Pharmacy Registration</a>
                        </li>
                        
                         <li style="border-bottom: 0px; ">
                            <a href="#" style="color: #e6eeff; background-color: #261a0d;" ><i class="fa fa-home fa-fw"></i> All safety Checklist</a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="radtin_sfty_chklst.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Radiation safety </a>
                        </li>
                        
                        <li style="border-bottom: 0px; ">
                            <a href="bio_sfty_chklst.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Bio Safety Checklist </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="electrcl_sfty_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Electrical Safety </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href=" fire_sfty_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Fire Safety </a>
                        </li>
                        
                        <li style="border-bottom: 0px; ">
                            <a href="envmntl_sfty_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Environmental safety </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="emergncy_sfty_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Emergency Prepareness &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Safety </a>
                        </li>
                       
                        <li style="border-bottom: 0px; ">
                            <a href="biomedicaleqip_sfty_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Bio-Medical Equipment  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Safety </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="power_sfty_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Power Safety </a>
                        </li>
                        
                        
                        
                       <!--  <li style="border-bottom: 0px; ">
                            <a href="bio_sfty_chklst.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Bio Safety Checklist </a>
                        </li>
                          -->
                         
                       
                        
                        <li style="border-bottom: 0px; ">
                            <a href="restrain_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Restrain Checklist </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="sedatin_sfty_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Sedation Safety Cheklist </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="surgical_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Surgical safety  </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="transportation_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Transportsation safety </a>
                        </li>

                        <!-- <li style="border-bottom: 0px; ">
                            <a href="transportation_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Transportsation safety</a>
                        </li> -->

                        <li style="border-bottom: 0px; ">
                            <a href="infection_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Infection control checklist </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="ward_round_check_list.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Ward Round Checklist </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="hira_analysis_sheet_.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Hazard Identification and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Risk Analysis Sheet </a>
                        </li>

                        <li style="border-bottom: 0px; ">
                            <a href="pharmcy_round_chcklst.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Pharmacist round Checklist </a>
                        </li>
                       
						<li style="border-bottom: 0px; ">
                            <a href="#" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-database fa-fw" ></i> Backup Database</a>
                        </li>

						<li style="border-bottom: 0px; ">
                            <a href="#!"   style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><b>SESSION : <?php echo $finyr;?></b></a>
                        </li>

						<li style="border-bottom: 0px; ">
                            <a href="#!" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue">
								<b><span id="date_time"></span></b>
							</a>
                        </li>						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
			</div>
			<script type="text/javascript">window.onload = date_time('date_time');</script>
            <!-- /.navbar-static-side -->
        </nav>
		