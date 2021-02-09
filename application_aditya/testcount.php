
<?php
include('dbinfo.php');

$qry = "SELECT COUNT(*) as total FROM tbl_huf";
	$res = mysqli_query($connect, $qry);
	$row=mysqli_fetch_assoc($res);
	echo $row['total'];

	$qrydis = "SELECT COUNT(*) as discharge FROM tbl_huf WHERE huf_ddd='Discharge'";
															$resdis = mysqli_query($connect, $qrydis);
															$rowdis=mysqli_fetch_assoc($resdis);
															echo $rowdis['discharge'];

	$qrynotdis = "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE huf_ddd='Death' OR huf_ddd='DAMA' OR huf_ddd=' ' ";
															$resnotdis = mysqli_query($connect, $qrynotdis);
															$rownotdis=mysqli_fetch_assoc($resnotdis);
															echo $rownotdis['notdischarge'];

    // $qrynotdis = "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE huf_ddd='DAMA'";
				// 											$resnotdis = mysqli_query($connect, $qrynotdis);
				// 											$rownotdis=mysqli_fetch_assoc(	$resnotdis );
				// 											echo $rownotdis['notdischarge'];
    // $qrynotdis = "SELECT COUNT(*) as notdischarge FROM tbl_huf WHERE huf_ddd=' '";
				// 											$resnotdis = mysqli_query($connect, $qrynotdis);
				// 											$rownotdis=mysqli_fetch_assoc(	$resnotdis );
				// 											echo $rownotdis['notdischarge'];


?>
