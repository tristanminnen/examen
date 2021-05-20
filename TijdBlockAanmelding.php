<?php
require_once ("session.php");
if($_SESSION['login_id']=="admin") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Include config file

        $sql = "SELECT * FROM Inschrijven WHERE Id_tijd = '$id'";

        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>Naam</th>";
                echo "<th scope='col'>Addres</th>";
                echo "<th scope='col'>Plaats</th>";
                echo "<th scope='col'>Telefoonnummer</th>";
                echo "<th scope='col'>Email</th>";
                echo "<th scope='col'>Is Lid</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    $User = $row['Id_user'];
                    $sql2 = "SELECT * FROM Users WHERE Id_user = '$User'";
                    if ($result2 = mysqli_query($mysqli, $sql2)) {
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_array($result2)) {
                                $lid= $row['Lid'] ;
                                if ($lid == 1){
                                    $lid2 = "ja";
                                }else{
                                    $lid2 = "nee";
                                }
                                echo "<tr>";
                                echo "<td>" . $row['Naam'] . "</td>";
                                echo "<td>" . $row['Addres'] . "</td>";
                                echo "<td>" . $row['Plaats'] . "</td>";
                                echo "<td>" . $row['Telefoon'] . "</td>";
                                echo "<td>" . $row['Email'] . "</td>";
                                echo "<td>" . $lid2 . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "Er is niemand ingeschreven";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
    }
}elseif ($_SESSION['login_id']){
    if (isset($_GET['id'])) {
        $tijd = $_GET['id'];
        $id=$_SESSION['login_id'];
        $sql = "INSERT INTO `Inschrijven` (`Id_ins`, `Id_user`, `Id_tijd`) VALUES (NULL, '$id', '$tijd');";
        if (mysqli_query($mysqli, $sql)) {
            header("location: OverzichtIngeschreven.php");
        } else {
            echo $tijd;
            echo $id;
            echo "Fout opgetreden: " . $sql . "
" . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
        }
}
// Close connection

