<?php
	
include('dbinfo.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_huf WHERE huf_surg = 'Surgery' ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'AND (huf_pname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_uhid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_ipd LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR huf_dadm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR surg_dtos LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR surg_nsurg LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR surg_symp LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR surg_symp_det LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR surg_dtssc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR surg_sp_ssi LIKE "%'.$_POST["search"]["value"].'%") ';
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
    
	$query1 = "SELECT * FROM tbl_surg_site_infec WHERE tbl_huf_id = '".$row["huf_id"]."'";  
      $result1 = mysqli_query($connect, $query1);
      
      if($result1->num_rows >0){
      
      $c = 2;
     
     $surg_dtos="";
     $surg_nsurg="";
     
     $surg_symp_det="";
     $surg_dtssc ="";
     $surg_recd="";
     $surg_symp= "";
     $surg_sp_ssi="";
      while ($row1 = mysqli_fetch_assoc($result1)) {
      	
        
          $surg_dtos .= $c.") ".$row1["surg_dtos"]."<br>";
          $surg_nsurg .= $c.") ".$row1["surg_nsurg"]."<br>";
        
          //image

       if($row1["surg_symp"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_surg_upld WHERE surg_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$surg_symp .=  $c.") ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_surg_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row1["surg_symp"]." ".'<button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$surg_symp .= $c.") ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_surg_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row1["surg_symp"]." ".'<button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
	}else{
		$surg_symp .= $c.") ".$row1["surg_symp"]."<br>";
	}
	
          $surg_symp_det .= $c.") ".$row1["surg_symp_det"]."<br>";
          $surg_dtssc .= $c.") ".$row1["surg_dtssc"]."<br>";


      if($row1["surg_sp_ssi"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_surg_upld2 WHERE surg_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$surg_sp_ssi .= $c.") ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_surg_cult_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row1["surg_sp_ssi"].'</b><button class="btn btn-info btn-xs">View</button></a>'."<br>";
		}else{
			$surg_sp_ssi.= $c.") ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_surg_cult_rpt.php?rd='.$row1["tbl_huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row1["surg_sp_ssi"].'</b><button class="btn btn-warning btn-xs">Upload</button></a>'."<br>";
		}
		
	}else{
		$surg_sp_ssi .= $c.") ".$row1["surg_sp_ssi"]."<br>";
	}

          $surg_recd .= $c.") ".$row1["surg_recd"]."<br>";


         
         
         $c++;
      }

      $sub_array[] = "1) ".$row["surg_dtos"]."<br>".$surg_dtos;
      $sub_array[] = "1) ".$row["surg_nsurg"]."<br>".$surg_nsurg;
     
	// Other Reports
	
	
	
	if($row["surg_symp"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_surg_upld WHERE surg_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = "1) ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_surg_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["surg_symp"]." ".'<button class="btn btn-info btn-xs">View</button></a>'."<br>".$surg_symp;
		}else{
			$sub_array[] = "1) ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_surg_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["surg_symp"]." ".'<button class="btn btn-warning btn-xs">Upload</button></a>'."<br>".$surg_symp;
		}
	}else{
		$sub_array[] = "1) ".$row["surg_symp"]."<br>".$surg_symp;
	}
	
	   $sub_array[] = "1) ".$row["surg_symp_det"]."<br>".$surg_symp_det;
	  $sub_array[] = "1) ".$row["surg_dtssc"]."<br>".$surg_dtssc;
	// Culture Report


	if($row["surg_sp_ssi"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_surg_upld2 WHERE surg_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = "1) ".'<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_surg_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["surg_sp_ssi"].'</b><button class="btn btn-info btn-xs">View</button></a>'."<br>".$surg_sp_ssi	;
		}else{
			$sub_array[] = "1) ".'<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_surg_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["surg_sp_ssi"].'</b><button class="btn btn-warning btn-xs">Upload</button></a>'."<br>".$surg_sp_ssi	;
		}
		
	}else{
		$sub_array[] = "1) ".$row["surg_sp_ssi"]."<br>".$surg_sp_ssi	;
	}
	
    $sub_array[] = "1) ".$row["surg_recd"]."<br>".$surg_recd;



  } 


     else 

     {
  
  	$sub_array[] = $row["surg_dtos"];
	$sub_array[] = $row["surg_nsurg"];
	
	//$tcd = $row["cath_uti_tcd"];
	//$tcd1 = $tcd / 24;
	
	// Other Reports
	if($row["surg_symp"] == 'Yes'){
		$qry = mysqli_query($connect,"SELECT * FROM tbl_surg_upld WHERE surg_id = '$centid'")or die(mysqli_error($connect));
		$rs = mysqli_num_rows($qry);
		if($rs > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_surg_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt"><b style="color:green;">'.$row["surg_symp"]."".'<button class="btn btn-info btn-xs">View</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_surg_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_rpt2"><b style="color:blue;">'.$row["surg_symp"]."".'<button class="btn btn-warning btn-xs">Upload</button></a>';
		}
	}else{
		$sub_array[] = $row["surg_symp"];
	}
	$sub_array[] = $row["surg_symp_det"];
	$sub_array[] = $row["surg_dtssc"];
	// Culture Report
	if($row["surg_sp_ssi"] == 'Yes'){
		$qry2 = mysqli_query($connect,"SELECT * FROM tbl_surg_upld2 WHERE surg_id = '$centid'")or die(mysqli_error($connect));
		$rs2 = mysqli_num_rows($qry2);
		if($rs2 > 0)
		{
			$sub_array[] = '<a title="Click here to view reports" style="cursor:pointer;text-decoration:none;" data-href="view_surg_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult"><b style="color:green;">'.$row["surg_sp_ssi"].'</b><button class="btn btn-info btn-xs">View</button></a>';
		}else{
			$sub_array[] = '<a title="Click here to upload reports" style="cursor:pointer;text-decoration:none;" data-href="upd_surg_cult_rpt.php?rd='.$row["huf_id"].'" data-target="_blank" class="edit_cult2"><b style="color:blue;">'.$row["surg_sp_ssi"].'</b><button class="btn btn-warning btn-xs">Upload</button></a>';
		}
		
	}else{
		$sub_array[] = $row["surg_sp_ssi"];
	}
	$sub_array[] = $row["surg_recd"];
  } 

	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_surg(),
	"data"				=>	$data
);
echo json_encode($output);
?>