
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

<!DOCTYPE html>
<html>
<head>
 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>HospiXperts-NABH Consultants & Service | NABH Certification‎</title>
        
       
        
       
         <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
       <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        
         <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />
         <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
         <link href="../assets/css/main.css" rel="stylesheet">
         <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> -->
         <!-- <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />  -->

  
        <!-- <style>
            .sidebar .menu .list a {
            color: #eee;
            font-size: 13.5px;
        }
        </style> -->
        <style>
            .sidebar ul li 
            {
            border-bottom: none;
             }
        </style> 
        <style type="text/css">
                .sidebar .user-info
                 {
            
                white-space: nowrap;
                position: relative;
                height: 230px;
                
                }
        </style>
        <style type="text/css">
                .color-bg 
                {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1;
                width: 100%;
                height: 340px;
                padding: 10px;
            }
    </style>

   
</head>
 
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
        <!-- <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html" style="font-size: 27px; letter-spacing: 3.5px; padding-left: 15px;">Hospiexperts</a>

        </div> -->
         <ul class="nav navbar-nav navbar-right">
            <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in">&nbsp;Lougout</i></li>
         </ul>
    </div>
</nav>
<!-- #Top Bar -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
         <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html" style="font-size:30px; letter-spacing: 3.5px; padding-left: 15px;padding-top: 0px;">Hospiexperts</a></div>


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
                <li class="active open"><a href="Super_admin_dashbord.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


               <!--  <li><a href="admin-kpi.php"><i class="zmdi zmdi-home"></i><span>K.P.I. - Front Office</span></a></li> -->                                               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px;">Quality Indicators</span> </a>
                    <ul class="ml-menu">
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
                        <li><a href="performence.php" style="color: #eee; font-size: 13.5px;">Performance</a></li>
                         

                    </ul>
                </li>

               <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px;">Audit</span> </a>
                    <ul class="ml-menu">
                        <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Quaterly Audit</a></li>
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
                    </ul>
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
                </li>
                 <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Daily  Audit</a></li>  
                 <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Daily Audit</span> </a>
                    <ul class="ml-menu">
                        
                        
                        
                        <li><a href="hr_audit_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  HR  Audit</a></li>
                        
                        <li><a href="ward_round_cklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  Ward Round Checklist</a></li>
                        
                        <li><a href="pharmacy_round_chklst_formNew_admin.php" style="color: #eee; font-size: 13.5px;">  Pharmacy round  Checklist</a></li>
                        
                        
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
                 <li> <a href="graphicalreprsentation.php"><i class="zmdi zmdi-chart-donut col-blue"></i><span>Graphical Reprsentation</span> </a> </li>
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


 
 

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<!-- <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> -->
<script src="../assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js  -->
<script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="../assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js --> 

<script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="../assets/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js --> 
<!-- <script src="../assets/js/pages/index.js"></script> -->
<script src="../assets/js/pages/charts/sparkline.min.js"></script>
</body>
</html>