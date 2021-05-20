<?php
require_once ("session.php");
if($_SESSION['login_id']=="admin") {
}elseif ($_SESSION['login_id']){
    $id=$_SESSION['login_id'];
        // Include config file
        $sql = "SELECT * FROM Inschrijven WHERE Id_user = '$id'";

        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>Datum</th>";
                echo "<th scope='col'>BeginTijd</th>";
                echo "<th scope='col'>EindTijd</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    $tijd = $row['Id_tijd'];
                    $Id = $row['Id_ins'];
                    $sql2 = "SELECT * FROM Tijdblokken WHERE Id_tijd = '$tijd'";
                    if ($result2 = mysqli_query($mysqli, $sql2)) {
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_array($result2)) {
                                echo "<tr>";
                                echo "<td>" . $row['Date'] . "</td>";
                                echo "<td>" . $row['begintijd'] . "</td>";
                                echo "<td>" . $row['eindtijd'] . "</td>";
                                echo '<td><a href="TijdBlockUitschrijven.php?id=' . $Id . '" class="mr-3 danger" title="View Record" data-toggle="tooltip">uitschrijven</a></td>';
                                echo "</tr>";
                            }
                        }
                    }
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "U bent nog niet ingeschreven";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
    }
