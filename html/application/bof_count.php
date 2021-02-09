<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$tdt = date('Y-m-d');
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
	/*$qry = mysqli_query($connect,"SELECT SUM(bof_tid_day) as std FROM tbl_bof")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count = $res["std"];
	
	$qry5 = mysqli_query($connect,"SELECT SUM(bof_tob_bed) as std2 FROM tbl_bof")or die(mysqli_error($connect));
	$res2 = mysqli_fetch_assoc($qry5);
	$s_count = $res2["std2"];
	
	$tot_count = $i_count * 100 / $s_count;
	*/
	// $s = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = ''")or die(mysqli_error($connect));
	// $cnt2 = mysqli_num_rows($s);


	$s = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$tdt' AND huf_ddd ='' ) OR (huf_dadm <= '$tdt' AND huf_dddd > '$tdt')")or die(mysqli_error($connect));

	$cnt2 = mysqli_num_rows($s);
	
	$s3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd = '$tdt'")or die(mysqli_error($connect));
	$cnt3 = mysqli_num_rows($s3);	
	
	$bed = 100;
	$tot = $bed - $cnt2;

	$s4 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (MONTH(huf_dadm) <= '$tdt' AND huf_dddd >= '$tdt') OR (huf_dadm <= '$tdt' AND huf_ddd ='')")or die(mysqli_error($connect));
	$cnt4 = mysqli_num_rows($s4);
	
	if($cnt4){
			$bed_occup = round(($cnt4/$bed)*100,2);
	}else{
			$bed_occup = 0;
	}	
?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>	
	<style type="text/css">
	canvas{
		margin:auto;
	}
	.alert{
		margin-top:20px;
	}
	</style>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td width="80%;">Total No. of Patient</td>
				<td width="20%;"><?php echo $cnt2;?></td>
			</tr>
			<tr>
				<td width="80%;">Total No. of Discharge/Dama/Death </td>
				<td width="20%;"><?php echo $cnt3;?></td>
			</tr>
			<tr>
				<td width="80%;">Total No. of Bed Available </td>
				<td width="20%;"><?php echo $tot;?></td>
			</tr>
			<tr>
				<td width="80%;">Total No. of Bed Occupied </td>
				<td width="20%;"><?php echo $cnt2;?></td>
			</tr>

			<!-- <tr>
				<td width="80%;">Bed Occupancy Rate </td>
				<td width="20%;"><?php echo $cnt2;?></td>
			</tr> -->
		</table>
	</div>
</div>


<div class="col-lg-12">
	<div class="col-lg-12" style="padding-left:0;">
		<canvas id="myChart" width="auto" height="120px"></canvas>
	</div>
</div>

<script>
$(document).ready(function(){
	var ctx = document.getElementById("myChart");
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ["Total No. Of Bed Available in %","Total No. Of Bed Occupied in %"],
			datasets: [{
				label: 'Discharge, Dama, Death',
				data: [<?php echo $tot;?>,<?php echo $cnt2;?>],
				backgroundColor: [				 
					'rgba(49, 159, 9, 1)',
					'rgba(242, 38, 96, 1)'
					//'rgba(15, 108, 189, 1)'
					//,
					//
				]
			}]
		},
		options: {
			rotation: 2 * Math.PI,
			circumference: 2 * Math.PI
		}
	});
});
</script>

