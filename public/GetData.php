<?php

// Zouden wel moeten instellen dat alleen boer Bert hierbij zou kunnen of zijn personeel

session_start();
include("Connection.php");

global $PDO;

// Fetch all results from the database
$sql = "SELECT * FROM plekken";
$result = $PDO->query($sql);

if ($result) {
    // Get the count of rows
    $rowCount = $result->rowCount();

    // Display count of results
    // echo "Total results: " . $rowCount . "<br>"; <-- Debug, zodat je zeker weet dat er iets staat

    // Display each result initially hidden
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<p class='Pop-Up' id='" . $row['id'] . "
        ' style='display: none;'>De plek is (lengte bij breedte) " 
        . $row['length'] ." x ". $row['width']  . " meter "
        . $row["Afstand"] . ".</p>";
    }
}

