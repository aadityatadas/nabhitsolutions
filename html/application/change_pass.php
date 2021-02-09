<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"header1.php";
	include"nav-bar.php";
	$dt = date('d/m/Y');
	$tm = date('h:i:s a');
	$yr = date('Y');	
?>
<?php include"footer1.php";?>	
<script type="text/javascript"> 
	$(document).ready(function () {
		LoadData();
		$("#bx1").niceScroll({ autohidemode: true })
		$("#bx2").niceScroll({ autohidemode: true })
	});
</script>
<style>
.preload{
	margin:0;
	position:absolute;
	top:50%;
	left:60%;
	margin-right: -50%;
	transform:translate(-50%, -50%);
}
#adm{
	display:none;
}
.form-control{
	margin-bottom:10px;
}
</style>
<style>
	#compare{
		font-size:20px;
		color: red;
	}
	#compare1{
		font-size:20px;
		color: green;
	}
</style>
<script type="text/javascript" language="javascript">
function compared(str){
var pass = document.getElementById("new").value;
	if (str != pass){
		document.getElementById("compare").innerHTML ="Password Mismatch";	
	}
	else{
		document.getElementById("compare").innerHTML ="";
		document.getElementById("compare1").innerHTML ="Password Match";	
	}
}
</script>
<body>
	<div class="preload">
		<img src="../vendor/img/loader2.gif" />
	</div>
    <div id="wrapper">
        <!-- Navigation -->        
        <div id="page-wrapper">
            <div class="row">
				<br />
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                            Change Login Password
						</div>
						<div class="box" id="bx1">
							<div id="adm">
								<form method="post" id="user_form" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-12">
											<br />
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-12">
											<br />
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-12">
											<div class="col-lg-4">
												<label style="text-align:right;">New Password :</label>
											</div>
											<div class="col-lg-4">
												<input type="password" name="new" class="form-control" id="new" placeholder="New Password" required autofocus />
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-12">	
											<div class="col-lg-4">
												<label style="text-align:right;">Confirm Password :</label>
											</div>
											<div class="col-lg-4">
												<input name="checker" type="password" id="checker" class="form-control" placeholder="Confirm Password" onkeyup="return compared(this.value);" required />
											</div>
											<div class="col-lg-4">
												<div id="compare"> </div>
												<div id="compare1"> </div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-12">
											<hr />
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-6">
											<button accesskey="s" type="submit" name="save_btn" id="save_btn" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Save changes</button>
										</div>	
										<div class="col-lg-6">
											<button type="button" class="btn btn-default pull-left" id="close_btn">Close</button>
										</div>
									</div>
								</form>
							</div>
						</div>
                    </div>
                </div>	
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->    
</body>
</html>
<script>
	$(document).ready(function() {	
		$(function(){
			$(".preload").fadeOut(300, function(){
				$("#adm").fadeIn(300);
			});
		});
	});
</script>
<script>
	$(document).ready(function(){
		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			var tt = $('#checker').val();
			if(tt != '')
			{
				if(confirm("Are you sure you want to Submit this?"))
				{
					$("#save_btn").attr("disabled", true);
					$.ajax({
						url:"changepass.php",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						success:function(data)
						{
							alert('Password changed successfully...! Please login again');
							document.location="../logout.php";
						}
					});
				}
			}else{
				alert('Please enter confirm password');
				$('#checker').focus();
			}
		});
	});
</script>
