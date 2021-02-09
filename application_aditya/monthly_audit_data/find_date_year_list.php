<?php
//error_reporting(0);
session_start();
$typ = $_SESSION['typ'];
include('../dbinfo.php');

$query = '';
$output = array();

$query = "SELECT audit_month,audit_year FROM $tbl ";
$query.='GROUP by audit_month,audit_year ';
$query .= 'ORDER BY audit_month DESC ';
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
$key = 1;

echo '<div class="col-lg-4"><select name="amonth" id="amonth" class="form-control" required >';
echo '<option>- select Month -</option>';
foreach($result as $row)
{
	echo '<option value='.$row['audit_month'].'>'.$row['audit_month'].'</option>';
}

echo '</select ></div>';

$query = "SELECT audit_year FROM $tbl ";
$query.='GROUP by audit_year ';
$query .= 'ORDER BY audit_year DESC ';
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();


echo '<div class="col-lg-3"><select name="ayear" id="ayear"  class="form-control" required >';
echo '<option>- select Year -</option>';
foreach($result as $row)
{
	echo '<option value='.$row['audit_year'].'>'.$row['audit_year'].'</option>';
}

echo '</select ></div>';


?>