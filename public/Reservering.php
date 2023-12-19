<?php
session_start();
if (isset($_SESSION['ErrorMessage'])) {
    echo $_SESSION['ErrorMessage'];
}
?>
<!DOCTYPE html>
<html lang="nl">
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
    <div class="bodyReservering">
        <container class="reserveringContainer">
            <h1>Reserveren voor xx/xx/xxxx t/m xx/xx/xxx</h1>
            <form id="contactForm" method="post" action="Input.php">
                <input class="email" type="email" id="femail" name="femail" placeholder="Email:" autocomplete="email" /> 
                <select name="fname" id="fname" onchange="aanhefCheck(this.value);" autocomplete="honorific-prefix">
                    <option value="" disabled selected hidden>Hoe wilt u geaddresseerd worden?</option>
                    <option value="Heer">Heer</option>
                    <option value="Mvr.">Mvr.</option>
                    <option value="Geen">Geen</option>
                    <option value="Anders:">Anders:</option>
                </select>   
                <input type="text" id="anders" name="anders" style="display: none;" placeholder="Aanhef:" autocomplete="honorific-suffix" />
                <input type="text" id="voornaam" name="voornaam" placeholder="Voornaam:" autocomplete="given-name" />
                <input type="text" id="tussen" name="tussen" placeholder="Tussenvoegsel:" autocomplete="additional-name" />
                <input type="text" id="achternaam" name="achternaam" placeholder="Achternaam:" autocomplete="family-name" />
                <input type="tel" id="telNmr" name="telNmr" placeholder="06 12345678" autocomplete="tel" inputmode="numeric" />
                <input class="postcode" type="text" id="postcode" name="postcode" placeholder="Postcode:" autocomplete="postal-code" />
                <input class="straatnaam" type="text" id="straat" name="straat" placeholder="Straatnaam:" autocomplete="address-line1" />
                <input class="huisnummer" type="text" id="huisNmr" name="huisNmr" placeholder="Huisnummer:" autocomplete="address-line2" />
                <input class="toevoeging" type="text" id="huisNmr+" name="huisNmr+" placeholder="Toevoeging:" autocomplete="address-line3" />
                <input type="text" id="gemeente" name="gemeente" placeholder="Gemeente:" autocomplete="address-level2" />
                <input type="text" id="land" name="land" placeholder="Land:" autocomplete="country" />
                <select name="middelen" id="middelen" required>
                    <option value="">Waarmee komt u kamperen</option>
                    <option value="Tent">Tent</option>
                    <option value="caravan">Caravan</option>
                    <option value="Anders">Anders</option>
                </select>
                <div id="andersInput" style="display: none;">
                    <label for="anders">Anders, specificeren:</label>
                    <input type="text" name="anders" id="anders">
                </div>
                <textarea class="fmsg" id="verzoek" name="verzoek" form="contactForm" placeholder="Speciale verzoeken: (Mogelijk ten extra kosten i.v.m. verzoek)"></textarea>
                <input class="submit" type="submit" value="Submit"/>
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
?>
</body>
</html>
