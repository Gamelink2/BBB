<?php
include_once 'Connection.php';

function show($conn) {
    $areaId = $_POST['value'];
    // Haal alle resultaten op uit de database
    $sql = "SELECT * FROM popupInhoud WHERE PlekID = $areaId;";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        // Haal het aantal rijen op
        $rowCount = mysqli_num_rows($result);

        // Toon het aantal resultaten
        // echo "Totaal aantal resultaten: " . $rowCount . "<br>";

        // Toon elk resultaat aanvankelijk verborgen
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p class='Pop-Up' id='spot_1" . $row['PlekID'] . " display= 'block''>
            De plek is (lengte bij breedte) "
                . $row['lengte'] ." x ". $row['breedte']  . " meter " . ".</p>";
        }
    }
}




//BOVENSTAANDE PHP STUKJE WERKT, HIJ GEEFT RESULTS, ALLEEN KUNNEN ZE NOG NIET WEG.

?>

<!DOCTYPE html>
<html>
<head>
    <title>anything</title>
</head>
<body>

<form method="post">
        <input value="1" type="submit" placeholder="plek 1" name="value"></input>
        <input value="2" type="submit" placeholder="plek 2" name="value"></input>
        <input value="3" type="submit" placeholder="plek 3" name="value"></input>
</form>

        




<?php
    if (isset($_POST['value'])) {
        show($conn);
        unset($_POST['value']);
    }
?>


</body>
</html>

<?php
 //Connect with the database with the login from Connection.php

if (isset($_POST['showData']) && (!empty($_POST['showData']))  ) {
    $areaId = $_POST['PlekID'];
    
    // Prepare the query with a placeholder for the ID
    $query = "SELECT * FROM Table WHERE PlekID = $areaId";
    
    $stmt_PlekID = $pdo->prepare($query);
    $stmt_PlekID->execute([$areaId]);

    // Fetch the result as an array
    $result = $stmt_PlekID->fetch(PDO::FETCH_ASSOC);

    // Check if there's a result for the provided ID
    if ($result) {
        // Generate HTML content based on the fetched data
        echo '<h2>' . $result['PlekID'] . '</h2>';
        echo '<p>Breedte: ' . $result['breedte'] . '</p>';
        echo '<p>Lengte: ' . $result['lengte'] . '</p>';
        // Add other relevant information here...
    } else {
        echo 'No data found for this area ID.';
    }
}

// Je kan schijnbaar de url verandere met javascript
// Dus als Nick de pagina laat herladen met een id van de plek, 
// wordt de data van de specifieke plek opgevraagd 
// Dus voor de terug knop, terug sturen naar het originel url (plek id weghalen/ geen value geven)

?>
<button onclick="window.location.href='popup.php';">reset knopie</button>
