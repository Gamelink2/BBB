<?php
session_start();

$expectedToken = "your_generated_token"; // Retrieve the expected token from your server

$userToken = $_GET['token']; // Get token from the URL

if ($userToken !== $expectedToken) {
    // Redirect the user away
    header("Location: Home");
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('navbar.php'); ?>
    <link rel="stylesheet" href="./Css/confirm.css">
</head>
<body>
    <div class="test">
        <div class="confirm">
            <h1>Bedankt voor uw reservering!</h1>
            <h2>Wij wensen u een fijne vakantie!</h2>
            <a class="button" href="./Home">Terug naar de home pagina</a>
        </div>
    </div>
</body>
<?php
if (isset($_SESSION["loginPerson"])) {
    $logged = $_SESSION["loginPerson"];
}
session_destroy();
session_start(); 

if (isset($logged)) {
    $logged = $_SESSION["loginPerson"];
}
?>
</html>
