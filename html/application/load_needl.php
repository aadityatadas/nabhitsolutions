<?php
include"dbinfo.php";
$qry = "SELECT needp_id FROM tbl_need_pif ORDER BY needp_id DESC";
$res = mysqli_query($connect, $qry);
$row=mysqli_fetch_array($res);
$id = $row['needp_id'];
$cid = $id+1;
?>
<input type="text" name="sr_no" id="sr_no" value="<?php echo $cid;?>" class="form-control" readonly />