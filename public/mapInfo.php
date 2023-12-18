<?php
include_once 'Connection.php';

function show($conn) {
    if(isset($_POST['value'])) {
        $areaId = $_POST['value'];
        // Fetch results from the database
        $sql = "SELECT * FROM popupInhoud WHERE PlekID = $areaId;";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // Display each result
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p class='Pop-Up' id='spot_1" . $row['PlekID'] . "' style='display: block;'>
                De plek is (lengte bij breedte) "
                    . $row['lengte'] ." x ". $row['breedte']  . " meter " . ".</p>";
            }
        }
    }
}

// This PHP block at the top should ideally be before any HTML content


?>

<!DOCTYPE html>
<html>
<head>
    <title>anything</title>
</head>
<body>

<form id="myForm">
    <input value="1" type="button" onclick="loadData(1)" placeholder="plek 1"></input>
    <input value="2" type="button" onclick="loadData(2)" placeholder="plek 2"></input>
    <input value="3" type="button" onclick="loadData(3)" placeholder="plek 3"></input>
</form>

<div id="content-placeholder">
<?php
// AJAX call to submit form data without page refresh
if(isset($_POST['value'])) {
    show($conn);
    exit(); // Prevent further execution
}
?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function loadData(value) {
        $.post('YourPHPFile.php', { value: value }, function(data) {
            $("#content-placeholder").html(data);
        });
    }
</script>

<button onclick="window.location.href='mapInfo.php';">reset knopie</button>

</body>
</html>
