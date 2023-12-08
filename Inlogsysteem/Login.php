<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', 'Reserveringen');
define('DB_USER', 'root');
define('DB_PASS', 'ROOT_PASSWORD');

global $PDO;

try {
    $PDO = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$Identify = isset($_REQUEST['Identify']) ? trim($_REQUEST['Identify']) : '';
$Password = isset($_REQUEST['password']) ? trim($_REQUEST['password']) : '';

// Prepare and execute a query to fetch user data
$stmt = $PDO->prepare('SELECT pwd, PersonID FROM users WHERE Username = :username');
$stmt->execute([':username' => $Identify]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($Password, $user['pwd'])) {
    // Password matches, store user ID in session
    $_SESSION['PersonID'] = $user['PersonID'];
    // Optionally, you can fetch and store other necessary user data from the database when needed.
} else { 
    $_SESSION['error'] = 'Wachtwoord komt niet overeen met het account.';
}
