<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','No. of Units Ordered','No. of Units Received','No. of Units Transfused','Reaction Observed');
	
	$query = "SELECT DISTINCT DATE(bld_dtrec) as dat FROM tbl_blood_fusion WHERE DATE(bld_dtrec) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY bld_dtrec ASC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$hufdt = $row["dat"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
	
		$qs = mysqli_query($connect,"SELECT SUM(bld_nounit) as uord FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'");
		$rs = mysqli_fetch_assoc($qs);
		$uord = $rs["uord"];
		
		$qr = mysqli_query($connect,"SELECT SUM(bld_norec) as urcd FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'");
		$qrs = mysqli_fetch_assoc($qr);
		$urec = $qrs["urcd"];
		
		$query1 = "SELECT SUM(bld_notrfus) as vid FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'";
		$result1 = mysqli_query($connect, $query1);
		$row1 = mysqli_fetch_array($result1);
		$vid = $row1["vid"];
							
		$query2 = mysqli_query($connect,"SELECT bld_id FROM tbl_blood_fusion WHERE bld_trfusreact = 'Yes' AND DATE(bld_dtrec) = '$hufdt'");
		
		$spc = mysqli_num_rows($query2);		
			
		$data[] = array($admdt,(int)$uord,(int)$urec,(int)$vid,(int)$spc);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
