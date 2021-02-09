<?php
include('dbinfo.php');

if(isset($_POST["user_id"]))
{
	$sq="DELETE FROM tbl_huf WHERE huf_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq);
	$sq1="DELETE FROM tbl_blood_fusion WHERE huf_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq1);
	$sq2="DELETE FROM tbl_care_evt WHERE huf_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq2);
	$sq3="DELETE FROM tbl_medi_indi WHERE huf_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq3);
	$sq4="DELETE FROM tbl_senti_det WHERE huf_id = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq4);
	$sq5="DELETE FROM tbl_ipd WHERE ipdid = '".$_POST["user_id"]."'";
	mysqli_query($connect,$sq5);
	
	echo 'Details Are Deleted Successfully';	
}
?>