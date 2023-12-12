<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.html");
    die();
} else {
session_start();

define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');


global $PDO;

try {
    // Use the constants in the PDO connection string
    $PDO = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$VoorNaam = isset($_REQUEST['voornaam']) ? trim($_REQUEST['voornaam']) : ''; // Need to include this
$TussenVoegsel = isset($_REQUEST['tussen']) ? trim($_REQUEST['tussen']) : '';
$AchterNaam = isset($_REQUEST['achternaam']) ? trim($_REQUEST['achternaam']) : ''; // Need to include this
$TelefoonNummer = isset($_REQUEST['telNmr']) ? trim($_REQUEST['telNmr']) : ''; // Need to include this
$Email = isset($_REQUEST['femail']) ? trim($_REQUEST['femail']) : ''; // Need to include this
$PostCode = isset($_REQUEST['postcode']) ? trim($_REQUEST['postcode']) : ''; // Need to include this
$StraatNaam = isset($_REQUEST['straat']) ? trim($_REQUEST['straat']) : '';
$HuisNummer = isset($_REQUEST['huisNmr']) ? trim($_REQUEST['huisNmr']) : '';
$HuisNummerToeVoegsel = isset($_REQUEST['huisNmr+']) ? trim($_REQUEST['huisNmr+']) : '';
$Gemeente = isset($_REQUEST['gemeente']) ? trim($_REQUEST['gemeente']) : ''; 
$Land = isset($_REQUEST['land']) ? trim($_REQUEST['land']) : '';
$Middelen = isset($_REQUEST['middelen']) ? trim($_REQUEST['middelen']) : ''; // Need to include this 
$Verzoek = isset($_REQUEST['verzoek']) ? trim($_REQUEST['verzoek']) : '';

if (!empty($VoorNaam) && !empty($AchterNaam) && !empty($TelefoonNummer) && !empty($Email) && !empty($PostCode) && !empty($Middelen)) {
    
    $sql = "INSERT INTO links (Link, Username, userIP, Date) VALUES (:links, :Username, :userIP, NOW())";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':links', $links, PDO::PARAM_STR);
    $stmt->bindParam(':userIP', $userIP, PDO::PARAM_STR);
    $stmt->bindParam(':Username', $Username, PDO::PARAM_STR);
    if ($stmt->execute()) {
        $Message = "reservering is toegevoegd";
    };

}else {
    $Message = "Vul alle gegevens in.";
}

$_SESSION['ErrorMessage'] = $Message;
    echo "<script> 
            aler:'.$e.'
            window.history.go(-1);
          </script>";

};

    echo '<script>window.close</script>;';
