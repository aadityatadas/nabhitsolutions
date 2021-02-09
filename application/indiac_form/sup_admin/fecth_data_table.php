<?php



//$connect = mysqli_connect("localhost", "root", "", "nabhitso_nabhdemoD"); 
include"../dbinfo.php";
$yr = date('Y');
$array= [];
$val = $_POST['items'];
if($val == 1)
{
	for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["std"];
							if($i_count > 0){
								$icount = (int)$i_count;
							}else{
								$icount = 0;
							}

               $array[] = $icount;

		}
}
if($val == 2)
{
	for($month = 1; $month <= 12; $month ++){
							$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$A_count = mysqli_num_rows($qry2);


               $array[] = $A_count;;

		}
}
if($val == 3)
{
	for($month = 1; $month <= 12; $month ++){
							$qry3_1 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Discharge' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$dis_count = mysqli_num_rows($qry3_1);

               $array[] = $dis_count;


		}
}
if($val == 4)
{
	for($month = 1; $month <= 12; $month ++){
							$qry3_2 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'DAMA' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$dm_count = mysqli_num_rows($qry3_2);

               $array[] = $dm_count;

		}
}
if($val == 5)
{
	for($month = 1; $month <= 12; $month ++){
							$qry3_3 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_ddd = 'Death' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$dh_count = mysqli_num_rows($qry3_3);

               $array[] = $dh_count;

		}
}
if($val == 6)
{
	for($month = 1; $month <= 12; $month ++){
							$qry3_4 = mysqli_query($connect,"SELECT huf_ddd FROM tbl_huf WHERE huf_mlc = 'MLC' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$mlc_count = mysqli_num_rows($qry3_4);

               $array[] = $mlc_count;

		}
}
if($val == 7)
{
	for($month = 1; $month <= 12; $month ++){
							$qry = mysqli_query($connect,"SELECT SUM(huf_lens) as std FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND (month(huf_dddd) = '$month' AND year(huf_dddd) = '$yr')")or die(mysqli_error($connect));
							$res = mysqli_fetch_assoc($qry);
							$i_count = $res["std"];
							$qry2 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$A_count = mysqli_num_rows($qry2);
							$dy = $i_count * 24;
							$dys = $dy / $A_count;
							$hmin = $dys / 24;
							list($number1, $number2) = explode('.', $hmin);
							
							$los_count = $number1.'.'.$number2;
							if($los_count > 0){
								$loscount = $los_count;
							}else{
								$loscount = 0;
							}

							$lval = number_format($loscount,1);

               $array[] = $lval;

		}
}
if($val == 8)
{
	for($month = 1; $month <= 12; $month ++){
							$qry5 = mysqli_query($connect,"SELECT huf_surg FROM tbl_huf WHERE huf_surg = 'Surgery' AND (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr')")or die(mysqli_error($connect));
							$s_count = mysqli_num_rows($qry5);

               $array[] = $s_count;

		}
}
if($val == 9)
{
	for($month = 1; $month <= 12; $month ++){
							$hr_num = 0;
							$min_num = 0;
							$sum_std = 0;
							$tot_count = 0;
							$numb3 = 0;
							$qry = mysqli_query($connect,"SELECT int_tottm FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != '' ORDER BY huf_id ASC")or die(mysqli_error($connect));
							while($res = mysqli_fetch_array($qry))
							{
								$sm_std = $res["int_tottm"];
								list($num1, $num2) = explode('.', $sm_std);
								$hr_num = $hr_num + $num1;
								$min_num = $min_num + $num2;
							}
							$sum_std = ($hr_num * 60) + $min_num;	
						
							$qry5 = mysqli_query($connect,"SELECT huf_id FROM tbl_huf WHERE (month(huf_dadm) = '$month' AND year(huf_dadm) = '$yr') AND int_ddd != ''")or die(mysqli_error($connect));
							$s_count = mysqli_num_rows($qry5);
							
							$tot_count = $sum_std / $s_count;
							if($tot_count >= 60)
							{
								$tt_count = $tot_count / 60;
								list($number1, $number2) = explode('.', $tt_count);
								
								$tot_min = $tot_count - ($number1 * 60);
								if($tot_min >= 10)
								{
									$numb3 = $number1.'.'.$tot_min;
								}else if($tot_min < 10){
									$a = 0;
									$numbr3 = $number1.'.'.$a.''.$tot_min;
									$numb3 = $numbr3;
								}		
							}else if($tot_count < 60){
								list($numb1, $numb2) = explode('.', $tot_count);
								$aj = 0;
								$numbr3 = $aj.'.'.$numb1;
								$numb3 = $numbr3;
							}

							

               $array[] = number_format($numb3,2);

		}
}




$json['indicator'] = $array;

$json['categories'] =  array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');




echo json_encode($json);

?>