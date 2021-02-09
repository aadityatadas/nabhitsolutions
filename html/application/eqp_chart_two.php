<?php
error_reporting(0);
session_start();
include('dbinfo.php');
$month = date('m');
$yr = date('Y');
$_POST["frdate"]= '2019-07-01';
$_POST["todate"]='2019-07-31';
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Equipment Name','Breakdown Time');

	
	$admdt = $_POST["frdate"].' - '.$_POST["todate"];
	
	$qs = mysqli_query($connect,"SELECT DISTINCT eqpid FROM tbl_eqp_indic ORDER BY eqp_id ASC")or die(mysqli_error($connect));
	while($sq = mysqli_fetch_array($qs))
	{
		
		$qid = $sq["eqpid"];
		$treq = 0;
		$trec = 0;
		$sql = mysqli_query($connect,"SELECT eqp_dtbr, eqp_tmbr, eqp_dtrp, eqp_tmrp FROM tbl_eqp_indic WHERE eqpid = '$qid' AND (eqp_dtbr BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."')")or die(mysqli_error($connect));
		while($rw = mysqli_fetch_array($sql))
		{	

			$dtbr = $rw["eqp_dtbr"].' '.$rw["eqp_tmbr"];
			$dtrp = $rw["eqp_dtrp"].' '.$rw["eqp_tmrp"];
			$req = strtotime($dtbr);
			$treq = $treq + $req;
			$rec = strtotime($dtrp);
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
		$sql1 = mysqli_query($connect,"SELECT * FROM tbl_eqp_indic")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($sql1);
		$min = $ht_mi / $rs;
		if($ht_mi > 0)
		{
			$mineqp = $ht_mi;
		}else{
			$mineqp = 0;
		}
		$q = mysqli_fetch_assoc(mysqli_query($connect,"SELECT eqp_name FROM tbl_eqp_mast WHERE eqpid = '$qid'"))or die(mysqli_error($connect));
		$eqpname = ucwords($q["eqp_name"]);
		
		$data[] = array($eqpname,(float)$mineqp);	
	}	
	//	$data = array($data);
	
	echo json_encode($data);
}	
?>
