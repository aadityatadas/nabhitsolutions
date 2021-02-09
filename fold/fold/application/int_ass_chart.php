<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Discharge');
	
	$sq = "SELECT DISTINCT int_ddd FROM tbl_huf WHERE date(int_ddd) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY int_ddd ASC";
	$rs = mysqli_query($connect, $sq);
	while($res = mysqli_fetch_array($rs))
	{
		$hufdt = $res["int_ddd"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
			
		$sql = "select int_tottm from tbl_huf WHERE date(int_ddd) = '$hufdt'";
		$query = mysqli_query($connect, $sql);
		while($result = mysqli_fetch_array($query))
		{
			$totm = number_format($result["int_tottm"],2);
			
		}
		$tottm = $tottm + $totm;				
		$data[] = array($admdt,(int)$tottm);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
