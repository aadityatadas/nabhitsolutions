<?php


include('../dbinfo.php');

$data=array('Manual','Quality Indicators',
                                                                        'Data for quality indicators','Training',
                                                                        ' PPE',' P&P for Sample requisition','P&P for Sample collection','P&P for safe transportation of sample',
                                                                        'P&P for  HIC practices','P&P for Critical alert',
                                                                        'P&P for reporting',
                                                                        'Register for TAT','Register for  Redo’s',
                                                                        'P&P for recall of report','P&P for informing Critical alert value','P&P for BMW – training display',
                                                                        'P&P for Disposal of specimen ','Antibiogram if asked','All departmental Registers','Cleaning protocol',
                                                                        'Register for  validation test','Quality assurance – External- reports','Calibration reports – BME','List of outsourced services','TAT for  outsourced '); 



if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_lab (faqname, pos ) VALUES ('$value', $a)";
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