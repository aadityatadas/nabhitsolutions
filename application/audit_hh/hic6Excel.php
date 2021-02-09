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



    $dArry[1] = array(0=>'A written comprehensive decontamination policy,
approved by the ICC is available to all staff');
	$dArry[2] = array(0=>'Staffs are aware of the need to contact infection control
for advice when purchasing new equipment where IC may have a role to play');
	$dArry[3] = array(0=>"Manfacturer's instructions are available for the
decontamination of newly purchased equipment");
	$dArry[4] = array(0=>'Staff can state the procedure for decontamination of
	commonly used patient care equipment e.g. commodes, mattresses, IV stands');
	$dArry[5] = array(0=>'Staff can describe the symbol used to indicate single use
	items');
	$dArry[6] = array(0=>'Staff are aware of the needs for decontamination');
	$dArry[7] = array(0=>'Local decontamination of reusable surgical instruments
	is not undertaken in clinical areas');
	$dArry[8] = array(0=>'Used instruments are safely stored in an appropriate
	container prior to collection for decontamination in CSSD.');
	$dArry[9] = array(0=>'There is a cleaning protocol for dedicated patient
	equipments e.g. Bed frame, IV stands , commodes');
	$dArry[10] = array(0=>'The following general equipment is visibly clean, check:');
	$dArry[11] = array(0=>'IV stands');
	$dArry[12] = array(0=>'IV pumps/ syringe drivers');
	$dArry[13] = array(0=>'Cardiac monitors');
	$dArry[14] = array(0=>'Near patient testing equipment e.g blood gas machines');
	$dArry[15] = array(0=>'Dressing trolleys');
	$dArry[16] = array(0=>'Blood pressure cuffs');
	$dArry[17] = array(0=>'Pillows');
	$dArry[18] = array(0=>'Mattresses');
	$dArry[19] = array(0=>'Cot sides');
	$dArry[20] = array(0=>'Wheelchairs and cushions');
	$dArry[21] = array(0=>'Oxygen saturation probes');
	$dArry[22] = array(0=>'Patient wash bowls are dedicated individual patient');
	$dArry[23] = array(0=>'Patient wash bowls are decontaminated appropriately between patients and are stored clean dry and inverted');



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
	<th width="25%"><strong>Spillage and / or Contamination with blood/ body fluids</strong></th>
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
				<form action="audit_hh/hic6Excel.php" method="post">

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