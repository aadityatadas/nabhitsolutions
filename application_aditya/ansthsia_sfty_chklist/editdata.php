<?php
   include"../dbinfo.php";
   $id=$_GET['id'];
	$qry = "SELECT * FROM `tbl_ansthsia_chklst` WHERE `ansthsia_chklst_id`='$id'";
		$res = mysqli_query($connect, $qry);
		$mem=mysqli_fetch_array($res);
		$count = $res->num_rows;
	

        $row[0]= 'surg_sfty_implnt' ;
		$row[1]= 'pre_ope_ans_clfscn' ;
		$row[2]= 'pac_done_24_hrs' ;
		$row[3]= 'imm_pre_documt' ;
		$row[4]= 'peri_ans_evnt' ;
		$row[5]= 'anst_machin_equpmnt' ;
		$row[6]= 'anst_drug_rectn' ;
		$row[7]= 'anst_advrse_ade' ;
		$row[8]= 'post_anst_trnsfr' ;
		$row[9]= 'anst_const_risk' ;


		$rowHead[0]= ' Surgical safety checklist is filled identifying right Patient, Right Procedure, right site/side & Right implant' ;
		$rowHead[1]= ' Pre-operative Anesthesia checklist filled before sending patient to OT with ASA scoring & mallampatti clasification' ;
		$rowHead[2]= 'PAC is done & high risk are identified anesthesia care plan is derived & documented Before 24 hrs ' ;
		$rowHead[3]= ' Immediate Pre-op reevaluation is done & documented' ;
		$rowHead[4]= 'Peri-anesthesia recording are documented including events (  compulsorily write uneventful if no event)' ;
		$rowHead[5]= ' Anesthesia machine checks are done ensuring proper working of alarms,valves, meter, Monitors, intubation equipments.' ;
		$rowHead[6]= '7. Anesthesia drug are properly infused as per plan including recording of any anesthesia drug related reaction' ;
		$rowHead[7]= 'Anesthesia adverse events are reported & recorded like sudden death, unplanned ventilation, ADE . ' ;
		$rowHead[8]= ' Post anesthesia recovery charting is done & ALDREATE scoring is followed for transfer' ;
		$rowHead[9]= ' Anesthesia consent shall be taken before giving anesthesia/ high risk consent shall be taken if patient is High risk.' ;
   



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
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#337ab7"><b><font color="#000000">Anesthesia safety Cheklist</font></b></td>
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

