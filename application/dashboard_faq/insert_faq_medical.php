




<?php


include('../dbinfo.php');

 $data_medical=array('Manual','Quality Indicators',' Data for quality indicators',
                                                                        ' Security for MR','Fire safety for MR','Documents in MR','MOM (medical record review)',
                                                                        'Inward register','Outward register','File Requisition Form','Indent form','File tracker',
                                                                        ' 2 death files','2 MLC files','2 TPA files','2 discharge files','Checklist for documents','Trackers for the files','Retention policy'


                                                                    );        
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data_medical as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_medical (faqname, pos ) VALUES ('$value', $a)";
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