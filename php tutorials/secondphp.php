<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<form action="secondphp.php" method="POST">
    <input type="text" name="surname" placeholder="Surname">
    <input type="text" name="age" placeholder="Age">
    <input type="submit" name="submit" value="SUBMIT">
</form>

<?php
    if(isset($_POST['submit'])) {
        $myFile = fopen("images/file.txt", "a");
        $text = "My name is ".$_POST['surname']." Fuad Opeyemi Oladipupo and I will be ".$_POST['age']." this year"."\n";
        fwrite($myFile, $text);
        fclose($myFile);
    }

    $schools = array(
        "courses" => "Computer Science",
        "Students" => "Brian",
        "Lecturers" => "Oduwole"
    );
    foreach($schools as $school => $property) {
        echo "The Polytechnic Ibadan is full of " .$school." and ".$property."<br>";
    }
    echo "<br><br>";
    $boyNames = array("Abdulhammed", "Fu'ad", "Opeyemi", "Fuskydon");
    $girlsNames = array("Sofiyat", "Amanat", "Seyidat", "Maryam");
    $names = array_merge($boyNames, $girlsNames);
    print_r ($names);
    echo"<br>";
    foreach($names as $num => $namesGangan) {
        echo "I think I got this ".$namesGangan."<br>";
    }
    echo "<br><br>";

    $weather = array("Rain", "Sunshine", "Clouds", "Hail", "Sleet", "Snow", "Wind");
    echo "We've seen all kinds of Weather this month. At the beginning of the month, we had " .$weather[5]." and" .$weather[6]." . Then came ".$weather[1]. "with a few ".$weather[2]. "and some ".$weather[0].". Atleast we didnt get any of the ".$weather[3]. "or ".$weather[4]."<br><br>";
    // date_default_timezone_set('Africa/Nigeria');

    
?>

</body>
</html>