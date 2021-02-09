<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HospiXperts-NABH Consultants & Service | NABH Certification‎</title>

  <?php
    error_reporting(0);
    session_start();
    include"dbinfo.php";
    $cdate = date('Y-m-d');
    $fdt = date('Y-m-01');
    $tdt = date('Y-m-31');
    
    $qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '$fdt' AND '$tdt') AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $res = mysqli_fetch_assoc($qry);
  $i_count = $res["std"];
  
 $qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm BETWEEN '$fdt' AND '$tdt'")or die(mysqli_error($connect));
  $A_count = mysqli_num_rows($qry2);

  $qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $dis_count = mysqli_num_rows($qry3_1);

  $qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $dm_count = mysqli_num_rows($qry3_2);

  $qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (huf_dddd BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $dh_count = mysqli_num_rows($qry3_3);

  $qry3_4 = mysqli_query($connect,"SELECT huf_mlc FROM tbl_huf WHERE huf_mlc = 'MLC' AND (huf_dadm BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $mlc_count = mysqli_num_rows($qry3_4);

  $dy = $i_count * 24;
  $dys = $dy / $A_count;
  $hmin = $dys / 24;
  list($number1, $number2) = explode('.', $hmin);
    
    //$hrs = $number2 * 0.24;
    //list($numb1, $numb2) = explode('.', $hrs);
    $los_count = $number1.'.'.$number2;
    //$los_count1 = $numb1;
    
    $qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (huf_dadm BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
    $s_count = mysqli_num_rows($qry5);
        
    $qry6 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm = '$cdate' AND huf_ddd != '$cdate'")or die(mysqli_error($connect));
    $c_count = mysqli_num_rows($qry6);
    
    $qry7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = ''")or die(mysqli_error($connect));
    $c2_count = mysqli_num_rows($qry7);
    
    $c3_count = $c_count + $c2_count;
    
?>
<?php
    error_reporting(0);
    session_start();
    include"dbinfo.php";
    $frdt = date('Y-m-01');
    $todt = date('Y-m-31');
    
    $qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (huf_dadm BETWEEN '$frdt' AND '$todt') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
    while($res = mysqli_fetch_array($qry))
    {
        $sm_std = $res["int_tottm"];
        list($num1, $num2) = explode('.', $sm_std);
        $hr_num = $hr_num + $num1;
        $min_num = $min_num + $num2;
    }
    $sum_std = ($hr_num * 60) + $min_num;   
    
    $qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (huf_dadm BETWEEN '$frdt' AND '$todt') AND int_ddd != ''")or die(mysqli_error($connect));
    $s_count = mysqli_num_rows($qry5);
    
    $tot_count = $sum_std / $s_count;
    if($tot_count >= 60)
    {
        $tt_count = $tot_count / 60;
        list($number1, $number2) = explode('.', $tt_count);
        
        $tot_min = $tot_count - ($number1 * 60);
        if($tot_min >= 10)
        {
            $numb3 = $number1.'.'.$tot_min;
        }else if($tot_min < 10){
            $a = 0;
            $numbr3 = $number1.'.'.$a.''.$tot_min;
            $numb3 = number_format($numbr3,2);
        }       
    }else if($tot_count < 60){
        list($numb1, $numb2) = explode('.', $tot_count);
        $aj = 0;
        $numbr3 = $aj.'.'.$numb1;
        $numb3 = number_format($numbr3,2);
    }
?>
<?php
    error_reporting(0);
    session_start();
    include"dbinfo.php";
    $frdt = date('Y-m-01');
    $todt = date('Y-m-31');
    $qry123 = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_huf WHERE vent_dt_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
    $res123 = mysqli_fetch_assoc($qry123);
    $i_count12 = $res123["std"];

    $qry213 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (vent_dt_iuc BETWEEN '$frdt' AND '$todt') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
    $v_count123 = mysqli_num_rows($qry213);
    $vap_count123 = $v_count123*1000/$i_count12;
    
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
            <a class="dummy-media-object" href="#"> <img class="round" src="assetqs/images/xs/avatar5.jpg" alt=""/>
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
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html" style="font-size: 27px; letter-spacing: 3.5px; padding-left: 15px;">Hospiexperts</a></div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i> <span class="label-count"></span> </a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-green"><i class="zmdi zmdi-account-add"></i></div>
                                <div class="menu-info">
                                    <h4>12 new members joined</h4>
                                    <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-cyan"><i class="zmdi zmdi-shopping-cart-plus"></i></div>
                                <div class="menu-info">
                                    <h4>4 sales made</h4>
                                    <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> deleted account</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-orange"><i class="zmdi zmdi-edit"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> changed name</h4>
                                    <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue-grey"><i class="zmdi zmdi-comment-alt-text"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> commented your post</h4>
                                    <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-green"><i class="zmdi zmdi-refresh-alt"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> updated status</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-purple"><i class="zmdi zmdi-settings"></i></div>
                                <div class="menu-info">
                                    <h4>Settings updated</h4>
                                    <p> <i class="material-icons">access_time</i> Yesterday </p>
                                </div>
                                </a> </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>
            <!-- #END# Notifications --> 
            <!-- Tasks -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i><span class="label-count"></span> </a>
                <ul class="dropdown-menu">
                    <li class="header">TASKS</li>
                    <li class="body">
                        <ul class="menu tasks">
                            <li> <a href="javascript:void(0);">
                                <h4> Task 1 <small>32%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4>Task 2 <small>45%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4>Task 3 <small>54%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4> Task 4 <small>65%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%"> </div>
                                </div>
                                </a> </li>                          
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Tasks</a> </li>
                </ul>
            </li>
            <!-- #END# Tasks -->
           <li>
               
                 <!--<a href="change_pass.php" class="btn btn-default ">Change Password</a><br>-->
                 <a href="../logout.php" >Sign out</a>
              </li>
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
                <ul>
                    <!-- <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li> -->
                    <!-- <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li>                     -->
                    <!-- <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li> -->
                    <!-- <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in"></i></a></li> -->
                </ul>
            </div>
            <div class="quick-stats">
                <h5>Today Report</h5>
                <ul>
                    <li><span>16<i>Patient</i></span></li>
                    <li><span>20<i>Panding</i></span></li>
                    <li><span>04<i>Visit</i></span></li>
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu" >
            <ul class="list" >
                <li class="header" style="color: #eee;">MAIN NAVIGATION</li>
                <li class="active open"><a href="dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

               <!--  <li><a href="admin-kpi.php"><i class="zmdi zmdi-home"></i><span>K.P.I. - Front Office</span></a></li> -->                                               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px;">Quality Indicators</span> </a>
                    <!-- <ul class="ml-menu">
                        <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Front Office</a></li>
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
                        <li><a href="sentinel_event_form.php" style="color: #eee; font-size: 13.5px; font-size: 13.5px;">OT Register <br>(Sentinel Event - Surgical and Anesthetia Events)</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Emergency Indicators</a></li>
                        <li><a href="emrgncy_register_ipd_form.php" style="color: #eee; font-size: 13.5px;">Emergency Register</a></li><br>

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">ICU Indicator</a></li>
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
                         

                    </ul> -->
                </li>


                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px;">Audit</span> </a>
                    <ul class="ml-menu">
                       <!--  <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Quaterly Audit</a></li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Quaterly Audit</span> </a>
                    <ul class="ml-menu">
                        <li><a href="https://nabhbuddylive.in/test6Audit/" style="color: #eee; font-size: 13.5px;"></a></li>
                        
                        
                         <li><a href="death_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">Death Audit</a></li>
                          <li><a href="clinical_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">Clinical Audit</a></li>
                           <li><a href="antibiotics_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">Antibiotics Audit</a></li>
                        
                        
                        
                        
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span style="color: #eee; font-size: 13.5px;">HIC Audit</span> </a>
                            <ul class="ml-menu">
                            <li><a href="hic1_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Hand hygiene</a></li>
                              <li><a href="hic2_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Bio-Medical Waste Management</a></li>
                              <li><a href="hic3_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Sharp Safety Audit</a></li>
                              <li><a href="hic4_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  HIC 4 Audit</a></li>
                              <li><a href="hic5_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Environment Audit</a></li>
                              <li><a href="hic6_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Management of Patient Equipment</a></li>
                              <li><a href="hic7_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Resuscitation equipment</a></li>
                              <li><a href="hic8_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Transportation & Handling of Specimens</a></li>
                              <li><a href="hic9_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Kitchens</a></li>
                              <li><a href="hic10_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  HIC 10 Audit</a></li>
                              <li><a href="hic11_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Care of Invasive device</a></li>
                              <li><a href="hic12_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Care of Urinary Catheter</a></li>
                              <li><a href="hic13_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Care ventilated patient</a></li>
                              <li><a href="hic14_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Enteral feeding</a></li>
                              <li><a href="hic15_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Isolation Precautions</a></li>
                              <li><a href="hic16_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Laundry Audit</a></li>
                              <li><a href="hic17_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Ward management of linen</a></li>
                              <li><a href="hic18_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Endoscopy</a></li>
                              <li><a href="hic19_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Infection Prevention and Control-Management</a></li>
                              <li><a href="hic20_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Operation Theatre Asepsis</a></li>
                              <li><a href="hic21_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  CSSD</a></li>
                              <li><a href="hic22_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  ANTIMICROBIAL STEWARDSHIP Audit</a></li>
                              <li><a href="hic23_admin.php" style="color: #eee; font-size: 13.5px;"><i class="fa fa-minus"></i>  Scoring summary</a></li>
                        </ul>
                </li>
  <!--<li><a href="#" style="color: #eee; font-size: 13.5px;">Monthly Audit</a></li><br>                       
                        <li><a href="#" style="color: #eee; font-size: 13.5px;">NABH Status Scoreboard</a></li>--><br>
                    <!-- </ul>
                </li>
 
                <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Monthly Audit</a></li>  
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Monthly Audit</span> </a>
                    <ul class="ml-menu">
                        
                        
                        
                        <li><a href="prescription_audit_formNew.php" style="color: #eee; font-size: 13.5px;"> Prescription Audit </a></li>
                        
                        <li><a href="medical_records_audit_formNew.php" style="color: #eee; font-size: 13.5px;"> Medical Records Audit </a></li>
                        
                        <li><a href="facility_inspection_audit_formNew.php" style="color: #eee; font-size: 13.5px;"> FACILITY INSPECTION AUDIT </a></li>
                        
                        
                        <li><a href="icu_audit_chklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;"> ICU Audit Checklist </a></li>
                        
                        
                        <li><a href="radion_saftey_chklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;"> Radiation  Checklist </a></li>
                        
                         
                    </ul>
                </li> -->
                 <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Daily  Audit</a></li>  
                 <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Daily Audit</span> </a>
                    <ul class="ml-menu">
                        
                        
                        
                        <!-- <li><a href="hr_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  HR  Audit</a></li>
                        
                        <li><a href="ward_round_cklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  Ward Round Checklist</a></li>
                        
                        <li><a href="pharmacy_round_chklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  Pharmacy round  Checklist</a></li>
                        
                         -->
                        <li><a href="biomedicaleqip_sfty_check_list.php" style="color: #eee; font-size: 13.5px;">  Bio-Medical Equipment Safety checklist </a></li>
                         
                        
                        
                        <li><a href="bio_sfty_chklst.php" style="color: #eee; font-size: 13.5px;">  Bio Safety Checklist Checklist</a></li>
                        
                        <li><a href="bmw_chklst_formNew.php" style="color: #eee; font-size: 13.5px;">  Bio-Medical Waste Management Checklist</a></li>
                        
                        <li><a href="bme_chklist_formNew.php" style="color: #eee; font-size: 13.5px;">  Biomedical Equipment Safety monthly Checklist</a></li>
                        
                        
                         
                    </ul>
                </li> 

                    </ul>
                </li>


               
               

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span style="color: #eee; font-size: 13.5px;">Training</span> </a>
                    <ul class="ml-menu">
                        <li><a href="http://nabhbuddylive.in/nabhbuddyTraning/login/siteLogin/<?=$_SESSION['email']?>/<?=$_SESSION['password']?>/<?=$_SESSION['department']?>" style="color: #eee; font-size: 13.5px;">Traning </a></li><br>
                        
                         
                    </ul>
                </li>

                <li><a href="http://nabhbuddylive.in/nabhsmhri/hms/nabh/application/documents.php"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Documentation</span> </a>
                     
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
                <li class="header">LABELS</li>
                <li> <a href="chart_det.php"><i class="zmdi zmdi-chart-donut col-red"></i><span>Control Charts</span> </a> </li>
                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Backup Database</span> </a> </li>
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
            <h2>Dashboard </h2>
            <small class="text-muted">NABH For Hospitals And Healthcare Providers.</small><br><br>
            <span><b>Month : <?php echo date('M-Y');?> </b></span><br>
            <small class="text-muted">Quality Indicators</small>
        </div>
        
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Inpatient Days</div>
                        <div class="number"><?php echo $i_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Admissions</div>
                        <div class="number"><?php echo $A_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Discharges</div>
                        <div class="number"><?php echo $dis_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of DAMA</div>
                        <div class="number"><?php echo $dm_count;?></div>
                    </div>
                </div>
            </div>
        </div>
          <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of Death</div>
                        <div class="number"><?php echo $dh_count;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of MLC</div>
                        <div class="number"><?php echo $mlc_count;?></div>
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

    <!--NABH STATUS START-->
         <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   
                    <table class="table header">
                        <tr>
                            <th><h2><b>NABH STATUS</b></h2></th>
                            <th><h2><b><center>FAQ's</center></b></h2></th>
                        </tr>
                        <tr>
                            <td><img src="../application/images/nabhdashboared.png" height="530" width="600">
                         </td>
                            <td>

                            
                             
                              <div>
                                      
                                   <form method="post" enctype="multipart/form-data"  id="faq_safety">
                                    
                                        <div class="container" style="width: 800px;">

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 600px;" type="button" class="btn btn-info btn-lg" class="show_faq_safety" id="show_faq_safety">FAQ’S FOR SAFETY MANUAL</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal4" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR SAFETY MANUAL</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-lg-12">
                                                            <div id="ord" class="table-responsive">
                                                                
                                                                <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>QI</th>
                                                                            <th>HR</th>
                                                                            
                                                                        </tr>
                                                                    </thead>

                                                                    <?php   
                                                                    $data_safety=array('Mock drills','MOM',
                                                                        'Manual','Fire  Training','Emergency codes – RED, BLUE, PINK, ORANGE, YELLOW','Training',' Fire NOC','Fire exit','Evacuation plan'
                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_safety as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr_<?php echo $key+1;?>" /></td>


                                                                            
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
                                                                            <td><span id="total_faq_safety">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_safety">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_safety">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_safety">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_safety">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_safety" class="btn btn-link waves-effect" id="action_safety">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                                                        
                                 </form>
                             </div>
                            
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <!--NABH STATUS END-->
    <!--QUALITY INDICATOR START-->
         <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>QUALITY INDICATOR</b></h2></div>
                    <table class="table header table-hover table-bordered">
                        <tr  style="background-color:#457fca;">
                            <th><h2 style="color:white;">COMPLITED</h2></th>
                            <th><h2 style="color:white;">NON-COMPLITED</h2></th>
                        </tr>
                        <tr>
                            <td style="color:red;">5</td>
                            <td style="color:red;">10</td>
                        </tr>
                        <tr>
                            <td style="color:red;">6</td>
                            <td style="color:red;">10</td>
                        </tr>
                        <tr>
                            <td style="color:red;">6</td>
                            <td style="color:red;">3</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <!--QUALITY INDICATOR END-->
    <!--AUDIT START-->
         <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>AUDIT</b></h2></div>
                    <table class="table header table-hover table-bordered">
                        <tr style="background-color:#457fca;">
                            <th><h2 style="color:white;">COMPLITED</h2></th>
                            <th><h2 style="color:white;">NON-COMPLITED</h2></th>
                        </tr>
                        <tr>
                            <td style="color:red;">10</td>
                            <td style="color:red;">5</td>
                        </tr>
                        <tr>
                            <td style="color:red;">7</td>
                            <td style="color:red;">15</td>
                        </tr>
                        <tr>
                            <td style="color:red;">11</td>
                            <td style="color:red;">7</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <!--AUDIT END-->
    <!--TRAINIG START-->
         <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>TRAINING</b></h2></div>
                    <table class="table header table-hover table-bordered">
                        <tr  style="background-color:#457fca;">
                            <th><h2 style="color:white;">COMPLITED</h2></th>
                            <th><h2 style="color:white;">NON-COMPLITED</h2></th>
                        </tr>
                        <tr>
                            <td style="color:red;">10</td>
                            <td style="color:red;">12</td>
                        </tr>
                        <tr>
                            <td style="color:red;">14</td>
                            <td style="color:red;">10</td>
                        </tr>
                        <tr>
                            <td style="color:red;">8</td>
                            <td style="color:red;">7</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <!--TRAINIG END-->
    <!--REPORTSTART-->
         <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>REPORT</b></h2></div>
                    <table class="table header table-hover table-bordered">
                        <tr  style="background-color:#457fca;">
                            <th><h2 style="color:white;width: 300PX;">TRAINING</h2></th>
                            <th><h2 style="color:white;width: 300PX;">QUALITY INDICATOR </h2></th>
                            <th><h2 style="color:white;width: 300PX;">HR</h2></th>
                        </tr>
                        <tr>
                            <td style="color:red;">10</td>
                            <td style="color:red;">12</td>
                            <td style="color:red;">12</td>
                        </tr>
                        <tr>
                            <td style="color:red;">14</td>
                            <td style="color:red;">10</td>
                            <td style="color:red;">12</td>
                        </tr>
                        <tr>
                            <td style="color:red;">8</td>
                            <td style="color:red;">7</td>
                            <td style="color:red;">12</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <!--REPORT END-->
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Entries</h2>
                        <small class="text-muted">Total Entries done by different Users</small><br><br>
                        <?php echo ucfirst($DB_ROW['stf_uname']); ?> 
                       
                    </div>
                    <div class="body">
                <div class="row clearfix">
  
                            <?php 
                                     $sql = "SELECT * From tbl_staff  WHERE stf_id=".$_SESSION['id'];
                                     $result = mysqli_query($connect, $sql);
                                     $DB_ROW = mysqli_fetch_assoc($result);
                                     
                                     

                            ?>

                <!--code start -->
                  

                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="info-box-4 bg-cyan hover-zoom-effect">
                        <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                        <div class="content">
                           <div class="text">IPD</div>
                            <?php 
        
                                     $c = $DB_ROW['stf_uname'];
                                     $sql = "SELECT * From tbl_huf  WHERE huf_recd='$c'";

                                     $result = mysqli_query($connect, $sql);
                                    

                             ?>
                            <div class="number"><?=mysqli_num_rows($result); ?></div>
                            </div>
                             </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-6">
                           <div class="info-box-4 bg-cyan hover-zoom-effect">
                           <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                           <div class="content">
                           <div class="text">OPD</div>
                            <?php 
        
                                     $d = $DB_ROW['stf_uname'];
                                     $sql = "SELECT * From tbl_opdwttm  WHERE opdwttm_recd ='$d'";

                                     $result = mysqli_query($connect, $sql);
                                    

                             ?>
                            <div class="number"><?=mysqli_num_rows($result); ?></div>
                            </div>
                             </div>
                    </div>
                    
                    </div>


                    

                    
                        
                </div>
            </div>
        </div>
    </div>
       
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
        
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>New Patient <small >18% High then last month</small></h2>
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
                        <div class="stats-report">
                          <div class="stat-item">
                            <h5>Overall</h5>
                            <b class="col-indigo">70.40%</b></div>
                          <div class="stat-item">
                            <h5>Montly</h5>
                            <b class="col-indigo">25.80%</b></div>
                          <div class="stat-item">
                            <h5>Day</h5>
                            <b class="col-indigo">12.50%</b></div>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                                 data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(63, 81, 181)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                                 data-offset="90" data-width="100%" data-height="100px" data-line-Width="1" data-line-Color="rgb(63, 81, 181, 0.7)"
                                 data-fill-Color="rgba(63, 81, 181, 0.3)"> 6,1,3,3,6,3,2,2,8,2 </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>Heart Surgeries <small>18% High then last month</small></h2>
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
                        <div class="stats-report">
                          <div class="stat-item">
                            <h5>Overall</h5>
                            <b class="col-blue-grey">80.40%</b></div>
                          <div class="stat-item">
                            <h5>Montly</h5>
                            <b class="col-blue-grey">13.00%</b></div>
                          <div class="stat-item">
                            <h5>Day</h5>
                            <b class="col-blue-grey">9.50%</b></div>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                                 data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(96, 125, 139)" data-spot-Color="rgb(96, 125, 139, 0.7)"
                                 data-offset="90" data-width="100%" data-height="100px" data-line-Width="1" data-line-Color="rgb(96, 125, 139, 0.7)"
                                 data-fill-Color="rgba(96, 125, 139, 0.3)"> 6,4,7,8,4,3,2,2,5,6,7,4,1,5,7,9,9,8,7,6 </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>Medical Treatment <small>18% High then last month</small></h2>
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
                        <div class="stats-report">
                          <div class="stat-item">
                            <h5>Overall</h5>
                            <b class="col-green">84.60%</b></div>
                          <div class="stat-item">
                            <h5>Montly</h5>
                            <b class="col-green">15.40%</b></div>
                          <div class="stat-item">
                            <h5>Day</h5>
                            <b class="col-green">5.10%</b></div>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                                 data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(120, 184, 62)" data-spot-Color="rgb(120, 184, 62, 0.7)"
                                 data-offset="90" data-width="100%" data-height="100px" data-line-Width="1" data-line-Color="rgb(120, 184, 62, 0.7)"
                                 data-fill-Color="rgba(120, 184, 62, 0.3)"> 6,4,7,6,9,3,3,5,7,4,2,3,7,6 </div>
                    </div>
                </div>
            </div>
        </div>
       <!--  <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> New Patient List <small>Description text here...</small> </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Diseases</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Virginia </td>
                                <td>Rose</td>
                                <td>@Rose</td>
                                <td><span class="label label-danger">Fever</span> </td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>Julie </td>
                                <td>Gaylord</td>
                                <td>@Julie </td>
                                <td><span class="label label-info">Cancer</span> </td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Jacqueline </td>
                                <td>Woods</td>
                                <td>@Woods</td>
                                <td><span class="label label-warning">Lakva</span> </td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>Jonathan </td>
                                <td>Lewis</td>
                                <td>@Jonathan </td>
                                <td><span class="label label-success">Dental</span> </td>
                              </tr>
                              <tr>
                                <td>5</td>
                                <td>Margaret </td>
                                <td>Griffin</td>
                                <td>@Margaret </td>
                                <td><span class="label label-info">Cancer</span> </td>
                              </tr>
                              <tr>
                                <td>6</td>
                                <td>Joseph </td>
                                <td>Hunter</td>
                                <td>@Hunter</td>
                                <td><span class="label label-success">Dental</span> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2>PATIENT Reports</h2>
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
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Charts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dean Otto</td>
                                        <td>
                                            <span class="sparkbar">5,8,6,3,5,9,2</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>K. Thornton</td>
                                        <td>
                                        <span class="sparkbar">10,8,9,3,5,8,5</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kane D.</td>
                                        <td>
                                            <span class="sparkbar">7,5,9,3,5,2,5</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jack Bird</td>
                                        <td>
                                            <span class="sparkbar">10,8,1,3,3,8,7</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hughe L.</td>
                                        <td>
                                            <span class="sparkbar">2,8,9,8,5,1,5</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jack Bird</td>
                                        <td>
                                            <span class="sparkbar">1,8,2,3,9,8,5</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hughe L.</td>
                                        <td>
                                            <span class="sparkbar">10,8,1,3,2,8,5</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2>Visits from countries</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="country-state">
                            <li class="m-b-20">
                                <h4 class="m-b-0">6350</h4> <small>From India</small>
                                <div class="float-right">58%</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:58%;"> <span class="sr-only">58% Complete</span></div>
                                </div>
                            </li>
                            <li class="m-b-20">
                                <h4 class="m-b-0">3250</h4> <small>From UAE</small>
                                <div class="float-right">90%</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">90% Complete</span></div>
                                </div>
                            </li>
                            <li class="m-b-20">
                                <h4 class="m-b-0">1250</h4> <small>From Australia</small>
                                <div class="float-right">70%</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span></div>
                                </div>
                            </li>
                            <li  class="m-b-20">
                                <h4 class="m-b-0">1350</h4> <small>From USA</small>
                                <div class="float-right">70%</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">70% Complete</span></div>
                                </div>
                            </li>
                            <li>
                                <h4 class="m-b-0">1250</h4> <small>From UK</small>
                                <div class="float-right">65%</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:65%;"> <span class="sr-only">65% Complete</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2>PATIENT prograss</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="basic-list">
                            <li>Mark Otto <span class="label-danger label">21%</span></li>
                            <li>Jacob Thornton <span class="label-purple label">50%</span></li>
                            <li>Jacob Thornton<span class="label-success label">90%</span></li>
                            <li>M. Arthur <span class="label-info label">75%</span></li>
                            <li>Jacob Thornton <span class="label-warning label">60%</span></li>
                            <li>M. Arthur <span class="label-success label">91%</span></li>
                        </ul>
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
</body>

<script type="text/javascript">
 $(document).on('submit', '#faq_safety', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_safety").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_safety.php",
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


 

    $('#show_faq_safety').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_safety.php",
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
                                $('#chhkqi_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr_'+value).attr('checked', true);
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

                        $('#total_faq_safety').html(total);
                        $('#total_faq_hr_y_safety').html(hr_y);
                        $('#total_faq_hr_n_safety').html(hr_n);
                        $('#total_faq_qi_y_safety').html(qi_y);
                        $('#total_faq_qi_n_safety').html(qi_n);




                    // $('#action').val("Update Details");
                    $('#myModal4').modal('show');                   
                    
                }
            })
        });
 </script>


 
</html>