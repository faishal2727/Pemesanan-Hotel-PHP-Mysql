<?php
 
$databaseHost = '127.0.0.1';
$databasePort = '5432';
$databaseName = 'mahasiswa';
$databaseUsername = 'postgres';
$databasePassword = 'faishal2727';

$connection = pg_connect($databaseHost,$databasePort,$databaseUsername,$databaseName,$databasePassword); 

if (!$connection) {
    die("Gagal terhubung dengan database: ");
}

?>
