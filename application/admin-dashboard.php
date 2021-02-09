<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>HospiXperts-NABH Consultants & Service | NABH Certification‎</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../admin-assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../admin-assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../admin-assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../admin-assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../admin-assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../admin-assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../admin-assets/js/ace-extra.min.js"></script>

		<style type="text/css">
			  .col-sm-6 {
            width: 30.666%;

            }

             
		</style>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand" style="font-size: 27px; letter-spacing: 2.5px; padding-left: 3px;">
						<small>
							 
							Hospiexperts
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						 

						 

						 

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../admin-assets/images/avatars/user1.jpg" alt="Admin" height="33" />
								<span class="user-info">
									<small>Welcome</small>
									<!-- <h3><?php
                    
                     				 $sql = "SELECT * From tbl_staff  WHERE stf_id=".$_SESSION['id'];
                                     $result = mysqli_query($connect, $sql);
                                     $DB_ROW = mysqli_fetch_assoc($result);
                                    
                                     echo ucfirst($DB_ROW['stf_uname']);
                                      ?>              
                </h3> -->
									 
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state" >
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="admin-dashboard.php" >
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Quality Indicators
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<!-- front_office sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Front Office
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="hosp_util_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											IPD Register
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="opd_waittm_form_det.php">
											<i class="menu-icon fa fa-caret-right"></i>
											OPD Register
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="bed_occup_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Bed Occupancy &nbsp;&nbsp;&nbsp;&nbsp;Report
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="opd_feedback_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											OPD Feedback Form
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="ipd_feedback_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											IPD Feedback Form
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
                            <!-- front_office sub menu end-->

                            <!-- Infection Control sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Infection Control Indicator
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="vent_ass_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Ventilator Associated &nbsp;&nbsp;&nbsp;&nbsp;Pnemonia
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="cat_ass_uti_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Catheter Associated &nbsp;&nbsp;&nbsp;&nbsp;UTI
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="cent_line_ass_bsi_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Central Line &nbsp;&nbsp;&nbsp;&nbsp;Associated BSI
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="surg_site_inf_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Surgical Site Infection
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="needle_prick_inj_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Occupational &nbsp;&nbsp;&nbsp;&nbsp;Exposure/ Needle &nbsp;&nbsp;&nbsp;&nbsp;Prick Injury
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
							<!-- Infection Control sub menu end-->

							<!-- Doctor's sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Doctor's Related Indicator
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="int_asst_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Initial Assessment &nbsp;&nbsp;&nbsp;&nbsp;Register
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="ipd_waittm_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											IPD Discharge &nbsp;&nbsp;&nbsp;&nbsp;Register
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="blood_trasfusion_event.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Blood Trasfusion &nbsp;&nbsp;&nbsp;&nbsp;Register
										</a>

										<b class="arrow"></b>
									</li> 
								</ul>
							</li>
							<!-- Doctor's sub menu end-->

							<!-- Nurse's sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Nurse's Related Indicator
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="care_relate_event.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Nursing Care &nbsp;&nbsp;&nbsp;&nbsp;Register
										</a>

										<b class="arrow"></b>
									</li>	 
								</ul>
							</li>
							<!-- Nurse's sub menu end-->

							<!-- MRD sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Medical Records Indicator
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="medi_records_indicator.php">
											<i class="menu-icon fa fa-caret-right"></i>
											MRD Register
										</a>

										<b class="arrow"></b>
									</li>	 
								</ul>
							</li>
							<!-- MRD sub menu end-->

							<!-- HR sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									HR Related <br> Indicators
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="hr_mast.php">
											<i class="menu-icon fa fa-caret-right"></i>
											HR Master
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="hr_indicator.php">
											<i class="menu-icon fa fa-caret-right"></i>
											HR Indicator
										</a>

										<b class="arrow"></b>
									</li>	 
								</ul>
							</li>
							<!-- HR sub menu end-->

							<!-- Bio Medical sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Bio Medical <br> Equipment
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="equip_mast_bio.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Bio Equipment &nbsp;&nbsp;&nbsp;&nbsp;Master
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="equip_indicator_form_bio.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Bio Maintenance &nbsp;&nbsp;&nbsp;&nbsp;Register
										</a>

										<b class="arrow"></b>
									</li>	 
								</ul>
							</li>
							<!-- Bio Medical sub menu end-->

							<!-- General Equipment sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									General Equipment
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="equip_mast.php">
											<i class="menu-icon fa fa-caret-right"></i>
											General Equipment &nbsp;&nbsp;&nbsp;&nbsp;Master
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="equip_indicator_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											General Maintenance &nbsp;&nbsp;&nbsp;&nbsp;Register
										</a>

										<b class="arrow"></b>
									</li>	 
								</ul>
							</li>
							<!-- General Equipment sub menu end-->
                             
                             <!-- OT  Indicators sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									OT  Indicators
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="sentinel_event_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											OT Register &nbsp;&nbsp;&nbsp;&nbsp;(Sentinel Event -  &nbsp;&nbsp;&nbsp;&nbsp;Surgical and  &nbsp;&nbsp;&nbsp;&nbsp;Anesthetia Events)
										</a>

										<b class="arrow"></b>
									</li>

									 	 
								</ul>
							</li>
							<!-- OT  Indicators sub menu end-->

							<!-- Emergency sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Emergency <br>Indicators
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="emrgncy_register_ipd_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Emergency Register
										</a>

										<b class="arrow"></b>
									</li>

									 	 
								</ul>
							</li>
							<!-- Emergency sub menu end-->

							<!-- ICU Indicator sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									ICU Indicator
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="icu_register_ipd_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											ICU Register
										</a>

										<b class="arrow"></b>
									</li>

									 	 
								</ul>
							</li>
							<!-- ICU Indicator sub menu end-->
                             
                             <!-- Laboratory Indicators sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Laboratory <br> Indicators
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="lab_opd_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Laboratory Register &nbsp;&nbsp;&nbsp;(OPD)
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="lab_ipd_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Laboratory Register &nbsp;&nbsp;&nbsp;(IPD)
										</a>

										<b class="arrow"></b>
									</li>	 
								</ul>
							</li>
							<!-- Laboratory Indicators sub menu end-->

							<!-- Pharmacy Indicators sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Pharmacy Indicators (Medication Related)
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="pharmcy_register_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Pharmacy Register
										</a>

										<b class="arrow"></b>
									</li>

									  
								</ul>
							</li>
							<!-- Pharmacy Indicators sub menu end-->

							 <!-- Radiology Indicators sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Radiology Indicators
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="radio_opd_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Radiology Register &nbsp;&nbsp;&nbsp;(OPD)
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="radio_ipd_form.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Radiology Register &nbsp;&nbsp;&nbsp;(IPD)
										</a>

										<b class="arrow"></b>
									</li>	 
								</ul>
							</li>
							<!-- Radiology Indicators sub menu end--> 

							<!-- From indicators sub menu start-->
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Form Indicators
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="form_indicator.php">
											<i class="menu-icon fa fa-caret-right"></i>
											Performance of KPI &nbsp;&nbsp;&nbsp;Yearly
										</a>

										<b class="arrow"></b>
									</li>

									 	 
								</ul>
							</li>
							<!-- From indicators sub menu end--> 

						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Audit </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="tables.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Daily Checklist
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Monthly Audit
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									NABH Status Scoreboard
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Training </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Schedule 1
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Schedule 2
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Schedule 3
								</a>

								<b class="arrow"></b>
							</li>
 
						</ul>
					</li>

                    


					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Documentation </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> SOP's </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Pre-Entry Level SOP
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Final Level SOP
								</a>

								<b class="arrow"></b>
							</li>
 
						</ul>
					</li>

					<li class="">
						<a href="calendar.php">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Calendar

								 
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="chart_det.php">
							&nbsp;&nbsp;<i class="fa fa-area-chart"></i>

							<span class="menu-text">
								&nbsp;&nbsp;&nbsp;Control Charts

								 
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#">
							&nbsp;&nbsp;<i class="fa fa-database"></i>

							<span class="menu-text">
								&nbsp;&nbsp;&nbsp;Backup Database

								 
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<!-- <li class="">
						<a href="gallery.html">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> Gallery </span>
						</a>

						<b class="arrow"></b>
					</li>
 -->
					<!-- <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> More Pages </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="profile.html">
									<i class="menu-icon fa fa-caret-right"></i>
									User Profile
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="inbox.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Inbox
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="pricing.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Pricing Tables
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="invoice.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Invoice
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="timeline.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Timeline
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="search.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Search Results
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="email.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Email Templates
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="login.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Login &amp; Register
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Other Pages

								<span class="badge badge-primary">5</span>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="faq.html">
									<i class="menu-icon fa fa-caret-right"></i>
									FAQ
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-404.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 404
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error-500.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Error 500
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="grid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Grid
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="blank.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Blank Page
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li> -->
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" title="Toggle Navigation" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>

							<li class="active">Admin Window</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; status
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 

								<div class="row">
									<div class="space-6"></div>

									 

									<div class="vspace-12-sm"></div>

									<div class="col-sm-5" >
										<div class="widget-box" >
											<div class="widget-header widget-header-flat widget-header-small" >
												<h5 class="widget-title" >
													<i class="ace-icon fa fa-signal"></i>
													Status Of NABH (Overall)
												</h5>

												<div class="widget-toolbar no-border">
													<div class="inline dropdown-hover">
														<button class="btn btn-minier btn-primary">
															This Week
															<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
															<li class="active">
																<a href="#" class="blue">
																	<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																	This Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	This Month
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Month
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											<div class="widget-body" style="line-height: 2.8;">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													 

													 
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="page-header">
							<h1>
								Select Chapter
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Chapterwise Status of NABH
								</small>
							</h1>
						</div><!-- /.page-header -->

								<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="tabbable">
									<ul class="nav nav-tabs " id="myTab">
										<li class="active">
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="blue ace-icon fa fa-question-circle bigger-120"></i> -->
												AAC
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="green ace-icon fa fa-user bigger-120"></i> -->
												COP
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="orange ace-icon fa fa-credit-card bigger-120"></i> -->
												MOM
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="blue ace-icon fa fa-question-circle bigger-120"></i> -->
												PRE
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="green ace-icon fa fa-user bigger-120"></i> -->
												HIC
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="orange ace-icon fa fa-credit-card bigger-120"></i> -->
												CQI
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="blue ace-icon fa fa-question-circle bigger-120"></i> -->
												ROM
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="green ace-icon fa fa-user bigger-120"></i> -->
												HRM
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#faq-tab-1">
												<!-- <i class="orange ace-icon fa fa-credit-card bigger-120"></i> -->
												IMS
											</a>
										</li>
										<!-- <li>
											<a data-toggle="tab" href="#faq-tab-3">
												<i class="orange ace-icon fa fa-credit-card bigger-120"></i>
												MOM
											</a>
										</li> -->



										<!-- <li class="dropdown">
											<a data-toggle="dropdown" class="dropdown-toggle" href="#">
												<i class="purple ace-icon fa fa-magic bigger-120"></i>

												Misc
												<i class="ace-icon fa fa-caret-down"></i>
											</a>

											<ul class="dropdown-menu dropdown-lighter dropdown-125">
												<li>
													<a data-toggle="tab" href="#faq-tab-4"> Affiliates </a>
												</li>

												<li>
													<a data-toggle="tab" href="#faq-tab-4"> Merchants </a>
												</li>
											</ul>
										</li> --><!-- /.dropdown -->
									</ul>

									<div class="tab-content no-border padding-24">
										<div id="faq-tab-1" class="tab-pane fade in active">
											<h4 class="blue">
												<i class="ace-icon fa fa-check bigger-110"></i>
												ACCESS, ASSESSMENT AND CONTINUITY OF CARE (AAC)
											</h4>

											<div class="space-8"></div>

											<div class="col-sm-5" >
										<div class="widget-box" >
											<div class="widget-header widget-header-flat widget-header-small" >
												<h5 class="widget-title" >
													<i class="ace-icon fa fa-signal"></i>
													AAC
												</h5>

												<div class="widget-toolbar no-border">
													<div class="inline dropdown-hover">
														<button class="btn btn-minier btn-primary">
															This Week
															<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
															<li class="active">
																<a href="#" class="blue">
																	<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																	This Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	This Month
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Month
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder2"  style="line-height: 2.8;"></div>

													 

													 
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div>

									 
											</div>
                                              
											<div class="row">
									<div class="col-sm-6">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Status
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Deficiency 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Pending work
																</th>

																<!-- <th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>status
																</th> -->
															</tr>
														</thead>

														<tbody>
															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">NOT DONE</b>
																</td>
																<!-- <td class="hidden-480">
																	<span class="label label-info arrowed-right arrowed-in">on sale</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	<b class="blue">IN PROCESS</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label label-success arrowed-in arrowed-in-right">approved</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">NOT DONE</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label label-danger arrowed">pending</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">NOT DONE</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label arrowed">
																		<s>out of stock</s>
																	</span>
																</td> -->
															</tr>

															 
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

									 
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->


 
										</div>

										<div id="faq-tab-2" class="tab-pane fade">
											<h4 class="blue">
												<i class="green ace-icon fa fa-user bigger-110"></i>
												CARE OF PATIENTS
											</h4>

											<div class="space-8"></div>
                                           
                                           <div class="col-sm-5" >
										<div class="widget-box" >
											<div class="widget-header widget-header-flat widget-header-small" >
												<h5 class="widget-title" >
													<i class="ace-icon fa fa-signal"></i>
													COP
												</h5>

												<div class="widget-toolbar no-border">
													<div class="inline dropdown-hover">
														<button class="btn btn-minier btn-primary">
															This Week
															<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
															<li class="active">
																<a href="#" class="blue">
																	<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																	This Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	This Month
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Month
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder2"></div>

													 

													 
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div>
											 
										</div>

										 

										 
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div>
						 <div class="hr hr32 hr-dotted"></div>

                         	
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Training Status
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Completed 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Not Completed
																</th>

																<!-- <th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>status
																</th> -->
															</tr>
														</thead>

														<tbody>
															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">---</b>
																</td>
																<!-- <td class="hidden-480">
																	<span class="label label-info arrowed-right arrowed-in">on sale</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	<b class="blue">---</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label label-success arrowed-in arrowed-in-right">approved</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">---</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label label-danger arrowed">pending</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">---</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label arrowed">
																		<s>out of stock</s>
																	</span>
																</td> -->
															</tr>

															 
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

									<div class="row" >
									<div class="col-sm-6" >
										<div class="widget-box transparent" >
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Staff wise Improvement
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i> 
																</th>

																<!-- <th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Not Completed
																</th> -->

																<!-- <th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>status
																</th> -->
															</tr>
														</thead>

														<tbody>
															<tr>
																<td>---</td>

																 
															</tr>

															<tr>
																<td>---</td>

																 
															</tr>

															<tr>
																<td>---</td>

																 
															</tr>

															<tr>
																<td>---</td>

																 

															 
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->


									
								</div><!-- /.row -->

								 

								 

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->

							<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Audit Status
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Completed 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Not Completed
																</th>

																<!-- <th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>status
																</th> -->
															</tr>
														</thead>

														<tbody>
															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">---</b>
																</td>
																<!-- <td class="hidden-480">
																	<span class="label label-info arrowed-right arrowed-in">on sale</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	<b class="blue">---</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label label-success arrowed-in arrowed-in-right">approved</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">---</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label label-danger arrowed">pending</span>
																</td> -->
															</tr>

															<tr>
																<td>---</td>

																<td>
																	 
																	<b class="red">---</b>
																</td>

																<!-- <td class="hidden-480">
																	<span class="label arrowed">
																		<s>out of stock</s>
																	</span>
																</td> -->
															</tr>

															 
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

									<div class="row">
									<div class="col-sm-6">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<!-- <i class="ace-icon fa fa-star orange"></i> -->
													<!-- Staff wise Improvement -->
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Audit Deficiency/ Pending work
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Completed
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Not Completed
																</th>
															</tr>
														</thead>

														<tbody>
															<tr>
																<td>---</td>
                                                                <td>--</td>
                                                                <td class="red">---</td>
																 
															</tr>

															<tr>
																<td>---</td>
																<td>---</td>
																<td class="red">---</td>

																 
															</tr>

															<tr>
																<td>---</td>
																<td>---</td>
																<td class="red">---</td>

																 
															</tr>

															<tr>
																<td>---</td>
																<td>---</td>
																<td class="red">---</td>

																 

															 
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->


										</div><!-- /.widget-box -->
									</div><!-- /.col -->


									 <!-- /.col -->
								</div><!-- /.row --><br><br>

								<div class="col-sm-6">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Department wise Improvement
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i> 
																</th>

																<!-- <th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Not Completed
																</th> -->

																<!-- <th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>status
																</th> -->
															</tr>
														</thead>

														<tbody>
															<tr>
																<td>---</td>

																 
															</tr>

															<tr>
																<td>---</td>

																 
															</tr>

															<tr>
																<td>---</td>

																 
															</tr>

															<tr>
																<td>---</td>

																 

															 
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
                                    <div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-signal"></i>
													Earlier Status
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div id="sales-charts"></div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->



			<div class="footer">
				<div class="footer-inner">
					 
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../admin-assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../admin-assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../admin-assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="../admin-assets/js/jquery-ui.custom.min.js"></script>
		<script src="../admin-assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../admin-assets/js/jquery.easypiechart.min.js"></script>
		<script src="../admin-assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../admin-assets/js/jquery.flot.min.js"></script>
		<script src="../admin-assets/js/jquery.flot.pie.min.js"></script>
		<script src="../admin-assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="../admin-assets/js/ace-elements.min.js"></script>
		<script src="../admin-assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<!-- piechart-placeholder -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>



        <!-- piechart-placeholder2 -->
        <script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder2').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>



		  

	 

	</body>
</html>
