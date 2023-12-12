<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');

global $PDO;

try {
    $PDO = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}

$wachtwoord = isset($_REQUEST["wachtwoord"]) ? $_REQUEST["wachtwoord"] : "";

// Check for at least one lowercase letter, one uppercase letter, one number, and a minimum length of 8 characters for the password
// if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $wachtwoord)) {
    $Herhaal_wachtwoord = isset($_REQUEST["Herhaal_wachtwoord"]) ? $_REQUEST["Herhaal_wachtwoord"] : "";

    if ($wachtwoord === $Herhaal_wachtwoord) {
        $gebruikersnaam = isset($_REQUEST["gebruikersnaam"]) ? trim($_REQUEST["gebruikersnaam"]) : "";

        // Sanitize and validate the username
        // if (preg_match('/^[a-zA-Z0-9]+$/', $gebruikersnaam)) {
            $email = isset($_REQUEST["email"]) ? trim($_REQUEST["email"]) : "";

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $gehasht_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

                $sqlSignUp = "INSERT INTO Users (Username, pwd, Email) VALUES (:Gebruikersnaam, :wachtwoord, :Email)";
                $stmtSignUp = $PDO->prepare($sqlSignUp);
                $stmtSignUp->bindParam(":wachtwoord", $gehasht_wachtwoord, PDO::PARAM_STR);
                $stmtSignUp->bindParam(":Gebruikersnaam", $gebruikersnaam, PDO::PARAM_STR);
                $stmtSignUp->bindParam(":Email", $email, PDO::PARAM_STR);

                try {
                    $stmtSignUp->execute();
                    $_SESSION['Message'] = "Account toegevoegd";
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit(); // Terminate script execution after redirect

                } catch (PDOException $e) {
                    $_SESSION['Message'] = 'Fout: ' . $e->getMessage();
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit(); // Terminate script execution after redirect
                }
            } else {
                $_SESSION["message"] = "Ongeldig e-mailadres";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit(); // Terminate script execution after redirect
            }
        // } else {
        //     $_SESSION["message"] = "Ongeldige gebruikersnaam";
        //     header("Location: {$_SERVER['HTTP_REFERER']}");
        //     exit(); // Terminate script execution after redirect
        // }
    } else {
        $_SESSION['Message'] = "Wachtwoorden komen niet overeen";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit(); // Terminate script execution after redirect
    }
// } else {
//     $_SESSION["message"] = "Wachtwoord voldoet niet aan de criteria";
//     header("Location: {$_SERVER['HTTP_REFERER']}");
//     exit(); // Terminate script execution after redirect
// }

