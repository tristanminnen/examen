<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
if ($_SESSION['login_id'] == "admin") {
    // hier wordt gekeken wat met de delete knop is megegeven
    if (isset($_POST['Delete'])) {
        $id = $_POST['id'];
        // hier wordt het tijdblok gedelete
        $sql = "DELETE FROM Tijdblokken WHERE Id_tijd='$id'";
        if (mysqli_query($mysqli, $sql)) {
            header("location: OverzichtAdmin.php");

        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }

// Close connection
        mysqli_close($mysqli);

    }
}
