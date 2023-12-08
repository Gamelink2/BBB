<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanmelden</title>
</head>
<body>
    <form action="Sign-up.php" style="border:1px solid #ccc">
        <div class="container">
          <h1>Aanmelden</h1>
          <p>Vul het onderstaande formulier in om een account aan te maken</p>
          <hr>

          <label for="Gebruikersnaam">Gebruikersnaam</label>
          <input type="text" name="Gebruikersnaam" id="Gebruikersnaam" placeholder="Gebruikersnaam" required>
      
          <label for="email"><b>E-mail</b></label>
          <input type="text" placeholder="E-mailadres" name="email" id="email" required>
      
          <label for="wachtwoord"><b>Wachtwoord</b></label>
          <input type="password" placeholder="Wachtwoord" name="wachtwoord" id="wachtwoord" required>
      
          <label for="Herhaal_wachtwoord"><b>Herhaal wachtwoord</b></label>
          <input type="password" placeholder="Herhaal_wachtwoord" name="Herhaal_wachtwoord" id="Herhaal_wachtwoord" required>
      
          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Onthoud mij
          </label>
      
          <p>Door een account aan te maken, gaat u akkoord met onze <a href="#" style="color:dodgerblue">Voorwaarden</a>.</p>
      
          <button type="button" class="cancelbtn" onclick="cancelled()">Annuleren</button>
          <button type="submit" class="signupbtn">Aanmelden</button>
        </div>
      </form>
      <script>
        function cancelled() {
          if (window.history.length > 1) {
            window.history.go(-1);
          } else {
            window.close();
          }
        }
      </script>

      <?php
      if ( isset($_SESSION['Message'])) {
      echo $_SESSION['Message'];
      session_unset();
      }
      ?>
</body>
</html>

