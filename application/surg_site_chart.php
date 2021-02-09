<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Symptoms of SSI','Positive For SSI','Total no. of Surgery');
	
	$sqq = "SELECT DISTINCT date(surg_dtos) as dt FROM tbl_huf WHERE date(surg_dtos) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY surg_dtos ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql2 = "SELECT surg_symp, COUNT(*) as ssi FROM tbl_huf WHERE surg_symp = 'Yes' AND date(surg_dtos) = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$ssi = $result2["ssi"];
		
		$sql3 = "SELECT surg_sp_ssi, COUNT(*) as pssi FROM tbl_huf WHERE surg_sp_ssi = 'Yes' AND date(surg_dtos) = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$result3 = mysqli_fetch_array($query3);
		
		$pssi = $result3["pssi"];
		
		$qry = "SELECT COUNT(huf_id) as hid FROM tbl_huf WHERE date(surg_dtos) = '$hufdt' ORDER BY huf_id ASC";
		$sr = mysqli_query($connect, $qry);
		$srr = mysqli_fetch_array($sr);
		$hid = $srr["hid"];
			
		$data[] = array($admdt,(int)$ssi,(int)$pssi,(int)$hid);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
