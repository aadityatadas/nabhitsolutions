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
                         $tbl= array( array("tbl_faq_nurse","qi='1'", "qi=''","hr='1'","hr=''"));

                                                    $totalnurse= 0;
                                                    $compqinurse=0;
                                                    $notcompqinurse=0;
                                                    $comphrnurse=0;
                                                    $notcomphrnurse=0;
                                                    foreach ($tbl as $tval) {
                                                          $qry18= "SELECT COUNT(*) as totalnurse FROM $tval[0]";
                                                            $res18= mysqli_query($connect, $qry18);
                                                            $row18=mysqli_fetch_assoc($res18);
                                                            //echo $row18['totalnurse'];
                                                            // echo "SELECT COUNT(*) as total FROM tbl_huf";
                                                            // die();
                                                            $qrycompqinurse  = "SELECT COUNT(*) as compqinurse  FROM $tval[0] where $tval[1]";
                                                            $rescompqinurse = mysqli_query($connect, $qrycompqinurse);
                                                            $rowcompqinurse =mysqli_fetch_assoc($rescompqinurse);
                                                           // echo $rowcompqinurse['compqinurse'];

                                                            $qrynotcompqinurse= "SELECT COUNT(*) as notcompqinurse FROM $tval[0] where $tval[2]";
                                                            $resnotcompqinurse= mysqli_query($connect, $qrynotcompqinurse);
                                                            $rownotcompqinurse=mysqli_fetch_assoc($resnotcompqinurse);
                                                          //  echo $rownotcompqinurse['notcompqinurse'];

                                                            $qrycomphrnurse= "SELECT COUNT(*) as comphrnurse  FROM $tval[0] where $tval[3]";
                                                            $rescomphrnurse= mysqli_query($connect, $qrycomphrnurse);
                                                            $rowcomphnurse=mysqli_fetch_assoc($rescomphrnurse);
                                                           // echo $rowcomphnurse['comphrnurse'];

                                                            $qrynotcomphrnurse= "SELECT COUNT(*) as notcomphrnurse  FROM $tval[0] where $tval[4]";
                                                            $resnotcomphrnurse = mysqli_query($connect, $qrynotcomphrnurse);
                                                            $rownotcomphrnurse =mysqli_fetch_assoc($resnotcomphrnurse);
                                                            // echo $rownotcomphrnurse['notcomphrnurse'];

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
  $qry = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
  $res = mysqli_num_rows($qry);
  
  $qry2 = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt' AND ipd_user != ''")or die(mysqli_error($connect));
  $res2 = mysqli_num_rows($qry2);
  
  $qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt') AND wttm_dttmds != ''")or die(mysqli_error($connect));
  $s_count = mysqli_num_rows($qry5);
  
  $qry3 = mysqli_query($connect,"SELECT SUM(ipd_score) as score FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE (DATE(wttm_dttmr) BETWEEN '$frdt' AND '$todt') AND ipd_user != ''")or die(mysqli_error($connect));
  $res3 = mysqli_fetch_assoc($qry3);
  $res = $res3["score"];
  
  $qry4 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE date(wttm_dttmr) BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
  $res4 = mysqli_num_rows($qry4);
  
  $tot_scor = ($res / 120 / $res4) * 100;
  $resul = number_format($tot_scor,2);
  
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
  $qry = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_huf WHERE vent_dt_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
  $res = mysqli_fetch_assoc($qry);
  $i_count0 = $res["std"];
  ////
     $qry1 = mysqli_query($connect,"SELECT SUM(vent_tcd) as std FROM tbl_vent_ass_phmn WHERE vent_dt_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
  $res1 = mysqli_fetch_assoc($qry1);
  $i_count1 = $res1["std"];

  //// 
  $i_count = $i_count1 + $i_count0;


  $qry2 = mysqli_query($connect,"SELECT vent_spc FROM tbl_huf WHERE (vent_dt_iuc BETWEEN '$frdt' AND '$todt') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
  $v_count2 = mysqli_num_rows($qry2);

  $qry3 = mysqli_query($connect,"SELECT vent_spc FROM tbl_vent_ass_phmn WHERE (vent_dt_iuc BETWEEN '$frdt' AND '$todt') AND vent_spc = 'Yes'")or die(mysqli_error($connect));
  $v_count3 = mysqli_num_rows($qry3);
   
      $v_count = $v_count2 + $v_count3;


  $vap_count = $v_count*1000/$i_count;
  
?>

<?php
  error_reporting(0);
  session_start();
  include"dbinfo.php";
  $frdt = date('Y-m-01');
  $todt = date('Y-m-31');
  $qry = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as std FROM tbl_huf WHERE cath_uti_iuc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
  $res = mysqli_fetch_assoc($qry);
  $i_count = $res["std"];
  $qry2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (cath_uti_iuc BETWEEN '$frdt' AND '$todt') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
  $c_count = mysqli_num_rows($qry2);
  $cauti_count = $c_count*1000/$i_count;
  
  $qry3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd FROM tbl_huf WHERE (cath_uti_iuc BETWEEN '$frdt' AND '$todt') AND cath_uti_tcd != ''")or die(mysqli_error($connect));
  $res3 = mysqli_fetch_assoc($qry3);
  $tcd = $res3["tcd"];
  
  $qry4 = mysqli_query($connect,"SELECT cath_uti_symp FROM tbl_huf WHERE (cath_uti_iuc BETWEEN '$frdt' AND '$todt') AND cath_uti_symp = 'Yes'")or die(mysqli_error($connect));
  $pos = mysqli_num_rows($qry4);
  //$pos = $res4["pos"];
?>

<?php
  error_reporting(0);
  session_start();
  include"dbinfo.php";
  $frdt = date('Y-m-01');
  $todt = date('Y-m-31');
  $qry = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as std FROM tbl_huf WHERE cent_bs_dticlc BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
  $res = mysqli_fetch_assoc($qry);
  $i_count = $res["std"];
  $qry2 = mysqli_query($connect,"SELECT cent_bs_clabsi FROM tbl_huf WHERE (cent_bs_dticlc BETWEEN '$frdt' AND '$todt') AND cent_bs_clabsi = 'Yes'")or die(mysqli_error($connect));
  $c_count = mysqli_num_rows($qry2);
  $clabsi_count = $c_count*1000/$i_count;
  
  $qry3 = mysqli_query($connect,"SELECT SUM(cent_bs_tcld) as tcd FROM tbl_huf WHERE (cent_bs_dticlc BETWEEN '$frdt' AND '$todt') AND cent_bs_tcld != ''")or die(mysqli_error($connect));
  $res3 = mysqli_fetch_assoc($qry3);
  $tcd = $res3["tcd"];
  
  $qry4 = mysqli_query($connect,"SELECT cent_bs_symp FROM tbl_huf WHERE (cent_bs_dticlc BETWEEN '$frdt' AND '$todt') AND cent_bs_symp = 'Yes'")or die(mysqli_error($connect));
  $pos = mysqli_num_rows($qry4);
  
?>

<?php
  error_reporting(0);
  session_start();
  include"dbinfo.php";
  $frdt = date('Y-m-01');
  $todt = date('Y-m-31');
  
  $qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '$frdt' AND '$todt') AND (huf_dddd BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
  $res = mysqli_fetch_assoc($qry);
  $i_count = $res["std"];
  
  $qry2 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_signsymp_th = 'Yes'")or die(mysqli_error($connect));
  $thromb = mysqli_num_rows($qry2);
  $res_thromb = ($thromb / $i_count) * 1000;
  
  $qry3 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_signsymp = 'Yes'")or die(mysqli_error($connect));
  $hema = mysqli_num_rows($qry3);
  $res_hema = ($hema / $i_count) * 1000;

  $qry4 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_signsyp_bed = 'Yes'")or die(mysqli_error($connect));
  $bed = mysqli_num_rows($qry4);
  $res_bed = ($bed / $i_count) * 1000;
  
  $qry5 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_incd_ptfall = 'Yes'")or die(mysqli_error($connect));
  $ptf = mysqli_num_rows($qry5);
  $res_ptf = ($ptf / $i_count) * 1000;
  
  $qry6 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_iardl = 'Yes'")or die(mysqli_error($connect));
  $rdl = mysqli_num_rows($qry6);
  $res_rdl = ($rdl / $i_count) * 1000;
  
  $qry7 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE (care_dtpli BETWEEN '$frdt' AND '$todt') AND care_injtpt = 'Yes'")or die(mysqli_error($connect));
  $ipt = mysqli_num_rows($qry7);
  $res_ipt = ($ipt / $i_count) * 1000;
  
?>
      

 
<style>
    .sidebar .menu .list a {
    color: #eee;
    font-size: 13.5px;
}
.modal-backdrop {
    position: static!important;

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
                <ul>
                    <!-- <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li> -->                    
                    <!-- <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li> -->
                   <!--  <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in"></i></a></li>
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
          <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: calc(100vh - 184px);">
            <ul class="list" >
                <li class="header" style="color: #eee;">MAIN NAVIGATION</li>
                <li class="active open"><a href="dashboard-nurse.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

               <!--  <li><a href="admin-kpi.php"><i class="zmdi zmdi-home"></i><span>K.P.I. - Front Office</span></a></li> -->                                               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span style="color: #eee; font-size: 13.5px; ">Quality Indicators</span> </a>
                    <ul class="ml-menu">
                        <li style="background-color: #262626;"><a href="#" style="color: #eee; font-size: 13.5px;">Nurse Related Indicator</a></li>


                        <li><a href="ipd_feedback_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">IPD Feedback Form</a></li>
                        <li><a href="vent_ass_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Ventilator Associated Pnemonia</a></li>
                        <li><a href="cat_ass_uti_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Catheter Associated UTI</a></li>
                        <li><a href="cent_line_ass_bsi_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Central Line Associated BSI</a></li>
                        <!-- <li><a href="surg_site_inf_form_mat.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Surgical Site Infection</a></li>
                        <li><a href="needle_prick_inj_form_mat.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Occupational Exposure/ Needle Prick Injury</a></li>  -->
                        <li><a href="int_asst_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Initial Assessment Register</a></li>
                        <li><a href="ipd_waittm_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">IPD Discharge Register</a></li>
                        <li><a href="blood_trasfusion_event_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Blood Trasfusion Register</a></li>
                        <li><a href="care_relate_event_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Nursing Care Register</a></li>
                         <li><a href="icu_register_ipd_form_nurs.php" style="color: #eee; font-size: 13.5px;">ICU Register</a></li>

                        <li><a href="emrgncy_register_ipd_form_nurs.php" style="color: #eee; font-size: 13.5px; line-height: 2.5;">Emergency Register</a></li>


                        <!-- <li><a href="hosp_util_form.php" style="color: #eee; font-size: 13.5px;">IPD Register</a></li>
                        <li><a href="opd_waittm_form_det.php" style="color: #eee; font-size: 13.5px;">OPD Register</a></li>
                        <li><a href="bed_occup_form.php" style="color: #eee; font-size: 13.5px;">Bed Occupancy Report</a></li>
                        <li><a href="opd_feedback_form.php" style="color: #eee; font-size: 13.5px;">OPD Feedback Form</a></li>
                         -->
                          

                       <!--  <li style="background-color: #262626";><a href="#" style="color: #eee; font-size: 13.5px;">Infection Control Indicator</a></li>
                        
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
                  <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span style="color: #eee; font-size: 13.5px;"> Audit</span> </a>
                                      <ul class="ml-menu">
                                          
                                          <li><a href="ward_round_cklst_formNew.php" style="color: #eee; font-size: 13.5px;">  Ward Round Checklist</a></li>
                                          
                                      </ul>
                </li>
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
    
   
</section>
 
<!-- #Top Bar -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard - Nurse</h2>
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
        <br>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-green hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Total No. of IPD Patient</div>
                        <div class="number"><?php echo $res4;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">VAP Rate</div>
                        <div class="number"><?php echo number_format($vap_count, 2);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">CAUTI Rate</div>
                        <div class="number"><?php echo number_format($cauti_count, 2);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Positive CLABSI</div>
                        <div class="number"><?php echo  $c_count;?></div>
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
                        <div class="text">Thromboplebitis Rate</div>
                        <div class="number"><?php echo number_format($res_thromb, 2);?>&nbsp;%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blush hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Hematoma Rate</div>
                        <div class="number"><?php echo number_format($res_hema, 2);?>&nbsp;%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 bg-blue hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Bed Score Rate</div>
                        <div class="number"><?php echo number_format($res_bed, 2);?>&nbsp;%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="info-box-4 bg-blue-grey hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-white"></i> </div>
                    <div class="content">
                        <div class="text">Patient Fall Rate</div>
                        <div class="number"><?php echo number_format($res_ptf, 2);?>&nbsp;%</div>
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
                                     <form method="post" enctype="multipart/form-data"  id="faq_nurse">
                                    
                                        <div class="container" >

                                              <!-- Trigger the modal with a button -->
                                             <!--  <button style="background-color: #607D8B;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">FAQ’S FOR FRONT OFFICE MANUAL</button> -->

                                               <button style="background-color: #607D8B;width: 350px;" type="button" class="btn btn-info btn-lg" class="show_faq_nurse" id="show_faq_nurse">FAQ’S FOR NURSING DEPARTMENT</button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal12" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title" style="float: left;">FAQ’S FOR NURSING DEPARTMENT</h4>
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
                                                                    $data_nurse=array('Manual',
                                                                    'Patients Right &responsibilities',
                                                                    'Data for quality indicator',
                                                                    'Training Record',
                                                                    'Scope of services',
                                                                    'Services not available ',
                                                                    'HIC protocol – terminal cleaning/ fumigation record/chemicals used','Code blue mock drill','BMW segregation / guideline','Vulnerable Patients','Terminal cleaning record','Safe medication practices','Barrier Nursing','End of life care','High risk medication verification medication','Adverse drug events' ,'HIC procedures- hand washing, Sterilium, PPE','Spill management ','Transfer procedure','Hand hygiene practices ','Crash cart register','  Temperature control for fridge  3 times a day','Emergency Drugs register','High risk  Drug register');               
                                                                    ?>
                                                                  <tbody>
                                                    <?php $id=1; foreach ($data_nurse as $key => $value) { ?>
                                                        
                                                                        <tr>
                                                                            <td><?php echo $key+1;?>. <?php echo $value;?></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[qi][<?php echo $key+1;?>]" id="chhkqi12_<?php echo $key+1;?>" /></td>
                                                                            <td><input type="checkbox" value="<?php echo $key+1;?>" name="chk1[hr][<?php echo $key+1;?>]" id="chhkhr12_<?php echo $key+1;?>" /></td>


                                                                            
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
                                                                            <td><span id="total_faq_nurse">0</span></td>
                                                                            
                                                                           
                                                                            <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                        <td><span id="total_faq_qi_y_nurse">0</span></td>
                                                                                        <td><span id="total_faq_qi_n_nurse">0</span></td>
                                                                                        
                                                                                    </tr>
                                                                                </table>
                                                                                
                                                                            </td>
                                                                             <td>
                                                                                <table class="table table-bordered table-hover">
                                                                                    <tr>
                                                                                         <td><span id="total_faq_hr_y_nurse">0</span></td>
                                                                                        <td><span id="total_faq_hr_n_nurse">0</span></td>

                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                       
                                                         <div class="modal-footer">
                                                            <button type="submit" name="action_nurse" class="btn btn-link waves-effect" id="action_nurse">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                         </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <table id="showtab12" cellpadding="0" cellspacing="0" border="1" width="350" style=" text-align: center;border-color: 1px solid gray;">
                                                         <tr style="background-color: #9DA2E2;color: white;">
                                                            <td>Total(<span id="total_faq_nurse"><?php echo $row18['totalnurse'];?></span>)</td>
                                                            <td>Completed</td>
                                                            <td>Not-Completed</td>
                                                         </tr>
                                                         <tr>
                                                            <td>Incharge/chapter Champion</td>
                                                            <td><span id="total_faq_qi_y_nurse"><?php echo $rowcompqinurse['compqinurse'];?></span></td>
                                                            <td><span id="total_faq_qi_n_nurse"><?php echo $rownotcompqinurse['notcompqinurse'];?></span></td>
                                                         </tr>
                                                         <tr>
                                                            <td>QM</td>
                                                            <td><span id="total_faq_hr_y_nurse"><?php echo $rowcomphnurse['comphrnurse'];?></span></td>
                                                            <td><span id="total_faq_hr_n_nurse"><?php echo $rownotcomphrnurse['notcomphrnurse'];?></span></td>
                                                         </tr>
                                                     </table>
                                                                                        
                                 </form>
                             </div>
                </div>
            </div>
        </div>
    <!--NABH STATUS END-->
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
 $(document).on('submit', '#faq_nurse', function(event){
            event.preventDefault();
           
                

                if(confirm("Are you sure you want to Submit this?"))
                {
                    $("#action_nurse").attr("disabled", true);
                    $.ajax({
                        url:"dashboard_faq/faq_nurse.php",
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


 

    $('#show_faq_nurse').click(function() {
           
            var user_id=1;
           
            $.ajax({
                url:"dashboard_faq/fetch_faq_nurse.php",
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
                                $('#chhkqi12_'+value).attr('checked', true);

                                } else{ qi_n++;}
                        if(data[key].hr==1){

                            $('#chhkhr12_'+value).attr('checked', true);
                                hr_y++;
                        } else{
                            hr_n++;
                        }
                    }

                        $('#total_faq_nurse').html(total);
                        $('#total_faq_hr_y_nurse').html(hr_y);
                        $('#total_faq_hr_n_nurse').html(hr_n);
                        $('#total_faq_qi_y_nurse').html(qi_y);
                        $('#total_faq_qi_n_nurse').html(qi_n);
                          var row = document.getElementById("showtab12").rows;
                          var col = row[1].cells;
                          col[1].innerHTML = qi_y;
                          col[2].innerHTML = qi_n;
                          col = row[2].cells;
                          col[1].innerHTML = hr_y;
                          col[2].innerHTML = hr_n;


                    // $('#action').val("Update Details");
                    $('#myModal12').modal('show');                   
                    
                }
            })
        });
 </script>
</body>
</html>