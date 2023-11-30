<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
</head>
<body>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="SUBMIT">
  </form>
  <br><br><br>
  <?php 
    $myFile = fopen("images/file.txt", "w");
    $text = "My name is Abdulhammed Fuad Opeyemi Oladipupo";
    fwrite($myFile, $text);
    fclose($myFile);
  ?>
</body>
</html>