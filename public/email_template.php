<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Template</title>
</head>
<body>
    <div class="container">
        <h1>Your Reservation Confirmation</h1>
        <p>Hello <?php echo htmlspecialchars($VoorNaam); ?>,</p>
        <p>Your reservation has been successfully added!</p>
        
        <p>If you have any questions, feel free to contact us.</p>
        <div class="footer">
            <p>This is an automated email. Please do not reply.</p>
        </div>
    </div>
</body>
</html>
