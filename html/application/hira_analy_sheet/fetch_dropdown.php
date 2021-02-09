<?php
include('../dbinfo.php'); 

if(isset($_POST["hira_place_dep_id"]))
{


 if($_POST["action"]=="one") {

  $query = $connect->query("SELECT * FROM tbl_hira_activity WHERE tbl_hira_place_dep_id = ".$_POST['hira_place_dep_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;

    print_r($query->fetch_assoc());
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select Activity</option>';
        while($row = $query->fetch_assoc()){ 
        	if(isset($row['activity_name'])){
            echo '<option value="'.$row['activity_name'].'">'.$row['activity_name'].'</option>';
            }
        }
    }else{
        echo '<option value="">Activity not available</option>';
    }
} elseif($_POST["action"]=="two") {

  $query = $connect->query("SELECT * FROM tbl_hira_occupation WHERE tbl_hira_place_dep_id = ".$_POST['hira_place_dep_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;

    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select Occupational Hazard</option>';
        while($row = $query->fetch_assoc()){
        if(isset($row['occupation_name'])) 
            echo '<option value="'.$row['occupation_name'].'">'.$row['occupation_name'].'</option>';
        }
    }else{
        echo '<option value="">Occupational Hazard not available</option>';
    }
} elseif($_POST["action"]=="three") {

  $query = $connect->query("SELECT * FROM tbl_hira_occp_risk WHERE tbl_hira_place_dep_id = ".$_POST['hira_place_dep_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;

    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select Occupational Risk</option>';
        while($row = $query->fetch_assoc()){ 
        	if(isset($row['occp_risk_name'])) 
            echo '<option value="'.$row['occp_risk_name'].'">'.$row['occp_risk_name'].'</option>';
        }
    }else{
        echo '<option value="">Occupational Risk available</option>';
    }
}




}










?>