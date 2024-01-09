<?php
include_once 'Connection.php';

//kampeerplekken popup

function show($PDO) {
    $areaId = $_POST['value'];
    // Haal alle data op uit de database
    $sql = "SELECT * FROM popupInhoud WHERE PlekID = $areaId;";
    $result = mysqli_query($PDO, $sql);
    
    if ($result) {
        // Aantal resultaten optellen
        $rowCount = mysqli_num_rows($result);
        // Toon het aantal resultaten:
        // echo "Totaal aantal resultaten: " . $rowCount . "<br>";

        // Toon elk resultaat aanvankelijk verborgen
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p class='Pop-Up' id='spot_1" . $row['PlekID'] . " display= 'block''>
            Deze plek is "
                . $row['Grootte'] . " m2 " . "groot." . "<br>" . 
            "Dit is een " 
                . $row['Kampeermiddel'] . " plek." . " <br>
            Dit is plek nummer  "
                . $row['PlekNmr'] . "." . "<br>" .
            "Dit is een plek voor maximaal " 
                . $row['Personen'] . " personen." . " <br>
            Er is op deze plek plaats voor "
                . $row['Bijzettentjes'] . " bijzettentjes." . "<br>" . 
            "Deze plek heeft " 
                . $row['Stroom'] . " beschikking tot stroom," . " en " . $row['Water'] . " " . "water" . ".
            </p>";
        }
    }
}


function show2($PDO) {
    $areaId = $_POST['value2'];
    // Haal alle data op uit de database
    $sql = "SELECT * FROM gebouwPopup WHERE GebouwID = $areaId;";
    $result = mysqli_query($PDO, $sql);
    
    if ($result) {
        // Aantal resultaten optellen
        $rowCount = mysqli_num_rows($result);
        // Toon het aantal resultaten:
        // echo "Totaal aantal resultaten: " . $rowCount . "<br>";

        // Toon elk resultaat aanvankelijk verborgen
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p class='Pop-Up' id='spot_1" . $row['GebouwID'] . " display= 'block''>
            Hier staat een "
                . $row['Soortgebouw'] . " gebouw. " . "Hier is dit en dit allemaal te doen..." . "<br>" . 
            "Dit gebouw wordt elke dag om stipt " 
                . $row['Openingstijd'] . " uur open." . "<br> 
            Dit gebouw sluit om precies "
                . $row['Sluitingstijd'] . " uur" . ".
            </p>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>anything</title>
</head>
<body>
    <h2>Kampeerplekken:</h2>
    <!-- Knoppen, value word gecheckd in database dus moet overeenkomen met het id in de database -->
        <form method="post">
                <input value="1" type="submit" name="value"></input>
                <input value="2" type="submit" name="value"></input>
                <input value="3" type="submit" name="value"></input>
        </form>
    <h2>Gebouwen:</h2>
        <form method ="post">
                <input value="1" type="submit" name="value2"></input>
                <input value="2" type="submit" name="value2"></input>
                <input value="3" type="submit" name="value2"></input>
                <input value="4" type="submit" name="value2"></input>
        </form>
    <button onclick="window.location.href='mapInfo.php';">Terug knop</button>
</body>
</html>

<?php
    // Connectie tussen database en popup.php
    if (isset($_POST['value'])) {
        show($PDO);
        unset($_POST['value']);
    }

    if (isset($_POST['value2'])) {
        show2($PDO);
        unset($_POST['value2']);
    }

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
