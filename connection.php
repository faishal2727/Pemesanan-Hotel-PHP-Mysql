<?php
 
$databaseHost = 'localhost';
$databaseName = 'hotelku';
$databaseUsername = 'root';
$databasePassword = '';
 
$connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

session_start();
if (!$connection) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
