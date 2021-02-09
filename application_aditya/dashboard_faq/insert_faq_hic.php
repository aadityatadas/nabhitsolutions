<?php


include('../dbinfo.php');

$data_hic=array('MOM',
                                                                    'Manual',
                                                                    'Training','Data collection record',
                                                                    'Cleaning and sterilization record','Visit  reports ( laundry, canteen )','HEPA Reports –OT / Maintenance','Fumigation records ',
                                                                    ' Display to be made in all the needed places','Pre prophylaxis record','Training barrier nursing',
                                                                    'PPE’s in all needed places','CSSD documentation (Manual)',
                                                                    'Validation Test – All indicators','Recall policy',
                                                                    'CSSD manual','BMW – guidelines and training',
                                                                    'Licenses','Collection & transportation Of BMW',' Weight record of BMW','Documents – fees / receipt/ report ','Availability of chemicals','MSDS sheets for chemicals used'); 
                                                            



if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data_hic as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_hic (faqname, pos ) VALUES ('$value', $a)";
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