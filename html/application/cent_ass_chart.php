
<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Total No.Of Central Line Days','Symptoms of BSI','CLABSI');
	
	$sqq = "SELECT DISTINCT date(cent_bs_dticlc) as dt FROM tbl_huf WHERE date(cent_bs_dticlc) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY cent_bs_dticlc ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$sql = mysqli_query($connect,"select SUM(cent_bs_tcld) as ventd from tbl_huf WHERE date(cent_bs_dticlc) = '$hufdt'");
		$query =  mysqli_fetch_assoc($sql);
		$clacnt = $query["ventd"];
		
		$sql2 = "SELECT cent_bs_symp FROM tbl_huf WHERE cent_bs_symp = 'Yes' AND date(cent_bs_dticlc) = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$symp = mysqli_num_rows($query2);
		
		//$symp = $result2["symp"];
		
		$sql3 = "SELECT cent_bs_clabsi FROM tbl_huf WHERE cent_bs_clabsi = 'Yes' AND date(cent_bs_dticlc) = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$clabsi = mysqli_num_rows($query3);
		
		//$spc = $result3["spc"];
			
		$data[] = array($admdt,(int)$clacnt,(int)$symp,(int)$clabsi);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>