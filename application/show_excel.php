<?php
include('../dbinfo.php');



$frdate = $_POST['frdate'];
$todate = $_POST['todate'];


$monthR1 = date('m', strtotime($frdate));
$yearR1 = date('Y', strtotime($frdate));

$monthR2 = date('m', strtotime($todate));
$yearR2 = date('Y', strtotime($todate));
if($monthR1 >= $monthR2){
  $max = $monthR1;
  $min = $monthR2;
} else{
    $max = $monthR2;
    $min = $monthR1;
}
$json=array();
for($i= $min;$i<=$max;$i++){

  $patient_name_present=0;
  $medic_caps_legible=0;
  $dose=0;
  $quantity=0;
  $date_prescription=0;
  $high_risk_medicn_verified=0;
  $sign_of_doc=0;

$query = "SELECT * FROM tbl_prescription_audit WHERE (month(monthyear)='$i' AND  year(monthyear)='$yearR1')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;

foreach ($result as $key => $row) {
   

   if($row["patient_name_present"]=='Yes'){
      $patient_name_present++;
    }
    if($row["medic_caps_legible"]=='Yes'){
      $medic_caps_legible++;
    }
    if($row["dose"]=='Yes'){
      $dose++;
    }
    if($row["quantity"]=='Yes'){
      $quantity++;
    }
    if($row["date_prescription"]=='Yes'){
      $date_prescription++;
    }
    if($row["high_risk_medicn_verified"]=='Yes'){
      $high_risk_medicn_verified++;
    }
    if($row["sign_of_doc"]=='Yes'){
      $sign_of_doc++;
    }
   
   
 }



 if($mlc_count){
       $patient_name_present_per=($patient_name_present/$mlc_count)*100;
       $medic_caps_legible_per=($medic_caps_legible/$mlc_count)*100;
       $dose_per=($dose/$mlc_count)*100;
       $quantity_per=($quantity/$mlc_count)*100;
       $date_prescription_per=($date_prescription/$mlc_count)*100;
       $high_risk_medicn_verified_per=($high_risk_medicn_verified/$mlc_count)*100;
       $sign_of_doc_per=($sign_of_doc/$mlc_count)*100;

       $monthName = date("F", mktime(0, 0, 0, $i, 10))."-".$yearR1;
       $data[] = array(
            'month'=> $monthName,
            'count' => $mlc_count,
            'patient_name_present' => $patient_name_present_per,
            'medic_caps_legible' => $medic_caps_legible_per,
            'dose' => $dose_per,
            'quantity' => $quantity_per,
            'date_prescription' => $date_prescription_per,
            'high_risk_medicn_verified' => $high_risk_medicn_verified_per,
            'sign_of_doc' => $sign_of_doc_per,
);

       $json['patient_name_present'][] = [$monthName , (int)$patient_name_present_per];

       $json['medic_caps_legible'][] = [$monthName , (int)$medic_caps_legible_per];

       $json['dose'][] = [$monthName , (int)$dose_per];

       $json['quantity'][] = [$monthName , (int)$quantity_per];

       $json['date_prescription'][] = [$monthName , (int)$date_prescription_per];

       $json['high_risk_medicn_verified'][] = [$monthName , (int)$high_risk_medicn_verified_per];

       
       $json['sign_of_doc'][] = [$monthName , (int)$sign_of_doc_per];

       $json['col_name'][]=$monthName;



       


     }

}

echo json_encode($json);



?>