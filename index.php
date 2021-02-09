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

	$_SESSION['email']=$_POST['username'];
    $_SESSION['password']=md5($_POST['password']);
    $_SESSION['department']=$_POST['utyp'];




  $ret1=mysqli_query($connect,"SELECT id FROM tbl_user_types WHERE name='".$rs['stf_utyp']."'")or die(mysqli_error($connect));
   $rs1 = mysqli_fetch_array($ret1);
    $_SESSION['type_id']=$rs1['id'];



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
elseif ($a == "SuperAdmin") {  
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
elseif ($a == "qualitymanager") {
    $extra="application/QM-dashbord.php";//
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
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<link rel="icon" href="favicon.ico" type="image/x-icon">


<link rel="stylesheet" type="text/css" href="css/style2.css">

<title>:: Hospiexperts::</title>
<style type="text/css">
	/* Tablet Landscape */
@media screen and (max-width: 1060px) {
    #primary { width:67%; }
    #secondary { width:30%; margin-left:3%;}  
}
/* Tabled Portrait */
@media screen and (max-width: 768px) {
    #primary { width:100%; }
    #secondary { width:100%; margin:0; border:none; }
}
</style>
</head>
<body>

	<div class="row">
				
				<div class="col-lg-12">
	<div class="container">
	<table cellspacing="0" cellpadding="0" border="0" width="100%" >
		<tr style="background-color:#0063A4;height: 30px;">
			<td>
				
				<!-- <center><label>WELCOME TO NABH IT SOLUTIONS</label></center> -->
			</td>
		</tr>
		<tr >
			
			<td>
			 <img src="logonabh/mainbackg.jpg" alt="Snow" style="width:100%;height: 850px;">
				  
				 <div class="top-left">
				  	
				  <table cellpadding="0" cellspacing="0" border="0" width="100%" >

					<tr>
						<td>
                           <table  cellpadding="0" cellspacing="0" border="0" width="100%">
								<tr>
									<td id="setlog" ><img src="logonabh/logo.png" height="260" width="450"></td>
								</tr>
								<tr>
									<td>
										<ul>
											<li><b>MANAGE ACCREDITATION PREPAREDNESS</b><br>
												Assign,Monitor ans Manage all activities<br>
												related to NABH, JCI or any other<br>
												Accreditation anytime from anywhere.
											</li>
											<br>
											<li><b>ACT RESPONSIVELY</b><br>
												Improved TAT, Reduce downtime, Enhance<br>
												Patient and other stakeholder experience.
												
											</li>
											<br>
											<li><b>IMPROVE COMPLIANCE</b><br>
												
												With improved frequency of monitering, <br>
												easy to conduct audits and checks.
												
											</li>
											<br>
											<li><b>MOBILE ENABLED</b><br>
												
												Record, Capture data, Monitore and Act<br>
												froim your mobile.
												
											</li>
											<br>
											<li><b>EMPOWER</b><br>
												
												Provide access to relevent Standard<br>
												Operating Procedures & Policies.
												
											</li>
											<br>
											<li><b>REDUCE PAPERWORK</b><br>
												
												Record information of the fly using your<br>
												mobile. Eliminate paperwork.
												
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</td>

						<td>
							
				<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
					<tr>
						<td>
							<div id="logindesign">
											
					<h1 style="color: red;">
						LOGIN</h1>

					<div class="col-md-12">
							 <form id="sign_in" role="form" method="post" action="">
										                
									<div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
										             <div class="form-line">

										                   <p>Enter User Name:</p> <input type="text" class="form-control" name="username" placeholder="Username" required autofocus />
										                    </div>
										               
										                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
										                    <div class="form-line">
										                       <p>Enter Password:</p> <input type="password" class="form-control" name="password" placeholder="Password" required />
										                    </div>
										                </div>
										            <div>
										                     
										       <div class="col-lg-10 col-md-6 col-sm-12">
										          <div class="input-group drop-custum">
										              <p>Select category:</p>
										                 <select class="form-control show-tick" name="utyp" style="width: 170px;">
										                     <option value="">--Select--</option>
										                      <option value="SuperAdmin">Super Admin</option>
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
										                          <option value="qualitymanager">Quality Manager</option>
										                    </select>
										                  </div>
										           </div>
										                         
										                               
										        <div class="text-center">
                                                       <button class="btn btn-raised waves-effect g-bg-cyan" type="submit" name="submit" style="background-color:#E21F23;width: 80px;height: 30px;color: white;">
										                       LOGIN
										                 </button>
										                        
										         </div>
										                    <br>
										                    <div class="text-center"> <a href="https://nabhbuddy.com/"><span style="color: #19B1FD;font-weight: bold;">NABHBUDDY || HOME Page</span></a></div>
										                </div>
										            </form>
										        </div>
										</div>
									</td>
								</tr>
							</table>

						</td>
					</tr>
				</table>
			

			</div>
				 
		</div>
			
			</td>
		</tr>
		
		<tr style="background-color:#E21F23;height: 30px;">
			<td>
				
				<span style="padding-left: 1600px;color: white;font-size: 14px;"><i>Copyright@NABHBUDDY IT SOLUTIONS</i></span>
			</td>
		</tr>
	</table>

</div></div>
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>