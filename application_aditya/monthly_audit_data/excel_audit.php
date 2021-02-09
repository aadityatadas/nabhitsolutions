<?php
include('../dbinfo.php');

if(isset($_POST["user_id"]))
{
	$tbl = $_POST['tbl'];

	$statement1 = $connection->prepare("SELECT * FROM $tbl WHERE id = '".$_POST["user_id"]."'");
	$statement1->execute();
	$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
	$audit_month = $result1[0]['audit_month'];
	$audit_year = $result1[0]['audit_year'];



	// $sq="DELETE FROM  $tbl WHERE audit_month = '$audit_month' AND audit_year = '$audit_year'";
	// mysqli_query($connect,$sq);
	
	
	// echo 'Details Are Deleted Successfully';


	$output = '';

	$output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th width="35%">Sr. No.</th>
                    <th width="20%">Name of the Patient</th>
                    <th width="25%">UHID No</th>
                    <th width="20%">OPD No</th>
                    <th width="20%">Specialty / Doctor</th>
                    <th width="20%">Date & Time of Registration  of OPD</th>
                    <th width="20%">Date & Time by which Doctor has seen the Patient</th>
                    <th width="20%">OPD waitingTime in Min.</th>
                    <th width="20%">Recorded By</th>
                    
                    </tr>
  ';

  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;	
}
?>