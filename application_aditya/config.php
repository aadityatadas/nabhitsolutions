<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";
 
$connection = new PDO( 'mysql:host=localhost;dbname=test_db', $username, $password );
    // set the PDO error mode to exception

$connect = mysqli_connect("localhost", "root", "", "test_db"); 
?>