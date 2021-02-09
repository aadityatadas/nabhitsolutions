<?php
session_start();
include('dbinfo.php');
$ses = $_SESSION['login'];
$date = date('Y-m-d');

 

// $qry3_1 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$date' AND huf_dddd >= '$date') OR (huf_dadm <= '$date' AND huf_ddd ='')")or die(mysqli_error($connect));

// $s = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_ddd = ''")or die(mysqli_error($connect));

	
 




//include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$date = $_POST["date_of_pur"];
		$s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$date' AND huf_ddd ='' ) OR (huf_dadm <= '$date' AND huf_dddd > '$date')")or die(mysqli_error($connect));
	$inpatient = mysqli_num_rows($s4);



		$item_no= $_POST['item_no'];
		$no_of_drugs_formulary = $_POST['no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary'];
		$per_drug1= ($no_of_drugs_formulary/$item_no) * 100;
		$per_drug1 = number_format($per_drug1,2);	
		$no_of_stock_out = $_POST['no_of_stock_out'];
		$per_drug2= ($no_of_stock_out/$item_no) * 100;
		$per_drug2 = number_format($per_drug2,2);
		$total_quantity_rejected = $_POST['total_quantity_rejected'];
		$total_qnty_receivd_befor_grn = $_POST['total_qnty_receivd_befor_grn'];
		$per_drug3= ($total_quantity_rejected/$total_qnty_receivd_befor_grn) * 100;
			$per_drug3 = number_format($per_drug3,2);
		$totl_num_of_variation_frm_the_defend_procument_procs=$_POST['totl_num_of_variation_frm_the_defend_procument_procs'];

		$per_drug4= ($totl_num_of_variation_frm_the_defend_procument_procs/$item_no) * 100;

		$per_drug4 = number_format($per_drug4,2);

		$medic_error = $_POST['medic_error'];
		$per_medic_error=($medic_error/$inpatient)*1000;

		$per_medic_error = number_format($per_medic_error,2);

		$near_miss_error = $_POST['near_miss_error'];
		$per_near_miss_error=($near_miss_error/$inpatient)*1000;

		$per_near_miss_error = number_format($per_near_miss_error,2);

		$advrse_drug_event = $_POST['advrse_drug_event'];
		$per_advrse_drug_event=($advrse_drug_event/$inpatient)*1000;

		$per_advrse_drug_event = number_format($per_advrse_drug_event,2);	

		$qry = "SELECT pharmcy_register_id FROM tbl_pharmcy_register ORDER BY pharmcy_register_id DESC";
		$res = mysqli_query($connect, $qry);
		$row=mysqli_fetch_array($res);
		$id = $row['pharmcy_register_id'];
		$cid = $id+1;
		// $surgy = mysqli_real_escape_string($connect, $_POST["surg"]);
		
		// $d1 = mysqli_real_escape_string($connect, $_POST["d_adm"]);
		// $d2 = mysqli_real_escape_string($connect, $_POST["dddd"]);
			
		
		
				
		$statement = $connection->prepare("
			INSERT INTO tbl_pharmcy_register (pharmcy_register_id ,
									  item_no ,
									  quantity ,
									  vendor ,
									  purchase_ordr ,
									  no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary ,
									  per_of_drug_consumble_producd_by_locl_purchase,
									  no_of_stock_out ,
									  per_of_stocks_out ,
									  total_quantity_rejected ,
									  total_qnty_receivd_befor_grn ,
									  per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn ,
									  totl_num_of_variation_frm_the_defend_procument_procs ,
									  totl_no_of_itm_procured ,
									  per_of_vartion_frm_the_procmnt_process,medic_error,
										medic_error_rmrk,
										per_medic_error,
										near_miss_error,
										near_miss_error_rmrk,
										per_near_miss_error,
										advrse_drug_event,
										advrse_drug_event_rmrk,
										per_advrse_drug_event) 
			VALUES ('$cid', 
							  :item_no ,
							  :quantity ,
							  :vendor ,
							  :purchase_ordr ,
							  :no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary ,
							  :per_of_drug_consumble_producd_by_locl_purchase,
							  :no_of_stock_out ,
							  :per_of_stocks_out ,
							  :total_quantity_rejected ,
							  :total_qnty_receivd_befor_grn ,
							  :per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn ,
							  :totl_num_of_variation_frm_the_defend_procument_procs ,
							  :totl_no_of_itm_procured ,
							  :per_of_vartion_frm_the_procmnt_process,
							  :medic_error,
								:medic_error_rmrk,
								:per_medic_error,
									:near_miss_error,
						:near_miss_error_rmrk,
						:per_near_miss_error,
						:advrse_drug_event,
						:advrse_drug_event_rmrk,
						:per_advrse_drug_event )
		");
		$result = $statement->execute(
			array(
				':item_no'		=>	$_POST["item_no"],
				':quantity'		=>	$_POST["quantity"],
				':vendor'		=>	$_POST["date_of_pur"],
				':purchase_ordr'=>	$_POST["purchase_ordr"],
				':no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary'	=>	$_POST["no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary"],
				':per_of_drug_consumble_producd_by_locl_purchase'	=>	$per_drug1,
				':no_of_stock_out'	=>	$_POST["no_of_stock_out"],
				':per_of_stocks_out'=>	$per_drug2,
				':total_quantity_rejected'	=>	$_POST["total_quantity_rejected"],
				':total_qnty_receivd_befor_grn'	=>	$_POST["total_qnty_receivd_befor_grn"],
				':per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn'			=>	$per_drug3,
				':totl_num_of_variation_frm_the_defend_procument_procs'	=>	$_POST["totl_num_of_variation_frm_the_defend_procument_procs"] ,
				':totl_no_of_itm_procured' =>$_POST["totl_no_of_itm_procured"] ,
				':per_of_vartion_frm_the_procmnt_process'=>	$per_drug4 ,
				':medic_error'=> $_POST["medic_error"],
				':medic_error_rmrk'=> $_POST["medic_error_rmrk"],
				':per_medic_error'=> $per_medic_error,
				':near_miss_error'=> $_POST["near_miss_error"],
				':near_miss_error_rmrk'=> $_POST["near_miss_error_rmrk"],
				':per_near_miss_error'=> $per_near_miss_error,
				':advrse_drug_event'=> $_POST["advrse_drug_event"],
				':advrse_drug_event_rmrk'=> $_POST["advrse_drug_event_rmrk"],
				':per_advrse_drug_event'=> $per_advrse_drug_event

			)
		);
		
				
		
		if(!empty($result))
		{
			echo 'Pharmacy Registration Form Submitted Successfully';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$date = $_POST["date_of_pur"];
		$s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$date' AND huf_ddd ='' ) OR (huf_dadm <= '$date' AND huf_dddd > '$date')")or die(mysqli_error($connect));
	$inpatient = mysqli_num_rows($s4);
		$item_no= $_POST['item_no'];
		$no_of_drugs_formulary = $_POST['no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary'];
		$per_drug1= ($no_of_drugs_formulary/$item_no) * 100;
		$per_drug1 = number_format($per_drug1,2);	
		$no_of_stock_out = $_POST['no_of_stock_out'];
		$per_drug2= ($no_of_stock_out/$item_no) * 100;
		$per_drug2 = number_format($per_drug2,2);
		$total_quantity_rejected = $_POST['total_quantity_rejected'];
		$total_qnty_receivd_befor_grn = $_POST['total_qnty_receivd_befor_grn'];
		$per_drug3= ($total_quantity_rejected/$total_qnty_receivd_befor_grn) * 100;
			$per_drug3 = number_format($per_drug3,2);
		$totl_num_of_variation_frm_the_defend_procument_procs=$_POST['totl_num_of_variation_frm_the_defend_procument_procs'];

		$per_drug4= ($totl_num_of_variation_frm_the_defend_procument_procs/$item_no) * 100;

		$per_drug4 = number_format($per_drug4,2);
		$medic_error = $_POST['medic_error'];
		if($medic_error){
				$per_medic_error=($medic_error/$inpatient)*1000;
		}else{
			  $per_medic_error= 0;
		}
		
		

		$per_medic_error = number_format($per_medic_error,2);

		$near_miss_error = $_POST['near_miss_error'];
		if($near_miss_error){
				$per_near_miss_error=($near_miss_error/$inpatient)*1000;
		}else{
			  $per_near_miss_error= 0;
		}
		


		$per_near_miss_error = number_format($per_near_miss_error,2);

		$advrse_drug_event = $_POST['advrse_drug_event'];

		if($advrse_drug_event){
				$per_advrse_drug_event=($advrse_drug_event/$inpatient)*1000;
		}else{
			  $per_advrse_drug_event= 0;
		}


		

		$per_advrse_drug_event = number_format($per_advrse_drug_event,2);
				
		$statement = $connection->prepare(
			"UPDATE tbl_pharmcy_register 
			SET item_no  =	:item_no,
				quantity  =	:quantity,
				vendor	=	:vendor,
				purchase_ordr=	:purchase_ordr,
				no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary	=	:no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary,
				per_of_drug_consumble_producd_by_locl_purchase =	:per_of_drug_consumble_producd_by_locl_purchase,
				no_of_stock_out	= :no_of_stock_out,
				per_of_stocks_out= :per_of_stocks_out,
				total_quantity_rejected	=	:total_quantity_rejected,
				total_qnty_receivd_befor_grn =	:total_qnty_receivd_befor_grn,
				per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn			=	:per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn,
				totl_num_of_variation_frm_the_defend_procument_procs	=	:totl_num_of_variation_frm_the_defend_procument_procs ,
				totl_no_of_itm_procured =:totl_no_of_itm_procured ,
				per_of_vartion_frm_the_procmnt_process=	:per_of_vartion_frm_the_procmnt_process ,
				 medic_error =:medic_error,
				 medic_error_rmrk =:medic_error_rmrk,
				 per_medic_error =:per_medic_error,
				 near_miss_error =:near_miss_error,
				 near_miss_error_rmrk =:near_miss_error_rmrk,
				 per_near_miss_error =:per_near_miss_error,
				 advrse_drug_event =:advrse_drug_event,
				  advrse_drug_event_rmrk =:advrse_drug_event_rmrk,
				  per_advrse_drug_event =:per_advrse_drug_event
 


			WHERE pharmcy_register_id = :sr_no
			"
		);
		$result = $statement->execute(
			array(
				':sr_no'		=>	$_POST["sr_no"],
				':item_no'		=>	$_POST["item_no"],
				':quantity'		=>	$_POST["quantity"],
				':vendor'		=>	$_POST["date_of_pur"],
				':purchase_ordr'=>	$_POST["purchase_ordr"],
				':no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary'	=>	$_POST["no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary"],
				':per_of_drug_consumble_producd_by_locl_purchase'	=>$per_drug1,
				':no_of_stock_out'	=>	$_POST["no_of_stock_out"],
				':per_of_stocks_out'=>	$per_drug2,
				':total_quantity_rejected'	=>	$_POST["total_quantity_rejected"],
				':total_qnty_receivd_befor_grn'	=>	$_POST["total_qnty_receivd_befor_grn"],
				':per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn'			=>	$per_drug3,
				':totl_num_of_variation_frm_the_defend_procument_procs'	=>	$_POST["totl_num_of_variation_frm_the_defend_procument_procs"] ,
				':totl_no_of_itm_procured' =>$_POST["totl_no_of_itm_procured"] ,
				':per_of_vartion_frm_the_procmnt_process'=>	$per_drug4 ,
				':medic_error' =>$_POST['medic_error'] ,
				 ':medic_error_rmrk' =>$_POST['medic_error_rmrk'] ,
				 ':per_medic_error' =>$per_medic_error ,
				 ':near_miss_error' =>$_POST['near_miss_error'] ,
				 ':near_miss_error_rmrk' =>$_POST['near_miss_error_rmrk'] ,
				 ':per_near_miss_error' => $per_near_miss_error,
				  ':advrse_drug_event' =>$_POST['advrse_drug_event'], 
		':advrse_drug_event_rmrk' =>$_POST['advrse_drug_event_rmrk'] ,
				 ':per_advrse_drug_event' =>$per_advrse_drug_event 

			)
		);
		 
		 if(!empty($result))
		{
			echo 'Pharmacy Registration Form Updated Successfully';
		}
		}
		
	}

?>