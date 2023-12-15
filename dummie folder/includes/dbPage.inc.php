<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "popupsysteem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {  
    die("Connectie error:". mysqli_connect_error());
}