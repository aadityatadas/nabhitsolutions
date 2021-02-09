<?php
ob_start();
session_start();
?>

<?php  
//export.php  
include("../config/config.php");
$output = '';

function date_range_find($Date1 , $Date2){
  $datearray = array(); 
  

$Variable1 = strtotime($Date1); 
$Variable2 = strtotime($Date2); 
  

for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                $currentDate += (86400)) { 
                                      
$Store = date('Y-m-d', $currentDate); 
$datearray[] = $Store; 
} 

   return $datearray;
}


if(isset($_POST["export"]))
{

  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
        
                  
                        <th width="35%">Sr No</th>
                        
                        <th width="20%">UHID No.</th> 
                        <th width="20%">Name</th>
                        <th width="20%">Date of Registarion</th>  
                        <th width="20%">Gender</th> 
                        <th width="20%">Marital Status</th>
                        <th width="20%">Age</th>
                        <th width="20%">Mobile</th>
                        <th width="20%">Address</th>
                        <th width="20%">City</th>
                        <th width="20%">State</th>
                         <th width="20%">Zip Code</th>
                    </tr>
  ';


  $frdate = mysqli_real_escape_string($connect, $_POST["frdt"]);
  $todate = mysqli_real_escape_string($connect, $_POST["todt"]);
  $datearray = date_range_find($frdate  , $todate);
   
  $countid = 1;
  foreach ($datearray as $tdt) {
  $query = "SELECT * FROM tbl_patient_reg WHERE date_of_reg = '$tdt'";
  $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                       <td style="text-align:center;">'. $countid++ .'</td>
                         <td>'.$row["uhid_no"].'</td>
                          <td>'.$row["p_name"].'</td>

                           
                         <td>'.$row["date_of_reg"].'</td>
                         <td>'.$row["gender"].'</td>
                         <td>'.$row["marital"].'</td>
                             <td>'.$row["age_patn"].'</td>
                         <td>'.$row["mobile"].'</td>
                         <td>'.$row["address"].'</td>
                         <td>'.$row["city"].'</td>
                         <td>'.$row["satate"].'</td>
                         <td>'.$row["zipcode"].'</td>
                     
                         
       
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
