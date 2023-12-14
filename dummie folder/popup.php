<?php
include_once 'includes/dbPage.inc.php';

function show($conn) {
// En dan alleen zorgen dat boer bert hier als enige bij kan
// Haal alle resultaten op uit de database
$sql = "SELECT * FROM plekken";
$result = mysqli_query($pdo,$sql);

if ($result) {
    // Haal het aantal rijen op
    $rowCount = $result->rowCount();

    // Toon het aantal resultaten
    // echo "Totaal aantal resultaten: " . $rowCount . "<br>"; <-- Debug, zodat je zeker weet dat er iets staat

    // Toon elk resultaat aanvankelijk verborgen
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p class='Pop-Up' id='spot_" . $row['id'] . "' style='display: none;'>De plek is (lengte bij breedte) "
        . $row['length'] ." x ". $row['width']  . " meter "
        . $row["Afstand"] . ".</p>";
    }
}
?>


?>

<!DOCTYPE html>
<html>
<head>
    <title>anything</title>
</head>
<body>

<form method="post" action="">
    <input type="submit" name="showData" value="GO" />

    <?
    if (isset($_POST['showData'])) {
        show($conn);
        unset($_POST['showData']);
    }
    ?>
</form>


</body>
</html>
