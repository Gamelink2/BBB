<?php
session_start(); // Start the session
require 'vendor/autoload.php'; // Load Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once("Connection.php");
global $PDO;

$mail = new PHPMailer(true);

try {
    $VoorNaam = isset($_REQUEST['voornaam']) ? trim($_REQUEST['voornaam']) : '';
    $TussenVoegsel = isset($_REQUEST['tussen']) ? trim($_REQUEST['tussen']) : '';
    $AchterNaam = isset($_REQUEST['achternaam']) ? trim($_REQUEST['achternaam']) : '';
    $TelefoonNummer = isset($_REQUEST['telNmr']) ? trim($_REQUEST['telNmr']) : '';
    $Email = isset($_REQUEST['femail']) ? trim($_REQUEST['femail']) : '';
    $PostCode = isset($_REQUEST['postcode']) ? trim($_REQUEST['postcode']) : '';
    $StraatNaam = isset($_REQUEST['straat']) ? trim($_REQUEST['straat']) : '';
    $HuisNummer = isset($_REQUEST['huisNmr']) ? trim($_REQUEST['huisNmr']) : '';
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
        $stmt2->execute();

        // Send confirmation email
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com';
        $mail->Password = 'your-password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('BouwenVoorBoerBert@gmail.com', 'Boer Bert');
        $mail->addAddress($Email, $VoorNaam);
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation Email';
        
        // Read HTML file contents
        $htmlContent = file_get_contents('email_template.html');
        
        // Replace placeholders with actual values
        $htmlContent = str_replace('{{VoorNaam}}', $VoorNaam, $htmlContent);
        
        // Assign the modified HTML content to the email body
        $mail->Body = $htmlContent;
        $mail->AltBody = 'Your reservation has been added successfully.'; // Plain text alternative
        
        $mail->send();
        echo 'Message has been sent';
    } else {
        $ErrorMessage = "Fill in all required fields.";
    }
} catch (Exception $e) {
    $ErrorMessage = 'There was an error: ' . $e->getMessage();
}

$_SESSION['ErrorMessage'] = $ErrorMessage;
echo "<script> 
    alert('" . $ErrorMessage . "');
    window.history.go(-1);
</script>";

echo '<script>window.close();</script>';



