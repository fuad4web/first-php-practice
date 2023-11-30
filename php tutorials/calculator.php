<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/phpstyle.css">
</head>
<body>
<form method="POST">
   <input type="text" name="firstnum" placeholder="input firstnum">
   <select name="operators">
      <option>None</option>
      <option>Add</option>
      <option>Subtract</option>
      <option>Multiply</option>
      <option>Divide</option>
   </select>
   <input type="text" name="secondnum" placeholder="input secondnum">
   <br><br>
   <button type="submit" name="calculate" value="submit">Calculate</button>
</form><br><br>
<p>The Answer is:  </p><br><br>

<!--GET & POST in Php-->
    <form method="GET">
        <input type="text" name="name" value="value">
        <button type="submit">PRESS ME</button>
    </form>

<?php
    if(isset($_POST['calculate'])) {
        $input1 = $_POST['firstnum'];
        $input2 = $_POST['secondnum'];
        $operators = $_POST['operators'];
        $fina = $_POST['calculate'];
        
        switch($operators) {
            case 'None':
                echo "You need to choose a opearator";
            break;
            case "Add":
                echo $input1 + $input2;
            break;
            case 'Subtract':
                echo $input1 - $input2;
            break;
            case 'Multiply':
                echo $input1 * $input2;
            break;
            case 'Divide':
                echo $input1 / $input2;
            break;
        }
        echo '<input type="text" name="final" value="'.$fina.'">';
    };


    $dayoftheweek = date("w");
    switch($dayoftheweek) {
        case 1:
            echo "You can come on Monday";
        break;
        case 2:
            echo "You must come on Tuesday";
        break;
        case 3:
            echo "<p>I dont need you on Wednesday</p>";
        break;
        case 4:
            echo "Why can't you come on Thursday";
        break;
        case 5:
            echo "Lazy fellow just coming on Friday";
        break;
        case 6:
            echo "The start of a new weekend, Saturday";
        break;
        default:
        echo "Wow, todays party will be Wow!, Sunday!!!<br>";
    }

    
    $t = 2;
    while($t <= 5) {
        echo "Yeah it is<br>";
        $t++;
    }
    $array = array("Fuad", "Desmond", "Luthfullahi");
    foreach ($array as $anothervariable) {
        echo "My name & the name of my team is ".$anothervariable."<br>";
    }

?>

</body>
</html>