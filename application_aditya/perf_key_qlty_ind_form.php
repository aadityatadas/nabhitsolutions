<?php
	error_reporting(0);
	session_start();
	include"header.php";
	include"nav-bar2.php";
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
                <div class="col-lg-12">
					<a href="dashboard.php"><button type="button" class="btn btn-default pull-left"><< Back To Dashboard</button></a>
				</div>
                <div class="col-lg-12">
					<br />
				</div>
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding:7px;">
                            PERFORMANCE OF KEY QUALITY INDICATOR
						</div>
						<div class="panel-body">
							<div id="order-table" class="table-responsive">
								<table width="100%" style="padding:10px;margin:10px;font-size:14px;" class="table-bordered">
									<thead style="font-size:12px;color:darkblue;">
										<tr>
											<th width="3%">Sr.No.</th>
											<th width="10%">Quality Indicator</th>
											<th width="7%">BENCHMARKING</th>
											<th width="27%">INDICATOR</th>
											<th>JAN</th>
											<th>FEB</th>
											<th>MAR</th>
											<th>APR</th>
											<th>MAY</th>
											<th>JUN</th>
											<th>JUL</th>
											<th>AUG</th>
											<th>SEP</th>
											<th>OCT</th>
											<th>NOV</th>
											<th>DEC</th>
										</tr>
									</thead>
									<tbody>
										<?php include"perf_indic_det.php";?>
									</tbody>
								</table>
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