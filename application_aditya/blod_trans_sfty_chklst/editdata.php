<?php
   include"../dbinfo.php";
   $id=$_GET['id'];
	$qry = "SELECT * FROM `tbl_blod_trans_safty_chklst` WHERE `blod_trans_safty_chklst_id`='$id'";
		$res = mysqli_query($connect, $qry);
		$mem=mysqli_fetch_array($res);
		$count = $res->num_rows;



        $row[0]= 'blod_grup_done';
		$row[1]= 'blod_rqust_reqsion';
		$row[2]= 'trans_obtained';
		$row[3]= 'tat_strg_condtn';
		$row[4]= 'after_recvg_blod_bag';
		$row[5]= 'blod_trans_monit_form';
		$row[6]= 'blod_trans_rectn';
		$row[7]= 'emtpy_bloodbag_soltn';





		$rowHead[0]= ' Blood grouping & crossmatching shall be done ';
$rowHead[1]= 'Blood has to be requested after valid requision only';
$rowHead[2]= 'Transfusion consent has to be obtained';
$rowHead[3]= 'TAT of Blood receiving has to be maintained ( including storage condition';
$rowHead[4]= 'After receiving blood bags the Medical officer has to check & certify for use';
$rowHead[5]= ' blood Transfusion is administrr by Medical officer & monitored by Nurse by every 15 mins / Blood transfusion monitoring form ';
$rowHead[6]= 'Blood transfusion reaction has to be observed & reported immediatly / blood transfusion reaction form to be filled if any( The remaining blood has to be return to outsourced blood bank)';
$rowHead[7]= ' Empty bloodbag has to be discarded in red color bag with infusion of 10 ml concentrated hypochlorite solution( Never store blood bags in the hospital';



?>


	
	<style type="text/css">
		/*body,div,table,thead,tbody,tfoot,tr,th,td,p {  }*/
	     .table-show,table,thead,tbody,tfoot,tr,th,td {
	     	text-align: center;
	     	font-family:"Calibri";
	     }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 

	</style>

<div class="table-responsive"> 
<table cellspacing="0" border="0">
	
	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="40" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">SR. NO</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Blood Transfusion safety checklist</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 50px;" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Yes/No/NA</font></b></td>
		<!-- <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFC000"><b><font color="#000000">N/A</font></b></td> -->
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 50px;" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Location</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 50px;" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Remark</font></b></td>
	</tr>

	<?php $a=1; for($i=0;$i< count($rowHead);$i++){ ?>

       	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><font color="#000000"><?=$a++?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font color="#000000"><?=$rowHead[$i] ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font color="#000000"><?= $mem[$row[$i].'_yn'] ?></font></td>

		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font color="#000000"><?= $mem[$row[$i].'_loc'] ?></font></td>

		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" width="50px"  valign=middle><font color="#000000"><br></font><?= $mem[$row[$i].'_rmrk']?></td>
	</tr>
       
      <?php }  ?>
		
	
</table>
<!-- ************************************************************************** -->
<h4>Name :  <u><?= $mem['name']?></u></h4>
</div>

