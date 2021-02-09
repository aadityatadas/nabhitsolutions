<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="17" style="background-color: #d9edf7;">
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">EMERGENCY REGISTER</h3>
              </th>
                    
            </tr>

            <tr style="background-color: #bce8f1;">  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="13" ></th>

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

function cal_date($diff){
  

  if (strpos($diff,':') !== false) {
      return $diff;
  }elseif(!$diff){
    return $diff;
  }else {

  $timeMinTotal =  floor(($diff/60));
      
  $timeInMin= $timeMinTotal%60;
      
  $timeInhr= floor($timeMinTotal/60);
  $diffrenceInHr =$timeInhr.":".$timeInMin;

  return $diffrenceInHr;
}
}



 
include "../date_calculation.php"; 

$datearray = date_range_find($_POST['frdt']  , $_POST['todt']);


if(isset($_POST["export"]))
{

  $output .= '
   <table class="table" style="width:100%" border="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date Of Patient Arrival At The Emergency</th>

                    <th width="20%">Time Of Patient Arrival At The Emergency </th>
                    <th width="20%">Date Of Initial Assessment Is Completed By Doctor </th>
                    <th width="20%">Time Of Initial Assessment Is Completed By Doctor </th>
                    <th width="20%">Time Taken For Initial Assessment</th>
                    <th width="20%">Patient Complaint</th>
                    <th width="20%">Mlc </th>
                    <th width="20%">Brought Dead</th>
                    <th width="20%">Date Of Return To Emergency Department If Any</th>
                    <th width="20%">Time Of Return To Emergency Department If Any</th> 
                    <th width="20%">Patient Complaint  On Return To Emergency </th>
                    <th width="20%">Return To The Emergency Department With In 72 Hours With Similar Presenting Complaint If Any</th>
                    <th width="20%">Sign </th>
                    </tr>
  ';

$countid = 1;
foreach ($datearray as $value) {

 $query = "SELECT tbl_huf.* , tbl_emrgncy_register_ipd.* FROM tbl_huf LEFT JOIN tbl_emrgncy_register_ipd ON tbl_huf.huf_id = tbl_emrgncy_register_ipd.tbl_huf_id WHERE tbl_huf.huf_dadm = '".$value."'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
        <td align="center">'.$countid++.'</td> 
        <td>'.$row["huf_pname"].'</td>  
        <td align="center">'.$row["huf_uhid"].'</td>  
        <td align="center">'.$row["huf_ipd"].'</td>  
        <td align="center">'.$row["date_of_patient_arrvl_at_emrgncy"].'</td>
        <td align="center">'.$row["time_of_patient_arrvl_at_emrgncy"].'</td>
        <td align="center">'.$row["date_of_intl_ass_is_cmpltd_by_doc"].'</td>    
        <td align="center">'.$row["time_of_intl_ass_is_cmpltd_by_doc"].'</td>
         
        <td align="center">'. cal_date($row["time_taken_for_initl_assmnt"]).'</td>  
        <td align="center">'.$row["patient_cmplnt"].'</td>  
        <td align="center">'.$row["m_l_c"].'</td>
        <td align="center">'.$row["brought_dead"].'</td>
        <td align="center">'.$row["date_of_retrn_to_emrgncy_dept_if_any"].'</td>
        <td align="center">'.$row["time_of_retrn_to_emrgncy_dept_if_any"].'</td>
        <td align="center">'.$row["patients_comp_on_rtn_of_emrgncy"].'</td>
        <td align="center">'.$row["retn_of_emrgncy"].'</td>
        <td align="center">'.$row["sign"].'</td>

        </tr>
   ';
  }

}

$query1 = "SELECT tbl_huf.huf_pname,
            tbl_huf.huf_uhid,
            tbl_huf.huf_ipd,
            
            a.date_of_patient_arrvl_at_emrgncy,
a.time_of_patient_arrvl_at_emrgncy,
a.date_of_intl_ass_is_cmpltd_by_doc,
a.time_of_intl_ass_is_cmpltd_by_doc,
a.time_taken_for_initl_assmnt,
a.patient_cmplnt,
a.m_l_c,
a.brought_dead,
a.date_of_retrn_to_emrgncy_dept_if_any,
a.time_of_retrn_to_emrgncy_dept_if_any,
a.patients_comp_on_rtn_of_emrgncy,
a.retn_of_emrgncy,
a.sign

 FROM tbl_emrgncy_reg_ipd2 as a
LEFT JOIN tbl_emrgncy_register_ipd ON a.emrgncy_register_ipd_id = tbl_emrgncy_register_ipd.emrgncy_register_ipd_id
LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_emrgncy_register_ipd.tbl_huf_id WHERE tbl_huf.huf_dadm = '".$value."' ";  
      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      
         while ($row1 = mysqli_fetch_assoc($result1)) {

            $output .= '
             <tr>  
                    <td>'.$countid++.'</td>  
       
      
       <td>'.$row1["huf_pname"].'</td>  
        <td align="center">'.$row1["huf_uhid"].'</td>  
        <td align="center">'.$row1["huf_ipd"].'</td>  
        <td align="center">'.$row1["date_of_patient_arrvl_at_emrgncy"].'</td>
        <td align="center">'.$row1["time_of_patient_arrvl_at_emrgncy"].'</td>
        <td align="center">'.$row1["date_of_intl_ass_is_cmpltd_by_doc"].'</td>    
        <td align="center">'.$row1["time_of_intl_ass_is_cmpltd_by_doc"].'</td>
         
        <td align="center">'. cal_date($row1["time_taken_for_initl_assmnt"]).'</td>  
        <td align="center">'.$row1["patient_cmplnt"].'</td>  
        <td align="center">'.$row1["m_l_c"].'</td>
        <td align="center">'.$row1["brought_dead"].'</td>
        <td align="center">'.$row1["date_of_retrn_to_emrgncy_dept_if_any"].'</td>
        <td align="center">'.$row1["time_of_retrn_to_emrgncy_dept_if_any"].'</td>
        <td align="center">'.$row1["patients_comp_on_rtn_of_emrgncy"].'</td>
        <td align="center">'.$row1["retn_of_emrgncy"].'</td>
        <td align="center">'.$row1["sign"].'</td>
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
