<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
//checkt of de admin een connectie maakt
if($_SESSION['login_id']=="admin") {
    if (isset($_POST['Submit'])) {
        // haalt de gegevens op van de form van vorige pagina
        $begin = $_POST['begintijd'];
        $eind = $_POST['eindtijd'];
        $id = $_POST['id'];
        //updated de gegevens naar niewe begin en eind tijd met gegevens die zijn opgehaald
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