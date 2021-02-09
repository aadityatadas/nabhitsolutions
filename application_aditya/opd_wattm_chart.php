<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Total No. of OPDs');
	
	$sqq = "SELECT DISTINCT date(opdwttm_dttmr) as dt FROM tbl_opdwttm WHERE date(opdwttm_dttmr) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY opdwttm_dttmr ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql2 = "SELECT SUM(opdwttm_opdwttm) as wttm FROM tbl_opdwttm WHERE date(opdwttm_dttmr) = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$wttm = $result2["wttm"];
		
		$sq=mysqli_query($connect,"SELECT opdwttm_id FROM tbl_opdwttm WHERE date(opdwttm_dttmr) = '$hufdt'");
		$cnt= mysqli_num_rows($sq);
		//$result3 = mysqli_fetch_array($qs);
		//$cnt = $result3["wdt"];
		
		$wtm_avg = $wttm / $cnt;
		$wtmavg = number_format($wtm_avg,2);
		
		$data[] = array($admdt,(int)$cnt);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
