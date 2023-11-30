<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <main>
    <p>We will respond to you shortly after sending the mail to us</p>
        <form method="post" action="contactform.php">
            <input type="text" name="name" placeholder="Full-Name">
            <input type="text" name="mail" placeholder="Your E-mail">
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" placeholder="Message"></textarea>
            <button name="submit" type="submit">SEND MAIL</button>
        </form>
    </main>
</body>
</html>