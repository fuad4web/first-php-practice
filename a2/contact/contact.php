<?php 
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    $myMail = "zfuad6454@gmail.com";
    $header = "From: ".$email;
    $theMessage = "You have recieved a message from ".$name."\n\n".$message;

    mail($myMail, $subject, $theMessage, $header);
    header("Location: indexContact.php?mailsent");
?>
