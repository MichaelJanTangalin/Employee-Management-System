<?php

$serverName3 = "localhost";
$dBUsername3 = "root";
$dbPassword3 = "";
$dbName3 = "integrativesystem_attendance";

$conn3 = mysqli_connect($serverName3, $dBUsername3, $dbPassword3, $dbName3);

if (!$conn3) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>