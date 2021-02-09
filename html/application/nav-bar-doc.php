<!DOCTYPE html>
<html>
<head>

<!-- <style type="text/css" media="screen">
 @media (min-width: 768px) {
      .sidebar {
   z-index: 1;
   position: absolute;
   width: 250px;
   margin-top: 0px!important;
}
}
</style> -->

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
                
			    <a href="#">
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
            <!-- /.navbar-top-links -->
            
            <!-- Sidebar Menus -->
            <script src="../vendor/date_time.js"></script>
            <div class="navbar-default sidebar" role="navigation" style="border-color:#333; font-size: 13px; color: #e6eeff; font-weight: 100; font-family:sans-serif; line-height: 2.428571;" onMouseOver="this.style.color='black'"
                    onMouseOut="this.style.color='green'";>
                <div class="box2" id="bx3">
                <div class="w3-container" style="background-color:#222d32;">
                    <ul class="nav" id="side-menu" style="border-bottom: 0px;">
                   



                      
             
             <li style="border-bottom: 0px;"  class="w3-bar">
              <a href="dashboard-doc.php" style="color:#e6eeff; border:5px; background-color: #ffffff00;"><i class="fa fa-dashboard"></i>&nbsp;  Dashboard</a>
            </li>   

            <!-- <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #272525;" ><i class="fa fa-home fa-fw" ></i>  Front Office/Reception </a>
            </li> 

            <li style="border-bottom: 0px; class="w3-bar" ">
              <a href="hosp_util_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw" ></i> IPD Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="opd_waittm_form_det.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i>  OPD Register </a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="bed_occup_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Bed Occupancy</a>
           </li>

            <li style="border-bottom: 0px; ">
              <a href="opd_feedback_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> OPD Feedback</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="ipd_feedback_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> IPD Feedback</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #272525;"  ><i class="fa fa-home fa-fw"></i> Infection Control Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="vent_ass_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Ventilator Associated &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pnemonia</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="cat_ass_uti_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Catheter Associated UTI</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="cent_line_ass_bsi_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Central Line Associated BSI</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="surg_site_inf_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Surgical Site Infection Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="needle_prick_inj_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Occupational Exposure/<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Needle Prick Injury</p></a>
            </li>
 -->
            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color:   #261a0d; "><i class=" fa fa-home fa-fw"></i> Doctor's Related Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="int_asst_form_doc.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i>  Initial Assessment Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="ipd_waittm_form_doc.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> IPD Discharge Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="blood_trasfusion_event_doc.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Blood Trasfusion Register</a>
            </li>

            <!-- <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #272525;"><i class="fa fa-home fa-fw"></i> Nurse's Related Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="care_relate_event.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i>  Care related events</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #272525; "><i class="fa fa-home fa-fw"></i>  Medical Records Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="medi_records_indicator.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Medical Records Indicator</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #272525;"><i class="fa fa-home fa-fw"></i> HR Related Indicators</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="hr_mast.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> HR Master</a>
            </li>

             

            <li style="border-bottom: 0px; ">
              <a href="hr_indicator.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> HR Indicator</a>
            </li>

 


            <li style="border-bottom: 0px; ">
              <a href="dashboard1.php" style="color: #e6eeff; background-color: #272525;" ><i class="fa fa-home fa-fw"></i>  Equipement  Related</a>
            </li>

            


             <li style="border-bottom: 0px; ">
               <a href="equip_mast.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Equipement Master</b> </a>
             </li> -->

             <!-- <li style="border-bottom: 0px; ">
              <a href=""  style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator</a>
             </li> -->
              
             <!-- <li style="border-bottom: 0px; ">
               <a href="equip_indicator_form.php"  style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Equipement Indicator</b> </a>
             </li> -->

             <!-- <li style="border-bottom: 0px; ">
               <a href="" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator</a>
             </li> -->


 

<!-- 
              <li style="border-bottom: 0px; ">
               <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Pharmacy Registration</b> </a>
             </li> -->

             <!--  <li style="border-bottom: 0px; ">
               <a href="dashboard1.php" style="color: #e6eeff; background-color: #272525;"><i class="fa fa-home fa-fw"></i>  OT  Register</a>
             </li>
                        

             <li style="border-bottom: 0px; ">
              <a href="sentinel_event_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i>  Sentinel Event - Surgical and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anesthetia Events</a>
             </li>
               -->

              <!-- <li style="border-bottom: 0px; ">
               <a href="#" style="color:#999;"><i class=" glyphicon glyphicon-home"></i> Emergency Register  </b> </a>
              </li>
 -->
             <!--  <li style="border-bottom: 0px; ">
                <a href="emrgncy_register_ipd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Emergency Register</a>
              </li> -->

              <!-- <li style="border-bottom: 0px; ">
                <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i> ICU Register </b> </a>
              </li> -->

              <!-- <li style="border-bottom: 0px; ">
                <a href="icu_register_ipd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> ICU Register</a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #272525; "><i class="fa fa-home fa-fw"></i>  Laboratory Indicator OPD</b> </a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="lab_opd_form.php" style="color: #e6eeff; background-color: #ffffff00;"class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Laboratory Indicator</a>
              </li>

                        
              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #272525;"><i class="fa fa-home fa-fw"></i>  Laboratory Indicator IPD</b> </a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="lab_ipd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Laboratory Indicator</a>
              </li> -->

          
              <!-- <li style="border-bottom: 0px; ">
                <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i>  Pharmacy Registration</b> </a>
               </li> -->

              <!-- <li style="border-bottom: 0px; ">
                <a href="pharmcy_register_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Pharmacy Registration</a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #272525;"><i class="fa fa-home fa-fw"></i>  Radiology Indicator IPD  </a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="radio_ipd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Radiology Indicator</a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #272525;"><i class="fa fa-home fa-fw"></i>  Radiology Indicator OPD</b> </a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="radio_opd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Radiology Indicator</a>
              </li> -->
             <!-- <li style="border-bottom: 0px; ">
              <a href="radio_ipd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator</a>
             </li> -->

             <!-- <li style="border-bottom: 0px; ">
              <a href="form_indicator0.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Form Indicators</b> </a>
             </li> -->
 
             <!-- <li style="border-bottom: 0px; ">
              <a href="radio_opd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator</a>
            </li> -->
            <!--<li>
                            <a href="perf_key_qlty_ind_form.php"><i class="fa fa-renren fa-fw"></i> Performance Of Key Quality Indicator</a>
                        </li>-->
           <!--  <li style="border-bottom: 0px; ">
              <a href="form_indicator.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Form Indicators</a>
            </li> -->



            <!-- <li style="border-bottom: 0px; ">
              <a href="chart_det_doc.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Control Charts </a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #ffffff00;"><i class="fa fa-database fa-fw"></i> Backup Database</a>
            </li> --><br>
            

     
                         
             <li style="border-bottom: 0px; ">
                <a href="#!" style="padding-left:18px; color: #e6eeff; background-color: #ffffff00;"><b>SESSION : <?php echo $finyr;?></b></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#!" style="padding-left:17px; color: #e6eeff; background-color: #ffffff00;">
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
     </span></div></nav></html>   