<?php
session_start(); 

include_once("Connection.php");
global $PDO;

try {
    $_SESSION["aanhef"] = $Aanhef = isset($_REQUEST['fname']) ? trim($_REQUEST['fname']) : ''; // moet nog wel ergens aan worden toegevoegd
    $_SESSION["voornaam"] = $VoorNaam = isset($_REQUEST['voornaam']) ? trim($_REQUEST['voornaam']) : '';
    $_SESSION["tussenvoegel"] = $TussenVoegsel = isset($_REQUEST['tussen']) ? trim($_REQUEST['tussen']) : '';
    $_SESSION["achternaam"] = $AchterNaam = isset($_REQUEST['achternaam']) ? trim($_REQUEST['achternaam']) : '';
    $_SESSION["nummer"] = $TelefoonNummer = isset($_REQUEST['telNmr']) ? trim($_REQUEST['telNmr']) : '';
    $_SESSION["email"] = $Email = isset($_REQUEST['femail']) ? trim($_REQUEST['femail']) : '';
    $_SESSION["postcode"] = $PostCode = isset($_REQUEST['postcode']) ? trim($_REQUEST['postcode']) : '';
    $_SESSION["straatnaam"] = $StraatNaam = isset($_REQUEST['straat']) ? trim($_REQUEST['straat']) : '';
    $_SESSION["huisnummer"] = $HuisNummer = isset($_REQUEST['huisNmr']) && $_REQUEST['huisNmr'] !== '' ? trim($_REQUEST['huisNmr']) : null;
    $_SESSION["Huisnummertoevoeging"] = $HuisNummerToeVoegsel = isset($_REQUEST['huisNmr+']) ? trim($_REQUEST['huisNmr+']) : '';
    $_SESSION["land"] = $Land = isset($_REQUEST['land']) ? trim($_REQUEST['land']) : '';
    $_SESSION["midellen"] = $Middelen = isset($_REQUEST['middelen']) ? trim($_REQUEST['middelen']) : '';
    $_SESSION["verzoek"] = $Verzoek = isset($_REQUEST['verzoek']) ? trim($_REQUEST['verzoek']) : '';

    if (!empty($VoorNaam) && !empty($AchterNaam) && !empty($TelefoonNummer) && !empty($Email) && !empty($Middelen)) {
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
exit();
?>
<!-- Mocht de gebruiker blijven hangen om een of andere reden... -->
<a href="Reservering.php">oeps, terug naar pagina   </a>