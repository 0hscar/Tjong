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
        // TODO: Copypaste hela filupload scriptet
        ?>

    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>