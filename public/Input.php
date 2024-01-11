<!-- Mocht de gebruiker blijven hangen om een of andere reden... -->
<a href="./">Oeps, terug naar pagina..</a>

<?php
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
    $_SESSION["middelen"] = $Middelen = isset($_REQUEST['middelen']) ? trim($_REQUEST['middelen']) : '';
    $_SESSION["verzoek"] = $Verzoek = isset($_REQUEST['verzoek']) ? trim($_REQUEST['verzoek']) : '';
    $_SESSION["BeginDatum"] = $BeginDatum = isset($_REQUEST['begindatum']) ? trim($_REQUEST['begindatum']) : '';
    $_SESSION["EindDatum"] = $EindDatum = isset($_REQUEST['einddatum']) ? trim($_REQUEST['einddatum']) : '';
    $_SESSION["Volwassenen"] = $Volwassenen = isset($_REQUEST['volwassenen']) ? trim($_REQUEST['volwassenen']) : '';
    $_SESSION["kinderen"] = $Kinderen = isset($_REQUEST['kinderen']) ? trim($_REQUEST['kinderen']) : '';

    if (!empty($VoorNaam) && !empty($AchterNaam) && !empty($TelefoonNummer) && !empty($Email) && !empty($Middelen) && !empty($Volwassenen) && !empty($EindDatum) && !empty($BeginDatum) && !empty($PostCode) ) {
        if (isset($_SESSION["kinderen"])) {
            $aantal = $_SESSION["kinderen"] + $_SESSION["Volwassenen"];
            }
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

        $sql2 = "INSERT INTO persoonsgegevens (VoorNaam, TussenVoegsel, AchterNaam, TelefoonNummer, Email, Verzoek, Volwassenen, kinderen, Aantal_Personen) VALUES (:voornaam, :tussen, :achternaam, :telNmr, :femail, :verzoek, :volwassenen, :kinderen, :aantal)";
        $stmt2 = $PDO->prepare($sql2);
        $stmt2->bindParam(':voornaam', $VoorNaam, PDO::PARAM_STR);
        $stmt2->bindParam(':tussen', $TussenVoegsel, PDO::PARAM_STR);
        $stmt2->bindParam(':achternaam', $AchterNaam, PDO::PARAM_STR);
        $stmt2->bindParam(':telNmr', $TelefoonNummer, PDO::PARAM_STR);
        $stmt2->bindParam(':femail', $Email, PDO::PARAM_STR);
        $stmt2->bindParam(':Begindatum', $BeginDatum, PDO::PARAM_STR);
        $stmt2->bindParam(':einddatum', $EindDatum, PDO::PARAM_STR);
        $stmt2->bindParam(':verzoek', $Verzoek, PDO::PARAM_STR);
        $stmt2->bindParam(':volwassenen', $Volwassenen, PDO::PARAM_STR);
        $stmt2->bindParam(':kinderen', $Kinderen, PDO::PARAM_STR);
        if (isset($aantal)){
        $stmt2->bindParam(':aantal', $aantal, PDO::PARAM_STR);
        }
        if ($stmt2->execute()){
            $ErrorMessage = "Reservering is toegevoegd";
            // include_once("Send_Email.php");
        } ;
        
    } else {
        $ErrorMessage = "Fill in all required fields.";
    }
} catch (Exception $e) {
    $ErrorMessage = 'There was an error: ' . $e->getMessage();
}

$_SESSION['ErrorMessage'] = $ErrorMessage;
echo "<script> alert(". $ErrorMessage . ") </>script";
header("Location: ./Reservering.php");
exit();
?>
