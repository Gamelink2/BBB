<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'PlaceHolder@gmail.com'; // SMTP username
    $mail->Password = 'PlaceHolder'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient details
    $mail->setFrom('PlaceHolder@gmail.com', 'Your Name'); // Sender's email address and name
    $mail->addAddress($_SESSION['Email'] , $_SESSION['voornaam']); // Recipient's email address and name

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email via PHPMailer';    
    $emailContent = file_get_contents('email_template.html');
    $mail->Body = $emailContent !== false ? $emailContent : 'Reservering is toegevoegd';

    // Send email
    $mail->send();
    echo 'Email has been sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: {$mail->ErrorInfo}';
    exit();
}
?>
<a href='index.html'><button>Terug</button></a>
