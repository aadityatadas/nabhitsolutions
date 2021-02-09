<?php



$connect = mysqli_connect("localhost", "root", "", "nabhupdate1"); 
$yr = date('Y');
$array= [];
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



$json['indicator'] = $array;

$json['categories'] =  array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');




echo json_encode($json);

?>