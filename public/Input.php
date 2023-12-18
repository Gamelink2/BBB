<?php
session_start(); 

include_once("Connection.php");
global $PDO;

try {
    $Aanhef = isset($_REQUEST['fname']) ? trim($_REQUEST['fname']) : ''; // moet nog wel ergens aan worden toegevoegd
    $VoorNaam = isset($_REQUEST['voornaam']) ? trim($_REQUEST['voornaam']) : '';
    $TussenVoegsel = isset($_REQUEST['tussen']) ? trim($_REQUEST['tussen']) : '';
    $AchterNaam = isset($_REQUEST['achternaam']) ? trim($_REQUEST['achternaam']) : '';
    $TelefoonNummer = isset($_REQUEST['telNmr']) ? trim($_REQUEST['telNmr']) : '';
    $Email = isset($_REQUEST['femail']) ? trim($_REQUEST['femail']) : '';
    $PostCode = isset($_REQUEST['postcode']) ? trim($_REQUEST['postcode']) : '';
    $StraatNaam = isset($_REQUEST['straat']) ? trim($_REQUEST['straat']) : '';
    $HuisNummer = isset($_REQUEST['huisNmr']) && $_REQUEST['huisNmr'] !== '' ? trim($_REQUEST['huisNmr']) : null;
    $HuisNummerToeVoegsel = isset($_REQUEST['huisNmr+']) ? trim($_REQUEST['huisNmr+']) : '';
    $Gemeente = isset($_REQUEST['gemeente']) ? trim($_REQUEST['gemeente']) : '';
    $Land = isset($_REQUEST['land']) ? trim($_REQUEST['land']) : '';
    $Middelen = isset($_REQUEST['middelen']) ? trim($_REQUEST['middelen']) : '';
    $Verzoek = isset($_REQUEST['verzoek']) ? trim($_REQUEST['verzoek']) : '';

    if (!empty($VoorNaam) && !empty($AchterNaam) && !empty($TelefoonNummer) && !empty($Email) && !empty($PostCode) && !empty($Middelen)) {
        // Inserting into the database
        $sql = "INSERT INTO adresgegevens (Postcode, Huisnummer, Toevoeging, Straatnaam, Woonplaats, Land, Kampeermiddel) VALUES (:Postcode, :Huisnummer, :Toevoeging, :Straatnaam, :Woonplaats, :Land, :Kampeermiddel)";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':Postcode', $PostCode, PDO::PARAM_STR);
        $stmt->bindParam(':Huisnummer', $HuisNummer, PDO::PARAM_STR);
        $stmt->bindParam(':Toevoeging', $HuisNummerToeVoegsel, PDO::PARAM_STR);
        $stmt->bindParam(':Straatnaam', $StraatNaam, PDO::PARAM_STR);
        $stmt->bindParam(':Woonplaats', $Gemeente, PDO::PARAM_STR);
        $stmt->bindParam(':Land', $Land, PDO::PARAM_STR);
        $stmt->bindParam(':Kampeermiddel', $Middelen, PDO::PARAM_STR);
        $stmt->execute();

        $sql2 = "INSERT INTO persoonsgegevens (VoorNaam, TussenVoegsel, AchterNaam, TelefoonNummer, Email, Verzoek) VALUES (:voornaam, :tussen, :achternaam, :telNmr, :femail, :verzoek)";
        $stmt2 = $PDO->prepare($sql2);
        $stmt2->bindParam(':voornaam', $VoorNaam, PDO::PARAM_STR);
        $stmt2->bindParam(':tussen', $TussenVoegsel, PDO::PARAM_STR);
        $stmt2->bindParam(':achternaam', $AchterNaam, PDO::PARAM_STR);
        $stmt2->bindParam(':telNmr', $TelefoonNummer, PDO::PARAM_STR);
        $stmt2->bindParam(':femail', $Email, PDO::PARAM_STR);
        $stmt2->bindParam(':verzoek', $Verzoek, PDO::PARAM_STR);
        if ($stmt2->execute()){
            $ErrorMessage = "Reservering is toegevoegd";
        } ;
        
    } else {
        $ErrorMessage = "Fill in all required fields.";
    }
} catch (Exception $e) {
    $ErrorMessage = 'There was an error: ' . $e->getMessage();
}

$_SESSION['ErrorMessage'] = $ErrorMessage;
header("Location: Reservering.php");

echo '<button onclick=' . header("location: index.html").';">Mits u blijft hangen, druk hier.</button>
';




