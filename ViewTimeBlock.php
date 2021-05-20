<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
// checkt voor admin
if($_SESSION['login_id']=="admin") {
    if (isset($_GET['Date'])) {
        //haalt data op
        $date = $_GET['Date'];
        // maakt connectie
        $sql = "SELECT * FROM Tijdblokken WHERE Date = '$date'";

        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                //maakt een begin van de tabel
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>BeginTijd</th>";
                echo "<th scope='col'>EindTijd</th>";
                echo "<th scope='col'>Plekken Vrij</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    //zet gegevens in de tabel
                    echo "<tr>";
                    echo "<td>" . $row['begintijd'] . "</td>";
                    echo "<td>" . $row['eindtijd'] . "</td>";
                    //haalt gegevens op
                    $id_user=$_SESSION['login_id'];
                    $Plekken = $row['Id_tijd'];
                    $reservering = $row['reservering'];
                    // checkt voor aantal users ingeschreven voor tijdvak
                    $sql2="select count(*) as total from Inschrijven WHERE `Id_tijd` = '$Plekken'";
                    $result2=mysqli_query($mysqli,$sql2);
                    $data=mysqli_fetch_assoc($result2);
                    //maakt totaal aantal vrije plaatsen
                    $over = 100 - $data['total'] - $reservering;
                    // maakt de tabel af
                    echo "<td>" . $over . "</td>";
                    echo '<td><a href="TijdBlockAanmelding.php?id=' . $row['Id_tijd'] . '" class="mr-3" title="View Record" data-toggle="tooltip">bekijken</a></td>';
                    echo '<td><a href="EditTijdBlock.php?id=' . $row['Id_tijd'] . '" class="mr-3" title="View Record" data-toggle="tooltip">Edit</a></td>';
                    echo '<td><a href="Reserveren.php?id=' . $row['Id_tijd'] . '" class="mr-3" title="View Record" data-toggle="tooltip">reserveren</a></td>';
                    echo "</tr>";
                }
                echo "</table>";

                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
    }//hier begint client versie
}elseif ($_SESSION['login_id']){
    if (isset($_GET['Date'])) {
        // haalt gegevens op
        $date = $_GET['Date'];
        // wordt connectie met data base gehaald met opgehaalde gegevens
        $sql = "SELECT * FROM Tijdblokken WHERE Date = '$date'";

        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                // maakt tabel
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>BeginTijd</th>";
                echo "<th scope='col'>EindTijd</th>";
                echo "<th scope='col'>Plekken Over</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['begintijd'] . "</td>";
                    echo "<td>" . $row['eindtijd'] . "</td>";
                    $id_user=$_SESSION['login_id'];
                    $Plekken = $row['Id_tijd'];
                    $reservering = $row['reservering'];
                    // maakt connectie met data base om te checken hoeveel plekken nog vrij zijn
                    $sql2="select count(*) as total from Inschrijven WHERE `Id_tijd` = '$Plekken'";
                    $result2=mysqli_query($mysqli,$sql2);
                    $data=mysqli_fetch_assoc($result2);
                    // checkt voor aantal users ingeschreven voor tijdvak
                    $over = 100 - $data['total'] - $reservering;
                    echo "<td>" . $over . "</td>";
                    //maakt een nieuwe verbinding
                    $sql3 = "SELECT * FROM Inschrijven WHERE Id_user = '$id_user' AND Id_tijd = '$Plekken'";
                    if ($result3 = mysqli_query($mysqli, $sql3)) {
                        //checkt of je al bent ingeschreven
                        if (mysqli_num_rows($result3) > 0) {
                            echo '<td><p class="mr-3 danger" title="View Record" data-toggle="tooltip">Je bent al ingeschreven!</p></td>';
                        }
                        //als er geen plek meer is komt er te staan dat het vol is

                        elseif ($over == 0) {
                            echo '<td><p class="mr-3 danger" title="View Record" data-toggle="tooltip">VOL</p></td>';
                        } else {
                            echo '<td><a href="TijdBlockAanmelding.php?id=' . $row['Id_tijd'] . '" class="mr-3" title="View Record" data-toggle="tooltip">inschrijven</a></td>';
                        }
                    }



                    echo "</tr>";
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            }else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
    }
}
// Close connection
mysqli_close($mysqli);
