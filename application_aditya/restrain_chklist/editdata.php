<?php
   include"../dbinfo.php";
   $id=$_GET['id'];
	$qry = "SELECT * FROM `tbl_restrain_chklst` WHERE `restrain_chklst_id`='$id'";
		$res = mysqli_query($connect, $qry);
		$mem=mysqli_fetch_array($res);
		
	

        $row[0]= 'vuln_patnt_only' ;
        $row[1]= 'pink_colr_patnt' ;
         $row[2]= 'restrain_order_only' ;
          $row[3]= 'restrain_consent_only' ;
          $row[4]= 'ties_kont_10min' ;
        $row[5]= 'chemical' ;


		$rowHead [0] ='Vulnerable Patients are identified during admission only ';
        $rowHead [1] ='Pink color band  are provided for categorising vulnerable patient';
        $rowHead [2] ='Restraint Orders are followed for physical & chemical restraint vaild for 24 hrs only';
       $rowHead [3] =' Restraint consent shall be taken & valid for 24 hrs only';
        $rowHead [4] =' Ties & knots are to be checked after 4 hrs and release for 10 min';
        $rowHead [5] ='Chemical restraint shall follow the sedation policy';




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

	<?php $a=1; for($i=0;$i<6;$i++){ ?>

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

