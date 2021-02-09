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
?>
 <style type="text/css">
	.container {
    padding-top: 0px !important;
}
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/modules/histogram-bellcurve.js"></script>
<script src="https://code.highcharts.com/modules/pareto.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="container">
        <table class="custom-table" style="font-size: 15px;" >
          
<tbody>
	<tr>
		<td  style="text-align:center; font-weight: bold; background-color:#e6eeff; font-size: 14px;">1</td>
		<td style="font-weight: bold;font-size: 14px; font-family: sans-serif; background-color:#e6eeff"> HOSPITAL UTILIZATION </td>
		<td valign="top">
			<table width="100%" style="font-size:14px; background-color: white;" class="table-bordered"  >
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1.Total No. of Inpatient Days</td></tr>
				<tr><td>2. Total No. of Admissions</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Total No. of Discharges</td></tr>
				<tr><td>4. Total No. of DAMA</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>5. Total No. of Death</td></tr>
				<tr><td>6. Total No. of MLC</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>7. Average Length of stay (in Days)</td></tr>
				<tr><td>8. Total No. of Surgeries</td></tr>
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
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td> </tr>

				 
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["std"];
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
							$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$A_count = mysqli_num_rows($qry2);
					?>
					<td id="ajj"><center><?php echo $A_count;?></center></td>
					<?php
						}
					?>
				</tr>


				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$dis_count = mysqli_num_rows($qry3_1);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj">  <center><?php echo $dis_count;?></center></td>
					<?php
						}
					?>
				</tr>


				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$dm_count = mysqli_num_rows($qry3_2);
					?>
					<td id="ajj"><center><?php echo $dm_count;?></center></td>
					<?php
						}
					?>
				</tr>


				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$dh_count = mysqli_num_rows($qry3_3);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $dh_count;?></center></td>
					<?php
						}
					?>
				</tr>


				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry3_4 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_mlc = 'MLC' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$mlc_count = mysqli_num_rows($qry3_4);
					?>
					<td id="ajj"><center><?php echo $mlc_count;?></center></td>
					<?php
						}
					?>
				</tr>

                   
                <tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["std"];
							$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$A_count = mysqli_num_rows($qry2);
							$dy = $i_count * 24;
							$dys = $dy / $A_count;
							$hmin = $dys / 24;
							list($number1, $number2) = explode('.', $hmin);
							
							$los_count = $number1.'.'.$number2;
							if($los_count > 0){
								$loscount = $los_count;
							}else{
								$loscount = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo number_format($loscount,1);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$s_count = mysqli_num_rows($qry5);
					?>
					<td id="ajj"><center><?php echo $s_count;?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

</tbody>

</table>

	<div class="col-lg-12">
		<div class="row">

			<?php include 'sup_admin/extrat_chart.php'; ?>
		</div>
	</div>


	<table class="custom-table" style="font-size: 15px;" >
		<tbody>
			<tr>
		<td style="text-align:center;font-size: 14px;font-weight: bold;">2</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif; "> INITIAL ASSESSEMENT TIME </td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>Averarge Intial Assessment Time in Hrs.</td></tr>
			</table>
		</td>

		<td valign="top" colspan="12">
			<table width="100%" style="font-size:14px;" class="table-bordered">


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
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td> </tr>


				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++)
						{
							$hr_num = 0;
							$min_num = 0;
							$sum_std = 0;
							$tot_count = 0;
							$numb3 = 0;
							$qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
							while($res = mysqli_fetch_array($qry))
							{
								$sm_std = $res["int_tottm"];
								list($num1, $num2) = explode('.', $sm_std);
								$hr_num = $hr_num + $num1;
								$min_num = $min_num + $num2;
							}
							$sum_std = ($hr_num * 60) + $min_num;	
						
							$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != ''")or die(mysqli_error($connect));
							$s_count = mysqli_num_rows($qry5);
							
							$tot_count = $sum_std / $s_count;
							if($tot_count >= 60)
							{
								$tt_count = $tot_count / 60;
								list($number1, $number2) = explode('.', $tt_count);
								
								$tot_min = $tot_count - ($number1 * 60);
								if($tot_min >= 10)
								{
									$numb3 = $number1.'.'.$tot_min;
								}else if($tot_min < 10){
									$a = 0;
									$numbr3 = $number1.'.'.$a.''.$tot_min;
									$numb3 = $numbr3;
								}		
							}else if($tot_count < 60){
								list($numb1, $numb2) = explode('.', $tot_count);
								$aj = 0;
								$numbr3 = $aj.'.'.$numb1;
								$numb3 = $numbr3;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center>&nbsp;&nbsp;&nbsp;<?php echo number_format($numb3,2);?>&nbsp;&nbsp;&nbsp;</center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
		</tbody>
	</table>
	<div class="col-lg-12">
		<div class="row">
			<?php include 'sup_admin/extrat_chart2.php'; ?>
		</div>
	</div>

 <table class="custom-table" style="font-size: 15px;" >
          
<tbody>
	<tr>
		<td style="text-align:center;font-size: 14px;font-weight: bold;">4</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"> CATHETER ASSOCIATED UNRINARY TRACT INFECTION </td>
		<td valign="top">
			<table width="100%" style="font-size:14px;" class="table-bordered">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>1. CAUTI Rate</td></tr>
				<tr style="font-size: 16px;"><td>2. Total Catheter Days</td></tr>
				<tr style="background-color:#e6eeff; font-size: 16px;"><td>3. Positive CAUTI</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="100%" style="font-size:14px;" class="table-bordered">

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
               	<td style="background-color:#ccebff; font-size: 16px;" id="ajj"><center><b>DEC</b></center></td> </tr>

				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as std_cath FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr')")or die(mysqli_error($connect));
							$res_cath = mysqli_fetch_assoc($qry_cath);
							$i_count_cath = $res_cath["std_cath"];
							$qry2_cath = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
							$c_count_cath = mysqli_num_rows($qry2_cath);
							$cauti_count_cath = $c_count_cath*1000/$i_count_cath;
							if($cauti_count_cath > 0){
								$cauti_countcath = $cauti_count_cath;
							}else{
								$cauti_countcath = 0;
							}
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo number_format($cauti_countcath,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath3 = mysqli_query($connect,"SELECT SUM(cath_uti_tcd) as tcd_cath3 FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_tcd != ''")or die(mysqli_error($connect));
							$res_cath3 = mysqli_fetch_assoc($qry_cath3);
							$tcd_cath3 = $res_cath3["tcd_cath3"];
							if($tcd_cath3 > 0){
								$tcdcath3 = $tcd_cath3;
							}else{
								$tcdcath3 = 0;
							}
					?>
					<td style="font-size: 16px;"id="ajj"><center><?php echo number_format($tcdcath3,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$qry_cath2 = mysqli_query($connect,"SELECT cath_uti_spc FROM tbl_huf WHERE (month(cath_uti_iuc) = '$month' AND year(cath_uti_iuc) = '$yr') AND cath_uti_spc = 'Yes'")or die(mysqli_error($connect));
							$c_cathcount = mysqli_num_rows($qry_cath2);
					?>
					<td style="background-color:#e6eeff; font-size: 16px;" id="ajj"><center><?php echo $c_cathcount;?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

	</tbody>

</table>




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