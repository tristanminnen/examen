<?php

// voeg de config file toe
require_once ("session.php");
if($_SESSION['login_id']=="admin") {
    if (isset($_POST['Submit'])) {
        $begin = $_POST['begintijd'];
        $eind = $_POST['eindtijd'];
        $id = $_POST['id'];

        $sql = "UPDATE Tijdblokken SET begintijd = '$begin', eindtijd = '$eind' WHERE Id_tijd='$id' ";
        if (mysqli_query($mysqli, $sql)) {
            header("location: OverzichtAdmin.php");
        } else {
            echo "Fout opgetreden: " . $sql . "
" . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
    }
}