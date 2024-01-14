<?php

session_start();

if (!isset($_SESSION['ErrorMessage'])) {}
    ?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php include('navbar.php'); ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Images/BBB.ico" />
  <meta name="theme-color" content="#000000" />
  <meta name="description" content="BBB" />
  <title>BBB</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="Css/Reservering.css">
</head>
<body>
    <div class="bodyReservering">
            <form class="reserveringForm" id="contactForm" method="post" action="Input.php">
                
            <?php
            if (isset($_SESSION["ErrorMessage"])) {
                $errorMessage = $_SESSION["ErrorMessage"];

                if ($errorMessage !== "Reservering is toegevoegd") {
                    echo '
                        <p style="
                            font-family: Arial, Helvetica, sans-serif;
                            font-size: large;
                            color: red;
                        ">
                            ' . $errorMessage . '
                        </p>';
                } else {
                    echo '
                        <p style="
                            font-family: Arial, Helvetica, sans-serif;
                            font-size: large;
                            color: green;
                        ">
                            ' . $errorMessage . '
                        </p>';
                }
            }        
            echo '<container class="reserveringContainer">';
            echo '  
            <select class="topForm" name="aanhef" id="aanhef">
            <option value="">Hoe wilt u geaddreseerd worden?</option>
            <option value="Meneer" '.(isset($_SESSION['aanhef']) && $_SESSION['aanhef'] === "Meneer" ? 'selected' : '').'>Meneer</option>
            <option value="Mevrouw" '.(isset($_SESSION['aanhef']) && $_SESSION['aanhef'] === "Mevrouw" ? 'selected' : '').'>Mevrouw</option>
            <option value="Anders" '.(isset($_SESSION['aanhef']) && $_SESSION['aanhef'] === "Anders" ? 'selected' : '').'>Anders</option>
            </select>
            <div id="andersInputA" style="display: none;">
            <input type="text" name="andersA" id="andersA" placeholder="Anders, specificeren:*" value="'. (isset($_SESSION['middelen']) ? $_SESSION["middelen"] : '') .'">
            </div>
            ';

            echo '
            <input type="text" id="voornaam" name="voornaam" placeholder="Voornaam:*" value="' . (isset($_SESSION['voornaam']) ? $_SESSION["voornaam"] : '') . '" autocomplete="given-name" />
            ';
            
            echo '
            <input type="text" id="achternaam" name="achternaam" placeholder="Achternaam:*" autocomplete="family-name" value="' . (isset($_SESSION['achternaam']) ? $_SESSION["achternaam"] : '') . '"/>
            ';

            echo '
            <input class="email" type="email" id="femail" name="femail" placeholder="Email:*" autocomplete="email" value="' . (isset($_SESSION['email']) ? $_SESSION["email"] : '') . '" />
            ';
            
            echo '
            <input type="tel" id="telNmr" name="telNmr" placeholder="06 12345678*" autocomplete="tel" inputmode="numeric"/value="' . (isset($_SESSION['nummer']) ? $_SESSION["nummer"] : '') . '"/>
            ';
            
            echo '<div class="adress">';
            echo '
            <input class="postcode" type="text" id="postcode" name="postcode" placeholder="Postcode:* " autocomplete="postal-code" value="' . (isset($_SESSION['postcode']) ? $_SESSION["postcode"] : '') . '"/>
            ';
            
            echo '
            <input class="straatnaam" type="text" id="straat" name="straat" placeholder="Straatnaam:" autocomplete="address-line1" value="' . (isset($_SESSION['straatnaam']) ? $_SESSION["straatnaam"] : '') . '"/>
            ';
            
            echo '
            <input class="huisnummer" type="text" id="huisNmr" name="huisNmr" placeholder="Huisnummer:" autocomplete="address-line2" value="'. (isset($_SESSION['huisnummer']) ? $_SESSION["huisnummer"] : '') . '"/>
            ';
            echo '</div>';

            echo '
                <input type="number" name="volwassenen" placeholder="Aantal volwassenen:*" value="'. (isset($_SESSION['Volwassenen']) ? $_SESSION["Volwassenen"] : '') .'">
            ';

            echo '
                <input type="number" class="bottomForm" name="kinderen" placeholder="Aantal kinderen:*" value="'.(isset($_SESSION["kinderen"]) ? $_SESSION["kinderen"] : '').'">
            ';

            echo '</container>';
            echo '<container class="reserveringContainer">';

            echo '
            <select class="topForm" name="middelen" id="middelen">
            <option value="">Waarmee komt u kamperen*</option>
            <option value="Tent" '.(isset($_SESSION['middelen']) && $_SESSION['middelen'] === "Tent" ? 'selected' : '').'>Tent</option>
            <option value="caravan" '.(isset($_SESSION['middelen']) && $_SESSION['middelen'] === "caravan" ? 'selected' : '').'>Caravan</option>
            <option value="Anders" '.(isset($_SESSION['middelen']) && $_SESSION['middelen'] === "Anders" ? 'selected' : '').'>Anders</option>
            </select>
            <div id="andersInput" style="display: none;">
            <input type="text" name="anders" id="anders" placeholder="Anders, specificeren:*" value="'. (isset($_SESSION['middelen']) ? $_SESSION["middelen"] : '') .'">
            </div>
            ';
            

            if (isset($_SESSION['verzoek'])) {
                echo '
                <textarea class="fmsg" id="verzoek" name="verzoek" form="contactForm" placeholder="Speciale verzoeken: (Mogelijk ten extra kosten i.v.m. verzoek)">
                    ' . $_SESSION['verzoek'] . '
                </textarea>';
            } else {
                echo '
                <textarea class="fmsg" id="verzoek" name="verzoek" form="contactForm" placeholder="Speciale verzoeken: (Mogelijk ten extra kosten i.v.m. verzoek)"></textarea>
                ';
            }                    


            if (isset($_SESSION['BeginDatum'])) {
                echo '
                    <label for="begindatum">Begin datum:</label>
                    <input type="date" id="begindatum" name="begindatum" min="' . date('Y-m-d') . '" value="' . $_SESSION['BeginDatum'] . '">
                ';
            } else {
                echo '
                    <label for="begindatum">Begin datum:</label>
                    <input type="date" id="begindatum" name="begindatum" min="' . date('Y-m-d') . '" placeholder="Begin datum?">
                ';
            }

            if (isset($_SESSION['EindDatum'])) {
                $sixtyDaysLater = date('Y-m-d', strtotime('+60 days'));
                echo '
                    <label for="einddatum">Eind datum:</label>
                    <input type="date" id="einddatum" name="einddatum" value="' . $_SESSION['EindDatum'] . '" placeholder="Eind datum? * ">
                ';
            } else {
                $sixtyDaysLater = date('Y-m-d', strtotime('+60 days'));
                echo '
                    <label for="einddatum">Eind datum:</label>
                    <input type="date" id="einddatum" name="einddatum" max="' . $sixtyDaysLater . '" placeholder="Eind datum? * ">
                ';
            }

            ?>  

<input class="submit" type="submit" value="Submit">
</container>
</form>

<script>
const middelenSelect = document.getElementById('middelen');
const andersInput = document.getElementById('andersInput');

middelenSelect.addEventListener('change', function() {
    if (this.value === 'Anders') {
        andersInput.style.display = 'block';
        excludedFields = excludedFields.filter(item => item !== 'anders');
    } else {
        andersInput.style.display = 'none';
        excludedFields.push('anders');
    }
});

const aanhefSelect = document.getElementById('aanhef');
const andersInput2 = document.getElementById('andersInputA');
aanhefSelect.addEventListener('change', function() {
    if (this.value === 'Anders') {
        andersInput2.style.display = 'block';
        excludedFields = excludedFields.filter(item => item !== 'andersA');
    } else {
        andersInput2.style.display = 'none';
        excludedFields.push('andersA');
    }
});

// JavaScript to validate the end date against the start date
document.getElementById('begindatum').addEventListener('input', function () {
    var startDate = new Date(this.value);
    var endDateInput = document.getElementById('einddatum');
    
    // If an end date is already selected and it's before the new start date, clear the end date
    if (endDateInput.value !== '' && new Date(endDateInput.value) < startDate) {
        endDateInput.value = '';
    }

    // Update the minimum allowed date for the end date to be the new start date
    endDateInput.min = this.value;
    
    // Calculate the maximum allowed date for the end date (60 days after the start date)
    var maxEndDate = new Date(startDate.getTime() + (60 * 24 * 60 * 60 * 1000));
    endDateInput.max = maxEndDate.toISOString().split('T')[0];
});

var excludedFields = ['andersA', 'verzoek', 'anders']; //fields that are not required
validateForm(excludedFields);

function validateForm(excludedIds) {
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        // Get all input elements from within the form
        var inputs = this.querySelectorAll('input, select, textarea');
        var isEmptyFieldFound = false;

        // Loop through each input element
        inputs.forEach(function(input) {
            // Check if the input is empty and is not in the excludedIds list
            if (!input.value.trim() && !excludedIds.includes(input.id)) {
                // Add the "emptyField" class to the input
                input.classList.add('emptyField');
                isEmptyFieldFound = true;
            }
            // remove the "emptyField" class on focus
            input.addEventListener('focus', function() {
                this.classList.remove('emptyField');
            });
        });
        if (isEmptyFieldFound) {
            // Prevent the form from submitting if any empty fields were found
            event.preventDefault();
            alert('Vul alle verplichte velden in')
        }
    });
}
</script>
</div>

<?php
    $_SESSION["loginPerson"] = $logged;
    session_unset();
    $logged = $_SESSION["loginPerson"];    

?>
</body>
</html>
