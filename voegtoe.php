<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
if(isset($_POST['Submit']))
{
    // haalt gegevens op van de form
    $naam = $_POST['naam'];
    $addres = $_POST['addres'];
    $plaats = $_POST['plaats'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];
    // versleutelt wachtwoord
    $wachtwoord = md5($_POST['wachtwoord']);
    $lid = $_POST['lid'];

//zeet gegevens in de database
    $sql = "INSERT INTO Users (Naam, Addres, Plaats, Telefoon, Email, Wachtwoord, Lid)
	 VALUES ('$naam','$addres','$plaats','$telefoon','$email','$wachtwoord','$lid')";
    if (mysqli_query($mysqli, $sql)) {
        echo "U bent toegevoegd";
    } else {
        echo "Fout opgetreden: " . $sql . "
" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
header("location: login.php");

?>