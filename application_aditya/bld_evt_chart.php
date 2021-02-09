<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Average Turn around time for Blood','% of blood transfusion reaction','% of Blood Product Wastage','% of Blood Component Usage');
	
	$query = "SELECT DISTINCT DATE(bld_dtrec) as dat FROM tbl_blood_fusion WHERE DATE(bld_dtrec) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY bld_dtrec ASC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$hufdt = $row["dat"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
		
		$sql = mysqli_query($connect,"SELECT bld_dtrec, bld_tmreq, bld_dtreq, bld_tmrec FROM tbl_blood_fusion WHERE bld_dtreq = '$hufdt'")or die(mysqli_error($connect));
		while($rw = mysqli_fetch_array($sql))
		{
			$req = strtotime($rw["bld_dtreq"].' '.$rw["bld_tmreq"]);
			$treq = $treq + $req;
			$rec = strtotime($rw["bld_dtrec"].' '.$rw["bld_tmrec"]);
			$trec = $trec + $rec;
		}
		$diff = abs($trec - $treq);
		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
					
		$hour   = floor(($diff) / (60*60)); 

		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
					
		$ht_mi = $hour.'.'.$minuts;
		$sql1 = mysqli_query($connect,"SELECT * FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($sql1);
		$min = number_format($ht_mi / $rs,2);
		
		$trf = mysqli_query($connect,"SELECT bld_id FROM tbl_blood_fusion WHERE bld_trfusreact = 'Yes' AND DATE(bld_dtrec) = '$hufdt'")or die(mysqli_error($connect));
		$rstrf = mysqli_num_rows($trf);
		$sql1 = mysqli_query($connect,"SELECT SUM(bld_notrfus) as tot FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'")or die(mysqli_error($connect));
		$rs1 = mysqli_fetch_array($sql1);
		$tot = $rs1["tot"];
		$tots = number_format(($rs / $tot) * 100,2);

		$sql4 = mysqli_query($connect,"SELECT SUM(bld_waste_det) as tot FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'")or die(mysqli_error($connect));
		$rs4 = mysqli_fetch_array($sql4);
		$tot4 = $rs4["tot"];
		$sql5 = mysqli_query($connect,"SELECT SUM(bld_norec) as tt FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'")or die(mysqli_error($connect));
		$rs5 = mysqli_fetch_array($sql5);
		$tt5 = $rs5["tt"];
		$tts5 = ($tot4 / $tt5) * 100;	
		
		$sql2 = mysqli_query($connect,"SELECT SUM(bld_norec) as norec FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'")or die(mysqli_error($connect));
		$rs2 = mysqli_fetch_array($sql2);
		$norec = $rs2["norec"];
		$sqls = mysqli_query($connect,"SELECT SUM(bld_notrfus) as notrfus FROM tbl_blood_fusion WHERE DATE(bld_dtrec) = '$hufdt'")or die(mysqli_error($connect));
		$rss = mysqli_fetch_array($sqls);
		$notrfus = $rss["notrfus"];
		$ttss = ($notrfus / $norec) * 100;
		$tst = number_format($ttss,2);
		
		$data[] = array($admdt,(float)$min,(float)$tots,(float)$tts5,(float)$tst);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
