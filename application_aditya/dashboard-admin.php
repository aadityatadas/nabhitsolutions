<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>


     
    
 

<style>
/* Overlay style */
.overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
   background-image: url("../vendor/img/background2.jpg");
    z-index: 999;
}

/* Overlay closing cross */
/*.overlay .overlay-close {
    width: 40px;
    height: 40px;
    position: absolute;
    right: 20px;
    top: 20px;
    overflow: hidden;
    border: none;*/
    /* background: url(../img/cross.png) no-repeat center center; */
    /* background: none; */
    /* text-indent: 200%; */
    /* color: rgba(255, 255, 255, 0); */
   /* outline: none;
    z-index: 100;
    color: #fff;
    background: #3f51b5;
}*/

/* Menu style */
.overlay nav {
	text-align: center;
	position: relative;
	top: 50%;
	height: 60%;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

.overlay ul {
	list-style: none;
	padding: 0;
	margin: 0 auto;
	display: inline-block;
	height: 100%;
	position: relative;
}

.overlay ul li {
	display: block;
	height: 20%;
	height: calc(100% / 5);
	min-height: 54px;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
}

.overlay ul li a {
    font-size: 45px;
    letter-spacing: 8px;
    font-family: Serif;
    font-weight: 300;
    display: block;
    color: #fff;
    -webkit-transition: color 0.2s;
    transition: color 0.2s;
	text-decoration:none;
}

.overlay ul li a:hover,
.overlay ul li a:focus {
	color: #000d1a;
}

/* Effects */
.overlay-simplegenie {
	visibility: hidden;
	-webkit-transform: translateY(60%) scale(0);
	transform: translateY(60%) scale(0);
	-webkit-transition: -webkit-transform 0.4s, visibility 0s 0.4s;
	transition: transform 0.4s, visibility 0s 0.4s;
}

.overlay-simplegenie.open {
	visibility: visible;
	-webkit-transform: translateY(0%) scale(1);
	transform: translateY(0%) scale(1);
	-webkit-transition: -webkit-transform 0.4s;
	transition: transform 0.4s;
}

@media screen and (max-height: 30.5em) {
	.overlay nav {
		height: 70%;
		font-size: 34px;
	}
	.overlay ul li {
		min-height: 34px;
	}
}
</style>
<!-- //Custom Theme files -->
<!-- font-awesome icons -->

<!-- //font-awesome icons -->

<!-- web-fonts -->  

</head>
<body class="bg">
    <div class="overlay overlay-simplegenie open">
			 
			<nav>
				<ul>
					<li> <a href="indexnew.php"><i class="fas fa-laptop-medical"></i> <b>Quality Indicators</a></b></li>
					<li><a href="https://nabhbuddy.com/nabhsmhri/hms/test6/training/training.html"><i class="far fa-calendar-alt"></i> <b>Training</b></a></li>
					<!--<li><a href="doctors.html">Doctors</a></li>
					<li><a href="appointment.html">Appointment</a></li>-->
					<li><a href="dashboard_audit.php"><i class="far fa-calendar-check"></i> <b>Audit</b></a></li>
					<li><a href="https://nabhbuddy.com/ebook"><i class="fas fa-book-medical"></i> <b>Resource Library</b></a></li>
				</ul>
			</nav>
		</div> 
	</a></li></ul></nav></div></body></html>