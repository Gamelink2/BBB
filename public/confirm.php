<?php
session_start();

$VoorNaam = $_SESSION['voornaam'];
$AchterNaam = $_SESSION['achternaam'];
$TelefoonNummer = $_SESSION['nummer'];
$Email = $_SESSION['email'];
$Middelen = $_SESSION['middelen'];
$Verzoek = $_SESSION['verzoek'];
$Volwassenen = $_SESSION['Volwassenen'];
$Kinderen = $_SESSION['kinderen'];
$aantal = $_SESSION['aantal'];
$BeginDatum = $_SESSION['BeginDatum'];
$EindDatum = $_SESSION['EindDatum'];

// Debugging: Check if session variables are set
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('navbar.php'); ?>
    <link rel="stylesheet" href="./Css/confirm.css">
</head>
<body>
<form id="contact-form" onload="handleForm()">
    <div class="contact-form">
        <div class="test">
          <div class="confirm">
            <input type="email" name="from_email" style="display: none;" value='<?php echo $Email; ?>'>
                <h1>Bedankt voor uw reservering!</h1>
                <h2>Beste <span name="FirstName"><?php echo $VoorNaam; ?></span> <span name="LastName"><?php echo $AchterNaam; ?></span></h2>
                <h2>U heeft gereserveerd voor <span name="StartDate" ><?php echo $BeginDatum; ?></span> tot en met <span name="EndDate"><?php echo $EindDatum; ?></span></h2>
                <h2>U heeft het volgende aangegeven:</h2>
                <ul>
                  <li>
                    Aantal personen: <span name="amount" ><?php echo $aantal; ?></span><br>
                    waarvan: <span name="grownups" ><?php echo $Volwassenen; ?></span> Volwassenen en <span name="kids"><?php echo $Kinderen; ?></span> kinderen. 
                  </li>
                  <li>
                    Mobiele nummer:<span name="number"><?php echo $TelefoonNummer; ?></span>
                  </li>
                    <li>
                      U komt met: een <span name='arrive_with' ><?php echo $Middelen; ?> </span>
                    </li>
                    <li>
                      Met bericht: <span name='request'><?php echo $Verzoek; ?></span> 
                    </li>
                  </ul>
                  
                  <h2>Wij wensen u een fijne vakantie!</h2>
                  <a class="button" href="./">Terug naar de home pagina</a>
            </div>
        </div>
      </div>
    </form>
      
    


    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script>
      (function () {
        emailjs.init('RBuOCpeu2TmAUuTAp');
      })();
    </script>
    <script>
      const handleForm = async (e) => {
        try {
          await emailjs.sendForm('service_wjo1v61', 'template_1hmid03', document.getElementById('contact-form'));
          alert('email sent!');
        } catch (error) {
          console.error(error);
          alert('Failed to send email');
        }
      };
    </script>



</body>
<?php
// if (isset($loginPerson)) {
//     $logged = $loginPerson;
//   }
// session_destroy();
// session_start(); 

// if (isset($logged)) {
//   $logged = $loginPerson;
// }
?>

</html>
