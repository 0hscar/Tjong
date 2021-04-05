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
    <title>JW Backend</title>
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
        </article>

        <article>
            <h2>Uppgift 1</h2>
        

        <?php

// Uppg 1 - Superglobals
print($_SERVER['REMOTE_USER']);
$serverPort = $_SERVER['SERVER_PORT'];
$userIP = $_SERVER['REMOTE_ADDR'];
$servername = $_SERVER['SERVER_NAME'];
$serverapache = $_SERVER['SERVER_SOFTWARE'];
print("<p>Servern snurrar på port :" . $serverPort . "</p>");
print("<p>Din IP är :" .$userIP . "</p>");
print("<p>Server namnet är :" .$servername . "</p>");
print("<p>Server apache :" .$serverapache . "</p>");

?>
</article>

        <article>
            <h2>Uppg 2</h2>
            <?php
// Uppgift 2 - Tid och Datum
print("<p> Det är den " . date("d") . " idag</p>");
print("<p> Klockan är " . date("H:i:s") . " just nu</p>");
print("<p> Det är den " . date("m") . "nde månaden idag </p>");
print("<p> Datum : " .date('d-m-Y H:i:s'));
print("<p> Veckodag :" .date("l"));
$ddate = date('d-m-Y');
$date = new DateTime($ddate);
$week = $date->format('W');
print("<p> Vecka: " .$week );

$manader = array("Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December");
$manad = date("m");
$manadInt = (int) $manad;
print("<p> På svenska heter den månaden: " . $manader[$manadInt - 1]);

?>

        </article>

        <article>
            <h2>Uppgift 3</h2>
            <form action="index.php" method="get">
                Dag: <input type="number" name="dag"> <br>
                Månad: <input type="number" name="manad"> <br>
                Year: <input type="number" name="year"> <br>

                <input type="submit">

            </form>
            <?php
$dag = $_GET["dag"];
$month = $_GET["manad"];
$year = $_GET["year"];



if ($month >= 1 && $month <= 12){
    //print($month ."</br>" .$dag. "</br>" .$year. "</br></br>"); Error check
    if (($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) && ($dag >= 1 && $dag <= 31)){
        printTimes($dag, $month, $year);
    }
    elseif (($month == 4 || $month == 6 || $month == 9 || $month == 11) && ($dag >= 1 && $dag <= 30)) {
        printTimes($dag, $month, $year);
    }
    elseif (($month == 2) && ($dag >= 1 && $dag <= 28)){
        printTimes($dag, $month, $year); 
    }
    else{
        print("Not a valid day for said month");
    }

}
else{
    print("Not a valid month!");
}


function printTimes($dag, $month, $year){
    $d1=strtotime($dag."-".$month."-".$year);
    $d2=ceil(($d1-time())/60/60/24);
    $dSeconds=ceil(($d1-time()));
    $dMinutes=ceil(($d1-time())/60);
    $dHours=ceil(($d1-time())/60/60);
    
    if($dHours < 0){
    //print("Less than 0 </br>");
    print("It was " .$d2*(-1). " days since " .$dag. "." .$month. ":" .$year. "</br>");
    print("Seconds since date: " .$dSeconds*(-1). "</br>");
    print("Minutes since date: " .$dMinutes*(-1). "</br>");
    print("Hours since date: " .$dHours*(-1). "</br>");
    //print($d2);
}
    else {
    print("There are " .$d2. " days until " .$dag.".". $month. ":". $year. "</br>") ;
    print("Seconds to date: " .$dSeconds. "</br>");
    print("Minutes to date: " .$dMinutes. "</br>");
    print("Hours to date: " .$dHours. "</br>");
    }
}





?>

        </article>

        <article>
            <h2>Uppg 4</h2>
            <form action="index.php" method="get">
                Användarnamn: <input type="text" name="username"><br>
                Email: <input type="text" name="email"><br>
                <input type="submit" name="submitMail">
            </form>
<?php        

// uppgift 4
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}




if(isset($_POST['submitMail'])){
    sendMail();
}
function sendMail(){
    $to = $_POST["email"];
    $subject = "Login password";
    $txt = "Din password: ".randomPassword();
    $headers = "From: tjongmannen@gmail.com";

        if(mail($to,$subject,$txt,$headers)) {
            echo "Email Sent";
        }
        else {
            echo "failed";
        }
}   

?>
        </article>

        <article>
            <h2>Uppg 5 - Cookies</h2>
            <?php
// Uppgi - 5 Ge användaren en cookie
$cookie_name = "username";
$cookie_value = "Spöket Laban";    
$cookie_date = date("d-m-Y H:i:s");

    
// function createCookie(){
//     setcookie($cookie_name, $cookie_value, $cookie_date, time() + (86400 * 2), "/");
// }
// if(isset($_COOKIE["username"])){
// createCookie();
// if($cookie_name= ""){
//     createCookie();
// }
// else{
//     print("<p> Välkommen " . $cookie_value . "!</p>");
//     print($cookie_date);
// }


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

        if ($login == "Admin") {
            // "Sessionen abc123 == $_SESSION['user'] = Joel"
            $_SESSION['user'] = "Admin";
            print("<p>Endast Admin har tillgång till Dark Web</p>");
            print("<a href='darkweb.php'>DARK WEB</a>");
        }
        else if ($login == "skurk") {
            $_SESSION['user'] = "skurk";
            print("<p> Hej skurk, du har inte tillgång till DARKWEB</p>");
        //  print("<a href='darkweb.php'>DARK WEB</a>");
        //}
        //else {
        // print("<p>Inga hemlisar för skurkar</p>");
        }
        
        ?>
        </article>

        <article>
            <h2>Uppg 7 - Ladda upp bild</h2>
            <form action="upload.php" method="post" enctype="multipart/from-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </form>

            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" />
                <input type="submit"/>
            </form>
            <?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
        //  print("<img src=""></img>"); Kom ej underfund med hur man får det att fungera 
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
            
        </article>

        <article>
        <h2>Uppg 8 - Besöksräknare</h2>
        <?php
        // TODO: Hitta användaren i $_SERVER och skriv in den
        // TODO: Frormatera tiden i nåt mänskligt format
        // $myfile = fopen("besok.log", "a+") or die("Unable to open file!");
        // fwrite($myfile, "Admin var här kl " . time(). "\n");
        // fclose($myfile); 
        //Att inte ha denhä kod snutten som en kommentar söndra alltig efter den så hela rapporten försvann
        // ?>
        </article>
       
        <article>
         <h2>Uppg 9 - Gästboken</h2>
        </article>

        
            <article>
            <h2>Raporten</h2>
            <p>Uppgift 1 - Första uppgiften var inte särskilt krävande, följde man med på lektionen fick man i stortsätt uppgiften gratis.</p>
            <p>Uppgift 2 - Andra uppgifter var ganska simpel och rakt på sak. Viktigaste att komma ihåg att arrayn startar från 0 så det förklarar den lilla -1. </p>
            <p>Uppgift 3 - Trejde uppgiften, formuläret så hade man en rätt bra grund på om man följt med på lektionerna. Vi hade lite svårigheter med att få
            datumen kopplade till vår form utan att få ut printat -18666. Vi löste de med att märka att vi hade syntaxerna fel för variablerna i formeln. Då vi korrigerade den delen så fungerade fromuläret. </p>
            <p>Uppgift 4 - Fyran var lite yrsel att få den att inte skicka nya mail varje page refresh men problemet löste sig efter lite svett och tårar. Skapade en ny gmail så vi inte behövde sätta egen email. 
            En password generator som har alla stora och små bokstäver samt nummror i en array varav det vals på måfå. </p>
            <p>Uppgift 5 - Ett liknande sätt som i javascript men i php format. Gjorde de lite råddigt när man plötsligt börja skriva js kod utan att märka det.  </p>
            <p>Uppgift 6 - PHP Sessions uppgiften blev lite halv färdig man slipper ändast till darkweb.php som Admin och lösen 'Password' Skurken slipper inte inn via darkweb.php linken
            men man kan tyvärr bara lägga in webbadressen så får man access till Webbplatsen. Försökte använda mig av SESSION RESTRICTION men det lyckades inte :/ </p>
            <p>Uppgift 7 - Ladda upp en fil till servern hade vi strul med... Vi gjorde som TODO sade och pastade in ett upload file script men ingen av bilderna fungerade i sriptet
            Vi har 2 stycken olika formulär men ingen av dem tycktes fungera så uppgiften blev lite övermäktig så den lämnades på hälft.</p>
            <p>Uppgift 8 - Vi hade problem med stor del av användningen av andra php filer som vi inte lyckades få att fungera. Från "file not found" till att sidan crasha höll vi på med en god stund tills det gav oss huvudvärk så vi lämnade det så.</p>
            <p>Uppgift 9 - Som i tidigare uppgift t.ex uppfigt 8 så har vi haft strul med att ta del av andra PHP filer så denna uppgift blev till ingenting.</p>
            <p> Oscar Weber & Joel Hellström</p>
            
        </article>
    </div>
</body>

<script src="script.js"></script>

</html>

   