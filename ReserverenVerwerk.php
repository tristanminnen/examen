<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
//kijkt of de admin inlocht
if($_SESSION['login_id']=="admin") {
    if (isset($_POST['Submit'])) {
        $reserveren = $_POST['Reserveren'];
        $id = $_POST['id'];
//update de tijdblokken met de nieuwe tijden
        $sql = "UPDATE Tijdblokken SET reservering = '$reserveren' WHERE Id_tijd='$id' ";
        if (mysqli_query($mysqli, $sql)) {

        } else {
            echo "Fout opgetreden: " . $sql . "
" . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
    }
}        header("location: OverzichtAdmin.php");

