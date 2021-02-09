<?php
	error_reporting(0);
	session_start();
	include"../dbinfo.php";
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
<table cellpadding="0" cellspacing="0" border="1" align="center" >
	<tr>
		<!-- <td style="text-align:center; font-size: 14px; font-weight: bold;">14</td>
		<td  style="font-weight: bold;font-size: 14px; font-family: sans-serif;"> MEDICAL RECORDS INDICATOR FORM </td>
		 --><td valign="top">
			<table width="800px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1">
				<tr style="background-color:#ccebff;"><td><b>MONTHS</b></td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>1. % of Missing Records</td></tr>
				<tr style="font-size: 16px;"><td>2. MRD File In order as per MRD checklist</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>3. MRD has Discharge Summary</td></tr>
				<tr style="font-size: 16px;"><td>4. MRD has codification as per ICD</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>5. MRD has incomplete or Improper Consent</td></tr>
				<tr style="font-size: 16px;"><td>6. Medication orders are properly written</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>7. Handover Sheet of Doctors are properly filled</td></tr>
				<tr style="font-size: 16px;"><td>8. Handover Sheet of Nurses are properly filled</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>9. The Plan of care is documented with desired outcome and countersigned by clinicians</td></tr>
				<tr style="font-size: 16px;"><td>10. MRD includes screening for nutritional needs (Nutritional Assessment)</td></tr>
				<tr style="background-color: #e6eeff; font-size:16px;"><td>11. MRD Includes Nursing care plan is documented with outcome at the time of admission</td></tr>
			</table>
		</td>
		<td valign="top" colspan="13">
			<table width="600px" style="font-size:14px;" cellpadding="0" cellspacing="0" border="1" >

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
							$sq_medi = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi = mysqli_num_rows($sq_medi);
							$sql_medi=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdav='Missing' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl_medi = mysqli_num_rows($sql_medi);
							$rexpl_medi = ($rsl_medi / $rs_medi) * 100;
							if($rexpl_medi > 0)
							{
								$rexpls_medi = $rexpl_medi;
							}else{
								$rexpls_medi = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($rexpls_medi,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi2 = mysqli_num_rows($sq_medi2);
							$sql2_medi2=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdfile='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl2_medi2 = mysqli_num_rows($sql2_medi2);
							$rexpl2_medi2 = ($rsl2_medi2 / $rs_medi2) * 100;
							if($rexpl2_medi2 > 0)
							{
								$rexpls2_medi2 = $rexpl2_medi2;
							}else{
								$rexpls2_medi2 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><center><?php echo number_format($rexpls2_medi2,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi3 = mysqli_num_rows($sq_medi3);
							$sql3_medi3=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrddissum='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl3_medi3 = mysqli_num_rows($sql3_medi3);
							$rexpl3_medi3 = ($rsl3_medi3 / $rs_medi3) * 100;
							if($rexpl3_medi3 > 0)
							{
								$rexpls3_medi3 = $rexpl3_medi3;
							}else{
								$rexpls3_medi3 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($rexpls3_medi3,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi4 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi4 = mysqli_num_rows($sq_medi4);
							$sql4_medi4=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdicd='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl4_medi4 = mysqli_num_rows($sql4_medi4);
							$rexpl4_medi4 = ($rsl4_medi4 / $rs_medi4) * 100;
							if($rexpl4_medi4 > 0)
							{
								$rexpls4_medi4 = $rexpl4_medi4;
							}else{
								$rexpls4_medi4 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><center><?php echo number_format($rexpls4_medi4,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi5 = mysqli_num_rows($sq_medi5);
							$sql5_medi5=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdimpcons='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl5_medi5 = mysqli_num_rows($sql5_medi5);
							$rexpl5_medi5 = ($rsl5_medi5 / $rs_medi5) * 100;
							if($rexpl5_medi5 > 0)
							{
								$rexpls5_medi5 = $rexpl5_medi5;
							}else{
								$rexpls5_medi5 = 0;
							}
					?>
					<td  style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($rexpls5_medi5,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi6 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi6 = mysqli_num_rows($sq_medi6);
							$sql6_medi6=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mediord='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi6 = mysqli_num_rows($sql6_medi6);
							$rexpl6_medi6 = ($rsl6_medi6 / $rs_medi6) * 100;
							if($rexpl6_medi6 > 0)
							{
								$rexpls6_medi6 = $rexpl6_medi6;
							}else{
								$rexpls6_medi6 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><center><?php echo number_format($rexpls6_medi6,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi7 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi7 = mysqli_num_rows($sq_medi7);
							$sql6_medi7=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_dr='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi7 = mysqli_num_rows($sql6_medi7);
							$rexpl6_medi7 = ($rsl6_medi7 / $rs_medi7) * 100;
							if($rexpl6_medi7 > 0)
							{
								$rexpls6_medi7 = $rexpl6_medi7;
							}else{
								$rexpls6_medi7 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($rexpls6_medi7,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi8 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi8 = mysqli_num_rows($sq_medi8);
							$sql6_medi8=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_nur='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi8 = mysqli_num_rows($sql6_medi8);
							$rexpl6_medi8 = ($rsl6_medi8 / $rs_medi8) * 100;
							if($rexpl6_medi8 > 0)
							{
								$rexpls6_medi8 = $rexpl6_medi8;
							}else{
								$rexpls6_medi8 = 0;
							}
					?>
					<td style="font-size: 16px;" id="ajj"><center><?php echo number_format($rexpls6_medi8,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medi9 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medi9 = mysqli_num_rows($sq_medi9);
							$sql6_medi9=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_planofcare='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medi9 = mysqli_num_rows($sql6_medi9);
							$rexpl6_medi9 = ($rsl6_medi9 / $rs_medi9) * 100;
							if($rexpl6_medi9 > 0)
							{
								$rexpls6_medi9 = $rexpl6_medi9;
							}else{
								$rexpls6_medi9 = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($rexpls6_medi9,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_media = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_media = mysqli_num_rows($sq_media);
							$sql6_media=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_screen='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_media = mysqli_num_rows($sql6_media);
							$rexpl6_media = ($rsl6_media / $rs_media) * 100;
							if($rexpl6_media > 0)
							{
								$rexpls6_media = $rexpl6_media;
							}else{
								$rexpls6_media = 0;
							}
					?>
					<td  style="font-size: 16px;" id="ajj"><center><?php echo number_format($rexpls6_media,2);?></center></td>
					<?php
						}
					?>
				</tr>
				<tr>
					<?php
						for($month = 1; $month <= 12; $month ++){
							$sq_medib = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$rs_medib = mysqli_num_rows($sq_medib);
							$sql6_medib=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_nur_careplan='Yes' AND (month(tbl_huf.huf_dddd) = '$month' AND year(tbl_huf.huf_dddd) = '$yr')");
							$rsl6_medib = mysqli_num_rows($sql6_medib);
							$rexpl6_medib = ($rsl6_medib / $rs_medib) * 100;
							if($rexpl6_medib > 0)
							{
								$rexpls6_medib = $rexpl6_medib;
							}else{
								$rexpls6_medib = 0;
							}
					?>
					<td style="background-color: #e6eeff; font-size:16px;" id="ajj"><center><?php echo number_format($rexpls6_medib,2);?></center></td>
					<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>

</table>