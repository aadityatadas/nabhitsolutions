<?php
include('../dbinfo.php');



$frdate = $_POST['selectedquater_id'];
$a=$_POST['frm1Graphh'];
$b=$_POST['to1Graphh'];

$range = $a." to ".$b;


if($_POST['graphp']==1){


$query = "SELECT tbl_huf.tyofadmison,tbl_death_audit.*  FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$frdate;


 
$stmt = $connection->prepare($query);
$stmt->execute();
$json = array();
$Emergency=0;
$Planned=0;

$exp=0;
$notexp=0;

$sur=0;
$procedure=0;

$apanceL20=0;
$apanceG20=0;

$sofaL10=0;
$sofaG10=0;

$total=0;


$filtered_rows = $stmt->rowCount();

if($filtered_rows){
 while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      if($tyofadmison=='Planned'){
        $Planned++;
      }elseif($tyofadmison=='Emergency'){
        $Emergency++;
      }

      if($expected_un_death=='Expected'){
        $exp++;
      }elseif($expected_un_death=='Non Expected'){
        $notexp++;
      }

      if($surg_prodr=='Surgery'){
        $sur++;
      }elseif($surg_prodr=='Procedure'){
        $procedure++;
      }

       if($apache_score>20){
        $apanceG20++;
      }else{
        $apanceL20++;
      }

      if($sofa_score>10){
        $sofaG10++;
      }else{
        $sofaL10++;
      }

      




      $total++;
 }


   $Planned_per=number_format((($Planned/$total)*100),2); 
  $Emergency_per=number_format((($Emergency/$total)*100),2); 

  $exp_per=number_format((($exp/$total)*100),2); 
  $notexp_per=number_format((($notexp/$total)*100),2); 

  $sur_per=number_format((($sur/$total)*100),2); 
  $procedure_per=number_format((($procedure/$total)*100),2); 


  $apanceG20_per=number_format((($apanceG20/$total)*100),2); 
  $apanceL20_per=number_format((($apanceL20/$total)*100),2); 


  $sofaL10_per=number_format((($sofaL10/$total)*100),2); 
  $sofaG10_per=number_format((($sofaG10/$total)*100),2); 


  $json['Emergency'][0] = [$range , (int)$Emergency_per];

 $json['Planned'][0] = [$range,(int)$Planned_per];


 $json['Expected'][0] = [$range , (int)$exp_per];

 $json['NotExpected'][0] = [$range,(int)$notexp_per];


 $json['Surgery'][0] = [$range , (int)$sur_per];

 $json['Procedure'][0] = [$range,(int)$procedure_per];

 $json['col_name'][0]=[$range];

 $json['col_nameA'][0]=['Less than 20'];
 $json['col_nameA'][1]=['More than 20'];

 $json['Aval'][0]=[$range,(int)$apanceL20];
 $json['Aval'][1]=[$range,(int)$apanceG20];

 $json['APer'][0]=[$range,(int)$apanceL20_per];
 $json['APer'][1]=[$range,(int)$apanceG20_per];


 $json['Sval'][0]=[$range,(int)$sofaL10];
 $json['Sval'][1]=[$range,(int)$sofaG10];

 $json['SPer'][0]=[$range,(int)$sofaL10_per];
 $json['SPer'][1]=[$range,(int)$sofaG10_per];

 $json['col_nameS'][0]=['Less than 10'];
 $json['col_nameS'][1]=['More than 10'];

}


 

 

 





echo json_encode($json);

}

elseif($_POST['graphp']==2){


$query = "SELECT condition_at_admsion FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$frdate;
 
$stmt = $connection->prepare($query);
$stmt->execute();
$json = array();
$critial=0;
$noncritial=0;
$endoflife=0;
$total=0;

$filtered_rows = $stmt->rowCount();

if($filtered_rows){
 while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      if($condition_at_admsion=='Critical'){
        $critial++;
      }elseif($condition_at_admsion=='Non Critical'){
        $noncritial++;
      }
      elseif($condition_at_admsion=='End of life care'){
        $endoflife++;
      }

      $total++;
   }


   $critial_per=number_format((($critial/$total)*100),2); 
   $noncritial_per=number_format((($noncritial/$total)*100),2);

    $endoflife_per=number_format((($endoflife/$total)*100),2); 

    $json['critial'][0] = [$range , (int)$critial_per];

 $json['noncritial'][0] = [$range,(int)$noncritial_per];

 $json['EndOflife'][0] = [$range,(int)$endoflife_per];

 $json['col_name'][0]=[$range];
  

}


 

 

 

echo json_encode($json);

}elseif($_POST['graphp']==3){


$query = "SELECT tbl_death_audit.* FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$frdate;
 
$stmt = $connection->prepare($query);
$stmt->execute();
$json = array();
$a=$b=$c=$d=$e=$f=$g=0;

$total=0;

$filtered_rows = $stmt->rowCount();

if($filtered_rows){
 while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      if($team_work=='Yes'){
        $a++;
      }
      if($technq_mang_care=='Yes'){
        $b++;
      }
      if($med_error=='Yes'){
        $c++;
      }
      if($decisn_making=='Yes'){
        $d++;
      }
      if($staff_skill_comp=='Yes'){
        $e++;
      }
      if($comm_error=='Yes'){
        $f++;
      }
      if($eco_fact_patient=='Yes'){
        $g++;
      }

      $total++;
 }

$json['a'][0]=[(int)(number_format((($a/$total)*100),2))];
$json['a'][1]=[(int)(number_format((($b/$total)*100),2))];
$json['a'][2]=[(int)(number_format((($c/$total)*100),2))];
$json['a'][3]=[(int)(number_format((($d/$total)*100),2))];
$json['a'][4]=[(int)(number_format((($e/$total)*100),2))];
$json['a'][5]=[(int)(number_format((($f/$total)*100),2))];
$json['a'][6]=[(int)(number_format((($g/$total)*100),2))];




$json['col_name']=['Team work' ,'Techniques and management of care','Medication error','Decision making','Staffing error/Skill and competency','Communication error','Economical factors of the patient'];

   

}


 

 

 

echo json_encode($json);

}




?>