<?php
ob_start();
session_start();
?>

<?php  
//export.php  
$connect = mysqli_connect("localhost", "nabhbudd_demo", "nabhdemo@123", "nabhbudd_nabhdemonew");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_huf";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                          <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">IPD No</th>
                    <th width="20%">Date of Admission (D1)</th>
                    <th width="20%">Time of Admission</th>
                    <th width="20%">Dischage/DAMA/Death</th>
                    <th width="20%">Date of Dischage/DAMA/Death (D2)</th>
                    <th width="20%">Time of Dischage/DAMA/Death</th>
                    <th width="20%">MLC/Non MLC</th>
                    <th width="20%">Surgery/No Surgery</th>
                     <th width="20%">Lenth of Stay /(LOS D2-D1)</th>
                    <th width="20%">Recorded By</th> 
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["huf_id"].'</td>  
                         <td>'.$row["huf_pname"].'</td>  
                         <td>'.$row["huf_uhid"].'</td>  
                        <td>'.$row["huf_ipd"].'</td>  
                        <td>'.$row["huf_dadm"].'</td>
                        <td>'.$row["huf_tadm"].'</td>  
                         <td>'.$row["huf_ddd"].'</td>  
                         <td>'.$row["huf_dddd"].'</td>  
                         <td>'.$row["huf_tddd"].'</td>  
                         <td>'.$row["huf_mlc"].'</td>
                         <td>'.$row["huf_surg"].'</td>
                        <td>'.$row["huf_lens"].'</td>
                        <td>'.$row["huf_recd"].'</td>
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
