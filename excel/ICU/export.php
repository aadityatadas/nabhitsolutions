<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="14">
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">ICU REGISTER</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="10" ></th>

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
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date Of Admission In ICU</th>
                    <th width="20%">Time Of Admission In ICU</th>
                    <th width="20%">Date of Discharge/Transfer In ICU </th>
                    <th width="20%">Time of Discharge/Transfer In ICU</th>
                    <th width="20%">Date of Return TO ICU</th>
                    <th width="20%">Time of Return TO ICU</th>
                    <th width="20%">Return To ICU WithIn 48 Hrs</th>
                    <th width="20%">ReAdmission</th>
                    <th width="20%">ReIntubation</th> 
                    <th width="20%">Sign</th>
                     
                    </tr>
  ';

$countid = 1;
foreach ($datearray as $value) {
  $query = "SELECT tbl_huf.* , tbl_icu_register_ipd.* FROM tbl_huf LEFT JOIN tbl_icu_register_ipd ON tbl_huf.huf_id = tbl_icu_register_ipd.tbl_huf_id WHERE tbl_huf.huf_dadm = '".$value."'";

 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
         <td align="center" align="center">'.$countid++.'</td>  
        <td>'.$row["huf_pname"].'</td>  
        <td align="center" align="center">'.$row["huf_uhid"].'</td>  
        <td align="center" align="center">'.$row["huf_ipd"].'</td>  
        <td align="center" align="center">'.$row["date_of_admison_in_icu"].'</td>
        <td align="center" align="center">'.$row["time_of_admison_in_icu"].'</td>  
        <td align="center" align="center">'.$row["date_of_disc_trans_in_icu"].'</td>
        <td align="center" align="center">'.$row["time_of_disc_trans_in_icu"].'</td>  
        <td align="center" align="center">'.$row["date_of_return_in_icu"].'</td>  
        <td align="center" align="center">'.$row["time_of_return_in_icu"].'</td>
        <td align="center" align="center">'.$row["retrn_to_icu_in_48hrs"].'</td>
        <td align="center" align="center">'.$row["re_admission"].'</td>
        <td align="center" align="center">'.$row["re_intubation"].'</td>
        <td align="center" align="center">'.$row["sign"].'</td>
         

        </tr>
   ';
  }
  
 }

 $query1 = "SELECT tbl_huf.huf_pname,
            tbl_huf.huf_uhid,
            tbl_huf.huf_ipd,
            a.date_of_admison_in_icu,
a.time_of_admison_in_icu,
a.date_of_disc_trans_in_icu,
a.time_of_disc_trans_in_icu,
a.date_of_return_in_icu,
a.time_of_return_in_icu,
a.retrn_to_icu_in_48hrs,
a.re_admission,
a.re_intubation,
a.sign


 FROM tbl_icu_ipd2 as a
LEFT JOIN tbl_icu_register_ipd ON a.icu_register_ipd_id = tbl_icu_register_ipd.icu_register_ipd_id
LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_icu_register_ipd.tbl_huf_id WHERE tbl_huf.huf_dadm = '".$value."' ";  
      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      
         while ($row1 = mysqli_fetch_assoc($result1)) {

            $output .= '
             <tr>  
        <td align="center">'.$countid++.'</td>  
        <td>'.$row1["huf_pname"].'</td>  
        <td align="center">'.$row1["huf_uhid"].'</td>  
        <td align="center">'.$row1["huf_ipd"].'</td>  
        <td align="center">'.$row1["date_of_admison_in_icu"].'</td>
        <td align="center">'.$row1["time_of_admison_in_icu"].'</td>  
        <td align="center">'.$row1["date_of_disc_trans_in_icu"].'</td>
        <td align="center">'.$row1["time_of_disc_trans_in_icu"].'</td>  
        <td align="center">'.$row1["date_of_return_in_icu"].'</td>  
        <td align="center">'.$row1["time_of_return_in_icu"].'</td>
        <td align="center">'.$row1["retrn_to_icu_in_48hrs"].'</td>
        <td align="center">'.$row1["re_admission"].'</td>
        <td align="center">'.$row1["re_intubation"].'</td>
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
