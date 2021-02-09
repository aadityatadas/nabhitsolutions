<?php

include('dbinfo.php');



$output = array();
$query = "SELECT * FROM tbl_loc_checklist ";

$statement = $connection->prepare($query);
$statement->execute();
$checklist_locations = $statement->fetchAll();


 


?>