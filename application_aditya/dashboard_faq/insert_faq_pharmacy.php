<?php


include('../dbinfo.php');

$data=array(' Manual','MOM','Licenses for pharmacy ',
                                                                    'Licenses for pharmacist ',' Licenses for narcotic drugs','Drug Formulary','LASA','High risk medication list' ,'High risk medication storage','Emergency drug list ','Emergency drug storage','Inventory management ( ABC analysis / VED analysis)','Narcotic drugs storage','Psychotropic medication','Temperature control 3 times a day','P & P for Recall ','P & P for Expiry medicine ','P & P for verification of high risk medication','P & P for procuring drugs (vendor selection , GRN receipt)','P & P for Implant procurement / cardiac stents ',' Scheduled X drugs list','List of prescription (H drugs)','Antibiotic policy');





if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ($data as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_pharmacy (faqname, pos ) VALUES ('$value', $a)";
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