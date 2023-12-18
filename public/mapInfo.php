<?php
include_once 'Connection.php';

function show($pdo) {
    if (isset($_POST['value'])) {
        $areaId = $_POST['value'];

        try {
            $sql = "SELECT * FROM popupInhoud WHERE PlekID = :areaId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':areaId', $areaId);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                foreach ($result as $row) {
                    echo "<p class='Pop-Up' id='spot_1" . $row['PlekID'] . "' style='display: block;'>
                    De plek is (lengte bij breedte) "
                        . $row['lengte'] ." x ". $row['breedte']  . " meter " . ".</p>";
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
    show($PDO);
    unset($_POST['value']);
}
?>


</body>
</html>

<button onclick="window.location.href='mapInfo.php';">reset knopie</button>
