<?php
ob_start();
session_start();
?>

<?php  
//export.php  
include("../config/config.php");
$output = '';

 
include "../date_calculation.php"; 

$datearray = date_range_find($_POST['frdt']  , $_POST['todt']);

if(isset($_POST["export"]))
{

    $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date of Peripheral Line insertion</th>
                    <th width="20%">Time of Insertion</th>
                    <th width="20%">VIP Score</th>
                    <th width="20%">Signs and Symptoms of Hematoma</th>
                    <th width="20%">Signs and Symptoms of Hematoma if Yes</th>
                    <th width="20%">Signs and symptoms of Thromboplebitis</th>
                    <th width="20%">Signs and symptoms of Thromboplebitis if Yes </th>
                    <th width="20%">Braden Score</th>
                    <th width="20%">Signs and Symptoms of Bed Scores</th>
                    <th width="20%">Signs and Symptoms of Bed Scores  </th>
                    <th width="20%">Morse Score</th>
                    <th width="20%">Incidence of Patient Fall</th> 
                    <th width="20%">Incidence of Patient Fall if YES</th> 
                    <th width="20%">Incidence of Accidental Removal of Drains and lines</th> 
                    <th width="20%">Incidence of Accidental Removal of Drains and lines IF YES</th>
                    <th width="20%">InjurytTo Patient</th>
                    <th width="20%">InjurytTo Patient IF YES</th>
                    <th width="20%">Recorded By</th>
                    </tr>
  ';
$countid = 1;
foreach ($datearray as $value) {

 $query = "SELECT * FROM tbl_care_evt LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_care_evt.huf_id WHERE tbl_huf.huf_dadm = '".$value."'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
         <td>'.$countid++.'</td> 
        <td>'.$row["huf_pname"].'</td>  
        <td>'.$row["huf_uhid"].'</td>  
        <td>'.$row["huf_ipd"].'</td>  
        <td>'.$row["care_dtpli"].'</td>
        <td>'.$row["care_tmpli"].'</td>  
        <td>'.$row["care_vipsc"].'</td>  
        <td>'.$row["care_signsymp"].'</td>  
        <td>'.$row["care_signsymp_det"].'</td>
        <td>'.$row["care_signsymp_th"].'</td> 
        <td>'.$row["care_signsymp_th_det"].'</td> 
        <td>'.$row["care_bradsc"].'</td> 
        <td>'.$row["care_signsyp_bed"].'</td>
        <td>'.$row["care_signsyp_bed_det"].'</td>
        <td>'.$row["care_mor_sc"].'</td>
        <td>'.$row["care_incd_ptfall"].'</td>
        <td>'.$row["care_incd_ptfall_det"].'</td>
        <td>'.$row["care_iardl"].'</td>
        <td>'.$row["care_iardl_det"].'</td>
        <td>'.$row["care_injtpt"].'</td>
        <td>'.$row["care_injtpt_det"].'</td>
        <td>'.$row["care_recd"].'</td>
                    </tr>
                   
                 
                 
                   
                    
   ';
  }
  
 }

 $query1 = "SELECT tbl_huf.huf_pname,
tbl_huf.huf_uhid,
tbl_huf.huf_ipd,a.care_dtpli,
a.care_tmpli,
a.care_vipsc,
a.care_signsymp,
a.care_signsymp_det,
a.care_signsymp_th,
a.care_signsymp_th_det,
a.care_bradsc,
a.care_signsyp_bed,
a.care_signsyp_bed_det,
a.care_mor_sc,
a.care_incd_ptfall,
a.care_incd_ptfall_det,
a.care_iardl,
a.care_iardl_det,
a.care_injtpt,
a.care_injtpt_det,
a.care_recd

 FROM tbl_care_evt_extra as a
LEFT JOIN tbl_care_evt ON a.care_id = tbl_care_evt.care_id
LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_care_evt.huf_id WHERE tbl_huf.huf_dadm = '".$value."' ";  
      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      
         while ($row1 = mysqli_fetch_assoc($result1)) {

            $output .= '
             <tr>  
                    <td>'.$countid++.'</td>  
       
      
        <td>'.$row1["huf_pname"].'</td>  
        <td>'.$row1["huf_uhid"].'</td>  
        <td>'.$row1["huf_ipd"].'</td>  
        <td>'.$row1["care_dtpli"].'</td>
        <td>'.$row1["care_tmpli"].'</td>  
        <td>'.$row1["care_vipsc"].'</td>  
        <td>'.$row1["care_signsymp"].'</td>  
        <td>'.$row1["care_signsymp_det"].'</td>
        <td>'.$row1["care_signsymp_th"].'</td> 
        <td>'.$row1["care_signsymp_th_det"].'</td> 
        <td>'.$row1["care_bradsc"].'</td> 
        <td>'.$row1["care_signsyp_bed"].'</td>
        <td>'.$row1["care_signsyp_bed_det"].'</td>
        <td>'.$row1["care_mor_sc"].'</td>
        <td>'.$row1["care_incd_ptfall"].'</td>
        <td>'.$row1["care_incd_ptfall_det"].'</td>
        <td>'.$row1["care_iardl"].'</td>
        <td>'.$row1["care_iardl_det"].'</td>
        <td>'.$row1["care_injtpt"].'</td>
        <td>'.$row1["care_injtpt_det"].'</td>
        <td>'.$row1["care_recd"].'</td>
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
