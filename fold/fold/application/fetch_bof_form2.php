<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"dbinfo.php";
	if(isset($_POST["frdt"],$_POST["todt"]))  
{
	$frdate = mysqli_real_escape_string($connect, $_POST["frdt"]);
	$todate = mysqli_real_escape_string($connect, $_POST["todt"]);
	
	$output = '';
	$s = mysqli_query($connect,"SELECT * FROM tbl_huf ")or die(mysqli_error($connect));
	$cnt2 = mysqli_num_rows($s);
	$s3 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE huf_ddd != ''")or die(mysqli_error($connect));
	$cnt3 = mysqli_num_rows($s3);
	
	$s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm < '$todate' OR huf_dadm = '$todate') AND huf_ddd = ''")or die(mysqli_error($connect));
	$cnt4 = mysqli_num_rows($s4);
	
	$sq = "SELECT * FROM tbl_huf WHERE huf_dadm BETWEEN '$frdate' AND '$todate' ORDER BY huf_dadm ASC";
	$result = mysqli_query($connect, $sq);
	if(mysqli_num_rows($result) > 0)  
		{  
			$cn=1;
			$cnt = mysqli_num_rows($result);
			while($rs = mysqli_fetch_array($result))
			{
				$output .= '  
					<tr>
						<td style="text-align:center;">'. $cn++ .'</td>
						<td>'. ucwords($rs["huf_pname"]) .'</td>
						<td>'. $rs["huf_uhid"] .'</td>
						<td>'. $rs["huf_ipd"] .'</td>
						<td>'. $rs["huf_dadm"] .'</td>
						<td>'. $rs["huf_ddd"] .'</td>
						<td>'. $rs["huf_dddd"] .'</td>
						<td>'. $rs["huf_lens"] .'</td>
					</tr>
				';
					$bed = 100;
					$tot = $bed-$cnt4;
			}
				
				$output .= '  
					<tr>
						<td colspan="2" style="text-align:right;">Total No. of Patient ['.$cnt2.']</td>
						<td colspan="2" style="text-align:right;">Total No. of Discharge/Dama/Death ['.$cnt3.']</td>
						<td colspan="2" style="text-align:right;">Total No. of Operational Bed Available ['.$tot.']</td>
						<td></td>
						<td></td>
					</tr>
				';
		}
		echo $output;  
}
?>