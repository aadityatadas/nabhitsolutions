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


<script>
function myFunction() {
  window.print();
}
function goBack() {
  window.history.back();
}
</script>
<body>
    <div id="wrapper">
        <!-- Navigation -->        
        <div class="col-lg-12">
            <div class="row">
				<div class="col-lg-12">
					<br />
				</div>
                <div class="col-lg-12"  >

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Dashboard.php"><button type="button" class="btn btn-info" style="font-size: 20px;"><i class="fa fa-dashboard"></i> Dashboard</button></a>
					&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info" onclick="myFunction()" style="font-size: 20px;"><i class="fa fa-print"></i> Print</button>

					<button type="button" class="btn btn-success" id="excel" style="font-size: 20px;"><i class="fa fa-file-excel-o"></i> Excel</button>

					
			 <span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 40px;font-size: 20px;background-color:#17A2B8;color: white;float: right;; " onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
                    
				  
                <div class="col-lg-12">
					<br />
				</div>

				
				<div class="col-lg-12" id="tableWrap">
                    <div class="panel panel-primary">

                    	<div class="panel-heading" style="padding:7px; background-color:#ccccff; color:black; font-size: 18px; font-family: ; font-weight: bold;"><center>
                           NABH DEMO KEY INDICATOR
						</center></div><BR>

                        <div class="panel-heading" style="padding:7px; background-color:#ccccff; color:black; font-size: 18px; font-family: ; font-weight: bold;"><center>
                            PERFORMANCE OF KEY QUALITY INDICATOR
						</center></div>

						
						<div class="panel-body" >
							<div id="order-table" class="table-responsive" >
								<div class="col-lg-12">
									<table width="100%" style="font-size:14px; " class="table-bordered"  >
										<?php include"form_indic_det_super_admin.php";?>
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

	$(function() {
		  $('#excel').click(function() {
		    var url = 'data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html())
		    location.href = url
		    return false
		  })
		});
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