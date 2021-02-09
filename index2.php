<?php 
include('header.php');

?>

<?php
session_start();
error_reporting(0);
$date = date('Y-m-d h:i:s A', time () );
include("application/dbinfo.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($connect,"SELECT * FROM tbl_staff WHERE stf_uname='".$_POST['username']."' and stf_pass='".md5($_POST['password'])."'and stf_utyp='".$_POST['utyp']."'")or die(mysqli_error($connect));
$rs = mysqli_fetch_array($ret);
$num=mysqli_num_rows($ret);
if($num>0)
{

$a=$_POST['utyp'];

if ($a == "Admin") {  
   $extra="application/dashboard.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
} 
elseif ($a == "Superadmin") {  
   $extra="application/Super_admin_dashbord.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
elseif ($a == "Reception") {
    $extra="application/dashboard-reception.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
} 
elseif ($a == "Nurse") {
    $extra="application/dashboard-nurse.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
} 

elseif ($a == "Doctor") {
    $extra="application/dashboard-doctor.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
} 

elseif ($a == "Matron") {
    $extra="application/dashboard-matron.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
} 
elseif ($a == "HR") {
    $extra="application/dashboard-HR.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
} 
elseif ($a == "Engineer") {
    $extra="application/dashboard-engineer.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
elseif ($a == "OTNurse") {
    $extra="application/dashboard-otnurses.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
elseif ($a == "MRDOfficer") {
    $extra="application/dashboard-mrdoffice.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

elseif ($a == "PharmacyOfficer") {
    $extra="application/dashboard-pharmacist.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

elseif ($a == "RadiologyOfficer") {
    $extra="application/dashboard-radiology.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

elseif ($a == "LaboratoryOfficer") {
    $extra="application/dashboard-laboratory.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

elseif ($a == "EmergencyOfficer") {
    $extra="application/dashboard-emergency.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

elseif ($a == "ICUOfficer") {
    $extra="application/dashboard-icu.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

elseif ($a == "consular") {
    $extra="application/dashboard-consular.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
elseif ($a == "safetymanager") {
    $extra="application/dashboard-safetymanager.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
elseif ($a == "Qualitymanager") {
    $extra="application/dashboard-Quality-manager.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$rs['stf_id'];
$_SESSION['typ']=$rs['stf_utyp'];
$_SESSION['finyr']=$_POST['fin_date'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log="insert into userlog(uid,username,userip,loginTime,logout,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$date','','$status')";
mysqli_query($connect,$log);
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

else {
    echo "a is smaller than b";
}



}
else
{
$_SESSION['login']=$_POST['username'];  
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($connect,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
$cdt = date('Y-m-d');
$qry = mysqli_query($connect,"Select fin_year FROM tbl_fin_yr WHERE CURDATE() BETWEEN fin_date AND fin_date2")or die(mysqli_error($connect));
$rsd = mysqli_fetch_array($qry);



?>

<body class="theme-cyan login-page authentication">
<style>
    .login-page {
    max-width: 520px!important;
}
</style>
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <div class="logo"> <center><img src="assets/images/icon.png" alt="NABH" height="130" width="140" style="margin:-25px 0px"></div>
        <h1 class="title"><span>HOSPIEXPERTS</span> <br>Staff Login <span class="msg">Sign in to start your session</span></h1></center> 

        <div class="col-md-12">
            <form id="sign_in" role="form" method="post" action="">
                
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div>
                     
                     <div class="col-lg-10 col-md-6 col-sm-12">
                    <div class="input-group drop-custum">
                                    <select class="form-control show-tick" name="utyp">
                                        <option value="">--Select--</option>
                                        <option value="Admin">Super-Admin</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Reception">Reception</option>
                                                <option value="Doctor"> Doctor</option>
                                                
                                                <option value="Matron">Matron</option>
                                                <option value="Nurse">Nurse</option>
                                                <option value="HR"> HR</option>
                                                <option value="Engineer">Engineer</option>
                                                <option value="OTNurse">OT Nurse</option>
                                                <option value="MRDOfficer">MRD Officer</option>
                                                <option value="EmergencyOfficer">Emergency Officer</option>
                                                <option value="ICUOfficer">ICU Officer</option>
                                                <option value="LaboratoryOfficer">Laboratory Officer</option>
                                                <option value="RadiologyOfficer">Radiology Officer</option>
                                                <option value="PharmacyOfficer">Pharmacy Officer</option>
                                                <option value="consular">Consular</option>
                                                <option value="safetymanager">Safety Manager</option>
                                                <option value="safetymanager">Quality Manager</option>
                                    </select>
                                </div>
                              </div>
                         
                               
                    <div class="text-center">
                        
                      
                         <button class="btn btn-raised waves-effect g-bg-cyan" type="submit" name="submit">
                        Login
                        </button>
                        
                    </div>
                    <div class="text-center"> <a href="https://nabhbuddy.com/">NABHBuddy || Home Page</a></div>
                </div>
            </form>
        </div>
    </div>    
</div>
<!-- <div class="theme-bg"></div> -->

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>































<?php 
include('footer.php');

?>