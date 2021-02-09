<?php

include('../dbinfo.php');


$output = array();
$query = "SELECT * FROM tbl_hira_place_dep ";

$statement = $connection->prepare($query);
$statement->execute();
$places = $statement->fetchAll();


 


?>