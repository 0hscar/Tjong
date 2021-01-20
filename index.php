<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dennis JS Demo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">
        <nav>
            <!-- Logo och meny finns i nav -->
            <ul>
                <a id="current" href="home/">Home</a>
                <a href="projekt1/">Projekt 1</a>
                <a href="projekt2/">Projekt 2</a>
            </ul>
        </nav>

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
$manader = array("Januari", "Februari", "Mars");
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
            print("Du vill veta hur länge det är till " . $_GET["dag"] );
            ?>

        </article>

    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>