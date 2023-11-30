<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div>
        <h1>Contact Form</h1>
        <p>Please fill the Input Fields</p>
        <form action="indexContact.php" method="POST">
            <input type="text" name="name" placeholder="FullName">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <button name="submit" type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>
