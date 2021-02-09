<!DOCTYPE html>
<html>
<head>
    <style type="text/css" media="screen">
 @media (min-width: 768px) {
      .sidebar {
   z-index: 1;
   position: absolute;
   width: 250px;
   margin-top: 50px!important;
}
}

  .sidebar .menu {
    
    background: #30373e;
    line-height: 2;
    font-family: "Roboto",sans-serif;

}
 

element.style {
    margin-bottom: 0;
      
}
}
 
</style>
  </head>

<!--  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

  
  
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #337ab7; background: linear-gradient(45deg, #49cdd0, #ab9ae5);" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
          
            <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="dashboard.php" style="font-size: 27px; letter-spacing: 3.5px; padding-left: 15px; color: white; padding-left: 40px;">Hospiexperts</a></div>
          
          <span style="font-size: 15px; color: white;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NABH For Hospitals And Healthcare Providers.</span>
          

          
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
            <div class="navbar-default sidebar" role="navigation" style="border-color:#333; font-size: 13px; color: #e6eeff; font-weight: 100; font-family:sans-serif;" onMouseOver="this.style.color='black'"
                    onMouseOut="this.style.color='green'";>
                <div class="box2" id="bx3">
                <div class="w3-container" style=" background: #30373e;  line-height: 1.8;  
}">
                    <ul class="nav" id="side-menu" style="border-bottom: 0px;">
                   

             <li style="border-bottom: 0px;"  class="w3-bar">
              <a href="dashboard.php" style="color:#e6eeff; border:5px;  background: #30373e;"><i class="fa fa-dashboard"></i> &nbsp; Dashboard</a>
            </li>   
             
           
            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color:   #262628;" ><i class="fa fa-home fa-fw" ></i>  Front Office/Reception &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i> </a>
            </li> 

            <li style="border-bottom: 0px;" class="w3-bar">
              <a href="hosp_util_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;IPD Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="opd_waittm_form_det.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;OPD Register </a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="bed_occup_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Bed Occupancy Report</a>
           </li>

            <li style="border-bottom: 0px; ">
              <a href="opd_feedback_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;OPD Feedback Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="ipd_feedback_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;IPD Feedback Form</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628;"  ><i class="fa fa-home fa-fw"></i> Infection Control Indicator &nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="vent_ass_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Ventilator Associated Pnemonia</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="cat_ass_uti_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Catheter Associated UTI</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="cent_line_ass_bsi_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Central Line Associated BSI</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="surg_site_inf_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Surgical Site Infection Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="needle_prick_inj_form.php" style="color: #e6eeff; background-color: #ffffff00;" class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Occupational Exposure/ Needle <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prick Injury Register</p></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628; "><i class=" fa fa-home fa-fw"></i> Doctor's Related Indicator &nbsp;<i class="fa fa-angle-double-down"></i></a> 
            </li>

            <li style="border-bottom: 0px; ">
              <a href="int_asst_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Initial Assessment Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="ipd_waittm_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;IPD Discharge Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="blood_trasfusion_event.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Blood Trasfusion Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-home fa-fw"></i> Nurse's Related Indicator &nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a> 
            </li>

            <li style="border-bottom: 0px; ">
              <a href="care_relate_event.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Nursing Care Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628; "><i class="fa fa-home fa-fw"></i>  Medical Records Indicator &nbsp;<i class="fa fa-angle-double-down"></i></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="medi_records_indicator.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;MRD Register</a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-home fa-fw"></i> HR Related Indicators&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
            </li>

            <li style="border-bottom: 0px; ">
              <a href="hr_mast.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;HR Master</a>
            </li>

             

            <li style="border-bottom: 0px; ">
              <a href="hr_indicator.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;HR Indicator</a>
            </li>

 


            <!-- <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #261a0d;" ><i class="fa fa-home fa-fw"></i>Equipment Related Indicators </a>
            </li>

            


             <li style="border-bottom: 0px; ">
               <a href="equip_mast.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Equipment Master</b> </a>
             </li> -->

             <!-- <li style="border-bottom: 0px; ">
              <a href=""  style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator</a>
             </li> -->
              
             <!-- <li style="border-bottom: 0px; ">
               <a href="equip_indicator_form.php"  style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-renren fa-fw"></i> Equipment Indicator</b> </a>
             </li> -->

             <!-- <li style="border-bottom: 0px; ">
               <a href="" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Laboratory Indicator</a>
             </li> -->

             <!-- <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #261a0d;" ><i class="fa fa-home fa-fw"></i>Equipment Related Indicators </a>
            </li><br> -->

             <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628;" ><i class="fa fa-home fa-fw"></i> Bio Medical Equipment </a>
            </li>

             <li style="border-bottom: 0px; ">
               <a href="equip_mast_bio.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Bio Equipment Master</b> </a>
             </li>

              <li style="border-bottom: 0px; ">
               <a href="equip_indicator_form_bio.php"  style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Bio Maintenance Register</b> </a>
             </li>

             <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628;" ><i class="fa fa-home fa-fw"></i> General Equipment </a>
             </li>

             <li style="border-bottom: 0px; ">
               <a href="equip_mast.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;General Equipment Master</b> </a>
             </li>

              <li style="border-bottom: 0px; ">
               <a href="equip_indicator_form.php"  style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;General Maintenance <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register</b> </a>
             </li>
 

<!-- 
              <li style="border-bottom: 0px; ">
               <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Pharmacy Registration</b> </a>
             </li> -->

              <li style="border-bottom: 0px; ">
               <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-home fa-fw"></i> OT  Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i> </a>
             </li>
                        

             <li style="border-bottom: 0px; ">
              <a href="sentinel_event_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;OT Register<br> &nbsp;&nbsp;&nbsp;&nbsp;(Sentinel Event - Surgical and <br> &nbsp;&nbsp;&nbsp;&nbsp; Anesthetia Events)</a>
             </li>
              

              <!-- <li style="border-bottom: 0px; ">
               <a href="#" style="color:#999;"><i class=" glyphicon glyphicon-home"></i> Emergency Register  </b> </a>
              </li>
 -->
              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-home fa-fw"></i> Emergency Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
              </li>

               <li style="border-bottom: 0px; ">

                 <a href="emrgncy_register_ipd_form.php" style="color:#e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Emergency Register</a>
               </li>

              <!-- <li style="border-bottom: 0px; ">
                <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i> ICU Register </b> </a>
              </li> -->
               
               <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-home fa-fw"></i> ICU Indicator &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="icu_register_ipd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;ICU Register</a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #262628; "><i class="fa fa-home fa-fw"></i>  Laboratory Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="lab_opd_form.php" style="color: #e6eeff; background-color: #ffffff00;"class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Laboratory Register (OPD)</a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="lab_ipd_form.php" style="color: #e6eeff; background-color: #ffffff00;"class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Laboratory Register (IPD)</a>
              </li>

              

                  
              <!-- <li style="border-bottom: 0px; ">
                <a href="#" style="color:#999;"><i class="glyphicon glyphicon-record"></i>  Pharmacy Registration</b> </a>
               </li> -->

              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-home fa-fw"></i>  Pharmacy Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Medication Related)</a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="pharmcy_register_form.php" style="color: #e6eeff; background-color: #ffffff00;"class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Pharmacy Register</a>
              </li>

               

              <li style="border-bottom: 0px; ">
                <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-home fa-fw"></i>  Radiology Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="radio_opd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Radiology Register (OPD)</a>
              </li>

              <li style="border-bottom: 0px; ">
                <a href="radio_ipd_form.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Radiology Register (IPD)</a>
              </li>

              
             <!-- <li style="border-bottom: 0px; ">
              <a href="radio_ipd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator</a>
             </li> -->

             <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #262628;"><i class="fa fa-list-alt" aria-hidden="true"></i>  &nbsp;Form Indicators &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
             </li>

             <li style="border-bottom: 0px; ">
                <a href="form_indicator.php" style="color: #e6eeff; background-color: #ffffff00;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;Performance of KPI Yearly</a>
              </li>


 
             <!-- <li style="border-bottom: 0px; ">
              <a href="radio_opd_form.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Radiology Indicator</a>
            </li> -->
            <!--<li>
                            <a href="perf_key_qlty_ind_form.php"><i class="fa fa-renren fa-fw"></i> Performance Of Key Quality Indicator</a>
                        </li>-->
           <!--  <li style="border-bottom: 0px; ">
              <a href="form_indicator.php" style="color:#999;"><i class="glyphicon glyphicon-record"></i> Form Indicators</a>
            </li> -->



            <li style="border-bottom: 0px; ">
              <a href="chart_det.php" style="color: #e6eeff; background-color: #262628;"  class="w3-hover-border-#272525 w3-hover-text-blue"><i class="fa fa-bar-chart-o fa-fw"></i> Control Charts </a>
            </li><br>

            <li style="border-bottom: 0px; ">
              <a href="#" style="color: #e6eeff; background-color: #ffffff00;"><i class="fa fa-database fa-fw"></i> Backup Database</a>
            </li><br>
            

     
                         
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