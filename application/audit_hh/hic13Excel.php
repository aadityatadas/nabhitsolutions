<?php
   include"../dbinfo.php";

  $tbl = $_POST['tbl'];
	$output = array();
	$qut = explode('_', $_POST["user_id"]);
	$statement = $connection->prepare(
		"SELECT * FROM $tbl 
		WHERE quarter = '".$qut[0]."' and month_id = '".$qut[1]."'"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	//count($result);
	/*print_r($result[0]);
	die();*/



    $dArry[1] = array(0=>'Invasive ventilation');
	$dArry[2] = array(0=>'Non invasive ventilation');
	$dArry[3] = array(0=>'Tracheotomy ventilation');
	$dArry[4] = array(0=>'30-45degree elevation of head');
	$dArry[5] = array(0=>'Gastric over distention');
	$dArry[6] = array(0=>'Subglottic suctioning');
	$dArry[7] = array(0=>'Endotracheal cuff pressure Of at least 20 cm of water');
	$dArry[8] = array(0=>'Stress ulcer prophylaxis');
	$dArry[9] = array(0=>'Oral intubation');
	$dArry[10] = array(0=>'Naso – tracheal intubation');
	$dArry[11] = array(0=>'Tracheal intubation');
	$dArry[12] = array(0=>'Comprehensive oral care with an antiseptic solution');
	$dArry[13] = array(0=>'Condensate in ventilator circuits');



      $output = '';
	$output .= '
	<table class="table" border="1">
	<thead>
	<tr> 
           
           <th colspan="6" style="text-align: center;">
             <img src="'.HOSPITAL_NAME_IMAGE.'"  alt="" width="200" height="150" >
           </th>

           

             
         </tr>
            <tr>
              <th colspan="6" >
               
                <h1 style="text-align: center; text-decoration: underline;">'.HOSPITAL_NAME.'</h1> 
                 
              </th>
                    
            </tr>

	<tr>
	<th width="10%">sr.no</th>
	<th width="25%"><strong>Care ventilated patient</strong></th>
	<th width="20%">Yes</th>
	<th width="20%">No</th>
	<th width="20%">NA</th>
	<th width="35%">Comment</th>
	</tr>
	</thead>

	 <tbody>
						
  ';
  $n = 1;
  $k = 1;
  $ye = 0;
  $no = 0;
  $na = 0;



  foreach ($dArry as $value) { 

  if($result[$n - 1]['yn_val'] == 'Yes')
  	{
  		
  		$ye++;
  	} 
  elseif($result[$n - 1]['yn_val'] == 'No')
	  {
	  	$no++;

	  }
  elseif($result[$n - 1]['yn_val'] == 'NA')
  {
  	$na++;
  }
						
						$output .= "
						
						<tr>
							<td>". $k ."</td>
							<td>".$value[0]."</td>
							<td>
								<label class='radio-inline'>";

								$output .= ($result[$n - 1]['yn_val'] == 'Yes') ? $result[$n - 1]['yn_val'] : '' ;
										
									 $output .="
								</label>
							</td>
							<td>
								<label class='radio-inline'>
									";
									$output .= ($result[$n - 1]['yn_val'] == 'No') ? $result[$n - 1]['yn_val'] : '' ;
										
									$output .= "
									
								</label>
							</td>
							<td>
								<label class='radio-inline'>
									";
									$output .= ($result[$n - 1]['yn_val'] == 'NA') ? $result[$n - 1]['yn_val'] : '' ;
										
										
									$output .= "
								</label>
							</td>
							<td>
								" .$result[$n - 1]['cmmnt'] ."
							</td>
						</tr>";
						$n++; $k++; } 




						$output .= "<tr>

							<td colspan='2' style='text-align: center;''>Total</td>
							<td>".  $ye ."</td>
							<td>".  $no ."</td>
							<td>".  $na ."</td>
							<td></td>
						</tr>";

						$output .= '</tbody></table>';
  

 if ($_POST['ptbl'] == 'ptbl') { ?>
	

	
	<div class="col-lg-12" id="tableWrap">
		<div class="pull-right">
				<form action="audit_hh/hic13Excel.php" method="post">

					<input type="hidden" name="user_id" value="<?= $_POST["user_id"]?>">
					<input type="hidden" name="tbl" value="<?= $_POST['tbl']?>">
					<input type="hidden" name="ptbl" value="<?= $_POST['etbl']?>">
					<input type="submit" class="btn btn-success" name="Excel" value="Excel">
					
				</form>
			</div>
		
		<div class="col-lg-12">

			<?= $output ?>
			
			</div>

		</div >

<?php } 

else{

	
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
}

?>