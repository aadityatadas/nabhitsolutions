<?php
session_start();
//error_reporting(0);
include"dbinfo.php";

	$year = date('Y'); //2018
	$sql="SELECT huf_ddd, count(*) as huf_dama FROM tbl_huf WHERE year(huf_dadm)='$year' AND huf_ddd = 'DAMA'";
	$query=$connect->query($sql);
	$row=$query->fetch_array();
	$dama=$row['huf_dama'];
	
	$sql2="SELECT huf_ddd, count(*) as huf_dis FROM tbl_huf WHERE year(huf_dadm)='$year' AND huf_ddd = 'Discharge'";
	$query2=$connect->query($sql2);
	$row2=$query2->fetch_array();
	$disc=$row2['huf_dis'];
	
	$sql3="SELECT huf_ddd, count(*) as huf_dth FROM tbl_huf WHERE year(huf_dadm)='$year' AND huf_ddd = 'Death'";
	$query3=$connect->query($sql3);
	$row3=$query3->fetch_array();
	$dth=$row3['huf_dth'];
?>
<!DOCTYPE html>
<html ng-app="app">
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
			
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>	
	<style type="text/css">
	canvas{
		margin:auto;
	}
	.alert{
		margin-top:20px;
	}
	</style>
</head>
<body>
		<div class="container">
			<br /><br />
			<div class="table-responsive">
				<div class="col-lg-6" style="padding-left:0;">
					<a href="dashboard.php" style="text-decoration:none;color:#fff;"><button accesskey="b" type="button" class="btn btn-info btn-sm">Back To Dashboard ( Alt + b )</button></a>
				</div>
				<div class="col-lg-6" style="padding-left:0;">
					<div class="col-lg-4">
						<input type="text" name="frdate" id="frdate" value="2018-01-01" placeholder="2018-01-01" class="form-control" />
					</div>
					<div class="col-lg-4">
						<input type="text" name="todate" id="todate" value="2018-03-31" placeholder="2018-03-31" class="form-control" />
					</div>
					<div class="col-lg-4">
						<button type="button" name="search" id="search" class="btn btn-primary btn-sm" onclick="LoadData()" >SEARCH</button>
					</div>
				</div>
			</div>
		</div>
		<div id="cht">
			<?php include "fetch_chart_det1.php";?>
		</div>
		<div id="cht2">	
			
		</div>
		</div>
		<br /><br />
		
	</body>
</html>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$.datepicker.setDefaults({  
			dateFormat: 'yy-mm-dd'   
	});  
	$(function(){  
		$("#frdate").datepicker();
		$("#todate").datepicker();
	});	
});
</script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';      
		$('#frdate').mask('9999-99-99');// for  To Date
		$('#todate').mask('9999-99-99');// for  To Date
	});
</script>
<script>
$(document).ready(function(){
	var ctx = document.getElementById("myChart");
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ["Discharge","Dama","Death"],
			datasets: [{
				label: 'Discharge, Dama, Death',
				data: [<?php echo $disc;?>,<?php echo $dama;?>,<?php echo $dth;?>],
				backgroundColor: [				 
					'rgba(49, 159, 9, 1)',
					'rgba(15, 108, 189, 1)',
					'rgba(242, 38, 96, 1)'
				]
			}]
		},
		options: {
			rotation: 1 * Math.PI,
			circumference: 1 * Math.PI
		}
	});
});
</script>
<script>
	function LoadData(){
		var frdate = $('#frdate').val();
		var todate = $('#todate').val();
		if(frdate != '' && todate != ''){
			$.ajax({
				url: "fetch_chart_det2.php",
				cache: false,
				method:"POST",  
				data:{frdate:frdate,todate:todate},
				success: function(data){
					$("#cht").hide();
					$("#cht2").html(data);
				}
			});
		}
	}
</script>