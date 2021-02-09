<?php
	error_reporting(0);
	session_start();
	include"header.php";
	include"nav-bar02.php";
	include"footer.php";
	
	$frdt = date('Y-01-01');
	$todt = date('Y-12-31');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
	table th{
		text-align:center;
	}
	#ajj{
		padding-right:3px;
		text-align:right;
	}
</style>
<body>
    <div id="wrapper">
        <!-- Navigation -->        
        <div class="col-lg-12">
            <div class="row">
				<div class="col-lg-12">
					<br />
				</div>
                <div class="col-lg-12"  >
					<a href="#"><button type="button" class="btn btn-info pull-left" style="font-size: 20px;">Dashboard</button></a>
				</div>
                <div class="col-lg-12">
					<br />
				</div>

				
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px; background-color:#cce6ff; color:black; font-size: 18px; font-family: ; font-weight: bold;"><center>
                            PERFORMANCE OF KEY QUALITY INDICATOR
						</center></div>
						<div class="panel-body">
							<div id="order-table" class="table-responsive">
								<div class="col-lg-12">
									<table width="100%" style="font-size:14px; " class="table-bordered" >
										<?php include"form_indic_det0.php";?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>		
        </div>
        <!-- /#page-wrapper -->
    </div>
</body>
</html>

<script>
	$(document).ready(function(){
		$.datepicker.setDefaults({  
				dateFormat: 'yy-mm-dd'   
		});  
		$(function(){  
			$("#frdate").datepicker();
			$("#todate").datepicker();
		});
	});
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';      
		$('#frdate').mask('9999-99-99');// for  To Date
		$('#todate').mask('9999-99-99');// for  To Date
	});
</script>