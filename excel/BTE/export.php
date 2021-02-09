<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
 
<table class="table" style="width:100%" border="0" style="border: 1px solid" >  
           <tr>  
              <th colspan="19" >
               
                 <h1 style="text-align: center; text-decoration: underline;">NABH DEMO</h1>
                 <h3 style="text-align: center; text-decoration: underline;">BLOOD TRANSFUSION EVENTS</h3>
              </th>
                    
            </tr>

            <tr>  
              <th colspan="2" >
                
                <h4><?php
                echo "<b>"."Date: " . date("Y-m-d"). "&nbsp;&nbsp;&nbsp;&nbsp;          ";
                ?></h4>

                </th>

              <th colspan="15" ></th>

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
// Display the dates in array format 
// foreach ($datearray as $value) {
//     echo $value."<br>";
// }
if(isset($_POST["export"]))
{
$present = 0;

$output .= '
   <table class="table" style="width:100%" border="1" >  
                    <tr>  
                    <th width="35%" align="center">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%" align="center">UHID No</th>
                    <th width="20%" align="center">IPD No</th>
                    <th width="20%" align="center">Type of Blood Product Requested</th>
                    <th width="20%" align="center">No Units requested</th>
                    <th width="20%" align="center">Date of Requisition/order</th>
                    <th width="20%" align="center">Time of Requisition/order</th>
                    <th width="20%" align="center">Name of the blood bank to which blood product requested/ordered</th>
                    <th width="20%" align="center">Requested/Ordered by</th>
                    <th width="20%" align="center">Date at which blood product received</th>
                    <th width="20%" align="center">No of units received</th>
                    <th width="20%" align="center">Time at which blood product received</th> 
                    <th width="20%" align="center">TAT of Blood Product</th>
                    <th width="20%" align="center">Blood Product Received By</th>
                    <th width="20%" align="center">No of units transfused</th>
                    <th width="20%" align="center">Blood Transfusion Reaction observed</th>
                    <th width="20%" align="center">Wastage of Blood Product if any</th>
                    <th width="20%" align="center">Recorded By</th>
                    </tr>
  ';
$countid = 1;
foreach ($datearray as $value) {

$query = "SELECT * FROM tbl_blood_fusion LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_blood_fusion.huf_id 
WHERE tbl_huf.huf_dadm = '".$value."'";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  
while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
       <td align="center">'.$countid++ .'</td>   
       <td>'.$row["huf_pname"].'</td>  
       <td align="center">'.$row["huf_uhid"].'</td>  
       <td align="center">'.$row["huf_ipd"].'</td>  
       <td align="center">'.$row["bld_prdreq"].'</td>
       <td align="center">'.$row["bld_nounit"].'</td>  
       <td align="center">'.$row["bld_dtreq"].'</td>
       <td align="center">'.$row["bld_tmreq"].'</td>
       <td align="center">'.$row["bld_bankname"].'</td>
       <td align="center">'.$row["bld_ordby"].'</td>
       <td align="center">'.$row["bld_dtrec"].'</td>
       <td align="center">'.$row["bld_norec"].'</td>
       <td align="center">'.$row["bld_tmrec"].'</td>
       <td align="center">'.$row["bld_tat"].'</td>
       <td align="center">'.$row["bld_recby"].'</td>
       <td align="center">'.$row["bld_notrfus"].'</td>
       <td align="center">'.$row["bld_trfusreact"].'</td>
       <td align="center">'.$row["bld_waste"].'</td>
       <td align="center">'.$row["bld_recd"].'</td>
       </tr>
   ';
}
  
 } 

$query1 = "SELECT tbl_huf.huf_pname,
tbl_huf.huf_uhid,
tbl_huf.huf_ipd,
 a.bld_extra_id,a.bld_id,a.bld_prdreq,a.bld_nounit,a.bld_dtreq,a.bld_tmreq,a.bld_bankname,
 a.bld_ordby,a.bld_dtrec,a.bld_norec,a.bld_tmrec,a.bld_tat,a.bld_recby,a.bld_notrfus,
 a.bld_trfusreact,a.bld_waste,a.bld_recd
FROM tbl_blood_fusion_extra as a
LEFT JOIN tbl_blood_fusion ON a.bld_id = tbl_blood_fusion.bld_id
LEFT JOIN tbl_huf ON tbl_huf.huf_id = tbl_blood_fusion.huf_id 
WHERE tbl_huf.huf_dadm = '".$value."' ";  
      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      
         while ($row1 = mysqli_fetch_assoc($result1)) {

            $output .= '
             <tr>  
                    <td>'.$countid++.'</td>  
       
       <td >'.$row1["huf_pname"].'</td>  
       <td align="center">'.$row1["huf_uhid"].'</td>  
       <td align="center">'.$row1["huf_ipd"].'</td>  
       <td align="center">'.$row1["bld_prdreq"].'</td>
       <td align="center">'.$row1["bld_nounit"].'</td>  
       <td align="center">'.$row1["bld_dtreq"].'</td>
       <td align="center">'.$row1["bld_tmreq"].'</td>
       <td align="center">'.$row1["bld_bankname"].'</td>
       <td align="center">'.$row1["bld_ordby"].'</td>
       <td align="center">'.$row1["bld_dtrec"].'</td>
       <td align="center">'.$row1["bld_norec"].'</td>
       <td align="center">'.$row1["bld_tmrec"].'</td>
       <td align="center">'.$row1["bld_tat"].'</td>
       <td align="center">'.$row1["bld_recby"].'</td>
       <td align="center">'.$row1["bld_notrfus"].'</td>
       <td align="center">'.$row1["bld_trfusreact"].'</td>
       <td align="center">'.$row1["bld_waste"].'</td>
       <td align="center">'.$row1["bld_recd"].'</td>
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
