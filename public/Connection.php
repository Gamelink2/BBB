<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.html");
    die();
    
}   
session_start();

define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', 'Reserveringen');
define('DB_USER', 'root');
define('DB_PASS', 'ROOT_PASSWORD');


global $PDO;

try {
    // Use the constants in the PDO connection string
    $PDO = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}