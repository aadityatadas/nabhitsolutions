<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Return To OT','Rescheduling of Surgery Done','Anesthetia Given','Rexploration Done','Planned Intraoperatively','Total No. Of Surgery');
	
	$query = "SELECT DISTINCT date(senti_dt_surg_dn) as dat FROM tbl_senti_det WHERE date(senti_dt_surg_dn) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY senti_dt_surg_dn ASC";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$dat = $row["dat"];
		$cdat1 = str_replace('-', '/', $dat);
		$admdt = date('d M y', strtotime($cdat1));
		
		$query1 = "SELECT senti_unpl_ret_ot, count(*) as vid FROM tbl_senti_det WHERE senti_unpl_ret_ot = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$result1 = mysqli_query($connect, $query1);
		$row1 = mysqli_fetch_array($result1);
		$vid = $row1["vid"];
								
		$query2 = "SELECT senti_resch_surg_dn, count(*) as spc FROM tbl_senti_det WHERE senti_resch_surg_dn = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$result2 = mysqli_query($connect, $query2);
		$row2 = mysqli_fetch_array($result2);
		$spc = $row2["spc"];
								
		$qry3 = "SELECT senti_tp_ans_gv, count(*) as spc3 FROM tbl_senti_det WHERE senti_tp_ans_gv != '' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res3 = mysqli_query($connect, $qry3);
		$row3 = mysqli_fetch_array($res3);
		$spc3 = $row3["spc3"];
								
		$qry4 = "SELECT senti_rexpl, count(*) as spc4 FROM tbl_senti_det WHERE senti_rexpl = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res4 = mysqli_query($connect, $qry4);
		$row4 = mysqli_fetch_array($res4);
		$spc4 = $row4["spc4"];
								
		$qry5 = "SELECT senti_chng_surg_pl_int, count(*) as spc5 FROM tbl_senti_det WHERE senti_chng_surg_pl_int = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res5 = mysqli_query($connect, $qry5);
		$row5 = mysqli_fetch_array($res5);
		$spc5 = $row5["spc5"];
		
		$qry6 = "SELECT senti_det_id, count(*) as spc6 FROM tbl_senti_det WHERE date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res6 = mysqli_query($connect, $qry6);
		$row6 = mysqli_fetch_array($res6);
		$spc6 = $row6["spc6"];
			
		$data[] = array($admdt,(int)$vid,(int)$spc,(int)$spc3,(int)$spc4,(int)$spc5,(int)$spc6);	  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
