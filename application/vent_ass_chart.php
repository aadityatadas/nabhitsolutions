<?php
error_reporting(0);
session_start();
include('dbinfo.php');



if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Total no. of Patient on Intubation','Symptoms of Pnemonia','Positive VAP');
	
	$sq1 = "SELECT DISTINCT date(date_format(vent_dt_iuc, '%Y-%m-%d')) as date123 FROM tbl_huf WHERE vent_dt_iuc BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY vent_dt_iuc ASC";
	$rs1 = mysqli_query($connect, $sq1);
	
	 
	$sub_array1 = array();
	while($res1 = mysqli_fetch_array($rs1))
	{
       $sub_array1[]=$res1["date123"];
	}
	
	
	//for vent ass pn
	$sq2 = "SELECT DISTINCT date(date_format(vent_dt_iuc, '%Y-%m-%d')) as date123 FROM tbl_vent_ass_phmn WHERE vent_dt_iuc BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY vent_dt_iuc ASC";
	$rs2 = mysqli_query($connect, $sq2);
	
	
	$sub_array2 = array();
	while($res2 = mysqli_fetch_array($rs2))
	{
       $sub_array2[]=$res2["date123"];
	}
	

	$datearray = array_unique(array_merge($sub_array1,$sub_array2));

	
	function date_sort($a, $b) {
    	return strtotime($a) - strtotime($b);
	}
	usort($datearray, "date_sort");
    foreach ($datearray as $hufdt) 
	{

		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));

		$sql = "select huf_id, COUNT(*) as dt, SUM(vent_tcd) as ventd from tbl_huf WHERE DATE(vent_dt_iuc) = '$hufdt'";
		$query = mysqli_query($connect, $sql);
		$result = mysqli_fetch_array($query);
		
		$cnt = $result["dt"];
		$ventd = $result["ventd"];
		$sm = $ventd / $cnt;
		
		$sql2 = "select vent_dt_iuc, COUNT(*) as sympt from tbl_huf WHERE vent_sympt = 'Yes' AND  DATE(vent_dt_iuc)= '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$sympt = $result2["sympt"];
		
		$sql3 = "select vent_dt_iuc, COUNT(*) as spc from tbl_huf WHERE vent_spc = 'Yes' AND DATE(vent_dt_iuc) = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$result3 = mysqli_fetch_array($query3);
		
		$spc = $result3["spc"];

		$sql = "select tbl_huf_id, COUNT(*) as dt, SUM(vent_tcd) as ventd from tbl_vent_ass_phmn WHERE DATE(vent_dt_iuc) = '$hufdt'";
		$query = mysqli_query($connect, $sql);
		$result = mysqli_fetch_array($query);
		
		$cnt += $result["dt"];
		// $ventd = $result["ventd"];
		// $sm = $ventd / $cnt;
		
		$sql2 = "select vent_dt_iuc, COUNT(*) as sympt from tbl_vent_ass_phmn WHERE vent_sympt = 'Yes' AND  DATE(vent_dt_iuc)= '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$sympt += $result2["sympt"];
		
		$sql3 = "select vent_dt_iuc, COUNT(*) as spc from tbl_vent_ass_phmn WHERE vent_spc = 'Yes' AND DATE(vent_dt_iuc) = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$result3 = mysqli_fetch_array($query3);
		
		$spc += $result3["spc"];
			
		$data[] = array($admdt,(int)$cnt,(int)$sympt,(int)$spc);

	}	

	//	$data = array($data);			
	echo json_encode($data);
}	
?>
