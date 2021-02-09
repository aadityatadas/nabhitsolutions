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



    $dArry[1] = array(0=>'Isanultra clean ventilated (laminar flow) theratre used for clean surgeries like joint replacement surgery, neurosurgery, cardiovascular thoracic Surgery etc?');
	$dArry[2] = array(0=>'Where hair removalis required , have clippers with Disposable blades been used');
	$dArry[3] = array(0=>'Hashair removal taken place on the day of surgery?');
	$dArry[4] = array(0=>'Has a single antibiotic dose been given to patient At the time of anaesthesia for clean surgery');
	$dArry[5] = array(0=>'Is hand hygiene performed before the start of  the procedure ?');
	$dArry[6] = array(0=>'Are single use sterile gloves worn ?');
	$dArry[7] = array(0=>'Has the skin at the surgical site been cleaned immediately prior to incision using an antiseptic preparation perferably 2% w/v of chlorhexidine + 70% alcohol');
	$dArry[8] = array(0=>'Has skin preparation been carried out using Asterile technique?');
	$dArry[9] = array(0=>'Is nor mothermia maintained ?');
	$dArry[10] = array(0=>'Is the theatretrolley dedicated for surgical Procedures ?');
	$dArry[11] = array(0=>'Is the trolley / tray / surface cleaned with Detergent and water and dried ?');
	$dArry[12] = array(0=>'Are disposable sterile drapes used ?');
	$dArry[13] = array(0=>'Is staff aware that drapes are not repositioned Following initial setup?');
	$dArry[14] = array(0=>'Does staff prepare and lay up immediately Prior to each case?');
	$dArry[15] = array(0=>'Do scrubbed personnel remain close to The sterile field?');
	$dArry[16] = array(0=>'Do circulatory personnel maintain the sterile field?');
	$dArry[17] = array(0=>'Are sterile medical devices  present to the scrubbed person from the edge of the sterile filed and received in such a Way as to prevent contamination?');
	$dArry[18] = array(0=>'Does staff ensure that items which have extended over  the trolley or not brought back In to the sterile filed?');
	$dArry[19] = array(0=>'Is the integrity of sterile packs checked prior to use?');
	$dArry[20] = array(0=>'Is the expiry date of sterile packs Checked prior to use?');
	$dArry[21] = array(0=>'Are the sterile packs open edusing only the corner Soft the paper, taking carenot to touch any of the sterile contents?');
	$dArry[22] = array(0=>'Are items arranged on the sterile filed using sterile Filed using sterile gloves');
	$dArry[23] = array(0=>'Is a sterile dressing applied aseptically prior to the Patient leaving the operating theatre?');
	$dArry[24] = array(0=>'Is patient documentation update following The procedure ?');
	$dArry[25] = array(0=>'Are sharps disposed safely and at the point of use ?');
	$dArry[26] = array(0=>'Is hand hygiene performed after removal of personal Protective equipment?');



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
	<th width="25%"><strong>Operation Theatre Asepsis</strong></th>
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
				<form action="audit_hh/hic20Excel.php" method="post">

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