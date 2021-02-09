




<?php


include('../dbinfo.php');

 $data_store=array('Manual','MOM ( purchase & condemnation )',
                                                                        'Procurement procedure','GRN , receipts','FDA / approvals from / certifications of vendor','Indent formats','Quotations for various vendors','P & P to purchase','P& P for condemnation','P & P for Indent','Storage Policy (ABC or VED analysis)',' Storage of flammable (under lock & key)',
                                                                        'Consumption record (where ever possible)','Security ','MSDS sheets for chemicals used'

                                                                    );    
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


foreach ( $data_store as $key => $value) {
	$a = $key+1;

    $sql = "INSERT INTO tbl_faq_store (faqname, pos ) VALUES ('$value', $a)";
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