<?php


include('../dbinfo.php');

 $data=array('Manual',
                                                                    ' QI ',
                                                                    'Data collection for QI',
                                                                    'Forms and formats',
                                                                    'JD/JS','Man power requisition format ',
                                                                    'Application form','Interview  evaluation form',
                                                                    'Background verification form','Joining report form',
                                                                    ' Declaration for criminal check',' Document checklist',
                                                                    'Credentialing an d privileging formats (doctors/ nurses)',
                                                                    'Training attendance sheet',' Training feedback form',
                                                                    ' Promotions increment format','Annual appraisal form',
                                                                    'Clearance form / Exit interview','2 employee file ( Doctor) ',
                                                                    '2 employee file (Nurse) ','2 employee file (Administration) ',
                                                                    ' 2 employee file (ICN) ','2 employee file (Housekeeping) ',
                                                                    '2 employee file (Security) ','2 employee file ( Any technician {1 pathology/ 1 radiology} ) ',' 1 RSO file (Dr. Bang)','Dietician / Physiotherapy file','Employee rights & responsibility',
                                                                    'Leave policy','Late coming policy','P & P Grievance redressal ',
                                                                    'MOM for Grievance redressal','P & P for Promotions /increment',
                                                                    'P & P for Credentialing and privileging','MOM for Credentialing and privileging','Training calendar ','Training record (attendance , feedback and questioner)','Pre health check up record','Immunization record');    
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_hr (faqname, pos ) VALUES ('$value', $a)";
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