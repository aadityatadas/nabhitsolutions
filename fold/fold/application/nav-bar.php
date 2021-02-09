<script type="text/javascript"> 
	$(document).ready(function () {
		$("#bx3").niceScroll({ autohidemode: true })
	});
</script>
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
				<img src="../vendor/img/hosp.jpg" style="margin-top:10px;padding-left:10px;float:left;height:30px;width:210px;" />
				<a class="navbar-brand" style="font-size:20px;font-weight:bold;color:#232598;" href="dashboard.php">NABH</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw" style="font-size:16px;"></i> <i class="fa fa-caret-down" style="font-size:16px;"></i>
                    </a>                   
                </li>
           
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
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
            <div class="navbar-default sidebar" role="navigation">
                <div class="box2" id="bx3">
				<div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
						<li>
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
                            <a href="needle_prick_inj_form.php"><i class="fa fa-renren fa-fw"></i> Neddle Prick Injury Form</a>
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
                            <a href="opd_feedback_form.php"><i class="fa fa-renren fa-fw"></i> OPD Feedback Form</a>
                        </li>
						<li>
                            <a href="perf_key_qlty_ind_form.php"><i class="fa fa-renren fa-fw"></i> Performance Of Key Quality Indicator</a>
                        </li>
						<li>
                            <a href="chart_det.php"><i class="fa fa-bar-chart-o fa-fw"></i> Control Charts </a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-database fa-fw"></i> Backup Database</a>
                        </li>
						<li>
                            <a href="#!" style="padding-left:18px;"><b>SESSION : <?php echo $finyr;?></b></a>
                        </li>
						<li>
                            <a href="#!" style="padding-left:17px;">
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
		