<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";	
	$fdt = date('Y-m-01');
	$tdt = date('Y-m-31');
	$sq = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd BETWEEN '$fdt' AND '$tdt'")or die(mysqli_error($connect));
	$rs = mysqli_num_rows($sq);
?>
<div class="col-lg-12">
	<div class="col-lg-9" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="80%">% of Missing Records</td>
				<?php					
					$sql=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdav='Missing' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl = mysqli_num_rows($sql);
					$rexpl = ($rsl / $rs) * 100;
					if($rexpl > 0)
					{
						$rexpls = $rexpl;
					}else{
						$rexpls = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">MRD File In order as per MRD checklist </td>
				<?php					
					$sql2=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdfile='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl2 = mysqli_num_rows($sql2);
					$rexpl2 = ($rsl2 / $rs) * 100;
					if($rexpl2 > 0)
					{
						$rexpls2 = $rexpl2;
					}else{
						$rexpls2 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls2,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">MRD has Discharge Summary</td>
				<?php					
					$sql3=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrddissum='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl3 = mysqli_num_rows($sql3);
					$rexpl3 = ($rsl3 / $rs) * 100;
					if($rexpl3 > 0)
					{
						$rexpls3 = $rexpl3;
					}else{
						$rexpls3 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls3,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">MRD has codification as per ICD</td>
				<?php					
					$sql4=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdicd='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl4 = mysqli_num_rows($sql4);
					$rexpl4 = ($rsl4 / $rs) * 100;
					if($rexpl4 > 0)
					{
						$rexpls4 = $rexpl4;
					}else{
						$rexpls4 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls4,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">MRD has incomplete or Improper Consent</td>
				<?php					
					$sql5=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrdimpcons='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl5 = mysqli_num_rows($sql5);
					$rexpl5 = ($rsl5 / $rs) * 100;
					if($rexpl5 > 0)
					{
						$rexpls5 = $rexpl5;
					}else{
						$rexpls5 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls5,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">Medication orders are properly written</td>
				<?php					
					$sql6=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mediord='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl6 = mysqli_num_rows($sql6);
					$rexpl6 = ($rsl6 / $rs) * 100;
					if($rexpl6 > 0)
					{
						$rexpls6 = $rexpl6;
					}else{
						$rexpls6 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls6,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">Handover Sheet of Doctors are properly filled</td>
				<?php					
					$sql7=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_dr='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl7 = mysqli_num_rows($sql7);
					$rexpl7 = ($rsl7 / $rs) * 100;
					if($rexpl7 > 0)
					{
						$rexpls7 = $rexpl7;
					}else{
						$rexpls7 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls7,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">Handover Sheet of Nurses are properly filled</td>
				<?php					
					$sql8=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_handsheet_nur='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl8 = mysqli_num_rows($sql8);
					$rexpl8 = ($rsl8 / $rs) * 100;
					if($rexpl8 > 0)
					{
						$rexpls8 = $rexpl8;
					}else{
						$rexpls8 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls8,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">The Plan of care is documented with desired outcome and countersigned by clinicians</td>
				<?php					
					$sql9=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_planofcare='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsl9 = mysqli_num_rows($sql9);
					$rexpl9 = ($rsl9 / $rs) * 100;
					if($rexpl9 > 0)
					{
						$rexpls9 = $rexpl9;
					}else{
						$rexpls9 = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexpls9,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">MRD includes screening for nutritional needs (Nutritional Assessment)</td>
				<?php					
					$sqla=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_screen='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rsla = mysqli_num_rows($sqla);
					$rexpla = ($rsla / $rs) * 100;
					if($rexpla > 0)
					{
						$rexplsa = $rexpla;
					}else{
						$rexplsa = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexplsa,2);?>&nbsp;%</td>				
			</tr>
			<tr>
				<td style="text-align:left;" width="80%">MRD Includes Nursing care plan is documented with outcome at the time of admission</td>
				<?php					
					$sqlb=mysqli_query($connect,"SELECT medi_id FROM tbl_medi_indi LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_medi_indi.huf_id WHERE tbl_medi_indi.medi_mrd_nur_careplan='Yes' AND (tbl_huf.huf_dddd BETWEEN '$fdt' AND '$tdt')");
					$rslb = mysqli_num_rows($sqlb);
					$rexplb = ($rslb / $rs) * 100;
					if($rexplb > 0)
					{
						$rexplsb = $rexplb;
					}else{
						$rexplsb = 0;
					}
				?>
				<td width="20%"><?php echo number_format($rexplsb,2);?>&nbsp;%</td>				
			</tr>
		</table>
	</div>  
</div> 