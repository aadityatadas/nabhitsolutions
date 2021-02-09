<?php


include('../dbinfo.php');

 $data_cqi=array('QIP',
                                                                    'CQI presentation (QI)',
                                                                    'Raw data Collection Process','MOM( Quality Assurance committee)',
                                                                    'Finance for quality','Surveillance audit','Mock drill analysis form for emergency codes','MOM for all the committees ',
                                                                    ' Manuals control copy',' HIRA analysis report','Clinical audit','Training calendar'
                                                                );



if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ( $data_cqi as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_cqi (faqname, pos ) VALUES ('$value', $a)";
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