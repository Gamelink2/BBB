<?php
session_start();
$_SESSION['$voornaam'] = $VoorNaam;
$_SESSION['$achternaam'] = $AchterNaam;
$_SESSION['$nummer'] = $TelefoonNummer;
$_SESSION['$email'] = $Email;
$_SESSION['$middelen'] = $Middelen;
$_SESSION['$verzoek'] = $Verzoek;
$_SESSION['$Volwassenen'] = $Volwassenen;
$_SESSION['kinderen'] = $Kinderen;
$_SESSION['aantal'] = $aantal;
$_SESSION['$BeginDatum'] = $BeginDatum;
$_SESSION['$EindDatum'] = $EindDatum;


?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('navbar.php'); ?>
    <link rel="stylesheet" href="./Css/confirm.css">
</head>
<body>
    <form id="contact-form">
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
                    waarvan: <span name="grownups" ><?php echo $Volwassenen; ?></span> Volwassenen en <span name="kids"><?php echo $kinderen; ?></span> kinderen. 
                  </li>
                  <li>
                    Mobiele nummer:<span name="number"><?php echo $TelefoonNummer; ?></span>
                  </li>
                    <li>
                      U komt met: een <span name='arrive_with' ><?php echo $middelen; ?> </span>
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

    const handleForm = async () => {
        try {
            const formElement = document.getElementById('contact-form');
            console.log('Form Element:', formElement);

            if (formElement) {
                const formData = new FormData(formElement);
                console.log('FormData:', formData);

                const response = await emailjs.sendForm('service_wjo1v61', 'template_1hmid03', formData);
                console.log('Email response:', response);
                alert('Email sent successfully!');
            } else {
                throw new Error('Form element not found.');
            }
        } catch (error) {
            console.error('Error sending email:', error);

            console.groupCollapsed('Detailed Error Information');

            console.error('Error Message:', error.message);
            console.error('Stack Trace:', error.stack);

            // Log each property individually and recursively for nested properties
            const logProperties = (obj, prefix = '') => {
                Object.getOwnPropertyNames(obj).forEach((prop) => {
                    const propValue = obj[prop];
                    const propType = typeof propValue;

                    if (propType === 'object' && propValue !== null) {
                        console.group(`Property (${prefix}${prop}):`);
                        logProperties(propValue, `${prefix}${prop}.`);
                        console.groupEnd();
                    } else {
                        console.log(`(${prefix}${prop}): Type - ${propType}, Value - ${propValue}`);
                    }
                });
            };

            logProperties(error);

            console.groupEnd();

            alert('Failed to send email. Check the console for details.');
        }
    };

    window.onload = function () {
        handleForm();
    };

    window.onbeforeunload = function (e) {
        const confirmationMessage = "Bent u zeker dat u de pagina wilt verlaten? Uw e-mail zou mogelijk niet worden verzonden.";

        e.returnValue = confirmationMessage;

        return confirmationMessage;
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
