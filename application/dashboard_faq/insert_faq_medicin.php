




<?php


include('../dbinfo.php');

$data_medicin=array('Manual','Quality Indicators',
                                                                        'Data for quality indicators','Training Record',
                                                                        'PPE',' Scope of services','Services not available ','    Verbal order policy','Stable & unstable patients criteria',
                                                                        'Crash cart','Emergency drugs','High risk drugs','BME record – history card of equipments',' Instruments register',
                                                                        ' Code blue mock drill','Humidifier/ Oxygen supply','BMW segregation / guideline','Vulnerable Patients','    Terminal cleaning record','Safe medication practices',
                                                                        'Barrier Nursing',' High risk medication verification medication ','Adverse drug events','Procedure for informed consent','Medical record  - consents complete with SNDT',
                                                                        'HIC procedures- hand washing, Sterilium,','Spill management ',
                                                                        ' Transfer procedure','Discharge procedure','Temperature control for fridge  3 times a day'
                                                                );               



if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data_medicin as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_medicin (faqname, pos ) VALUES ('$value', $a)";
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