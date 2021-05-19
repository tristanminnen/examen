<?php
include("config.php");
session_start();

if(isset($_POST['Submit']))
{
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $wachtwoord = mysqli_real_escape_string($mysqli,$_POST['wachtwoord']);
    $wachtwoord = md5($wachtwoord);
    if($email == "admin@admin.nl" AND $wachtwoord == "9e860fba8d4a603b2fefc0f766bf9c50") {
        $_SESSION['login_id'] = "admin";
        $_SESSION['login_naam'] = "admin";

        header("location: welcome.php");
    }else {
        $sql = "SELECT Id_user, Naam FROM Users WHERE Email = '$email' and Wachtwoord = '$wachtwoord'";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {
            $_SESSION['login_id'] = $row["Id_user"];
            $_SESSION['login_naam'] = $row["Naam"];

            header("location: welcome.php");
        } else {
            echo "Your Login Name or Password is invalid";
        }
    }
}
?>
