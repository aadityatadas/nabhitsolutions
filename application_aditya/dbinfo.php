<?php

date_default_timezone_set('Asia/Calcutta');	
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=nabhupdate1', $username, $password );

$connect = mysqli_connect("localhost", "root", "", "nabhupdate1"); 




$root= 'http://localhost/health_care/nabhnewUpdated/nabhNewmarch/';


define('HOSPITAL_NAME','Criticare Hospital');

define('HOSPITAL_NAME_IMAGE',$root."assets/hosp.png");

?>