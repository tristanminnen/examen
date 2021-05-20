<?php

require_once ("session.php");
if ($_SESSION['login_id'] == "admin") {
    if (isset($_POST['Delete'])) {
        $id = $_POST['id'];
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
