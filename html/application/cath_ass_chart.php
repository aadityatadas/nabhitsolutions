<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Total No.Of Catheter Days','Symptoms of UTI','CAUTI');
	
	$sqq = "SELECT DISTINCT date(cath_uti_iuc) as dt FROM tbl_huf WHERE date(cath_uti_iuc) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY cath_uti_iuc ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$sql = mysqli_query($connect,"select SUM(cath_uti_tcd) as ventd from tbl_huf WHERE date(cath_uti_iuc) = '$hufdt'");
		$query =  mysqli_fetch_assoc($sql);
		$ventd = $query["ventd"];
		
		$sql2 = "SELECT cath_uti_symp FROM tbl_huf WHERE cath_uti_symp = 'Yes' AND date(cath_uti_iuc) = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$symp = mysqli_num_rows($query2);
		
		//$symp = $result2["symp"];
		
		$sql3 = "SELECT cath_uti_spc FROM tbl_huf WHERE cath_uti_spc = 'Yes' AND date(cath_uti_iuc) = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$spc = mysqli_num_rows($query3);
		
		//$spc = $result3["spc"];
			
		$data[] = array($admdt,(int)$ventd,(int)$symp,(int)$spc);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
