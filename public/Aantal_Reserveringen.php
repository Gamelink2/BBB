<?php
session_start();

include_once("Connection.php");
$query = "SELECT * FROM Table";
$stmt = $PDO->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveringen</title>
</head>
<body class="BackGround Color">
    <div class="Container">
        <div class="Row"> 
            <div class="Column"> 
                <div class="Card">
                    <div class="Card-Header">
                        <h2>Reserveringen.</h2>
                    </div>
                    <div class="Card-Body">
                        <table class="Table Table-Bordered text-center">
                            <tr class="Background Black text-center text-white">
                                <td>User Id</td>
                                <td>First name</td>
                                <td>Last name</td>
                                <td>Email</td>
                                <td>Number</td>
                            </tr>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?php echo $row['Aanhef']; ?></td>
                                    <td><?php echo $row['Voornaam']; ?></td>
                                    <td><?php echo $row['Achternaam']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Nummer']; ?></td>
                                </tr>
                            <?php 
                            } //Blijft doorgaan tot er niets meer is. 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
