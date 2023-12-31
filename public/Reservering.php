<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
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
<container class="Navbar">
    <ul>
      <li><a href="index.html">Terug</a></li>
      <li><a href="Reservering.php" >Reservation</a></li>
      <li><a href="mapInfo.php">Map Information</a></li>
    </ul>  
</container> 
<container>
    <div class="bodyReservering">
        <container class="reserveringContainer">
            <h1>Reserveren voor xx/xx/xxxx t/m xx/xx/xxx</h1>
             <form id="contactForm" method="post" action="Input.php">
        
        <?php
            if (isset($_SESSION["ErrorMessage"])) {
                echo 
                '<div 
                style="font-family: Arial, Helvetica, sans-serif;
                font-size: large;
                color: red;">
                '.$_SESSION["ErrorMessage"].'
                </div>';
            }
            echo '<input class="email" type="email" id="femail" name="femail" placeholder="Email:*" autocomplete="email" value="' . (isset($_SESSION['email']) ? $_SESSION["email"] : '') . '" required />';

            if (isset($_SESSION["aanhef"])) {
                echo '<select name="fname" id="fname" onchange="aanhefCheck(this.value);" autocomplete="honorific-prefix">
                <option value="" disabled selected hidden>Hoe wilt u geaddresseerd worden?</option>
                <option value="Heer" ' . ($_SESSION["aanhef"] == "Heer" ? 'selected' : '') . '>Heer</option>
                <option value="Mvr." ' . ($_SESSION["aanhef"] == "Mvr." ? 'selected' : '') . '>Mvr.</option>
                <option value="Geen" ' . ($_SESSION["aanhef"] == "Geen" ? 'selected' : '') . '>Geen</option>
                <option value="Anders:" ' . ($_SESSION["aanhef"] == "Anders:" ? 'selected' : '') . '>Anders:</option>
                </select>
                <input type="text" id="anders" name="anders" style="display: ' . ($_SESSION["aanhef"] == "Anders:" ? 'block' : 'none') . ';" placeholder="Aanhef:" autocomplete="honorific-suffix" />';
                } else {
                    echo 
                    '<select name="fname" id="fname" onchange="aanhefCheck(this.value);" autocomplete="honorific-prefix">
                    <option value="" disabled selected hidden>Hoe wilt u geaddresseerd worden?</option>
                    <option value="Heer">Heer</option>
                    <option value="Mvr.">Mvr.</option>
                    <option value="Geen">Geen</option>
                    <option value="Anders:">Anders:</option>
                    </select>
                    <input type="text" id="anders" name="anders" style="display: none;" placeholder="Aanhef:" autocomplete="honorific-suffix" />';
                }

                echo '<input type="text" id="voornaam" name="voornaam" placeholder="Voornaam:*" value="' . (isset($_SESSION['voornaam']) ? $_SESSION["voornaam"] : '') . '" autocomplete="given-name" required />';

                echo '<input type="text" id="tussen" name="tussen" placeholder="Tussenvoegsel:" value="' . (isset($_SESSION['tussenvoegel']) ? $_SESSION["tussenvoegel"] : '') . '" autocomplete="additional-name" />';

                echo '<input type="text" id="achternaam" name="achternaam" placeholder="Achternaam:*" autocomplete="family-name" required value="' . (isset($_SESSION['achternaam']) ? $_SESSION["achternaam"] : '') . '"/>';

                echo '<input type="tel" id="telNmr" name="telNmr" placeholder="06 12345678*" autocomplete="tel" inputmode="numeric" required/value="' . (isset($_SESSION['nummer']) ? $_SESSION["nummer"] : '') . '"/>';

                echo '<input class="postcode" type="text" id="postcode" name="postcode" placeholder="Postcode:" autocomplete="postal-code" value="' . (isset($_SESSION['postcode']) ? $_SESSION["postcode"] : '') . '"/>';

                echo '<input class="straatnaam" type="text" id="straat" name="straat" placeholder="Straatnaam:" autocomplete="address-line1" value="' . (isset($_SESSION['straatnaam']) ? $_SESSION["straatnaam"] : '') . '"/>';

                echo '<input class="huisnummer" type="text" id="huisNmr" name="huisNmr" placeholder="Huisnummer:" autocomplete="address-line2" value="'. (isset($_SESSION['huinummer']) ? $_SESSION["huisnummer"] : '') . '"/>';

                echo '<input class="toevoeging" type="text" id="huisNmr+" name="huisNmr+" placeholder="Toevoeging:" autocomplete="address-line3" value="'. (isset($_SESSION['toevoeging']) ? $_SESSION["toevoeging"] : '') . '"/>';

                echo '<input type="text" id="land" name="land" placeholder="Land:" autocomplete="country" value="'. (isset($_SESSION['land']) ? $_SESSION["land"] : '') .'">';

                if (isset($_SESSION['middelen'])) {
                    echo 
                    '
                    <select name="middelen" id="middelen" required>
                    <option value="">Waarmee komt u kamperen*</option>
                    <option value="Tent" '.(isset($_SESSION['middelen']) && $_SESSION['middelen'] === "Tent" ? 'selected' : '').'>Tent</option>
                    <option value="caravan" '.(isset($_SESSION['middelen']) && $_SESSION['middelen'] === "caravan" ? 'selected' : '').'>Caravan</option>
                    <option value="Anders" '.(isset($_SESSION['middelen']) && $_SESSION['middelen'] === "Anders" ? 'selected' : '').'>Anders</option>
                    </select>
                    <div id="andersInput" style="display: none;">
                    <label for="anders">Anders, specificeren:*</label>
                    <input type="text" name="anders" id="anders" value="'. (isset($_SESSION['anders']) ? $_SESSION["anders"] : '') .'">
                    </div>
                    ';
                } else {
                    echo 
                    '
                    <select name="middelen" id="middelen" required>
                    <option value="">Waarmee komt u kamperen*</option>
                    <option value="Tent">Tent</option>
                    <option value="caravan">Caravan</option>
                    <option value="Anders">Anders</option>
                    </select>
                    <div id="andersInput" style="display: none;">
                    <label for="anders">Anders, specificeren:*</label>
                    <input type="text" name="anders" id="anders">
                    </div>
                    ';
                    }

                if (isset($_SESSION['verzoek'])) {
                    echo '
                    <textarea class="fmsg" id="verzoek" name="verzoek" form="contactForm" placeholder="Speciale verzoeken: (Mogelijk ten extra kosten i.v.m. verzoek)">
                    '. $_SESSION['verzoek'] .'
                    </textarea>';
                } else {
                    echo '<textarea class="fmsg" id="verzoek" name="verzoek" form="contactForm" placeholder="Speciale verzoeken: (Mogelijk ten extra kosten i.v.m. verzoek)"></textarea>';
                }

                if (isset($_SESSION['BeginDatum'])) {
                echo '<input type="date" id="begindatum" name="begindatum" min="' . date('Y-m-d', time()) . '" value="' . $_SESSION['BeginDatum'] . '">';
                } else {
                echo '<input type="date" id="begindatum" name="begindatum" min="' . date('Y-m-d', time()) . '" placeholder="Begin datum?">';
                }

                if (isset($_SESSION['EindDatum'])) {
                $sixtyDaysLater = date('Y-m-d', strtotime('+60 days'));
                echo '<input type="date" id="einddatum" name="einddatum" max="' . $sixtyDaysLater . '" value="' . $_SESSION['EindDatum'] . '" placeholder="Eind datum?">';
                } else {
                $sixtyDaysLater = date('Y-m-d', strtotime('+60 days'));
                echo '<input type="date" id="einddatum" name="einddatum" max="' . $sixtyDaysLater . '" placeholder="Eind datum?">';
                }

                echo '<input type="number" name="volwassenen" placeholder="Hoeveel volwassenen?">';
                echo '<input type="number" name="kinderen" placeholder="Hoeveel kinderen?">';
         ?>


            <input class="submit" type="submit" value="Submit">

            </form>
            </container>
            <script>
            const middelenSelect = document.getElementById('middelen');
            const andersInput = document.getElementById('andersInput');

            middelenSelect.addEventListener('change', function() {
            if (this.value === 'Anders') {
            andersInput.style.display = 'block';
            andersInput.querySelector('input').setAttribute('required', 'true');
            } else {
            andersInput.style.display = 'none';
            andersInput.querySelector('input').removeAttribute('required');
            }
            });
            </script>
            </div>
            <?php
            unset($_SESSION['ErrorMessage']);
            unset($_SESSION['email']);
            unset($_SESSION['aanhef']);
            unset($_SESSION['voornaam']);
            unset($_SESSION['tussenvoegsel']);
            unset($_SESSION['achternaam']);
            unset($_SESSION['nummer']);
            unset($_SESSION['postcode']);
            unset($_SESSION['straatnaam']);
            unset($_SESSION['huisnummer']);
            unset($_SESSION['toevoeging']);
            unset($_SESSION['land']);
            unset($_SESSION['middelen']);
            unset($_SESSION['verzoek']);
            ?>
            </body>
            </html>
