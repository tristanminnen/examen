<?php

// voeg de config file toe
require_once 'config.php';
if (isset($_POST['Submit'])) {





    $stmt = $mysqli->prepare("INSERT INTO `Tijdblokken` (`Date`,`begintijd`,`eindtijd`) VALUES (?,?,?)");
    $stmt->bind_param('sss', $datum,$begin, $eind);
    foreach ($_POST['begintijd'] as $begin) {
        // to sanitize the name string, perform that action here
        $eind = date("H:i:s", strtotime('+30 minutes', strtotime($begin)));
        $datum =$_POST['datum'];
        // to disqualify an entry, perform a conditional continue to avoid the execute call
        $stmt->execute();
    }
}

