<?php
include('session.php');
?>
<html">

<head>
    <title>Welcome </title>
</head>

<body>
<?php
if($_SESSION['login_id']) {
    ?>
<h1>Welcome <?php echo $_SESSION['login_naam']; ?></h1>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
<?php
}
else {
    header("Location: login.php");
}
?>


</html>