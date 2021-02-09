<?php
   include"../dbinfo.php";
   $id=$_GET['id'];
	$qry = "SELECT * FROM `tbl_bio_sfty_chklst` WHERE `bio_sfty_chklst_id`='$id'";
		$res = mysqli_query($connect, $qry);
		$mem=mysqli_fetch_array($res);
		$count = $res->num_rows;



        $row[0]= 'bmw_dus_bins';
		$row[1]= 'punctr_prof_contanr';
		$row[2]= 'bllod_spillgage';
		$row[3]= 'ppe_prctn';
		$row[4]= 'central_biomtrc_avalbl';
		$row[5]= 'needle_prick_gudline';
		$row[6]= 'staff_prcution';
		$row[7]= 'staff_hepatitis';





		$rowHead[0]= ' BMW Dust Bins shall be available in all patient care areas with labelled Bio- safet sticker/ and covered';
		$rowHead[1]= ' Puncture Proof container shall be used to discard needles';
		$rowHead[2]= ' Bllod spillage kits shall be available for any spillgage.';
		$rowHead[3]= ' PPE shall be available and used for protection.';
		$rowHead[4]= 'Central Biomedical area shall have weighing machine. It shall be restricted/fenced/secured with bio safety signage. Rubber hard gloves and gum boot shall be available. ';
		$rowHead[5]= ' Needle prick injury prevention and exposure safety guidelines poster shall be displayed including do not recap guidelines.';
		$rowHead[6]= ' Staff shall be trained on biosafety and universal precautions.';
		$rowHead[7]= ' Staff shall be immunized for hepatitis.';




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
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Medical Gas safety</font></b></td>
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

