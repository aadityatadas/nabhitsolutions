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
                         $tbl= array( array("tbl_faq_hr","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalhr= 0;
                                                    $compqihr =0;
                                                    $notcompqihr=0;
                                                    $comphrhr =0;
                                                    $notcomphrhr=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry7= "SELECT COUNT(*) as totalhr FROM $tval[0]";
                                                            $res7= mysqli_query($connect, $qry7);
                                                            $row7=mysqli_fetch_assoc($res7);
                                                            //echo $row7['totalhr'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqihr= "SELECT COUNT(*) as compqihr  FROM $tval[0] where $tval[1]";
                                                            $rescompqihr= mysqli_query($connect, $qrycompqihr);
                                                            $rowcompqihr=mysqli_fetch_assoc($rescompqihr);
                                                           // echo $rowcompqihr['compqihr'];

                                                            $qrynotcompqihr= "SELECT COUNT(*) as notcompqihr FROM $tval[0] where $tval[2]";
                                                            $resnotcompqihr = mysqli_query($connect, $qrynotcompqihr );
                                                            $rownotcompqihr=mysqli_fetch_assoc($resnotcompqihr );
                                                          //  echo $rownotcompqihr['notcompqihr'];

                                                            $qrycomphrhr = "SELECT COUNT(*) as comphrhr  FROM $tval[0] where $tval[3]";
                                                            $rescomphrhr = mysqli_query($connect, $qrycomphrhr );
                                                            $rowcomphrhr=mysqli_fetch_assoc($rescomphrhr );
                                                           // echo $rowcomphrhr['comphrhr'];

                                                            $qrynotcomphrhr = "SELECT COUNT(*) as notcomphrhr  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrhr = mysqli_query($connect, $qrynotcomphrhr );
                                                            $rownotcomphrhr=mysqli_fetch_assoc($resnotcomphrhr);
                                                            // echo $rownotcomphrhr['notcomphrhr'];

                                                        }

                                                    

                             

 ?>
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
  
  /*$qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (huf_dadm BETWEEN '$fdt' AND '$tdt')")or die(mysqli_error($connect));
  $s_count = mysqli_num_rows($qry5);*/

  $s = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = ''")or die(mysqli_error($connect));
  $cnt2 = mysqli_num_rows($s);

  $bed = 100;
  $tot = $bed - $cnt2;
    
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

<?php
          $sql = mysqli_query($connect,"SELECT SUM(hr_absent) as abs FROM tbl_hr_indic WHERE hr_date BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
          $rs = mysqli_fetch_array($sql);
          $abs = $rs["abs"];
          $sq = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE hr_date BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
          $rq = mysqli_num_rows($sq);
          $tabss1 = ($abs/$rq/30) * 100;
          if($tabss1 > 0)
          {
            $tabs1 = number_format($tabss1,2);
          }else{
            $tabs1 = 0;
          }
        ?>


        <?php
          $sql2 = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs2 FROM tbl_hr_indic WHERE hr_date BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
          $rs2 = mysqli_fetch_assoc($sql2);
          $abs2 = $rs2["abs2"];
          $tabss2 = ($abs2/$rq);
          if($tabss2 > 0)
          {
            $tabs2 = $tabss2;
          }else{
            $tabs2 = 0;
          }
        ?>

        <?php
          $sql3 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_griv = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
          $rs3 = mysqli_num_rows($sql3);
          $tabss3 = ($rs3/$rq) * 100;
          if($tabss3 > 0)
          {
            $tabs3 = $tabss3;
          }else{
            $tabs3 = 0;
          }
        ?>

        <?php
          $sql4 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_need_inj = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
          $rs4 = mysqli_num_rows($sql4);
          $tabss4 = ($rs4/$rq) * 100;
          if($tabss4 > 0)
          {
            $tabs4 = $tabss4;
          }else{
            $tabs4 = 0;
          }
        ?>

        <?php
          $sql5 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_occpany = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
          $rs5 = mysqli_num_rows($sql5);
          $tabss5 = ($rs5/$rq) * 100;
          if($tabss5 > 0)
          {
            $tabs5 = $tabss5;
          }else{
            $tabs5 = 0;
          }
        ?>

        <?php
          $sql6 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_per_file = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
          $rs6 = mysqli_num_rows($sql6);
          $tabss6 = ($rs6/$rq) * 100;
          if($tabss6 > 0)
          {
            $tabs6 = $tabss6;
          }else{
            $tabs6 = 0;
          }
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
                    <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li>   -->                  
                    <!-- <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li> -->
                    <!-- <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in"></i></a></li>
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
                <li class="active open"><a href="dashboard-hr.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

               <!--  <li><a href="admin-kpi.php"><i class="zmdi zmdi-home"></i><span>K.P.I. - Front Office</span></a></li> -->                                               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px; ">Quality Indicators</span> </a>
                    <ul class="ml-menu">

                    	 <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">HR Related Indicators</a></li>
                        <li><a href="hr_mast_HR.php" style="color: #eee; font-size: 13.5px; line-height: 2.5">HR Master</a></li>
                        <li><a href="hr_indicator_HR.php" style="color: #eee; font-size: 13.5px; line-height: 2.5">HR Indicator</a></li><br>


                       <!--  <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Nurse Related Indicator</a></li>


                        <li><a href="ipd_feedback_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">IPD Feedback Form</a></li>
                        <li><a href="vent_ass_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Ventilator Associated Pnemonia</a></li>
                        <li><a href="cat_ass_uti_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Catheter Associated UTI</a></li>
                        <li><a href="cent_line_ass_bsi_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Central Line Associated BSI</a></li>
                        <li><a href="surg_site_inf_form_mat.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Surgical Site Infection</a></li>
                        <li><a href="needle_prick_inj_form_mat.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Occupational Exposure/ Needle Prick Injury</a></li> 
                        <li><a href="int_asst_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Initial Assessment Register</a></li>
                        <li><a href="ipd_waittm_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">IPD Discharge Register</a></li>
                        <li><a href="blood_trasfusion_event_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Blood Trasfusion Register</a></li>
                        <li><a href="care_relate_event_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Nursing Care Register</a></li>
                         <li><a href="icu_register_ipd_form_nurs.php" style="color: #eee; font-size: 13.5px;">ICU Register</a></li>

                        <li><a href="emrgncy_register_ipd_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Emergency Register</a></li>


                        <li><a href="hosp_util_form.php" style="color: #eee; font-size: 13.5px;">IPD Register</a></li>
                        <li><a href="opd_waittm_form_det.php" style="color: #eee; font-size: 13.5px;">OPD Register</a></li>
                        <li><a href="bed_occup_form.php" style="color: #eee; font-size: 13.5px;">Bed Occupancy Report</a></li>
                        <li><a href="opd_feedback_form.php" style="color: #eee; font-size: 13.5px;">OPD Feedback Form</a></li>
                        
                          

                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Infection Control Indicator</a></li>
                        
                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px; ">Doctor's Related Indicator</a></li>
                        
                        
                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Nurse's Related Indicator</a></li>  
                       

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
                       
                        <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Emergency Indicators</a></li>
                       

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
                        <li><a href="form_indicator.php" style="color: #eee; font-size: 13.5px;">Performance of KPI Yearly</a></li><br> -->
                         

                    </ul>
                </li>

               <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;">Audit</span> </a>
                    <ul class="ml-menu">
                        
                        <li><a href="hr_audit_formNew.php" style="color: #eee; font-size: 13.5px;">  HR  Audit</a></li>
                        
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment-returned zmdi-hc-fw"></i><span style="color: #eee; font-size: 13.5px;">Training</span> </a>
                    <ul class="ml-menu">
                        <li><a href="http://nabhitsolutions.in/nabhbuddyTraning/login/siteLogin/<?=$_SESSION['email']?>/<?=$_SESSION['password']?>/<?=$_SESSION['department']?>" style="color: #eee; font-size: 13.5px;">Traning </a></li><br>
                        
                         
                    </ul>
                </li>


                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-star-circle zmdi-hc-fw"></i><span style="color: #eee; font-size: 13.5px;">Assesment Tool</span> </a>
                    <ul class="ml-menu">
                        <li><a href="http://nabhitsolutions.in/hospRegistration/dashboard/nabhlogin/<?=$_SESSION['email']?>/<?=$_SESSION['password']?>" style="color: #eee; font-size: 13.5px;">Assesment Tool </a></li><br>
                        
                         
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
            <h2>Dashboard - HR</h2>
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
                        <div class="text">Employee Absentism Rate</div>
                        <div class="number"><?php echo number_format($tabs1,2);?>%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Employee Satisfaction Rate</div>
                        <div class="number"><?php echo number_format($tabs2,2);?>%</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row -->
          <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Employee Griviences rate</div>
                        <div class="number"><?php echo number_format($tabs3,2);?>%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Needle Prick Injury Rate</div>
                        <div class="number"><?php echo number_format($tabs4,2);?>%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Occupational Exposure rate</div>
                        <div class="number"><?php echo number_format($tabs5,2);?>%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">% of complete HR files</div>
                        <div class="number"><?php echo number_format($tabs6,2);?>%</div>
                    </div>
                </div>
            </div>
        </div>

          <!--NABH STATUS START-->
         <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card">
                   <div class="header"><h2><b>NABH FAQ'S STATUS</b></h2></div>
                     <div>
                                     <form method="post" enctype="multipart/form-data"  id="faq_hr">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 320px;" type="button" class="btn btn-info btn-lg" class="show_faq_hr" id="show_faq_hr">FAQ’S FOR H. R. M DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal18" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR H. R. M DEPARTMENT</h4>
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
                                                                    $data_hr=array('Manual',' QI ','Data collection for QI',
                                                                        'Forms and formats','JD/JS',' Man power requisition format '
                                                                        ,' Application form','Interview  evaluation form','   Background verification form','Joining report form',
                                                                        'Declaration for criminal check',' Document checklist',
                                                                        'Credentialing an d privileging formats (doctors/ nurses)',
                                                                        'Training attendance sheet','Training feedback form',
                                                                        'Promotions increment format','Annual appraisal form',
                                                                        'Clearance form / Exit interview','2 employee file ( Doctor) ',
                                                                        ' 2 employee file (Nurse) ','2 employee file (Administration) ',
                                                                        '2 employee file (ICN) ',' 2 employee file (Housekeeping) ',
                                                                        ' 2 employee file (Security) ',' 2 employee file ( Any technician {1 pathology/ 1 radiology} ) ',' 1 RSO file (Dr. Bang)','Dietician / Physiotherapy file',' Employee rights & responsibility',' Leave policy','Late coming policy','P & P Grievance redressal ','MOM for Grievance redressal',' P & P for Promotions /increment','P & P for Credentialing and privileging','MOM for Credentialing and privileging','Training calendar ','Training record (attendance , feedback and questioner)','Pre health check up record','Immunization record'

                                                                    );               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ( $data_hr as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi18_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr18_<?php echo $key+1;?>" /></td>


                                                                            
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
                                                                            <td><span id="total_faq_hr">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_hr">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_hr">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_hr">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_hr">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_hr" class="btn btn-link waves-effect" id="action_hr">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab18" cellpadding="0" cellspacing="0" border="1" width="320" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_hr"><?php echo $row7['totalhr'];
                                                                            ?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_hr"><?php echo $rowcompqihr['compqihr'];?></span></td>
                                                            <td><span id="total_faq_qi_n_hr"><?php echo $rownotcompqihr['notcompqihr'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_hr"><?php echo $rowcomphrhr['comphrhr'];?></span></td>
                                                            <td><span id="total_faq_hr_n_hr"><?php echo $rownotcomphrhr['notcomphrhr'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                </div>
            </div>
        </div>
    <!--NABH STATUS END-->
<!--QUALITY INDICATOR START-->
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
                        <div class="header"><h2><b>AUDIT</b></h2></div>
                    <?php include"KPICharts/Audittab_chart.php";?>
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
            
        </div>
    <!--TRAINIG END-->
 
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
 $(document).on('submit', '#faq_hr', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_hr").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_hr.php",
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


 

    $('#show_faq_hr').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_hr.php",
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
                                $('#chhkqi18_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr18_'+value).attr('checked', true);
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

                        $('#total_faq_hr').html(total);
                        $('#total_faq_hr_y_hr').html(hr_y);
                        $('#total_faq_hr_n_hr').html(hr_n);
                        $('#total_faq_qi_y_hr').html(qi_y);
                        $('#total_faq_qi_n_hr').html(qi_n);

                          var row = document.getElementById("showtab18").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;



                    // $('#action').val("Update Details");
                    $('#myModal18').modal('show');                   
                    
                }
            })
        });
 </script>

</body>
</html>