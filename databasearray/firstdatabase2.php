<?php
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserting Array from Database</title>
</head>
<body>

<?php

    $sql = "SELECT * FROM data";
    $result = mysqli_query($conn, $sql);
    $datas = array();
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
    }
    //print_r($datas);
    foreach($datas as $eachdata) {
        echo $eachdata['texts'] . " ";
    }
    foreach($datas[0] as $eachdata) {
        echo $eachdata . "<br><br>";
    }
?>
<?php
    // associative array
    $associative = array(
        "First" => "Tajudeen",
        "Middle" => "Modasola",
        "age" => 19
    );
    echo $associative["Middle"];

?>

</body>
</html>