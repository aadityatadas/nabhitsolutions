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



    $dArry[1] = array(0=>'Insertion');
	$dArry[2] = array(0=>'Is surgical hand preparation performed before the procedure');
	$dArry[3] = array(0=>'Type of device used for hair removal Clipper');
	$dArry[4] = array(0=>'Type of device used for hair removal Blade');
	$dArry[5] = array(0=>'Is a sterile gown worn during the procedure ?');
	$dArry[6] = array(0=>'Are sterile  grown worn during the procedure');
	$dArry[7] = array(0=>'Is a mask worn during insertion of the CVC procedure ?');
	$dArry[8] = array(0=>'Is a single use cap worn during the procedure ?');
	$dArry[9] = array(0=>'Is the CVC which issued single lumen unless otherwise Clinically indicated?');
	$dArry[10] = array(0=>'Is the procedure trolley cleaned prior to use ?');
	$dArry[11] = array(0=>'Is the CVC insertion sit either subclavian or jugular (unless another site is clinically indicated)?');
	$dArry[12] = array(0=>'Is skin antisepsis with 4% chlorhexidine followed by alcohol 70% + chlorhexidine 2% w/v applied Totheinsertion  site and allowed to dry before insertion?');
	$dArry[13] = array(0=>'Are disposables sterile drapes used?');
	$dArry[14] = array(0=>'Is a sepsis maintained through out the procedure ?');
	$dArry[15] = array(0=>'Is blood removed from the skin around the insertion site?');
	$dArry[16] = array(0=>'Is a sterile, smeipermeable, transparent Dressing placed over the insertion site ?');
	$dArry[17] = array(0=>'Is date, time, site and insertion  documented and signed By the person inserting the device ?');



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
	<th width="25%"><strong>Care of Central Venous Catheter</strong></th>
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
				<form action="audit_hh/hic11Excel.php" method="post">

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