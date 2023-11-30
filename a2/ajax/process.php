<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'ajaxtest');

    echo 'Processing.....';

    //check for post variable
    if(isset($_POST['name'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        echo 'POST: Your name is '.$_POST['name'];

        $query = "INSERT INTO ajax(name) VALUES ('$name')";

        if(mysqli_query($conn, $query)) {
            echo '  User Added';
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
?>
