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



   $dArry[1] = array(0=>'The floor is free of dust, grit, litter, marks, water or other liquids');
	$dArry[2] = array(0=>'Inaccessible areas (edges, corners and around furniture) are free of dust , grit, lint and spots');
	$dArry[3] = array(0=>'There are no inappropriate items or equipment in the kitchen');
	$dArry[4] = array(0=>'There is no evidence of infestation or animals in the kitchen');
	$dArry[5] = array(0=>'Fly screens are in place where required');
	$dArry[6] = array(0=>'There is a policy regarding patient and visitor access to the kitchen');
	$dArry[7] = array(0=>'Cleaning materials used in the kitchen are identifiable (e.g color coded) and are  stored separately to other ward cleaning equipment and away from food.');
	$dArry[8] = array(0=>'Hand wash sink, liquid soap and disposable paper towels are available');
	$dArry[9] = array(0=>'Hand wash  is performed before and after handling food');
	$dArry[10] = array(0=>'Shelves, cupboards and drawers are clean inside and out and are free from damage, dust litter or stains and in a good state of repair');
	$dArry[11] = array(0=>'Kitchen trolleys are clean and in a good state of repair');
	$dArry[12] = array(0=>'Refrigerators / freezers are clean and free of ice build up');
	$dArry[13] = array(0=>'There is evidence that daily temperature are recorded and appropriate temperature must be less than 8  deg C, freezer – 18 deg C');
	$dArry[14] = array(0=>'Patient and staff food in the fridge is labeled with name and date');
	$dArry[15] = array(0=>'There are no drugs / blood for transfusion or pathology specimens in the fridge');


	$dArry1[16] = array(0=>'Microwaves');
	$dArry1[17] = array(0=>'Toasters');
	$dArry1[18] = array(0=>'Milk coolers');
	$dArry1[19] = array(0=>'Ice machines');
	$dArry1[20] = array(0=>'Water coolers');
	$dArry1[21] = array(0=>'Where local policy allows a microwaves to be used to heat patient food a temperature probe is used to ensure correct temperature has been reached');
	$dArry1[22] = array(0=>'Bread is stored in a clean bread bin');
	$dArry1[23] = array(0=>'All food product are within their expiry date');
	$dArry1[24] = array(0=>'All opened food is covered or stored in containers');
	$dArry1[25] = array(0=>'Milk is stored under refrigerator conditions');


	$dArry2[26] = array(0=>'Water coolers');
	$dArry2[27] = array(0=>'Ice machines');
	$dArry2[28] = array(0=>'There is a satisfactory system for cleaning crockery and cutlery such as central wash up or dishwashers, achieving disinfection temperature evidence by a maintenance programme');
	$dArry2[29] = array(0=>'Disposable paper roll is available for drying equipment and surfaces');
	$dArry2[30] = array(0=>'Waste bins are foot operated and in good working order');
	$dArry2[31] = array(0=>'There is a separate bin for general waste and food waste and
	infectious waste');
	$dArry2[32] = array(0=>'All food handlers are vaccinated against typhoid');
	$dArry2[33] = array(0=>'There is no inadvertent use of gloves');




      $output = '';
	$output .= '
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
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
	<th width="25%"><strong>Kitchens</strong></th>
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
															
							<th colspan="6"><strong>Following articles are visibly clean</strong></th>
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
							<th colspan="6"><strong>A pre- planned maintenance programme and cleaning schedule is in place for</strong></th>
						</tr>
						';

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
				<form action="audit_hh/hic9Excel.php" method="post">

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