<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','IPD Satisfaction Rating');
	
	$sqq = "SELECT DISTINCT date(wttm_dttmr) as dt FROM tbl_huf WHERE date(wttm_dttmr) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY wttm_dttmr ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
		$qr = mysqli_query($connect,"SELECT ipd_id FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE DATE(wttm_dttmr) = '$hufdt'")or die(mysqli_error($connect));
		$re = mysqli_num_rows($qr);
				
		$qry3 = mysqli_query($connect,"SELECT SUM(ipd_score) as score FROM tbl_ipd LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_ipd.ipdid WHERE DATE(wttm_dttmr) = '$hufdt' AND ipd_score > 0")or die(mysqli_error($connect));
		$res3 = mysqli_fetch_assoc($qry3);
		$res = $res3["score"];
		
		$tot_scor = ($res / 120 / $re) * 100;
		$resul = number_format($tot_scor,2);
		
		$data[] = array($admdt,(float)$resul);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
