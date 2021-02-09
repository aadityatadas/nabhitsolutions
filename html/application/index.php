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
   $extra="application/dashboard-admin.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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
} elseif ($a == "Reception") {
    $extra="application/dashboard-rec.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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
    $extra="application/dashboard-nurses.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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
$_SESSION['id']=$num['stf_id'];
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
$_SESSION['id']=$num['stf_id'];
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
$_SESSION['id']=$num['stf_id'];
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
$_SESSION['id']=$num['stf_id'];
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
elseif ($a == "OT Nurse") {
    $extra="application/dashboard-otnurses.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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
elseif ($a == "MRD Officer") {
    $extra="application/dashboard-mrd.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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

elseif ($a == "Pharmacy Officer") {
    $extra="application/dashboard-pharma.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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

elseif ($a == "Radiology Officer") {
    $extra="application/dashboard-radio.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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

elseif ($a == "Laboratory Officer") {
    $extra="application/dashboard-lab.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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

elseif ($a == "Emergency Officer") {
    $extra="application/dashboard-emr.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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

elseif ($a == "ICU Officer") {
    $extra="application/dashboard-icu.php";//
$_SESSION['login']=$rs['stf_uname'];
$_SESSION['id']=$num['stf_id'];
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


<body>



      
        
        
        <!DOCTYPE html>
<html lang="en">
<head>
    <title>Hospiexperts - Healthcare IT Solutions Company | eHospital | eClinic|eNABHBuddy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="login/images/icons/img-02.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="login/images/img-02.png" alt="IMG">
                </div>


 
                <form class="login100-form validate-form" accept-charset="UTF-8" role="form" method="post">
                    <span class="login100-form-title">
                        Staff Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" placeholder="Username" name="username" type="username" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" placeholder="Password" name="password" type="password" value="">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <!-- <span>Please do not insert any kind of data on this website, this is just a demo one, Please contact this number for more information 07744817906</span> -->
                    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                   Type of User
                                     <select type="text" name="utyp">
                                                <option value="">Select</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Reception">Reception</option>
                                                <option value="Doctor"> Doctor</option>
                                                
                                                <option value="Matron">Matron</option>
                                                <option value="Nurse">Nurse</option>
                                                <option value="HR"> HR</option>
                                                <option value="Engineer">Engineer</option>
                                                <option value="OT Nurse">OT Nurse</option>
                                                <option value="MRD Officer">MRD Officer</option>
                                                <option value="Emergency Officer">Emergency Officer</option>
                                                <option value="ICU Officer">ICU Officer</option>
                                                <option value="Laboratory Officer">Laboratory Officer</option>
                                                <option value="Radiology Officer">Radiology Officer</option>
                                                <option value="Pharmacy Officer">Pharmacy Officer</option>
                                                
                                                </select>
        
                                  <span class="focus-input100"></span>
                        
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn"type="submit" name="submit">
                        Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                           NABHBuddy||
                        </span>
                        <a class="txt2" href="#">
                            Home Page
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            Staff Login 
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a><br>
                        <a class="txt2" href="#">
                            Quality manager 
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a><br>
                        <a class="txt2" href="#">
                            Admin Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a><br>
                        <a class="txt2" href="#">
                         Live Training
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>

        