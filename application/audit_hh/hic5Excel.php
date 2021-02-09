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



    $dArry[1] = array(0=>'Adequate facilities for hand hygiene are available In accordance with national guidance');
	$dArry[2] = array(0=>'Overall appearance of the environment is tidy and uncluttered with only appropriate, clean and Well maintained furniture used');
	$dArry[3] = array(0=>'Fabric of the environment and equipment is clean, fresh and pleasant');
	$dArry[4] = array(0=>'Rooms where clinical practice takes place are Not carpeted');
	$dArry[5] = array(0=>'Floor coverings are washable and impervious to Moisture and are sealed regularly');
	$dArry[6] = array(0=>'The complete floor, including edges and corners are visibly clean with no visible body Substances, dust, dirt or debris');
	$dArry[7] = array(0=>'Furnitures, fixtures and fittings are visibly clean With no body substances, dust, dirt or debris or Adhesive tape');

	$dArry1[9] = array(0=>'Lockers');
	$dArry1[10] = array(0=>'Chairs and stools');
	$dArry1[11] = array(0=>'Tables');
	$dArry1[12] = array(0=>'Medical equipment');
	$dArry1[13] = array(0=>'Curtains');
	$dArry1[14] = array(0=>'Changing mats');
	$dArry1[15] = array(0=>'Work station equipments : e.g. Phones, Computer key boards');
	$dArry1[16] = array(0=>'Fans');
	$dArry1[17] = array(0=>'Air vents');
	$dArry1[18] = array(0=>'Patient call bells');
	$dArry1[19] = array(0=>'Patient audio visual systems');
	$dArry1[20] = array(0=>'Toys');
	$dArry1[21] = array(0=>'Baby weighing scales');
	$dArry1[22] = array(0=>'All dispensers, holders and all parts of the Surfaces of dispensers of soap and alcohol gels');
	$dArry1[23] = array(0=>'Paper towel / cough / roll / toilet paper holders are visibly clean with no
	body substances, dust, Dirt or debris or adhesive tape');
	$dArry1[24] = array(0=>'Hand wash basins are visibly clean with no body substances, dust, lime scale stains  Deposits or smears');
	$dArry1[25] = array(0=>'Hand wash basins are dedicated for that use only and are free from used equipment and Inappropriate items');
	$dArry1[26] = array(0=>'Waste receptacles are clean, including lid and Pedal');
	$dArry1[27] = array(0=>'Foot pedals of clinical waste bins are in good Working order');
	$dArry1[28] = array(0=>'There is a procedure in place for regular Decontamination of curtains');
	$dArry1[29] = array(0=>'Furniture in patient areas e.g. chairs and Couches are made of impermeable and Washable materials');
	$dArry1[30] = array(0=>'Pillows are enclosed in a washable and Impervious cover');
	$dArry1[31] = array(0=>'Furniture that cannot be cleaned is condemned');
	$dArry1[32] = array(0=>'Tables are tidy and uncluttered to enable Cleaning');
	$dArry1[33] = array(0=>'Water coolers are visibly clean and on a planned Maintenance
	programme');
	$dArry1[34] = array(0=>'Soft toys are not available for communal use');
	$dArry1[35] = array(0=>'Feeding areas, bedding are changed and Cleaned regularly');

	$dArry2[36] = array(0=>'There is an identified area for the storage of Clean and sterile equipment');
	$dArry2[37] = array(0=>'All products are stored above floor level');

	$dArry3[38] = array(0=>'Bathrooms are not used for equipment storage');
	$dArry3[39] = array(0=>'Wall tiles and wall fixtures (including soap dispensers and towel holders) are clean and Free from mould');
	$dArry3[40] = array(0=>'Showers curtains and bath mats are free from Mould, clean and dry');
	$dArry3[41] = array(0=>'Appropriate cleaning materials are available for Staff to clean the bathroom between use (and There is information regarding its whereabouts)');

	$dArry4[42] = array(0=>'Toilets are visible clean with no body Substances, dust, lime scale stains, deposits Or smears – including underneath toilet seat');
	$dArry4[43] = array(0=>'Facilities are available for the safe disposal of sanitary towels');
	$dArry4[44] = array(0=>'Sanitary bins are replaced regularly with clean to prevent overfilling');

	$dArry5[45] = array(0=>'A dirty utility is available');
	$dArry5[46] = array(0=>'A separate sink is available for decontamination Of patient equipment');
	$dArry5[47] = array(0=>'A sluice hopper is available for the disposal of Body fluids');
	$dArry5[48] = array(0=>'Hand washing facilities are available including Soap and paper towels');
	$dArry5[49] = array(0=>'The room is clean and free from inappropriate Items');
	$dArry5[50] = array(0=>'The floor is clean and free from spillage');
	$dArry5[51] = array(0=>'Floors including edges and corners are free of Dust and grit');
	$dArry5[52] = array(0=>'Cleaning equipment is colour coded');
	$dArry5[53] = array(0=>'Mops and buckets are stored according to the Local policy');
	$dArry5[54] = array(0=>'Mop heads are washed with detergent daily and Dried');
	$dArry5[55] = array(0=>'The staff has knowledge about use of the Disinfectants');
	$dArry5[56] = array(0=>'There is a defined cleaning protocol available');




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
	<th width="25%"><strong>Environment</strong></th>
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
							<th colspan="6"><strong>The following are clean and free of splashes, soil, film, dust, fingerprints, and spillage and in a good state of repair free From rips and tears</strong></th>
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
							<th colspan="6"><strong>Clinical room / clean store</strong></th>
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
						<th colspan="6"><strong>Bathrooms/washrooms</strong></th>
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
						<th colspan="6"><strong>Toilets</strong></th>
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
						<th colspan="6"><strong>Dirty utility</strong></th>
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
				<form action="audit_hh/hic5Excel.php" method="post">

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