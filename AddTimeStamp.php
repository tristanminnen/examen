<?php ?>
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
<html>
<head>
    <script>
        var counter = 1;
        var dynamicInput = [];

        function addInput(){
            var newdiv = document.createElement('div');
            newdiv.classList.add('form-group');
            newdiv.id = dynamicInput[counter];
            newdiv.innerHTML =
                "            <div class=\"mb-3\">\n" +
                "                <label class=\"form-label\">BeginTijd " + (counter + 1) + "</label>\n" +
                "                <input type=\"time\" id=\"appt\" name=\"begintijd[]\"\n" +
                "                       min=\"00:00\" max=\"24:00\" required>\n" +
                "                <input type='button' value='-' onClick='removeInput("+dynamicInput[counter]+");'>\n" +
                "        </div>";
            document.getElementById('formulario').appendChild(newdiv);
            counter++;
        }

        function removeInput(id){
            var elem = document.getElementById(id);
            return elem.parentNode.removeChild(elem);
        }
    </script>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Maak Tijdvak</h2>
    <p>Vul in om een Tijdvak te maken</p>
    <form method="post" action="AddTimeVerwerk.php" id="formulario">
        <div class="form-group" >
            <div class="mb-3">
                <label class="form-label">Datum</label>
                <input type="date" id="start" name="datum">
        </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="Submit">
            </div>
        <div class="form-group" >
            <div class="mb-3">
                <label class="form-label">BeginTijd</label>
                <input type="time" id="appt" name="begintijd[]"
                       min="00:00" max="24:00" required>
                <input type="button" value="+" onClick="addInput();">
            </div>
        </div>
    </form>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

