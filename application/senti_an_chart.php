<?php
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','PAC Done','Anesthetia Plan','Unplanned Ventilator After Anesthetia','Adverse Anesthetia Event');
	
	$query2 = "SELECT DISTINCT date(senti_dt_surg_dn) as dat FROM tbl_senti_det WHERE date(senti_dt_surg_dn) BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY senti_dt_surg_dn ASC";
	$result2 = mysqli_query($connect, $query2);
	while($row = mysqli_fetch_array($result2))
	{
		$dat = $row["dat"];
		$cdat1 = str_replace('-', '/', $dat);
		$admdt = date('d M y', strtotime($cdat1));
		
		$qry7 = "SELECT senti_pacdn, count(*) as vid FROM tbl_senti_det WHERE senti_pacdn = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res7 = mysqli_query($connect, $qry7);
		$row7 = mysqli_fetch_array($res7);
		$vid = $row7["vid"];
		
		$qry8 = "SELECT senti_mod_anspl, count(*) as spc FROM tbl_senti_det WHERE senti_mod_anspl = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res8 = mysqli_query($connect, $qry8);
		$row8 = mysqli_fetch_array($res8);
		$spc = $row8["spc"];
								
		$qry9 = "SELECT senti_unp_vent_aft_ans, count(*) as spc3 FROM tbl_senti_det WHERE senti_unp_vent_aft_ans = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res9 = mysqli_query($connect, $qry9);
		$row9 = mysqli_fetch_array($res9);
		$spc3 = $row9["spc3"];
								
		$qry10 = "SELECT senti_any_adv_ans_evt, count(*) as spc4 FROM tbl_senti_det WHERE senti_any_adv_ans_evt = 'Yes' AND date(senti_dt_surg_dn) = '".$row["dat"]."'";
		$res10 = mysqli_query($connect, $qry10);
		$row10 = mysqli_fetch_array($res10);
		$spc4 = $row10["spc4"];	
		
			
		$data[] = array($admdt,(int)$vid,(int)$spc,(int)$spc3,(int)$spc4);	 		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
