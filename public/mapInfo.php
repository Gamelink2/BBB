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
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Images/BBB.ico" />
  <meta name="theme-color" content="#000000" />
  <meta
    name="description"
    content="BBB"
  />
  <title>BBB</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="index.css">
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
