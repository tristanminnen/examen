<?php
require_once ("session.php");
// dit is de admin versie
if($_SESSION['login_id']=="admin") {
    if (isset($_GET['Date'])) {
        $date = $_GET['Date'];
        // Include config file
        $sql = "SELECT * FROM Tijdblokken WHERE Date = '$date'";

        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>BeginTijd</th>";
                echo "<th scope='col'>EindTijd</th>";
                echo "<th scope='col'>Plekken Vrij</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['begintijd'] . "</td>";
                    echo "<td>" . $row['eindtijd'] . "</td>";
                    $id_user=$_SESSION['login_id'];
                    $Plekken = $row['Id_tijd'];
                    $reservering = $row['reservering'];
                    $sql2="select count(*) as total from Inschrijven WHERE `Id_tijd` = '$Plekken'";
                    $result2=mysqli_query($mysqli,$sql2);
                    $data=mysqli_fetch_assoc($result2);
                    $over = 100 - $data['total'] - $reservering;
                    echo "<td>" . $over . "</td>";
                    echo '<td><a href="TijdBlockAanmelding.php?id=' . $row['Id_tijd'] . '" class="mr-3" title="View Record" data-toggle="tooltip">bekijken</a></td>';
                    echo '<td><a href="EditTijdBlock.php?id=' . $row['Id_tijd'] . '" class="mr-3" title="View Record" data-toggle="tooltip">Edit</a></td>';
                    echo '<td><a href="Reserveren.php?id=' . $row['Id_tijd'] . '" class="mr-3" title="View Record" data-toggle="tooltip">reserveren</a></td>';
                    echo "</tr>";
                }
                echo "</table>";
                // Free result set
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
        $date = $_GET['Date'];
        // Include config file
        $sql = "SELECT * FROM Tijdblokken WHERE Date = '$date'";

        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
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
                    $sql2="select count(*) as total from Inschrijven WHERE `Id_tijd` = '$Plekken'";
                    $result2=mysqli_query($mysqli,$sql2);
                    $data=mysqli_fetch_assoc($result2);
                    $over = 100 - $data['total'] - $reservering;
                    echo "<td>" . $over . "</td>";

                    $sql3 = "SELECT * FROM Inschrijven WHERE Id_user = '$id_user' AND Id_tijd = '$Plekken'";

                    if ($result3 = mysqli_query($mysqli, $sql3)) {
                        if (mysqli_num_rows($result3) > 0) {
                            echo '<td><p class="mr-3 danger" title="View Record" data-toggle="tooltip">Je bent al ingeschreven!</p></td>';
                        }
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
