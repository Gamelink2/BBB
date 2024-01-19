<!DOCTYPE html>
<html lang="nl">
<html>
<head>
    <?php include('navbar.php'); ?>
    <link rel="stylesheet" href="./Css/confirm.css">
</head>
<body>
    <div class="test">
    <div class="confirm">
        <h1>Bedankt voor uw reservering!</h1>
        <h2>Wij wensen u een fijne vakantie!</h2>
        <a class="button" href="index">Terug naar de home pagina</a>
    </div>
    </div>
</body>
<?php
    if (isset($_SESSION["loginPerson"])) {
    $_SESSION["loginPerson"] = $logged;
    session_unset();
    $logged = $_SESSION["loginPerson"];   
    } else {
        session_unset();
    };
    
?>
</html>


