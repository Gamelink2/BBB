<?php

include_once("Connection.php");


global $PDO;


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
        $ErrorMessage = "reservering is toegevoegd";
        // Send confirmation email

        $to = $Email; // note the comma

        // Subject
        $subject = 'Birthday Reminders for August';

        // Message
        $message = '
            <html>
            <head>
            <title>Birthday Reminders for August</title>
            </head>
            <body>
            <p>Here are the birthdays upcoming in August!</p>
            <table>
                <tr>
                <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
                </tr>
                <tr>
                <td>Johny</td><td>10th</td><td>August</td><td>1970</td>
                </tr>
                <tr>
                <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
                </tr>
            </table>
            </body>
            </html>
            ';

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
        $headers[] = 'From: Birthday Reminder <birthday@example.com>';
        $headers[] = 'Cc: birthdayarchive@example.com';
        $headers[] = 'Bcc: birthdaycheck@example.com';

        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));


    } else {
        $ErrorMessage = 'Er is iets fout gegaan, probeer later opnieuw';
    };
} else {
    $ErrorMessage = "Vul alle gegevens in.";
}

$_SESSION['ErrorMessage'] = $ErrorMessage;
header($_SERVER['HTTP_REFERER']);


die();
