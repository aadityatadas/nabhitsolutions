<?php


include('../dbinfo.php');

$data=array('Manual',' Quality Indicators',
                                                                      'Data for quality indicator',' Training Record',
                                                                      'PPE','Scope of services','Services not available ',
                                                                      'HIC protocol – terminal cleaning/ fumigation record/chemicals used','HEPA filters- record',' Sterile equipment – checklist',
                                                                      'OT booking register','OT implant register',
                                                                      'Pressure/ temperature & humidity record','Zoning – without mixing ',' Cleaning of equipments','Culture reports',' Medical record- PAC completed/ Alderte’s scoring/ OT notes/ WHO checklist/ Post –       Operative plan/ consents complete with SNDT','Reuse policy','Temperature control for fridge  3 times a day'); 




if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_otnurse (faqname, pos ) VALUES ('$value', $a)";
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