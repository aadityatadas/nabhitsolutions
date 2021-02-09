<?php
   include"../dbinfo.php";
   include"headings.php";
   
   $id=$_GET['id'];
	$qry = "SELECT * FROM `tbl_biomedicaleqip_sfty_chklst` WHERE `biomedicaleqip_sfty_chklst_id`='$id'";
		$res = mysqli_query($connect, $qry);
		$mem=mysqli_fetch_array($res);
		$count = $res->num_rows;
	

        $row[0]= 'list_upted_tag';
		$row[1]= 'critical_bio_equmnt';
		$row[2]= 'prvintv_maintce_reports';
		$row[3]= 'calibratn_reports';
		$row[4]= 'breakdown_equpment';
		$row[5]= 'dos_dont_precution';
		$row[6]= 'emrgncy_alarm';
		$row[7]= 'intrnl_extrnl_repots';
		$row[8]= 'all_wires_use';
		$row[9]= 'qualified_biomedcl_checks';





   



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
<table cellspacing="0" border="0" class="table-show">
	
	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="40" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">SR. NO</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Bio-Medical Equipment Safety checklist</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 50px;" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Yes/No/NA</font></b></td>
		<!-- <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFC000"><b><font color="#000000">N/A</font></b></td> -->
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 50px;" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Location</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding: 50px;" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Remark</font></b></td>
	</tr>

	<?php $a=1; for($i=0;$i<10;$i++){ ?>

       	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><font color="#000000"><?=$a++?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font color="#000000"><?=$rowHead[$i] ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font color="#000000"><?= $mem[$row[$i].'_yn'] ?></font></td>

		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font color="#000000"><?= $mem[$row[$i].'_loc'] ?></font></td>

		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" width="50px"  valign=bottom><font color="#000000"><br></font><?= $mem[$row[$i].'_rmrk']?></td>
	</tr>
       
      <?php }  ?>
	
</table>
<!-- ************************************************************************** -->
<h4>Name :  <u><?= $mem['name']?></u></h4>
</div>

