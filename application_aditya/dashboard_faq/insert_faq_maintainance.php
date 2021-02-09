




<?php


include('../dbinfo.php');

 $data_maintainance=array('Manual','Quality Indicators','Training Record','Scope of services',' Services not available','Preventive maintenance  plan /report','CMC','AMC',' History card update',' Daily rounds','Response time register',
                                                                        'Calibration reports','Equipment History Documents','Installation reports',
                                                                        'Procurement formats','End user training','Breakdown process','Condemnation Report',
                                                                        ' Asset coding',' List of equipments','Medical gases / safety / daily check','   Generator sets ( license , diesel storage )'


                                                                    ); 


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ( $data_maintainance as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_maintainance (faqname, pos ) VALUES ('$value', $a)";
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