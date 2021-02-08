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

        <!-- Artiklar placerar sig snyggt efter varann -->
        <article>
            <h1>Projekt 1</h1>
            <p>Här kommer uppgifterna!</p>
            <p>Pull innan Push!</p>
        </article>

        <article>
            <h2>Uppgift 1</h2>
        </article>

        <?php
print(3 + 6);
// Uppg 1 - Superglobals
// phpinfo(); - sök efter uppg 1 info
print($_SERVER['REMOTE_USER']);
$serverPort = $_SERVER['SERVER_PORT'];
// Konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Servern snurrar på port :" . $serverPort . "</p>");
//phpinfo();
?>


        <article>
            <h2>Uppg 2</h2>
            <?php
// Uppgift 2 - Tid och Datum
print("<p> Det är den " . date("d") . " idag</p>");
print("<p> Klockan är " . date("h:i:s") . " just nu</p>");
print("<p> Det är den " . date("m") . "nde månaden idag </p>");
// TODO: Skapa en array av månaderna och välj den nuvarande
$manader = array("Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December");
// Hur kan vi använda 01 från date("m") som index?
$manad = date("m");
// Tyvärr verkar $manad vara en sträng inte en nummer
// Type cast str till int:
$manadInt = (int) $manad;
print("<p> På svenska heter den månaden: " . $manader[$manadInt]);
?>

        </article>

        <article>
            <h2>Uppgift 3</h2>
            <form action="index.php" method="get">
                Dag: <input type="text" name="dag"> <br>
                Månad: <input type="text" name="manad"> <br>
                <input type="submit">

            </form>
            <?php
// Kom åt GET data från UTLen
$dag = $_GET["dag"];
print("Du vill veta hur länge det är till " . $_GET["dag"]);
?>

        </article>

        <article>
            <h2>Uppg 4</h2>
            <form action="index.php" method="get">
                Användarnamn: <input type="text" name="username"><br>
                Email: <input type="text" name="email"><br>
                <input type="submit" value="Registrera dig!">
            </form>
            <?php
        if (isset($_REQUEST['username'])&& isset($_REQUEST['email'])){
            $username = test_input( $_GET['username']);
            print($username);
        }
        ?>
        </article>

        <article>
            <h2>Uppg 5 - Cookies</h2>
            <?php
// Uppgi - 5 Ge användaren en cookie
$cookie_name = "username";
$cookie_value = "Spöket Laban";
setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");

// Kolla ifall användaren har en cookie
if( isset($_COOKIE["username"]) ) {
    print("<p> Välkommen " . $cookie_value . "!</p>");
}
?>
        </article>


        <article>
            <h2>Uppg 6</h2>
            <form action="index.php" method="get">
                Login: <input type="text" name="login"><br>
                Password: <input type="text" name="password"><br>
                <input type="submit" value="Logga in">
            </form>
            <?php
        // Uppg 6 - Spara användar data på servern
        $login = test_input($_GET["login"]);
        $password = test_input($_GET["password"]);

        if ($login == "Joel") {
            // "Sessionen abc123 == $_SESSION['user'] = Joel"
            $_SESSION['user'] = "Joel";
            print("<p>Endast Joel har tillgång till Dark Web</p>");
            print("<a href='darkweb.php'>DARK WEB</a>");
        }
        else if ($login == "skurk") {
            $_SESSION['user'] = "skurk";
            print("<p> Hej skurk, du har inte tillgång till </p>");
            print("<a href='darkweb.php'>DARK WEB</a>");
        }
        else {
            print("<p>Inga hemlisar för skurkar</p>");
        }
        
        ?>
        </article>

        <article>
            <h2>Uppg 7 - Ladda upp bild</h2>
            <form action="upload.php" method="post" enctype="multipart/from-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="sumbit" value="Upload Image" name="submit">
            </form>
            
        </article>

        <article>
        <h2>Uppg 8 - Besöksräknare</h2>
        <?php
        // TODO: Hitta användaren i $_SERVER och skriv in den
        // TODO: Frormatera tiden i nåt mänskligt format
        $myfile = fopen("besok.log", "a+") or die("Unable to open file!");
        fwrite($myfile, "Joel var här kl " . time(). "\n");
        fclose($myfile);
        ?>
        </article>

    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>