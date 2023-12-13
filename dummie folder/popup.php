<?php
    include_once 'includes/dbPage.inc.php';
?>



<!DOCTYPE html>
<html>
<head>
  <!--   toggle knop heeft deze shit nodig... en die form hieronder moet weg voor m om te werken... <p id="plekData"></p>
  <button name='button' id='1' onclick="showData()">ShowData plsss</button>

-->

<form method="post">
        <input type="submit" name="showData" value="GO" />
</form>


<!-- dit is dan nu een stukje wat ik geprobeerd werkend te maken vanaf die link die je stuurde... werkt nu niet tho...-->

</head>
<body>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['showData'])) 
{
    show();
}

    $sql = "SELECT * FROM popupInhoud;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    function show() {
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['PlekID'] . "<br>";            
            echo $row['lengte'] . "<br>";
            echo $row['breedte'];
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