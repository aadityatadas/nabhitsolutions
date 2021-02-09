<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Investigated','Prophylaxix Given');
	
	$sqq = "SELECT DISTINCT date(needp_dttm) as dt FROM tbl_need_pif WHERE date(needp_dttm) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY needp_dttm ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql2 = "SELECT needp_wh_inv, COUNT(*) as inv FROM tbl_need_pif WHERE needp_wh_inv = 'Yes' AND date(needp_dttm) = '$hufdt'";
		$query2 = mysqli_query($connect, $sql2);
		$result2 = mysqli_fetch_array($query2);
		
		$inv = $result2["inv"];
		
		$sql3 = "SELECT needp_wh_prop, COUNT(*) as prop FROM tbl_need_pif WHERE needp_wh_prop = 'Yes' AND date(needp_dttm) = '$hufdt'";
		$query3 = mysqli_query($connect, $sql3);
		$result3 = mysqli_fetch_array($query3);
		
		$prop = $result3["prop"];
			
		$data[] = array($admdt,(int)$inv,(int)$prop);	  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
