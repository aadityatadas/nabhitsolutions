<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');
?>
<div class="col-lg-12">
	<div class="col-lg-8" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="80%;">Employee Absentism Rate</td>
				<?php
					$sql = mysqli_query($connect,"SELECT SUM(hr_absent) as abs FROM tbl_hr_indic WHERE hr_date BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$abs = $rs["abs"];
					$sq = mysqli_query($connect,"SELECT hr_id from tbl_hr_indic WHERE hr_date BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rq = mysqli_num_rows($sq);
					$tabss1 = ($abs/$rq/30) * 100;
					if($tabss1 > 0)
					{
						$tabs1 = number_format($tabss1,2);
					}else{
						$tabs1 = 0;
					}
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs1,2);?>&nbsp;%</td>
			</tr>


			<tr>
				<td style="text-align:left;" width="80%;">Employee Satisfaction Rate</td>
				<?php
					$sql2 = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs2 FROM tbl_hr_indic WHERE hr_date BETWEEN '$frdt' AND '$todt'")or die(mysqli_error($connect));
					$rs2 = mysqli_fetch_assoc($sql2);
					$abs2 = $rs2["abs2"];
					$tabss2 = ($abs2/$rq);
					if($tabss2 > 0)
					{
						$tabs2 = $tabss2;
					}else{
						$tabs2 = 0;
					}
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs2,2);?>&nbsp;%</td>
			</tr>


			<tr>
				<td style="text-align:left;" width="80%;">Employee Griviences rate</td>
				<?php
					$sql3 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_griv = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
					$rs3 = mysqli_num_rows($sql3);
					$tabss3 = ($rs3/$rq) * 100;
					if($tabss3 > 0)
					{
						$tabs3 = $tabss3;
					}else{
						$tabs3 = 0;
					}
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs3,2);?>&nbsp;%</td>
			</tr>


			<tr>
				<td style="text-align:left;" width="80%;">Needle Prick Injury Rate</td>
				<?php
					$sql4 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_need_inj = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
					$rs4 = mysqli_num_rows($sql4);
					$tabss4 = ($rs4/$rq) * 100;
					if($tabss4 > 0)
					{
						$tabs4 = $tabss4;
					}else{
						$tabs4 = 0;
					}
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs4,2);?>&nbsp;%</td>
			</tr>


			<tr>
				<td style="text-align:left;" width="80%;">Occupational Exposure rate</td>
				<?php
					$sql5 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_occpany = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
					$rs5 = mysqli_num_rows($sql5);
					$tabss5 = ($rs5/$rq) * 100;
					if($tabss5 > 0)
					{
						$tabs5 = $tabss5;
					}else{
						$tabs5 = 0;
					}
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs5,2);?>&nbsp;%</td>
			</tr>

			
			<tr>
				<td style="text-align:left;" width="80%;">% of complete HR files</td>
				<?php
					$sql6 = mysqli_query($connect,"SELECT hr_id FROM tbl_hr_indic WHERE hr_per_file = 'Yes' AND (hr_date BETWEEN '$frdt' AND '$todt')")or die(mysqli_error($connect));
					$rs6 = mysqli_num_rows($sql6);
					$tabss6 = ($rs6/$rq) * 100;
					if($tabss6 > 0)
					{
						$tabs6 = $tabss6;
					}else{
						$tabs6 = 0;
					}
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs6,2);?>&nbsp;%</td>
			</tr>
		</table>
	</div>  
</div>  