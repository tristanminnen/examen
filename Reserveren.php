<?php
// voeg de session file toe om connectie te maken met de database en de sessie wie is ingelocht
require_once ("session.php");
//kijkt of de admin inlocht
if($_SESSION['login_id']=="admin") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $records = mysqli_query($mysqli,"select * from Tijdblokken WHERE Id_tijd = '$id'"); // haalt data uit database

        while($data = mysqli_fetch_array($records))
        {
            ?>
            <tr>
                <!-- maakt een input form aan zodat je een reservering voor een groep kan maken en stuurt het naar reserverenverwerk.php -->
                <form method="post" action="ReserverenVerwerk.php">
                    <div class="form-group" >
                        <div class="form-group" >
                            <div class="mb-3">
                                <label class="form-label">Hoeveel plaatsen reserveren</label>
                                <input type="number" name="Reserveren" required>
                                <input type="hidden" value="<?php echo $data['Id_tijd']?>" name="id" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit" name="Submit">
                        </div>
                </form>
            </tr>
            <?php
        }
    }
}