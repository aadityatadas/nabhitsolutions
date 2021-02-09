




<?php


include('../dbinfo.php');

 $data_house=array(' Manual','Availability of PPE',
                                                                        'MSPB certificate','BMW rules Segregation',
                                                                        'Collection transport ( closed trolley )',
                                                                        'Fees / receipt/reports ','Weight record for waste generated ',
                                                                        ' Register for weight',' Register for waste sent out',
                                                                        'Availability of Material for cleaning','Availability of MSDS sheets','Schedule of cleaning',' Clean Mops / brooms (plastic)',
                                                                        ' Training records – BMW rules','Spill management');   
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach (  $data_house as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_house (faqname, pos ) VALUES ('$value', $a)";
    echo $sql;
    echo "<br>";
    $connect->query($sql);
}



// $sql = "INSERT INTO tbl_faq_rec (faqname, pos, )
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($connect->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $connect->error;
// }

$connect->close();





?>