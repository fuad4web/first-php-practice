<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Comment Form</title>
</head>
<body>
    <form method="POST">
        <label>Name: <br><input type="text" name="name"><br></label>
        <label>Message: <br><textarea cols="45" rows="5" name="message"></textarea><br></label>
        <input type="submit" name="post" value="POST">
    </form>
</body>
</html>

<?php
    $name = $_POST["name"];
    $message = $_POST["message"];
    $submit = $_POST["post"];

    if($submit) {
        $write = fopen("comment.txt", 'a+');
        $fwrite($write, "<u><b>$name</u></b><br>$message</br>");
        fclose($write);

    // Display Comments
    $read = fopen("comment.txt", "r+t");
    echo "All Comments:<br>";

    while(!feof($read)) {
        echo fread($read, 1024);
    }
    fclose($read);
} else {
    $read = fopen("comment.txt", "r+t");
    echo "All Comments:<br>";

    while(!feof($read)) {
        echo fread($read, 1024);
    }
    fclose($read);
}
?>