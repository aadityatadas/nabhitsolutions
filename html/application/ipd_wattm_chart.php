<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','IPD Patient','Waiting Time');
	
	$sqq = "SELECT DISTINCT date(wttm_dttmr) as dt FROM tbl_huf WHERE date(wttm_dttmr) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY wttm_dttmr ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql2 = "SELECT SUM(wttm_opdwttm) as wttm FROM tbl_huf WHERE date(wttm_dttmr) = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$wttm = $result2["wttm"];
		
		$sq="SELECT huf_id, COUNT(*) as wdt FROM tbl_huf WHERE date(wttm_dttmr) = '$hufdt'";
		$qs=mysqli_query($connect, $sq);
		$result3 = mysqli_fetch_array($qs);
		$cnt = $result3["wdt"];
		
		$wtm_avg = $wttm / $cnt;
		
		$data[] = array($admdt,(int)$cnt, (float)$wtm_avg);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
