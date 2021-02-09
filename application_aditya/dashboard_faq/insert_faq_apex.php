<?php


include('../dbinfo.php');

$data=array('Mission, Vision of the hospital?',
                                                                    'All statuaries completed and renewed',
                                                                    'MOM (Safety , Quality)','Emergency Codes');




if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_apex (faqname, pos ) VALUES ('$value', $a)";
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