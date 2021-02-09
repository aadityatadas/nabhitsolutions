<?php  

//index.php



if(isset($_POST["data"]))
{
	$a = array('role'=>'annotation');
	$data[] = array('Gender', 'Number',$a );

	$connect = new PDO("mysql:host=localhost;dbname=db_googlemap", "root", "");

$query = "SELECT name, age FROM tbl_employee ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
     {
      

      $data[] = array($row["name"],(float)$row["age"],(float)$row["age"]);	
     }
	
		
	echo json_encode($data);
}	
?>