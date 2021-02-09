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
/*.table-responsive {
    min-height: .01%;
     overflow-x: none; 
}*/
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
	
	<tr>
		
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