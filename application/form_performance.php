<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$jan = date('Y-01');
	$feb = date('Y-02');
	$mar = date('Y-03');
	$apr = date('Y-04');
	$may = date('Y-05');
	$jun = date('Y-06');
	$jul = date('Y-07');
	$aug = date('Y-08');
	$sep = date('Y-09');
	$oct = date('Y-10');
	$nov = date('Y-11');
	$dec = date('Y-12');
	 $yr = date('Y');
	// $yr = date('2019');
?>
<script>
function myFunction() {
  window.print();
}

 
function goBack() {
  window.history.back();
}
 
</script>

<style type="text/css">
	.container {
    padding-top: 0px !important;
}
</style>
 
<div class="container" >
        <table class="custom-table" style="font-size: 15px;" >
          <!--   <thead>
                <tr >
                    <th rowspan="7" style="background-color: #cce6ff;">SR.NO.</th>
                    <th style="background-color: #cce6ff;"> <center>FORMS</center></th>
                    <th style="background-color: #cce6ff;"><center>INDICATOR</center></th>
                    <th style="background-color: #cce6ff;"><center>MONTH WISE INDICATORS</c
		
                     <th style="background-color: #cce6ff;"><center>JAN&nbsp;</center></th>
                    <th style="background-color: #cce6ff;"><center>FEB&nbsp;&nbsp;&nbsp;</center></th>
                    <th style="background-color: #cce6ff;"><center>MAR</center></th>
                    <th style="background-color: #cce6ff;"><center>&nbsp;&nbsp;APR&nbsp;&nbsp;</center></th>
                    <th style="background-color: #cce6ff;"><center>&nbsp;&nbsp;MAY&nbsp;&nbsp;</center></th>
                    <th style="background-color: #cce6ff;"><center>&nbsp;&nbsp;&nbsp;JUN&nbsp;&nbsp;&nbsp;</center></th>
                    <th style="background-color: #cce6ff;"><center>&nbsp;&nbsp;JUL&nbsp;&nbsp;</center></th>
                    <th style="background-color: #cce6ff;"><center>AUG</center></th>
                    <th style="background-color: #cce6ff;"><center>SEP</center></th>
                    <th style="background-color: #cce6ff;"><center>OCT</center></th>
                    <th style="background-color: #cce6ff;"><center>NOV</center></th>
                    <th style="background-color: #cce6ff;"><center>DEC</center></th>

                   <!-- <th>Frst Contntful Paint</th
                    <th>Frst Meaningful Paint</th>
                    <th>TTI</th>
                    <th>Speed Index</th>
                    <th>Frst CPU Idle</th>
                    <th>Estimated Input Latency</th>
                </tr>
            </thead> -->
<tbody>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">1</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> IPD Register</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total IPD</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed IPD</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3.Not-Completed IPD</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrydis = "SELECT COUNT(*) as discharge FROM tbl_huf WHERE huf_ddd='Discharge' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							$resdis = mysqli_query($connect, $qrydis);
							$rowdis=mysqli_fetch_assoc($resdis);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowdis['discharge'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotdis = "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE (huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							
							$resnotdis = mysqli_query($connect, $qrynotdis);
							$rownotdis=mysqli_fetch_assoc($resnotdis);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotdis['notdischarge'];?></center></td>
					<?php
						}
					?>
				</tr>
				


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/KPIIPD_register.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>

	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">2
		</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> OPD Register</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total OPD</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed OPD</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3.Not-Completed OPD</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_opdwttm WHERE (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr') AND (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_opdwttm WHERE (opdwttm_opdwttm!='' AND opdwttm_opdwttm!='0.00')  AND (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];
						

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_opdwttm  WHERE (opdwttm_opdwttm='0.00' OR opdwttm_opdwttm=' ' )  AND (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
				


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/KPIOPD_register.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">3</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> OPD Feedback Form</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total OPD Feedback Form</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed OPD Feedback Form</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3.Not-Completed OPD Feedback Form</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>
 
				 
				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_opd LEFT JOIN tbl_opdwttm  ON tbl_opdwttm.opdwttm_id= tbl_opd.opd_id  WHERE (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr') AND (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_opd LEFT JOIN tbl_opdwttm  ON tbl_opdwttm.opdwttm_id= tbl_opd.opd_id WHERE (opd_score!='' AND opd_score!='0') AND (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_opd LEFT JOIN tbl_opdwttm  ON tbl_opdwttm.opdwttm_id= tbl_opd.opd_id WHERE (opd_score='0' OR opd_score=' ' ) AND (month(opdwttm_dttmds) = '$month' AND year(opdwttm_dttmds) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/OPDFeedback.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>

	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">4</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> IPD Feedback Form</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total IPD Feedback Form</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed IPD  Feedback Form</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3.Not-Completed IPD  Feedback Form</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>
               <!-- FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id  -->
               	<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id  WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id WHERE (ipd_score!='' AND ipd_score!='0') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_ipd.ipd_id WHERE (ipd_score='0' OR ipd_score=' ' ) AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
               
				
				
			</table>
		</td>
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/IPDFeedback.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>

			
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">5</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Ventilator Associated Pnemonia Form </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total Ventilator Associated Pnemonia Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Ventilator Associated Pnemonia Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3.Not-Completed Ventilator Associated Pnemonia Form </td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				
				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_vent_ass_phmn  WHERE (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr') AND (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_vent_ass_phmn WHERE (vent_tcd!='0' AND vent_tcd!=' ') AND (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_vent_ass_phmn WHERE (vent_tcd='0' OR vent_tcd=' ') AND (month(vent_dt_iuc) = '$month' AND year(vent_dt_iuc) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
               

               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/VAP.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">6</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Cather Associated Unrinary Tract Infection</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total Cather Associated Unrinary Tract Infection </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Cather Associated Unrinary Tract Infection</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3.Not-Completed Cather Associated Unrinary Tract Infection </td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_cath_assoc_uti WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_cath_assoc_uti WHERE (cath_uti_tcd!='' AND cath_uti_tcd!='0') AND (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_cath_assoc_uti WHERE (cath_uti_tcd='0' OR cath_uti_tcd='') AND (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/CAUTI.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">7</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Central Line Associated Blood Stream Infection Form</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total Central Line Associated Blood Stream Infection Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Central Line Associated Blood Stream Infection Form</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3.Not-Completed Central Line Associated Blood Stream Infection Form</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_centrl_line_assoc WHERE (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr') AND (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_centrl_line_assoc WHERE (cent_bs_tcld!='' AND cent_bs_tcld!='0') AND (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_centrl_line_assoc WHERE (cent_bs_tcld='' OR cent_bs_tcld='0') AND (month(cent_bs_dticlc) = '$month' AND year(cent_bs_dticlc) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/CLABSIF.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">8</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Surgical Site Infection Register</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Surgical Site Infection Register </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Surgical Site Infection Register</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Surgical Site Infection Register</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_surg_site_infec WHERE (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr') AND (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_surg_site_infec WHERE (surg_nsurg!='' AND surg_nsurg!='0') AND (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_surg_site_infec WHERE (surg_nsurg='0' OR surg_nsurg='') AND (month(surg_dtos) = '$month' AND year(surg_dtos) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/SSIR.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">9</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Needle Prick Injury Register </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Needle Prick Injury Register  </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Needle Prick Injury Register </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Needle Prick Injury Register </td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_need_pif WHERE (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr') AND (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_need_pif WHERE (needp_mod_inj!='' AND needp_mod_inj!='0') AND (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_need_pif WHERE( needp_mod_inj=' ' OR needp_mod_inj='0') AND (month(needp_dttm) = '$month' AND year(needp_dttm) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/NPI.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">10</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Intial Assessment Time</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Intial Assessment Time  </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Intial Assessment Time</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Intial Assessment Time</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_huf WHERE (int_tottm!=''AND int_tottm!='0') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_huf WHERE (int_tottm=' ' OR int_tottm='0') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/IAT.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">11</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> IPD Waiting Time Form  </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total IPD Waiting Time Form    </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed IPD Waiting Time Form  </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed IPD Waiting Time Form  </td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_huf WHERE (wttm_opdwttm!='' AND  wttm_opdwttm!='0') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_huf WHERE (wttm_opdwttm=' ' OR wttm_opdwttm='0') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/IPDWTF.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">12</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Blood Trasfusion Related Events </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Blood Trasfusion Related Events </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Blood Trasfusion Related Events </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Blood Trasfusion Related Events</td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_blood_fusion  WHERE (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr') AND (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_blood_fusion  WHERE (bld_tat!='' AND bld_tat!='00:00')  AND (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_blood_fusion  WHERE (bld_tat='' OR bld_tat='00:00') AND (month(bld_dtreq) = '$month' AND year(bld_dtreq) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/BTRE.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">13</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Care Related Events   </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Care Related Events   </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Care Related Events  </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Care Related Events  </td></tr>
				
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM  tbl_care_evt  WHERE (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr') AND (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM  tbl_care_evt   WHERE  (care_tmpli!='' AND care_tmpli!='00:00') AND (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM  tbl_care_evt   WHERE (care_tmpli=' ' OR care_tmpli='00:00') AND (month(care_dtpli) = '$month' AND year(care_dtpli) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>



               
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/CRE.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>


<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">14</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Medical Records Indicator Form </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Medical Records Indicator Form   </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Medical Records Indicator Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Medical Records Indicator Form </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM  tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_medi_indi.medi_id  WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM  tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_medi_indi.medi_id   WHERE  (medi_mrdav='Available' OR medi_mrdav='Missing') AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id= tbl_medi_indi.medi_id  WHERE  medi_mrdav='' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>

<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/MRI.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">15</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> HR Master Details </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total HR Master Details </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed HR Master Details</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed HR Master Details </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>
<!-- hr_ctstat_det -->
				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_hr_mast   WHERE (month(hr_datej) = '$month' AND year(hr_datej) = '$yr') AND (month(hr_datej) = '$month' AND year(hr_datej) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_hr_mast  WHERE hr_emp_type!='' AND (month(hr_datej) = '$month' AND year(hr_datej) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_hr_mast WHERE hr_emp_type='' AND (month(hr_datej) = '$month' AND year(hr_datej) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/HRM.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">16</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> HR Indicator</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total HR Indicator</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed HR Indicator</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed HR Indicator </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM  tbl_hr_indic  WHERE (month(hr_date) = '$month' AND year(hr_date) = '$yr') AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hrid = tbl_hr_indic.hrid WHERE hr_ctstat!='' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_hr_indic LEFT JOIN tbl_hr_mast ON tbl_hr_mast.hrid = tbl_hr_indic.hrid WHERE hr_ctstat='' AND (month(hr_date) = '$month' AND year(hr_date) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
				
			</table>
		</td>
	</tr>
<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/HRI.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">17</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Bio Equipement Master</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Bio Equipement Master</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Bio Equipement Master</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Bio Equipement Master </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_eqp_mast_bio  WHERE (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr') AND (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_eqp_mast_bio WHERE eqp_make!=''  AND (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_eqp_mast_bio WHERE eqp_make='' AND (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
               
				
			</table>
		</td>
	</tr>
<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/BEM.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	
<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">18</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Bio Maintenance Register</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Bio Maintenance Register</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Bio Maintenance Register</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Bio Maintenance Register</td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_eqp_indic  WHERE (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr') AND (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE eqp_make!=''  AND (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE eqp_make='' AND (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/BMR.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">19</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> General Equipement Master</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total General Equipement Master</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed General Equipement Master</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed General Equipement Master</td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_eqp_mast  WHERE (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr') AND (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_eqp_mast WHERE eqp_make!='' AND (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_eqp_mast WHERE eqp_make='' AND (month(eqp_dtpur) = '$month' AND year(eqp_dtpur) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/GEM.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">21</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> General Maintenance Register</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total General Maintenance Register</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed General Maintenance Register</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed General Maintenance Register</td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_eqp_indic  WHERE (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr') AND (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE eqp_make!=''  AND (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_eqp_indic LEFT JOIN tbl_eqp_mast ON tbl_eqp_mast.eqpid = tbl_eqp_indic.eqpid WHERE eqp_make='' AND (month(eqp_brkdwn_date) = '$month' AND year(eqp_brkdwn_date) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/GMR.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">21</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Sentinel Event Related to Surgery and Anesthetia</td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Sentinel Event Related to Surgery and Anesthetia</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Sentinel Event Related to Surgery and Anesthetia</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Sentinel Event Related to Surgery and Anesthetia</td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_senti_det WHERE (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr') AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_senti_det LEFT JOIN tbl_huf ON tbl_senti_det.huf_id = tbl_huf.huf_id WHERE (senti_nm_surg_pl!='' AND senti_nm_surg_pl!='0')  AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp  FROM tbl_senti_det LEFT JOIN tbl_huf ON tbl_senti_det.huf_id = tbl_huf.huf_id WHERE (senti_nm_surg_pl='' OR senti_nm_surg_pl='0') AND (month(senti_dt_surg_dn) = '$month' AND year(senti_dt_surg_dn) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/SERSA.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">22</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Emergency Register Form </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Emergency Register Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Emergency Register Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Emergency Register Form </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_emrgncy_register_ipd WHERE (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr') AND (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_emrgncy_register_ipd WHERE (time_taken_for_initl_assmnt!='' AND time_taken_for_initl_assmnt!='00:00') AND (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp  FROM tbl_emrgncy_register_ipd  WHERE (time_taken_for_initl_assmnt='' OR time_taken_for_initl_assmnt='00:00') AND (month(date_of_patient_arrvl_at_emrgncy) = '$month' AND year(date_of_patient_arrvl_at_emrgncy) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/ER.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">23</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> ICU Register Form  </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total ICU Register Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed ICU Register Form </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed ICU Register Form  </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

					<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_icu_register_ipd WHERE (month(date_of_return_in_icu) = '$month' AND year(date_of_return_in_icu) = '$yr') AND (month(date_of_return_in_icu) = '$month' AND year(date_of_return_in_icu) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp  FROM tbl_huf LEFT JOIN tbl_icu_register_ipd ON tbl_huf.huf_id = tbl_icu_register_ipd.tbl_huf_id WHERE sign!='' AND (month(date_of_return_in_icu) = '$month' AND year(date_of_return_in_icu) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_huf LEFT JOIN tbl_icu_register_ipd ON tbl_huf.huf_id = tbl_icu_register_ipd.tbl_huf_id WHERE sign='' AND (month(date_of_return_in_icu) = '$month' AND year(date_of_return_in_icu) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/ICU.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">24</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Laboratory Indicator Form (OPD)  </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Laboratory Indicator Form (OPD)  </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Laboratory Indicator Form (OPD)  </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Laboratory Indicator Form (OPD)  </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_lab_opd WHERE (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr') AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_lab_opd WHERE nam_of_test!=''  AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_lab_opd WHERE nam_of_test='' AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/LOPD.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">25</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Laboratory Indicator Form (IPD)  </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Laboratory Indicator Form (IPD) </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Laboratory Indicator Form (IPD) </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Laboratory Indicator Form (IPD)  </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_lab_ipd  WHERE (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr') AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_lab_ipd WHERE nam_of_test!='' AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_lab_ipd  WHERE nam_of_test='' AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/LIPD.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">26</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Pharmacy Register  </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Pharmacy Register </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Pharmacy Register </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Pharmacy Register </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_pharmcy_register WHERE (month(vendor) = '$month' AND year(vendor) = '$yr') AND (month(vendor) = '$month' AND year(vendor) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_pharmcy_register WHERE (item_no!='' AND item_no!='0')  AND (month(vendor) = '$month' AND year(vendor) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_pharmcy_register WHERE (item_no='' OR item_no='0') AND (month(vendor) = '$month' AND year(vendor) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>


               
				
			</table>
		</td>
	</tr>
	<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/PR.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">27</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Radiology Indicator Form (OPD) </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Radiology Indicator Form (OPD) </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Radiology Indicator Form (OPD)</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Radiology Indicator Form (OPD) </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

			<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_radio_opd WHERE (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr') AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_radio_opd  WHERE radio_invst!=''  AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_radio_opd WHERE radio_invst='' AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>

			</table>
		</td>
	</tr>
<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/ROPD.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	
<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">28</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> Radiology Indicator Form (IPD) </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. Total Radiology Indicator Form (IPD) </td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>2. Completed Radiology Indicator Form (IPD)</td></tr>
				
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Not-Completed Radiology Indicator Form (IPD) </td></tr>
				 
				
			</table>
		</td>



		<td valign="top" colspan="13">


			<table width="100%" style="font-size:14px;  background-color: white;" class="table-bordered" align="center">

               <tr>
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JAN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>FEB</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>APR</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>MAY</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUN</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>JUL</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>AUG</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>SEPT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>OCT</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>NOV</b></center></td> 
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td>
               </tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT COUNT(*) as total FROM tbl_radio_ipd WHERE (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr') AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["total"];
							if($i_count > 0){
								$icount = $i_count;
							}else{
								$icount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $icount;?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrycomp = "SELECT COUNT(*) as comp FROM tbl_radio_ipd  WHERE radio_invst!=''  AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							$rescomp = mysqli_query($connect, $qrycomp);
							$rowcomp=mysqli_fetch_assoc($rescomp);
						   // echo $rowdis['discharge'];

					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rowcomp['comp'];?></center></td>
					<?php
						}
					?>
				</tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qrynotcomp = "SELECT COUNT(*) as notcomp FROM tbl_radio_ipd WHERE radio_invst='' AND (month(date_of_rep_gen) = '$month' AND year(date_of_rep_gen) = '$yr')"or die(mysqli_error($connect));
							
							$resnotcomp = mysqli_query($connect, $qrynotcomp);
							$rownotcomp=mysqli_fetch_assoc($resnotcomp);
							// echo $rownotdis['notdischarge'];
							
					?>

					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $rownotcomp['notcomp'];?></center></td>
					<?php
						}
					?>
				</tr>

				
			</table>
		</td>
	</tr>
	
<tr style="background-color: white;">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td></td>
		<td>
			<?php include"KPICharts/RIPD.php"; ?><br>
			<span style="box-shadow: 0 0 3px 1px rgba(0,0,0,.35);width: 100px;height: 30px;margin-left: 450px;font-size: 16px;" onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</span>
		</td>
	</tr>
	
</tbody>

	 



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
   .custom-table{border-collapse:collapse;width:100%;border:solid 1px #c0c0c0;font-family:open sans;font-size:11px}
            .custom-table th,.custom-table td{text-align:left;padding:8px;border:solid 1px #c0c0c0}
            .custom-table th{color:#000080}
            .custom-table tr:nth-child(odd){background-color:#f7f7ff}
            .custom-table>thead>tr{background-color:#dde8f7!important}
            .tbtn{border:0;outline:0;background-color:transparent;font-size:13px;cursor:pointer}
            .toggler{display:none}
            .toggler1{display:table-row;}
            .custom-table a{color: #0033cc;}
            .custom-table a:hover{color: #f00;}
            .page-header{background-color: #eee;}
</style>
 
            
            
        </table>
        
</div>
<script>
	 $(document).ready(function () {
                $(".tbtn").click(function () {
                    $(this).parents(".custom-table").find(".toggler1").removeClass("toggler1");
                    $(this).parents("tbody").find(".toggler").addClass("toggler1");
                    $(this).parents(".custom-table").find(".fa-minus-circle").removeClass("fa-minus-circle");
                    $(this).parents("tbody").find(".fa-plus-circle").addClass("fa-minus-circle");
                });
            });
</script>