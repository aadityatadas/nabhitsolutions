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

  $mr_without_dis_summary=0;
  $mr_having_incm_imp_const=0;
  $mr_without_sign_init_ass_sheet=0;
  $mr_without_sign_init_medictn_order=0;
  $mr_without_nursing_asst=0;
  $mr_without_nutrition_asst=0;
  $mr_without_physipy_asst=0;

  $post_anaesthesia_scroing_sign_anaesthist=0;

$query = "SELECT * FROM tbl_medical_record_audit WHERE (month(monthyear)='$i' AND  year(monthyear)='$yearR1')";

$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;

foreach ($result as $key => $row) {
   

   if($row["mr_without_dis_summary"]=='Yes'){
      $mr_without_dis_summary++;
    }
    if($row["mr_having_incm_imp_const"]=='Yes'){
      $mr_having_incm_imp_const++;
    }
    if($row["mr_without_sign_init_ass_sheet"]=='Yes'){
      $mr_without_sign_init_ass_sheet++;
    }
    if($row["mr_without_sign_init_medictn_order"]=='Yes'){
      $mr_without_sign_init_medictn_order++;
    }
    if($row["mr_without_nursing_asst"]=='Yes'){
      $mr_without_nursing_asst++;
    }
    if($row["mr_without_nutrition_asst"]=='Yes'){
      $mr_without_nutrition_asst++;
    }
    if($row["mr_without_physipy_asst"]=='Yes'){
      $mr_without_physipy_asst++;
    }

    if($row["post_anaesthesia_scroing_sign_anaesthist"]=='Yes'){
      $post_anaesthesia_scroing_sign_anaesthist++;
    }
   
   
 }



 if($mlc_count){
       $mr_without_dis_summary_per=($mr_without_dis_summary/$mlc_count)*100;
       $mr_having_incm_imp_const_per=($mr_having_incm_imp_const/$mlc_count)*100;
       $mr_without_sign_init_ass_sheet_per=($mr_without_sign_init_ass_sheet/$mlc_count)*100;
       $mr_without_sign_init_medictn_order_per=($mr_without_sign_init_medictn_order/$mlc_count)*100;
       $mr_without_nursing_asst_per=($mr_without_nursing_asst/$mlc_count)*100;
       $mr_without_nutrition_asst_per=($mr_without_nutrition_asst/$mlc_count)*100;
       $mr_without_physipy_asst_per=($mr_without_physipy_asst/$mlc_count)*100;
       $post_anaesthesia_scroing_sign_anaesthist_per=($post_anaesthesia_scroing_sign_anaesthist/$mlc_count)*100;

       $monthName = date("F", mktime(0, 0, 0, $i, 10))."-".$yearR1;
       $data[] = array(
            'month'=> $monthName,
            'count' => $mlc_count,
            'mr_without_dis_summary' => $mr_without_dis_summary_per,
            'mr_having_incm_imp_const' => $mr_having_incm_imp_const_per,
            'mr_without_sign_init_ass_sheet' => $mr_without_sign_init_ass_sheet_per,
            'mr_without_sign_init_medictn_order' => $mr_without_sign_init_medictn_order_per,
            'mr_without_nursing_asst' => $mr_without_nursing_asst_per,
            'mr_without_nutrition_asst' => $mr_without_nutrition_asst_per,
            'mr_without_physipy_asst' => $mr_without_physipy_asst_per,
            'post_anaesthesia_scroing_sign_anaesthist' => $post_anaesthesia_scroing_sign_anaesthist_per,
);

       $json['mr_without_dis_summary'][] = [$monthName , (int)$mr_without_dis_summary_per];

       $json['mr_having_incm_imp_const'][] = [$monthName , (int)$mr_having_incm_imp_const_per];

       $json['mr_without_sign_init_ass_sheet'][] = [$monthName , (int)$mr_without_sign_init_ass_sheet_per];

       $json['mr_without_sign_init_medictn_order'][] = [$monthName , (int)$mr_without_sign_init_medictn_order_per];

       $json['mr_without_nursing_asst'][] = [$monthName , (int)$mr_without_nursing_asst_per];

       $json['mr_without_nutrition_asst'][] = [$monthName , (int)$mr_without_nutrition_asst_per];

       
       $json['mr_without_physipy_asst'][] = [$monthName , (int)$mr_without_physipy_asst_per];
        $json['post_anaesthesia_scroing_sign_anaesthist'][] = [$monthName , (int)$post_anaesthesia_scroing_sign_anaesthist_per];

       $json['col_name'][]=$monthName;



       


     }

}

echo json_encode($json);



?>