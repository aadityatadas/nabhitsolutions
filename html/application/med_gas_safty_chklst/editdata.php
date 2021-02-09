<?php
   include"../dbinfo.php";
   $id=$_GET['id'];
	$qry = "SELECT * FROM `tbl_med_gas_safty_chklst` WHERE `med_gas_safty_chklst_id`='$id'";
		$res = mysqli_query($connect, $qry);
		$mem=mysqli_fetch_array($res);
		$count = $res->num_rows;



        $row[0]= 'stock_book_mantan' ;
		$row[1]= 'log_cynlr' ;
		$row[2]= 'presur_chkd_daily' ;
		$row[3]= 'emply_cylndr' ;
		$row[4]= 'labl_full' ;
		$row[5]= 'all_cylndr_strchr' ;
		$row[6]= 'msds_each_dep' ;
		$row[7]= 'safty_condtn' ;
		$row[8]= 'med_gas_pipe_schld' ;
		$row[9]= 'gas_main_lock' ;



		$rowHead[0]= ' Stock Book Of medical gases is being Maintained' ;
		$rowHead[1]= ' Log is displayed in each cylender' ;
		$rowHead[2]= 'Pressure has been checked daily' ;
		$rowHead[3]= ' Empty cylenders area labelled are Empty & filled Cylinder' ;
		$rowHead[4]= 'labelled are full' ;
		$rowHead[5]= ' All Crah cart shall be  with filed O2 cylinder including stretcher' ;
		$rowHead[6]= 'MSDS has been maintained By each department' ;
		$rowHead[7]= 'Safety wall & leakage alarms are in working condition' ;
		$rowHead[8]= 'Medical gas pipe line is properly color coded & Maintained /PMS Report / PMS Schedule' ;
		$rowHead[9]= ' Gas mainifold are properly secured with safety sinages of No smoking , Safety cylinders needs to be secured with chain & lock' ;


?>


	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; text-align: center;}
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

