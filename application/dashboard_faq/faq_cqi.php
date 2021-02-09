<?php

include('../dbinfo.php');
$date = date('Y-m-d');

if(isset($_POST['chk1'])){

	$array=array(1,2,3,4,5,6,7,8,9,10,11,12);


  

	if($_POST['chk1']['qi']){
                 $qi=$_POST['chk1']['qi'];


                 foreach ($qi as $key => $value) {
                 	
                 	$sql ="UPDATE tbl_faq_cqi SET qi=1 , created_qi='$date' where pos=".$key;
    				
   					 
    					$connect->query($sql);
                 }


                 $result=array_diff($array,$qi);


                 foreach ($result as $key => $value) {
                 	
                 	$sql ="UPDATE tbl_faq_cqi  SET qi='' where pos=".$value;
    				
   					 
    					$connect->query($sql);
                 }


	}


	if($_POST['chk1']['hr']){
                 $hr=$_POST['chk1']['hr'];

                 foreach ($hr as $key => $value) {
                 	
                 	$sql ="UPDATE tbl_faq_cqi  SET hr=1 ,created_hr='$date'where pos=".$key;
    				
   					 
    					$connect->query($sql);
                 }

                  $result=array_diff($array,$hr);


                 foreach ($result as $key => $value) {
                 	
                 	$sql ="UPDATE tbl_faq_cqi  SET hr='' where pos=".$value;
    				
   					 
    					$connect->query($sql);
                 }


	}

}


echo "Faq saved Successfully";




?>