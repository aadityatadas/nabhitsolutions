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

  
$a = array('role'=>'annotation');
$b = array('role'=> 'style' );
$dataAll[] = array('val', 'Critical',$a,$b,'Non Critical',$a,$b,'End of life care',$a);




$dataAll[1] = array($range, (int)$critial_per ,$critial_per,'blue',(int)$noncritial_per ,$noncritial_per ,'#b40d0d',(int)$endoflife_per ,$endoflife_per );		

	

}


}


     
		  
echo json_encode($dataAll);
		 






 
?>