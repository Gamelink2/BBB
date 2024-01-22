<?php
include_once("Connection.php");
include_once("navbar.php");
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaties</title>
    <link rel="stylesheet" href=".Css/Aantal.css">
    <meta http-equiv="refresh" content="5">
</head>
<body>
    <div class="BG">
        <ul class="Table-head">
            <li>
                Reservering:
            </li>
            <li>
                Aanhef:
            </li>
            <li>
                Voornaam:
            </li>
            <li>
                Achternaam:
            </li>
            <li>
                Nummer:
            </li>
            <li>
                Email:
            </li>
            <li>
            Verzoek:
            </li>
            <li>
            Aantal_Personen:
            </li>
            <li>
            Volwassenen:
            </li>
            <li>
            Kinderen:
            </li>
        </ul>
        
        <div class="persoonsgegevens">
        <?php
            $query = "SELECT * FROM persoonsgegevens";
            $stmt = $PDO->prepare($query);
            $stmt->execute(); // Execute the prepared statement
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                foreach ($results as $result) {
                    ?>
                    <ul id="<?php echo $result['UserID']; ?>" class="Table-content">
                        <li>
                            <?php echo $result['UserID']; ?>
                        </li>
                        <li>
                            <?php 
                            if (empty($result['Aanhef'])) {
                                echo '&nbsp;';
                            } else {
                                echo $result['Aanhef'];
                            }
                            ; ?>
                        </li>

                        <li>
                            <?php echo $result['VoorNaam']; ?>
                        </li>
                        <li>
                            <?php echo $result['AchterNaam']; ?>
                        </li>
                        <li>
                            <?php echo $result['TelefoonNummer']; ?>
                        </li>
                        <li>
                            <?php echo $result['Email']; ?>
                        </li>
                        <li>
                            <?php echo $result['Verzoek']; ?>
                        </li>
                        <li>
                            <?php echo $result['Aantal_Personen']; ?>
                        </li>
                        <li>
                            <?php echo $result['Volwassenen']; ?>
                        </li>
                        <li>
                            <?php echo $result['kinderen']; ?>
                        </li>
                    </ul>
                    <?php
                }
            } else {
                ?>
                <h1>Geen resultaten</h1>
                <?php
            }
            ?>
        </div>
    </div>
    
</body>
</html>

