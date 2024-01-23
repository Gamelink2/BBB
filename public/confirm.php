<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('navbar.php'); ?>
    <link rel="stylesheet" href="./Css/confirm.css">
</head>
<body>
    <div id="contact-form">
        <div class="test">
            <div class="confirm">
                <input type="email" name="from_email" style="display: none;" value='<?php echo $_SESSION['Email']; ?>'>
                <h1>Bedankt voor uw reservering!</h1>
                <h2>Beste <span name="FirstName"><?php echo $_SESSION["voornaam"]; ?></span> <span name="LastName"><?php echo $_SESSION["achternaam"]; ?></span></h2>
                <h2>U heeft gereserveerd voor <span name="StartDate" ><?php echo $_SESSION['BeginDatum']; ?></span> tot en met <span name="EndDate"><?php echo $_SESSION["EindDatum"]; ?></span></h2>
                <h2>U heeft het volgende aangegeven:</h2>
                <ul>
                    <li>
                        Aantal personen: <span name="amount" ><?php echo $_SESSION["aantal"]; ?></span><br>
                        waarvan: <span name="grownups" ><?php echo $_SESSION["Volwassenen"]; ?></span> Volwassenen en <span name="kids"><?php echo $_SESSION["kinderen"]; ?></span> kinderen. 
                    </li>
                    <li>
                        Mobiele nummer:<span name="number"><?php echo $_SESSION['nummer']; ?></span>
                    </li>
                    <li>
                        U komt met: een <span name='arrive_with' ><?php echo $_SESSION['middelen']; ?> </span>
                    </li>
                    <li>
                        Met bericht: <span name='request'><?php echo $_SESSION['verzoek']; ?></span> 
                    </li>
                </ul>

                <h2>Wij wensen u een fijne vakantie!</h2>
                <a class="button" href="./">Terug naar de home pagina</a>
            </div>
        </div>
    </div>
    
    
    <?php
if (isset($_SESSION["loginPerson"])) {
    $logged = $_SESSION["loginPerson"];
  }
session_destroy();
session_start(); 

if (isset($logged)) {
  $logged = $_SESSION["loginPerson"];
}
?>

<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script>
  (function () {
    emailjs.init('RBuOCpeu2TmAUuTAp');
  })();
</script>
<script>
  window.onload = function() {
    handleForm();
};

  const handleForm = async (e) => {
    try {
      await emailjs.sendForm('service_wjo1v61', 'template_1hmid03', document.getElementById('contact-form'));
      alert('email sent!');
    } catch (error) {
      console.error(error);
      console.error('error sending the email: ', error)
      alert('Failed to send email');
    }
  };
  
  window.onbeforeunload = function(e) {
    const confirmationMessage = "Bent u zeker dat u de pagina wilt verlaten? Uw e-mail zou mogelijk niet worden verzonden.";
    
    e.returnValue = confirmationMessage;
    
    return confirmationMessage;
    cancelled = window.location.href('./')
  };
</script>

</body>
</html>
