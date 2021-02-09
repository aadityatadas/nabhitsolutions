<?php
error_reporting(0);
session_start();
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_care_evt LEFT JOIN tbl_huf ON tbl_care_evt.huf_id = tbl_huf.huf_id ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_dtpli LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_tmpli LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_vipsc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp_th LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsymp_th_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_bradsc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsyp_bed LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_signsyp_bed_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_mor_sc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_incd_ptfall LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_incd_ptfall_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_iardl LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_iardl_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_injtpt LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR care_injtpt_det LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY care_id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$centid = $row["care_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["care_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["care_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];

	$query1 = "SELECT * FROM tbl_care_evt_extra WHERE care_id = '".$row["care_id"]."'";  
      $result1 = mysqli_query($connect, $query1);

      if($result1->num_rows >0){

      	 $c = 2;

 $care_dtpli = '';
$care_tmpli = '';
$care_vipsc = '';
$care_signsymp = '';
$care_signsymp_det = '';
$care_signsymp_th = '';
$care_signsymp_th_det = '';
$care_bradsc = '';
$care_signsyp_bed = '';
$care_signsyp_bed_det = '';
$care_mor_sc = '';
$care_incd_ptfall = '';
$care_incd_ptfall_det = '';
$care_iardl = '';
$care_iardl_det = '';
$care_injtpt = '';
$care_injtpt_det = '';
$care_recd = '';

      while ($row1 = mysqli_fetch_assoc($result1)) {
      	
        
         
         
          //image
		$care_dtpli .= $c.") ".$row1["care_dtpli"]."<br>";
		$care_tmpli .= $c.") ".$row1["care_tmpli"]."<br>";
		$care_vipsc .= $c.") ".$row1["care_vipsc"]."<br>";
       
	


     if($row1["care_signsymp"] == 'Yes'){
		$care_signsymp .= $c.") ".$row1["care_signsymp"].' - '.$row1["care_signsymp_det"]."<br>";
	}else{
		$care_signsymp .= $c.") ".$row1["care_signsymp"]."<br>";
	}

	if($row1["care_signsymp_th"] == 'Yes'){
		$care_signsymp_th .= $c.") ".$row1["care_signsymp_th"].' - '.$row1["care_signsymp_th_det"]."<br>";
	}else{
		$care_signsymp_th .= $c.") ".$row1["care_signsymp_th"]."<br>";
	}

	$care_bradsc .= $c.") ".$row1["care_bradsc"]."<br>";


	if($row1["care_signsyp_bed"] == 'Yes'){
		$care_signsyp_bed .= $c.") ".$row1["care_signsyp_bed"].' - '.$row1["care_signsyp_bed_det"]."<br>";
	}else{
		$care_signsyp_bed .= $c.") ".$row1["care_signsyp_bed"]."<br>";
	}

		$care_mor_sc  .= $c.") ".$row1["care_mor_sc"]."<br>";
	
      if($row1["care_incd_ptfall"] == 'Yes'){
		$care_incd_ptfall .= $c.") ".$row1["care_incd_ptfall"].' - '.$row1["care_incd_ptfall_det"];
	}else{
		$care_incd_ptfall .= $c.") ".$row1["care_incd_ptfall"];
	}


	if($row1["care_iardl"] == 'Yes'){
		$care_iardl .= $c.") ".$row1["care_iardl"].' - '.$row1["care_iardl_det"]."<br>";
	}else{
		$care_iardl .= $c.") ".$row1["care_iardl"]."<br>";
	}

	if($row1["care_injtpt"] == 'Yes'){
		$care_injtpt .= $c.") ".$row1["care_injtpt"].' - '.$row1["care_injtpt_det"]."<br>";
	}else{
		$care_injtpt .= $c.") ".$row1["care_injtpt"]."<br>";
	}
          $care_recd .= $c.") ".$row1["care_recd"]."<br>";
   
         
         $c++;
      }

     $sub_array[] = "1) ".$row["care_dtpli"]."<br>".$care_dtpli;
	 $sub_array[] = "1) ".$row["care_tmpli"]."<br>".$care_tmpli;
	   
     $sub_array[] = "1) ".$row["care_vipsc"]."<br>".$care_vipsc; 

     if($row["care_signsymp"] == 'Yes'){
		$sub_array[] = "1) ".$row["care_signsymp"].' - '.$row["care_signsymp_det"]."<br>".$care_signsymp;
	}else{
		$sub_array[] = "1) ".$row["care_signsymp"]."<br>".$care_signsymp;
	}
	//
	if($row["care_signsymp_th"] == 'Yes'){
		$sub_array[] = "1) ".$row["care_signsymp_th"].' - '.$row["care_signsymp_th_det"]."<br>".$care_signsymp_th;
	}else{
		$sub_array[] = "1) ".$row["care_signsymp_th"]."<br>".$care_signsymp_th;
	}
	$sub_array[] = "1) ".$row["care_bradsc"]."<br>".$care_bradsc;
	//
	if($row["care_signsyp_bed"] == 'Yes'){
		$sub_array[] = "1) ".$row["care_signsyp_bed"].' - '.$row["care_signsyp_bed_det"]."<br>".$care_signsyp_bed;
	}else{
		$sub_array[] = "1) ".$row["care_signsyp_bed"]."<br>".$care_signsyp_bed;
	}//
	$sub_array[] = "1) ".$row["care_mor_sc"]."<br>".$care_mor_sc;
	if($row["care_incd_ptfall"] == 'Yes'){
		$sub_array[] = "1) ".$row["care_incd_ptfall"].' - '.$row["care_incd_ptfall_det"]."<br>".$care_incd_ptfall;
	}else{
		$sub_array[] = "1) ".$row["care_incd_ptfall"]."<br>".$care_incd_ptfall;
	}
	//
	if($row["care_iardl"] == 'Yes'){
		$sub_array[] = "1) ".$row["care_iardl"].' - '.$row["care_iardl_det"]."<br>".$care_iardl;
	}else{
		$sub_array[] = "1) ".$row["care_iardl"]."<br>".$care_iardl;
	}
	//
	if($row["care_injtpt"] == 'Yes'){
		$sub_array[] = "1) ".$row["care_injtpt"].' - '.$row["care_injtpt_det"]."<br>".$care_injtpt;
	}else{
		$sub_array[] = "1) ".$row["care_injtpt"]."<br>".$care_injtpt;
	}
	$sub_array[] = "1) ".$row["care_recd"]."<br>".$care_recd;



      } else{


      			
      $sub_array[] = $row["care_dtpli"];
	$sub_array[] = $row["care_tmpli"];
	$sub_array[] = $row["care_vipsc"];
	if($row["care_signsymp"] == 'Yes'){
		$sub_array[] = $row["care_signsymp"].' - '.$row["care_signsymp_det"];
	}else{
		$sub_array[] = $row["care_signsymp"];
	}
	//
	if($row["care_signsymp_th"] == 'Yes'){
		$sub_array[] = $row["care_signsymp_th"].' - '.$row["care_signsymp_th_det"];
	}else{
		$sub_array[] = $row["care_signsymp_th"];
	}
	$sub_array[] = $row["care_bradsc"];
	//
	if($row["care_signsyp_bed"] == 'Yes'){
		$sub_array[] = $row["care_signsyp_bed"].' - '.$row["care_signsyp_bed_det"];
	}else{
		$sub_array[] = $row["care_signsyp_bed"];
	}//
	$sub_array[] = $row["care_mor_sc"];
	if($row["care_incd_ptfall"] == 'Yes'){
		$sub_array[] = $row["care_incd_ptfall"].' - '.$row["care_incd_ptfall_det"];
	}else{
		$sub_array[] = $row["care_incd_ptfall"];
	}
	//
	if($row["care_iardl"] == 'Yes'){
		$sub_array[] = $row["care_iardl"].' - '.$row["care_iardl_det"];
	}else{
		$sub_array[] = $row["care_iardl"];
	}
	//
	if($row["care_injtpt"] == 'Yes'){
		$sub_array[] = $row["care_injtpt"].' - '.$row["care_injtpt_det"];
	}else{
		$sub_array[] = $row["care_injtpt"];
	}
	$sub_array[] = $row["care_recd"];

      }
	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records9(),
	"data"				=>	$data
);
echo json_encode($output);
?>