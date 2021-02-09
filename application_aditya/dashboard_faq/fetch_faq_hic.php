<?php
include('../dbinfo.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM tbl_faq_hic   
        LIMIT 24"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        
        

            
        
        $output[]=array('pos'=>$row['pos'] , 'hr'=>$row['hr'],'qi'=>$row['qi']);
        
    }

    echo json_encode($output);
}
?>