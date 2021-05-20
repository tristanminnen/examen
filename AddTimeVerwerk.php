<?php

// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
//word gekeken of er wat is meegestuurd met de submit
if (isset($_POST['Submit'])) {




// wordt een stmt statement gemaakt om de tijdvakken in de database te zetten
    $stmt = $mysqli->prepare("INSERT INTO `Tijdblokken` (`Date`,`begintijd`,`eindtijd`) VALUES (?,?,?)");
    $stmt->bind_param('sss', $datum,$begin, $eind);
    //hier loopt hij voor elke verschillende tijdvak die is gemaakt
    foreach ($_POST['begintijd'] as $begin) {
       //hier word 30 minuten opgeteld bij de begin tijd
        $eind = date("H:i:s", strtotime('+30 minutes', strtotime($begin)));
        $datum =$_POST['datum'];

        $stmt->execute();
    }
}
//relocate naar de overzicht pagina
header("location: OverzichtAdmin.php");

