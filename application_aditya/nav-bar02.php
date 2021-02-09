<script type="text/javascript"> 
	$(document).ready(function () {
		$("#bx3").niceScroll({ autohidemode: true })
	});
</script>
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#99c2ff"><span align="left" style="color:white; font-size: 20px; font-weight: bold;"><center>FORM INDICATORS</center></span>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>
				<!-- <img src="../vendor/img/hosp.jpg" style="margin-top:10px;padding-left:10px;float:left;height:30px;width:210px;" />
				<a class="navbar-brand" style="font-size:20px;font-weight:bold;color:#232598;" href="dashboard.php">NABH</a> -->
            </div>
        <!-- /.navbar-header -->
         
            <ul  class="nav navbar-top-links navbar-right">
                
           
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#">
                        <b style="color:white; font-size: 19px;">Welcome&nbsp;<?php echo ucfirst($ses);?></b>&nbsp;&nbsp;<i class="fa fa-caret-down" style="font-size:16px;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="change_pass.php" style="font-size: 14px;"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                         <div class="dropdown-divider"></div>
                        <li><a href="../logout.php" style="font-size: 14px;"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul> 
            <!-- /.navbar-top-links -->
			
			<!-- Sidebar Menus -->
			<script src="../vendor/date_time.js"></script>
            
			<script type="text/javascript">window.onload = date_time('date_time');</script>
            <!-- /.navbar-static-side -->
        </nav>
		