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



    $dArry[1] = array(0=>'Items on the resuscitation trolley ( including open containers of sterile solution) are in date and visibly clean (free from dust');
	$dArry[2] = array(0=>'Cleaning and disinfection of ambu bags is done between patient use');
	$dArry[3] = array(0=>'Cleaning and disinfection of Laryngoscope is done between patient use');

	$dArry1[4] = array(0=>'Suction equipment is clean and dry (including canister)');
	$dArry1[5] = array(0=>'Catheter is note attached');
	$dArry1[6] = array(0=>'Respiratory equipment - Cleaning and disinfection is done between patient use if not dedicated.');
	$dArry1[7] = array(0=>'Respiratory equipment - Cleaning and disinfection is done between patient use if not dedicated.');
	$dArry1[8] = array(0=>'Oxygen masks/ nasal cannulae');
	$dArry1[9] = array(0=>'Nebuliser');

	$dArry2[10] = array(0=>'Ventilator tubing is protected by filters - expiratory');
	$dArry2[11] = array(0=>'Ventilator is protected by a filter - inspiratory');
	$dArry2[12] = array(0=>'Ventilator equipment is on a pre-planned maintenance programme');
	$dArry2[13] = array(0=>'Ventilator equipment is visibly clean');
	$dArry2[14] = array(0=>'Decontamination is done as per protocol');

	$dArry3[15] = array(0=>'Appropriate facilities are available and in working order, to ensure correct disposal ( or disinfection) of bedpans and urinals e.g.macerator or washer disinfector');
	$dArry3[16] = array(0=>'If disposal process is manual, staff performing are well aware of the procedure and the rationale');
	$dArry3[17] = array(0=>'Bedpans/potties, slipper pans/bedpan holders/urinals are visibly clean');
	$dArry3[18] = array(0=>'Bedpans/bedpan holders/ urinals are stored inverted on racks');
	$dArry3[19] = array(0=>'If reusable dedicated jugs are in use for emptying catheter bags appropriate washing and disinfection facilities are available');
	$dArry3[20] = array(0=>'There is a regular cleaning schedule for special equipments e.g physiotherapy');




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
	<th width="25%"><strong>Resuscitation equipment</strong></th>
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
						$output .='<tr>
							<th colspan="6"><strong>The Oxygen and suction equipments</strong></th>
						</tr>';

						$k = 1;
						foreach ($dArry1 as $value) { 

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
						
						$output .= "<tr>
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

						$output .='
						<tr>
							<th colspan="6"><strong>Ventilator equipment</strong></th>
						</tr>';

						$k = 1;
						foreach ($dArry2 as $value) { 

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
						
						$output .= "<tr>
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

						$output .='<tr>
						<th colspan="6"><strong>Sanitary equipment</strong></th>
						</tr>';

						$k = 1;
						foreach ($dArry3 as $value) { 

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
						
						$output .= "<tr>
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
				<form action="audit_hh/hic7Excel.php" method="post">

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