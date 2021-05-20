<?php
require_once ("session.php");
if($_SESSION['login_id']=="admin") {
}elseif ($_SESSION['login_id']) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM Inschrijven WHERE Id_ins='$id'";
        if(mysqli_query($mysqli, $sql)){
            header("location: OverzichtIngeschreven.php");

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }

// Close connection
        mysqli_close($mysqli);

    }
}
