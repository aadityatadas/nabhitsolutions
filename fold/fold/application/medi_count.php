<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";	
?>
<div class="col-lg-12">
	<div class="col-lg-8" style="padding-left:0;">
		<table class="table table-bordered">
			<tr>
				<td style="text-align:left;" width="80%">% of Missing Records (Total No. of missing records/Total no of MRD generated in the month*100)</td>
				<?php
					$sql="SELECT medi_mrdav, COUNT(*) AS mred FROM tbl_medi_indi WHERE medi_mrdav='Missing'";
					$qry=$connect->query($sql);
					$row=$qry->fetch_array();
					$rexpl = ($row['mred'] / $surg) * 100;
				?>
				<td width="20%"><?php echo $rexpl;?>&nbsp;%</td>				
			</tr>			
		</table>
	</div>  
</div>  