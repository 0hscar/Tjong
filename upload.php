<?php
session_start();
include "functions.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joels JS Demo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">
        <?php include "navbar.php" ?>

        <article>
            <h2>Uppg 7 - Ladda upp bild</h2>
            <form action="upload.php" method="post" enctype="multipart/from-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="sumbit" value="Upload Image" name="submit">
            </form>
        </article>

        <?php
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image."; // Oavsätt bilden kommer det "File is not an image"
            $uploadOk = 0;
          }
        }
        
        ?>

    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>