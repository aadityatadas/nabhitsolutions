<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','OPD Satisfaction Rating');
	
	$sqq = "SELECT DISTINCT date(opdwttm_dttmr) as dt FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY opdwttm_dttmr ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
				
		$qry3 = mysqli_query($connect,"SELECT SUM(opd_score) as score FROM tbl_opd LEFT JOIN tbl_opdwttm ON tbl_opdwttm.opdwttm_id = tbl_opd.opdid WHERE DATE(opdwttm_dttmr) = '$hufdt' AND opd_score > 0")or die(mysqli_error($connect));
		$res3 = mysqli_fetch_assoc($qry3);
		$res = $res3["score"];
		
		$tot_scor = ($res / 120) * 100;
		$resul = number_format($tot_scor,2);
		
		$data[] = array($admdt,(float)$resul);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
