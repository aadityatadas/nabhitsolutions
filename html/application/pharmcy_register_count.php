<?php
	error_reporting(0);
	session_start();
	include"dbinfo.php";
	$frdt = date('Y-m-01');
	$todt = date('Y-m-31');

	$qryItem = mysqli_query($connect,"SELECT sum(item_no) as item_no1 FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resItem = mysqli_fetch_assoc($qryItem);
	$total_item = $resItem["item_no1"];

	$qrySold = mysqli_query($connect,"SELECT sum(quantity) as Sold_no1 FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resSold = mysqli_fetch_assoc($qrySold);
	$total_sold = $resSold["Sold_no1"];

	$qrypurchase = mysqli_query($connect,"SELECT sum(purchase_ordr) as purchase_ordr1 FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$respurchase = mysqli_fetch_assoc($qrypurchase);
	$total_purchase = $respurchase["purchase_ordr1"];

	$qryformulary = mysqli_query($connect,"SELECT sum(no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary) as formulary FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resformulary = mysqli_fetch_assoc($qryformulary);
	$total_formulary = $resformulary["formulary"];


	$qrystock_out = mysqli_query($connect,"SELECT sum(no_of_stock_out) as stock_out FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resstock_out = mysqli_fetch_assoc($qrystock_out);
	$total_no_of_stock_out = $resstock_out["stock_out"];

	$qryrejected = mysqli_query($connect,"SELECT sum(total_quantity_rejected) as rejected FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resrejected = mysqli_fetch_assoc($qryrejected);
	$total_rejected = $resrejected["rejected"];

	$qryProcurement = mysqli_query($connect,"SELECT sum(totl_num_of_variation_frm_the_defend_procument_procs) as Procurement FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resProcurement = mysqli_fetch_assoc($qryProcurement);
	$total_Procurement = $resProcurement["Procurement"];

	$qryMedication = mysqli_query($connect,"SELECT sum(medic_error) as Medication FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resMedication = mysqli_fetch_assoc($qryMedication);
	$total_Medication = $resMedication["Medication"];

	$qryNearmiss = mysqli_query($connect,"SELECT sum(near_miss_error) as Nearmiss FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resNearmiss = mysqli_fetch_assoc($qryNearmiss);
	$total_Nearmiss = $resNearmiss["Nearmiss"];


$qryadverse = mysqli_query($connect,"SELECT sum(advrse_drug_event) as adverse FROM tbl_pharmcy_register WHERE (vendor BETWEEN '$frdt' AND '$todt') AND vendor !='' ")or die(mysqli_error($connect));
	$resadverse = mysqli_fetch_assoc($qryadverse);
	$total_adverse = $resadverse["adverse"];



	$s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$frdt' AND huf_ddd ='' ) OR (huf_dadm <= '$frdt' AND huf_dddd >= '$todt')")or die(mysqli_error($connect));

	

	$inpatient = mysqli_num_rows($s4);




	
?>
<div class="col-lg-12">
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
		
			<tr>
				<td width="50%;">Total No. of Item Purchases</td>
				<?php
					if($total_item > 0)
					{
				?>
				<td width="50%;"><?php echo $total_item;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr> 
			<tr>
				<td width="50%;">Total No. of Sold Items</td>
				<?php
					if($total_sold > 0)
					{
				?>
				<td width="50%;"><?php echo $total_sold;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">No. of Purchase done without Purchase Order</td>
				<?php
					if($total_purchase > 0)
					{
				?>
				<td width="50%;"><?php echo $total_purchase;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">No. Of Drugs/Items Purchased By Local Purchase Within Formulary</td>
				<?php
					if($total_formulary > 0)
					{
				?>
				<td width="50%;"><?php echo $total_formulary;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">No. Of Stock outs</td>
				<?php
					if($total_no_of_stock_out > 0)
					{
				?>
				<td width="50%;"><?php echo $total_no_of_stock_out;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">No. Of Drugs And Consumables Rejected Before Preparation Of GRN</td>
				<?php
					if($total_rejected > 0)
					{
				?>
				<td width="50%;"><?php echo $total_rejected;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>

			<tr>
				<td width="50%;">No. Of Variations From The  Procurement Process</td>
				<?php
					if($total_Procurement > 0)
					{
				?>
				<td width="50%;"><?php echo $total_Procurement;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">No. Of Medication Error</td>
				<?php
					if($total_Medication > 0)
					{
				?>
				<td width="50%;"><?php echo $total_Medication;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			
			<tr>
				<td width="50%;">No. Of Near miss Error</td>
				<?php
					if($total_Nearmiss > 0)
					{
				?>
				<td width="50%;"><?php echo $total_Nearmiss;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>

			<tr>
				<td width="50%;">No. Of adverse drug event</td>
				<?php
					if($total_adverse > 0)
					{
				?>
				<td width="50%;"><?php echo $total_adverse;?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>



			
		</table>
	</div>
	<div class="col-lg-6" style="padding-left:0;">
		<table class="table table-bordered">
		
			
				<td width="50%;">% Of Drugs And Consumable Procured By Local Purchase</td>
				<?php
					if($total_formulary > 0 && $total_item>0)
					{
						$per1 = ($total_formulary/$total_item)*100;
				?>
				
				<td width="50%;"><?php echo number_format($per1,2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">% Of Stock outs</td>
				<?php
					if($total_no_of_stock_out > 0 && $total_sold>0)
					{
					$per2 = ($total_no_of_stock_out/$total_sold)*100;
				?>
				
				<td width="50%;"><?php echo number_format($per2,2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">% Of Drugs And Consumables Rejected Before Preparation Of GRN</td>
				<?php
					if($total_rejected > 0 && $total_item>0)
					{
				$per3 = ($total_rejected/$total_item)*100;
				?>
				
				<td width="50%;"><?php echo number_format($per3,2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>

			<tr>
				<td width="50%;">% Of Variations From The  Procurement Process</td>
				<?php
					if($total_Procurement > 0 && $total_item>0)
					{
				$per4 = ($total_Procurement/$total_item)*100;
				?>
				
				<td width="50%;"><?php echo number_format($per4,2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<td width="50%;">% Of Medication Error</td>
				<?php
					if($total_Medication > 0 && $inpatient>0)
					{
				$per5 = ($total_Medication/$inpatient)*1000;
				?>
				
				<td width="50%;"><?php echo number_format($per5,2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>
			
			<tr>
				<td width="50%;">% Of Near miss Error</td>
				<?php
					if($total_Nearmiss > 0 && $inpatient>0)
					{
				$per6 = ($total_Nearmiss/$inpatient)*1000;
				?>
				
				<td width="50%;"><?php echo number_format($per6,2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>

			<tr>
				<td width="50%;">% Of adverse drug event</td>
				<?php
					if($total_adverse > 0 && $inpatient>0)
					{
				$per7 = ($total_adverse/$inpatient)*1000;
				?>
				
				<td width="50%;"><?php echo number_format($per7,2);?></td>
				<?php
					}else{
				?>
				<td width="50%;"><?php echo 0;?></td>
				<?php
					}
				?>
			</tr>



			
		</table>
	</div>
</div>