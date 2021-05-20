<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
//checkt of de admin een connectie maakt
if($_SESSION['login_id']=="admin") {
}elseif ($_SESSION['login_id']) {
    if (isset($_GET['id'])) {
        // haalt gegevens op
        $id = $_GET['id'];
        //verwijderd de inschrijving waar het id is wat was opgehaald
        $sql = "DELETE FROM Inschrijven WHERE Id_ins='$id'";
        if(mysqli_query($mysqli, $sql)){
            header("location: OverzichtIngeschreven.php");

        } else{
            // laat de error zien als fout gaar
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }

// sluit connectie
        mysqli_close($mysqli);

    }
}
