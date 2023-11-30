<?php

    include_once 'newformdbh.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $conpwd = mysqli_real_escape_string($conn, $_POST['conpwd']);

        $sql = "INSERT INTO fourform (username, email, pwd, con_pwd) VALUES ('$uid', '$email', '$pwd', '$conpwd');";
        mysqli_query($conn, $sql);

        header("location: ../newform.php?signup=success");