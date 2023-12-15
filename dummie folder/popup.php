<?php
include_once 'includes/dbPage.inc.php';

function show($conn) {
    // Haal alle resultaten op uit de database
    $sql = "SELECT * FROM popupInhoud";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Haal het aantal rijen op
        $rowCount = mysqli_num_rows($result);

        // Toon het aantal resultaten
        echo "Totaal aantal resultaten: " . $rowCount . "<br>";

        // Toon elk resultaat aanvankelijk verborgen
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p class='Pop-Up' id='spot_" . $row['id'] . " display= 'block''>
            De plek is (lengte bij breedte) "
                . $row['lengte'] ." x ". $row['breedte']  . " meter "
                . $row["Afstand"] . ".</p>";
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

<form method="post" action="">
    <input type="submit" name="showData" value="GO" />
</form>

<?php
    if (isset($_POST['showData'])) {
        show($conn);
        unset($_POST['showData']);
    }
?>
</body>
</html>


<?  
// require_once("Connection.php"); //Connect with the database with the login from Connection.php

// if (isset($_GET['id']) && (!empty($_GET['id']))  ) {
//     $areaId = $_GET['id'];
    
//     // Prepare the query with a placeholder for the ID
//     $query = "SELECT * FROM Table WHERE plekid = $areaId";
    
//     $stmt_PlekID = $pdo->prepare($query);
//     $stmt_PlekID->execute([$areaId]);

//     // Fetch the result as an array
//     $result = $stmt_PlekID->fetch(PDO::FETCH_ASSOC);

//     // Check if there's a result for the provided ID
//     if ($result) {
//         // Generate HTML content based on the fetched data
//         echo '<h2>' . $result['Plekid'] . '</h2>';
//         echo '<p>Breedte: ' . $result['Breedte'] . '</p>';
//         echo '<p>Lengte: ' . $result['Lengte'] . '</p>';
//         // Add other relevant information here...
//     } else {
//         echo 'No data found for this area ID.';
//     }
// }

// Je kan schijnbaar de url verandere met javascript
// Dus als Nick de pagina laat herladen met een id van de plek, 
// wordt de data van de specifieke plek opgevraagd 
// Dus voor de terug knop, terug sturen naar het originel url (plek id weghalen/ geen value geven)