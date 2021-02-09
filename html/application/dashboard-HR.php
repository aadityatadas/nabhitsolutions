

<style>
/* Overlay style */
.overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.9);
    z-index: 999;
}

/* Overlay closing cross */
.overlay .overlay-close {
    width: 40px;
    height: 40px;
    position: absolute;
    right: 20px;
    top: 20px;
    overflow: hidden;
    border: none;
    /* background: url(../img/cross.png) no-repeat center center; */
    /* background: none; */
    /* text-indent: 200%; */
    /* color: rgba(255, 255, 255, 0); */
    outline: none;
    z-index: 100;
    color: #fff;
    background: #3f51b5;
}

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
    font-size: 40px;
    letter-spacing: 6px;
    font-weight: 300;
    display: block;
    color: #fff;
    -webkit-transition: color 0.2s;
    transition: color 0.2s;
	text-decoration:none;
}

.overlay ul li a:hover,
.overlay ul li a:focus {
	color: #3f51b5;
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
			<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>
			<nav>
				<ul>
					<li><a href="dashboard-hrnur.php">Quality Indicators</a></li>
					<li><a href="http://hospiexperts.com/training/index.php">Training</a></li>
					<!--<li><a href="doctors.html">Doctors</a></li>
					<li><a href="appointment.html">Appointment</a></li>-->
					<li><a href="#">Audit</a></li>
					<li><a href="https://nabhbuddy.com/ebook">Resource Library</a></li>
				</ul>
			</nav>
		</div>