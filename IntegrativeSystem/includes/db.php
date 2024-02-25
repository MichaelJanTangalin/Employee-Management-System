<?php
$serverName = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dbName = "integrativesystem";

$conn = mysqli_connect($serverName, $dBUsername, $dbPassword, $dbName);



if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}


$serverName2 = "localhost";
$dBUsername2 = "root";
$dbPassword2 = "";
$dbName2 = "integrativesystem_archive";

$conn2 = mysqli_connect($serverName2, $dBUsername2, $dbPassword2, $dbName2);

if (!$conn2) {
    die("Connection Failed: " . mysqli_connect_error());
}

$serverName3 = "localhost";
$dBUsername3 = "root";
$dbPassword3 = "";
$dbName3 = "integrativesystem_attendance";

$conn3 = mysqli_connect($serverName3, $dBUsername3, $dbPassword3, $dbName3);

if (!$conn3) {
    die("Connection Failed: " . mysqli_connect_error());
}


?>