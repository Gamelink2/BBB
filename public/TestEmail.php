<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EmailJS Example</title>

  </head>

  <body>
    <form id="contact-form" onSubmit="handleForm()">
      <label for="fullname">Fullname</label>
      <input type="text" name="from_name" />
      <br/><br/>

      <label for="email">Your Email</label>
      <input type="email" name="from_email"/>
      <br/><br/>

      <label for="subject">Message</label>
      <textarea name="message"></textarea>
      <br/><br/>

      <input type="submit" value="Send"/>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script>
      (function () {
        emailjs.init('1PVVpqMraXzVXJuXv');
      })();
    </script>
    <script>
      const handleForm = async (e) => {
        try {
          await emailjs.sendForm('service_qz6zxh3', 'template_s6ll9hl', document.getElementById('contact-form'));
          alert('email sent!');
        } catch (error) {
          console.error(error);
          alert('Failed to send email');
        }
      };
    </script>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<!-- <script>
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
</script> -->