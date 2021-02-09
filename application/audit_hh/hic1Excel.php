<?php
   include"../dbinfo.php";

   $tbl = $_POST['tbl'];
   /*print_r($_POST);
   die();*/
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



   $dArry[1] = array(0=>'The organization has acomprehensive policy for hand hygiene',1=>'h_hygn_1_yn',2=>'h_hygn_1_cmmnt');
		$dArry[2] = array(0=>'Hand hygiene is an integral part of Induction for all staff',1=>'h_hygn_2_yn',2=>'h_hygn_2_cmmnt');
		$dArry[3] = array(0=>'Staff have received training in hand hygiene Procedures',1=>'h_hygn_3_yn',2=>'h_hygn_3_cmmnt');
		$dArry[4] = array(0=>'Clinical staff nails are short, clean and free from nail extensions
		and varnish',1=>'h_hygn_4_yn',2=>'h_hygn_4_cmmnt');
		$dArry[5] = array(0=>'Posters promoting hand hygiene are available and are on display',1=>'h_hygn_5_yn',2=>'h_hygn_5_cmmnt');
		$dArry[6] = array(0=>'There is a hand wash basin in each treatment / clinical area',1=>'h_hygn_6_yn',2=>'h_hygn_6_cmmnt');
		$dArry[7] = array(0=>'Hand washing facilities are clean and intact',1=>'h_hygn_7_yn',2=>'h_hygn_7_cmmnt');
		$dArry[8] = array(0=>'Hand wash basins are dedicated to HH only',1=>'h_hygn_8_yn',2=>'h_hygn_8_cmmnt');
		$dArry[9] = array(0=>'Hand wash basins are free from used equipment and inappropriate
		items',1=>'h_hygn_9_yn',2=>'h_hygn_9_cmmnt');
		$dArry[10] = array(0=>'There is easy access to the hand wash basin',1=>'h_hygn_10_yn',2=>'h_hygn_10_cmmnt');
		$dArry[11] = array(0=>'Elbow operated taps are available at all hand wash basins in
		clinical areas',1=>'h_hygn_11_yn',2=>'h_hygn_11_cmmnt');
		$dArry[12] = array(0=>'Liquid soap is available at each hand wash basin',1=>'h_hygn_12_yn',2=>'h_hygn_12_cmmnt');
		$dArry[13] = array(0=>'The cartridge dispensers are not empty',1=>'h_hygn_13_yn',2=>'h_hygn_13_cmmnt');
		$dArry[14] = array(0=>'Liquid soap is in the form of single use cartridge dispensers',1=>'h_hygn_14_yn',2=>'h_hygn_14_cmmnt');
		$dArry[15] = array(0=>'Dispenser nozzles are visible clean',1=>'h_hygn_15_yn',2=>'h_hygn_15_cmmnt');
		$dArry[16] = array(0=>'There is no bar soap at hand washing basins in treatment / clinical
		ares',1=>'h_hygn_16_yn',2=>'h_hygn_16_cmmnt');
		$dArry[17] = array(0=>'Alcohol rub is available for use at the entrance / exits to clinical
		settings',1=>'h_hygn_17_yn',2=>'h_hygn_17_cmmnt');
		$dArry[18] = array(0=>'Alcohol hand rub is available at the point of care as per local and
		national standard',1=>'h_hygn_18_yn',2=>'h_hygn_18_cmmnt');
		$dArry[19] = array(0=>'Soft absorbent paper towels / small single use towels are available
		at all hand wash sinks',1=>'h_hygn_19_yn',2=>'h_hygn_19_cmmnt');
		$dArry[20] = array(0=>'There are no re-usable cotton towels used to dry hands in clinical
		ares',1=>'h_hygn_20_yn',2=>'h_hygn_20_cmmnt');
		$dArry[21] = array(0=>'Cotton towels used to dry hands in non-clinical areas are changed
		during each shift',1=>'h_hygn_21_yn',2=>'h_hygn_21_cmmnt');
		$dArry[22] = array(0=>'There are no nailbrushes used or present at hand wash sinks',1=>'h_hygn_22_yn',2=>'h_hygn_22_cmmnt');
		$dArry[23] = array(0=>'There is a foot operated bin for waste in close proximity to hand
		wash sinks which are fully operational',1=>'h_hygn_23_yn',2=>'h_hygn_23_cmmnt');



      $output = '';
	$output .= '
	
	<table class="table" border="1" id="content2">
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
               <th colspan="6" align="center" >Hand Hygiene</th>
               
            </tr>

             <tr>
               <th colspan="6"></th>
               
            </tr>

	<tr>
	<th width="10%">sr.no</th>
	<th width="25%"><strong>Hand Hygiene</strong></th>
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
		<div class="row pull-right">
		    <div class="col-lg-5">
				<form action="audit_hh/hic1Excel.php" method="post">

					<input type="hidden" name="user_id" value="<?= $_POST["user_id"]?>">
					<input type="hidden" name="tbl" value="<?= $_POST['tbl']?>">
					<input type="hidden" name="ptbl" value="<?= $_POST['etbl']?>">
					<input type="submit" class="btn btn-success" name="Excel" value="Excel">
					
				</form>
				</div>
				
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