<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";	
?>
<div class="col-lg-12">
	<div class="col-lg-8" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="80%;">Employee Absentism Rate</td>
				<?php
					$sql = mysqli_query($connect,"SELECT SUM(hr_absent) as abs FROM tbl_hr_indic")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$abs = $rs["abs"];
					$sq=mysqli_query($connect,"SELECT hr_id from tbl_hr_indic")or die(mysqli_error($connect));
					$rq=mysqli_num_rows($sq);
					$tabs = ($rq/$abs) * 100;
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs,2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td style="text-align:left;" width="80%;">Employee Satisfaction Rate</td>
				<?php
					$sql = mysqli_query($connect,"SELECT SUM(hr_satis_score) as abs FROM tbl_hr_indic")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$abs = $rs["abs"];
					$sq=mysqli_query($connect,"SELECT hr_id from tbl_hr_indic")or die(mysqli_error($connect));
					$rq=mysqli_num_rows($sq);
					$tabs = ($abs/$rq) * 100;
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs,2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td style="text-align:left;" width="80%;">Employee Griviences rate</td>
				<?php
					$sql = mysqli_query($connect,"SELECT hr_griv, count(*) as abs FROM tbl_hr_indic WHERE hr_griv = 'Yes'")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$abs = $rs["abs"];
					$sq=mysqli_query($connect,"SELECT hr_id from tbl_hr_indic")or die(mysqli_error($connect));
					$rq=mysqli_num_rows($sq);
					$tabs = ($abs/$rq) * 100;
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs,2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td style="text-align:left;" width="80%;"> Needle Prick Injury Rate</td>
				<?php
					$sql = mysqli_query($connect,"SELECT hr_need_inj, count(*) as abs FROM tbl_hr_indic WHERE hr_need_inj = 'Yes'")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$abs = $rs["abs"];
					$sq=mysqli_query($connect,"SELECT hr_id from tbl_hr_indic")or die(mysqli_error($connect));
					$rq=mysqli_num_rows($sq);
					$tabs = ($abs/$rq) * 100;
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs,2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td style="text-align:left;" width="80%;">Occupational Exposure rate</td>
				<?php
					$sql = mysqli_query($connect,"SELECT hr_occpany, count(*) as abs FROM tbl_hr_indic WHERE hr_occpany = 'Yes'")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$abs = $rs["abs"];
					$sq=mysqli_query($connect,"SELECT hr_id from tbl_hr_indic")or die(mysqli_error($connect));
					$rq=mysqli_num_rows($sq);
					$tabs = ($abs/$rq) * 100;
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs,2);?>&nbsp;%</td>
			</tr>
			<tr>
				<td style="text-align:left;" width="80%;">% of complete HR files</td>
				<?php
					$sql = mysqli_query($connect,"SELECT hr_per_file, count(*) as abs FROM tbl_hr_indic WHERE hr_per_file = 'Yes'")or die(mysqli_error($connect));
					$rs = mysqli_fetch_array($sql);
					$abs = $rs["abs"];
					$sq=mysqli_query($connect,"SELECT hr_id from tbl_hr_indic")or die(mysqli_error($connect));
					$rq=mysqli_num_rows($sq);
					$tabs = ($abs/$rq) * 100;
				?>
				<td style="text-align:left;" width="20%;"><?php echo number_format($tabs,2);?>&nbsp;%</td>
			</tr>
		</table>
	</div>  
</div>  