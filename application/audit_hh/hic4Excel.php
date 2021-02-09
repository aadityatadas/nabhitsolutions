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



   $dArry[1] = array(0=>'The organization has comprehensive procedures/ policy of dealing with body fluid spillages');
	$dArry[2] = array(0=>'Staffs has received training in dealing with body fluid spillages.');
	$dArry[3] = array(0=>'Staff who come in contact with spillages have been successfully
	immunized against Hepatitis B');
	$dArry[4] = array(0=>'Staff are aware of how to contact the Occupational Health
	Department / IC Team in the event of an inoculation accident');
	$dArry[5] = array(0=>'All equipment and the environment is visibly clean with no body
	substances, dust dirt or debris');
	$dArry[6] = array(0=>'Dedicated spillage kits are available for decontaminating and
	cleaning body fluids');
	$dArry[7] = array(0=>'Personal protective r\equipment is available');
	$dArry[8] = array(0=>'Equipment used to clear up body fluid spillages is disposable or able
	to be decontaminated');
	$dArry[9] = array(0=>'Appropriate disinfectants are available for cleaning all body fluid
	spillages');
	$dArry[10] = array(0=>'Sodium hypochlorite solution in the strength 1:10000ppm (1%) OR NaDCC(Sodium Dichloroisocyanurate) is available.');



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
               <th colspan="6" align="center" >Spillage and / or Contamination with blood/ body fluids</th>
               
            </tr>

             <tr>
               <th colspan="6"></th>
               
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
				<form action="audit_hh/hic4Excel.php" method="post">

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