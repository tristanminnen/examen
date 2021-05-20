<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link bootstrap een makkelijke CSS library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Examen schaatsen</title>
</head>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 700px; padding: 20px; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Welkom Bij de registratie van Klapschaats schaats club</h2>
    <p>Vul je gegevens in om een account te maken</p>
    <!-- dit is een aanmeld formulier -->
    <form method="post" action="voegtoe.php">
        <div class="form-group">
            <div class="mb-3">
                <label class="form-label">Naam</label>
                <input type="text" class="form-control" name="naam" value="<?php echo $naam; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label class="form-label">Addres</label>
                <input type="text" class="form-control" name="addres" value="<?php echo $addres; ?>"required>
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label class="form-label">Plaats</label>
                <input type="text" class="form-control" name="plaats" value="<?php echo $plaats; ?>"required>
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label class="form-label">telefoonnummer</label>
                <input type="text" class="form-control" name="telefoon" value="<?php echo $telefoon; ?>"required>
            </div>
        </div>

        <div class="form-group">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>"required>
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label class="form-label">Wachtwoord</label>
                <input type="password" class="form-control" name="wachtwoord" value="<?php echo $wachtwoord; ?>"required>
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3 form-check">
                <input type="checkbox" name="lid" value="1" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label"  >Bent u al lid van de schaats club?</label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit" name="Submit">
        </div>
        <p>Heb je al een account? <a href="login.php">Login here</a>.</p>
    </form>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
