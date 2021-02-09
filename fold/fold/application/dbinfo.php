<?php

date_default_timezone_set('Asia/Calcutta');	
$username = 'root';
$password = 'password';
$connection = new PDO( 'mysql:host=localhost;dbname=test_db', $username, $password );

$connect = mysqli_connect("localhost", "root", "password", "test_db"); 
?>