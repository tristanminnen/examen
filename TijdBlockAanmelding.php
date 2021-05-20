<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
//checkt voor admin account
if($_SESSION['login_id']=="admin") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // maakt connectie met database
        $sql = "SELECT * FROM Inschrijven WHERE Id_tijd = '$id'";

        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                // maakt een voor elke row loop en vult dan de database
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
                    //checkt de user ID
                    $User = $row['Id_user'];
                    //maakt een nieuwe connectie met User tabel
                    $sql2 = "SELECT * FROM Users WHERE Id_user = '$User'";
                    if ($result2 = mysqli_query($mysqli, $sql2)) {
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_array($result2)) {
                                // haald het lidmaatschap gegevens op
                                $lid= $row['Lid'] ;
                                //kijkt of iemand lid is
                                if ($lid == 1){
                                    $lid2 = "ja";
                                }else{
                                    $lid2 = "nee";
                                }
                                // zet de gegevens uit de database in een tabel
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
                mysqli_free_result($result);
            } else {
                echo "Er is niemand ingeschreven";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
    }// maakt users connectie
}elseif ($_SESSION['login_id']){
    if (isset($_GET['id'])) {
        //haalt data op
        $tijd = $_GET['id'];
        $id=$_SESSION['login_id'];
        // maakt connectie met database en zet gegevens in de database
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

