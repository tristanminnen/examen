<?php
// hier worden gegevens van de database neergezet
$mysqli = new mysqli("localhost","klapschaats","Geheim","klapschaats_examen");

// Checkt connectie
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
?>