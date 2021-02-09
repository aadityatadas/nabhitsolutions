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



    $dArry[1] = array(0=>'Endoscope decontamination is undertaken or supervised by a dedicated person(s) with a recognized qualification or Training endoscope decontamination');
	$dArry[2] = array(0=>'Staff have access to relevant documentation on Infection
	control endoscopy');
	$dArry[3] = array(0=>'Staff are aware of how to access the endoscope Reprocessing
	documents at any given time');
	$dArry[4] = array(0=>'Decontamination is performed by person(S) Conversant with the structure of the endoscope and trained in cleaning techniques');
	$dArry[5] = array(0=>'Manufacturers instruction manual for each type of Endoscope
	is available');
	$dArry[6] = array(0=>'Scope cleaning is undertaken immediately after the endoscope is used, to prevent drying and hardening Of
	secretions');
	$dArry[7] = array(0=>'A high level disinfectant  is used for appropriate time To allow cope decontamination');
	$dArry[8] = array(0=>'RO water is available for cleaning scopes');
	$dArry[9] = array(0=>'The endoscope decontamination area must be separate and
	have at least 10 to 12 ACH/hour');

	$dArry1[10] = array(0=>'All valves and buttons are removed before leak testing');
	$dArry1[11] = array(0=>'Leak test is performed as per manufacturers Instructions');
	$dArry1[12] = array(0=>'Manufacturers cleaning instructions are available and
	Followed');
	$dArry1[13] = array(0=>'Appropriate enzymatic detergents/bio-film removal Agents are
	used');
	$dArry1[14] = array(0=>'Warm water (35°C) is used with enzymatic solution For
	optimum efficacy');
	$dArry1[15] = array(0=>'Detergent and water dilution is measured to ensure Correct
	dilution');
	$dArry1[16] = array(0=>'Detergent is left in contact with the endoscope Surfaces for
	manufactures specified time');
	$dArry1[17] = array(0=>'Appropriate cleaning equipment is used e.g. cleaning Brushes');
	$dArry1[18] = array(0=>'Appropriately sized cleaning brushes are used to Clean
	channels');
	$dArry1[19] = array(0=>'All surfaces of the endoscope, including internal and External are cleaned');
	$dArry1[20] = array(0=>'Running water is used for rinsing to ensure all debris And
	detergents are removed prior to disinfection');
	$dArry1[21] = array(0=>'Clean water is used to rinse the internal channels Through the
	cleaning adaptors');
	$dArry1[22] = array(0=>'Cleaning brushes are inspected and replaced when Worn or
	kinked');
	$dArry1[23] = array(0=>'Work areas as well ventilated and include at least One sink
	which is designated dirty');

	$dArry2[24] = array(0=>'A sink or container of disinfectant chemical is
	Contained within a fume extraction system');
	$dArry2[25] = array(0=>'A sink designated for rinsing only clean instruments is
	Available and contained within a fume extraction Cover');
	$dArry2[26] = array(0=>'Manufacturers instructions are followed');
	$dArry2[27] = array(0=>'Endoscope channels are dried prior to and after
	Installation of 70% alcohol');

	$dArry3[28] = array(0=>'Manufacturers instructions are followed');
	$dArry3[29] = array(0=>'Thorough cleaning precedes disinfection is in AER');
	$dArry3[30] = array(0=>'Water supplies are plumbed into machines');
	$dArry3[31] = array(0=>'Pre-filters are installed prior to water supply  into the
	Automated re-processor');
	$dArry3[32] = array(0=>'Pre-filters are regularly serviced and monitored');
	$dArry3[33] = array(0=>'Fresh RO water is used for each cycle');
	$dArry3[34] = array(0=>'Machines which contain a tank of disinfectant for Reuse are monitored for disinfection concentration
	Daily (each cycle for OPA)');
	$dArry3[35] = array(0=>'AER machines have a cycle for auto-disinfection');
	$dArry3[36] = array(0=>'Proof of process : a printout of cycle parameters is
	Available');
	$dArry3[37] = array(0=>'A maintenance schedule which includes tanks, pipes, Strainers and filters of both the machine and water Treatment
	systems are available');
	$dArry3[38] = array(0=>'Endoscope channels are dried prior to and after Installation of
	70% alcohol');

	$dArry4[39] = array(0=>'Clean, dry, well ventilated, dedicated storage cupboard, which permits full length hanging on appropriate support structures Or Drying cabinet which provides continuous passage Of HEPA filtered air');


	$dArry5[40] = array(0=>'Every list, including the order of the order of the
	Patients on the list.');
	$dArry5[41] = array(0=>'Every endoscope reprocessed including : date of procedure, patient details, instrument details, temperature of biocide,
	immersion time in biocide');
	$dArry5[42] = array(0=>'Name of person who manually cleaned the instrument, rinsed, disinfected, final rinsed and tested temperature of biocide, time immersed n the biocide, connected the instrument to the AER and removed The scope from the changed');
	$dArry5[43] = array(0=>'Batch number of biocide, date biocide was decanted Into tank
	and date biocide changed');
	$dArry5[44] = array(0=>'Daily test of minimum effective concentration of the biocide (for manual soaking or AER which contain a tank of disinfection for reuse) and name of person Who tested the biocide (each cycle for OPA)');
	$dArry5[45] = array(0=>'A unit based record is kept regardless of the information
	contained in the patient health care record');
	$dArry5[46] = array(0=>'Computer print-outs from an AER are attached to the Unit
	record');

	$dArry6[47] = array(0=>'Testing is performed according to the manufacturers
	Instructions');
	$dArry6[48] = array(0=>'Results of the test are documented as proof of Process and
	name of person performing the test Documented');

	$dArry7[49] = array(0=>'AERs are monitored every four (4) weeks.');
	$dArry7[50] = array(0=>'Duodenoscopes and bronchoscopes are monitored Every four
	(4) weeks');
	$dArry7[51] = array(0=>'All gastrointestinal endoscopes are monitored every Three (3)
	months');
	$dArry7[52] = array(0=>'Endoscopes which are processed through a sterilization cycle and are stored in a wrapped state Are monitored every three (3) months');
	$dArry7[53] = array(0=>'Endoscopes on loan are tested within 2 working days Of receipt of the endoscope. The loan endoscope is then retested according to the schedule for the type Of endoscope if it remains on loan for that interval');
	$dArry7[54] = array(0=>'Further microbiological screening is undertaken in consultation with a Clinical Microbiological if :  Major changes are made in the endoscopy unit  Personnel responsible for reprocessing. There is a clinical suspicion of cross-infection related to endoscopy. Alterations are made to the plumbing of the Endoscopy reprocessing area. New protocols are published. New models of equipment (endoscope or AFER)  Are used. In response to positive surveillance cultures');


	$dArry8[55] = array(0=>'First employed');
	$dArry8[56] = array(0=>'Updated annually');
	$dArry8[57] = array(0=>'Any changed in process');
	$dArry8[58] = array(0=>'New reprocessing equipment purchased');
	$dArry8[59] = array(0=>'New medical equipment / devices requiring Reprocessing
	purchased');

	$dArry9[60] = array(0=>'Ultra sonic washers');
	$dArry9[61] = array(0=>'AER machines have a cycle for auto-disinfection');
	$dArry9[62] = array(0=>'Manual disinfection systems');

	$dArry10[63] = array(0=>'Standard Precautions and Workplace Health and Safety protocols are applied during all stages of Cleaning and
	reprocessing of endoscopes');
	$dArry10[64] = array(0=>'Items designated to be reprocessed are processed to A level
	for their intended use');
	$dArry10[65] = array(0=>'Material Safety Data Sheets (MSDS) are available for All cleaning agents and chemicals. MSDS have been read and understood by staff Prior to initial use');
	$dArry10[66] = array(0=>'Process are in place to notify the Unit Manager or Shift coordinator of all faults with AER and Endoscope reprocessing');
	$dArry10[67] = array(0=>'Incidents relating to the reprocessing of endoscopes Are reported, risk rated and actions taken are Documented. Endoscopy Unit is provided with a summary of Incidents
	regularly (e.g. HICC / ICT / Safety)');
	$dArry10[68] = array(0=>'There is a record available to subsequent users of the stored gastroscopes and colonoscopes indicating The date and time
	they were last reprocessed');




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
	<th width="25%"><strong>Endoscopy</strong></th>
	<th width="20%">Yes</th>
	<th width="20%">No</th>
	<th width="20%">NA</th>
	<th width="35%">Comment</th>
	</tr>
	</thead>

	 <tbody>
						
						<tr>
							<th colspan="6"><strong>Operations</strong></th>
															
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
						<th colspan="6"><strong>A protocol for scope manual cleaning is followed and includes but is not limited to :</strong></th>
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
							<th colspan="6"><strong>When an AER machine is utilized for disinfection</strong></th>
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
						<th colspan="6"><strong>Gastroscopes and colonoscopes are stored in Either:</strong></th>
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
						
						<th colspan="6"><strong>QUALITY ASSURANCE</strong></th>
						<th colspan="6"><strong>Records are kept and shall include, but are not Limited to the following :</strong></th>
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

						$output .='<tr>
						<th colspan="6"><strong>The efficacy of the ultrasonic cleaner is tested Daily or when used</strong></th>
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
						$output .='<tr>
						<th colspan="6"><strong>Microbiological testing of endoscopes and AFER Are routinely performed</strong></th>
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
						$output .='<tr>
						<th colspan="6"><strong>EDUCATION</strong></th>
						<th colspan="6"><strong>Managed and staff are educated on how to Reprocess instruments when :</strong></th>
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
						$output .='<tr>
						<th colspan="6"><strong>Evidence is available of staff who have been Trained in the use of decontamination equipment Including :</strong></th>
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
						$output .='<tr>
						<th colspan="6"><strong>MANAGEMENT</strong></th>
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
				<form action="audit_hh/hic18Excel.php" method="post">

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