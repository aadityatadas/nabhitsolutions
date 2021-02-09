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



    $dArry[1] = array(0=>'Does your facility have a policy that requires prescribes to document in the medical record or during order entry a dose, Duration and indication for all antibiotic prescriptions?');
	$dArry[2] = array(0=>'Does your facility have specific treatment recommendations, based on national guidelines and local susceptibility, To assist with antibiotic selection for common clinical condition?');
	$dArry[3] = array(0=>'Specific interventions to improve antibiotics use :');
	$dArry[4] = array(0=>'Is there a formal procedure for all clinicians to review the appropriateness of all antibiotics 48 hours after the initial Order (e.g. antibiotic time out)?');
	$dArry[5] = array(0=>'Do specified antibiotic agents need to be approved by a physician or pharmacist prior to  dispensing (ie pre authorization) at your Facility?');
	$dArry[6] = array(0=>'Does a physician or pharmacist review courses of therapy for specified antibiotic agents (i.e., prospective audit with feedback) At your facility?');
	$dArry[7] = array(0=>'Automatic changes inform intravenous to oral antibiotic therapy in appropriate situations?');
	$dArry[8] = array(0=>'Dose optimization (Pharmacokinetics/ pharmacodynamics) to Optimize the treatment of organism with reduced susceptibility?');
	$dArry[9] = array(0=>'Automatic alerts in situation where therapy might be Unnecessarily duplicative ?');

	$dArry1[10] = array(0=>'Doses your facility have specific  interventions in place to ensure optimal use of antibiotics to treat the following common infections?');
	$dArry1[11] = array(0=>'Community acquired pneumonia');
	$dArry1[12] = array(0=>'Urinary tract infection');
	$dArry1[13] = array(0=>'Skin and soft tissue infection');
	$dArry1[14] = array(0=>'Surgical prophylaxis');
	$dArry1[15] = array(0=>'Empiric treatment of Methicillin – resistant Staphylococcus Aureus (MRSA)');
	$dArry1[16] = array(0=>'Culture – proven invasive (e.g. blood stream) infection');


	$dArry2[17] = array(0=>'Dose your stewardship program monitor adherence to a Documentation policy (dose, duration and indication)?');
	$dArry2[18] = array(0=>'Does your stewardship program monitor adherence to facility Specific treatment recommendations?');
	$dArry2[19] = array(0=>'Does your sterwardship program monitor adherence compliance With one of more of the specific interventions in place ?');

	$dArry3[20] = array(0=>'Does your facility  track rates of C. difficile infection?');
	$dArry3[21] = array(0=>'Does your facility produce an antibiogram (cumulative antibiotic) susceptibility report?');
	$dArry3[23] = array(0=>'Does your facility monitor antibiotic use (consumption) at the unit and / or facility wide level by one of the following metrics :');
	$dArry3[24] = array(0=>'By counts of antibiotics (s) administered to patients  Per day (Days of Therapy DOT)?');
	$dArry3[25] = array(0=>'By numbers of grams of antibiotics used (Defined daily dose, DDD)?');
	$dArry3[26] = array(0=>'By direct expenditure for antibiotics (purchasing costs) ?');

	$dArry4[27] = array(0=>'Dose your stewardship program share facility – specific reports On antibiotics use with prescribes?');
	$dArry4[28] = array(0=>'Has a current antibiogram been distributed to prescribes At your facility?');
	$dArry4[29] = array(0=>'Do prescribes ever receive direct, personalized communication about how they can improve their antibiotic prescribing?');

	$dArry5[30] = array(0=>'Does your sterwardship program education to clinicians and other relevant staff on improving antibiotic prescribing ?');




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
	<th width="25%"><strong>AUDIT ON ANTIMICROBIAL STEWARDSHIP – FACILITY AUDIT</strong></th>
	<th width="20%">Yes</th>
	<th width="20%">No</th>
	<th width="20%">NA</th>
	<th width="35%">Comment</th>
	</tr>
	</thead>

	 <tbody>
						<tr>
							<th colspan="6"><strong>ACTIONS TO SUPPORT OPTIMAL ANTIBIOTIC USE</strong></th>
						</tr>
						<tr>
							<th colspan="6"><strong>Polices :</strong></th>
															
						</tr>
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
															
															<th colspan="6"><strong>Diagnosis & Infection Specific Interventions:</strong></th>
															
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

						$output .='<tr>
							<th colspan="6"><strong>TRACKING: MONITORING ANTIBIOTIC PRESCRIBING, USE, AND RESISTANCE :</strong></th>
						</tr>
						<tr>
							<th colspan="6"><strong>PROCESS MEASURES</strong></th>
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
						<th colspan="6"><strong>ANTIBIOTIC USE AND OUTCOME MEASURES</strong></th>
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

						$output .='<tr>
						<th colspan="6"><strong>REPORTING INFORMATION TO STAFF ON IMPROVING ANTIBIOTIC USE AND RESISTANCE</strong></th>
						</tr>';

						$k = 1;
						foreach ($dArry4 as $value) { 

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
						<th colspan="6"><strong>EDUCATION</strong></th>
						</tr>';

						$k = 1;
						foreach ($dArry5 as $value) { 

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
				<form action="audit_hh/hic22Excel.php" method="post">

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