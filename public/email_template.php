<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
</head>
<body>
        <h1>Bevestiging van uw reservering</h1>
        <p>Hallo <?php echo htmlspecialchars($VoorNaam); ?>,</p>
        <p>Uw reservering is succesvol toegevoegd!</p>
        <p>U heeft hetvolgende opgegeven:</p>
        <li>
            Vanaf: <?php echo htmlspecialchars($BeginDatum) ?>
            <br>
            tot: <?php echo htmlspecialchars($EindDatum) ?>
        </li>
        <p>Als u vragen heeft, neem gerust <a href="">contact</a> met ons op.</p>
        <div class="footer">
            <p>Dit bericht wordt automatisch verstuurd, je kunt er niet op reageren.</p>
        </div>
    </div>
</body>
</html>
