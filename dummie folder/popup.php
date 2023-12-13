<?php
    include_once 'includes/dbPage.inc.php';
?>



<!DOCTYPE html>
<html>
<head>
  <!--   toggle knop heeft deze shit nodig... en die form hieronder moet weg voor m om te werken... <p id="plekData"></p>
  <button name='button' id='1' onclick="showData()">ShowData plsss</button>

-->

<form method="post" action="" >
        <input type="submit" name="showData" value="GO" />
</form>

<?php

if (isset($_POST['showData'])) {
    show();
    unset($_POST['showData']);

}

?>

<!-- dit is dan nu een stukje wat ik geprobeerd werkend te maken vanaf die link die je stuurde... werkt nu niet tho...-->

</head>
<body>

<?php
 



 function show($conn) {
    $sql = "SELECT * FROM popupInhoud;";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
    } else {
        $resultCheck = mysqli_num_rows($result);
        
        if ($resultCheck > 0) {
            foreach ($row = mysqli_fetch_assoc($result)) {
                echo $row['PlekID'] . "<br>";            
                echo $row['lengte'] . "<br>";
                echo $row['breedte'] . "<br>";
            }
        } else {
            echo "No results found.";
        }
    }
}
 






?>

<!-- dit onderstaande script is gwn een toggle dingetje, als je echo lengte() veranderd print ie wat je er neer zet...

<script>
function showData()
{
var id=document.getElementsByName("button")[0].id;
if(id==1)
{
    document.getElementById("plekData").innerHTML = echo lengte();
    document.getElementsByName("button")[0].id=0;
}
else
{
    document.getElementById("plekData").innerHTML = "";
    document.getElementsByName("button")[0].id=1;
}
}


</script>


-->




    




</body>
</html>