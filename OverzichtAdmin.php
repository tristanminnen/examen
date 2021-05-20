<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
//kijkt of de admin inlocht
if($_SESSION['login_id']=="admin") {
// select de query
    $sql = "SELECT DISTINCT Date FROM `Tijdblokken`";
    if ($result = mysqli_query($mysqli, $sql)) {
        // dit maakt de table aan met alle gegevens
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th scope='col'>Dagen </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['Date'] . "</td>";
                echo '<td><a href="ViewTimeBlock.php?Date=' . $row['Date'] . '" class="mr-3" title="View Record" data-toggle="tooltip">bekijken</a></td>';
                echo "</tr>";
            }
            echo "</table>";
            echo'<form method="post" action="AddTimeStamp.php">';
            echo '<input type="submit" class="btn btn-primary" value="Voeg Tijdblokken toe" name="Voeg Tijdblokken toe">';
            echo '</form>';
            mysqli_free_result($result);
        } else {
            echo'<form method="post" action="AddTimeStamp.php">';
            echo '<input type="submit" class="btn btn-primary" value="Voeg Tijdblokken toe" name="Voeg Tijdblokken toe">';
            echo '</form>';
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }
}
//kijkt of het een user is
elseif ($_SESSION['login_id']){
    // wirdt gecheckt op unique datum waarde
    $sql = "SELECT DISTINCT Date FROM `Tijdblokken`";
    if ($result = mysqli_query($mysqli, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th scope='col'>Dagen</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['Date'] . "</td>";
                echo '<td><a href="ViewTimeBlock.php?Date=' . $row['Date'] . '" class="mr-3" title="View Record" data-toggle="tooltip">Tijdsblokken bekijken</a></td>';
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
}
