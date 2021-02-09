<?php  

//index.php
include("../../application/dbinfo.php");



$dataAll=array();

if(isset($_POST["selectedquater_id"]) )
{

$frdate = $_POST['selectedquater_id'];
$a=$_POST['frm1Graphh'];
$b=$_POST['to1Graphh'];

$range = $a." to ".$b;






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


$data[0]=array( 'Team work',(int)(number_format((($a/$total)*100),2)) , (number_format((($a/$total)*100),2)) );

$data[1]=array( 'Techniques and management of care',(int)(number_format((($b/$total)*100),2)) , (number_format((($b/$total)*100),2)) );
$data[2]=array( 'Medication error',(int)(number_format((($c/$total)*100),2)) , (number_format((($c/$total)*100),2)) );
$data[2]=array( 'Decision making',(int)(number_format((($d/$total)*100),2)) , (number_format((($d/$total)*100),2)) );
$data[4]=array( 'Staffing error/Skill and competency',(int)(number_format((($e/$total)*100),2)) , (number_format((($e/$total)*100),2)) );
$data[5]=array( 'Communication error',(int)(number_format((($f/$total)*100),2)) , (number_format((($f/$total)*100),2)) );
$data[6]=array('Economical factors of the patient',(int)(number_format((($g/$total)*100),2)) , (number_format((($g/$total)*100),2)) );




$json['col_name']=['Team work' ,'Techniques and management of care','Medication error','Decision making','Staffing error/Skill and competency','Communication error','Economical factors of the patient'];
  


$a = array('role'=>'annotation');
$b = array('role'=> 'style' );
$dataAll[] = array('val', '% of yes',$a);

foreach ($data as $key => $value) {
  $dataAll[]= $value;
}


	

	

}


}


     
		  
echo json_encode($dataAll);
		 






 
?>