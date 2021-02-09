<?php
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_huf ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dadm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_dt_iuc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_dt_ruc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_tcd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_sympt LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_sympt_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_ssc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR vent_spc LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))	
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY huf_id DESC ';
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
	$centid = $row["huf_id"];
	$sub_array = array();
	$sub_array[] = '<a style="cursor:pointer;" title="Click here to edit" id="'.$row["huf_id"].'" class="update" ><i style="color:#2b6a9f;" class="fa fa-edit fa-fw"></i></a>';
	$sub_array[] = $row["huf_id"];
	$sub_array[] = $row["huf_pname"];
	$sub_array[] = $row["huf_uhid"];
	$sub_array[] = $row["huf_ipd"];
	$sub_array[] = $row["huf_dadm"];
    
	$query1 = "SELECT * FROM tbl_vent_ass_phmn WHERE tbl_huf_id = '".$row["huf_id"]."'";  
      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      $c = 2;
     
     $vent_dt_iuc="";
     $vent_dt_ruc="";
     $vent_tcd = "";
     $vent_sympt_det="";
     $vent_ssc ="";
     $vent_rcd="";
     $vent_sympt= "";
     $vent_spc="";
      while ($row1 = mysqli_fetch_assoc($result1)) {
      	
        
          $vent_dt_iuc .= $c.") ".$row1["vent_dt_iuc"]."<br>";
          $vent_dt_ruc .= $c.") ".$row1["vent_dt_ruc"]."<br>";
          $vent_tcd .= $c.") ".$row1["vent_tcd"]."<br>";
          //image

       if($row1["vent_sympt"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_vent_upld WHERE vent_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$vent_sympt .=  $c.") ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_vent_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row1["vent_sympt"]." ".'<button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$vent_sympt .= $c.") ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_vent_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row1["vent_sympt"]." ".'<button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
	}else{
		$vent_sympt .= $c.") ".$row1["vent_sympt"]."<br>";
	}
	
          $vent_sympt_det .= $c.") ".$row1["vent_sympt_det"]."<br>";
          $vent_ssc .= $c.") ".$row1["vent_ssc"]."<br>";


      if($row1["vent_spc"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_vent_upld2 WHERE vent_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$vent_spc .= $c.") ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_vent_cult_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row1["vent_spc"].'</b><button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$vent_spc.= $c.") ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_vent_cult_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row1["vent_spc"].'</b><button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
		
	}else{
		$vent_spc .= $c.") ".$row1["vent_spc"]."<br>";
	}

          $vent_rcd .= $c.") ".$row1["vent_rcd"]."<br>";


         
         
         $c++;
      }

      $sub_array[] = "1) ".$row["vent_dt_iuc"]."<br>".$vent_dt_iuc;
      $sub_array[] = "1) ".$row["vent_dt_ruc"]."<br>".$vent_dt_ruc;
      $sub_array[] = "1) ".$row["vent_tcd"]."<br>".$vent_tcd;
	// Other Reports
	
	
	
	if($row["vent_sympt"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_vent_upld WHERE vent_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = "1) ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_vent_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["vent_sympt"]." ".'<button class="btn btn-info btn-xs">View</button></a>'."<br>".$vent_sympt;
		}else{
			$sub_array[] = "1) ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_vent_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["vent_sympt"]." ".'<button class="btn btn-warning btn-xs">Upload</button></a>'."<br>".$vent_sympt;
		}
	}else{
		$sub_array[] = "1) ".$row["vent_sympt"]."<br>".$vent_sympt;
	}
	
	   $sub_array[] = "1) ".$row["vent_sympt_det"]."<br>".$vent_sympt_det;
	  $sub_array[] = "1) ".$row["vent_ssc"]."<br>".$vent_ssc;
	// Culture Report


	if($row["vent_spc"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_vent_upld2 WHERE vent_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = "1) ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_vent_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["vent_spc"].'</b><button class="btn btn-info btn-xs">View</button></a>'."<br>".$vent_spc	;
		}else{
			$sub_array[] = "1) ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_vent_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["vent_spc"].'</b><button class="btn btn-warning btn-xs">Upload</button></a>'."<br>".$vent_spc	;
		}
		
	}else{
		$sub_array[] = "1) ".$row["vent_spc"]."<br>".$vent_spc	;
	}
	
    $sub_array[] = "1) ".$row["vent_rcd"]."<br>".$vent_rcd;



  } 


     else 

     {
  
  	$sub_array[] = $row["vent_dt_iuc"];
	$sub_array[] = $row["vent_dt_ruc"];
	
	//$tcd = $row["vent_tcd"];
	//$tcd1 = $tcd / 24;
	$sub_array[] = $row["vent_tcd"];
	// Other Reports
	if($row["vent_sympt"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_vent_upld WHERE vent_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_vent_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["vent_sympt"]."".'<button class="btn btn-info btn-xs">View</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_vent_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["vent_sympt"]."".'<button class="btn btn-warning btn-xs">Upload</button></a>';
		}
	}else{
		$sub_array[] = $row["vent_sympt"];
	}
	$sub_array[] = $row["vent_sympt_det"];
	$sub_array[] = $row["vent_ssc"];
	// Culture Report
	if($row["vent_spc"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_vent_upld2 WHERE vent_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_vent_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["vent_spc"].'</b><button class="btn btn-info btn-xs">View</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_vent_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["vent_spc"].'</b><button class="btn btn-warning btn-xs">Upload</button></a>';
		}
		
	}else{
		$sub_array[] = $row["vent_spc"];
	}
	$sub_array[] = $row["vent_rcd"];
  } 

	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>