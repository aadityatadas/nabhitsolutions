<?php
error_reporting(0);
session_start();
include('dbinfo.php');
if(isset($_POST["frdate"],$_POST["todate"]))
{
	$data[] = array('Date','Thromboplebtis Rate','Hematoma Rate','Bed Score Rate','Patient Fall Rate','Accidental Removal of Drains and Lines Rate','Injury to Patient Rate');
	
	$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (huf_dadm BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."') AND (huf_dddd BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."')")or die(mysqli_error($connect));
	$res = mysqli_fetch_assoc($qry);
	$i_count = $res["std"];
	
	$sqq = "SELECT DISTINCT care_dtpli as dt FROM tbl_care_evt WHERE care_dtpli BETWEEN '".$_POST["frdate"]."' AND '".$_POST["todate"]."' ORDER BY care_dtpli ASC";
	$rss = mysqli_query($connect, $sqq);
	while($ress = mysqli_fetch_array($rss))
	{
		$hufdt = $ress["dt"];
		$cdat1 = str_replace('-', '/', $hufdt);
		$admdt = date('d M y', strtotime($cdat1));
		
		$qry2 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE care_dtpli = '$hufdt' AND care_signsymp_th = 'Yes'")or die(mysqli_error($connect));
		$thromb = mysqli_num_rows($qry2);
		$res_thromb = ($thromb / $i_count) * 1000;
		$on = number_format($res_thromb,2);
		
		$qry3 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE care_dtpli = '$hufdt' AND care_signsymp = 'Yes'")or die(mysqli_error($connect));
		$hema = mysqli_num_rows($qry3);
		$res_hema = ($hema / $i_count) * 1000;
		$tw = number_format($res_hema,2);

		$qry4 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE care_dtpli = '$hufdt' AND care_signsyp_bed = 'Yes'")or die(mysqli_error($connect));
		$bed = mysqli_num_rows($qry4);
		$res_bed = ($bed / $i_count) * 1000;
		$th = number_format($res_bed,2);
		
		$qry5 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE care_dtpli = '$hufdt' AND care_incd_ptfall = 'Yes'")or die(mysqli_error($connect));
		$ptf = mysqli_num_rows($qry5);
		$res_ptf = ($ptf / $i_count) * 1000;
		$fr = number_format($res_ptf,2);
		
		$qry6 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE care_dtpli = '$hufdt' AND care_iardl = 'Yes'")or die(mysqli_error($connect));
		$rdl = mysqli_num_rows($qry6);
		$res_rdl = ($rdl / $i_count) * 1000;
		$fv = number_format($res_rdl,2);
		
		$qry7 = mysqli_query($connect,"SELECT care_id FROM tbl_care_evt WHERE care_dtpli = '$hufdt' AND care_injtpt = 'Yes'")or die(mysqli_error($connect));
		$ipt = mysqli_num_rows($qry7);
		$res_ipt = ($ipt / $i_count) * 1000;
		$sx = number_format($res_ipt,2);
			
		$data[] = array($admdt,(float)$on,(float)$tw,(float)$th,(float)$fr,(float)$fv,(float)$sx);		  
		
	}
	//	$data = array($data);			
	echo json_encode($data);
}	
?>
