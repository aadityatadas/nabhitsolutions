<?php


include('../dbinfo.php');

$data_safety=array('Mock drills','MOM',
                                                                        'Manual','Fire  Training','Emergency codes – RED, BLUE, PINK, ORANGE, YELLOW','Training',' Fire NOC','Fire exit','Evacuation plan'
                                                                    );


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data_safety as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_safety (faqname, pos ) VALUES ('$value', $a)";
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