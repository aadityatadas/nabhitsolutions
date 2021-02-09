<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hospi</b>Xperts</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../vendor/img/icon2.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../vendor/img/icon2.png"   alt="User Image"><br>
                 <a href="change_pass.php" class="btn btn-default ">Change Password</a><br>
                 <a href="../logout.php" class="btn btn-default ">Sign out</a>
              </li>
              <!-- Menu Body -->
               
              <!-- Menu Footer-->
               
                 
                <div class="pull-right"> 
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
           
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../vendor/img/icon3.png" class="img-circle" alt="User Image">
        </div><br>
        <div class="pull-left info">
           
          <a href="#" style="color:#e6eeff; "><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="border-color:#333; font-size: 13px; color: #e6eeff; font-weight: 100; font-family:sans-serif; line-height: 2.428560;">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active treeview">
          <a href="indexnew.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
         
            </span>
          </a>
           
         
                        

                         <!-- <li>
                            <a href="patient_regist_form.php" style="color:#e6eeff;  background-color:   #261a0d;"> <i class="fa fa-home fa-fw" ></i>  Patient's Registration </a>
                        </li><br> -->

                        <li>
                            <a href="#" style="color:#e6eeff;  background-color:   #261a0d;"> <i class="fa fa-home fa-fw" ></i>  Front Office / Reception &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li> 
                        <li>
                            <a href="hosp_util_form.php" style="color:#e6eeff; " ><i class="fa fa-renren fa-fw" ></i> IPD Register</a>
                        </li>
                        <li>
                            <a href="opd_waittm_form_det.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> OPD Register </a>
                        </li>
                        <li>
                            <a href="bed_occup_form.php" style="color:#e6eeff; " ><i class="fa fa-renren fa-fw"></i> Bed Occupancy Report </a>
                        </li>
                          <li>
                            <a href="opd_feedback_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> OPD Feedback Form</a>
                        </li>
                          <li>
                            <a href="ipd_feedback_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> IPD Feedback Form</a>
                        </li>
                        
                        <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw" ></i>   Infection Control Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>
            
                         <li>
                            <a href="vent_ass_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Ventilator Associated Pnemonia</a>
                        </li>
                         <li>
                            <a href="cat_ass_uti_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Catheter Associated UTI</a>
                        </li>
                        <li>
                            <a href="cent_line_ass_bsi_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Central Line Associated BSI</a>
                        </li>
                       <li>
                            <a href="surg_site_inf_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Surgical Site Infection Register</a>
                        </li>
                        <li>
                            <a href="needle_prick_inj_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Occupational Exposure/Needle <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prick Injury Register</a>
                        </li>
                        
                        <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i>   Doctor's Related Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>
                        <li>
                            <a href="int_asst_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Initial Assessment Register</a>
                        </li>
                         <li>
                            <a href="ipd_waittm_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> IPD Discharge Register</a>
                        </li>
          
                         <li>
                            <a href="blood_trasfusion_event.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Blood Trasfusion Register</a>
                        </li>
                                    <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i>   Nurse's Related Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>
                        
                        <li>
                            <a href="care_relate_event.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Nursing Care Register</a>
                        </li>
                            <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i>   Medical Records Indicator &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>
                        <li>
                            <a href="medi_records_indicator.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> MRD Register</a>
                        </li>

                        
                          <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i>  HR Related Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>
                          
            
            
                         <li>
                            <a href="hr_mast.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> HR Master</a>
                        </li>
                         <li>
                            <a href="hr_indicator.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> HR Indicator</a>
                        </li>

                         <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> Bio Medical Equipment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>

                         <li>
                            <a href="equip_mast_bio.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Bio Equipment Master</a>
                        </li>
                         <li>
                            <a href="equip_indicator_form_bio.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Bio Maintenance Register</a>
                        </li>

                        <!-- <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> Equipment Related Indicators <i class="fa fa-angle-double-down"></i></a>
                        </li> -->
                         <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> General Equipment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>

                        <li>
                            <a href="equip_mast.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> General Equipment Master</a>
                        </li>
                         <li>
                            <a href="equip_indicator_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> General Maintenance Register</a>
                        </li>

                        <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> OT  Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i> </a>
                        </li>
                         <li>
                            <a href="sentinel_event_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i>OT Register <br>&nbsp;&nbsp;&nbsp;&nbsp;(Sentinel Event - Surgical and <br> &nbsp;&nbsp;&nbsp;&nbsp; Anesthetia Events)</a>
                            <!-- <li>
                            <a href="sentinel_event_form_new.php"><i class="fa fa-renren fa-fw"></i> Self Assessment Toolkit </a>
                        </li> -->
                        </li>
                        <!--  <li>
                            <a href="#"><i class="fa fa-home fa-fw"></i> Emergency Register</a>
                        </li> -->
                         
                        <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> Emergency Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>

                        <li>
                            <a href="emrgncy_register_ipd_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Emergency Register</a>
                        </li>

                       <!--  <li>
                            <a href="#"><i class="fa fa-home fa-fw"></i> ICU Register </a>
                        </li> -->
                         
                        <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> ICU Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>

                        <li>
                            <a href="icu_register_ipd_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> ICU Register</a>
                        </li>

                        <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> Laboratory Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>

                        <li>
                            <a href="lab_opd_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Laboratory Register (OPD)</a>
                        </li>

                        <li>
                            <a href="lab_ipd_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Laboratory Register (IPD)</a>
                        </li>

                         

                        <!-- <li>
                            <a href="#"><i class="fa fa-home fa-fw"></i> Pharmacy Registration  </a>
                        </li>
 -->
                         <li>
                            <a href="#" style="color:#e6eeff; background-color: #261a0d;"><i class="fa fa-home fa-fw"></i> Pharmacy Indicators &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Medication Related)</a>
                        </li>
                        <li>
                            <a href="pharmcy_register_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Pharmacy Register</a>
                        </li> 

                        <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d; "><i class="fa fa-home fa-fw"></i> Radiology Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>

                        <li>
                            <a href="radio_opd_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Radiology Register (OPD)</a>
                        </li>

                        <li>
                            <a href="radio_ipd_form.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Radiology Register (IPD)</a>
                        </li>

                        <!-- <li>
                            <a href="#" style="color:#e6eeff;  background-color: #261a0d;"><i class="fa fa-home fa-fw"></i> Radiology Indicator OPD &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li> -->

                        
            
          
                        <!--<li>
                            <a href="perf_key_qlty_ind_form.php"><i class="fa fa-renren fa-fw"></i> Performance Of Key Quality Indicator</a>
                        </li>-->
                        <!-- <li>
                            <a href="form_indicator_2018.php" style="color:#e6eeff; background-color: #261a0d; "><i class="fa fa-renren fa-fw"></i> Form Indicators-2018</a>
                        </li><br> -->
                         <li>
                            <a href="#" style="color:#e6eeff; background-color: #261a0d;"><i class="fa fa-list-alt" aria-hidden="true"></i> Form Indicators &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></a>
                        </li>
                        <li>
                            <a href="form_indicator.php" style="color:#e6eeff; "><i class="fa fa-renren fa-fw"></i> Performance of KPI Yearly</a>
                        </li>

                        <li>
                            <a href="chart_det.php" style="color:#e6eeff; background-color: #261a0d;"><i class="fa fa-bar-chart-o fa-fw"></i> Control Charts </a>
                        </li><br>

                        <li>
                            <a href="#" style="color:#e6eeff; "><i class="fa fa-database fa-fw"></i> Backup Database</a>
                        </li>
            

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $i_count;?></h3>

              <p>Total No. of Inpatient Days</p>
            </div>
            <div class="icon">
             
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">  <i class="ion ion -add"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $A_count;?></h3>

              <p>Total No. of Admissions</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="ion ion -add"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $dis_count;?></h3>

              <p>Total No. of Discharges</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="ion ion -add"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $dm_count;?></h3>

              <p>Total No. of DAMA</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="ion ion -add"></i></a>
          </div>
        </div>

         <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $dh_count;?></h3>

              <p>Total No. of Death</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="ion ion -add"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $mlc_count;?></h3>

              <p>Total No. of MLC</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="ion ion -add"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo number_format($los_count ,2);?></h3>

              <p>Average Length of stay</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="ion ion -add"></i></a>
          </div>
        </div>

        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $s_count;?></h3>

              <p>Total No. of Surgeries</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">  <i class="ion ion -add"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div><br><br><br>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable" style="position: relative; height: 2050px; width: 2150px;">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
           <!-- <ul class="nav nav-tabs pull-right" >
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
 
              <li class="pull-left header"><i class="fa fa-inbox"></i> Graph</li>
            </ul>
            <div class="tab-content no-padding" >
              <!-- Morris chart - Sales -->
              <!--<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 500px; width: 2120px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 500px; width: 1700px;"></div>-->
            </div>


          </div></section></div></section></div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
           
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.5.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://Hospiexperts.com">Hospiexperts</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
   
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
