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





$chk1 =($_POST['dataval']['val1']);

if($chk1==1){

  $query = "SELECT tbl_death_audit.apache_score
 FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$frdate;


 
$stmt = $connection->prepare($query);
$stmt->execute();
$json = array();
$apanceL20=0;
$apanceG20=0;




$total=0;
$filtered_rows = $stmt->rowCount();

if($filtered_rows){
 while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      if($apache_score>20){
        $apanceG20++;
      }else{
        $apanceL20++;
      }

     

     $total++;
 }

}


  $apanceG20_per=number_format((($apanceG20/$total)*100),2); 
  $apanceL20_per=number_format((($apanceL20/$total)*100),2); 


  
$a = array('role'=>'annotation');
$b = array('role'=> 'style' );
$dataAll[] = array('val', 'value',$a,$b,'Percent',$a,$b );




$dataAll[1] = array('Less than 20', (int)$apanceL20 ,$apanceL20,'blue',(int)$apanceL20_per ,$apanceL20_per ,'#b40d0d');   

$dataAll[2] = array('More than 20', (int)$apanceG20 ,$apanceG20,'blue',(int)$apanceG20_per ,$apanceG20_per ,'#b40d0d');   

  


}else{

  $query = "SELECT 
tbl_death_audit.sofa_score FROM tbl_death_audit
LEFT JOIN tbl_huf On tbl_death_audit.huf_id= tbl_huf.huf_id WHERE tbl_quaterly_audit_details_id=".$frdate;


 
$stmt = $connection->prepare($query);
$stmt->execute();
$json = array();


$sofaL10=0;
$sofaG10=0;


$total=0;
$filtered_rows = $stmt->rowCount();

if($filtered_rows){
 while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      

      if($sofa_score>10){
        $sofaG10++;
      }else{
        $sofaL10++;
      }

     $total++;
 }

}


  


  $sofaL10_per=number_format((($sofaL10/$total)*100),2); 
  $sofaG10_per=number_format((($sofaG10/$total)*100),2); 
  
$a = array('role'=>'annotation');
$b = array('role'=> 'style' );





$dataAll[] = array('val', 'value',$a,$b,'Percent',$a,$b );




$dataAll[1] = array('less than 10', (int)$sofaL10 ,$sofaL10,'blue',(int)$sofaL10_per ,$sofaL10_per ,'#b40d0d');   

$dataAll[2] = array('more than 10', (int)$sofaG10 ,$sofaG10,'blue',(int)$sofaG10_per ,$sofaG10_per ,'#b40d0d');   


  


}





     
      
echo json_encode($dataAll);
     
}





 
?>