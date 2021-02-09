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
 
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="../assets/css/main.css" rel="stylesheet">
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
 </head>
<body class="theme-cyan">


<!-- #Float icon -->
<!--<ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
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
</ul>-->
<!-- #Float icon -->
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
                    <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li>                    
                    <!-- <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li> -->
                    <li><a data-placement="bottom" title="Log Out" href="../logout.php " ><i class="zmdi zmdi-sign-in"></i></a></li>
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
</aside>
</body>
</html>