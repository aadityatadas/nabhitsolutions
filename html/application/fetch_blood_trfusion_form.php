<?php
error_reporting(0);
session_start();
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_blood_fusion LEFT JOIN tbl_huf ON tbl_blood_fusion.huf_id = tbl_huf.huf_id ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_prdreq LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_nounit LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_dtreq LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_tmreq LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_bankname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_ordby LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_dtrec LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_norec LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_tmrec LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_tat LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_recby LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_notrfus LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_trfusreact LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_waste LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_waste_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bld_recd LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY bld_id DESC ';
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
	$centid = $row["bld_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["bld_id"].'" class="update" ><i style="color:darkblue;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["bld_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];

	$query1 = "SELECT * FROM tbl_blood_fusion_extra WHERE bld_id = '".$row["bld_id"]."'";  
      $result1 = mysqli_query($connect, $query1);

	if($result1->num_rows >0){
      
      $c = 2;

 	$bld_prdreq = "";
	$bld_nounit = "";
	$bld_dtreq = "";
	$bld_tmreq = "";
	$bld_bankname = "";
	$bld_ordby = "";
	$bld_dtrec = "";
	$bld_norec = "";
	$bld_tmrec = "";
	$bld_tat = "";
	$bld_recby = "";
	$bld_notrfus = "";


	$bld_trfusreact = "";
	$bld_waste = "";
	$bld_recd = "";

	while ($row1 = mysqli_fetch_assoc($result1)) {
      	
        
         
          $bld_prdreq .= $c.") ".$row1["bld_prdreq"]."<br>";
		$bld_nounit .= $c.") ".$row1["bld_nounit"]."<br>";
		$bld_dtreq .= $c.") ".$row1["bld_dtreq"]."<br>";
		$bld_tmreq .= $c.") ".$row1["bld_tmreq"]."<br>";
		$bld_bankname .= $c.") ".$row1["bld_bankname"]."<br>";
		$bld_ordby .= $c.") ".$row1["bld_ordby"]."<br>";
		$bld_dtrec .= $c.") ".$row1["bld_dtrec"]."<br>";
		$bld_norec .= $c.") ".$row1["bld_norec"]."<br>";
		$bld_tmrec .= $c.") ".$row1["bld_tmrec"]."<br>";
		$bld_tat .= $c.") ".$row1["bld_tat"]."<br>";
		$bld_recby .= $c.") ".$row1["bld_recby"]."<br>";
		$bld_notrfus .= $c.") ".$row1["bld_notrfus"]."<br>";
          //image
        $cextra = $row1["bld_extra_id"];
       if($row1["bld_trfusreact"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_blood_upld WHERE blood_extra_id = '$cextra'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$bld_trfusreact .=  $c.") ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_blood_rpt.php?rd='.$row1["bld_id"].'&rdEx='.$row1["bld_extra_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row1["bld_trfusreact"]." ".'<button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$bld_trfusreact .= $c.") ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_blood_rpt.php?rd='.$row1["bld_id"].'&rdEx='.$row1["bld_extra_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row1["bld_trfusreact"]." ".'<button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
	}else{
		$bld_trfusreact .= $c.") ".$row1["bld_trfusreact"]."<br>";
	}
	


      if($row1["bld_waste"] == 'Yes'){
		$bld_waste .= $c.") ".$row1["bld_waste"].' - '.$row1["bld_waste_det"]."<br>";
	}else{
		$bld_waste .= $c.") ".$row1["bld_waste"]."<br>";
	}

          $bld_recd .= $c.") ".$row1["bld_recd"]."<br>";
   
         
         $c++;
      }

    $sub_array[] = "1) ".$row["bld_prdreq"]."<br>".$bld_prdreq;
	$sub_array[] = "1) ".$row["bld_nounit"]."<br>".$bld_nounit;
	   
$sub_array[] = "1) ".$row["bld_dtreq"]."<br>".$bld_dtreq;
$sub_array[] = "1) ".$row["bld_tmreq"]."<br>".$bld_tmreq;
$sub_array[] = "1) ".$row["bld_bankname"]."<br>".$bld_bankname;
$sub_array[] = "1) ".$row["bld_ordby"]."<br>".$bld_ordby;
$sub_array[] = "1) ".$row["bld_dtrec"]."<br>".$bld_dtrec;
$sub_array[] = "1) ".$row["bld_norec"]."<br>".$bld_norec;
$sub_array[] = "1) ".$row["bld_tmrec"]."<br>".$bld_tmrec;
$sub_array[] = "1) ".$row["bld_tat"]."<br>".$bld_tat;
$sub_array[] = "1) ".$row["bld_recby"]."<br>".$bld_recby;
$sub_array[] = "1) ".$row["bld_notrfus"]."<br>".$bld_notrfus;

if($row["bld_trfusreact"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_blood_upld WHERE blood_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] =  "1) ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_blood_rpt.php?rd='.$row["bld_id"].'&rdEx=NULL'.'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["bld_trfusreact"]." ".'<button class="btn btn-info btn-xs">View</button></a>'."<br>".$bld_trfusreact;
		}else{
			$sub_array[] = "1) ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_blood_rpt.php?rd='.$row["bld_id"].'&rdEx=NULL'.'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["bld_trfusreact"]." ".'<button class="btn btn-warning btn-xs">Upload</button></a>'."<br>".$bld_trfusreact;
		}
	}else{
		$sub_array[] = "1) ".$row["bld_trfusreact"]."<br>".$bld_trfusreact;
	}
	


      if($row["bld_waste"] == 'Yes'){
		$sub_array[] = "1) ".$row["bld_waste"].' - '.$row["bld_waste_det"].$bld_waste."<br>";
	}else{
		$sub_array[] = "1) ".$row["bld_waste"].$bld_waste."<br>";
	}


			$sub_array[] = "1) ".$row["bld_recd"]."<br>".$bld_recd;
     
     } else {
     $sub_array[] = $row["bld_prdreq"];
	$sub_array[] = $row["bld_nounit"];
	$sub_array[] = $row["bld_dtreq"];
	$sub_array[] = $row["bld_tmreq"];
	$sub_array[] = $row["bld_bankname"];
	$sub_array[] = $row["bld_ordby"];
	$sub_array[] = $row["bld_dtrec"];
	$sub_array[] = $row["bld_norec"];
	$sub_array[] = $row["bld_tmrec"];
	$sub_array[] = $row["bld_tat"];
	$sub_array[] = $row["bld_recby"];
	$sub_array[] = $row["bld_notrfus"];
	// Other Reports
	if($row["bld_trfusreact"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_blood_upld WHERE blood_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_blood_rpt.php?rd='.$row["bld_id"].'&rdEx=NULL'.'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["bld_trfusreact"].'</b><br /><button class="btn btn-info btn-xs">View Report</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_blood_rpt.php?rd='.$row["bld_id"].'&rdEx=NULL'.'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["bld_trfusreact"].'</b><br /><button class="btn btn-warning btn-xs">Upload Report</button></a>';
		}
	}else{
		$sub_array[] = $row["bld_trfusreact"];
	}
	//
	if($row["bld_waste"] == 'Yes'){
		$sub_array[] = $row["bld_waste"].' - '.$row["bld_waste_det"]."<br>";
	}else{
		$sub_array[] = $row["bld_waste"]."<br>";
	}
	$sub_array[] = $row["bld_recd"];
     }
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records8(),
	"data"				=>	$data
);
echo json_encode($output);
?>