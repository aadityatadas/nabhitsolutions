




<?php


include('../dbinfo.php');

$data_cssd=array('Manual','HIC protocols',
                                                                        'Issuing register','List of Chemicals Used',
                                                                        ' P & P for cleaning','P & P for drying','P & P for packing',
                                                                        'P & P for issuing instruments','P & P for receiving instruments','P & P for Recall',' Register for  validation test',
                                                                        'Register for swab reports monthly','Cleaning protocol',
                                                                        'Hand hygiene procedure / display/ drying of hands','    Temperature control','MSDS sheets for chemicals used'

                                                                    );   
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ( $data_cssd as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_cssd (faqname, pos ) VALUES ('$value', $a)";
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