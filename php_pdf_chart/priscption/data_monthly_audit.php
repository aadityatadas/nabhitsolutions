<?php  

//index.php
include("../../application/dbinfo.php");





if(isset($_POST["max"]) && isset($_POST["min"]))
{

	if(isset($_POST['frm'])){

	if($_POST['frm']){	
	$a = array('role'=>'annotation');
	$dataAll[] = array('Month', '% of Yes',$a );

	
		$max=$_POST["max"];
		$min=$_POST["min"];
	 	$yearR1= $_POST['year'];
	 	$col=$_POST['frm'];
	 	$tbl=$_POST['tbl'];


		$monthsAll = array();

		
		

		for($i= $min;$i<=$max;$i++){

		  $d_present=0;


		  	$query = "SELECT $col FROM $tbl WHERE (month(monthyear)='$i' AND  year(monthyear)='$yearR1')";



			$result = mysqli_query($connect, $query);
			$count = $result -> num_rows;

			


 		foreach ($result as $key => $row) {
   

   				if($row[$col]=='Yes'){
      						$d_present++;
    			}
    
	}

	if($count){
       $d_present_per=($d_present/$count)*100;
      

       $monthName = date("F", mktime(0, 0, 0, $i, 10))."-".$yearR1;

       $monthsAll[] = $monthName;
       $dataAll[] = array(
            $monthName,(int)$d_present_per,(int)$d_present_per
            
   	);

      

   }

	



}
     
		  
echo json_encode($dataAll);
		 
}

}

}



 
?>