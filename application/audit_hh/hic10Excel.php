<?php  

//index.php
include("../dbinfo.php");




if(isset($_POST["fdate"],$_POST["tdate"])){



$tblname = $_POST['tblname'];
//$audit_name = $_POST['audit_name'];
$output = array();

  
$sq = "SELECT * FROM $tblname WHERE (dateVal BETWEEN '".$_POST["fdate"]."' AND '".$_POST["tdate"]."') ORDER BY id ASC";
$statement = $connection->prepare($sq);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);



    $output = '';
  $output .= '
  <table class="table" border="1" style="text-align:center">
 <thead>

 <tr> 
           
           <th colspan="16" style="text-align: center;">
             <img src="'.HOSPITAL_NAME_IMAGE.'"  alt="" width="200" height="150"  style="text-align: center;">
           </th>

           

             
         </tr>
            <tr>
              <th colspan="16" >
               
                <h1 style="text-align: center; text-decoration: underline;">'.HOSPITAL_NAME.'</h1> 
                 
              </th>
                    
            </tr>
                      <tr>
                       <th colspan="4" style="text-align:center">Moment</th>
                        <th colspan="3" style="text-align:center">Subject</th>
                        <th colspan="4" style="text-align:center">Process of HH</th>
                         <th colspan="5" style="text-align:center">Moment of HH</th>
                      </tr>
                      <tr>
	                      <th rowspan="2">Shift & Time</th>
	                      <th rowspan="2">Date</th>
	                      <th rowspan="2">WD / WE</th>
	                      <th rowspan="2">Time</th>	
	                      <th rowspan="2">Health Care Professional: MD: Medical doctor/ N: Nurse / AS: Ancillary staff </th>
	                      <th rowspan="2">Name initials </th>
	                      <th rowspan="2">Gender : F/M</th>
	                      <th rowspan="2">H.H: Y/N</th>
	                      <th rowspan="2">Technique: A / I</th>	
	                      <th rowspan="2">Used product: A/C/I/NM</th>
	                      <th rowspan="2">Used towel</th>
	                      <th>Moment 1</th>
	                      <th>Moment 2</th>
	                      <th>Moment 3</th>
	                      <th>Moment 4</th>
	                      <th>Moment 5</th>
                      </tr>
			            <tr>
			            <th style="text-align:center">Before patient contact (Noninvasive procedure) </th>
			            <th style="text-align:center">Before aseptic task (Invasive procedure)</th>
			            <th style="text-align:center">After body fluid exposition risk </th>
			            <th style="text-align:center">After patient contact</th>
			            <th style="text-align:center">After touching patient\'s surroundings. </th>
			            </tr>
                      </tr>
                      
                    </thead>

   <tbody>
            
  ';
  
        foreach ($result as $row) {
          $output .= '

          <tr>
                       <td>'.$row["sTime"].'</td>
                        <td>'.$row["dateVal"].'</td>
                        <td>'.$row["day"].'</td> 
                        <td>'.$row["timeVal"].'</td> 
                        <td>'.$row["prof"].'</td>
                        <td>'.$row["nameVal"].'</td> 
                        <td>'.$row["sex"].'</td>
                        <td>'.$row["hh"].'</td>
                        <td>'.$row["tech"].'</td> 
                        <td>'.$row["usedProduct"].'</td>
                        <td>'.$row["towel"].'</td>
                        <td style="text-align:center">'.$row["noninvasive"].'</td>
                        <td style="text-align:center">'.$row["invasive"].'</td>
                        <td style="text-align:center">'.$row["fluid"].'</td> 
                        <td style="text-align:center">'.$row["contact"].'</td> 
                        <td style="text-align:center">'.$row["surroundings"].'</td>
                      
                      </tr>';

        }


  

            $output .= '</tbody></table>';
  

  

            $output .= '</tbody></table>';

            
                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=download.xls');
                echo $output;
           




} else{
  echo "Error In Quater Selection Selection";

  die();
}

?>