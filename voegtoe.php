<?php
// voeg de config file toe
require_once ("session.php");
if(isset($_POST['Submit']))
{
    $naam = $_POST['naam'];
    $addres = $_POST['addres'];
    $plaats = $_POST['plaats'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];
    $wachtwoord = md5($_POST['wachtwoord']);
    $lid = $_POST['lid'];


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