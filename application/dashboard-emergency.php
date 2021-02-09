<script>
function myFunction() {
  window.print();
}

 
function goBack() {
  window.history.back();
}
 
</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HospiXperts-NABH Consultants & Service | NABH Certification‎</title>
<?php
                        

                           include"dbinfo.php";

                          $tbl= array( array("tbl_faq_emergency","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalemr= 0;
                                                    $compqiemr =0;
                                                    $notcompqiemr=0;
                                                    $comphremr =0;
                                                    $notcomphremr=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry4 = "SELECT COUNT(*) as totalemr FROM $tval[0]";
                                                            $res4= mysqli_query($connect, $qry4);
                                                            $row4=mysqli_fetch_assoc($res4);
                                                            //echo $row4['totalemr'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqiemr  = "SELECT COUNT(*) as compqiemr  FROM $tval[0] where $tval[1]";
                                                            $rescompqiemr = mysqli_query($connect, $qrycompqiemr);
                                                            $rowcompqiemr =mysqli_fetch_assoc($rescompqiemr);
                                                           // echo $rowcompqiemr['compqiemr'];

                                                            $qrynotcompqiemr = "SELECT COUNT(*) as notcompqiemr  FROM $tval[0] where $tval[2]";
                                                            $resnotcompqiemr  = mysqli_query($connect, $qrynotcompqiemr );
                                                            $rownotcompqiemr =mysqli_fetch_assoc($resnotcompqiemr );
                                                          //  echo $rownotcompqiemr['notcompqiemr'];

                                                            $qrycomphremr  = "SELECT COUNT(*) as comphremr  FROM $tval[0] where $tval[3]";
                                                            $rescomphremr  = mysqli_query($connect, $qrycomphremr );
                                                            $rowcomphremr =mysqli_fetch_assoc($rescomphremr );
                                                           // echo $rowcomphremr['comphremr'];

                                                            $qrynotcomphremr  = "SELECT COUNT(*) as notcomphremr  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphremr = mysqli_query($connect, $qrynotcomphremr );
                                                            $rownotcomphremr=mysqli_fetch_assoc($resnotcomphremr);
                                                            // echo $rownotcomphremr['notcomphremr'];

                                                        }

                                                    

                             

 ?>
  <?php
  error_reporting(0);
  session_start();
  include"dbinfo.php";
  $frdt = date('Y-m-01');
  $todt = date('Y-m-31');

  // no fo emregencies

   $qryEm1 = mysqli_query($connect,"SELECT COUNT(*) as no_of_emer FROM tbl_emrgncy_register_ipd  WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '$frdt' AND '$todt') ")or die(mysqli_error($connect));

   
  $resEm1 = mysqli_fetch_assoc($qryEm1);

  $no_of_emer = $resEm1["no_of_emer"];

  $qryEm2 = mysqli_query($connect,"SELECT SUM(TIME_TO_SEC(time_taken_for_initl_assmnt)) as time_diff FROM tbl_emrgncy_register_ipd  WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '$frdt' AND '$todt') ")or die(mysqli_error($connect));
  $resEm2 = mysqli_fetch_assoc($qryEm2);

      $time_diff   = $resEm2['time_diff'];

      $avg_imgncy_arival_time = $time_diff/$no_of_emer;


      $qryEm3 = mysqli_query($connect,"SELECT COUNT(*) as brought_dead FROM tbl_emrgncy_register_ipd WHERE (date_of_patient_arrvl_at_emrgncy BETWEEN '$frdt' AND '$todt') AND brought_dead='yes'")or die(mysqli_error($connect));
  $resEm3 = mysqli_fetch_assoc($qryEm3);

      $brought_dead   = $resEm3['brought_dead'];

       $qryEm4 = mysqli_query($connect,"SELECT COUNT(*) as back_to_emrgncy FROM tbl_emrgncy_register_ipd WHERE (date_of_retrn_to_emrgncy_dept_if_any BETWEEN '$frdt' AND '$todt') AND date_of_retrn_to_emrgncy_dept_if_any !=''")or die(mysqli_error($connect));
     $resEm4 = mysqli_fetch_assoc($qryEm4);

      $back_to_emrgncy   = $resEm4['back_to_emrgncy'];


      $qryEm5 = mysqli_query($connect,"SELECT COUNT(*) as back_to_emrgncy_72 FROM tbl_emrgncy_register_ipd WHERE (date_of_retrn_to_emrgncy_dept_if_any BETWEEN '$frdt' AND '$todt') AND retn_of_emrgncy NOT IN ('','no','No')")or die(mysqli_error($connect));
       $resEm5 = mysqli_fetch_assoc($qryEm5);

      $back_to_emrgncy_72  = $resEm5['back_to_emrgncy_72'];
      
      $per_back_to_emrgncy_72= (($back_to_emrgncy_72)*100)/$no_of_emer;
      ?>

      

 
<style>
    .sidebar .menu .list a {
    color: #eee;
    font-size: 13.5px;
}
.modal-backdrop {
    position: static!important;

    }
    input[type="checkbox"]:not(:checked), input[type="checkbox"]:checked {
    position: initial!important;
    left: -9999px;
    opacity: 1!important;
}
</style>
 
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="../assets/css/main.css" rel="stylesheet">
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
 
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader --> 
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- #Float icon -->
<ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
  <li class="mfb-component__wrap">
    <a href="#" class="mfb-component__button--main g-bg-cyan">
      <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i>
      <i class="mfb-component__main-icon--active zmdi zmdi-close"></i>
    </a>
    <ul class="mfb-component__list">
      <li>
        <a href="doctor-schedule.html" data-mfb-label="Doctor Schedule" class="mfb-component__button--child bg-blue">
          <i class="zmdi zmdi-calendar mfb-component__child-icon"></i>
        </a>
      </li>
      <li>
        <a href="patients.html" data-mfb-label="Patients List" class="mfb-component__button--child bg-orange">
          <i class="zmdi zmdi-account-o mfb-component__child-icon"></i>
        </a>
      </li>

      <li>
        <a href="payments.html" data-mfb-label="Payments" class="mfb-component__button--child bg-purple">
          <i class="zmdi zmdi-balance-wallet mfb-component__child-icon"></i>
        </a>
      </li>
    </ul>
  </li>
</ul>
<!-- #Float icon -->
<!-- Morphing Search  -->
<!-- <div id="morphsearch" class="morphsearch">
    <form class="morphsearch-form">
        <div class="form-group m-0">
            <input value="" type="search" placeholder="Explore Swift..." class="form-control morphsearch-input" />
            <button class="morphsearch-submit" type="submit">Search</button>
        </div>
    </form>
    <div class="morphsearch-content">
        <div class="dummy-column">
            <h2>People</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar3.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a></div>
        <div class="dummy-column">
            <h2>Popular</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar3.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a> </div>
        <div class="dummy-column">
            <h2>Recent</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="../assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a></div>
    </div> -->
    <!-- /morphsearch-content --> 
    <!-- <span class="morphsearch-close"></span> </div> -->
<!-- Top Bar -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader --> 
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- #Float icon -->
<ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
  <li class="mfb-component__wrap">
    <a href="#" class="mfb-component__button--main g-bg-cyan">
      <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i>
      <i class="mfb-component__main-icon--active zmdi zmdi-close"></i>
    </a>
    <ul class="mfb-component__list">
      <li>
        <a href="doctor-schedule.html" data-mfb-label="Doctor Schedule" class="mfb-component__button--child bg-blue">
          <i class="zmdi zmdi-calendar mfb-component__child-icon"></i>
        </a>
      </li>
      <li>
        <a href="patients.html" data-mfb-label="Patients List" class="mfb-component__button--child bg-orange">
          <i class="zmdi zmdi-account-o mfb-component__child-icon"></i>
        </a>
      </li>

      <li>
        <a href="payments.html" data-mfb-label="Payments" class="mfb-component__button--child bg-purple">
          <i class="zmdi zmdi-balance-wallet mfb-component__child-icon"></i>
        </a>
      </li>
    </ul>
  </li>
</ul>
<!-- #Float icon -->
<!-- Morphing Search  -->
<!-- <div id="morphsearch" class="morphsearch">
    <form class="morphsearch-form">
        <div class="form-group m-0">
            <input value="" type="search" placeholder="Explore Swift..." class="form-control morphsearch-input" />
            <button class="morphsearch-submit" type="submit">Search</button>
        </div>
    </form>
    <div class="morphsearch-content">
        <div class="dummy-column">
            <h2>People</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar3.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a></div>
        <div class="dummy-column">
            <h2>Popular</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar3.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a> </div>
        <div class="dummy-column">
            <h2>Recent</h2>
            <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Sara Soueidan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar5.jpg" alt=""/>
            <h3>Rachel Smith</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar1.jpg" alt=""/>
            <h3>Peter Finlan</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar4.jpg" alt=""/>
            <h3>Patrick Cox</h3>
            </a> <a class="dummy-media-object" href="#"> <img class="round" src="assets/images/xs/avatar2.jpg" alt=""/>
            <h3>Tim Holman</h3>
            </a></div>
    </div> -->
    <!-- /morphsearch-content --> 
    <!-- <span class="morphsearch-close"></span> </div> -->
<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html" style="font-size: 24px;  padding-left: 15px;font-weight: bold;">NABH IT SOLUTION</a></div>
        <ul class="nav navbar-nav navbar-right">
            <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in">&nbsp;Logout</i></a></li>
            
        </ul>
    </div>
</nav>
<!-- #Top Bar -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="../assets/images/random-avatar7.jpg" alt=""> </div>
            <div class="admin-action-info"> <span>Welcome</span>
                <h3><?php
                    
                     $sql = "SELECT * From tbl_staff  WHERE stf_id=".$_SESSION['id'];
                                     $result = mysqli_query($connect, $sql);
                                     $DB_ROW = mysqli_fetch_assoc($result);
                                    
                                     echo ucfirst($DB_ROW['stf_uname']);
                       ?>              
                </h3>
                <!-- <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li>                    
                    
                    <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in"></i></a></li>
                </ul> -->
            </div>
             <div class="quick-stats">
                <h5>Today Report</h5>
                <ul>
                    <li><span><?php 
        
                                     $c = $DB_ROW['stf_uname'];
                                     $sql = "SELECT * From tbl_huf  WHERE huf_recd='$c'";

                                     $result = mysqli_query($connect, $sql);
                                    

                             ?>
                            <div class="number"><?=mysqli_num_rows($result); ?></div>
                            <i>IPD</i>
                        </span>
                    </li>
                            &nbsp;&nbsp;&nbsp;
                    <li>
                        <span><?php 
        
                                     $d = $DB_ROW['stf_uname'];
                                     $sql = "SELECT * From tbl_opdwttm  WHERE opdwttm_recd ='$d'";

                                     $result = mysqli_query($connect, $sql);
                                    

                             ?>
                            <div class="number"><?=mysqli_num_rows($result); ?>
                            <i>OPD</i>
                        </span>
                    </li>
                   <!--  <li><span>04<i>Visit</i></span></li> -->
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu" >
            <ul class="list" >
                <li class="header" style="color: #eee;">MAIN NAVIGATION</li>
                <li class="active open"><a href="dashboard-emergency.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

               <!--  <li><a href="admin-kpi.php"><i class="zmdi zmdi-home"></i><span>K.P.I. - Front Office</span></a></li> -->                                               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px;">Quality Indicators</span> </a>
                    <ul class="ml-menu">
                        <!-- <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Front Office</a></li>
                        <li><a href="hosp_util_form.php" style="color: #eee; font-size: 13.5px;">IPD Register</a></li>
                        <li><a href="opd_waittm_form_det.php" style="color: #eee; font-size: 13.5px;">OPD Register</a></li>
                        <li><a href="bed_occup_form.php" style="color: #eee; font-size: 13.5px;">Bed Occupancy Report</a></li>
                        <li><a href="opd_feedback_form.php" style="color: #eee; font-size: 13.5px;">OPD Feedback Form</a></li>
                        <li><a href="ipd_feedback_form.php" style="color: #eee; font-size: 13.5px;">IPD Feedback Form</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Infection Control Indicator</a></li>
                        <li><a href="vent_ass_form.php" style="color: #eee; font-size: 13.5px;">Ventilator Associated Pnemonia</a></li>
                        <li><a href="cat_ass_uti_form.php" style="color: #eee; font-size: 13.5px;">Catheter Associated UTI</a></li>
                        <li><a href="cent_line_ass_bsi_form.php" style="color: #eee; font-size: 13.5px;">Central Line Associated BSI</a></li>
                        <li><a href="surg_site_inf_form.php" style="color: #eee; font-size: 13.5px;">Surgical Site Infection</a></li>
                        <li><a href="needle_prick_inj_form.php" style="color: #eee; font-size: 13.5px;">Occupational Exposure/ Needle Prick Injury</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Doctor's Related Indicator</a></li>
                        <li><a href="int_asst_form.php" style="color: #eee; font-size: 13.5px;">Initial Assessment Register</a></li>
                        <li><a href="ipd_waittm_form.php" style="color: #eee; font-size: 13.5px;">IPD Discharge Register</a></li>
                        <li><a href="blood_trasfusion_event.php" style="color: #eee; font-size: 13.5px;">Blood Trasfusion Register</a></li><br>
                        
                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Nurse's Related Indicator</a></li>  
                        <li><a href="care_relate_event.php" style="color: #eee; font-size: 13.5px;">Nursing Care Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Medical Records Indicator</a></li>  
                        <li><a href="medi_records_indicator.php" style="color: #eee; font-size: 13.5px;">MRD Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">HR Related Indicators</a></li>
                        <li><a href="hr_mast.php" style="color: #eee; font-size: 13.5px;">HR Master</a></li>
                        <li><a href="hr_indicator.php" style="color: #eee; font-size: 13.5px;">HR Indicator</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Bio Medical Equipment</a></li>
                        <li><a href="equip_mast_bio.php" style="color: #eee; font-size: 13.5px;">Bio Equipment Master</a></li>
                        <li><a href="equip_indicator_form_bio.php" style="color: #eee; font-size: 13.5px;">Bio Maintenance Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">General Equipment</a></li>
                        <li><a href="equip_mast.php" style="color: #eee; font-size: 13.5px;">General Equipment Master</a></li>
                        <li><a href="equip_indicator_form.php" style="color: #eee; font-size: 13.5px;">General Maintenance Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">OT  Indicators</a></li>
                        <li><a href="sentinel_event_form.php" style="color: #eee; font-size: 13.5px; font-size: 13.5px;">OT Register <br>(Sentinel Event - Surgical and Anesthetia Events)</a></li><br> -->

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Emergency Indicators</a></li>
                        <li><a href="emrgncy_register_ipd_form_emrg.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Emergency Register</a></li>

                        <!-- <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">ICU Indicator</a></li>
                        <li><a href="icu_register_ipd_form.php" style="color: #eee; font-size: 13.5px;">ICU Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Laboratory Indicators</a></li>
                        <li><a href="lab_opd_form.php" style="color: #eee; font-size: 13.5px;">Laboratory Register (OPD)</a></li>
                        <li><a href="lab_ipd_form.php" style="color: #eee; font-size: 13.5px;">Laboratory Register (IPD)</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Pharmacy Indicators (Medication Related)</a></li>
                        <li><a href="pharmcy_register_form.php" style="color: #eee; font-size: 13.5px;">Pharmacy Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Radiology Indicators</a></li>
                        <li><a href="radio_opd_form.php" style="color: #eee; font-size: 13.5px;">Radiology Register (OPD)</a></li>
                        <li><a href="radio_ipd_form.php" style="color: #eee; font-size: 13.5px;">Radiology Register (IPD)</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Form Indicators</a></li>
                        <li><a href="form_indicator.php" style="color: #eee; font-size: 13.5px;">Performance of KPI Yearly</a></li><br>
                          -->

                    </ul>
                </li>

                <!-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span style="color: #eee; font-size: 13.5px;">Audit</span> </a>
                    <ul class="ml-menu">
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">Daily Checklist</a></li><br>
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">Monthly Audit</a></li><br>                       
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">NABH Status Scoreboard</a></li><br>
                    </ul>
                </li> -->

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment-returned zmdi-hc-fw"></i><span style="color: #eee; font-size: 13.5px;">Training</span> </a>
                    <ul class="ml-menu">
                        <li><a href="http://nabhitsolutions.in/nabhbuddyTraning/login/siteLogin/<?=$_SESSION['email']?>/<?=$_SESSION['password']?>/<?=$_SESSION['department']?>" style="color: #eee; font-size: 13.5px;">Traning </a></li><br>
                        
                         
                    </ul>
                </li>


                


                

                <li><a href="documents.php"><i class="zmdi zmdi-folder zmdi-hc-fw"></i><span style="color: #eee; font-size: 13.5px;">Documentation</span> </a>
                </li>



                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span style="color: #eee; font-size: 13.5px;">SOP's</span> </a>
                    <ul class="ml-menu">
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">Pre-Entry Level SOP</a></li><br>
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">Final Level SOP</a></li><br>                       
                         
                         
                    </ul>
                </li>
               <!--  <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-balance-wallet"></i><span>Payments</span> </a>
                    <ul class="ml-menu"> 
                        <li> <a href="payments.html">Payments</a></li>
                        <li> <a href="add-payments.html">Add Payment</a></li>
                        <li> <a href="patient-invoice.html">Patient Invoice</a></li>
                    </ul>
                </li>
                <li><a href="reports.html"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li>
                <li><a href="widgets.html"><i class="zmdi zmdi-delicious"></i><span>Widgets</span></a></li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Extra Pages</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="sign-in.html">Sign In</a> </li>
                        <li> <a href="sign-up.html">Sign Up</a> </li>
                        <li> <a href="forgot-password.html">Forgot Password</a> </li>
                        <li> <a href="404.html">Page 404</a> </li>
                        <li> <a href="500.html">Page 500</a> </li>
                        <li> <a href="page-offline.html">Page Offline</a> </li>
                        <li> <a href="locked.html">Locked Screen</a> </li>
                        <li> <a href="blank.html">Blank Page</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>User Interface (UI)</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="typography.html">Typography</a> </li>
                        <li> <a href="helper-classes.html">Helper Classes</a></li>
                        <li> <a href="alerts.html">Alerts</a> </li>
                        <li> <a href="animations.html">Animations</a> </li>
                        <li> <a href="badges.html">Badges</a> </li>
                        <li> <a href="breadcrumbs.html">Breadcrumbs</a> </li>
                        <li> <a href="buttons.html">Buttons</a> </li>
                        <li> <a href="collapse.html">Collapse</a> </li>
                        <li> <a href="colors.html">Colors</a> </li>
                        <li> <a href="dialogs.html">Dialogs</a> </li>
                        <li> <a href="icons.html">Icons</a> </li>
                        <li> <a href="labels.html">Labels</a> </li>
                        <li> <a href="list-group.html">List Group</a> </li>
                        <li> <a href="media-object.html">Media Object</a> </li>
                        <li> <a href="modals.html">Modals</a> </li>
                        <li> <a href="notifications.html">Notifications</a> </li>
                        <li> <a href="pagination.html">Pagination</a> </li>
                        <li> <a href="preloaders.html">Preloaders</a> </li>
                        <li> <a href="progressbars.html">Progress Bars</a> </li>
                        <li> <a href="range-sliders.html">Range Sliders</a> </li>
                        <li> <a href="sortable-nestable.html">Sortable & Nestable</a> </li>
                        <li> <a href="tabs.html">Tabs</a> </li>
                        <li> <a href="waves.html">Waves</a> </li>
                    </ul>
                </li> -->
               <!--  <li class="header">LABELS</li>
                <li> <a href="chart_det.php"><i class="zmdi zmdi-chart-donut col-red"></i><span>Control Charts</span> </a> </li>
                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Backup Database</span> </a> </li> -->
                <!-- <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>SESSION : <?php echo $finyr;?></span> </a> </li> -->


            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red">
                        <div class="red"></div>
                        <span>Red</span> </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span> </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span> </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span> </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span> </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span> </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span> </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span> </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span> </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="chat">
                <div class="demo-settings">
                    <div class="search">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Search..." required autofocus>
                            </div>
                        </div>
                    </div>
                    <h6>Recent</h6>
                    <ul>
                        <li class="online">
                            <div class="media">
                                <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar1.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Claire Sassu</span> <span class="message">Can you share the...</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Maggie jackson</span> <span class="message">Can you share the...</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar3.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="message">Ready for the meeti...</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h6>Contacts</h6>
                    <ul>
                        <li class="offline">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar4.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a  role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar1.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="offline">
                            <div class="media"> <a class="pull-left " role="button" tabindex="0"> <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt=""> </a>
                                <div class="media-body">
                                    <span class="name">Joel King</span> <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar --> 
</section>


 
<!-- #Top Bar -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard - Emergency Officer</h2>
            <small class="text-muted">NABH For Hospitals And Healthcare Providers.</small><br><br>
            <span><b>Month : <?php echo date('M-Y');?> </b></span><br>
            <small class="text-muted">Quality Indicators</small>
        </div>
       <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card" style="height: 700px;padding-left: 20px">
                  <div class="header"><h2><b>NABH STATUS</b></h2></div>
                   <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);color: #fff;font-weight:bold;margin-right: 10px; " onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i> Print</span>
                   <br>
                  <div><?php include"AllScoreTab.php";?><br> <br><br><br><?php include"AllScoreGuage.php";?></div>
                   
                
                </div>
            </div>


             <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                  
                  
                        <div><?php include"AllFAQ1.php";?><?php include"AllFAQ2.php";?></div> 
                </div>
            </div>
            
           
        </div>
   
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No of Emergencies</div>
                        <div class="number"><?php echo ($no_of_emer);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Average Emergencies Arival Time</div>
                        <div class="number"><!-- <?php echo round($avg_imgncy_arival_time)." sec / ";
                echo round($avg_imgncy_arival_time/3600)." hrs "?> --></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">No of Brought Dead</div>
                        <div class="number"><?php echo $brought_dead;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No of Return to Emergency Dep</div>
                        <div class="number"><?php echo $back_to_emrgncy;?></div>
                    </div>
                </div>
            </div>
        </div>
          <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Return to Emergency Dep within 72hrs</div>
                        <div class="number"><?php echo $back_to_emrgncy_72;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">% of Return to Emergency Within 72hrs</div>
                        <div class="number"><?php echo round($per_back_to_emrgncy_72)." % ";?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Average Length of stay</div>
                        <div class="number"><?php echo number_format($los_count ,2);?> <small>Days</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Surgeries</div>
                        <div class="number"><?php echo $s_count;?></div>
                    </div>
                </div>
            </div>
        </div>
        
<!--QUALITY INDICATOR START-->
   <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                        <div class="header"><h2><b>Quality INDICATOR</b></h2></div>
                        <div><?php include"KPICharts/QItab_chart.php";?></div>
                     </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                        <div class="header"><h2><b>TRAINING</b></h2></div>
                    <?php include"KPICharts/Trainingtab_chart.php";?>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card" style="height: 710px;;">
                    <!-- <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div> -->
                    <div class="content">
                         <div class="header"><h2><b>NABH FAQ'S STATUS</b></h2></div>
                    <div>
                                 <form method="post" enctype="multipart/form-data"  id="faq_emergency">
                                    
                                        <div class="container">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 320px;" type="button" class="btn btn-info btn-lg" class="show_faq_emergency" id="show_faq_emergency">FAQ’S FOR EMERGENCY MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal6" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR EMERGENCY MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                           <th>Incharge/Chapter Champion</th>
                                                                            <th>QM</th>
                                                                          
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_emergency=array('Mission Vision',' Patient Rights and responsibilities',
                                                                      'MLC procedure – records',' P & P for CPR','Scope of services',
                                                                      ' Services not available ','crash cart – register',' Emergency drugs',
                                                                      ' High risk drugs','BME record – history card of equipments','Instruments register','  Code blue mock drill',' Humidifier/ Oxygen supply','BMW segregation / guide line',
                                                                      'Triage','Criteria for stable and unstable patient',' Transfer procedure',
                                                                      ' P & P for Brought dead  patient','P & P for Ambulance  ',' DAMA','Vulnerable Patients',
                                                                      ' Patient identifier','Verbal order policy','Close monitoring for high risk drugs',
                                                                      ' Spill management ',' HIC practices',' Sample collection','Safe transfer to wards');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_emergency as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi6_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr6_<?php echo $key+1;?>" /></td>


                                                                            
                                                                        </tr>
                                                                        
                                                           <?php  } ?>             

                                                                        
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td>Completed</td>
                                                                                        <td>Not-Completed</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span id="total_faq_emergency">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_emergency">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_emergency">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_emergency">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_emergency">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_emergency" class="btn btn-link waves-effect" id="action_emergency">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab6" cellpadding="0" cellspacing="0" border="1" width="320" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_emergency"><?php echo $row4['totalemr'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/Chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_emergency"><?php echo $rowcompqiemr['compqiemr'];?></span></td>
                                                            <td><span id="total_faq_qi_n_emergency"><?php echo $rownotcompqiemr['notcompqiemr'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_emergency"><?php echo $rowcomphremr['comphremr'];?></span></td>
                                                            <td><span id="total_faq_hr_n_emergency"><?php echo $rownotcomphremr['notcomphremr'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    <!--TRAINIG END-->
 
        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Hospital Survey</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="line_chart" height="70"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

 

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="../assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js --> 
<script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="../assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js --> 

<script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="../assets/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js --> 
<script src="../assets/js/pages/index.js"></script>
<script src="../assets/js/pages/charts/sparkline.min.js"></script>
 <script type="text/javascript">
 $(document).on('submit', '#faq_emergency', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_emergency").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_emergency.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            location.reload();
                            
                        }
                    });
                }
            
        });


 

    $('#show_faq_emergency').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_emergency.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                   
                    // $('#mo7').val(data.mo7);
                    // $('input:radio[name="chk1"]').filter('[value="'+data.chk1+'"]').attr('checked', true);
                    var total = 0;
                    var hr_y=0;
                    var hr_n=0;
                   
                    var qi_y=0;
                    var qi_n=0;
                   for (var key in data) {
                            var value = data[key].pos;
                            total++;

                            if(data[key].qi==1){
                                    qi_y++;
                                $('#chhkqi6_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr6_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        // $('#total_faq').html(total);
                        // $('#total_faq_qi_y').html(hr_y);
                        // $('#total_faq_qi_n').html(hr_n);
                        // $('#total_faq_hr_y').html(qi_y);
                        // $('#total_faq_hr_n').html(qi_n);

                        $('#total_faq_emergency').html(total);
                        $('#total_faq_hr_y_emergency').html(hr_y);
                        $('#total_faq_hr_n_emergency').html(hr_n);
                        $('#total_faq_qi_y_emergency').html(qi_y);
                        $('#total_faq_qi_n_emergency').html(qi_n);


                          var row = document.getElementById("showtab6").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;

                    // $('#action').val("Update Details");
                    $('#myModal6').modal('show');                   
                    
                }
            })
        });
 </script>
</body>
</html>