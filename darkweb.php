<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
    print("<p> Här är innehållet av din session</p>");
    //print_r($_SESSION);
    print("<br>Användaren: " . $_SESSION['user']);
    
    // TODO: Visa en text endas om $_SESSION['user'] == "Joel"
    if ($_SESSION['user'] == "Joel") {
        print("<p>Mitt lösenord är Superhemlis</p>");
}
    // TODO: Annars, styr användaren till loginsidan (index.php)
    else {
         print("<p>Gå bort! Fösök int!</p>");
    }
   

    ?>


</body>

</html>