<?php
include('../dbinfo.php');



$frdate = $_POST['selectedquater_id'];
$a=$_POST['frm1Graphh'];
$b=$_POST['to1Graphh'];

$range = $a." to ".$b;



$result = $connect->query("SELECT  COUNT(*) AS total FROM tbl_huf
              WHERE huf_dddd BETWEEN '".$a."' AND '".$b."'")->fetch_array();
$totalPatinet =  ($result['total']);







if($_POST['graphp']==1){


$query = "SELECT tbl_clinical_audit.* FROM tbl_clinical_audit
LEFT JOIN tbl_huf On tbl_clinical_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$frdate;
 
$stmt = $connection->prepare($query);
$stmt->execute();
$json = array();
$a=$b=$c=$d=$e=$f=0;

$total=0;

$filtered_rows = $stmt->rowCount();

if($filtered_rows){
 while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      if($consulatnt=='Yes'){
        $a++;
      }
      if($monitoring=='Yes'){
        $b++;
      }
      if($technique=='Yes'){
        $c++;
      }
      if($calibration=='Calibrated'){
        $d++;
      }
      if($diet_plan=='Yes'){
        $e++;
      }
      if($education=='Yes'){
        $f++;
      }
      

      $total++;
 }
$json['a'][0]=[(int)(number_format((($total/$totalPatinet)*100),2))];
$json['a'][1]=[(int)(number_format((($a/$total)*100),2))];
$json['a'][2]=[(int)(number_format((($b/$total)*100),2))];
$json['a'][3]=[(int)(number_format((($c/$total)*100),2))];
$json['a'][4]=[(int)(number_format((($d/$total)*100),2))];
$json['a'][5]=[(int)(number_format((($e/$total)*100),2))];
$json['a'][6]=[(int)(number_format((($f/$total)*100),2))];







$json['col_name']=['No of Sample' ,'Informed by RMo to consultant...','Monitoring done by trained nurse','Technique of BG Monitoring','Calibration of glucometer','Diet Plan we properly charted','Patient education was given on importance of controlling BG'];

   

}


 

 

 

echo json_encode($json);

}




?>