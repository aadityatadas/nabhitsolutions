<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Total no. of Patient on Intubation','Symptoms of Pnemonia','Positive VAP');
	
	$sq = "SELECT DISTINCT vent_dt_iuc FROM tbl_huf WHERE vent_dt_iuc BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY vent_dt_iuc ASC";
	$rs = mysqli_query($connect, $sq);
	while($res = mysqli_fetch_array($rs))
	{
		$hufdt = $res["vent_dt_iuc"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql = "select huf_id, COUNT(*) as dt, SUM(vent_tcd) as ventd from tbl_huf WHERE vent_dt_iuc = '$hufdt'";
		$query = mysqli_query($connect, $sql);
		$result = mysqli_fetch_array($query);
		
		$cnt = $result["dt"];
		$ventd = $result["ventd"];
		$sm = $ventd / $cnt;
		
		$sql2 = "select vent_dt_iuc, COUNT(*) as sympt from tbl_huf WHERE vent_sympt = 'Yes' AND vent_dt_iuc = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$sympt = $result2["sympt"];
		
		$sql3 = "select vent_dt_iuc, COUNT(*) as spc from tbl_huf WHERE vent_spc = 'Yes' AND vent_dt_iuc = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$result3 = mysqli_fetch_array($query3);
		
		$spc = $result3["spc"];
			
		$data[] = array($admdt,(int)$cnt,(int)$sympt,(int)$spc);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
