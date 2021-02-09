<?php
include('../dbinfo.php');



$a_id = $_POST['frdate'];
$hrdtD1 = $_POST['hrdtD1'];
$query ="SELECT * from tbl_hr_audit LEFT JOIN tbl_hr_mast 
on tbl_hr_mast.hrid = tbl_hr_audit.hrid_id 
where tbl_hr_audit.tbl_hr_audit_date_id= '$a_id' ";



$result = mysqli_query($connect, $query);
$mlc_count = $result -> num_rows;
//echo $mlc_count;
$countid = 1;

$data=array();

  if(mysqli_num_rows($result) > 0)
{
$data_dep=array();
$query1="SELECT DISTINCT tbl_hr_audit.emp_department from tbl_hr_audit LEFT JOIN tbl_hr_mast on tbl_hr_mast.hrid = tbl_hr_audit.hrid_id where tbl_hr_audit.tbl_hr_audit_date_id= '$a_id' ";

$result1 = mysqli_query($connect, $query1);

while($row = mysqli_fetch_assoc($result1))
  {

    $data_dep[]=($row['emp_department']);

    
    
}

  
while($row = mysqli_fetch_assoc($result))
  {

    $data[]=($row);

    
    
}

$filterdata = array();
foreach ($data_dep as $like) {
            $result1 = array_filter($data, function ($item) use ($like) {
            if (( $item['emp_department']==$like) ) {
                return true;
            }
            return false;
       });


     $filterdata[] = $result1;
            }
 
}
$json = array();
$a=$b=$c=$d=$e=$f=$g=0;

$total=0;

foreach ($filterdata as $key => $value) {
  $json['a'][]=count($value);
}







$json['col_name']=$data_dep;
$json['date']="Hr Audit of date ".$hrdtD1;



echo json_encode($json);



?>