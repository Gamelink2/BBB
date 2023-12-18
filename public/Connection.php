<?php

session_start();

define('DB_HOST', 'Lovey dovey');
define('DB_PORT', '6969' );
define('DB_NAME', 'SO YOU HAVE CHOSEN.. DEATH?');
define('DB_USER', 'Santa Claus');
define('DB_PASS', 'Lolly pop');


global $PDO;

try {
    // Use the constants in the PDO connection string
    $PDO = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

