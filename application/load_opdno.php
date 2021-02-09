<?php
include('dbinfo.php');
$qry = "SELECT opd_id FROM tbl_opd ORDER BY opd_id DESC";
$res = mysqli_query($connect, $qry);
$row=mysqli_fetch_array($res);
$id = $row['opd_id'];
$cid = $id+1;
?>
<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />