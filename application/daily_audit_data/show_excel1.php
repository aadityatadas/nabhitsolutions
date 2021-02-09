<?php
include('../dbinfo.php');



$tbl = $_POST['tbl'];

$name = $_POST['name'];

$date = $_POST['date'];


$sql="SELECT * FROM $tbl 
   WHERE audit_date ='$date'";
   
$statement = $connection->prepare($sql);
   $statement->execute();
   $result = $statement->fetchAll(PDO::FETCH_ASSOC);
 $filtered_rows = $statement->rowCount();
$json=[];
      $k=0;
               $ye = 0;
               $no = 0;
               $na = 0;

               if($filtered_rows){
               foreach ($result as $value) {  

                  if($value['yn_val']=='Yes'){ $ye++; }
                  if($value['yn_val']=='No'){ $no++; }
                  if($value['yn_val']=='Na'){ $na++; }

                  $k++;

               }



$json['a'][0]=[(int)$ye];
$json['b'][0]=[(int)(number_format((($ye/$k)*100),2))];

$json['a'][1]=[(int)$no];
$json['b'][1]=[(int)(number_format((($no/$k)*100),2))];


$json['a'][2]=[(int)$na];
$json['b'][2]=[(int)(number_format((($na/$k)*100),2))];





$json['col_name'][0]=['Yes'];
$json['col_name'][1]=['No'];
$json['col_name'][2]=['Na'];

$json['name']=$name."(Total no of heads ".$k." ) ".$date;

}
echo json_encode($json);



?>