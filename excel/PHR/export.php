<?php
ob_start();
session_start();
?>

<?php  
//export.php  
include("../config/config.php");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_pharmcy_register";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Item No.</th>
                    <th width="25%">Quantity</th>
                    <th width="20%">Vendor</th>
                    <th width="20%">Purchase Order</th>
                    <th width="20%">No. Of Drugs/Items Purchased By Local Purchase Within Formulary</th>
                    <th width="20%">% Of Drugs And Consumable Procured By Local Purchase</th>
                    <th width="20%">No. Of Stock Outs</th>
                    <th width="20%">% Of Stock Outs</th>
                    <th width="20%">Total Quantity Rejected</th>
                    <th width="20%">Total Quantity Received Before Grn</th>
                    <th width="20%">% Of Drugs And Consumables Rejected Before Preparation Of Goods Receipt Note(Grn)</th>
                    <th width="20%">Total Number Of Variations From The Defined Procurement Process</th> 
                    <th width="20%">Total No. Of Item Procured </th>
                    <th width="20%">% Of Variation From The Procurement Process</th>
                    
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
        <tr>  
        <td>'.$row["pharmcy_register_id"].'</td>  
        <td>'.$row["item_no"].'</td>  
        <td>'.$row["quantity"].'</td>  
        <td>'.$row["vendor"].'</td>  
        <td>'.$row["purchase_ordr"].'</td>
        <td>'.$row["no_of_drugs_itm_purchsd_by_locl_purch_witn_formulary"].'</td>  
        <td>'.$row["per_of_drug_consumble_producd_by_locl_purchase"].'</td>
        <td>'.$row["no_of_stock_out"].'</td>  
        <td>'.$row["per_of_stocks_out"].'</td>  
        <td>'.$row["total_quantity_rejected"].'</td>
        <td>'.$row["total_qnty_receivd_befor_grn"].'</td>
        <td>'.$row["per_drug_cosumble_rejcted_bfr_preprtn_of_goods_receipt_note_grn"].'</td>
        <td>'.$row["totl_num_of_variation_frm_the_defend_procument_procs"].'</td>
        <td>'.$row["totl_no_of_itm_procured"].'</td>
        <td>'.$row["per_of_vartion_frm_the_procmnt_process"].'</td>
        
        </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
