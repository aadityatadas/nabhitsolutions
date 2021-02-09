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



        $dArry[1] = array(0=>'There is a written documentation on Infection control in CSSD');
	$dArry[2] = array(0=>'The staff have access to relevant documentation On infection control');
	$dArry[3] = array(0=>'There is a unidirectional division of areas in CSSD to segregate Sterile and unsterile sections.');

	$dArry1[4] = array(0=>'The receiving counter is away from issue counter');
	$dArry1[5] = array(0=>'Hand basin, liquid soap and hand towels are available');
	$dArry1[6] = array(0=>'Protective clothing is worn for sorting instruments ie water Proof aprons and gloves');
	$dArry1[7] = array(0=>'The items are disassembled prior to cleaning');
	$dArry1[8] = array(0=>'Enzymatic solutions are prepared as per manafacturers Instruction for dilution and usage life.');
	$dArry1[9] = array(0=>'Hot water or disinfectant is not used before rinsing the Instruments with cold water');
	$dArry1[10] = array(0=>'There is a dedicated brush used for cleaning and Decontaminated after every use');
	$dArry1[11] = array(0=>'Brushing of the instruments is not done openly, but done under Surface of water and enzymatic solution');
	$dArry1[12] = array(0=>'Staff are aware of the correct procedure for disposing of Any sharps safely if found');
	$dArry1[13] = array(0=>'Bins/ Trolleys are clean with no broken surfaces and In good condition');
	$dArry1[14] = array(0=>'There is a process for cleaning and maintaining the bins/ trolleys');
	$dArry1[15] = array(0=>'The area is clean and free of litter and extraneous items');
	$dArry1[16] = array(0=>'Floors are slip resistant, with no broken surfaces');
	$dArry1[17] = array(0=>'Wall and ceilings and exposed pipes are clean and free from lint, dust and dirt');

	$dArry2[18] = array(0=>'Length of drying times cycle available');
	$dArry2[19] = array(0=>'The  instruments are inspected to ensure appropriate Drying is done');
	$dArry2[20] = array(0=>'The instruments are inspected for any rust or stains Especially at the joints');
	$dArry2[21] = array(0=>'There is a dry storage area and items are not touching Any surface (floor / ceiling)');
	$dArry2[22] = array(0=>'Staff are aware of the correct procedure following a blood / Body fluid exposure');

	$dArry3[23] = array(0=>'Perforated containers used for packaging');
	$dArry3[24] = array(0=>'Dedicated containers are used for packing & sterilization');
	$dArry3[25] = array(0=>'All items needed for a particular pack are checked prior To packaging');
	$dArry3[26] = array(0=>'Packing is done in way to prevent any part of content Getting exposed to air');
	$dArry3[27] = array(0=>'The area is clean and free of liter and extraneous items');
	$dArry3[28] = array(0=>'Floors are slip resistant, with no broken surfaces');
	$dArry3[29] = array(0=>'Wall and ceilings and exposed pipes are clean and  free from lint, Dust and dirt');

	$dArry4[30] = array(0=>'Sterilization area is separate from sterile storage and issue');
	$dArry4[31] = array(0=>'Autoclave monitoring temperature and pressure are checked daily');
	$dArry4[32] = array(0=>'Chemical indicator are kept with every load');
	$dArry4[33] = array(0=>'Biological indicator checked once a week at the minimum');
	$dArry4[34] = array(0=>'The instruments are not in closed position during sterilization');
	$dArry4[35] = array(0=>'Flash sterilization is not routinely used');

	$dArry5[36] = array(0=>'There is no backtracking of sterile goods');
	$dArry5[37] = array(0=>'Storage area is dedicated for sterile instruments and sterile Trays only');
	$dArry5[38] = array(0=>'The environment is not hot or humid');
	$dArry5[39] = array(0=>'Environment monitors are present and temperature is checked And recorded daily');
	$dArry5[40] = array(0=>'There is a dry storage area and items are not touching Any surface (floor/ ceiling)');
	$dArry5[41] = array(0=>'There is a date of sterilization and expiry date');
	$dArry5[42] = array(0=>'Written on  every load');
	$dArry5[43] = array(0=>'The items are checked for expiry date periodically');
	$dArry5[44] = array(0=>'The area is clean  and free and litter and extraneous items');
	$dArry5[45] = array(0=>'Floors are slip resistant, with no broken surfaces');
	$dArry5[46] = array(0=>'Wall and ceilings and exposed pipes are clean and Free from lint, dust and dirt');

	$dArry6[47] = array(0=>'There is one way movement from receiving counter to Issue counter');
	$dArry6[48] = array(0=>'The issue counter door is always kept closed');
	$dArry6[49] = array(0=>'The door closes without any gap');
	$dArry6[50] = array(0=>'Items are distributed in a clean trolley to the department.');



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
	<th width="25%"><strong>CSSD</strong></th>
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
															
															<th colspan="6"><strong>Receiving area / cleaning area</strong></th>
															
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
							<th colspan="6"><strong>Drying area</strong></th>
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
						<th colspan="6"><strong>Packaging area</strong></th>
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
						<th colspan="6"><strong>Sterilization area</strong></th>
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
						<th colspan="6"><strong>Storage area</strong></th>
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
						<th colspan="6"><strong>Issue counter</strong></th>
						</tr>';

						$k = 1;
						foreach ($dArry6 as $value) { 

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
				<form action="audit_hh/hic21Excel.php" method="post">

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