<?php
$mysqli = new mysqli("localhost","klapschaats","Geheim","klapschaats_examen");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
?>