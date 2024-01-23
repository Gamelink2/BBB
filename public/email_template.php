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
</html>