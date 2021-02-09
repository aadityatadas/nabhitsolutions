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
	



    $dArry[1] = array(0=>'Is there a named lead person responsible for infection Prevention and control?');
	$dArry[2] = array(0=>'Does the job description of the named lead person outline responsibilities in respect of infection prevention And control?');
	$dArry[3] = array(0=>'Are there up to date local contact telephone numbers available to obtain advice pertaining to infection Prevention and control?');
	$dArry[4] = array(0=>'Is there evidence of a process for reporting up towards
	Incidents in relation to infection and control?');
	$dArry[5] = array(0=>'Is there evidence that audits have been undertaken and Practice changed to improve infection prevention And control?');
	$dArry[6] = array(0=>'Is mandatory surveillance data fed back to staff?');
	$dArry[7] = array(0=>'Are there local risk assessments which documents Challenges to effective infection prevention?');
	$dArry[8] = array(0=>'Is the theatre ventilation monitored on a pre planned Maintenance programme?');
	$dArry[9] = array(0=>'Is there a sequence of increasingly clean zones from
	The entrance to operating theatre?');
	$dArry[10] = array(0=>'Is there written guidance detailing the requirement for any person entering the operating room to change into Theatre clothing/ footwear?');
	$dArry[11] = array(0=>'Are there dedicated protocols for the approved Reprocessing of theatre uniforms?');



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
	<th width="25%"><strong>Infection Prevention and Control</strong></th>
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
				<form action="audit_hh/hic19Excel.php" method="post">

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