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
                
             
          <span style="color: white; font-size: 25px; padding-left: 40px;  font-family: Palatino Linotype;"><b>Hospi</b>Xperts</span> 
          <span style="font-size: 15px; color: white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NABH For Hospitals And Healthcare Providers.
             
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                 
                 
           
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white; margin-top:-5px; margin-bottom:0px" onMouseOver="this.style.color='black'"
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
            <div class="navbar-default sidebar" role="navigation" style="border-color:#333; margin-top: 44px;">
                <div class="box2" id="bx3">
                <div class="sidebar-nav navbar-collapse" style="background-color:#222d32;">
                    <ul class="nav" id="side-menu" >
                     
                         
                       <!-- <li>
                            <a href="opd_waittm_form_det.php"><i class="fa fa-renren fa-fw"></i> OPD Register </a>
                        </li>
                        <li>
                            <a href="bed_occup_form.php"><i class="fa fa-renren fa-fw"></i> Bed Occupancy </a>
                        </li>
                        	<li>
                            <a href="opd_feedback_form.php"><i class="fa fa-renren fa-fw"></i> OPD Feedback </a>
                        </li>
                        	<li>
                            <a href="ipd_feedback_form.php"><i class="fa fa-renren fa-fw"></i> IPD Feedback </a>
                        </li>-->
                        
                       <!--<li>
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i> <b style="color:#0066cc;"> Infection Control Indicator</b> </a>
                        </li>
						
						<li>
                            <a href="vent_ass_form.php"><i class="fa fa-renren fa-fw"></i> Ventilator Associated Pnemonia</a>
                        </li>
						<li>
                            <a href="cat_ass_uti_form.php"><i class="fa fa-renren fa-fw"></i> catheter Associated UTI</a>
                        </li>
						<li>
                            <a href="cent_line_ass_bsi_form.php"><i class="fa fa-renren fa-fw"></i> Central Line Associated BSI</a>
                        </li>
						<li>
                            <a href="surg_site_inf_form.php"><i class="fa fa-renren fa-fw"></i> Surgical Site Infection Form</a>
                        </li>
                        <li>
                            <a href="needle_prick_inj_form.php"><i class="fa fa-renren fa-fw"></i> Occupational Exposure/Needle Prick Injury</a>
                        </li>
                        
						                        <li>
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i> <b style="color:#0066cc;"> Doctor's Related Indicator</b> </a>
                        </li>
                        <li>
                            <a href="int_asst_form.php"><i class="fa fa-renren fa-fw"></i> Initial Assessment Time</a>
                        </li>
						<li>
                            <a href="ipd_waittm_form.php"><i class="fa fa-renren fa-fw"></i> IPD Discharge Time </a>
                        </li>
					
						<li>
                            <a href="blood_trasfusion_event.php"><i class="fa fa-renren fa-fw"></i> Blood Trasfusion Events</a>
                        </li>
                                    <li>-->
                        <li style="border-bottom: 0px; ">
                            <a href="dashboard-nur.php" style="color:#999; "><i class="fa fa-home fa-fw"></i> <b>Nurse's Related Indicator</b> </a>
                        </li>
                        
                       <li style="border-bottom: 0px; ">
                            <a href="care_relate_event2.php" style="color:#999; "><i class="glyphicon glyphicon-record"></i> Care related events</a>
                        </li>
						<li style="border-bottom: 0px; ">
                            <a href="vent_ass_form2.php" style="color:#999; "><i class="glyphicon glyphicon-record"></i> Ventilator Associated Pnemonia</a>
                        </li>
						<li style="border-bottom: 0px; ">
                            <a href="cat_ass_uti_form2.php" style="color:#999; "><i class="glyphicon glyphicon-record"></i> Catheter Associated UTI</a>
                        </li>
						<li style="border-bottom: 0px; ">
                            <a href="cent_line_ass_bsi_form2.php" style="color:#999; "><i class="glyphicon glyphicon-record"></i> Central Line Associated BSI</a>
                        </li>
                        <li style="border-bottom: 0px; ">
                            <a href="int_asst_form_nurse2.php"style="color:#999; "><i class="glyphicon glyphicon-record"></i> Initial Assessment Time</a>
                        </li>

						<li style="border-bottom: 0px; ">
                            <a href="ipd_waittm_form3.php"style="color:#999; "><i class="glyphicon glyphicon-record"></i> IPD Discharge Time </a>
                        </li>
						<li style="border-bottom: 0px; ">
                            <a href="blood_trasfusion_event3.php" style="color:#999; "><i class="glyphicon glyphicon-record"></i> Blood Trasfusion Events</a>
                        </li>
                        <li style="border-bottom: 0px; ">
                            <a href="ipd_feedback_form2.php" style="color:#999; "><i class="glyphicon glyphicon-record"></i> IPD Feedback </a>
                        </li>
                            
                           <!-- <a href="dashboard.php"><i class="fa fa-home fa-fw"></i><b style="color:#0066cc;">  Medical Records Indicator</b> </a>
                        </li>
                        <li>
                            <a href="medi_records_indicator.php"><i class="fa fa-renren fa-fw"></i> Medical Records Indicator</a>
                        </li>
                          <li>
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i><b style="color:#0066cc;"> HR Related Indicators</b></a>
                        </li>
                        	
						
						
						<li>
                            <a href="hr_mast.php"><i class="fa fa-renren fa-fw"></i> HR Master</a>
                        </li>
						<li>
                            <a href="hr_indicator.php"><i class="fa fa-renren fa-fw"></i> HR Indicator</a>
                        </li>
                         <li>
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i> <b style="color:#0066cc;"> Equipement  Related </b> </a>
                        </li>
						<li>
                            <a href="equip_mast.php"><i class="fa fa-renren fa-fw"></i> Equipement Master</a>
                        </li>
						<li>
                            <a href="equip_indicator_form.php"><i class="fa fa-renren fa-fw"></i> Equipement Indicator</a>
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i><b style="color:#0066cc;">  OT  Register</b> </a>
                        </li>
					<li>
                            <a href="sentinel_event_form.php"><i class="fa fa-renren fa-fw"></i> Sentinel Event - Surgical and Anesthetia Events</a>
                        </li>-->
						
					
						<!--<li>
                            <a href="perf_key_qlty_ind_form.php"><i class="fa fa-renren fa-fw"></i> Performance Of Key Quality Indicator</a>
                        </li>-->
						<!--<li>
                            <a href="form_indicator.php"><i class="fa fa-renren fa-fw"></i> Form Indicators</a>
                        </li>
						<li>
                            <a href="chart_det.php"><i class="fa fa-bar-chart-o fa-fw"></i> Control Charts </a>
                        </li>-->
						<li style="border-bottom: 0px; ">
              <a href="#" style="color:#999;"><i class="fa fa-database fa-fw"></i> Backup Database</a>
            </li><br>
             
             <li style="border-bottom: 0px; ">
                <a href="#!" style="padding-left:18px; color:#999;"><b>SESSION : <?php echo $finyr;?></b></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#!" style="padding-left:17px; color:#999;">
            <b><span id="date_time"></span></b> 
                            </a>
                        </li>
                       
                         
                        </li></ul>
                       
                       	<!--<li>
                            <a href="sentinel_event_form_new.php"><i class="fa fa-renren fa-fw"></i> Self Assessment Toolkit </a>
                        </li> -->
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
			</div>
			<script type="text/javascript">window.onload = date_time('date_time');</script>
            <!-- /.navbar-static-side -->
        </nav>
		