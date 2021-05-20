<?php
require_once "session.php";
// dit is de admin versie
if($_SESSION['login_id']=="admin") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

    $records = mysqli_query($mysqli,"select * from Tijdblokken WHERE Id_tijd = '$id'"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
        ?>
        <tr>
            <form method="post" action="UpdateTime.php">
                <div class="form-group" >

                    <div class="form-group" >
                        <div class="mb-3">
                            <label class="form-label">BeginTijd</label>
                            <input type="time" id="appt" name="begintijd"
                                   min="00:00" max="24:00" value="<?php echo $data['begintijd']; ?>" required>
                            <label class="form-label">EindTijd</label>
                            <input type="time" id="appt" name="eindtijd"
                                   min="00:00" max="24:00" value="<?php echo $data['eindtijd']; ?>" required>
                            <input type="hidden" name="id"
                                    value="<?php echo $data['Id_tijd']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" name="Submit">
                    </div>
            </form>
            <form method="post" action="DeleteTime.php">
                <input type="hidden" name="id"
                       value="<?php echo $data['Id_tijd']; ?>">
                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="Delete" name="Delete">
                </div>
            </form>
        </tr>
        <?php
    }
    }
}