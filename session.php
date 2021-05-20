<?php
include("config.php");
session_start();
if($_SESSION['login_id']) {
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?php echo $_SESSION['login_naam']; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="OverzichtAdmin.php">beschikbarentijden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OverzichtIngeschreven.php">Ingeschreven tijden</a>
                    </li>
                </ul>
                <form method="get" action="logout.php">

                    <button href="logout.php" class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <?php

}
if(isset($_POST['submit']))
{
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $wachtwoord = mysqli_real_escape_string($mysqli,$_POST['wachtwoord']);
    $wachtwoord = md5($wachtwoord);
    if($email == "admin@admin.nl" AND $wachtwoord == "9e860fba8d4a603b2fefc0f766bf9c50") {
        $_SESSION['login_id'] = "admin";
        $_SESSION['login_naam'] = "admin";

        header("location: OverzichtAdmin.php");
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

            header("location: OverzichtAdmin.php");
        } else {
            echo "Your Login Name or Password is invalid";
        }
    }
}
?>
