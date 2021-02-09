<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="30">
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">Sentinel Event Related to Surgery and Anesthetia</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="26" ></th>

              <th colspan="2" >
               
               <h4><?php
                date_default_timezone_set("Asia/Calcutta");
                echo "<b>"."Time: " . strtoupper(date("h:i:sa"))."<br><br>";?></h4>
               </th>
                    
            </tr>

  </table>  

  <?php  
//export.php  
include("../config/config.php");
$output = '';

 
include "../date_calculation.php"; 

$datearray = date_range_find($_POST['frdt']  , $_POST['todt']);

if(isset($_POST["export"]))
{
   $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                    <th width="35%">Sr No</th>
                        <th width="20%">Name of the Patient</th>
                        <th width="20%">UHID No</th>
                        <th width="20%">IPD No</th>
                        <th width="20%">Name of the Surgery Planned</th>
                        <th width="20%">Name of Surgery Done</th>
                        <th width="20%">Date of Surgery Planned</th>
                        <th width="20%">Date of Surgery Done</th>
                        <th width="20%">Type of Anesthetia Planned</th>
                        <th width="20%">Type of Anesthetia given</th>
                        <th width="20%">Resceduling of Surgery Done</th>
                        <th width="20%">Resceduling of Surgery Done</th>
                        <th width="20%">Unplanned return to OT</th>
                        <th width="20%">Unplanned return to OT</th>
                        <th width="20%">Procedure Followed to Prevent Adverse Events.e. WP, WS, WS</th>
                        <th width="20%">Appropriate Prophylactic antibiotics given within stipulated time</th>
                        <th width="20%">Change in surgery planned intraoperatively</th>
                        <th width="20%">Rexploration Done</th>
                        <th width="20%">PAC done</th>
                        <th width="20%">Modification in Anesthetia Plan</th>
                        <th width="20%">Modification in Anesthetia Plan</th>
                        <th width="20%">unplanned Ventilation after anesthetia</th>
                        <th width="20%">Death related to anesthetia</th>
                        <th width="20%">Any Adverse Anesthetia Event</th>
                        <th width="20%">Any Adverse Surgery event</th>
                        <th width="20%">unplanned Ventilation after anesthetia Details</th>
                        <th width="20%">Death related to anesthetia Details</th>
                        <th width="20%">Any Adverse Anesthetia Event Details</th>
                        <th width="20%">Any Adverse Surgery event Details</th>              
                        <th width="20%">Recorded By</th>
                    
                    
                    
                    </tr>
  ';

  $countid = 1;
foreach ($datearray as $value) {



 $query = "SELECT * FROM tbl_senti_det LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_senti_det.huf_id 
 WHERE tbl_huf.huf_dadm = '".$value."'";
 
 
 
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
 
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td  align="center">'.$countid++ .'</td>    
                         <td>'.$row["huf_pname"].'</td>
                         <td align="center">'.$row["huf_uhid"].'</td> 
                         <td align="center">'.$row["huf_ipd"].'</td> 
                         <td align="center">'.$row["senti_nm_surg_pl"].'</td> 
                         <td align="center">'.$row["senti_nm_surg_dn"].'</td> 
                         <td align="center">'.$row["senti_dt_surg_pl"].'</td> 
                         <td align="center">'.$row["senti_dt_surg_dn"].'</td> 
                         <td align="center">'.$row["senti_tp_ans_pl"].'</td>
                         <td align="center">'.$row["senti_tp_ans_gv"].'</td>
                         <td align="center">'.$row["senti_resch_surg_dn"].'</td>
                         <td align="center">'.$row["senti_resch_surg_dn_det"].'</td>
                         <td align="center">'.$row["senti_unpl_ret_ot"].'</td>
                         <td align="center">'.$row["senti_unpl_ret_ot_det"].'</td>
                         <td align="center">'.$row["senti_prf_topvev"].'</td>
                         <td align="center">'.$row["senti_appr_propantb"].'</td>
                         <td align="center">'.$row["senti_chng_surg_pl_int"].'</td>
                         <td align="center">'.$row["senti_rexpl"].'</td>
                         <td align="center">'.$row["senti_pacdn"].'</td>
                         <td align="center">'.$row["senti_mod_anspl"].'</td>
                         <td align="center">'.$row["senti_mod_anspl_det"].'</td>
                         <td align="center">'.$row["senti_unp_vent_aft_ans"].'</td>
                         <td align="center">'.$row["senti_dth_rel_ans"].'</td>
                         <td align="center">'.$row["senti_any_adv_ans_evt"].'</td>
                         <td align="center">'.$row["senti_any_adv_surg_evt"].'</td>
                         <td align="center">'.$row["senti_unp_vent_aft_ans_det"].'</td>
                         <td align="center">'.$row["senti_dth_rel_ans_det"].'</td>
                         <td align="center">'.$row["senti_any_adv_ans_evt_det"].'</td>
                         <td align="center">'.$row["senti_any_adv_surg_evt_det"].'</td>
                         <td align="center">'.$row["senti_recd"].'</td>
                         
                         
                    </tr>
   ';
  }
  
 }

 $query1 = "SELECT tbl_huf.huf_pname,
tbl_huf.huf_uhid,
tbl_huf.huf_ipd,
a.senti_nm_surg_pl,
a.senti_nm_surg_dn,
a.senti_dt_surg_pl,
a.senti_dt_surg_dn,
a.senti_tp_ans_pl,
a.senti_tp_ans_gv,
a.senti_resch_surg_dn,
a.senti_resch_surg_dn_det,
a.senti_unpl_ret_ot,
a.senti_unpl_ret_ot_det,
a.senti_prf_topvev,
a.senti_appr_propantb,
a.senti_chng_surg_pl_int,
a.senti_rexpl,
a.senti_pacdn,
a.senti_mod_anspl,
a.senti_mod_anspl_det,
a.senti_unp_vent_aft_ans,
a.senti_dth_rel_ans,
a.senti_any_adv_ans_evt,
a.senti_any_adv_surg_evt,
a.senti_unp_vent_aft_ans_det,
a.senti_dth_rel_ans_det,
a.senti_any_adv_ans_evt_det,
a.senti_any_adv_surg_evt_det,
a.senti_recd

 FROM tbl_senti_det_addon as a
LEFT JOIN tbl_senti_det ON a.tbl_senti_det_id = tbl_senti_det.senti_det_id
LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_senti_det.huf_id WHERE tbl_huf.huf_dadm = '".$value."' ";  
      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      
         while ($row1 = mysqli_fetch_assoc($result1)) {

            $output .= '
             <tr>  
                   <td>'.$countid++ .'</td>    
                          <td>'.$row1["huf_pname"].'</td>
                          <td>'.$row1["huf_uhid"].'</td> 
                          <td>'.$row1["huf_ipd"].'</td> 
                          <td>'.$row1["senti_nm_surg_pl"].'</td> 
                          <td>'.$row1["senti_nm_surg_dn"].'</td> 
                          <td>'.$row1["senti_dt_surg_pl"].'</td> 
                          <td>'.$row1["senti_dt_surg_dn"].'</td> 
                          <td>'.$row1["senti_tp_ans_pl"].'</td>
                          <td>'.$row1["senti_tp_ans_gv"].'</td>
                          <td>'.$row1["senti_resch_surg_dn"].'</td>
                          <td>'.$row1["senti_resch_surg_dn_det"].'</td>
                          <td>'.$row1["senti_unpl_ret_ot"].'</td>
                          <td>'.$row1["senti_unpl_ret_ot_det"].'</td>
                          <td>'.$row1["senti_prf_topvev"].'</td>
                          <td>'.$row1["senti_appr_propantb"].'</td>
                          <td>'.$row1["senti_chng_surg_pl_int"].'</td>
                          <td>'.$row1["senti_rexpl"].'</td>
                          <td>'.$row1["senti_pacdn"].'</td>
                          <td>'.$row1["senti_mod_anspl"].'</td>
                          <td>'.$row1["senti_mod_anspl_det"].'</td>
                          <td>'.$row1["senti_unp_vent_aft_ans"].'</td>
                          <td>'.$row1["senti_dth_rel_ans"].'</td>
                          <td>'.$row1["senti_any_adv_ans_evt"].'</td>
                          <td>'.$row1["senti_any_adv_surg_evt"].'</td>
                          <td>'.$row1["senti_unp_vent_aft_ans_det"].'</td>
                          <td>'.$row1["senti_dth_rel_ans_det"].'</td>
                          <td>'.$row1["senti_any_adv_ans_evt_det"].'</td>
                          <td>'.$row1["senti_any_adv_surg_evt_det"].'</td>
                          <td>'.$row1["senti_recd"].'</td>
        
      
       </tr>
   ';

        }

      }

}

 $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
}
?>
