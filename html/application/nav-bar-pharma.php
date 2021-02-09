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
            <!-- /.navbar-top-links -->
            
            <!-- Sidebar Menus -->
            <script src="../vendor/date_time.js"></script>
            <div class="navbar-default sidebar" role="navigation" style="border-color:#333;">
                <div class="box2" id="bx3">
                <div class="sidebar-nav navbar-collapse" style="background-color:#222d32;">
                    <ul class="nav" id="side-menu" >
                     
  
 
                        

          <!--   <li style="border-bottom: 0px; ">
              <a href="hosp_util_form.php" style="color:#999; "><i class="glyphicon glyphicon-record"></i> Hospital Utilization</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="int_asst_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Intial Assessment Time</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="vent_ass_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Ventilator Associated Pnemonia</a>
           </li>

            <li style="border-bottom: 0px; ">
              <a href="cat_ass_uti_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Cather Associated UTI</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="cent_line_ass_bsi_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Central Line Associated BSI</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="surg_site_inf_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Surgical Site Infection Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="bed_occup_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Bed Occupancy Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="ipd_waittm_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> IPD Waiting Time Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="opd_waittm_form_det.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> OPD Waiting Time Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="needle_prick_inj_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Occupational Exposure/Needle <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prick Injury</p></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="sentinel_event_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Sentinel Event - Surgical and <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anesthetia Events</p></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="blood_trasfusion_event.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Blood Trasfusion Events</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="care_relate_event.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Care related events</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="medi_records_indicator.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Medical Records Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="hr_mast.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> HR Master</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="hr_indicator.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> HR Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="equip_mast.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Equipement Master</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="equip_indicator_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Equipement Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="ipd_feedback_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> IPD Feedback Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="opd_feedback_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> OPD Feedback Form</a>
            </li>

             

            <li style="border-bottom: 0px; ">
              <a href="emrgncy_register_ipd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Emergency Register</a>
            </li>

 


            <li style="border-bottom: 0px; ">
              <a href="icu_register_ipd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i>  ICU Register</a>
            </li>

            


             <li style="border-bottom: 0px; ">
               <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator OPD</b> </a>
             </li>

             <li style="border-bottom: 0px; ">
              <a href="lab_opd_form.php"  style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator</a>
             </li>
              
             <li style="border-bottom: 0px; ">
               <a href="#"  style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator IPD</b> </a>
             </li>

             <li style="border-bottom: 0px; ">
               <a href="lab_ipd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator</a>
             </li>

 -->
 


              <li style="border-bottom: 0px; ">
                <a href="dashboard-pharmacist.php" style="color:#999; "><i class="fa fa-home fa-fw"></i><b> Pharmacy </b> </a>
              </li>

              <li style="border-bottom: 0px; ">
               <a href="pharmcy_register_form1.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Pharmacy Registration</a>
             </li>
                        

             <!-- <li style="border-bottom: 0px; ">
              <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator IPD</b> </a>
             </li>

             <li style="border-bottom: 0px; ">
              <a href="radio_ipd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator</a>
             </li>

             <li style="border-bottom: 0px; ">
              <a href="#"style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator OPD</b> </a>
             </li>
 
             <li style="border-bottom: 0px; ">
              <a href="radio_opd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator</a>
            </li>
            <!--<li>
                            <a href="perf_key_qlty_ind_form.php"><i class="fa fa-renren fa-fw"></i> Performance Of Key Quality Indicator</a>
                        </li>-->
           <!--  <li style="border-bottom: 0px; ">
              <a href="form_indicator.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Form Indicators</a>
            </li>



            <li style="border-bottom: 0px; ">
              <a href="chart_det.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Control Charts </a>
            </li> --> -->

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
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            </div>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
            <!-- /.navbar-static-side -->
        </nav>
        