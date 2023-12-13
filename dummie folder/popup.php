<?php
include_once 'includes/dbPage.inc.php';

function show($conn) {
    $sql = "SELECT * FROM popupInhoud;";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
    } else {
        $resultCheck = mysqli_num_rows($result);
        
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['PlekID'] . "<br>";            
                echo $row['lengte'] . "<br>";
                echo $row['breedte'] . "<br>";
            }
        } else {
            echo "Geen resultaten.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Title</title>
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
