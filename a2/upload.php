<?php 
  if(isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $name = $_FILES['file']['name'];
    $tmpname = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    //exxplode from extension name
    $tempExtension = explode('.', $name);
    $fileExtension = strtolower(end($tempExtension));

    // extensions to be allowed
    $isAllowed = array('jpg', 'jpeg', 'png', 'pdf', 'gif');

    // to check whether the extensions is allowed
    if(in_array($fileExtension, $isAllowed)) {
      if($error === 0) {
        if($size < 1000000) {
          $newFileName = uniqid('', true).".".$fileExtension;
          $fileDestination = "images/".$newFileName;
          move_uploaded_file($tmpname, $fileDestination);
          echo '<script>alert("Upload Succesful");</script>';
          header('Location: files.php?uploadsuccessful');
        } else {
          echo '<script>alert("Sorry, your file size is too big");</script>';
        }
      } else {
        echo '<script>alert("There was an error uploading the pics");</script>';
      }
    } else {
      echo "<script>alert('Invalid Format');</script>";
    }
  }

  //getting file from files.php
  $filePath = "images/file.txt";
  $output = file_get_contents($filePath);
  $ages = explode("\n", $output);
  $totalAge = 0;
  $i = 0;
  foreach($ages as $age) {
    echo "I will be ".$age." this year"."<br>";
    $totalAge = $totalAge + $age;
    $i++;
  }
  echo "The average age of all the users is ".($totalAge / $i);
?>
