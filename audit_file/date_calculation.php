
<?php


function date_range_find($Date1 , $Date2){
	$datearray = array(); 
  

$Variable1 = strtotime($Date1); 
$Variable2 = strtotime($Date2); 
  

for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                $currentDate += (86400)) { 
                                      
$Store = date('Y-m-d', $currentDate); 
$datearray[] = $Store; 
} 

   return $datearray;
}



?>