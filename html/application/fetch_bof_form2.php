<?php
	error_reporting(0);
	session_start();
	$typ = $_SESSION['typ'];
	$syr = $_SESSION['finyr'];
	include"dbinfo.php";
		$total_bed = 100;
	include "date_calculation.php"; 

	


	if(isset($_POST["frdt"],$_POST["todt"]))  
{
	$frdate = mysqli_real_escape_string($connect, $_POST["frdt"]);
	$todate = mysqli_real_escape_string($connect, $_POST["todt"]);
	$cnt2Total = 0;
	$cnt3Total = 0;
	$bed_occupTotal =0 ;

	$datearray = date_range_find($frdate  , $todate);
		$output = '';
	$countid = 1;
	foreach ($datearray as $tdt) {
					$s = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dadm = '$tdt'")or die(mysqli_error($connect));
	$cnt2 = mysqli_num_rows($s);
	$s3 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE huf_dddd = '$tdt'")or die(mysqli_error($connect));
	$cnt3 = mysqli_num_rows($s3);

// SELECT * FROM tbl_huf WHERE (huf_dadm <= '2019-06-23' AND huf_ddd ='' ) OR (huf_dadm <= '2019-06-23' AND huf_ddd !='' AND huf_dddd = '2019-06-23' )

	$s4 = mysqli_query($connect,"SELECT * FROM tbl_huf WHERE (huf_dadm <= '$tdt' AND huf_ddd ='' ) OR (huf_dadm <= '$tdt' AND huf_dddd > '$tdt')")or die(mysqli_error($connect));
	$cnt4 = mysqli_num_rows($s4);
	
	if($cnt4){
			$bed_occup = round(($cnt4/$total_bed)*100,2);
	}else{
			$bed_occup = 0;
	}

	$cnt2Total += $cnt2;
	$cnt3Total += $cnt3;
	$bed_occupTotal += $bed_occup;
	
	
	
				$output .= '  
					<tr>
						<td style="text-align:center;">'. $countid++ .'</td>
						

						<td style="text-align:center;">'.$tdt.'</td>
	<td style="text-align:center;">'.$cnt2.'</td>
	<td style="text-align:center;">'.$cnt3.'</td>
	<td style="text-align:center;">'.$cnt4.'</td>
	<td style="text-align:center;">'.$total_bed.'</td>
	<td style="text-align:center;">'.$bed_occup.'</td>
					</tr>
				';
					
			
				
				
		

	}

	$output .= ' 
			<tr><td colspan="7" style="text-align:right;"> </td></tr>
			<tr>
			<td colspan="2" style="text-align:right;">Total No. of Patient Admitted </td>
			<td>'.$cnt2Total.'</td>
			<td colspan="2" style="text-align:right;">Total No. of Discharge/Dama/Death </td>
			<td>'.$cnt3Total.'</td>
			<td></td>

			</tr>

			<tr><td colspan="7" style="text-align:center;"> Bed Occupany Rate for Range : '.round(($bed_occupTotal/($countid-1)),2).' % </td>
		</tr> ';


		echo $output; 


}
?>