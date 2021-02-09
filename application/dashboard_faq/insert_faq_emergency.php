<?php


include('../dbinfo.php');

 $data=array('Mission Vision',' Patient Rights and responsibilities',
                                                                      'MLC procedure – records',' P & P for CPR','Scope of services',
                                                                      ' Services not available ','crash cart – register',' Emergency drugs',
                                                                      ' High risk drugs','BME record – history card of equipments','Instruments register','  Code blue mock drill',' Humidifier/ Oxygen supply','BMW segregation / guide line',
                                                                      'Triage','Criteria for stable and unstable patient',' Transfer procedure',
                                                                      ' P & P for Brought dead  patient','P & P for Ambulance  ',' DAMA','Vulnerable Patients',
                                                                      ' Patient identifier','Verbal order policy','Close monitoring for high risk drugs',
                                                                      ' Spill management ',' HIC practices',' Sample collection','Safe transfer to wards'                                                                         );




if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_emergency (faqname, pos ) VALUES ('$value', $a)";
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