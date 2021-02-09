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

$dataval = $_POST['dataval'];

$col = ($_POST['dataval']['col']);

$chk1 =($_POST['dataval']['val1']);
$chk2 =($_POST['dataval']['val2']);


$query = "SELECT tbl_huf.tyofadmison,tbl_death_audit.expected_un_death,
tbl_death_audit.surg_prodr FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$frdate;


 
$stmt = $connection->prepare($query);
$stmt->execute();
$json = array();
$x1=0;
$y1=0;


$total=0;
$filtered_rows = $stmt->rowCount();

if($filtered_rows){
 while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      if($row[$col]==$chk1){
        $x1++;
      }elseif($row[$col]==$chk2){
        $y1++;
      }
     $total++;
 }

}


 $val1_per=number_format((($x1/$total)*100),2); 
  $val2_per=number_format((($y1/$total)*100),2); 

  
$a = array('role'=>'annotation');
$b = array('role'=> 'style' );
$dataAll[] = array('val', $chk1,$a,$b,$chk2,$a,$b );




$dataAll[1] = array($range, (int)$val1_per ,$val1_per,'blue',(int)$val2_per ,$val2_per ,'#b40d0d');		

	




     
		  
echo json_encode($dataAll);
		 
}





 
?>